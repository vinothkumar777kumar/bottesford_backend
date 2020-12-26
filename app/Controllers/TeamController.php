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
		$db = \Config\Database::connect();
		$tables = $db->listTables();


	foreach ($tables as $table)
	{
			echo $table;
	}
		echo view('welcome_message');
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
					$upload_dir = 'uploads/';
					$this->validation = \Config\Services::validation();
					$encrypter = \Config\Services::encrypter();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
						$img_name = $_FILES['manager_image']['name'];
						$img_tmp_name = $_FILES["manager_image"]["tmp_name"];
						$error = $_FILES["manager_image"]["error"];
						if($error > 0){
							$response = array(
								"status" => "error",
								"error" => true,
								"message" => "Error uploading the file!"
							);
						}else 
						{
							$random_name = rand(1000,1000000)."-".strtolower($img_name);
							$upload_name = $upload_dir.''.$random_name;
							$upload_name = preg_replace('/\s+/', '-', $upload_name);

							if(move_uploaded_file($img_tmp_name , $upload_name)) {
								$response = array(
									"status" => "success",
									"error" => false,
									"message" => "File uploaded successfully",
									"url" => $upload_name
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
                        $team_data = [
							'team_name'=> $data['team_name'],
							'manager_image' => $random_name,
							'team_manager_name'=> $data['team_manager_name'],
							'team_manager_mobile'=> $data['team_manager_mobile'],
							'team_manager_email'=> $data['team_manager_email'],
							'country'=> $data['country'],
							'description'=> $data['description'],
							// 'team_manager_password'=> base64_encode($encrypter->encrypt($data->team_manager_password)),
                            'status' => $data['status']
                        ];
						$rules = [
							$team_data['team_name'] => 'required',
							$team_data['team_manager_name'] => 'required',
							$team_data['team_manager_mobile'] => 'required|is_unique[teams.team_manager_mobile]',
							$team_data['team_manager_email'] => 'required|valid_email|is_unique[teams.team_manager_email]',
							// $team_data['team_manager_password'] => 'required|min_length[8]|max_length[255]'
						];
						$error = $this->validation->setRules($rules);
						$msg = $this->validation->run($team_data, 'team_details');
						if (!$msg) {
							return $this->respondCreated(['status' => false, 'error' => $this->validation->getErrors()]);
						} else {
						$res = $this->model->insert($team_data);
						if($res == true){
                        $output = [
                            'message' => 'Team Added Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}else{
						$output = [
                            'message' => 'Team Not Added',
                            'status' => 'success'
                        ];
							return $this->respond($output,401);
					}
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
		// $token = $arr[1];
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
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
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
	$upload_dir = 'uploads/';
	$this->validation = \Config\Services::validation();
	if ($this->request->getMethod() == 'post') {
		$data = $this->request->getPost();
		if(!empty($_FILES['manager_image']['name'])){
			$img_name = $_FILES['manager_image']['name'];
		$img_tmp_name = $_FILES["manager_image"]["tmp_name"];
		$error = $_FILES["manager_image"]["error"];
		if($error > 0){
			$response = array(
				"status" => "error",
				"error" => true,
				"message" => "Error uploading the file!"
			);
		}else 
		{
			$random_name = rand(1000,1000000)."-".strtolower($img_name);
			$upload_name = $upload_dir.''.$random_name;
			$upload_name = preg_replace('/\s+/', '-', $upload_name);

			if(move_uploaded_file($img_tmp_name , $upload_name)) {
				$response = array(
					"status" => "success",
					"error" => false,
					"message" => "File uploaded successfully",
					"url" => $upload_name
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
		$random_name = $data['manager_image'];
	}
	$team_data = [
		'team_name'=> $data['team_name'],
		'manager_image' => $random_name,
		'team_manager_name'=> $data['team_manager_name'],
		'team_manager_mobile'=> $data['team_manager_mobile'],
		'team_manager_email'=> $data['team_manager_email'],
		'country'=> $data['country'],
		'description'=> $data['description'],
		// 'team_manager_password'=> base64_encode($encrypter->encrypt($data->team_manager_password)),
		'status' => $data['status']
	];
		
			
			$update_id = $data['id'];
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
							$random_name = rand(1000,1000000)."-".strtolower($img_name);
							$upload_name = $upload_dir.''.$random_name;
							$upload_name = preg_replace('/\s+/', '-', $upload_name);

							if(move_uploaded_file($img_tmp_name , $upload_name)) {
								$response = array(
									"status" => "success",
									"error" => false,
									"message" => "File uploaded successfully",
									"url" => $upload_name
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
							'subs_fees' => $data['subs_fees'],
							'country' => $data['country'],
							'guardian_name' => $data['guardian_name'],
							'guardian_mobile' => $data['guardian_mobile'],
							'guardian_email' => $data['guardian_email'],
							'guardian_address' => $data['guardian_address']
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
		// $token = $arr[1];
		// if($token){
			// try {
				// $decode = JWT::decode($token,$secret_key,array('HS256'));
				// if($decode){
					$matchdata = [];
							$players = $this->model->getteamplayers($id);
							$manager_data = $this->model->getteammanager($id);
							if(!empty($players)){
								$matchdata = $this->model->getteammatch($players[0]->team);
							}
							$output = [
								'status' => 'success',
								'data' => $players,
								'match_data' => $matchdata,
								'manager_data' => $manager_data
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
		// $token = $arr[1];
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
		// $token = $arr[1];
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
						
						// return $data['image'];
						if(!empty($_FILES['image']['name'])){
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
							$random_name = rand(1000,1000000)."-".strtolower($img_name);
							$upload_name = $upload_dir.''.$random_name;
							$upload_name = preg_replace('/\s+/', '-', $upload_name);

							if(move_uploaded_file($img_tmp_name , $upload_name)) {
								$response = array(
									"status" => "success",
									"error" => false,
									"message" => "File uploaded successfully",
									"url" => $upload_name
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
							'subs_fees' => $data['subs_fees'],
							'country' => $data['country'],
							'guardian_name' => $data['guardian_name'],
							'guardian_mobile' => $data['guardian_mobile'],
							'guardian_email' => $data['guardian_email'],
							'guardian_address' => $data['guardian_address']
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

	public function getmanagerteamdata($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$getmanager_team_data = $this->model->getmanager($id);
					
					$output = [
						'status' => 'success',
						'data' => $getmanager_team_data
					];
return $this->respond($output, 200);
		// 			$output = [
		// 				'message' => 'Access granted'
		// 			];
		// 			return $this->respond($output, 200);
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

	// get children
	public function getchild($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$getplayer = $this->model->getchild($id);
					$output = [
						'status' => 'success',
						'data' => $getplayer
					];
return $this->respond($output, 200);
		// 			$output = [
		// 				'message' => 'Access granted'
		// 			];
		// 			return $this->respond($output, 200);
		// 		}
		// // 	} catch (\Exception $e) {
		// // 		$output = [
		// // 				'message' => 'Access denied',
		// // 				'error' => $e->getMessage()
		// // 			];
		// // 			return $this->respond($output, 401);
		// // 	}
		// // }
	}

	public function paysubs()
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
                        $subs_data = [
							'child'=> $data->child,
							'pay_subs_date'=> $data->pay_subs_date,
							'subs_fees'=> $data->subs_fees,
							'user_id'=> $data->user_id
                        ];
						
					
						$res = $this->model->paysubs($subs_data);
						
						if($res){
							try{
                        $output = [
                            'message' => 'Pay subs Added Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'Pay subs not addedd',
								'error' => $e->getMessage()
							];
							return $this->respond($output, 500);
					}
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

	// membership payment
	public function paymembership()
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
                        $subs_data = [
							'member_name'=> $data->member_name,
							'email'=> $data->email,
							'mobile'=>$data->mobile,
							'member_pay_date'=> $data->member_pay_date,
							'membership_amount'=> $data->membership_amount,
							'user_id'=> $data->user_id
                        ];
						
					
						$res = $this->model->paymembership($subs_data);
						
						if($res){
							$output = [
								'message' => 'Membership Paid Successfully',
								'status' => 'success'
							];
							try{
								$email = \Config\Services::email();
							$logo_path = base_url().'/assets/images/logo.jpg';
							$email->attach($logo_path);
							$to = $data->email;
							$subject = 'Membership Payment Status';
							$message = '<div style="text-align:center"><img style="height:280px;width:280px;border-radius:50%" src="'.$logo_path.'" alt="logo 1"/></div><br><br>Hi <b>'.$data->member_name.'</b>,<br><br> Membership paid Details<br><br><table style="width:100%;margin:0px auto;border: 1px solid black;border-collapse: collapse;">
							<thead>
							<tr>
							<th style="border: 1px solid black">Member Email</th>
							<th style="border: 1px solid black">Member Mobile</th>
							<th style="border: 1px solid black">Paid Date</th>
							<th style="border: 1px solid black">Membership Amount</th>
							</tr>
							</thead>
							<tbody>
							<tr>
							<td style="border: 1px solid black;text-align:center">'.$data->email.'</td>
							<td style="border: 1px solid black;text-align:center">'.$data->mobile.'</td>
							<td style="border: 1px solid black;text-align:center">'.$data->member_pay_date.'</td>
							<td style="border: 1px solid black;text-align:center">'.$data->membership_amount.'</td>
							</tr></tbody>
							</table> <br><br>Thanks<br>Team';
							
							$email->setFrom('Info@email.com', 'Info');
							$email->setTo($to);
							// $email->setCC('another@example.com');
							// $email->setBCC('and@another.com');
							
							$email->setSubject($subject);
							$email->setMessage($message);
							if($email->send()){
								$output['user_mail_sent'] = true;
							}else{
								$output['user_mail_sent'] = false;
							}
                       
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'Membership Paid not complete',
								'error' => $e->getMessage()
							];
							return $this->respond($output, 500);
					}
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

	public function getmembershipdata($id){
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
							$membershipdata = $this->model->getmembershippayeddata($id);
							// print_r($players);
							// return;
							$output = [
								'status' => 'success',
								'data' => $membershipdata
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

	public function getpaysubs($id)
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
					$getteams = $this->model->getpaysubschilddata($id);
					
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
    
    


	//--------------------------------------------------------------------

}
