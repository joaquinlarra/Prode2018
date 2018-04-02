<?

require_once(dirname(__FILE__)."/../simple_data_model.php");
class Friend_league_model extends Simple_data_model
{
    public $db_index = 'league_id';
    public $db_table = 'friends_leagues';
	public $row_label = array('name');
	protected $db_fields = array(
								'name',
								'company_id',
								'company',
								'creator_id',
								'creator_name',
								);	
	
}

?>