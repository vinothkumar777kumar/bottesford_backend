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
class MatchResultController extends ResourceController
{
	protected $modelName = 'App\Models\MatchResultModel';
	
	public function __construct(){
$this->protect = new AuthController();
	}
	// public function index(){
	// 	echo view('welcome_message');
	// 		}
	

	
	public function addmatchresult()
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
							$teamonerandom_name = rand(1000,1000000)."-".strtolower($teamone_img_name);
							$upload_name = $upload_dir.''.$teamonerandom_name;
							$upload_name = preg_replace('/\s+/', '-', $upload_name);

							if(move_uploaded_file($teamoneimg_tmp_name , $upload_name)) {
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
							$teamtworandom_name = rand(1000,1000000)."-".strtolower($teamtwo_img_name);
							$upload_name = $upload_dir.''.$teamtworandom_name;
							$upload_name = preg_replace('/\s+/', '-', $upload_name);

							if(move_uploaded_file($teamtwoimg_tmp_name , $upload_name)) {
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
                        
                        $match_data = [
                            'match_date'=> $data['match_date'],
                            'match_name' => $data['match_name'],
                            'team_one_goal' => $data['team_one_goal'],
                            'team_two_goal' => $data['team_two_goal'],
                            'team_one' => $data['team_one'],
                            'team_one_image' => $teamonerandom_name,
                            'team_two' => $data['team_two'],
                            'team_two_image' => $teamtworandom_name,
                            'video_url' => $data['video_url']
                        ];
                        // $model = new TicketModel();
                        // return json_encode($user_data);
                        $res = $this->model->insert($match_data);
                        if($res){
                            $output = [
                                'message' => 'Match Result Added Successfully',
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

	public function getallmatchresult()
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
							$teams = $this->model->getallmatchresult();
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
    
    public function getlastmatchresult()
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
							$teams = $this->model->getlastmatchresult();
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

	public function getleaguetabledata(){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
							$teams = $this->model->getleaguetabledata();
							// return print_r($teams);
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


    

    public function editmatchresult($id)
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
    
 
    
    public function deletematchresult($id)
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
                        'message' => 'Match Result Deleted Successfully'
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
	






	public function updatematchresult()
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
                          $teamonerandom_name = rand(1000,1000000)."-".strtolower($teamone_img_name);
                          $upload_name = $upload_dir.''.$teamonerandom_name;
                          $upload_name = preg_replace('/\s+/', '-', $upload_name);

                          if(move_uploaded_file($teamoneimg_tmp_name , $upload_name)) {
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
                          $teamtworandom_name = rand(1000,1000000)."-".strtolower($teamtwo_img_name);
                          $upload_name = $upload_dir.''.$teamtworandom_name;
                          $upload_name = preg_replace('/\s+/', '-', $upload_name);

                          if(move_uploaded_file($teamtwoimg_tmp_name , $upload_name)) {
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
                        $teamtworandom_name = $data['team_two_image'];
                    }
						
                         $match_data = [
                            'id'=> $data['id'],
                            'match_date'=> $data['match_date'],
                            'match_name' => $data['match_name'],
                            'team_one_goal' => $data['team_one_goal'],
                            'team_two_goal' => $data['team_two_goal'],
                            'team_one' => $data['team_one'],
                            'team_one_image' => $teamonerandom_name,
                            'team_two' => $data['team_two'],
                            'team_two_image' => $teamtworandom_name,
                            'video_url' => $data['video_url']
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

	public function deletematchresultimage($image_name){
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
    
 


	//--------------------------------------------------------------------

}
