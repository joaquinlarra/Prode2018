<?

require_once(dirname(__FILE__)."/../simple_data_model.php");
class Team_model extends Simple_data_model
{
    public $db_index = 'team_id|id';
    public $db_table = 'teams';
	public $delete_table = 'teams_deleted';
	public $row_label = array('name');
	protected $db_fields = array(
								'name|char',
								'abbr_name|char',
								'zone|char',
								'team_flag|char',
								'qualyfied|bool',
								'final_pos|int',
								'pj|int',
								'pg|int',
								'pe|int',
								'pp|int',
								'pts|int',
								'file_manager_id|int',
                                'active|bool',
                                'date_created|datetime',
								'creator_id|int|index',
								'creator_name|char',
								);

}

?>