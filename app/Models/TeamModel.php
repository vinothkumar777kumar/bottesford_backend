<?php namespace App\Models;

use CodeIgniter\Model;

/**
* 
*/
class TeamModel extends Model
{
	// $db  = \Config\Database::connect();
	protected $table = 'teams';
protected $primaryKey = 'id';
	protected $allowedFields = ['team_name','team_manager_name','team_manager_mobile','team_manager_email','status'];
	

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

public function updateteamplayers($data,$id){
	$db  = \Config\Database::connect();
	$builder = $db->table('players');
	return $builder->update($data, ['id' => $id]);
// $res =  $db->table('players')->where(['id' => $id])->set($userdata)->update();
// return $q;
}

public function getmanagerdashboarddata($id){
	$db  = \Config\Database::connect();
	$alldata = [];
	$builder = $db->table('users')->select('*')->where('id', $id)->get();
	$user_data = $builder->getResult();
	if($user_data){
		$builder = $db->table('teams')->select('*')->where('team_manager_email', $user_data[0]->email)->get();
		 $teamdata = $builder->getResult();
		 if($teamdata){
			$team_name = $teamdata[0]->team_name;
			$q =  $this->db->query("select count(*) as totalplayer from players as p where p.team =". $teamdata[0]->id)->getResult();
			$m =  $this->db->query("select count(*) as playedmatch,(mrt.team_one_goal > mrt.team_two_goal) as win from match_result_tbl as mrt 
			where mrt.team_one ='$team_name' or mrt.team_two ='$team_name'")->getResult();
	array_push($alldata,array('totalplayer' => $q[0]->totalplayer,'playedmatch'=>$m[0]->playedmatch,
	'winmatch'=>$m[0]->win,'team_id' => $teamdata[0]->id));
	return $alldata;
		 }
	}
}

public function getallteamplayers($id){
	$db  = \Config\Database::connect();
	$alldata = [];
	$builder = $db->table('users')->select('*')->where('id', $id)->get();
	$user_data = $builder->getResult();
	if($user_data){
		$builder = $db->table('teams')->select('*')->where('team_manager_email', $user_data[0]->email)->get();
		 $teamdata = $builder->getResult();
		 if($teamdata){
			$q =  $this->db->query("select *  from players as p where p.team =". $teamdata[0]->id)->getResult();
			
	return $q;
		 }else{
			 return array();
		 }
	}else{
		return array();
	}
}

public function getallteammatches($id){
	$db  = \Config\Database::connect();
	$alldata = [];
	$builder = $db->table('users')->select('*')->where('id', $id)->get();
	$user_data = $builder->getResult();
	if($user_data){
		$builder = $db->table('teams')->select('*')->where('team_manager_email', $user_data[0]->email)->get();
		 $teamdata = $builder->getResult();
		 if($teamdata){
			$team_name = $teamdata[0]->team_name;
			$m =  $this->db->query("select * from match_tbl as m
			where m.team_one ='$team_name' or m.team_two ='$team_name'")->getResult();
	return $m;
		 }else{
			 return array();
		 }
	}else{
		return array();
	}
}

public function deleteplayer($id){
	$db  = \Config\Database::connect();
	$builder = $db->table('players');
	$del = $builder->delete(['id' => $id]);
	return $del;
}

}
?>
