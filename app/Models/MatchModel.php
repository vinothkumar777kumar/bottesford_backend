<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

/**
* 
*/
class MatchModel extends Model
{
	protected $table = 'match_tbl';
protected $primaryKey = 'id';
	protected $allowedFields = ['team_one','team_one_image','team_two','team_two_image',
	'match_name','round','match_date','start_time','end_time','adult_ticket_price','conses_ticket_price',
'under_16_ticket_price','no_of_tickets','is_active','user_id'];
	

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
	$builder = $db->table('match_tbl');
	return $builder->update($data, ['id' => $data['id']]);
// $res =  $db->table('players')->where(['id' => $id])->set($userdata)->update();
// return $q;
}

public function getnextmatch(){
	$db  = Database::connect();
    $query =  $db->table('match_tbl')->countAll();
	if($query > 0){
		// $data = $this->table('match_tbl')->orderBy('match_date', 'ASC')->where('is_active',1)->get()->getResultArray();
		$d = $this->db->query("select mt.*,count(tbt.match_id) as sold_ticket_count  FROM match_tbl as mt
		left join ticket_booking as tbt on  mt.id = tbt.match_id where mt.is_active = 1 group by mt.id ASC");
		$data = $d->getResult();
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




public function editmatch($id){
	$db  = \Config\Database::connect();
	$d = $this->db->query("select mt.*, count(tbt.match_id) as sold_ticket_count FROM match_tbl as mt
		left join ticket_booking as tbt on mt.id = tbt.match_id
		where mt.id =".$id)->getResult();
		return $d;
}

public function get_matchschedule(){
	$db  = \Config\Database::connect();
	// $now =  date('d-m-Y H:i:s');
	// return $now;
	$builder = $db->table($this->table);
	$builder->select('*');
	// $builder->where('match_date >=', $now);
	// $builder->where('created_at <=', $todayend);
	$q = $builder->get();
	return $q->getResult();
}


}
?>
