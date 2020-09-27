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
}
?>
