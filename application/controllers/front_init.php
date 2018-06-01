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
		$this->load->model("admin/company_model","company_model");

		$this->get_company();

		if($this->bitauth->logged_in())
		{
		    $this->data['user_id'] = $this->user_id = $this->bitauth->user_id;
			$this->data['username'] = $this->username = $this->bitauth->displayname;
			$this->data['fullname'] = $this->fullname = $this->bitauth->fullname;

            $this->shortname = $this->bitauth->displayname;
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
		
		$this->data['fields'] = array(	

                'email' => array('label' => lang('Email'),
                                'type' => 'text',
                                'validation' => 'valid_email|required',
                                'visibility' => 'profile|edit_profile|first_login|register'
                ),

                'displayname' => array(	'label' => lang('Apodo'),
                                    'type' => 'text',
                                    'validation' => 'required',
                                    'visibility' => 'profile|edit_profile|first_login|register'
                                    ),
                'fullname' => array(	'label' => lang('Nombre Completo'),
                                    'type' => 'text',
                                    'validation' => 'required',
                                    'visibility' => 'profile|edit_profile|first_login|register'
                                    ),
                'password' => array('label' => lang('Contraseña'),
                                'type' => 'password',
                                'validation' => 'required|matches[passconf]',
                                'visibility' => 'profile|first_login|register|forgot_pass'
                                ),
                'passconf' => array('label' => lang('Repetir contraseña'),
                                'type' => 'password',
                                'validation' => 'required',
                                'visibility' => 'profile|first_login|register|forgot_pass'
                                ),

                'user_language'=> array(	'label' => lang('Idioma'),
                    'type' => 'select',
                    'options' => array(0 => array("value" => "AR", "label" => "Español"),
                        1 => array("value" => "PR", "label" => "Portugues"),
                        2 => array("value" => "US", "label" => "English"),
                    ),
                    'value' => $this->session->userdata('lang'),
                    'validation' => '',
                    'visibility' => 'register'
                ),
                /*
                COMPANY FIELDS
                */

                'name' => array(	'label' => lang('Nombre'),
                    'type' => 'text',
                    'validation' => 'required',
                    'visibility' => 'edit_company'
                ),
                'main_image' => array(	'label' => 'Logo',
                                'type' => 'image',
                                'tag' => 'main_image',
                                'validation' => '',
                                'visibility' => 'edit_company',
                                ),

                'prizes_image' => array(	'label' => lang('Imagen Premios'),
                        'type' => 'image',
                        'tag' => 'prizes_image',
                        'validation' => '',
                        'visibility' => 'edit_company',
                    ),

                'custom_css' => array(	'label' => lang('Estilos'),
                    'type' => 'textarea',
                    'validation' => '',
                    'visibility' => 'edit_company'
                ),
                'bg_image' => array('label' => lang('Imagen fondo'),
                    'type' => 'image',
                    'tag' => 'bg_image',
                    'validation' => '',
                    'description' => "",
                    'visibility' => 'edit_company'
                ),
                'fonts_url' => array(	'label' => lang('Fonts URL(s)'),
                    'type' => 'text',
                    'description' => lang("Separados por comma. ej: https://fonts.googleapis.com/css?family=Pangolin"),
                    'validation' => '',
                    'visibility' => 'edit_company'
                ),


            );
		
		$this->form_validation->set_message('matches', '%s '.lang("y").' %s '.lang("deben ser iguales"));
		$this->form_validation->set_message('required', lang("complete-field"));
		$this->form_validation->set_message('valid_email', lang("valid-email"));
		$this->form_validation->set_message('alpha_numeric_space', lang("alpha-num"));
		

		$this->split_fields();
		$this->data['lang'] = $this->session->userdata('lang');
	}
	
	protected function redirect_login()
	{

	    if(!$this->bitauth->logged_in())
		{
			redirect($this->data['link_url']."log-in");
		}

	}

	protected function load_company()
	{
		$this->company_id = $this->session->userdata('company_id');
		
		$this->company_model->get($this->company_id);
		$this->company = $this->company_model->name;		
		$this->session->set_userdata('login-redirect',0);
	}

	protected function set_company()
	{
		$this->company = $this->company_model->name;

		$this->company_id = $this->company_model->get_id();
		$this->session->set_userdata('company_id', $this->company_model->get_id());
		

		$this->session->set_userdata('login-redirect',0);
	}

	protected function get_company()
	{
		$server_name = explode(".",$_SERVER['SERVER_NAME']);
		$company = $server_name[0];

		if($company == "www")
        {
            $company = $server_name[1];
        }

		if(($company == "localhost") || ($company == "prode"))
		{
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
		}
		
		return;
	}

	public function clear_session()
	{
		$this->session->sess_destroy();	
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
				case 'register':
									$this->load->model("user_model","form_model");
                                    $sql = "SELECT * FROM bitauth_users WHERE username = '".addslashes($this->data['post']['email'])."' 
												AND company_id = '".$this->company_model->get_id()."'";
									$row = $this->db->query($sql)->row();
									if($row->user_id)
                                    {
                                        $output['valid'] = false;
                                        $output['error'] = lang("Ya existe un usuario con ese email. si olvidaste tu contraseña clickea <a href='".$this->data['link_url']."olvide-mi-clave'>aca</a>");
                                        echo json_encode($output);
                                        return;
                                    }
									$this->form_model->get($row->user_id);
									break;
				case 'edit_company':
									/* register company utils */
									$this->load->model("admin/company_model","form_model");
									$this->form_model->get($this->company_model->company_id);
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
			
			if($output['valid'])
			{
                $this->form_model->set($this->data['post']);

				if($this->form_model->save())
				{
					$output['valid'] = 1;
					switch($page)
					{
						case 'edit_profile':
											$sql = "UPDATE scores SET username = '".$this->form_model->fullname."' WHERE user_id = '".$this->form_model->get_id()."'";
											$this->db->query($sql);
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
											$this->bitauth->login($this->form_model->username,$this->data['post']['password'], true, array(), NULL, $this->company_model->get_id());
											$this->send_register_email();
											$output['message'] = lang("register-message");
											break;

                        case 'edit_company':
                                            if(is_array($_FILES))
                                            {
                                                $this->get_file_manager();
                                                if(!$this->file_manager->upload($this->file_fields))
                                                {
                                                    $output['errors'][] = "Error al subir los archivos".
                                                        $output['valid'] = 0;
                                                }
                                                else
                                                {
                                                    $output['valid'] = 1;
                                                }
                                            }
                                            else
                                            {
                                                $output['valid'] = 1;
                                            }
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
		
		$this->email->from('info@prode2018.com', 'Prode 2018');
		
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
		
		$this->email->from('info@prode2018.com', 'Prode 2018');
		
		$this->email->to($this->form_model->email);

		$this->email->subject(lang("subject-registro"));
		
		$confirm_link = $this->data['link_url']."confirmar-cuenta/".$this->get_confirm_code($this->form_model->get_id());

		$body= var_lang('body-registro',$this->form_model->fullname)."<a href='".$confirm_link."'>".$confirm_link."</a>
				<br><br>".lang('register-login-email')."
				<br><br>".$this->company_model->username_field.": <b>".$this->form_model->username."</b><br>
				<br><br>".lang('Contraseña').": <b>".$this->data['post']['password']."</b><br><br>
				Prode2018.com<br>--";
		
		$this->email->message($body);
		
		$this->email->send();
			
	}

	protected function get_confirm_code($id)
	{
		return $id."-".substr(base64_encode($id."fantastiK 2019 +I2"),0,10);
	}
	
	protected function post_validate_save(){}

	public function is_company_available($code)
	{
		$this->get_company();
		$companyCode = $this->company_model->get_register_code();
		return ($companyCode === $code);
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
			$this->session->set_userdata($data['namespace'].'-namespace', $data['namespace']);
			$this->session->set_userdata('test', $data['namespace']);	
		}
		echo json_encode($data);
	}

	public function validate_code()
	{
		$this->data['post'] = $this->input->post();

		$this->form_validation->set_rules('code', 'code', 'alpha_dash');
		
		if (empty($this->data['post']['code'])) {
			$data['valid'] = 0;
			$data['message'] = lang("No ingresaste ningún código");
		} else if (!$this->form_validation->run()) {
			$data['valid'] = 0;
			$data['message'] = lang("El código ingresado no es válido");
		} else if (!$this->is_company_available($this->data['post']['code']) ) {
			$data['message'] = lang('El código ingresado es incorrecto');
			$data['valid'] = 0;
		}else{
			$data['valid'] = 1;
			$data['code'] = $this->data['post']['code'];
			$data['url'] = $this->data['link_url']."completar-registro";
			$this->session->set_userdata('register_code', $data['code']);
		}
		echo json_encode($data);
	}



}


?>