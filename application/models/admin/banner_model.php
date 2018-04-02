<?

require_once(dirname(__FILE__)."/../simple_data_model.php");

class Banner_model extends Simple_data_model
{
    public $db_index = 'banner_id';

    public $db_table = 'banners';

	public $delete_table = 'banners_deleted';

	public $row_label = array('name');

	
	protected $db_fields = array(
								'name',
								'url',
								'file_manager_id',
								'page_position',
								'views',
                                'active',
                                'date_created',
								'creator_id',
								'creator_name',
								);

}

?>