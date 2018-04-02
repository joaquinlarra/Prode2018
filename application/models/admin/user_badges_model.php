<?

require_once(dirname(__FILE__)."/../simple_data_model.php");
class User_badges_model extends Simple_data_model
{
    public $db_index = 'user_id';
    public $db_table = 'user_badges';
	public $company_id;
	public $prog_table = "prognostics_temp";
	public $codes = array();
	public $matches = array();
	public $country;
	public $super_patriot;
	public $patriot_seller;
	
	protected $db_fields = array(
								'date1_points',
								'date2_points',
								'date3_points',
                                'date1_00',
                                'date2_00',
								'date3_00',
								'grupo_a_matches',
								'grupo_b_matches',
								'grupo_c_matches',
								'grupo_d_matches',
								'grupo_e_matches',
								'grupo_f_matches',
								'grupo_g_matches',
								'grupo_h_matches',
								'five_or_more',
								'super_points',
								'turtle',
								'seller_points',
								'fortune_teller'
								);	

	public function __construct()
	{
		parent::__construct();
		
		$this->codes = array("anti" => 1, 
							"grupo_a_matches" => 2, 
							"grupo_b_matches" => 3, 
							"grupo_c_matches" => 4, 
							"grupo_d_matches" => 5, 
							"grupo_e_matches" => 6, 
							"grupo_f_matches" => 7, 
							"grupo_g_matches" => 8,
							"grupo_h_matches" => 9,
							"five_or_more" => 10,
							"mejor" => 11,
							"peor" => 12,
							"super" => 13, 
							"turtle" => 15,
							"vende" => 16,
							"vidente" => 18
							);	
	}
	
	public function set_badges()
	{
		
		$sql = "INSERT IGNORE INTO user_badges (user_id, company_id)
				SELECT user_id, company_id FROM bitauth_users WHERE company_id = '".$this->company_id."' AND active = 1 AND group_id = 3";
		$this->db->query($sql);
	}
	
	public function five_or_more()
	{
		$five_goal_matches = array("5","7","17","10","27","36","47");
		
		$sql = "UPDATE user_badges SET five_or_more = 0";
		$this->db->query($sql);
		foreach($five_goal_matches as $match)
		{
			$sql = "UPDATE user_badges AS u, prognostics p 
					SET u.five_or_more = u.five_or_more + 1
					WHERE p.user_id = u.user_id AND p.match_id = '".$match."' AND p.exact_result_match = 1";
			$this->db->query($sql);	
		}
	}

	public function calculate_badges()
	{
		vd("Calculando Badges");
		$this->load->model("admin/match_model");
		$this->match_model->get((int)$match_id);
		
		$sql = "SELECT * FROM scores_update";
		$this->matches = $this->db->query($sql)->result();
		
		$this->five_or_more();
		$sql = "SELECT * FROM companies WHERE badges = 1";
		$companies = $this->db->query($sql)->result();
		foreach($companies as $company)
		{
			vd("EMPRESA: ".$company->name);
			$this->company_id = $company->company_id;
			$this->country = $company->country;
			$this->set_badges();
			$this->turtle();
			$this->date_points();
			$this->date_00();
			if($company->super_patriot)
			{
				$this->super();
				$this->super_patriot = 1;
			}
			if($company->patriot_seller)
			{
				$this->seller();
				$this->patriot_seller = 1;
			}
			$this->process_badges();
		}
		
		$this->vidente();
		$this->groups();
		$this->close_scores();
	}
	
	
	public function vidente()
	{
		$sql = "UPDATE user_badges SET fortune_teller = 0";
		$this->db->query($sql);	
		$sql = "UPDATE user_badges AS u, prognostics_qualys AS p
				SET u.fortune_teller = 1 WHERE u.user_id = p.user_id AND p.result >= 12";
		$this->db->query($sql);	
		$sql = "UPDATE user_badges SET badges_points = badges_points + 10, badges_code = CONCAT(badges_code,'|', '".$this->codes['vidente']."/1') WHERE fortune_teller = 1";
		$this->db->query($sql);
	}
	
	public function super()
	{
		$matches['AR'] = array("31","36","34");
		$matches['MX'] = array("6","3","2");
		$sql = "UPDATE user_badges SET super_points = 0 WHERE company_id = '".$this->company_id."'";
		$this->db->query($sql);
		foreach($matches[$this->country] as $match_id)
		{
			$sql = "UPDATE user_badges AS u, prognostics AS p
					SET super_points = super_points + 3
					WHERE p.user_id = u.user_id AND p.match_id = '".$match_id."' AND p.result_match = 1 AND u.company_id = '".$this->company_id."'";
			$this->db->query($sql);
			vd($sql);
			$sql = "UPDATE user_badges AS u, prognostics AS p
					SET super_points = super_points + 5
					WHERE p.user_id = u.user_id AND p.match_id = '".$match_id."' AND p.exact_result_match = 1 AND u.company_id = '".$this->company_id."'";
			$this->db->query($sql);
			vd($sql);
		}
	}
	
	public function seller()
	{
		$matches['AR'] = array("3","5","1","24","21","20");
		$matches['MX'] = array("42","41","39");
		$sql = "UPDATE user_badges SET seller_points = 0 WHERE company_id = '".$this->company_id."'";
		$this->db->query($sql);
		foreach($matches[$this->country] as $match_id)
		{
			$sql = "UPDATE user_badges AS u, prognostics AS p
					SET seller_points = seller_points + 3
					WHERE p.user_id = u.user_id AND p.match_id = '".$match_id."' AND p.result_match = 1 AND u.company_id = '".$this->company_id."'";
			$this->db->query($sql);
			$sql = "UPDATE user_badges AS u, prognostics AS p
					SET seller_points = seller_points + 5
					WHERE p.user_id = u.user_id AND p.match_id = '".$match_id."' AND p.exact_result_match = 1 AND u.company_id = '".$this->company_id."'";
			$this->db->query($sql);
		}
	}	
	
	public function groups()
	{
		$sql = "UPDATE user_badges SET grupo_a_matches = 0, 
						grupo_b_matches = 0, grupo_c_matches = 0, grupo_d_matches = 0, 
						grupo_e_matches = 0, grupo_f_matches = 0, grupo_g_matches = 0, 
						grupo_h_matches = 0";
		$this->db->query($sql);
		
		$sql = "SELECT * FROM matches WHERE phase = 'zone'";
		$matches = $this->db->query($sql)->result_array();
		foreach($matches as $match)
		{
			$field = strtolower(str_replace(" ","_",$match['zone']))."_matches";
			$sql = "UPDATE user_badges AS u, prognostics AS p
					SET u.".$field." = u.".$field." + 1 
					WHERE p.user_id = u.user_id AND p.match_id = '".$match['match_id']."'
					AND result_match = 1";
			$this->db->query($sql);
			vd($sql);
			$sql = "UPDATE user_badges AS u, prognostics AS p
					SET ".$field." = ".$field." + 1 
					WHERE p.user_id = u.user_id AND p.match_id = '".$match['match_id']."'
					AND exact_result_match = 1";
			$this->db->query($sql);
			vd($sql);	
		}
		$groups = array("grupo_a_matches", "grupo_b_matches", "grupo_c_matches", "grupo_d_matches", 
						"grupo_e_matches", "grupo_f_matches", "grupo_g_matches", "grupo_h_matches");
		
		
		foreach($groups as $group)
		{
			$sql = "UPDATE user_badges SET badges_points = badges_points + 15, badges_code = CONCAT(badges_code,'|','".$this->codes[$group]."/1') 
					WHERE ".$group." >= 5";
			$this->db->query($sql);
		}
		
	}
	
	public function date_points()
	{
		$dates = array("date1_points","date2_points","date3_points");
		
		$i = 1;
		foreach($dates as $date)
		{
			$sql = "UPDATE user_badges SET ".$date." = 0 WHERE company_id = '".$this->company_id."'";
			$this->db->query($sql);
			
			$sql = "SELECT match_id FROM matches WHERE tournament_date = ".$i;
			$matches = $this->db->query($sql)->result();
			foreach($matches as $match)
			{
			
				$sql = "UPDATE user_badges AS b, prognostics AS p
				SET b.".$date." = b.".$date." + p.result_match*3 + p.exact_result_match*5
				WHERE b.company_id = '".$this->company_id."' AND b.user_id = p.user_id AND p.match_id = '".$match->match_id."'";
				
				
				$this->db->query($sql);
			}
			$i++;
		}
	}

	public function date_00()
	{
		$matches_00 = array("42","24","3","30","16","32");
		$sql = "UPDATE user_badges SET date1_00 = 0";
		$this->db->query($sql);
		foreach($matches_00 as $match)
		{

			$sql = "UPDATE user_badges AS u, prognostics AS p
					SET date1_00 = date1_00 + 1 
					WHERE p.user_id = u.user_id AND p.match_id = '".$match."'
					 AND team1_goals = 0 AND team2_goals = 0 AND exact_result_match = 1";
			$this->db->query($sql);
				
		}
	}
	
	public function turtle()
	{
		$sql = "DELETE FROM prognostics_missing WHERE company_id = '".$this->company_id."'";
		$this->db->query($sql);
		
		foreach($this->matches as $match)
		{
			$sql = "INSERT IGNORE INTO prognostics_missing (user_id, match_id, company_id, p_user_id)
					SELECT u.user_id, '".$match->match_id."', '".$this->company_id."', p.user_id
					FROM bitauth_users AS u LEFT JOIN prognostics AS p ON (u.user_id = p.user_id  AND p.match_id = '".$match->match_id."')
					WHERE u.company_id = '".$this->company_id."'";
			$this->db->query($sql);
		}
		
		$sql = "UPDATE user_badges SET turtle = (
							SELECT COUNT(*) FROM prognostics_missing 
							WHERE prognostics_missing.user_id = user_badges.user_id AND prognostics_missing.p_user_id = 0
							) 
				WHERE company_id = '".$this->company_id."'";

		$this->db->query($sql);
		vd("BADGE: <b>Tortuga finalizado</b>");
	}
	
	public function process_badges()
	{
		// turtle
		$sql = "UPDATE user_badges SET badges_points = 0 - turtle*5, badges_code = CONCAT('".$this->codes['turtle']."/',turtle) WHERE company_id = '".$this->company_id."'";
		$this->db->query($sql);
		
		$dates = array("date1_points","date2_points","date3_points");
		
		foreach($dates as $date)
		{
			// best
			$sql = "SELECT ".$date." FROM user_badges WHERE company_id = '".$this->company_id."' ORDER BY ".$date." DESC LIMIT 1";
			$max_points = $this->db->query($sql)->row();
			$sql = "UPDATE user_badges SET badges_points = badges_points + 15, badges_code = CONCAT(badges_code, '|','".$this->codes['mejor']."/1') WHERE company_id = '".$this->company_id."' AND  ".$date." = '".$max_points->$date."'";
			$this->db->query($sql);
			//worst
			$sql = "SELECT  ".$date." FROM user_badges WHERE company_id = '".$this->company_id."' ORDER BY ".$date." ASC LIMIT 1";
			$max_points = $this->db->query($sql)->row();
			
			$sql = "UPDATE user_badges SET badges_points = badges_points - 5, badges_code = CONCAT(badges_code, '|','".$this->codes['peor']."/1') WHERE  company_id = '".$this->company_id."' AND  ".$date." = '".$max_points->$date."'";
			$this->db->query($sql);
		}
		//00
		$sql = "SELECT date1_00 FROM user_badges WHERE company_id = '".$this->company_id."' ORDER BY date1_00 DESC LIMIT 1";
		$max_00 = $this->db->query($sql)->row();
		
		if($max_00->date1_00)
		{	
			$sql = "UPDATE user_badges SET badges_points = badges_points + 15, badges_code = CONCAT(badges_code, '|','".$this->codes['anti']."/1') WHERE  company_id = '".$this->company_id."' AND date1_00 = '".$max_00->date1_00."'";
			$this->db->query($sql);
		}
		else
		{
			vd("NO HAY CERO CEROOOOOO");	
		}
		//five or more
		$sql = "SELECT five_or_more FROM user_badges WHERE company_id = '".$this->company_id."' ORDER BY five_or_more DESC LIMIT 1";
		$max_five_or_more = $this->db->query($sql)->row();
		
		$sql = "UPDATE user_badges SET badges_points = badges_points + 20, badges_code = CONCAT(badges_code, '|','".$this->codes['five_or_more']."/1') WHERE  company_id = '".$this->company_id."' AND five_or_more = '".$max_five_or_more->five_or_more."'";
		$this->db->query($sql);
		vd("Badges procesado");
		
		if($this->super_patriot)
		{
			//super
			$sql = "SELECT super_points FROM user_badges WHERE company_id = '".$this->company_id."' ORDER BY super_points DESC LIMIT 1";
			$max_super_points = $this->db->query($sql)->row();
			
			$sql = "UPDATE user_badges SET badges_points = badges_points + 15, badges_code = CONCAT(badges_code, '|','".$this->codes['super']."/1') WHERE  company_id = '".$this->company_id."' AND super_points = '".$max_super_points->super_points."'";
			$this->db->query($sql);
		}
		
		if($this->patriot_seller)
		{
			//seller
			$sql = "SELECT seller_points FROM user_badges WHERE company_id = '".$this->company_id."' ORDER BY seller_points DESC LIMIT 1";
			$max_seller_points = $this->db->query($sql)->row();
			
			$sql = "UPDATE user_badges SET badges_points = badges_points + 10, badges_code = CONCAT(badges_code, '|','".$this->codes['vende']."/1') WHERE  company_id = '".$this->company_id."' AND seller_points = '".$max_seller_points->seller_points."'";
			$this->db->query($sql);		
		}
		vd("Badges procesado");
	}
	
	public function process_common_badges()
	{
		//vidente
	}
	
	public function close_scores()
	{

		// TOTAL
		// DAMIAN AL TACHO
		$sql = "UPDATE `fantasy3_info`.`user_badges` SET `grupo_a_matches` = '4', `grupo_e_matches` = '4', `badges_points` = '5', `badges_code` = '15/2|11/1' WHERE `user_badges`.`user_id` = 11693";
		$this->db->query($sql);
		
		
		$sql = "UPDATE scores s, user_badges b
				SET s.badges_points = b.badges_points,
					s.badges = b.badges_code
				WHERE s.user_id = b.user_id";
		$this->db->query($sql);

		$sql = "UPDATE scores SET points = results*3 + exact_results*5 + badges_points + qualy_points + winner_points ";
		$this->db->query($sql);
		
	}
	
}

?>