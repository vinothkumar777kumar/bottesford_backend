<?php namespace App\Controllers;
use \Firebase\JWT\JWT;
use App\Controllers\AuthController;
use CodeIgniter\RESTful\ResourceController;


header('Access-Control-Allow-Origin: *');        
header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization, Token, App-version,Access-Control-Allow-Headers");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Max-Age: 3600'); 

// default BaseController
class Home extends ResourceController
{
	protected $modelName = 'App\Models\HomeModel';
	public function __construct(){
$this->protect = new AuthController();
	}

	public function index(){
	
		
			}

	
	public function getAllUsers()
	{
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
			
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$users = $this->model->getusers();
					$output = [
						'status' => 'success',
						'data' => $users
					];
return $this->respond($output, 200);
					// $output = [
					// 	'message' => 'Access granted'
					// ];
					// return $this->respond($output, 200);
		// 		}
		// 	} catch (\Exception $e) {
		// 		$output = [
		// 				'message' => 'Access denied',
		// 				'error' => $e->getMessage()
		// 			];
		// 			return $this->respond($output, 401);
		// 	}
		// }
	}

	public function getUsers($id)
	{
		
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$getuser = $this->model->find($id);
					
					$output = [
						'status' => 'success',
						'data' => $getuser
					];
return $this->respond($output, 200);
					// $output = [
					// 	'message' => 'Access granted'
					// ];
					// return $this->respond($output, 200);
		// 		}
		// 	} catch (\Exception $e) {
		// 		$output = [
		// 				'message' => 'Access denied',
		// 				'error' => $e->getMessage()
		// 			];
		// 			return $this->respond($output, 401);
		// 	}
		// }
	}

	public function updatemyaccount(){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
	helper(['form', 'url']);
	$this->validation = \Config\Services::validation();
	if ($this->request->getMethod() == 'post') {
		$data = $this->request->getJSON();
		$user_data = [
			'id'=> $data->id,
			'name' => $data->name,
			'email' => $data->email,
			'mobile' => $data->mobile,
			'address_one' => $data->mobile,
			'town' => $data->mobile,
			'postcode' => $data->mobile
		];
		
		$rules = [
			$user_data['id'] => 'required',
			$user_data['name'] => 'required|min_length[3]|max_length[20]',
			$user_data['email'] => 'required|valid_email',
			$user_data['address_one'] => 'required',
			$user_data['mobile'] => 'required',
			$user_data['town'] => 'required',
			$user_data['postcode'] => 'required'
		];
		$error = $this->validation->setRules($rules);
		$msg = $this->validation->run($user_data, 'myaccount_validation');

		// $errors = $this->validation->getErrors();
		// echo json_encode($this->validation->getErrors());
		// return json_encode($msg);
		if (!$msg) {
			return $this->respondCreated(['status' => false, 'error' => $this->validation->getErrors()]);
		} else {
			$userdata = [
				'name' => $data->name,
				'email' => $data->email,
				'mobile' => $data->mobile,
				'address_one' => $data->address_one,
				'town' => $data->town,
				'postcode' => $data->postcode
			];
			$update_id = $data->id;
			// echo json_encode($userdata);
			$res =  $this->model->where(['id' => $update_id])->set($userdata)->update();
			// $data['id'] = $res;
			// echo json_encode(['status'=> 'success','message' => 'User Register Successfully.']);
			return $this->respondCreated(['status' => 'success', 'message' => 'User Update Successfully.']);

		}
	} else {
		return $this->fail('Only post request is allowed');
	}
}
} catch (\Exception $e) {
	$output = [
			'message' => 'Access denied',
			'error' => $e->getMessage()
		];
		return $this->respond($output, 401);
}
}
	}

	public function update_mypassword(){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
				helper(['form', 'url']);
				$this->validation = \Config\Services::validation();
				if ($this->request->getMethod() == 'post') {
					$data = $this->request->getJSON();
					$data = [
						'user_id'=> $data->user_id,
						'current_password' => $data->current_password,
						'new_password' => $data->new_password,
						'confirm_password' => $data->confirm_password
					];
						
				// return json_encode($us)
						$res = $this->model->updatepassword($data);
						if($res == false){
							$output = [
								'message' => 'Current password does not match',
								'status' => "faile"
							];
							return $this->respond($output, 200);
						}else{
							$output = [
								'message' => 'Password Update Successfully.',
								'status' => "success"
							];
							return $this->respond($output, 200);
						}
						// $res =  $this->model->where(['id' => $update_id])->set($userdata)->update();
						// $data['id'] = $res;
						// echo json_encode(['status'=> 'success','message' => 'User Register Successfully.']);
						// return $this->respondCreated(['status' => 'success', 'message' => 'User Update Successfully.']);

					
				} else {
					return $this->fail('Only post request is allowed');
				}
			}
			} catch (\Exception $e) {
				$output = [
						'message' => 'Access denied',
						'error' => $e->getMessage()
					];
					return $this->respond($output, 401);
			}
}
	}

	//--------------------------------------------------------------------

}
