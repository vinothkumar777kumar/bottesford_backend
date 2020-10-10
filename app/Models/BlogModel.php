<?php namespace App\Models;

use CodeIgniter\Model;

/**
* 
*/
class BlogModel extends Model
{
	protected $table = 'blog_tbl';
protected $primaryKey = 'id';
	protected $allowedFields = ['title','blog_image','description','publish_date','status'];
	
	public function getblog($id){
		$db  = \Config\Database::connect();
		$builder = $db->table($this->table);
		$builder->select('*');
		$builder->where('id', $id);
		$q = $builder->get();
		return $q->getResult();
	}

	public function updateblog($data,$id){
		$db  = \Config\Database::connect();
		$builder = $db->table($this->table);
		return $builder->update($data, ['id' => $id]);
	// $res =  $db->table('players')->where(['id' => $id])->set($userdata)->update();
	// return $q;
	}

	
}
?>
