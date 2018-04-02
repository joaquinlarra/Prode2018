<?

$config['general']['admin'] = array('home_controller' => 'admin/x/',
									'user_session' => 'user',
									'start_page' => 'matches/show_list',
									'login_page' => 'admin/user/login'
									);

$config['general']['admin']['sections'] = array(
									'user' =>array('url' => '#user/show_list', 'name' => 'ADMINISTRADORES'),
									'player' =>array('url' => '#player/show_list', 'name' => 'JUGADORES'),
									'match' =>array('url' => '#match/show_list', 'name' => 'PARTIDOS', 'admin_only' => true),
									'team' =>array('url' => '#team/show_list', 'name' => 'EQUIPOS', 'admin_only' => true),
									'prognostic' =>array('url' => '#prognostic/show_list', 'name' => 'PRONOSTICOS', 'admin_only' => true),
									'company' =>array('url' => '#company/show_list', 'name' => 'EMPRESAS', 'admin_only' => true),
									//'db_configurator' => array('url' => '#db_configurator/index', 'name' => 'CONFIGURACION DB'),
									);

$config['general']['admin']['table_icons'] = array(	'details' => 'glyphicon glyphicon-expand glyph-normal',
													'save' => 'glyphicon glyphicon-edit glyph-normal',
													'edit' => 'glyphicon glyphicon-edit glyph-normal',
													'delete' => 'glyphicon glyphicon-trash glyph-normal');
													
foreach(glob( dirname(__FILE__)."/../modules_config/*.php") as $filename)
{
    include $filename;
}

?>