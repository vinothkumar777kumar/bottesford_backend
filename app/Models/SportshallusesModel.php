<?php namespace App\Models;

use CodeIgniter\Model;

/**
* 
*/
class SportshallusesModel extends Model
{
	// $db  = \Config\Database::connect();
	protected $table = 'sportshall_uses_tbl';
protected $primaryKey = 'id';
	protected $allowedFields = ['hall_uses'];
	





public function edituses($id){
	$db  = \Config\Database::connect();
	$builder = $db->table($this->table);
	$builder->select('*');
	$builder->where('id', $id);
	$q = $builder->get();
	return $q->getResult();
	
    // return $query->result();
}












}
?>
