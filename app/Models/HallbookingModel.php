<?php namespace App\Models;

use CodeIgniter\Model;

/**
* 
*/
class HallbookingModel extends Model
{
	protected $table = 'sports_hall_booking_tbl';
protected $primaryKey = 'id';
	protected $allowedFields = ['user_id','name','email','mobile','purpose','booking_date','location','start_time','end_time','status'];
	

public function getbookhalldata($id){
	$query =  $this->table($this->table)
	->where('user_id', $id)
	->countAll();
	if($query > 0){
		$data = $this->table($this->table)->where('user_id', $id)->where('status', 1)->get()->getResultArray();
	}else{
		$data = [];
	}
	return $data;
}

public function gethallbookingdata(){
	$db  = \Config\Database::connect();
	$builder = $db->table('sports_hall_booking_tbl');
	$builder->select('sports_hall_booking_tbl.*,users.name,users.mobile');
	$builder->join('users', 'users.id = sports_hall_booking_tbl.user_id');
	$builder->orderBy('created_at', 'desc');
	$q = $builder->get();
	return $q->getResult();
}

public function editsportshall($id){
	$db  = \Config\Database::connect();
	$builder = $db->table('sports_hall_booking_tbl');
	$builder->select('sports_hall_booking_tbl.*,users.name,users.mobile');
	$builder->join('users', 'sports_hall_booking_tbl.user_id = users.id','left');
	$builder->where('sports_hall_booking_tbl.id', $id);
	$q = $builder->get();
	return $q->getResult();
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

public function getusers($user_id){
	$db  = \Config\Database::connect();
	$builder = $db->table('users');
	$builder->select('*');
	$builder->where('id', $user_id);
	$d = $builder->get()->getResult();
	return $d;
}

public function hallbook($data){
	$db  = \Config\Database::connect();
	// date_default_timezone_set('Asia/Manila');
	$hdate = $data['booking_date'];
	$hstime = explode(" ", $data['start_time']);
	// return $hstime[0];
$now =  date('Y-m-d H:i:s');
// return ;
	// return strtotime($data['start_time']);
	if(strtotime(date('d-m-Y H:i')) < strtotime($hdate.' '.$hstime[0])){
	$builder = $db->table('sports_hall_booking_tbl')->select('*')->where('booking_date', $data['booking_date'])->get()->getResultArray();
	$i = 0;
	foreach($builder as $builder){
		
		if(strtotime($builder['start_time']) <= strtotime($data['start_time']) && strtotime($builder['end_time']) >= strtotime($data['start_time'])){
			$i++;
		}else if(strtotime($builder['start_time']) <= strtotime($data['end_time']) && strtotime($builder['end_time']) >= strtotime($data['end_time'])){
			$i++;
		}
	}
	if($i == 0){
		$query = $this->db->table($this->table)->insert($data);
		if($query){
			try{
				return true;
			}catch (\Exception $e) {
				$output = [
						'status' => 'faile',
						'error' => $e->getMessage()
					];
					return $this->respond($output, 401);
			}
		}
			// return $data['start_time'] .' '.$builder[0]['end_time'];
	}else{
		return 'Court Not Available This Time';
	}
	}else{
		return 'Court Not Available This Time';
	}

}

public function addimage($data){
	$query = $this->db->table('images')->insert($data);
	if($query){
		try{
			return true;
		}catch (\Exception $e) {
			$output = [
					'message' => 'playimageser not addedd',
					'error' => $e->getMessage()
				];
				return $this->respond($output, 401);
		}
	}
	// return $query ? true : false;
}

public function getsportshallimages($category){
	$db  = \Config\Database::connect();
	$builder = $db->table('images');
	$builder->select('*');
	$builder->where('image_category', $category);
	$d = $builder->get()->getResult();
	return $d;
}

public function updatesportshallimage($data,$id){
	$db  = \Config\Database::connect();
	$builder = $db->table('images');
	return $builder->update($data, ['id' => $id]);
}
}
?>
