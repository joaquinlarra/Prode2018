<?
require_once(dirname(__FILE__)."/front_init.php");
class Front_user extends Front_init
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function auto_save($match_code,$match_id,$team1_goals, $team2_goals, $result)
	{
		$this->redirect_login();
		$out['valid'] = false;
		$this->load->model("admin/match_model","match_model");
		if(!(int)$match_id || !$this->match_model->get((int)$match_id) || (minDiff($this->match_model->date_played,$this->data['today']) < 30) || $this->match_model->no_complete() || ($match_code != get_match_code($this->match_model->get_id(), $this->match_model->no_complete())))
		{
			echo json_encode($out);
			return;	
		}
		
		$sql = "REPLACE INTO prognostics (tournament_id, tournament_date, company_id,tournament, match_id, matchname, user_id, team1_goals, team2_goals, result, username, date_created)
				VALUES ('".$this->match_model->tournament_id."','".$this->match_model->tournament_date."','".$this->company_id."','".$this->match_model->tournament."','".$this->match_model->match_id."','".$this->match_model->matchname()."','".(int)$this->user_id."','".(int)$team1_goals."','".(int)$team2_goals."','".(int)$result."','".$this->username."',NOW())";
		$this->db->query($sql);
		$out['valid'] = true;
		echo json_encode($out);
		
	}
	
	public function login()
	{	
		$out['valid'] = false;
	
		if(!$this->company_model->users_activated)
		{
			$out['valid'] = true;
			echo json_encode($out);
			return;
		}
			
		if($this->company_model->first_login)
		{
			$sql = "SELECT * FROM bitauth_users WHERE username = '".addslashes($this->input->post('username'))."' AND company_id = '".$this->company_model->get_id()."'";
			$query = $this->db->query($sql);
			
			if(!$query->num_rows())
			{
				$out['error'] = "No existe el ".$this->company_model->username_field;
				echo json_encode($out);
				return;
			}
			
			$row = $query->row();
			
			if(!$row->active)
			{
				$this->session->set_userdata('prev_user_id', $row->user_id);
					
				$out['valid'] = true;
				$out['first_register'] = true;
				echo json_encode($out);
				return;
			}
		}
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('remember_me','Remember Me','');
			$this->form_validation->set_message('required', 'Falta completar el campo %s');
			if($this->form_validation->run() == TRUE)
			{
				$sql = "SELECT * FROM bitauth_users WHERE username = '".addslashes($this->input->post('username'))."' AND company_id = '".$this->company_model->get_id()."'";
				$query = $this->db->query($sql);
				if(!$query->num_rows())
				{
					$out['error'] = var_lang("no-record-found",$this->company_model->username_field);
					echo json_encode($out);
					return;
				}
				
				// Login
				if($this->bitauth->login($this->input->post('username'), $this->input->post('password'), $this->input->post('remember_me'),array(),NULL, $this->company_model->get_id()))
				{
					$this->session->set_userdata('user_id', $this->bitauth->user_id);	
					$this->session->set_userdata('username', $this->bitauth->username);
					$out['valid'] = true;
				}
				else
				{
						$out['error'] = var_lang("incorrect-login",$this->company_model->username_field);
				}
			}
			else
			{
				$out['error'] = "Debes completar ".$this->company_model->username_field." y contraseña";	
			}
		}
		echo json_encode($out);
	}

	public function forgot_password()
	{
		$this->data['section'] = "forgot_password";
		if($this->input->post())
		{
			$out['valid'] = false;
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			if($this->form_validation->run() == TRUE)
			{
				$sql = "SELECT * FROM bitauth_users WHERE username = '".$this->input->post('username')."' AND company_id = '".$this->company_model->get_id()."'";
				$user = $this->db->query($sql)->row();
				
				if(!$user)
				{
					$out['error'] = lang("no-account")." ".$this->company_model->username_field;
					
				}				
				else
				{

					if($user->email)
					{
						$forgot_code = $this->bitauth->forgot_password($user->user_id);
						$out['url'] = $this->data['link_url']."generame-la-clave/".$forgot_code;
						$this->send_forgot_password_email($out['url'],$user->fullname, $user->email);	
						$out['email'] = $user->email;
						$out['message'] = var_lang("email-sent","<b>".$user->email."</b>");
						$out['valid'] = 1;
					}
					else
					{
						$out['error'] = lang("no-email");
					}
				}
			}
			echo json_encode($out);
			return;
		}
		else
		{
			$this->load->view("front/forgot_password", $this->data);	
		}
	}

	public function send_forgot_password_email($forgot_link,$name, $email)
	{
		$this->load->library('email');
		$data['forgot_password_link'] = $forgot_link;

		$config['protocol'] = 'mail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';

		$this->email->initialize($config);
		$this->email->from('registro@fantasyfutbol2014.com','Fantasty Futbol 2014');
		$this->email->to($email);
		
		$this->email->subject('Fantasy Futbol 2014: '.lang('Recuperá tu clave'));
		$this->email->message(var_lang("recover-password-email",$name)."<a href='".$forgot_link."'>".$forgot_link.".</a><br><br>".lang("recover-password-email-2"));
		return $this->email->send();
	}
	
	public function recover_password($forgot_code)
	{
		$this->data['section'] = "recover_password";
		if(!$forgot_code || !($user = $this->bitauth->get_user_by_forgot_code($forgot_code)))
		{
			$this->load->view('front/recover_password_failure.php',$this->data);
		}
		else
		{
			$password = substr(base64_encode(date("si H:i:s")."..=+=..".$user->user_id),0,6);
			if($this->bitauth->set_password($user->user_id, $password))
			{
				$this->bitauth->send_new_password_email($user, $password);
				$this->bitauth->login($user->username, $password);
				$this->load->view('front/recover_password.php',$this->data);	
			}
			else
			{
				$this->load->view('front/recover_password_failure.php',$this->data);
			}
		}
	}	
	
	public function clean_qualys()
	{
		$this->redirect_login();
		if(minDiff($this->company_model->qualys_close_date,$this->today) > 0)
		{
			$sql = "DELETE FROM prognostics_qualys WHERE user_id = '".$this->user_id."'";
			$this->db->query($sql);	
		}
	}
		
	public function clean_winners()
	{
		$this->redirect_login();
		if(minDiff($this->company_model->winners_close_date,$this->today) > 0)
		{
			$sql = "DELETE FROM prognostics_winners WHERE user_id = '".$this->user_id."'";
			$this->db->query($sql);	
		}
	}

	public function save_qualys()
	{
		$this->redirect_login();
		$post = $this->input->post();
		$out['valid'] = false;
		
		if(minDiff($this->company_model->qualys_close_date,$today) < 0)
		{
			$out['error'] = var_lang('qualy-no-refund',dateFormat($this->company_model->qualys_close_date,"d/m/Y H:i:s"));		
		}
		
		$prev_teams = array();
		$this->load->model("admin/team_model");
		foreach($post['qualy_ids'] as $i => $team_id)
		{
			if(!(int)$team_id)
			{
				$out['error'] = lang("choose-all-qualys");
				echo json_encode($out);
				return;	
			}
			if(in_array($team_id, $prev_teams))
			{
				$out['error'] = lang("qualys-no-repeat");
				echo json_encode($out);
				return;					
			}
			array_push($prev_teams,$team_id);
			$team = new Team_model();
			$team->get((int)$team_id);
			
			$team_info .= $i.",".$team->name.",".$team->team_flag."|";
		}

		
		$sql = "REPLACE INTO prognostics_qualys VALUES('".$this->user_id."','".$this->username."','".$this->company_model->get_id()."','".$this->company_model->name."',
				'".implode("','",$post['qualy_ids'])."','0','".$team_info."', NOW())";
		$this->db->query($sql);
		$out['valid'] = true;
		$this->session->set_flashdata('message', lang("qualy-success"));
		
		echo json_encode($out);
		return;
	}
		
	public function save_winners()
	{
		$this->redirect_login();
		$post = $this->input->post();
		$out['valid'] = false;

		if(minDiff($this->company_model->winners_close_date,$this->today) < 0)
		{
			
			$out['error'] = var_lang("winners-no-refund",dateFormat($this->company_model->winners_close_date,"d/m/Y H:i:s"));
			echo json_encode($out);
			return;
			
		}
		
		if(!(int)$post['winner1_id'] || !(int)$post['winner2_id'] || !(int)$post['winner3_id'])
		{
			
			$out['error'] = lang("winners-all-three");
			echo json_encode($out);
			return;
		}
		
		if(((int)$post['winner1_id'] == (int)$post['winner2_id'])||((int)$post['winner1_id'] == (int)$post['winner3_id']) || ((int)$post['winner2_id'] == (int)$post['winner3_id']))
		{
			
			$out['error'] = lang('winners-diff');
			echo json_encode($out);
			return;
		}
		$this->load->model("admin/team_model");
		
		$team1 = new Team_model();
		$team2 = new Team_model();
		$team3 = new Team_model();
		
		if(!$team1->get((int)$post['winner1_id']) || !$team2->get((int)$post['winner2_id']) || !$team3->get((int)$post['winner3_id']))
		{
			
			$out['error'] = lang('winners-error');
			echo json_encode($out);
			return;		
			
		}
		
		$sql = "REPLACE INTO prognostics_winners VALUES('".$this->user_id."','".$this->username."','".$this->company_model->get_id()."','".$this->company_model->name."','".$team1->get_id()."','".$team1->name."','".$team1->team_flag."','".$team2->get_id()."','".$team2->name."','".$team2->team_flag."','".$team3->get_id()."','".$team3->name."','".$team3->team_flag."', '0', NOW())";
		$this->db->query($sql);
		$out['valid'] = true;
		$this->session->set_flashdata('message', lang('winners-save-ok'));
		echo json_encode($out);
		
		return;
	}
	
	public function send_comment()
	{
		$this->redirect_login();
		$post = $this->input->post();
		
		$sql = "INSERT INTO wall (comment, user_id, username, company_id, active, date_created)
				VALUES('".addslashes($post['new_wall_post'])."','".$this->user_id."','".$this->fullname."','".$this->company_model->get_id()."',1,NOW())";
		$this->db->query($sql);
		$out['post_id'] = $this->db->insert_id();
		$out['valid'] = true;
		$out['username'] =  $this->fullname;
		$out['hour'] = date("H:i");
		$out['comment'] = $post['new_wall_post'];
		echo json_encode($out);
	}
	
	public function comment_post($post_id)
	{
		$this->redirect_login();
		$out['valid'] = false;
		$sql = "SELECT company_id FROM wall WHERE comment_id = '".(int)$post_id."'";
		
		$row = $this->db->query($sql)->row();
		if(!(int)$row->company_id || ((int)$row->company_id != $this->company_model->get_id()))
		{
			$out['error'] = "No se pudo guardar el comentario. por favor inténtalo denuevo";
			echo json_encode($out);
			return;	
		}
		$post = $this->input->post();
		if(!trim($post['post_comment']))
		{
			$out['error'] = "El comentario está vacío.";
			echo json_encode($out);
			return;	
		}
		$sql = "INSERT INTO wall_comments (post_id, user_id, username, comment, date_created)
				VALUES('".(int)$post_id."','".$this->user_id."','".$this->fullname."','".addslashes($post['post_comment'])."',NOW())";
		$this->db->query($sql);
		$out['valid'] = true;
		$out['comment'] = $post['post_comment'];
		$out['post_id'] = (int)$post_id;
		$out['date_created'] = date("d/m/Y H:i");
		$out['username'] = $this->username;
		echo json_encode($out);
			return;	
	}
	
	public function register()
	{
		$out['valid'] = 0;
		$this->form_validation->set_rules("email", "Email", "required");	
		$this->form_validation->set_message('required', lang("complete-email-field"));
		$register_email = addslashes($this->input->post('email')).($this->company_model->register_domain ? "@".$this->company_model->register_domain : "");
		
		if(!$this->form_validation->run())
		{
			$out['error'] = form_error('email');	
		}
		else
		{
			$sql = "SELECT * FROM bitauth_users WHERE username = '".$register_email."' AND company_id = '".$this->company_model->get_id()."'";
			$row = $this->db->query($sql)->row();

			if($row->active)
			{
				$out['error'] = "Ya existe un usuario con el e-mail ".$this->input->post('email').". Si olvidaste tu clave clickeá <a href='".$this->data['link_url']."olvide-mi-clave'>acá</a>";	
				echo json_encode($out);
				return;
			}
			else
			{
				$this->session->set_userdata('register_email',$register_email);
				$this->session->set_userdata('prev_registered_id',$row->user_id);
				$out['valid'] = true;
			}
		}
		echo json_encode($out);
		return;
	}
	
	public function validate_create_league()
	{
		$out['valid'] = false;
		$this->redirect_login();
		$this->form_validation->set_rules("name", lang("Nombre de liga"), "required|alpha_numeric_space");
		if(!$this->form_validation->run())
		{
			$out['error'] = form_error('name');	
		}
		else
		{
			$league_name = $this->input->post('name');
			$sql = "SELECT * FROM friends_leagues WHERE name = '".addslashes($league_name)."' AND company_id = '".$this->company_model->get_id()."'";
			
			if($this->db->query($sql)->num_rows())
			{
				$out['error'] = var_lang('existent-league',$league_name);
			}
			else
			{	
				$sql = "INSERT INTO friends_leagues (name, company_id, company, creator_id, creator_name)
						VALUES ('".addslashes($league_name)."','".$this->company_model->get_id()."','".$this->company_model->name."','".$this->user_id."','".$this->bitauth->fullname."')";	
				$this->db->query($sql);
				$league_id = $this->db->insert_id();
				$sql = "INSERT INTO friends_leagues_users (league_id, league, confirmed, user_id, fullname)
						VALUES ('".$league_id."','".addslashes($league_name)."',1,'".$this->user_id."','".$this->bitauth->fullname."')";
				$this->db->query($sql);
				$out['valid'] = 1;
				$out['message'] = var_lang("league-created",$league_name);
			}
		}
		echo json_encode($out);
		return;	
	}
	
	public function validate_join_league()
	{
		$out['valid'] = false;
		$this->redirect_login();

		$league_id = (int)$this->input->post("league_id");
		if(!$league_id)
		{
			$out['error'] = lang('non-existent-league');
			
		}
		else	
		{
			$sql = "SELECT * FROM friends_leagues WHERE league_id = '".$league_id."' AND company_id = '".$this->company_model->get_id()."'";
			$league = $this->db->query($sql)->row();
			if(!$league->league_id)
			{
				$out['error'] = lang('non-existent-league');	
			}
			else
			{
				$sql = "SELECT * FROM friends_leagues_users WHERE user_id = '".$this->user_id."' AND league_id = '".$league_id."'";
				$result = $this->db->query($sql);
				if($result->num_rows())
				{
					$row = $result->row();
					$out['error'] = lang('already-in-league').(!$row->confirmed ? ". ".lang('wait-for-league-confirm').". " : "");	
					
				}
				else
				{
					$sql = "INSERT INTO friends_leagues_users (league_id, league, confirmed, user_id, fullname)
							VALUES ('".$league_id."','".$league->name."',0,'".$this->user_id."','".$this->bitauth->fullname."')";
					$this->db->query($sql);
					$sql = "UPDATE friends_leagues SET notifications = notifications + 1 WHERE league_id = '".$league_id."'";
					$this->db->query($sql);
					$out['valid'] = 1;
					$out['message'] = var_lang('league-notify-join',$league->creator_name);	
				}
			}
		}
		echo json_encode($out);
		return;	
	}
	
	public function accept_in_league($league_id, $user_id)
	{
		$out['valid'] = 0;
		$sql = "SELECT * FROM friends_leagues WHERE league_id = '".(int)$league_id."'";
		$league = $this->db->query($sql)->row();
		if(!$league->league_id || ($league->creator_id != $this->user_id))
		{
			$out['error'] = lang('non-existent-league');
			echo json_encode($out);	
		}
		
		$sql = "UPDATE friends_leagues_users SET confirmed = 1 WHERE user_id = '".(int)$user_id."' AND league_id = '".$league_id."'";
		$this->db->query($sql);
		$out['valid'] = 1;
		echo json_encode($out);
		return;
	}
	
	public function decline_in_league($league_id, $user_id)
	{
		$out['valid'] = 0;
		$sql = "SELECT * FROM friends_leagues WHERE league_id = '".(int)$league_id."'";
		$league = $this->db->query($sql)->row();
		if(!$league->league_id || ($league->creator_id != $this->user_id))
		{
			$out['error'] = lang('non-existent-league');
			echo json_encode($out);	
		}
		
		$sql = "UPDATE friends_leagues_users SET confirmed = -1 WHERE user_id = '".(int)$user_id."' AND league_id = '".$league_id."'";
		$this->db->query($sql);
		$out['valid'] = 1;
		echo json_encode($out);
		return;	}	
	
}