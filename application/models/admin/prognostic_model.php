<?

require_once(dirname(__FILE__)."/../simple_data_model.php");
class Prognostic_model extends Simple_data_model
{
    public $db_index = 'prognostic_id';
    public $db_table = 'prognostics';
	public $delete_table = 'prognostics_deleted';
	public $row_label = array('tournament');
	protected $db_fields = array(
								'tournament_id',
								'company_id',
								'tournament',
								'user_id',
								'username',
								'match_id',
								'matchname',
								'team1_goals',
								'team2_goals',
								'result',
								'result_match',
								'exact_result_match',
								'username',
                                'date_created'
								);	


	function pre_save()
	{
		$this->load->model('admin/match_model');
		$this->match_model->get($_POST['match_id']);
		$this->set_field('matchname',$this->match_model->zone.": ".$this->match_model->team1_name." VS ".$this->match_model->team2_name);

		$this->load->model('admin/tournament_model');
		$this->tournament_model->get($_POST['tournament_id']);
		$this->set_field('tournament',$this->tournament_model->name);
		
		$this->load->model('user_model');
		$this->user_model->get($_POST['user_id']);
		$this->set_field('username',$this->user_model->username);
		
		$result = $this->team1_goals > $this->team2_goals ? -1 : ($this->team1_goals == $this->team2_goals ? 0 : 1);
		$this->set_field('result',$result);
	}

}

?>