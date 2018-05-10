<?

$module_name = 'company';

$config['modules'][$module_name] = array(
										 	'controller_name' => 'admin/company',
											'main_model' => 'admin/company_model',
										 	'module_label' => 'Empresas',
											'module_unit' => 'Empresa',
										 );

$config['modules'][$module_name]['fields'] = array(	
										'name' => array(	'label' => 'Nombre',
															'type' => 'text',
															'class' => 'title',
															'validation' => 'required',
															'visibility' => 'save|details|list'
														),
										'namespace' => array(	'label' => 'Namespace',
															'type' => 'text',
															'class' => 'title',
															'validation' => 'required|alpha_dash',
															'description' => "Ej: miempresa. No puede contener espacios",
															'visibility' => 'save|details|list'
														),
										
										'no_logos' => array('label' => 'Quitar logos Prode2018',
															'type' => 'checkbox',
															'value' => 0,
															'validation' => '',
															'description' => "Quita la marca fantasy futbol.",
															'visibility' => 'save|details'
															),
										'multi_lang' => array('label' => 'Multilenguaje',
															'type' => 'hidden',
															'value' => 1,
															'validation' => '',
															//'description' => "Habilita selector de idioma.",
															'visibility' => 'save'
															),
										'username_field' => array(	'label' => 'Campo de usuario',
															'type' => 'hidden',
															'value' => 'email',
															'class' => 'title',
															'validation' => 'required',
															//'description' => "Ej: email, nro. de empleado, etc.",
															'visibility' => 'save'
														),
										'users_activated' => array('label' => 'Habilitar usuarios',
															'type' => 'hidden',
															'value' => 1,
															'validation' => '',
															'description' => "Habilitar usuarios para comenzar el torneo.",
															'visibility' => 'save'
															),
										'register' => array('label' => 'Habilitar registros',
															'type' => 'checkbox',
															'value' => 1,
															'validation' => '',
															'description' => "Se habilitará el registro de usuarios",
															'visibility' => 'save|details'
															),
										'confirm_email' => array('label' => 'Confirmar Email',
															'type' => 'checkbox',
															'value' => 0,
															'validation' => '',
															'description' => "Se habilitará al usuario solo si confirmó la cuenta",
															'visibility' => 'save'
															),
										
										/*
										'register_domain' => array('label' => 'Dominio exclusivo de registro',
															'type' => 'text',
															
															'validation' => '',
															'description' => "Ej: miempresa.com.ar. Si no tiene dejar en blanco",
															'visibility' => ''
															),
										'first_login' => array('label' => 'Primer ingreso',
															'type' => 'checkbox',
															'value' => 0,
															'validation' => '',
															'description' => "No pedirá clave al primer ingreso.",
															'visibility' => ''
															),									
										'first_login_text'=> array(	'label' => 'Texto primer ingreso',
															'type' => 'textarea',
															'class' => 'summernote',
															'validation' => 'Referencia de que hacer si no existe en la base u otro asunto relacionado al primer ingreso',
															'visibility' => ''
														),
										'description'=> array(	'label' => 'Descripción',
															'type' => 'textarea',
															'class' => 'summernote',
															'validation' => '',
															'visibility' => 'save|details'
														),*/
										'country'=> array(	'label' => 'País',
															'type' => 'hidden',
															'value' => 'AR',
															'validation' => 'required',
															'visibility' => 'save|details'
														),
																		
										'main_image' => array(	'label' => 'Logo',
																	'type' => 'image',
																	'tag' => 'main_image',
																	'validation' => '',
																	'visibility' => 'details|save',
																	),
                                        'prizes_image' => array(	'label' => 'Infografía Premios',
                                            'type' => 'image',
                                            'tag' => 'prizes_image',
                                            'validation' => '',
                                            'visibility' => 'details_save',
                                        ),

                                        'footer_image' => array(	'label' => 'Logo footer',
																	'type' => 'image',
																	'tag' => 'footer_image',
																	'validation' => '',
																	'visibility' => 'details|save',
																	),
										'how_to_text' => array(	'label' => 'Texto Como jugar',
																	'type' => 'textarea',
																	'class' => 'summernote',
																	'validation' => '',
																	'visibility' => 'save|details',
																	),
										
										'how_to_image' => array(	'label' => 'Imagen Como jugar',
																	'type' => 'image',
																	'tag' => 'how_to_image',
																	'validation' => '',
																	'visibility' => 'save|details',
																	),
										/*
										'how_to_image_MX' => array(	'label' => 'Imagen Como jugar (MX)',
																	'type' => 'image',
																	'tag' => 'how_to_image_MX',
																	'validation' => '',
																	'visibility' => '',
																	),
										
										'how_to_image_PR' => array(	'label' => 'Imagen Como jugar (PR)',
																	'type' => 'image',
																	'tag' => 'how_to_image_PR',
																	'validation' => '',
																	'visibility' => '',
																	),
										'how_to_image_US' => array(	'label' => 'Imagen Como jugar (US)',
																	'type' => 'image',
																	'tag' => 'how_to_image_US',
																	'validation' => '',
																	'visibility' => '',
																	),
										*/
										'banner_header' => array('label' => 'Banner Header',
															'type' => 'image',
															'tag' => 'banner_header',
															'validation' => '',
															'description' => "468px x 60px",
															'visibility' => 'save|details'
														),
										'bg_image' => array('label' => 'Imagen fondo',
															'type' => 'image',
															'tag' => 'bg_image',
															'validation' => '',
															'description' => "",
															'visibility' => 'save|details'
														),
										'custom_css' => array(	'label' => 'Custom CSS',
															'type' => 'script',
															'value' => '',
															'validation' => '',
															'visibility' => 'save|details'
															),
										'email_owners' => array('label' => 'Email Administrador',
																	'type' => 'text',
																	'class' => '',
																	'validation' => 'required',
																	'description' => "pueden ser varios, separados por coma.",
																	'visibility' => 'save|details',
																	),
										'contact_email' => array('label' => 'Email De Contacto',
																	'type' => 'text',
																	'class' => '',
																	'validation' => 'required|email',
																	'description' => "pueden ser varios, separados por coma.",
																	'visibility' => 'save|details|list',
																	),
										'wall' => array(	'label' => 'Muro',
															'type' => 'checkbox',
															'value' => '1',
															'validation' => '',
															'description' => "Se incluirá el muro en el juego.",
															'visibility' => 'save|details'
															),
										
										'active'	=> array(	'label' => 'Activo',
																'type' => 'checkbox',
																'value' => 1,
																'visibility' => 'save|details|list'
																)						
										);

$config['modules'][$module_name]['top_menu_actions'] = array( 	'list' => array('url' => '#'.$module_name.'/show_list','method' => 'show_list', 'class_name' => $config['modules'][$module_name], 'icon' => "ui-icon-clipboard", 'label' => "Lista"),
																'add' => array('url' => '#'.$module_name.'/create','method' => 'create', 'class_name' => $config['modules'][$module_name], 'icon' => "ui-icon-plusthick", 'label' => "Agregar"));

$config['modules'][$module_name]['main_model_tabs'] = array( 	'details' => array( 'label' => 'Detalle',
								  			  	 				'url' => '#'.$module_name.'/details/'),
																'edit' => array( 	'label' => 'Editar',
											 					'url' => '#'.$module_name.'/edit/',
																),
															);

$config['modules'][$module_name]['datatable_actions'] = array( 	'details' => array( 'label' => 'Detalle',
								  			  	 				'url' => '#'.$module_name.'/details/'),
											'edit' => array( 	'label' => 'Editar',
											 					'url' => '#'.$module_name.'/edit/'),
											'delete' => array( 	'label' => 'Borrar',
																'dialog' => 'Borrar empresa?',
											 					'url' => '#'.$module_name.'/delete/'),
											);
?>