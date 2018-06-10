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


	public function update_stats()
    {
        $this->pj = 0;
        $this->pg = 0;
        $this->pe = 0;
        $this->pp = 0;

        $sql = "SELECT * FROM matches WHERE team1_id = '".$this->get_id()."' AND result != '-2' AND phase = 'zone'";
        $team1_results = $this->db->query($sql)->result_array();


        foreach($team1_results as $row)
        {
            $this->pj += 1;

            switch ($row['result'])
            {
                case '-1': $this->pg += 1;
                    break;
                case '0': $this->pe += 1;
                    break;
                case '1': $this->pp += 1;
                    break;
            }
        }

        $sql = "SELECT result FROM matches WHERE team2_id = '".$this->get_id()."' AND result != '-2' AND phase = 'zone'";
        $team1_results = $this->db->query($sql)->result_array();

        foreach($team1_results as $row)
        {
            $this->pj += 1;

            switch ($row['result'])
            {
                case '1': $this->pg += 1;
                    break;
                case '0': $this->pe += 1;
                    break;
                case '-1': $this->pp += 1;
                    break;
            }
        }

        $this->update();


    }
}

?>