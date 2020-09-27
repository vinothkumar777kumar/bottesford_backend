<?php namespace App\Models;

use CodeIgniter\Model;

/**
* 
*/
class HallbookingModel extends Model
{
	protected $table = 'sports_hall_booking_tbl';
protected $primaryKey = 'id';
	protected $allowedFields = ['user_id','name','email','mobile','purpose','booking_date','location'];
	

public function getbookhalldata($id){
	$query =  $this->table($this->table)
	->where('user_id', $id)
	->countAll();
	if($query > 0){
		$data = $this->table($this->table)->where('user_id', $id)->get()->getResultArray();
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
	$builder = $db->table('match_tbl');
	return $builder->update($data, ['id' => $data['id']]);
// $res =  $db->table('players')->where(['id' => $id])->set($userdata)->update();
// return $q;
}

public function getnextmatch(){
    $query =  $this->table('match_tbl')->countAll();
	if($query > 0){
		$data = $this->table('match_tbl')->orderBy('match_date', 'ASC')->get()->getResultArray();
	}else{
		$data = [];
	}
    return $data;
    
    // $db  = \Config\Database::connect();
    // $builder = $db->table('match_tbl');
    // $builder->select('*');
    // $builder->order_by('match_date', 'desc');
    // $builder->limit(1);
    // $query = $builder->get();
    // return $query;
}
}
?>
