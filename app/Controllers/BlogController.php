<?php namespace App\Controllers;
use \Firebase\JWT\JWT;
use App\Controllers\AuthController;
use CodeIgniter\RESTful\ResourceController;


header('Access-Control-Allow-Origin: *');        
header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization, Token, App-version,Access-Control-Allow-Headers");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Max-Age: 3600'); 


class BlogController extends ResourceController
{
	protected $modelName = 'App\Models\BlogModel';
	
	public function __construct(){
$this->protect = new AuthController();
	}
	public function index(){
		// echo view('welcome_message');
			}	
    

	
	// add players
	public function addblog()
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
					$upload_dir = 'uploads/blog/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
						$img_name = $_FILES['blog_image']['name'];
						$img_tmp_name = $_FILES["blog_image"]["tmp_name"];
						$error = $_FILES["blog_image"]["error"];
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
						
                        $blog_data = [
							'title'=> $data['title'],
							'blog_image' => $random_name,
							'description' => $data['description'],
							'publish_date' => $data['publish_date'],
							'status' => $data['status'],
                        ];
                        
                        // return json_encode($blog_data);
						$res = $this->model->insert($blog_data);
					
						if($res){
							try{
                        $output = [
                            'message' => 'Blog Added Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'Blog not addedd',
								'error' => $e->getMessage()
							];
							return $this->respond($output, 500);
					}
					}else{
						$output = [
							'message' => 'Blog not addedd',
							'error' => fail
						];
						return $this->respond($output, 401);
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





	
	public function getallblog(){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
							$blog = $this->model->getallblog();
							$output = [
								'status' => 'success',
								'data' => $blog
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

	public function editblog($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$getblog = $this->model->getblog($id);
					$output = [
						'status' => 'success',
						'data' => $getblog
					];
return $this->respond($output, 200);
					$output = [
						'message' => 'Access granted'
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

	public function updateblog($id)
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
					$upload_dir = 'uploads/blog/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
						$img_name = $_FILES['blog_image']['name'];
						// return $data['image'];
						if($img_name){
						$img_tmp_name = $_FILES["blog_image"]["tmp_name"];
						$error = $_FILES["blog_image"]["error"];
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
						$random_name = $data['blog_image'];
					}
						
					$blog_data = [
						'title'=> $data['title'],
						'blog_image' => $random_name,
						'description' => $data['description'],
						'publish_date' => $data['publish_date'],
						'status' => $data['status'],
					];
                        
                        // return json_encode($user_data);
						$res = $this->model->updateblog($blog_data,$id);
					// return json_encode($res);
						if($res){
							try{
                        $output = [
                            'message' => 'Blog Update Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'Blog not updated',
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

	public function deletblog($id)
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
                        'message' => 'Blog Deleted Successfully'
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

	public function deleteblogimage($image_name){
		$path = "uploads/blog/".$image_name;
		if(file_exists($path)){
			unlink($path);
			$output = [
				'message' => 'Blog Image Deleted.',
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

	// bionewsfeed query

	public function getallbionewsfeed(){
		// return 'hi';
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
							$data = $this->model->getallbionewsfeed();
							$output = [
								'status' => 'success',
								'data' => $data
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

	public function getteambionewsfeed($id){
		// return 'hi';
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
							$data = $this->model->getteambionewsfeed($id);
							$output = [
								'status' => 'success',
								'data' => $data
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

	public function addbionewsfeed()
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
					$upload_dir = 'uploads/bionewsfeed/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
						$img_name = $_FILES['bionewsfeed_image']['name'];
						$img_tmp_name = $_FILES["bionewsfeed_image"]["tmp_name"];
						$error = $_FILES["bionewsfeed_image"]["error"];
						if($error > 0){
							$response = array(
								"status" => "error",
								"error" => true,
								"message" => "Error uploading the file!"
							);
						}else 
						{
							$random_name = rand(1000,1000000)."-".$img_name;
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
						$team_id = 0;
						if(empty($data['team_id'])){
							$res = $this->model->getteamdata($data['user_id']);
							$team_id = $res[0]->id;
						}else{
							$team_id = $data['team_id'];
						}
						
						// return $team_id;
                        $data = [
							'title'=> $data['title'],
							'team_id' => $team_id,
							'link'=> $data['link'],
							'bionewsfeed_image' => $random_name,
							'description' => $data['description'],
							'publish_date' => $data['publish_date'],
							'status' => $data['status'],
                        ];
                        
                        // return json_encode($blog_data);
						$res = $this->model->inserbionewsfeed($data);
					
						if($res){
							try{
                        $output = [
                            'message' => 'Bio/Newsfeed Added Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'Bio/Newsfeed not addedd',
								'error' => $e->getMessage()
							];
							return $this->respond($output, 500);
					}
					}else{
						$output = [
							'message' => 'Bio/Newsfeed not addedd',
							'error' => fail
						];
						return $this->respond($output, 401);
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

	public function editbionewsfeed($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$getbionewsfeed = $this->model->editbionewsfeed($id);
					if($getbionewsfeed){
					$output = [
						'status' => 'success',
						'data' => $getbionewsfeed
					];
					return $this->respond($output, 200);
				}else{
					$output = [
						'message' => 'Access granted'
					];
					return $this->respond($output, 401);
				}
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

	public function updatebionewsfeed($id){
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
					$upload_dir = 'uploads/bionewsfeed/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
						// return empty($_FILES['bionewsfeed_image']['name']);
						// return $_FILES['bionewsfeed_image']['name'];
						// $img_name = isset($_FILES['bionewsfeed_image']['name']);
						
						if(empty($_FILES['bionewsfeed_image']['name'])){
							$random_name = $data['bionewsfeed_image'];
						}else{
					 $img_name = $_FILES['bionewsfeed_image']['name'];
						$img_tmp_name = $_FILES["bionewsfeed_image"]["tmp_name"];
						$error = $_FILES["bionewsfeed_image"]["error"];
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
					}

					// return $random_name;
					$team_id = 0;
						if(empty($data['team_id'])){
							$res = $this->model->getteamdata($data['user_id']);
							$team_id = $res[0]->id;
						}else{
							$team_id = $data['team_id'];
						}
					$data = [
						'title'=> $data['title'],
						'team_id' => $team_id,
						'link'=> $data['link'],
						'bionewsfeed_image' => $random_name,
						'description' => $data['description'],
						'publish_date' => $data['publish_date'],
						'status' => $data['status'],
					];
                        
                        // return json_encode($user_data);
						$res = $this->model->updatebionewsfeed($data,$id);
					// return json_encode($res);
						if($res){
							try{
                        $output = [
                            'message' => 'Bio/newsfeed Update Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'Bio/newsfeed not updated',
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

	public function deletebionewsfeed($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
                    $delete = $this->model->deletebionewsfeed($id);
                
					if($delete){
					$output = [
                        'status' => 'success',
                        'message' => 'Bio/newsfeed Deleted Successfully'
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

	public function deletebionewsfeedimage($image_name){
		$path = "uploads/bionewsfeed/".$image_name;
		if(file_exists($path)){
			unlink($path);
			$output = [
				'message' => 'Bio/newsfeed Image Deleted.',
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

	public function getactivenewsfeeddata(){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
							$data = $this->model->getactivenewsfeed();
							$output = [
								'status' => 'success',
								'data' => $data
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

		// socialclub query
		public function getallsocialclub(){
			$secret_key = $this->protect->privateKey();
			$token  = null;
			$authHeader = $this->request->getHeader('Authorization');
			$arr = explode(" ", $authHeader);
			// $token = $arr[1];
			// if($token){
			// 	try {
			// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
			// 		if($decode){
								$data = $this->model->getallsocialclub();
								$output = [
									'status' => 'success',
									'data' => $data
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

		public function addsocialclub()
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
					$upload_dir = 'uploads/socialclub/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
						$img_name = $_FILES['social_image']['name'];
						$img_tmp_name = $_FILES["social_image"]["tmp_name"];
						$error = $_FILES["social_image"]["error"];
						if($error > 0){
							$response = array(
								"status" => "error",
								"error" => true,
								"message" => "Error uploading the file!"
							);
						}else 
						{
							$random_name = rand(1000,1000000)."-".$img_name;
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
						
                        $data = [
							'title'=> $data['title'],
							'social_image' => $random_name,
							'description' => $data['description'],
							'publish_date' => $data['publish_date'],
							'mobile' => $data['mobile'],
							'email' => $data['email'],
							'status' => $data['status']
                        ];
                        
                        // return json_encode($blog_data);
						$res = $this->model->insersocialclub($data);
					
						if($res){
							try{
                        $output = [
                            'message' => 'Social club Added Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'Social club not addedd',
								'error' => $e->getMessage()
							];
							return $this->respond($output, 500);
					}
					}else{
						$output = [
							'message' => 'Social club not addedd',
							'error' => fail
						];
						return $this->respond($output, 401);
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

	public function editsocialclub($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$data = $this->model->editsocialclub($id);
					$output = [
						'status' => 'success',
						'data' => $data
					];
					return $this->respond($output, 200);
					$output = [
						'message' => 'Access granted'
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

	public function updatesocialclub($id){
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
					$upload_dir = 'uploads/socialclub/';
                    $this->validation = \Config\Services::validation();
                    if ($this->request->getMethod() == 'post') {
                        
						$data = $this->request->getPost();
						// return empty($_FILES['bionewsfeed_image']['name']);
						// return $_FILES['bionewsfeed_image']['name'];
						// $img_name = isset($_FILES['bionewsfeed_image']['name']);
						
						if(empty($_FILES['social_image']['name'])){
							$random_name = $data['social_image'];
						}else{
					 $img_name = $_FILES['social_image']['name'];
						$img_tmp_name = $_FILES["social_image"]["tmp_name"];
						$error = $_FILES["social_image"]["error"];
						if($error > 0){
							$response = array(
								"status" => "error",
								"error" => true,
								"message" => "Error uploading the file!"
							);
						}else 
						{
							$random_name = rand(1000,1000000)."-".$img_name;
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
					}

					// return $random_name;
						
					$data = [
							'title'=> $data['title'],
							'social_image' => $random_name,
							'description' => $data['description'],
							'publish_date' => $data['publish_date'],
							'mobile' => $data['mobile'],
							'email' => $data['email'],
							'status' => $data['status']
					];
                        
                        // return json_encode($user_data);
						$res = $this->model->updatesocialclub($data,$id);
					// return json_encode($res);
						if($res){
							try{
                        $output = [
                            'message' => 'Social club Update Successfully',
                            'status' => 'success'
                        ];
							return $this->respond($output,200);
					}catch (\Exception $e) {
						$output = [
								'message' => 'Social club not updated',
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

	public function deletesocialimage($image_name){
		$path = "uploads/socialclub/".$image_name;
		if(file_exists($path)){
			unlink($path);
			$output = [
				'message' => 'social club Image Deleted.',
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

	public function deletesocialclub($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
                    $delete = $this->model->deletesocialclub($id);
                
					if($delete){
					$output = [
                        'status' => 'success',
                        'message' => 'social club Deleted Successfully'
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

	public function getactivesocialclubdata(){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
							$data = $this->model->getactivesocialclub();
							$output = [
								'status' => 'success',
								'data' => $data
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


	//--------------------------------------------------------------------

}
