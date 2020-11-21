<?php namespace App\Models;

use CodeIgniter\Model;

/**
* 
*/
class TicketModel extends Model
{
	protected $table = 'ticket_booking';
protected $primaryKey = 'id';
	protected $allowedFields = ['match_id','match_type','matchdate','team_one','team_one_img','team_two',
	'team_two_img','ticket','ticket_price','user_id','adult_ticket_price','conses_ticket_price','under_16_ticket_price'];
	

public function gettickets($id){
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

public function get_userbookedtickets($match_id){
	$db  = \Config\Database::connect();
	$builder = $db->table('ticket_booking');
	$builder->select('ticket_booking.*,users.id,users.name,');
	$builder->join('users', 'users.id = ticket_booking.user_id');
	$builder->where('match_id', $match_id);
	$builder->groupBy('user_id'); 
	$q = $builder->get();
	return $q->getResult();
	
}

public function getnotickets($user_id,$match_id){
	$db  = \Config\Database::connect();
	$builder = $db->table('ticket_booking');
	$builder->select('*');
	$builder->where('match_id', $match_id,);
	$builder->where('user_id', $user_id);
	$q = $builder->get();
	return $q->getResult();
}

public function get_todaybookedtickets(){
	$db  = \Config\Database::connect();
	$todaystart =  date('Y-m-d 00:00:00');
	$todayend = date('Y-m-d 24:00:00');
	// return $todaystart.' '.$todayend;
	$builder = $db->table('ticket_booking');
	$builder->select('*');
	$builder->where('created_at >=', $todaystart,'created_at <=', $todayend);
	// $builder->where('created_at <=', $todayend);
	$q = $builder->get();
	return $q->getResult();
}
	
}
?>
