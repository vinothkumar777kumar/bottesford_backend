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
class MatchController extends ResourceController
{
	protected $modelName = 'App\Models\MatchModel';
	
	public function __construct(){
$this->protect = new AuthController();
	}
	// public function index(){
	// 	echo view('welcome_message');
	// 		}
	

	
	public function addmatch()
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
                    $upload_dir = 'uploads/match/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        $data = $this->request->getPost();
                        // team one image uploade
                        $teamone_img_name = $_FILES['team_one_image']['name'];
						$teamoneimg_tmp_name = $_FILES["team_one_image"]["tmp_name"];
						$teamone_error = $_FILES["team_one_image"]["error"];
						if($teamone_error > 0){
							$response = array(
								"status" => "error",
								"error" => true,
								"message" => "Error uploading the file!"
							);
						}else 
						{
							$teamonerandom_name = rand(1000,1000000)."-".$teamone_img_name;
							$upload_name = $upload_dir.strtolower($teamonerandom_name);
							$upload_name = preg_replace('/\s+/', '-', $upload_name);

							if(move_uploaded_file($teamoneimg_tmp_name , $upload_name)) {
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
                        // team two image uploade
                        $teamtwo_img_name = $_FILES['team_two_image']['name'];
						$teamtwoimg_tmp_name = $_FILES["team_two_image"]["tmp_name"];
						$teamtwo_error = $_FILES["team_two_image"]["error"];
						if($teamtwo_error > 0){
							$response = array(
								"status" => "error",
								"error" => true,
								"message" => "Error uploading the file!"
							);
						}else 
						{
							$teamtworandom_name = rand(1000,1000000)."-".$teamtwo_img_name;
							$upload_name = $upload_dir.strtolower($teamtworandom_name);
							$upload_name = preg_replace('/\s+/', '-', $upload_name);

							if(move_uploaded_file($teamtwoimg_tmp_name , $upload_name)) {
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
                        
                        $match_data = [
                            'match_date'=> $data['match_date'],
                            'match_name' => $data['match_name'],
                            'round' => $data['round'],
                            'team_one' => $data['team_one'],
                            'team_one_image' => $teamonerandom_name,
                            'team_two' => $data['team_two'],
							'team_two_image' => $teamtworandom_name,
							'start_time'=> $data['start_time'],
							'end_time'=> $data['end_time'],
							'ticket_price'=> $data['ticket_price']
                        ];
                        // $model = new TicketModel();
                        // return json_encode($user_data);
                        $res = $this->model->insert($match_data);
                        if($res){
                            $output = [
                                'message' => 'Match Added Successfully',
                                'status' => 'success'
                            ];
                                return $this->respond($output,200);
                        }else{
                            $output = [
                                'error' => $this->db->error(),
                                'status' => 'fail'
                            ];
                                return $this->respond($output,401);
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

	public function getallmatch()
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
							$teams = $this->model->findAll();
							$output = [
								'status' => 'success',
								'data' => $teams
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
    

    public function editmatch($id)
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
			'id'=> $data->id,
			'team_name' => $data->team_name,
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
    
    public function deletematch($id)
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
                        'message' => 'Match Deleted Successfully'
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
                        
                        // return json_encode($user_data);
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

	public function updatematch()
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
					$upload_dir = 'uploads/match/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
					  // team one image uploade
                      $teamone_img_name = $_FILES['team_one_image']['name'];
                      if($teamone_img_name){
                      $teamoneimg_tmp_name = $_FILES["team_one_image"]["tmp_name"];
                      $teamone_error = $_FILES["team_one_image"]["error"];
                      if($teamone_error > 0){
                          $response = array(
                              "status" => "error",
                              "error" => true,
                              "message" => "Error uploading the file!"
                          );
                      }else 
                      {
                          $teamonerandom_name = rand(1000,1000000)."-".$teamone_img_name;
                          $upload_name = $upload_dir.strtolower($teamonerandom_name);
                          $upload_name = preg_replace('/\s+/', '-', $upload_name);

                          if(move_uploaded_file($teamoneimg_tmp_name , $upload_name)) {
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
                        $teamonerandom_name = $data['team_one_image'];
                    }
                      // team two image uploade
                      $teamtwo_img_name = $_FILES['team_two_image']['name'];
                      if($teamtwo_img_name){
                      $teamtwoimg_tmp_name = $_FILES["team_two_image"]["tmp_name"];
                      $teamtwo_error = $_FILES["team_two_image"]["error"];
                      if($teamtwo_error > 0){
                          $response = array(
                              "status" => "error",
                              "error" => true,
                              "message" => "Error uploading the file!"
                          );
                      }else 
                      {
                          $teamtworandom_name = rand(1000,1000000)."-".$teamtwo_img_name;
                          $upload_name = $upload_dir.strtolower($teamtworandom_name);
                          $upload_name = preg_replace('/\s+/', '-', $upload_name);

                          if(move_uploaded_file($teamtwoimg_tmp_name , $upload_name)) {
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
                        $teamtworandom_name = $data['team_two_image'];
                    }
						
                         $match_data = [
                            'id'=> $data['id'],
                            'match_date'=> $data['match_date'],
                            'match_name' => $data['match_name'],
                            'round' => $data['round'],
                            'team_one' => $data['team_one'],
                            'team_one_image' => $teamonerandom_name,
                            'team_two' => $data['team_two'],
							'team_two_image' => $teamtworandom_name,
							'start_time'=> $data['start_time'],
							'end_time'=> $data['end_time'],
							'ticket_price'=> $data['ticket_price']
                        ];
                    
                        
                        // return json_encode($user_data);
                        $res = $this->model->updatematch($match_data);
						if($res){
							try{
                        $output = [
                            'message' => 'Match Update Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'match not updated',
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

	public function deletematchimage($image_name){
		$path = "uploads/match/".$image_name;
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
    
    public function nextmatch(){
        $getmatch = $this->model->getnextmatch();
					$output = [
						'status' => 'success',
						'data' => $getmatch
					];
return $this->respond($output, 200);
	}
	
	public function getmatchschedule(){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$res = $this->model->get_matchschedule();					
					$output = [
						'status' => 'success',
						'data' => $res
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


	//--------------------------------------------------------------------

}
