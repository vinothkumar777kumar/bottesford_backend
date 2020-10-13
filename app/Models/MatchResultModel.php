<?php namespace App\Models;

use CodeIgniter\Model;

/**
* 
*/
class MatchResultModel extends Model
{
	protected $table = 'match_result_tbl';
protected $primaryKey = 'id';
    protected $allowedFields = ['team_one','team_one_image','team_two','team_two_image','match_name',
    'team_one_goal','team_two_goal','match_date','video_url'];
	

public function getTeams($id){
	$query =  $this->table($this->table)
	->where('user_id', $id)
	->countAll();
	if($query > 0){
		$data = $this->table($this->table)->where('user_id', $id)->limit(1)->get()->getResultArray();
	}else{
		$data = [];
	}
	return $data;
}

public function addplayers($data){
	$query = $this->db->table('players')->insert($data);
	if($query){
		try{
			return true;
		}catch (\Exception $e) {
			$output = [
					'message' => 'player not addedd',
					'error' => $e->getMessage()
				];
				return $this->respond($output, 401);
		}
	}
	// return $query ? true : false;
    
}

public function getteamplayers($id){
	$db  = \Config\Database::connect();
	$builder = $db->table('players');
	$builder->select('players.*,teams.team_name');
	$builder->join('teams', 'teams.id = players.team');
	$builder->where('team', $id);
	$q = $builder->get();
	return $q->getResult();
	
    // return $query->result();
}

public function getteamplayer($id){
	$db  = \Config\Database::connect();
	$builder = $db->table('players');
	$builder->select('*');
	$builder->where('id', $id);
	$q = $builder->get();
	return $q->getResult();
}

public function updatematch($data){
	$db  = \Config\Database::connect();
	$builder = $db->table($this->table);
	return $builder->update($data, ['id' => $data['id']]);
// $res =  $db->table('players')->where(['id' => $id])->set($userdata)->update();
// return $q;
}

public function getallmatchresult(){
    $query =  $this->table($this->table)->countAll();
	if($query > 0){
		$data = $this->table($this->table)->orderBy('match_date', 'DESC')->get()->getResultArray();
	}else{
		$data = [];
	}
    return $data;
}

public function getlastmatchresult(){
    $query =  $this->table($this->table)->countAll();
	if($query > 0){
		$data = $this->table($this->table)->orderBy('match_date', 'DESC')->limit(1)->get()->getResultArray();
	}else{
		$data = [];
	}
    return $data;
}

public function getleaguetabledata(){
	$db  = \Config\Database::connect();
	$builder = $db->table('teams');
	// $q = $this->db->query('select count(mrt.team_one) FROM teams as t
	// join match_result_tbl as mrt  on t.team_name = mrt.team_one
	// where t.team_name Like mrt.team_one');
	// return $builder->get()->getResult();
$arr = array();
$filter = [];
// $winmatch = array();

	// return $wm->getResult();
	
	// $wm = $this->db->query("select t.team_name as team, (mrt.team_one_goal > mrt.team_two_goal) as win, (mrt.team_one_goal = mrt.team_two_goal) as draw, 
	// (mrt.team_one_goal < mrt.team_two_goal) as loss  FROM match_result_tbl as mrt
	// join teams as t on mrt.team_one = t.team_name or mrt.team_two = t.team_name
	// where mrt.team_one = t.team_name group By team");
	// $wm = $this->db->query("select t.team_name as team,sum(mrt.team_one_goal > mrt.team_two_goal) as win,
	// sum(mrt.team_one_goal = mrt.team_two_goal) as draw,sum(mrt.team_one_goal < mrt.team_two_goal) as loss FROM teams as t");
	// return $wm->getResult();
	foreach ($builder->get()->getResult() as $row)
{
		// echo $row->team_name;
		// $b = $this->table('match_result_tbl');
	// 	$q = $this->db->query("select count(mrt.team_one) as playedmatch,'$row->team_name' as team_name,
	// 	mrt.team_one_goal,mrt.team_two_goal FROM match_result_tbl as mrt
	// where mrt.team_one ='$row->team_name' or  mrt.team_two ='$row->team_name'");
	$to = $this->db->query("select mrt.team_one as team, count(mrt.team_one) as mp, sum(mrt.team_one_goal > mrt.team_two_goal) as win,sum(mrt.team_one_goal = mrt.team_two_goal) as draw, 
	sum(mrt.team_one_goal < mrt.team_two_goal) as loss  FROM match_result_tbl as mrt 
	where mrt.team_one ='$row->team_name' group by team");

		foreach($to->getResult() as $r){
			$arr[] = $r;
		}

		$tt = $this->db->query("select mrt.team_two as team, count(mrt.team_two) as mp, sum(mrt.team_two_goal > mrt.team_one_goal) as win, sum(mrt.team_two_goal = mrt.team_one_goal) as draw, 
		sum(mrt.team_two_goal < mrt.team_one_goal) as loss  FROM match_result_tbl as mrt 
		where mrt.team_two ='$row->team_name' group By team");
		
		// foreach($arr as $r){
			foreach($tt->getResult() as $t){
				// if($r->team != $t->team){
				$arr[] = $t;
				// }
			}
		// }
	
}


return $arr;


}

}
?>
