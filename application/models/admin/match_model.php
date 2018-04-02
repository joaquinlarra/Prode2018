<?
require_once(dirname(__FILE__)."/../simple_data_model.php");
class Match_model extends Simple_data_model
{
    public $db_index = 'match_id';
    public $db_table = 'matches';
	public $delete_table = 'matches_deleted';
	public $row_label = array('name');
	protected $db_fields = array(
								'bet',
								'tournament_id',
								'tournament',
								'zone',
								'phase', //zone, 8, 4, semi, final,'3y4'
								'phase_order',
								'tournament_date',
								'team1_id',
								'team1_name',
								'team1_abbr_name',
								'team1_flag',
								'team1_goals',
								'team2_id',
								'team2_name',
								'team2_abbr_name',
								'team2_flag',
								'team2_goals',
								'penalties',
								'result',
								'date_played',
								'location',
								'file_manager_id',
                                'active',
                                'date_created',
								);
	
	protected function pre_save()
	{
		$post = $this->input->post() ? $this->input->post() : array();
		$this->load->model('admin/team_model');
		$this->team_model->get($post['team1_id'] ? $post['team1_id'] : $this->team1_id);
		$this->team_model->get_files();
		$this->team1_name = $this->team_model->name;
		$this->team1_abbr_name = $this->team_model->abbr_name;
		$this->team1_flag = $this->team_model->flag_image;
		$this->team_model->set_field("team_flag",$this->team_model->flag_image);
		$this->team_model->update();

		$this->load->model('admin/team_model');
		$this->team_model->get($post['team2_id'] ? $post['team2_id'] : $this->team2_id);
		$this->team_model->get_files();
		$this->team2_name = $this->team_model->name;
		$this->team2_abbr_name = $this->team_model->abbr_name;
		$this->team2_flag = $this->team_model->flag_image;
		$this->team_model->set_field("team_flag",$this->team_model->flag_image);
		$this->team_model->update();
				
		$this->load->model('admin/tournament_model');
		$this->tournament_model->get($post['tournament_id'] ? $post['tournament_id'] : $this->tournament_id);
		$this->tournament = $this->tournament_model->name;
		//$this->set_field('result', date("Y-m-d H:i:s") < $this->date_played ? -2 : ( $this->team1_goals > $this->team2_goals ? -1 : ($this->team1_goals < $this->team2_goals ? '1' : 0)));
	}

	protected function post_save()
	{
		/*
		match states:
			start
			badges
			finish
		*/

		if($this->result == '-2')
		{
			return;
		}
		
		$sql = "SELECT * FROM scores_update WHERE match_id = '".$this->get_id()."'";
		$match_loaded = $this->db->query($sql)->num_rows();
		
		if($match_loaded)
		{
			return;	
		}
		else
		{
			$sql = "INSERT INTO scores_update(match_id, state, name) VALUES ('".$this->get_id()."','start', '".$this->team1_name." vs ".$this->team2_name."')";
			vd($sql);
			$this->db->query($sql);
		}

	}
	
	public function no_complete()
	{
		$today = date("Y-m-d H:i:s");
		return false;
		//return minDiff($this->date_played,$today) < 30 ? true : false;	
	}
	public function matchname()
	{
		return $this->team1_abbr_name." vs ".$this->team2_abbr_name;	
	}
}

?>