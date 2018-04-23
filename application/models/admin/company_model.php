<?

require_once(dirname(__FILE__)."/../simple_data_model.php");
class Company_model extends Simple_data_model
{
    public $db_index = 'company_id';
    public $db_table = 'companies';
	public $delete_table = 'companies_deleted';
	public $row_label = array('name');
	protected $db_fields = array(
								'name',
								'namespace',
								'username_field',
								'branch_name',
								'bio',
								'multi_lang',
								'branch_league_name',
								'register',
								'how_to_text',
								'register_domain',
								'confirm_email',
								'fantasy_logo_url',
								'first_login',
								'first_login_text',
								'users_activated',
								'no_logos',
								'description',
								'points_match',
								'points_exact_match',
								'qualys',
								'qualys_team_points',
								'qualys_close_date',
								'winners',
								'winners_points',
								'winners_close_date',
								'badges',
								'badges_points',
								'patriot_seller',
								'super_patriot',
								'wall',
								'colors',
								'dept_league',
								'friends_league',
								'branch_league',
								'file_manager_id',
								'default_user_id',
                                'active',
                                'date_created',
								'country',
								'creator_id',
								'creator_name',
								);	
	public function post_save()
	{
		if(!$this->default_user_id)
		{
			$this->load->model("user_model","default_user_model");
			$this->default_user_model->set_field("username",$this->namespace);
			$this->default_user_model->set_field("fullname",$this->name);
			$this->default_user_model->set_field("password",$this->namespace."1010");
			$this->default_user_model->set_field("company_id",$this->get_id());
			$this->default_user_model->set_field("company",$this->name);
			$this->default_user_model->set_field("active",1);
			$this->default_user_model->set_field("enabled",1);
			$this->default_user_model->set_field("group_id",2);
			$this->default_user_model->create();
			$this->set_field("default_user_id",$this->default_user_model->get_id());
			$this->update();	
		}
		
	}

}

?>