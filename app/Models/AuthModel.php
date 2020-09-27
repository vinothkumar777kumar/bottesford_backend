<?php namespace App\Models;

use CodeIgniter\Model;

/**
* 
*/
class AuthModel extends Model
{
	protected $table = 'users';
protected $primaryKey = 'id';
	protected $allowedFields = ['name','email','password','mobile','status'];
	protected $beforeInsert = ['beforeInsert'];
	protected $beforeUpdate = ['beforeUpdate'];
	
	protected function beforeInsert(array $data){
$data = $this->passwordHash($data);
return $data;
	}

	protected function beforeUpdate(array $data){
$data = $this->passwordHash($data);
return $data;
	}


	protected function passwordHash(array $data){
		if(isset($data['data']['password'])){
			$data['data']['password'] = password_hash($data['data']['password'],PASSWORD_DEFAULT);
		}
		return $data;
	}

	public function register($data){
		$data = $this->passwordHash($data);
		$query = $this->db->table($this->table)->insert($data);
		return $query ? true : false;
	}

	public function check_login($email){
		$query = $this->table($this->table)
						->where('email', $email)
						->countAll();
		if($query > 0){
			$data = $this->table($this->table)->where('email', $email)->limit(1)->get()->getRowArray();
		}else{
			$data = [];
		}
		return $data;
	}

	
}
?>
