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
class TeamController extends ResourceController
{
	protected $modelName = 'App\Models\TeamModel';
	
	public function __construct(){
$this->protect = new AuthController();
	}
	public function index(){
		// echo view('welcome_message');
			}
	

	
	public function addteam()
	{
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
					$encrypter = \Config\Services::encrypter();
                    if ($this->request->getMethod() == 'post') {
                        
                        $data = $this->request->getJSON();
                        $team_data = [
							'team_name'=> $data->team_name,
							'team_manager_name'=> $data->team_manager_name,
							'team_manager_mobile'=> $data->team_manager_mobile,
							'team_manager_email'=> $data->team_manager_email,
							// 'team_manager_password'=> base64_encode($encrypter->encrypt($data->team_manager_password)),
                            'status' => $data->status
                        ];
						$rules = [
							$team_data['team_name'] => 'required',
							$team_data['team_manager_name'] => 'required',
							$user_data['team_manager_mobile'] => 'required|is_unique[teams.mobile]',
							$team_data['team_manager_email'] => 'required|valid_email|is_unique[teams.team_manager_email]',
							// $team_data['team_manager_password'] => 'required|min_length[8]|max_length[255]'
						];
						$error = $this->validation->setRules($rules);
						$msg = $this->validation->run($team_data, 'team_details');
						if (!$msg) {
							return $this->respondCreated(['status' => false, 'error' => $this->validation->getErrors()]);
						} else {
                        $res = $this->model->insert($team_data);
                        $output = [
                            'message' => 'Team Added Successfully',
                            'status' => 'success'
                        ];
                            return $this->respond($output,200);
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

	public function getallteams()
	{
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		// if($token){
			// try {
				// $decode = JWT::decode($token,$secret_key,array('HS256'));
				// if($decode){
							$teams = $this->model->findAll();
							$getallteam = [];
							$encrypter = \Config\Services::encrypter();
							// $plainText = 'This is a plain-text message!';
					// $ciphertext = $encrypter->encrypt($plainText);
							// foreach($teams as $tm){
							//  array_push($getallteam, array('id' => $tm['id'],
							//  'team_name' => $tm['team_name'],'role_type' => $tm['role_type'],
							//  'eccript_text' => $encrypter->decrypt($tm['team_manager_password'])));
								
							// }
							$output = [
								'status' => 'success',
								'data' => $teams
							];
							return $this->respond($output, 200);
				
				// }
			// } catch (\Exception $e) {
			// 	$output = [
			// 			'message' => 'Access denied',
			// 			'error' => $e->getMessage()
			// 		];
			// 		return $this->respond($output, 401);
			// }
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
    

    public function editteamsbyid($id)
	{
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
					$getteams = $this->model->find($id);
					
					$output = [
						'status' => 'success',
						'data' => $getteams
					];
return $this->respond($output, 200);
					// $output = [
					// 	'message' => 'Access granted'
					// ];
					// return $this->respond($output, 200);
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
    
    public function updateteam(){
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
		$team_data = [
			'team_name'=> $data->team_name,
			'team_manager_name'=> $data->team_manager_name,
			'team_manager_mobile'=> $data->team_manager_mobile,
			'team_manager_email'=> $data->team_manager_email,
			// 'team_manager_password'=> base64_encode($encrypter->encrypt($data->team_manager_password)),
			'status' => $data->status
		];
		
			
			$update_id = $data->id;
			// echo json_encode($userdata);
            $res =  $this->model->where(['id' => $update_id])->set($team_data)->update();
            if($res){
			$output = [
                'status' => 'success',
                'message' => 'Team Update Successfully.'
            ];
            return $this->respond($output, 200);
        }else{
            $output = [
                'status' => 'faile',
                'error' => $res
            ];
            return $this->respond($output, 401);  
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
    
    public function deleteteams($id)
	{
		
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
                    $delete = $this->model->delete($id);
                
					if($delete){
					$output = [
                        'status' => 'success',
                        'message' => 'Team Deleted Successfully'
					];
		return $this->respond($output, 200);
                }else{
                    $output = [
						'status' => 'fail',
						'error' => $delete
					];
return $this->respond($output, 401);   
                }
					// $output = [
					// 	'message' => 'Access granted'
					// ];
					// return $this->respond($output, 200);
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

	public function deleteplayer($id)
	{
		
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
                    $delete = $this->model->deleteplayer($id);
                
					if($delete){
					$output = [
                        'status' => 'success',
                        'message' => 'Player Deleted Successfully'
					];
		return $this->respond($output, 200);
                }else{
                    $output = [
						'status' => 'fail',
						'error' => $delete
					];
return $this->respond($output, 401);   
                }
					// $output = [
					// 	'message' => 'Access granted'
					// ];
					// return $this->respond($output, 200);
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
	
	// add players
	public function addplayer()
	{
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
					$upload_dir = 'uploads/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
						$img_name = $_FILES['image']['name'];
						$img_tmp_name = $_FILES["image"]["tmp_name"];
						$error = $_FILES["image"]["error"];
						if($error > 0){
							$response = array(
								"status" => "error",
								"error" => true,
								"message" => "Error uploading the file!"
							);
						}else 
						{
							$random_name = rand(1000,1000000)."-".$img_name;
							$upload_name = $upload_dir.strtolower($random_name);
							$upload_name = preg_replace('/\s+/', '-', $upload_name);

							if(move_uploaded_file($img_tmp_name , $upload_name)) {
								$response = array(
									"status" => "success",
									"error" => false,
									"message" => "File uploaded successfully",
									"url" => $server_url."/".$upload_name
								);
							}else
							{
								$response = array(
									"status" => "error",
									"error" => true,
									"message" => "Error uploading the file!"
								);
							}
						}
						
                        $player_data = [
							'team'=> $data['team_name'],
							'player_image' => $random_name,
							'description' => $data['description'],
							'player_name' => $data['player_name'],
							'position' => $data['position'],
							'squad_no' => $data['squad_no'],
							'dateofbirth' => $data['dateofbirth'],
							'signed_date' => $data['signed_date'],
							'player_height' => $data['player_height'],
							'country' => $data['country']
                        ];
                        
                        // return json_encode($player_data);
						$res = $this->model->addplayers($player_data);
					
						if($res){
							try{
                        $output = [
                            'message' => 'Player Added Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'player not addedd',
								'error' => $e->getMessage()
							];
							return $this->respond($output, 500);
					}
					}
				
					return $res;
                        
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

	public function getteamplayers($id)
	{
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		// if($token){
			// try {
				// $decode = JWT::decode($token,$secret_key,array('HS256'));
				// if($decode){
							$players = $this->model->getteamplayers($id);
							$output = [
								'status' => 'success',
								'data' => $players
							];
							return $this->respond($output, 200);
				
				// }
			// } catch (\Exception $e) {
			// 	$output = [
			// 			'message' => 'Access denied',
			// 			'error' => $e->getMessage()
			// 		];
			// 		return $this->respond($output, 401);
			// }
		// }
	}


	
	public function getteamplayerscount($id)
	{
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					// return $id;
							$players = $this->model->getmanagerdashboarddata($id);
							// print_r($players);
							// return;
							$output = [
								'status' => 'success',
								'data' => $players
							];
							return $this->respond($output, 200);
				
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

	public function getallteamplayers($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					// return $id;
							$players = $this->model->getallteamplayers($id);
							// print_r($players);
							// return;
							$output = [
								'status' => 'success',
								'data' => $players
							];
							return $this->respond($output, 200);
				
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
	
	public function getallteammatch($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
					// return $id;
							$matches = $this->model->getallteammatches($id);
							// print_r($players);
							// return;
							$output = [
								'status' => 'success',
								'data' => $matches
							];
							return $this->respond($output, 200);
				
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

	public function editteamplayer($id){
		// $secret_key = $this->protect->privateKey();
		// $token  = null;
		// $authHeader = $this->request->getHeader('Authorization');
		// $arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$getplayer = $this->model->getteamplayer($id);
					$output = [
						'status' => 'success',
						'data' => $getplayer
					];
return $this->respond($output, 200);
					// $output = [
					// 	'message' => 'Access granted'
					// ];
					// return $this->respond($output, 200);
				// }
		// 	} catch (\Exception $e) {
		// 		$output = [
		// 				'message' => 'Access denied',
		// 				'error' => $e->getMessage()
		// 			];
		// 			return $this->respond($output, 401);
		// 	}
		// }
	}

	public function updateteamplayer($id)
	{
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
					$upload_dir = 'uploads/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
						$img_name = $_FILES['image']['name'];
						// return $data['image'];
						if($img_name){
						$img_tmp_name = $_FILES["image"]["tmp_name"];
						$error = $_FILES["image"]["error"];
						if($error > 0){
							$response = array(
								"status" => "error",
								"error" => true,
								"message" => "Error uploading the file!"
							);
						}else 
						{
							$random_name = rand(1000,1000000)."-".$img_name;
							$upload_name = $upload_dir.strtolower($random_name);
							$upload_name = preg_replace('/\s+/', '-', $upload_name);

							if(move_uploaded_file($img_tmp_name , $upload_name)) {
								$response = array(
									"status" => "success",
									"error" => false,
									"message" => "File uploaded successfully",
									"url" => $server_url."/".$upload_name
								);
							}else
							{
								$response = array(
									"status" => "error",
									"error" => true,
									"message" => "Error uploading the file!"
								);
							}
						}
					}else{
						$random_name = $data['image'];
					}
						
                        $player_data = [
							'team'=> $data['team_name'],
							'player_image' => $random_name,
							'description' => $data['description'],
							'player_name' => $data['player_name'],
							'position' => $data['position'],
							'squad_no' => $data['squad_no'],
							'dateofbirth' => $data['dateofbirth'],
							'signed_date' => $data['signed_date'],
							'player_height' => $data['player_height'],
							'country' => $data['country']
                        ];
                        
                        // return json_encode($user_data);
						$res = $this->model->updateteamplayers($player_data,$id);
					// return json_encode($res);
						if($res){
							try{
                        $output = [
                            'message' => 'Team Player Update Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'player not updated',
								'error' => $e->getMessage()
							];
							return $this->respond($output, 500);
					}
					}
				
					return $res;
                        
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

	public function deleteplayerimage($image_name){
		$path = "uploads/".$image_name;
		if(file_exists($path)){
			unlink($path);
			$output = [
				'message' => 'Player Image Deleted.',
				'status' => 'success'
			];
				return $this->respond($output,200);
		}
		else{
			// echo $path." is not available";  
			$output = [
				'message' =>  $path." is not available",
				'status' => 'faile'
			];
				return $this->respond($output,401);  
		}
		// return $ul;
	}


	//--------------------------------------------------------------------

}
