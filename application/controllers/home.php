<?
require_once(dirname(__FILE__)."/front_init.php");
class Home extends Front_init
{
	public function __construct()
	{	
		parent::__construct();
		$this->data['company_id'] = 1;
		$this->data['company'] = "BambooDev";
	}
	
	public function index()
	{
		$this->data['section'] = "home";
		$this->load->view("front/index.php", $this->data);
	}
	
	public function logout()
	{
		$this->data['section'] = "home";
		$this->bitauth->logout();
		redirect($this->data['link_url']);
	}
	
	public function complete_register()
	{
		$this->load->library('simple_captcha');
		$this->data['section'] = "complete_register";
		$sql = "SELECT * FROM bitauth_users WHERE user_id = '".(int)$this->session->userdata('prev_user_id')."'";
		$result = $this->db->query($sql)->result_array();
		$this->data['login_user']['username'] = $this->session->userdata('register_email');
		$this->data['login_user']['email'] = $this->data['login_user']['username'];
		$this->load->view("front/register.php", $this->data);			
	}
	
	public function language($lang)
	{
		$this->redirect_login();
		$langs = array("AR","MX","PR","US");
		if(in_array($lang,$langs))
		{
			$sql = "UPDATE bitauth_users SET user_language = '".addslashes($lang)."' WHERE user_id = '".$this->user_id."'";	
			$this->db->query($sql);
			
			$this->session->set_userdata('lang',addslashes($lang));	
			$this->session->set_userdata('chosen_lang',addslashes($lang));
			$this->bitauth->user_language = addslashes($lang);
		}
		redirect($this->data['link_url']."pronosticos");
			
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

	public function badges()
	{
		$this->redirect_login();
		$this->data['badges_descriptions'][] =  array("name" => lang("Mejor de la fecha"),"desc" => lang('mejor-desc'), "img" => "mejor.png");
		$this->data['badges_descriptions'][] =  array("name" => lang("Peor de la fecha"),"desc" => lang('peor-desc'), "img" => "peor.png");
		$this->data['badges_descriptions'][] =  array("name" => lang("Antifutbol"),"desc" => lang('anti-desc'), "img" => "antifutbol.png"); 
		$this->data['badges_descriptions'][] =  array("name" => lang("Rey Grupo"),"desc" => lang('king-desc'), "img" => "rey.png");
		$this->data['badges_descriptions'][] =  array("name" => lang("Jogo Bonito"),"desc" => lang('jogo-desc'), "img" => "jogobonito.png");

		if($this->company_model->super_patriot)
		{
			$this->data['badges_descriptions'][] =  array("name" => lang("Súper Argentino"),"desc" => lang('super-desc'), "img" => lang("super_argentino").".png");
		}
		$this->data['badges_descriptions'][] =  array("name" => lang("Tortuga"),"desc" => lang('tortuga-desc'), "img" => "tortuga.png");
		if($this->company_model->patriot_seller)
		{
			$this->data['badges_descriptions'][] =  array("name" => lang("Vendepatria"),"desc" => lang('vende-desc'), "img" => lang("vendepatria_arg").".png");
		}
		$this->data['badges_descriptions'][] =  array("name" => lang("Vidente"),"desc" => lang('vidente-desc'), "img" => "vidente.png");	
		
		$this->load->view("front/badges.php", $this->data);
	}
	
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
	
	public function first_round()
	{
		$sql = "SELECT * FROM matches ORDER BY match_id ASC";
		$this->data['matches_zone'] = $this->db->query($sql)->result_array();
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
		$this->first_round();
		$this->get_teams_positions();
		$this->load->view("front/bet_by_date.php",$this->data);				
	}
	
	public function validate_matches_form()
	{
		$this->redirect_login();
		/*
		$post = $this->input->post();
		$sql = "INSERT INTO prognostics (tournament_id, tournament, match_id, matchname, user_id, team1_goals, team2_goals, result, username) VALUES";
		$result = -2;
		$rows = array();
		foreach($post['match'] as $match_id => $match)
		{
			$result = (int)$match['team1'] > (int)$match['team2'] ? -1 : ((int)$match['team1'] < (int)$match['team2'] ? 1 : 0);
			if($match['team1'] != "")
			{
				$rows[] = "(1,'Mundial 2014','".(int)$match_id."','".mysql_escape_string($match['matchname'])."','".$this->user_id."','".(int)$match['team1']."','".(int)$match['team2']."','".$result."','".$this->username."')";
			}
		}
		if(count($rows))
		{
			$sql .= implode(",",$rows )." ON DUPLICATE KEY UPDATE team1_goals = VALUES(team1_goals), team2_goals = VALUES(team2_goals), result = VALUES(result)";
		}
		$this->db->query($sql);
		*/
		$output['valid'] = 1;
		echo json_encode($output);		
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
		if($this->company_model->qualys)
		{
			$phases[] = "qualys";	
		}
		if($this->company_model->winners)
		{
			$phases[] = "starter";	
		}
		$phases[] = "initial";
		if(!$phase)
		{
			$phase = $this->session->userdata('starter_used') ? "final" : $phases[0];
			$this->session->set_userdata('starter_used',true);
		}

		switch($phase)
		{
			case "initial":
							$this->bet_by_date();
							break;
			case "final":
							$this->bet_finals();
							break;
			case "starter":
							$this->bet_starter();
							break;
			case "qualys":
							$this->bet_qualys();
		}
	}
	
	public function bet_qualys()
	{
		$sql = "SELECT * FROM prognostics_qualys WHERE user_id = '".$this->user_id."'";
		$result = $this->db->query($sql)->result_array();
		$this->data['qualys'] = $result[0];
		
		if(is_array($this->data['qualys']))
		{
			$teams_info = $this->data['qualys']['teams_info'];
			$teams_info = explode("|",$teams_info);
			foreach($teams_info as $info)
			{
				$info = explode(",",$info);
				$this->data['qualy']['team'.$info[0]."_id"] = $this->data['qualys']['team'.$info[0]."_id"];
				$this->data['qualy']['team'.$info[0]."_name"] = $info[1];
				$this->data['qualy']['team'.$info[0]."_flag"] = $info[2];
			}
			$this->data['qualys_completed'] = true;
		}		
		
		
		$sql = "SELECT * FROM teams ORDER BY zone ASC, name ASC";
		$result = $this->db->query($sql)->result_array();
		$this->data['teams'] = array();
		foreach($result as $row)
		{
			$this->data['zones'][$row['zone']][$row['team_id']] = $row;
		}
		$this->data['phase'] = "qualys";
		$this->load->view("front/prequalified.php",$this->data);
	}
	
	public function bet_starter()
	{
		$sql = "SELECT * FROM teams ORDER BY name ASC";
		$this->data['teams'] = $this->db->query($sql)->result_array();
		
		$sql = "SELECT * FROM prognostics_winners WHERE user_id = '".$this->user_id."'";
		$this->data['winners'] = $this->db->query($sql)->result_array();
		
		
		$this->data['winners'] = $this->data['winners'][0];
		if(is_array($this->data['winners']) && $this->data['winners']['winner1_id'] && $this->data['winners']['winner2_id'] && $this->data['winners']['winner3_id'])
		{
			$this->data['winners_completed'] = true;
		}

		/*
		$this->data['teams'] = array();
		$i = 0;
		foreach($result as $row)
		{
			$this->data['teams'][$i]['text'] = $row['name'];
			$this->data['teams'][$i]['value'] = $row['team_id'];
			$this->data['teams'][$i]['selected'] = false;
			//$this->data['teams'][$i]['description'] = $row['zone'];
			$this->data['teams'][$i]['imageSrc'] = $row['team_flag'];
			$i++;
		}*/		
		$this->data['phase'] = "starter";

		$this->load->view("front/bet_initial.php",$this->data);
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
	
	public function scores($type = "", $id = "", $name = "",$offset = 0)
	{
		
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
				
		if($this->company_model->dept_league)
		{
			$sql = "SELECT * FROM company_departments WHERE company_id = '".$this->company_model->get_id()."' ORDER BY department ASC";
			$this->data['departments'] = $this->db->query($sql)->result_array();
		}
		
		if($this->company_model->branch_league)
		{
			$sql = "SELECT * FROM company_branches  WHERE company_id = '".$this->company_model->get_id()."' ORDER BY branch ASC";
			$this->data['branches'] = $this->db->query($sql)->result_array();
		}
		
		$this->data['offset'] = $offset;

		switch($type)
		{
			case "amigos":
						
						$sql = "SELECT COUNT(*) AS total FROM scores WHERE user_id IN (SELECT user_id FROM friends_leagues_users WHERE league_id = '".(int)$id."' AND confirmed = 1)";
						
						$total_rows = $this->db->query($sql)->row()->total;
						
						$sql = "SELECT * FROM scores 
								WHERE user_id IN (SELECT user_id FROM friends_leagues_users WHERE league_id = '".(int)$id."' AND confirmed = 1)
								ORDER BY points DESC, username ASC LIMIT ".$offset.",100";
						$this->data['players'] = $this->db->query($sql)->result_array();
												
						break;				
						
			
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
			case "dept":
						$condition =  "AND department_id = '".(int)$id."'";
						$sql = "SELECT * FROM scores WHERE company_id = '".$this->company_id."' ".$condition." ORDER BY points DESC, username ASC LIMIT ".$offset.",100";
						$this->data['players'] = $this->db->query($sql)->result_array();
						break;
			case "branch":
						$condition =  "AND branch_id = '".(int)$id."'";
						$sql = "SELECT * FROM scores WHERE company_id = '".$this->company_id."' ".$condition." ORDER BY points DESC, username ASC LIMIT ".$offset.",100";
						$this->data['players'] = $this->db->query($sql)->result_array();
						break;
			case "all-dept":
						$sql = "SELECT department, SUM(points) AS points, SUM(results) AS results, SUM(exact_results) AS exact_results, GROUP_CONCAT(badges SEPARATOR '|') AS badges
								FROM scores WHERE company_id = '".$this->company_id."' GROUP BY department ORDER BY SUM(points) DESC LIMIT 0,20";
						$this->data['players'] = $this->db->query($sql)->result_array();
						break;
			case "all-branch":
						$sql = "SELECT * FROM company_branches WHERE company_id = '".$this->company_model->get_id()."'";
						$branches = $this->db->query($sql)->result();
						
						foreach($branches as $branch)
						{
							$sql = "SELECT p.branch, p.branch_id, SUM(p.points) AS points, SUM(p.results) AS results, SUM(p.exact_results) AS exact_results, GROUP_CONCAT(p.badges SEPARATOR '|') AS badges
									FROM (SELECT * FROM scores WHERE company_id = '".$this->company_id."' AND branch_id = '".$branch->branch_id."' ORDER BY points DESC LIMIT 0,10) AS p GROUP BY p.branch_id";				

							
							$row = $this->db->query($sql)->row_array();
							
							$branch_points[$row['points']][$row['branch_id']] = $row;  
						
						}
						krsort($branch_points);
						foreach($branch_points as $branch_id)
						{
							foreach($branch_id as $branch)
							{
								$this->data['players'][] = $branch;	
							}
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

		$config['base_url'] = $base_url;
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
		
	public function prognostics_completed()
	{
		$this->redirect_login();
		$this->data['section'] = 'bet_completed';
		$this->first_round();
	}
	
	public function how_to_play($link = "image")
	{
		$this->redirect_login();
		$this->data['link'] = $link;
		$this->data['section'] = 'how-to';
		$this->load->view("front/how_to_play.php",$this->data);
	}
	
	public function create_friends_league()
	{
		$this->redirect_login();
		$this->data['section'] = 'friends_league';
		$this->data['sub_section'] = 'create_friends_league';
		$this->load->view("front/create_friends_league.php",$this->data);	
	}
	public function join_friends_league()
	{
		$this->redirect_login();
		$this->data['section'] = 'friends_league';
		$this->data['sub_section'] = 'join_friends_league';
		
		$sql = "SELECT * FROM friends_leagues WHERE company_id = '".$this->company_model->get_id()."'";
		$this->data['join_leagues'] = $this->db->query($sql)->result_array();
		
		$this->load->view("front/join_friends_league.php",$this->data);	
	}
	
	public function friends_league($league_id)
	{
		$this->redirect_login();
		$this->data['section'] = 'friends_league';
		$this->data['sub_section'] = 'view_league';
		$this->load->model("admin/friend_league_model");
		
		$sql = "SELECT * FROM friends_leagues WHERE league_id = '".(int)$league_id."' AND company_id = '".$this->company_model->get_id()."'";
		
		$league = $this->db->query($sql)->row();

		if(!(int)$league_id || !($league->name))
		{
			$this->data['error'] = lang('non-existent-league');	
			$this->load->view("front/friends_league.php", $this->data);
			return;
		}
		
		if($league->creator_id == $this->user_id)
		{
			$sql = "UPDATE friends_leagues SET notifications = 0 WHERE league_id = '".$league->league_id."'";
			$this->db->query($sql);
			$this->get_friends_league_notifications();	
		}
		
		$this->data['in_league'] = $league->name;
		$this->data['f_league'] = $league;
		$this->data['is_moderator'] = $league->creator_id == $this->user_id;
		
		$sql = "SELECT * FROM friends_leagues_users WHERE league_id = '".(int)$league_id."' AND confirmed = 1";
		$this->data['confirmed_users'] = $this->db->query($sql)->result_array();
		
		if($this->data['is_moderator'])
		{
			$sql = "SELECT * FROM friends_leagues_users WHERE league_id = '".(int)$league_id."' AND confirmed = 0";
			$this->data['non_confirmed_users'] = $this->db->query($sql)->result_array();
		}
		
		$this->load->view("front/friends_league.php", $this->data);
	}
}