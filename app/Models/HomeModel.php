<?php namespace App\Models;

use CodeIgniter\Model;

/**
* 
*/
class HomeModel extends Model
{
	protected $table = 'users';
protected $primaryKey = 'id';
	protected $allowedFields = ['name','email','password','mobile','address_one','town','postcode'];
	

	public function updatepassword($data){
		$db  = \Config\Database::connect();
	$builder = $db->table($this->table);
	$builder->select('*');
	$builder->where('id', $data['user_id']);
	$d = $builder->get()->getResult();

	if(password_verify($data['current_password'],$d[0]->password)){		
		$builder = $db->table($this->table);
		$res =  $builder->where(['id' => $data['user_id']])->set('password', password_hash($data['new_password'],PASSWORD_DEFAULT))->update();
		return true;
	}else{
		return false;
	}

	}


	
}
?>
