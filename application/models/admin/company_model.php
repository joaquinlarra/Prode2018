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
								'register',
								'how_to_text',
								'confirm_email',
								'fantasy_logo_url',
								'users_activated',
								'no_logos',
								'description',
								'wall',
								'custom_css',
								'email_owners',
								'contact_email',
								'file_manager_id',
								'default_user_id',
                                'active',
                                'date_created',
								'country',
								'creator_id',
								'creator_name',
                                'register_code',
                                'fonts_url'
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

		}
        $this->set_field("register_code",$this->generate_register_code());
        $this->update();
    }

	public function get_url()
	{
		return 'http://'.$this->company_model->namespace.'.prode2018.com';
	}

	public function is_company_admin($email)
    {
        $email_owners = explode(",",$this->email_owners);
        return in_array($email, $email_owners);
    }
	public function generate_register_code()
	{
		$date = new DateTime($this->date_created);
		$code =  $date->format('i').$this->get_id();
		return $code;
	}

	public function get_register_code()
    {
        return $this->register_code;
    }

}

?>