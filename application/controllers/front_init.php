<?
class Front_init extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->config->load('words');
		$this->data['link_url'] = base_url();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$this->data['today'] = $this->today = date("Y-m-d H:i:s");
		//$this->user_id = $this->bitauth->user_id;
		$this->load->model("admin/company_model","company_model");
		$this->facebook_site = $this->config->item('facebook_site');
		$this->get_company();
		if($this->bitauth->logged_in())
		{
			$this->data['user_id'] = $this->user_id = $this->bitauth->user_id;
			$this->data['username'] = $this->username = $this->bitauth->username;
			$this->data['fullname'] = $this->fullname = $this->bitauth->fullname;
			if($this->bitauth->displayname)
			{
				$this->shortname = $this->bitauth->displayname;
			}
			else
			{
				$this->shortname = explode(" ",$this->fullname);
				$this->shortname = $this->shortname[count($this->shortname) -1];				
			}
			$this->data['shortname'] = $this->shortname;

			if($this->session->userdata('chosen_lang'))
			{
				$this->bitauth->user_language = $this->session->userdata('chosen_lang');	
			}

			if($this->bitauth->user_language)
			{
				$this->session->set_userdata('lang',$this->bitauth->user_language);	
			}
		}
		else
		{
			if(!$this->company_model->users_activated)
			{
				$this->data['user_id'] = $this->user_id = $this->company_model->default_user_id;
				$this->data['username'] = $this->username = $this->company_model->name;			
				$this->data['fullname'] = $this->fullname = $this->company_model->name;
				$this->data['shortname'] = $this->shortname = $this->company_model->namespace;
			}
		}

		$this->data['badges_icons'] = array(
										1 => array("name" => lang("Antifutbol"), "icon" => "antifutbol.png", "img" => "antifutbol.png"),
										2 => array("name" => lang("Rey Grupo")." A", "icon" => "grupo_a.png", "img" => "rey.png"),
										3 => array("name" => lang("Rey Grupo")." B", "icon" => "grupo_b.png", "img" => "rey.png"),
										4 => array("name" => lang("Rey Grupo")." C", "icon" => "grupo_c.png", "img" => "rey.png"),
										5 => array("name" => lang("Rey Grupo")." D", "icon" => "grupo_d.png", "img" => "rey.png"),
										6 => array("name" => lang("Rey Grupo")." E", "icon" => "grupo_e.png", "img" => "rey.png"),
										7 => array("name" => lang("Rey Grupo")." F", "icon" => "grupo_f.png", "img" => "rey.png"),
										8 => array("name" => lang("Rey Grupo")." G", "icon" => "grupo_g.png", "img" => "rey.png"),
										9 => array("name" => lang("Rey Grupo")." H", "icon" => "grupo_h.png", "img" => "rey.png"),
										10 => array("name" => lang("Jogo Bonito"), "icon" => "jogobonito.png", "img" => "jogobonito.png"),
										11 => array("name" => lang("Mejor de la fecha"), "icon" => "mejor.png", "img" => "mejor.png"),
										12 => array("name" => lang("Peor de la fecha"), "icon" => "peor.png", "img" => "peor.png"),
										13 => array("name" => lang("Súper Argentino"), "icon" => lang("super_argentino").".png", "img" => lang("super_argentino").".png"),
										15 => array("name" => lang("Tortuga"), "icon" => "tortuga.png", "img" => "tortuga.png"),									
										16 => array("name" => lang("Vendepatria"), "icon" => lang("vendepatria_arg").".png", "img" => lang("vendepatria_arg").".png"),
										18 => array("name" => lang("Vidente"), "icon" => "vidente.png", "img" => "vidente.png"));


		
		$this->data['fields'] = array(	
										'namespace_disabled' => array(	'label' => lang('Nombre del Grupo / Name of the group'),
												'type' => 'text',
												'validation' => '',
												'disabled' => true,
												'visibility' => 'register_company'
										),
										
										'email' => array('label' => lang('Email<br> <span class="grey-label">Email</span>'),
														'type' => 'text',
														'validation' => 'valid_email|required',
														'visibility' => 'profile|edit_profile|first_login|register|register_company'
										),
										/*
										'username' => array(	'label' => lang('Email'),
															'type' => 'text',
															'validation' => '',
															'disabled' => 'true',
															'visibility' => 'profile|first_login|register'
															),
										*/
										
										'displayname' => array(	'label' => lang('Apodo<br> <span class="grey-label">Nickname</span>'),
															'type' => 'text',
															'validation' => 'required',
															'visibility' => 'profile|edit_profile|first_login|register|register_company'
															),
										'fullname' => array(	'label' => lang('Nombre Completo<br> <span class="grey-label">Full Name</spam>'),
															'type' => 'text',
															'validation' => 'required',
															'visibility' => 'profile|edit_profile|first_login|register|register_company'
															),
										'password' => array('label' => lang('Contraseña<br> <span class="grey-label">Password</span>'),
														'type' => 'password',
														'validation' => 'required|matches[passconf]',
														'visibility' => 'profile|first_login|register|forgot_pass|register_company'
														),
										'passconf' => array('label' => lang('Repetir contraseña<br> <span class="grey-label">Repeat Password</span>'),
														'type' => 'password',
														'validation' => 'required',
														'visibility' => 'profile|first_login|register|forgot_pass|register_company'
														),

										/*				
										COMPANY FIELDS
										*/
										
										'namespace' => array(	'label' => lang('Nombre del Grupo'),
											'type' => 'hidden',
											'validation' => 'required|alpha_dash',
											'visibility' => 'register_company'
										),
										'user_language'=> array(	'label' => 'Idioma<br> <span class="grey-label">Language</span>',
															'type' => 'select',
															'options' => array(0 => array("value" => "AR", "label" => "Español"),
																				1 => array("value" => "PR", "label" => "Portugues"),
																				2 => array("value" => "US", "label" => "English"),
																				),
															'validation' => '',
															'visibility' => 'company_register|register'
														),
										'main_image' => array(	'label' => 'Logo',
														'type' => 'image',
														'tag' => 'main_image',
														'validation' => '',
														'visibility' => 'company_register|company_edit',
														),
										);
		
		if($this->company_model->branch_league)
		{
			$this->data['fields']['branch_id'] = array(	'label' => lang('Sucursal'),
														'type' => 'select',
														'source_table' => 'company_branches',
														'source_index_id' => 'branch_id',
														'source_condition' => "company_id = '".$this->company_model->get_id()."'",
														'source_fields' => array("branch"),
														'validation' => '',
														'visibility' => 'first_login|register|edit_profile'
													);	
		}
		/*
		if($this->company_model->bio)
		{
			$this->data['fields']['bio'] = array(	'label' => lang('Bio'),
													'type' => 'textarea',
													'validation' => '',
													'visibility' => 'profile|edit_profile|first_login|register'
												);	
		}
		*/
		$this->form_validation->set_message('matches', '%s '.lang("y").' %s '.lang("deben ser iguales"));
		$this->form_validation->set_message('required', lang("complete-field"));
		$this->form_validation->set_message('valid_email', lang("valid-email"));
		$this->form_validation->set_message('alpha_numeric_space', lang("alpha-num"));
		
		
		$this->get_friends_league_notifications();
		$this->split_fields();
		$this->data['lang'] = $this->session->userdata('lang');
	}
	
	protected function redirect_login()
	{
		if($this->company_model->users_activated && !$this->bitauth->logged_in())
		{
			redirect($this->data['link_url']."log-in");
		}
	}

	protected function load_company()
	{
		$this->company_id = $this->session->userdata('company_id');
		
		//$this->company_model->set($this->session->userdata('company_data'));
		
		$this->company_model->get($this->company_id);
		$this->company = $this->company_model->name;		
		$this->session->set_userdata('login-redirect',0);
	}

	protected function set_company()
	{
		$this->company = $this->company_model->name;
		$this->session->set_userdata('lang',$this->company_model->country);	
		$this->company_id = $this->company_model->get_id();
		$this->session->set_userdata('company_id', $this->company_model->get_id());
		
		//$this->session->set_userdata('company_data',$this->company_model->db_fields());
		
		$this->session->set_userdata('login-redirect',0);
	}

	protected function get_company()
	{
		$server_name = explode(".",$_SERVER['SERVER_NAME']);
		$company = $server_name[0];
		
		if($this->session->userdata('keep_company') || ($this->session->userdata('namespace') == $company))
		{
			$this->load_company();
			return;
		}

		
		if(($company == "www") || ($company == "") || ($company == "local") || ($company == "prode"))
		{
			//$this->data['no_company'] = 1;
			$this->company_id = 1;
			$this->company_model->get($this->company_id);
			$this->set_company();
			$this->company = $this->company_model->name;
			return;	
		}

		$sql = "SELECT * FROM companies WHERE namespace = '".$this->security->xss_clean($company)."'";
		$query = $this->db->query($sql);
		
		if($query->num_rows())
		{
			$result = $query->result_array();	
			$this->company_model->set($result[0]);
			$this->company_model->get_files();
			$this->data['link_url'] = "http://".$_SERVER['SERVER_NAME']."/";
			$this->set_company();
		}
		else
		{
			$this->data['no_company'] = 1;
			if(!$this->session->userdata('login-redirect'))
			{
				$this->session->set_userdata('login-redirect',1);
				//redirect("log-in");		
			}
		}
		
		return;
	}

	public function clear_session()
	{
		$this->session->sess_destroy();	
	}

	public function load_contact()
	{
		if($this->contact_model && $this->contact_model->get_id())
		{
			return;	
		}
	}

	/*
	Splits the fields array into page_fields[$visible_page][field_id][field_attributes]
	*/
	protected function split_fields()
	{
		if(!is_array($this->data['fields'])) return 0;
		
		$file_types = array('image','video','archive');
		$this->data['page_fields'] = array();
		foreach($this->data['fields'] as $field_id => $attrs)
		{
			if($attrs['visibility'])
			{
				$visibilities = explode("|", $attrs['visibility']);
				foreach($visibilities as $visibility)
				{
					$this->data['page_fields'][$visibility][$field_id] = $attrs;	
				}
			}
			// insert file fields;
			if(in_array($attrs['type'],$file_types))
			{
				$this->file_fields[$field_id] = $attrs;
			}
		}
	}

	public function get_file_manager()
	{
		$this->load->model('admin/file_manager_model', 'file_manager');			
		if($this->form_model->file_manager_id && $this->file_manager->get($this->form_model->file_manager_id))
		{
			return;
		}
		else
		{
			$this->file_manager->create();
			$this->form_model->set_field('file_manager_id',$this->file_manager->get_id());
			$this->form_model->save();	
		}	
	}
		
	public function validate_contact_form($page)
	{
		$output['page'] = $page;
		$output['valid'] = false;
		
		foreach($this->data['page_fields'][$page] as $field_id => $field)
		{
			$this->form_validation->set_rules($field_id, $field['label'], $field['validation']);
		}			

		$this->data['post'] = $this->input->post();

		if($this->data['post']['branch_id'])
		{
			$sql = "SELECT branch FROM company_branches WHERE branch_id = '".(int)$this->data['post']['branch_id']."'";
			$row = $this->db->query($sql)->row();
			$this->data['post']['branch'] = $row->branch;
				
		}
		
		if(!$this->form_validation->run())
		{
			$output['valid'] = 0;

			foreach($this->data['page_fields'][$page] as $field_id => $field)
			{
				$output['errors'][$field_id] = form_error($field_id);
			}
		}
		else
		{
			$output['valid'] = true;
			
			switch($page)
			{
				case 'first_login':
									$this->load->model("user_model","form_model");
									if(!(int)$this->session->userdata('prev_user_id'))
									{
										$output['error'] = lang("no-prev-id");
										echo json_encode($output);
										return;
									}
									$this->form_model->get($this->session->userdata('prev_user_id'));
									break;
				case 'register':	
									$this->load->model("user_model","form_model");
									if(!$this->session->userdata('register_email'))
									{
										$output['error'] = lang("no-prev-id");
										echo json_encode($output);
										return;
									}
									$sql = "SELECT * FROM bitauth_users WHERE username = '".addslashes($this->session->userdata('register_email'))."' 
												AND company_id = '".$this->company_model->get_id()."'";
									$row = $this->db->query($sql)->row();
									$this->form_model->get($row->user_id);
									break;
				case 'register_company':	
									/* register company utils */
									$this->load->model("user_model","form_model");
									break;
				case 'edit_profile':
									$this->load->model("user_model","form_model");
									$this->form_model->get($this->bitauth->user_id);
									break;				
			
				case 'forgot_pass':
									$this->bitauth->set_password($this->bitauth->user_id, $this->data['post']['password']);	
									$output['message'] = lang('password-changed');
									$output['valid'] = true;
									echo json_encode($output);
									return;
									break;
			}
			
			if(!isset($output['valid']) || $output['valid'])
			{
				
				if ($page != 'register_company'){
					$this->form_model->set($this->data['post']);
				}
				/*
				if(is_array($_FILES))
				{
					$this->get_file_manager();
					$this->file_manager->upload($this->file_fields);
				}
				*/
				if($page == 'register_company' || $this->form_model->save())
				{
					$output['valid'] = 1;
					switch($page)
					{
						case 'edit_profile':
											$sql = "UPDATE scores SET username = '".$this->form_model->fullname."' WHERE user_id = '".$this->form_model->get_id()."'";
											$this->db->query($sql);
											break;
						
						case 'first_login':	if($this->company_model->confirm_email)
											{
												$this->form_model->set_field("active",0);
												$this->form_model->set_field("enabled",0);
											}
											else
											{
												$this->form_model->set_field("active",1);
												$this->form_model->set_field("enabled",1);
											}
											$this->form_model->set_field("group_id",3);
											$this->form_model->set_field("groups_names","Jugador");
											$this->form_model->set_field("company_id",$this->company_model->get_id());
											$this->form_model->set_field("company",$this->company_model->name);
											$pass = $this->bitauth->hash_password($this->data['post']['password']);
											$last_set = $this->bitauth->timestamp();
											$this->form_model->set_field("password",$pass);
											$this->form_model->set_field("password_last_set",$last_set);
											$this->form_model->update();
											if($this->form_model->email)
											{
												$this->send_register_email();
											}
											$this->bitauth->logout();
											$this->bitauth->login($this->form_model->username,$this->data['post']['password']);
											$output['message'] = lang('first-time-message-no-email');
											break;
						case 'register':	
											if($this->company_model->confirm_email)
											{
												$this->form_model->set_field("active",0);
												$this->form_model->set_field("enabled",0);
											}
											else
											{
												$this->form_model->set_field("active",1);
												$this->form_model->set_field("enabled",1);
											}
											$this->form_model->set_field("username",$this->data['post']['email']);
											
											$this->form_model->set_field("group_id",3);
											$this->form_model->set_field("groups_names","Jugador");
											$this->form_model->set_field("company_id",$this->company_model->get_id());
											$this->form_model->set_field("company",$this->company_model->name);
											$pass = $this->bitauth->hash_password($this->data['post']['password']);
											$last_set = $this->bitauth->timestamp();
											$this->form_model->set_field("password",$pass);
											$this->form_model->set_field("password_last_set",$last_set);
											
											$this->form_model->update();
											$this->bitauth->logout();
											$this->bitauth->login($this->form_model->username,$this->data['post']['password']);
											$this->send_register_email();
											$output['message'] = lang("register-message");
											break;
						case 'register_company':
											$this->company_model->set_field("namespace", $this->input->post('namespace'));
											$this->company_model->set_field("name", $this->input->post('namespace'));
											$this->company_model->set_field("active", 1);
											$this->company_model->save();
											$this->company_model->get_register_code();

											$this->form_model->set_field("active",1);
											$this->form_model->set_field("enabled",1);
											$this->form_model->set_field("username",$this->data['post']['email']);

											$this->form_model->set_field("group_id", 3);
											$this->form_model->set_field("groups_names", "Jugador");
											$this->form_model->set_field("company_id", $this->company_model->get_id());
											$this->form_model->set_field("company",$this->company_model->name);
											$pass = $this->bitauth->hash_password($this->data['post']['password']);
											$last_set = $this->bitauth->timestamp();
											$this->form_model->set_field("password",$pass);
											$this->form_model->set_field("password_last_set",$last_set);
											
											$this->form_model->update();
											$this->bitauth->logout();
											$this->bitauth->login($this->form_model->username,$this->data['post']['password']);
											$this->send_register_email();
											$this->send_creation_email($this->company_model->get_register_code());
											$output['redirect_url'] = $this->company_model->get_url();
											$output['message'] = lang("creation-message");											
											break;
					}
					
					$this->post_validate_save();
				}
				else
				{
					$output['valid'] = 0;
					$output['errors'] = $this->form_model->get_error_message();	
				}
			}
		}
		echo json_encode($output);
	}	

	protected function send_creation_email()
	{
		$this->load->library('email');
		
		$config['protocol'] = 'mail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		
		$this->email->initialize($config);
		
		$this->email->from('tuprode@prode2018.com', 'Prode 2018');
		
		$this->email->to($this->form_model->email);

		$this->email->subject(lang("subject-creation"));
		
		$company_link = $this->company_model->get_url().'/ingresa?'.$this->company_model->get_register_code();

		$body= var_lang('body-creation',$this->form_model->fullname)."<a href='".$company_link."'>".$company_link."</a>
				<br><br>".lang('register-login-email')."
				<br><br>Código para invitar amigos: <b>".$this->company_model->get_register_code()."</b><br>
				Prode ".date('Y')."<br>--";
		
		$this->email->message($body);
		
		$this->email->send();
			
	}

	protected function send_register_email()
	{
		$this->load->library('email');
		
		$config['protocol'] = 'mail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		
		$this->email->initialize($config);
		
		$this->email->from('registro@prode2018.com', 'Prode 2018');
		
		$this->email->to($this->form_model->email);

		$this->email->subject(lang("subject-registro"));
		
		$confirm_link = $this->data['link_url']."confirmar-cuenta/".$this->get_confirm_code($this->form_model->get_id());

		$body= var_lang('body-registro',$this->form_model->fullname)."<a href='".$confirm_link."'>".$confirm_link."</a>
				<br><br>".lang('register-login-email')."
				<br><br>".$this->company_model->username_field.": <b>".$this->form_model->username."</b><br>
				<br><br>".lang('Contraseña').": <b>".$this->data['post']['password']."</b><br><br>
				Prode ".date('Y')."<br>--";
		
		$this->email->message($body);
		
		$this->email->send();
			
	}
	
	protected function get_creation_code($id)
	{
		return substr(base64_encode($id),0,5);
	}

	protected function get_confirm_code($id)
	{
		return $id."-".substr(base64_encode($id."fantastic 2013 vv ++ ??"),0,10);
	}
	
	protected function post_validate_save(){}
	
	protected function validate_save_custom()
	{
		$output['valid'] = 1;
		/*
		$sql = "SELECT contact_id FROM contacts WHERE fb_uid = '".$this->session->userdata('facebook_uid')."'";
		$row = $this->db->query($sql)->row();	
		if(!$row->contact_id)
		{
			$output['errors'] = 'Hubo un error! por favor seleccioná tu auto otra vez.';
			$output['valid'] = 0;;	
		}*/
		
		return $output;
	}

	protected function check_captcha()
	{
		$captcha_input = $this->input->post('captcha_input', TRUE);
    	$captcha_text = $this->simple_captcha->get_captcha_text('signup');
		return $captcha_input && ($captcha_input == $captcha_text);
	}
	
	protected function get_friends_league_notifications()
	{
		if($this->company_model->friends_league)
		{
			$sql = "SELECT * FROM friends_leagues_users WHERE user_id = '".$this->user_id."' AND confirmed = 1";
			$this->data['friends_league'] = $this->db->query($sql)->result_array();
			$sql = "SELECT * FROM friends_leagues WHERE creator_id = '".$this->user_id."'";
			$own_leagues = $this->db->query($sql)->result_array();
			if(is_array($own_leagues))
			{
				$this->data['friends_league_notifications']['total'] = 0;
				foreach($own_leagues as $own_league)
				{
					$this->data['friends_league_notifications']['total'] += $own_league['notifications'];	
					$this->data['friends_league_notifications'][$own_league['league_id']] = $own_league['notifications'];	
				}	
			}
		}		
	}

	public function is_company_available($namespace)
	{
		$sql = "SELECT * FROM companies WHERE namespace = '{$namespace}'";
		return !$this->db->query($sql)->num_rows();
	}

	public function check_company_availability()
	{
		$this->data['post'] = $this->input->post();
		
		$this->form_validation->set_rules('namespace', 'namespace', 'alpha_dash');

		if (empty($this->data['post']['namespace'])) {
			$data['valid'] = 0;
			$data['message'] = lang("Ingresa el nombre de tu prode");
			
		} else if (!$this->form_validation->run()) {
			$data['valid'] = 0;
			$data['message'] = lang("El nombre no es válido");
		} else if ($this->form_validation->run() && !$this->is_company_available($this->data['post']['namespace']) ) {
			$data['message'] = lang('Ese nombre no está disponible. Intenta con otro');
			$data['valid'] = 0;
		}else if( $this->form_validation->run() && $this->is_company_available($this->data['post']['namespace']) ) {
			$data['valid'] = 1;
			$data['namespace'] = $this->data['post']['namespace'];
			$this->session->set_userdata('namespace', $data['namespace']);	
			$this->session->set_userdata('test', $data['namespace']);	
		}
		echo json_encode($data);
	}



}


?>