<?
require_once(dirname(__FILE__)."/front_init.php");
class Home extends Front_init
{
	public function __construct()
	{	
		parent::__construct();
	}
	
	public function index()
	{
		$this->data['section'] = "home";
		$this->load->view("front/index.php", $this->data);
	}

	public function comprar()
	{
		$this->data['section'] = "comprar";
		$this->load->view("front/comprar.php", $this->data);
	}
	
	public function logout()
	{
		$this->data['section'] = "home";
		$this->bitauth->logout();
		redirect($this->data['link_url']);
	}
	
	public function complete_register()
	{
        if (!$this->is_company_available($this->session->userdata('register_code')))
        {
            redirect('/');
            die();
        }
	    $this->load->library('simple_captcha');
		$this->data['section'] = "complete_register";
		$sql = "SELECT * FROM bitauth_users WHERE user_id = '".(int)$this->session->userdata('prev_user_id')."'";
		$result = $this->db->query($sql)->result_array();
		$this->data['login_user']['username'] = $this->session->userdata('register_email');
		$this->data['login_user']['email'] = $this->data['login_user']['username'];
		$this->load->view("front/register.php", $this->data);
	}

	public function edit_company()
	{
        $this->redirect_admin();
	    $this->data['section'] = "edit_company";
		$this->load->view("front/edit_company.php", $this->data);
	}

    public function view_company()
    {
        $this->redirect_admin();
        $this->data['section'] = "view_company";
        $this->load->view("front/view_company.php", $this->data);
    }


	public function language($lang)
	{
		//$this->redirect_login();
		$langs = array("AR","MX","PR","US");
		if(in_array($lang,$langs))
		{
		    if($this->user_id)
            {
                $sql = "UPDATE bitauth_users SET user_language = '".addslashes($lang)."' WHERE user_id = '".$this->user_id."'";
                $this->db->query($sql);
                $this->bitauth->user_language = addslashes($lang);
            }

			$this->session->set_userdata('lang',addslashes($lang));	
			$this->session->set_userdata('chosen_lang',addslashes($lang));

		}
		redirect($_SERVER['HTTP_REFERER']);
			
	}
	
	public function confirm_account($confirm_code)
	{
		$confirm_id = explode("-",$confirm_code);
		$confirm_id = $confirm_id[0];
		
		$this->load->model("user_model","confirm_model");
		if(!(int)$confirm_id || !$this->confirm_model->get((int)$confirm_id) || ($confirm_code != $this->get_confirm_code($this->confirm_model->get_id())))
		{
			$this->data['message'] = lang("no-confirm");	
		}
		else
		{
			$this->confirm_model->set_field('email_confirmed',1);
			$this->confirm_model->set_field('active',1);
			$this->confirm_model->set_field('enabled',1);
			$this->confirm_model->update();
			$this->data['message'] = lang("account-confirmed");
		}
		
		$this->load->view("front/confirm_account.php",$this->data);
	}
	
	public function login()
	{
		$this->data['section'] = "home";
		$this->load->view("front/index.php", $this->data);
	}	
	
	public function first_login()
	{
		$this->load->library('simple_captcha');
		$this->data['section'] = "first_login";
		$sql = "SELECT * FROM bitauth_users WHERE user_id = '".(int)$this->session->userdata('prev_user_id')."'";
		$result = $this->db->query($sql)->result_array();
		$this->data['login_user'] = $result[0];
		$this->load->view("front/first_login.php", $this->data);
	}

	/*
	public function company($company)
	{
		$this->session->set_userdata('keep_company',true);
		$sql = "SELECT * FROM companies WHERE namespace = '".$this->security->xss_clean($company)."'";
		$query = $this->db->query($sql);
		
		if($query->num_rows())
		{
			$result = $query->result_array();	
			$this->company_model->set($result[0]);
			$this->company_model->get_files();
			$this->set_company();
		}
		else
		{
			echo "No existe la empresa";
			return;			
		}
		$this->data['no_company'] = false;
		$this->index();
	}
	*/

	public function get_teams_positions()
	{
		$this->redirect_login();
		$sql = "SELECT * FROM teams ORDER BY zone ASC, pts DESC";
		$this->data['team_positions'] = $this->db->query($sql)->result_array();	
	}
	
	public function wall($page = 1)
	{
		$this->redirect_login();
		if($page <= 1)
		{
			$offset = 0;
		}
		else
		{
			$offset = ($page -1)*25;
		}
		$this->data['page'] = (int)$page + 1;
		
		$sql = "SELECT w.*, COUNT(wc.comment_id) AS total_comments, GROUP_CONCAT(CONCAT(wc.comment_id,'|-|',wc.user_id,'|-|',wc.username,'|-|',wc.comment,'|-|',wc.date_created) ORDER BY wc.date_created ASC SEPARATOR '|//|') AS comments
				FROM wall AS w LEFT JOIN wall_comments AS wc ON (wc.post_id = w.comment_id)
				WHERE w.company_id = '".$this->company_model->get_id()."' GROUP BY w.comment_id ORDER BY w.date_created DESC LIMIT ".$offset.", 25";
		$this->data['section'] = "wall";
		$this->data['wall_posts'] = $this->db->query($sql)->result_array();
		$this->load->view("front/wall.php",$this->data);
	}

	public function bet_by_date()
	{
		$this->data['phase'] = "initial";
		$sql = "SELECT * FROM matches WHERE phase = 'zone' ORDER BY date_played ASC";
		$this->data['matches'] = $this->db->query($sql)->result_array();

		$sql = "SELECT * FROM prognostics WHERE user_id = '".$this->user_id."'";
		$matches_completed = $this->db->query($sql)->result_array();
		foreach($matches_completed as $match)
		{
			$this->data['matches_completed'][$match['match_id']] = $match; 	
		}
        $sql = "SELECT * FROM matches WHERE phase = 'zone' ORDER BY zone ASC, match_id ASC";
        $this->data['matches_zone'] = $this->db->query($sql)->result_array();

		$this->get_teams_positions();
		$this->load->view("front/bet_by_date.php",$this->data);				
	}

	public function prognostics($phase = "",$saved = "")
	{
		$this->redirect_login();
		
		if($saved)
		{
			$this->data['saved'] = true;
			$this->data['message'] = $this->session->flashdata('message');
			$this->data['message'] = $this->data['message'] ? $this->data['message'] : "Tu pronóstico fue guardado con éxito";	
		}
		$this->data['section'] = 'bet';
		$phases = array();

		$phases[] = "initial";
		if(!$phase)
		{
			$phase = "initial";
		}

		switch($phase)
		{
			case "initial":
							$this->bet_by_date();
							break;
			case "final":
							$this->bet_finals();
							break;
		}
	}
	
	public function bet_finals()
	{
		$this->data['phase'] = "final";

		$sql = "SELECT * FROM matches WHERE phase != 'zone' ORDER BY phase_order ASC";
		$matches = $this->db->query($sql)->result_array();
		
		foreach($matches as $match)
		{
			$this->data['matches'][$match['phase']][$match['phase_order']] = $match;	
		}
		
		$sql = "SELECT * FROM prognostics WHERE user_id = '".$this->user_id."'";
		$matches_completed = $this->db->query($sql)->result_array();
		foreach($matches_completed as $match)
		{
			$this->data['matches_completed'][$match['match_id']] = $match; 	
		}	
		$this->load->view("front/bet_finals.php",$this->data);
	}
	
	public function first_round_completed()
	{
		$sql = "SELECT * FROM matches ORDER BY match_id ASC";
		$this->data['matches'] = $this->db->query($sql)->result_array();
		$sql = "SELECT * FROM prognostics WHERE user_id = '".$this->user_id."'";
		$matches_completed = $this->db->query($sql)->result_array();
		foreach($matches_completed as $match)
		{
			$this->data['matches_completed'][$match['match_id']] = $match; 	
		}	
		$this->load->view("front/first_round_completed.php",$this->data);			
	}
	
	public function profile($id = "")
	{
		$this->redirect_login();
		$id = $id ? $id : $this->user_id;
		
		$this->load->model("user_model","user_profile");
		
		$this->user_profile->get($id);
		$this->load->view("front/profile.php",$this->data);
	}
	
	public function edit_profile()
	{
		$this->redirect_login();
		$id = $this->user_id;
		$this->data['section'] = "edit_profile";
		
		$this->load->model("user_model","user_profile");
		
		$this->user_profile->get($id);
		
		$this->load->view("front/profile_edit.php",$this->data);
	}

    public function players()
    {
        $this->data['section'] = "players_list";
        $this->redirect_admin();
        $sql = "SELECT u.email, u.fullname, u.user_id, DATE_FORMAT(u.date_created,'%d/%m/%Y') AS date_joined, CONCAT(u.user_id,'||',MD5(CONCAT(u.user_id,'".$this->data['salt']."',u.email))) AS player_code, COUNT(p.prognostic_id) AS total_prognostics
                FROM bitauth_users AS u LEFT JOIN prognostics AS p ON (p.user_id = u.user_id)
              WHERE u.company_id = '".$this->company_id."' AND hide_stats = 0 AND deleted = 0 AND u.group_id = '3' GROUP BY u.user_id ORDER BY u.fullname ASC";

        $result = $this->db->query($sql);
        $this->data['players'] = $result->result_array();
        $this->data['total_players'] = $result->num_rows();
        $this->data['total_player_slots'] = $this->company_model->total_player_slots;

        $this->load->view("front/players.php",$this->data);

    }


    public function delete_player($player_code)
    {
        $output['valid'] = false;
        $player_code = explode("||",urldecode($player_code));
        $player_id = $player_code[0];
        $input_player_salt = $player_code[1];

        $sql = "SELECT user_id, email FROM bitauth_users WHERE user_id = '".(int)$player_id."'";
        $player = $this->db->query($sql)->row();

        $real_player_salt = md5($player->user_id.$this->data['salt'].$player->email);

        if($real_player_salt == $input_player_salt)
        {
            $sql = "UPDATE bitauth_users SET deleted = 1 WHERE user_id = '".(int)$player_id."'";
            $this->db->query($sql);
            $sql = "DELETE FROM scores WHERE user_id = '".(int)$player_id."'";
            $this->db->query($sql);
            $output['id'] = (int)$player_id;
            $output['valid'] = true;
        }
        else
        {
            $output['error'] = lang('Código de usuario incorrecto');

        }
        echo json_encode($output);
        return;
    }
	public function scores($type = "", $id = "", $name = "",$offset = 0)
	{
		if($this->session->userdata('user-first-login'))
		{
			$this->data['user_first_login'] = true;
			$this->session->unset_userdata('user-first-login');
		}
		
		$this->redirect_login();
		$this->data['section'] = "scores";
		$this->data['league_type'] = $type ? $type : "general"; 
		
		$sql = "SELECT * FROM scores_go";
		$go = $this->db->query($sql)->row();
		
		if(!$go->go)
		{
			$this->data['error'] = lang("processing-scores");
			$this->load->view("front/scores.php",$this->data);	
			return;
		}

		
		$this->data['offset'] = $offset;

		switch($type)
		{
			case "buscar":
						$this->data['league_type'] = "general";
						if($this->input->post("name"))
						{
							$sql = "SELECT x.user_id, x.position, x.username
									 FROM (SELECT s.user_id, s.username, @rownum := @rownum + 1 AS position
											  FROM scores AS s
											  JOIN (SELECT @rownum := 0) r
											  WHERE s.company_id = '".$this->company_id."'
										  	  ORDER BY s.points DESC, s.username ASC) x
									 WHERE x.username LIKE '%".addslashes($this->input->post("name"))."%'";
							
							$row = $this->db->query($sql)->row();
							
							if($row->user_id)
							{
								$offset = (int)($row->position/100)*100;	
								$this->data['offset'] = $offset;
								$sql = "SELECT COUNT(*) AS total FROM scores WHERE company_id = '".$this->company_id."'";
						
								$total_rows = $this->db->query($sql)->row()->total;
								
								$sql = "SELECT * FROM scores 
										WHERE company_id = '".$this->company_id."'
										ORDER BY points DESC, username ASC LIMIT ".$offset.",100";
								$this->data['players'] = $this->db->query($sql)->result_array();
								$this->data['marked_user_id'] = $row->user_id;
								$this->data['user_searched'] = $row;
								
							}
							else
							{
								$this->data['error'] = lang("player-not-found");	
							}
						}
						else
						{
							$this->data['error'] = lang("player-not-found");	
						}
						break;
			default: 
						$sql = "SELECT COUNT(*) AS total FROM scores WHERE company_id = '".$this->company_id."'";
						
						$total_rows = $this->db->query($sql)->row()->total;
						
						$sql = "SELECT * FROM scores 
								WHERE company_id = '".$this->company_id."'
								ORDER BY points DESC, username ASC LIMIT ".$offset.",100";
						$this->data['players'] = $this->db->query($sql)->result_array();
												
						break;
			
		}	
		
		if(!count($this->data['players']))
		{
			$this->data['error'] = lang("no-players");	
		}
		
		$this->load->library('pagination');

		$base_url = $this->data['link_url']."posiciones".($type ? "/".$type : "").($id ? "/".$id : "").($name ? "/".$name : "");

		$config['base_url'] = str_replace('/buscar','',$base_url);
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 100; 
		$config['uri_segment'] = 2;
		$config['num_links'] = 3;
		$config['first_link'] = lang("Primero");
		$config['last_link'] =  lang("Ultimo");
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		
		$this->pagination->initialize($config); 
		
		$this->data['pagination'] = $this->pagination->create_links();
		

		
		$this->load->view("front/scores.php",$this->data);
	}

	
	public function how_to_play($link = "image")
	{
		$this->redirect_login();
		$this->data['link'] = $link;
		$this->data['section'] = 'how-to';
		$this->load->view("front/how_to_play.php",$this->data);
	}

    public function prizes()
    {
        $this->redirect_login();
        $this->data['section'] = 'prizes';
        $this->load->view("front/prizes.php",$this->data);
    }

	public function promo_landing()
	{

		$this->load->view("front/promo-landing.php", $this->data);
	}

	public function checkout($prode)
	{
		$CI = &get_instance();
		$CI->config->load("mercadopago", TRUE);
		$config = $CI->config->item('mercadopago');
		$this->load->library('Mercadopago', $config);   

		switch ($prode) {
			case '15PERSONAS':
				$title = "Prode para 15 personas";
				$amount = 300;
				break;
			case '25PERSONAS':
				$title = "Prode para 25 personas";
				$amount = 500;
				break;

			case '50PERSONAS':
				$title = "Prode para 50 personas";
				$amount = 1000;
				break;

			case '100PERSONAS':
				$title = "Prode para 100 personas";
				$amount = 1500;
				break;

			case '400PERSONAS':
				$title = "Prode para 400 personas";
				$amount = 2500;
				break;

			case '1000PERSONAS':
				$title = "Prode para 1000 personas";
				$amount = 4000;
				break;
		}

		$preference_data = array (
			"items" => array (
					array (
							"title" => $title,
							"quantity" => 1,
							"currency_id" => "ARS",
							"unit_price" => $amount
					)
			)
		);
		
		$data['preference'] = $this->mercadopago->create_preference($preference_data);
		
		$this->load->view("front/checkout/mercadopago.php", $data );
	}

}