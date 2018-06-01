<?
class Stats extends ADMIN_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function show_stats()
	{
		$sql = "SELECT * FROM companies";
		$companies = $this->db->query($sql)->result_array();
		
		foreach($companies AS $company)
		{
			$company_id = $company['company_id'];
			vd("<h1>".$company['name']."</h1>");
			
			$sql = "SELECT COUNT(*) AS total FROM bitauth_users WHERE company_id = '".$company_id."'";
			$row = $this->db->query($sql)->row();
			$stats['total_users'] = $row->total;
			
			$sql = "SELECT COUNT(*) AS total FROM bitauth_users WHERE company_id = '".$company_id."' AND active = 1";
			$row = $this->db->query($sql)->row();
			$stats['total_active_users'] = $row->total;
		
			$sql = "SELECT COUNT(*) AS total FROM wall WHERE company_id = '".$company_id."'";
			$row = $this->db->query($sql)->row();
			$stats['total_wall_posts'] = $row->total;
			/*
			$sql = "SELECT COUNT(*) AS total FROM wall_comments WHERE company_id = '".$company_id."'";
			$row = $this->db->query($sql)->row();
			$stats['total_wall_comments'] = $row->total;
			*/
			$sql = "SELECT COUNT(*) AS total FROM prognostics WHERE company_id = '".$company_id."' AND exact_result_match = 1";
			$row = $this->db->query($sql)->row();
			$stats['total_exact_results'] = $row->total;

			$sql = "SELECT COUNT(*) AS total FROM prognostics WHERE company_id = '".$company_id."' AND result_match = 1";
			$row = $this->db->query($sql)->row();
			$stats['total_results'] = $row->total;


			$sql = "SELECT SUM(points) AS total FROM scores WHERE company_id = '".$company_id."' AND points > 0 GROUP BY '".$company_id."'";
			$row = $this->db->query($sql)->row();
			$stats['total_points'] = $row->total;
			
			$sql = "SELECT points FROM scores WHERE company_id = '".$company_id."' ORDER BY points DESC LIMIT 1";
			$row = $this->db->query($sql)->row();
			
			$sql = "SELECT * FROM scores WHERE company_id = '".$company_id."' AND points = '".$row->points."'";
			$result = $this->db->query($sql)->result();
			$stats['max_points'] = $row->points;
			foreach($result as $row)
			{
				$stats['max_points_users'][$row->user_id] = $row->username;
			}

			vd($stats);
			$stats = array();
		}
	}

}
?>