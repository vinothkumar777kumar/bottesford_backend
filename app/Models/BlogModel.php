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

	public function getallblog(){
		$db  = \Config\Database::connect();
		$builder = $db->table($this->table);
		$builder->select('*');
		$builder->where('status', 1);
		$q = $builder->get();
		return $q->getResult();
	}

	// bionewsfeed query start
	
	public function getallbionewsfeed(){
		$db  = \Config\Database::connect();
		$builder = $db->table('bionewsfeed_tbl');
		$builder->select('bionewsfeed_tbl.*,teams.team_name');
		$builder->join('teams', 'teams.id = bionewsfeed_tbl.team_id');
		$q = $builder->get();
		return $q->getResult();
	}

	public function getteambionewsfeed($id){
		$db  = \Config\Database::connect();
		$user_data = $db->table('users')->select('*')->where('id', $id)->get()->getResult();
		// return $user_data;
		if($user_data){
			$teamdata = $db->table('teams')->select('*')->where('team_manager_email', $user_data[0]->email)->get()->getResult();
			if($teamdata){
				$q =  $this->db->query("select *  from bionewsfeed_tbl  where team_id =". $teamdata[0]->id)->getResult();
				
		return $q;
			 }else{
				 return array();
			 }
		}
		// $builder = $db->table('bionewsfeed_tbl');
		// $builder->select('*');
		// $builder->where('status', 1);
		// $q = $builder->get();
		// return $q->getResult();
	}

	public function inserbionewsfeed($data){
		$query = $this->db->table('bionewsfeed_tbl')->insert($data);
		if($query){
			try{
				return true;
			}catch (\Exception $e) {
				$output = [
						'message' => 'Bio/newsfeed not addedd',
						'error' => $e->getMessage()
					];
					return $this->respond($output, 401);
			}
		}
	}

	public function editbionewsfeed($id){
		$db  = \Config\Database::connect();
		$builder = $db->table('bionewsfeed_tbl');
		$builder->select('bionewsfeed_tbl.*,teams.team_name');
		$builder->join('teams', 'teams.id = bionewsfeed_tbl.team_id');
		$builder->where('bionewsfeed_tbl.id', $id);
		$q = $builder->get();
		return $q->getResult();
	}

	public function updatebionewsfeed($data,$id){
		$db  = \Config\Database::connect();
		$builder = $db->table('bionewsfeed_tbl');
		return $builder->update($data, ['id' => $id]);
	// $res =  $db->table('players')->where(['id' => $id])->set($userdata)->update();
	// return $q;
	}

	
	public function deletebionewsfeed($id){
		$db  = \Config\Database::connect();
		$builder = $db->table('bionewsfeed_tbl');
		return $builder->delete(['id' => $id]);
	}

	public function getactivenewsfeed(){
		$db  = \Config\Database::connect();
		$builder = $db->table('bionewsfeed_tbl');
		$builder->select('bionewsfeed_tbl.*,teams.team_name');
		$builder->join('teams', 'teams.id = bionewsfeed_tbl.team_id');
		$builder->where('bionewsfeed_tbl.status','1');
		$q = $builder->get();
		return $q->getResult();
	}

	public function getteamdata($manager_id){
		$db  = \Config\Database::connect();
		$query =  $db->table('users')->where('id', $manager_id)->get()->getResult();
		// return $query;
		if($query){
			$builder = $db->table('teams');
			$builder->select('*');
			$builder->where('team_manager_email',$query[0]->email);
			$q = $builder->get();
			return $q->getResult();
		}
		
	}

	public function getallsocialclub(){
		$db  = \Config\Database::connect();
		$builder = $db->table('social_club_tbl');
		$builder->select('*');
		$q = $builder->get();
		return $q->getResult();
	}

	public function getactivesocialclub(){
		$db  = \Config\Database::connect();
		$builder = $db->table('social_club_tbl');
		$builder->select('*');
		$builder->where('status','1');
		$q = $builder->get();
		return $q->getResult();
	}

	

	

	public function insersocialclub($data){
		$query = $this->db->table('social_club_tbl')->insert($data);
		if($query){
			try{
				return true;
			}catch (\Exception $e) {
				$output = [
						'message' => 'Social club not addedd',
						'error' => $e->getMessage()
					];
					return $this->respond($output, 401);
			}
		}
	}

	
	public function editsocialclub($id){
		$db  = \Config\Database::connect();
		$builder = $db->table('social_club_tbl');
		$builder->select('*');
		$builder->where('id', $id);
		$q = $builder->get();
		return $q->getResult();
	}

	public function updatesocialclub($data,$id){
		$db  = \Config\Database::connect();
		$builder = $db->table('social_club_tbl');
		return $builder->update($data, ['id' => $id]);
	// $res =  $db->table('players')->where(['id' => $id])->set($userdata)->update();
	// return $q;
	}

	public function deletesocialclub($id){
		$db  = \Config\Database::connect();
		$builder = $db->table('social_club_tbl');
		return $builder->delete(['id' => $id]);
	}
	
}
?>
