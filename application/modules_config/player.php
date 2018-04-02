<?

$module_name = 'player';

$config['modules'][$module_name] = array(
										 	'controller_name' => 'admin/player',
											'main_model' => 'user_model',
										 	'module_label' => 'Jugadores',
											'module_unit' => 'Usuario',
											'views_folder' => 'admin/auth',
										 	'admin_override' => true,
										 );

$config['modules'][$module_name]['fields'] = array(	
									'username' => array('label' => 'Usuario',
														'type' => 'text',
														'validation' => 'required',
														'visibility' => 'save|details|list'
														),
									'email' => array(	'label' => 'Email',
														'type' => 'text',
														'validation' => 'valid_email',
														'visibility' => 'save|details|list'
														),
									'password' => array('label' => 'Contrase&ntilde;a',
														'type' => 'password',
														'validation' => 'required|matches[passconf]',
														'visibility' => 'create|edit_password'
														),
									'passconf' => array('label' => 'Repetir contrase&ntilde;a',
														'type' => 'password',
														'validation' => 'required',
														'visibility' => 'create|edit_password'
														),
									'fullname' => array(	'label' => 'Nombre completo',
															'type' => 'text',
															'visibility' => 'save|details|list'
															),
									'department' => array(	'label' => 'Departamento',
															'type' => 'text',
															'visibility' => 'details|list'
															),
									'branch' => array(	'label' => 'Sucursal',
															'type' => 'text',
															'visibility' => 'details|list'
															),						
									'branch_id' => array(	'label' => 'Sucursal',
															'type' => 'select',
															'source_table' => "company_branches",
															'source_index_id' => "branch_id",
															'source_fields' => array("branch"),
															'source_condition' => "",
															'visibility' => 'save'
															),						
									
									/*
									'image_portada' => array('label' => 'Imagen',
																'type' => 'image',
																'tag' => 'image_list',
																'validation' => '',
																'visibility' => 'details|save'
																),
									*/
									'bio' => array(	'label' => 'Bio',
															'type' => 'text',
															'visibility' => 'save|details'
															),
									/*
									'facebook' => array(	'label' => 'Facebook',
															'type' => 'text',
															'visibility' => 'save|details'
															),
									'twitter' => array(	'label' => 'Twitter',
															'type' => 'text',
															'visibility' => 'save|details'
															),
									'instagram' => array(	'label' => 'Instagram',
															'type' => 'text',
															'visibility' => 'save|details'
															),
									*/
									'active'	=> array(	'label' => 'Activo',
															'type' => 'checkbox',
															'value' => 1,
															'visibility' => 'save|details|list',
															),
									'group_id' => array( 'label' => 'Rol',
												'type' => 'hidden',
												'validation' => 'required',
												'visibility' => 'save',
												'value' => 3,
												),
									'company_id' => array(	'label' => 'Empresa',
															'type' => 'hidden',
															'visibility' => 'save'
															),						
									);

$config['modules'][$module_name]['top_menu_actions'] = array( 	'users_list' => array(	'method' => 'show_list',
																						'url' => '#player/show_list',
																						'icon' => "ui-icon-clipboard", 
																						'label' => "Lista"),
																'add_user' => array('method' => 'create', 
																					'url' => '#player/create',
																					'icon' => "ui-icon-plusthick", 
																					'label' => "Agregar"));

$config['modules'][$module_name]['main_model_tabs'] = array( 	'details' => array( 'label' => 'Detalle',
														'url' => '#'.$module_name.'/details/'),
									'edit' => array( 	'label' => 'Editar',
														'url' => '#'.$module_name.'/edit/'),
									'edit_password' => array( 	'label' => 'Modificar Password',
														'url' => '#'.$module_name.'/edit_password/'));

$config['modules'][$module_name]['datatable_actions'] = array( 	'details' => array( 'label' => 'Detalle',
														'url' => '#'.$module_name.'/details/'),
									'edit' => array( 	'label' => 'Editar',
														'url' => '#'.$module_name.'/edit/'),
									'delete' => array( 	'label' => 'Borrar',
														'dialog' => 'borrar el Jugador?',
														'url' => '#'.$module_name.'/delete/'),					
									
														);


?>