<?

$module_name = 'user';

$config['modules'][$module_name] = array(
										 	'controller_name' => 'admin/user',
											'main_model' => 'user_model',
										 	'module_label' => 'Usuarios',
											'module_unit' => 'Usuario',
											'views_folder' => 'admin/auth',
											'list_condition' => 'group_id < 3',
											'admin_only' => 'true',
										 );


$config['modules'][$module_name]['fields'] = array(	
									'username' => array('label' => 'Usuario',
														'type' => 'text',
														'validation' => 'required',
														'visibility' => 'save|details|list'
														),
									'email' => array(	'label' => 'Email',
														'type' => 'text',
														'validation' => 'required|valid_email',
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
									'groups_names' => array(	'label' => 'Rol',
															'type' => 'text',
															'visibility' => 'details|list'
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
									'company_id' => array(	'label' => "Empresa",
															'type' => "select",
															'source_table' => "companies",
															'source_index_id' => "company_id",
															'source_fields' => array("name"),
															'visibility' => 'save',
															'validation' => 'required',
															),
									'company' => array(		'label' => "Empresa",
															'type' => "text",
															'visibility' => "details|list",
														),
									
									'active'	=> array(	'label' => 'Activo',
															'type' => 'checkbox',
															'value' => 1,
															'visibility' => 'save|details|list',
															),
                                    'deleted'	=> array(	'label' => 'Baneado',
                                                            'type' => 'checkbox',
                                                            'value' => 0,
                                                            'visibility' => 'save|details|list',
                                                        ),
									'group_id' => array( 'label' => 'Rol',
												'type' => 'hidden',
												'value' => 2,
												));	



$config['modules'][$module_name]['top_menu_actions'] = array( 	'users_list' => array(	'method' => 'show_list',
																						'url' => '#user/show_list',
																						'icon' => "ui-icon-clipboard", 
																						'label' => "Lista"),
																/*'add_user' => array('method' => 'create', 
																					'url' => '#user/create',
																					'icon' => "ui-icon-plusthick", 
																					'label' => "Agregar"
																)*/
						);

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
														'dialog' => 'borrar el Usuario?',
														'url' => '#user/delete/'),					
									
														);


?>