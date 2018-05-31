<?
// once resolved the problem of autoload class this should go away.
require_once(dirname(__FILE__)."/simple_data_model.php");

class User_model extends Simple_data_model
{
    public $db_index = 'user_id';
    public $db_table = 'bitauth_users';
	public $db_userdata_table = 'bitauth_userdata';
    protected $_db_user_pass = 'password';
    protected $_db_user_name = 'email';
    
    protected $session_key = 'user';
    protected $auto_write_session = false;
    
    public $first_login  = false;
    public $update_last_login = true;
    
    public $is_validated = false;

    public $controller = "user"; // useful for creating links depending on the controller

	public $post;
    protected $db_fields = array(
								'username',
								'displayname',
								'email',
                                'password',
								'password_last_set',
                                'fullname',
								'groups_names',
								'group_id',
								'file_manager_id',
								'bio',
								'facebook',
								'twitter',
								'instagram',
								'company_id',
								'company',
								'user_language',
								'branch_id',
								'branch',
								'department_id',
								'department',
								'country',
                                'active',
								'email_confirmed',
								'enabled',
                                'last_login',
                                'date_created');

    protected $db_fields_type = array(
                                        'user_id' => "int",
                                        'email' => "email",
                                        'active' => "int",
                                        'last_login' => "date",
                                        'date_created' => "date");

    public function  __construct() {
        parent::__construct();
    }

	public function post_get()
	{
		$sql = "SELECT group_id FROM bitauth_assoc WHERE ".$this->db_index." = '".$this->get_id()."'";
		$row = $this->db->query($sql)->row();
		
		if($row)
		{
			$this->group_id = $row->group_id;
		}
			
		$sql = "SELECT * FROM ".$this->db_userdata_table." WHERE  ".$this->db_index." = '".$this->get_id()."'";
		$result = $this->db->query($sql)->result_array();
		
		if(is_array($result))
		{
			$this->userdata = $result[0];
		}
	}

	protected function post_update()
	{
		$sql = "SELECT * FROM bitauth_assoc WHERE user_id = '".$this->get_id()."' AND group_id = '".$this->group_id."'";
		if(!$this->db->query($sql)->num_rows())
		{
			$sql = "INSERT INTO bitauth_assoc (user_id, group_id) VALUES ('".$this->get_id()."','".$this->group_id."')";
			$this->db->query($sql);	
		}
		$sql = "UPDATE scores SET username = '".$this->fullname."' WHERE user_id = '".$this->get_id()."'";
		$this->db->query($sql);
	}

	protected function post_delete()
	{
		$sql = "DELETE FROM prognostics WHERE user_id = '".$this->get_id()."'";
		$this->db->query($sql);
        $sql = "DELETE FROM scores WHERE user_id = '".$this->get_id()."'";
        $this->db->query($sql);
        $sql = "DELETE FROM bitauth_userdata WHERE user_id = '".$this->get_id()."'";
        $this->db->query($sql);
        $sql = "DELETE FROM bitauth_logins WHERE user_id = '".$this->get_id()."'";
        $this->db->query($sql);
	}
	protected function post_create()
	{
		$this->set_field('active','1');
		
		$this->set_field('group_id', ($this->group_id ? $this->group_id : '3'));
		
		$sql = "SELECT * FROM bitauth_assoc WHERE user_id = '".$this->get_id()."' AND group_id = '".$this->group_id."'";
		if(!$this->db->query($sql)->num_rows())
		{
			$sql = "INSERT INTO bitauth_assoc (user_id, group_id) VALUES ('".$this->get_id()."','".$this->group_id."')";
			$this->db->query($sql);	
		}
		$this->hash_password();
        $sql = "INSERT IGNORE INTO scores (user_id, username, company, company_id)
				VALUES ('".$this->get_id()."','".$this->fullname."','".$this->company."','".$this->company_id."')";
        $this->db->query($sql);
		$this->update();
	}
	
	public function hash_password()
	{
		$ci =& get_instance();
		$pass = $ci->bitauth->hash_password($this->password);
		$last_set = $this->bitauth->timestamp();
		$this->set_field("password_last_set",$last_set);
		$this->set_field('password',$pass);
		unset($ci);
	}
	
	protected function pre_save()
	{
		$this->post = $this->input->post();
		$this->set_field('enabled',1);
		$group_id = $this->post['group_id'] ? (int)$this->post['group_id'] : (int)$this->group_id;

		if($group_id)
		{
			$sql = "SELECT g.name FROM bitauth_groups AS g WHERE g.group_id = '".$group_id."'";		
			$result = $this->db->query($sql)->result_array();
			if(is_array($result))
			{
				$this->set_field('groups_names',$result[0]['name']);
				$this->post['groups_names'] = $result[0]['name'];
			}
			$this->post['groups'] = array($this->post['group_id']);
			unset($this->post['group_id']);
		}
		$ci =& get_instance();
		$company_id = $this->company_id ? $this->company_id : $ci->bitauth->company_id;
		if($this->post['company_id'] && $ci->bitauth->is_admin())
		{
			$company_id = $this->post['company_id'];
				
		}
		$sql = "SELECT name FROM companies WHERE company_id = '".$company_id."'";
		$result = $this->db->query($sql)->result_array();
		
		if(is_array($result))
		{
			$this->set_field('company_id',$company_id);
			$this->set_field('company',$result[0]['name']);
			$this->post['company'] = $result[0]['name'];		
		}

		
		if($this->branch_id)
		{
			$sql = "SELECT branch FROM company_branches WHERE branch_id = '".(int)$this->branch_id."'";
			$row = $this->db->query($sql)->row();
			$this->set_field("branch",$row->branch);
		}		
		unset($this->post['passconf']);	
		$this->userdata = $this->post['userdata'];
		unset($this->post['userdata']);
		unset($ci);
	}
	
}
?>