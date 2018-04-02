<?

require_once(dirname(__FILE__)."/../simple_data_model.php");
class Tournament_model extends Simple_data_model
{
    public $db_index = 'tournament_id';
    public $db_table = 'tournaments';
	public $delete_table = 'tournaments_deleted';
	public $row_label = array('name');
	protected $db_fields = array(
								'name',
								'description',
								'file_manager_id',
                                'active',
                                'date_created',
								'creator_id',
								'creator_name',
								);	
	
}

?>