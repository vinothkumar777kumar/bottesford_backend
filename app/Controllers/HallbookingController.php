<?php namespace App\Controllers;
use \Firebase\JWT\JWT;
use App\Controllers\AuthController;
use CodeIgniter\RESTful\ResourceController;


header('Access-Control-Allow-Origin: *');        
header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization, Token, App-version,Access-Control-Allow-Headers");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Max-Age: 3600'); 

class HallbookingController extends ResourceController
{
	protected $modelName = 'App\Models\HallbookingModel';
	
	public function __construct(){
$this->protect = new AuthController();
	}
	public function index(){
		$now =  date('Y-m-d H:i:s');
echo $now;
		// $image = \Config\Services::image();
		// $email = \Config\Services::email();
		// $logo_path = base_url().'/assets/images/logo.jpg';
		// $email->attach($logo_path);
		// $to = 'testemail123@mailinator.com';
		// 					$subject = 'User Hall BookKing';
		// 					$message = '<div style="text-align:center"><img style="height:280px;width:280px;border-radius:50%" src="'.$logo_path.'" alt="logo 1"/></div><br><br>Hi Admin,<br><br><b>George</b> Booked Sports Hall<br><br><table style="width:100%;margin:0px auto;border: 1px solid black;border-collapse: collapse;">
		// 					<thead>
		// 					<tr>
		// 					<th style="border: 1px solid black">Booking Date</th>
		// 					<th style="border: 1px solid black">Booking Purpose</th>
		// 					<th style="border: 1px solid black">Booking Time</th>
		// 					</tr>
		// 					</thead>
		// 					<tbody>
		// 					<tr>
		// 					<td style="border: 1px solid black;text-align:center">12-11-2020</td>
		// 					<td style="border: 1px solid black;text-align:center">Sports Event</td>
		// 					<td style="border: 1px solid black;text-align:center">12:00pm to 1:00pm</td>
		// 					</tr></tbody>
		// 					</table> <br><br>Thanks<br>Team';
							
		// 					$email->setFrom('Info@email.com', 'Info');
		// 					$email->setTo($to);
				
		// 					$email->setSubject($subject);
		// 					$email->setMessage($message);
							
		// 					if($email->send()){
		// 			echo 'Email Sent';
		// 					}else{
							
		// 					$err =  $email->printDebugger(['headers']);
		// 					print_r($err);
		// 					}
		
			}
	

	
	public function hallbooking()
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
                    if ($this->request->getMethod() == 'post') {
                        $data = $this->request->getJSON();
                        
                        $hall_data = [
                            'user_id'=>$data->user_id,
                            'name'=> $data->name,
                            'email' => $data->email,
                            'mobile' => $data->mobile,
                            'purpose' => $data->purpose,
                            'booking_date' => $data->booking_date,
							'location' => $data->location,
							'start_time' => $data->start_time,
							'end_time' => $data->end_time
                        ];
                        // return $hall_data['booking_date'];
                        // $model = new TicketModel();
                        // return json_encode($user_data);
						$res = $this->model->hallbook($hall_data);
						// return json_encode($res);
                        if($res === true){
							// return json_encode($res);
							$users = $this->model->getusers($data->user_id);
                            $output = [
                                'message' => 'Sports Hall Booking Successfully',
                                'status' => 'success'
							];
							// admin mail sent
							$email = \Config\Services::email();
							$logo_path = base_url().'/assets/images/logo.jpg';
							$email->attach($logo_path);
							$to = 'testemail123@mailinator.com';
							$subject = 'User Hall BookKing';
							$message = '<div style="text-align:center"><img style="height:280px;width:280px;border-radius:50%" src="'.$logo_path.'" alt="logo 1"/></div><br><br>Hi Admin,<br><br><b>'.$users[0]->name.'</b> Booked Sports Hall<br><br><table style="width:100%;margin:0px auto;border: 1px solid black;border-collapse: collapse;">
							<thead>
							<tr>
							<th style="border: 1px solid black">Booking Date</th>
							<th style="border: 1px solid black">Booking Purpose</th>
							<th style="border: 1px solid black">Booking Time</th>
							</tr>
							</thead>
							<tbody>
							<tr>
							<td style="border: 1px solid black;text-align:center">'.$data->booking_date.'</td>
							<td style="border: 1px solid black;text-align:center">'.$data->purpose.'</td>
							<td style="border: 1px solid black;text-align:center">'.$data->start_time.' To '.$data->end_time.'</td>
							</tr></tbody>
							</table> <br><br>Thanks<br>Team';
							
							$email->setFrom('Info@email.com', 'Info');
							$email->setTo($to);
							// $email->setCC('another@example.com');
							// $email->setBCC('and@another.com');
							
							$email->setSubject($subject);
							$email->setMessage($message);

							
							
							if($email->send()){
								// user mail sent
							$user_email = \Config\Services::email();
							$user_logo_path = base_url().'/assets/images/logo.jpg';
							$user_email->attach($user_logo_path);
							$to_user = $users[0]->email;
							$user_subject = 'User Hall BookKing';
							$user_message = '<div style="text-align:center"><img style="height:280px;width:280px;border-radius:50%" src="'.$logo_path.'" alt="logo 1"/></div><br><br>Hi <b>'.$users[0]->name.'<b>,<br><br><b> Sportshall Booking succesfull<br><br><b>Booking Details</b><br><table style="width:100%;margin:0px auto;border: 1px solid black;border-collapse: collapse;">
							<thead>
							<tr>
							<th style="border: 1px solid black">Booking Date</th>
							<th style="border: 1px solid black">Booking Purpose</th>
							<th style="border: 1px solid black">Booking Time</th>
							</tr>
							</thead>
							<tbody>
							<tr>
							<td style="border: 1px solid black;text-align:center">'.$data->booking_date.'</td>
							<td style="border: 1px solid black;text-align:center">'.$data->purpose.'</td>
							<td style="border: 1px solid black;text-align:center">'.$data->start_time.' To '.$data->end_time.'</td>
							</tr></tbody>
							</table> <br><br>Thanks<br>Team';
							
							$user_email->setFrom('Info@email.com', 'Info');
							$user_email->setTo($to_user);
							// $email->setCC('another@example.com');
							// $email->setBCC('and@another.com');
							
							$user_email->setSubject($user_subject);
							$user_email->setMessage($user_message);
							$user_email->send();
					$output['admin_mail_sent'] = true;
					$output['user_mail_sent'] = true;
							}else{
							
							// $err =  $email->printDebugger(['headers']);
							// print_r($err);
							$output['admin_mail_sent'] = false;
					$output['user_mail_sent'] = false;
							}
                                return $this->respond($output,200);
                        }else{
                            $output = [
                                // 'error' => $this->db->error(),
								'status' => 'fail',
								'message' => $res
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
    
    public function getbooksportsdata($id){
		
        $secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$res = $this->model->getbookhalldata($id);
					
							// $teams = $this->model->findAll();
							$output = [
								'status' => 'success',
								'data' => $res
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
	
	public function gethallbookeddata(){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		// $token = $arr[1];
		// if($token){
		// 	try {
				// $decode = JWT::decode($token,$secret_key,array('HS256'));
				// if($decode){
                    $res = $this->model->gethallbookingdata();
							// $teams = $this->model->findAll();
							$output = [
								'status' => 'success',
								'data' => $res
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

	public function editsportshalldata($id)
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
					$getsportshalldata = $this->model->editsportshall($id);
					
					$output = [
						'status' => 'success',
						'data' => $getsportshalldata
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

	public function blockbook(){
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
					$hall_status_update = [
						'status' => $data->status
					];
					// return json_encode($hall_status_update);
						
						// $update_id = $data->id;
						// echo json_encode($userdata);
						$res =  $this->model->where(['id' => $data->id])->set($hall_status_update)->update();
						if($res){
						$output = [
							'status' => 'success',
							'message' => 'Sportshall booking Update Successfully.'
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
	
	public function updatesportshall(){
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
					$hall_data = [
						'id' => $data->id,
						'user_id'=>$data->user_id,
						'name'=> $data->name,
						'email' => $data->email,
						'mobile' => $data->mobile,
						'purpose' => $data->purpose,
						'booking_date' => $data->booking_date,
						'location' => $data->location,
						'start_time' => $data->start_time,
						'end_time' => $data->end_time
					];
					
						
						$update_id = $data->id;
						// echo json_encode($userdata);
						$res =  $this->model->where(['id' => $data->id])->set($hall_data)->update();
						if($res){
						$output = [
							'status' => 'success',
							'message' => 'Sportshall booking Update Successfully.'
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

	public function deletehallbooking($id){
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
                        'message' => 'SportsHall Booking Deleted Successfully'
					];
					return $this->respond($output, 200);
									}else{
										$output = [
											'status' => 'fail',
											'error' => $delete
										];
					return $this->respond($output, 401);   
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



// add sportshallimages
public function sportshallimage()
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
					// image one upload
					$img_one_name = $_FILES['image_one']['name'];
					$img_one_tmp_name = $_FILES["image_one"]["tmp_name"];
					$error = $_FILES["image_one"]["error"];
					if($error > 0){
						$response = array(
							"status" => "error",
							"error" => true,
							"message" => "Error uploading the file!"
						);
					}else 
					{
						$img_one_random_name = rand(1000,1000000)."-".strtolower($img_one_name);
						$img_one_upload_name = $upload_dir.''.$img_one_random_name;
						$img_one_upload_name = preg_replace('/\s+/', '-', $img_one_upload_name);

						if(move_uploaded_file($img_one_tmp_name , $img_one_upload_name)) {
							$response = array(
								"status" => "success",
								"error" => false,
								"message" => "File uploaded successfully",
								"url" => $img_one_upload_name
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
					// image two upload
					$img_two_name = $_FILES['image_two']['name'];
					$img_two_tmp_name = $_FILES["image_two"]["tmp_name"];
					$img_two_error = $_FILES["image_two"]["error"];
					if($img_two_error > 0){
						$response = array(
							"status" => "error",
							"error" => true,
							"message" => "Error uploading the file!"
						);
					}else 
					{
						$img_two_random_name = rand(1000,1000000)."-".strtolower($img_two_name);
						$img_two_upload_name = $upload_dir.''.$img_two_random_name;
						$img_two_upload_name = preg_replace('/\s+/', '-', $img_two_upload_name);

						if(move_uploaded_file($img_two_tmp_name , $img_two_upload_name)) {
							$response = array(
								"status" => "success",
								"error" => false,
								"message" => "File uploaded successfully",
								"url" => $img_two_upload_name
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
					
					$image_data = [
						'image_one' => $img_one_random_name,
						'image_two' => $img_two_random_name,
						'image_category' => $data['image_category']
					];
					
					// return json_encode($blog_data);
					$res = $this->model->addimage($image_data);
				
					if($res){
						try{
					$output = [
						'message' => 'Image Update Successfully',
						'status' => 'success'
					];
						return $this->respond($output,200);
				}catch (\Exception $e) {
					$output = [
							'message' => 'image not addedd',
							'error' => $e->getMessage()
						];
						return $this->respond($output, 500);
				}
				}else{
					$output = [
						'message' => 'Image not addedd',
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

public function getsportshallimage($category){
	$secret_key = $this->protect->privateKey();
	$token  = null;
	$authHeader = $this->request->getHeader('Authorization');
	$arr = explode(" ", $authHeader);
	// $token = $arr[1];
	// if($token){
	// 	try {
	// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
	// 		if($decode){
				$getblog = $this->model->getsportshallimages($category);
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

	// update sportshall images
	public function updatesportshallimage($id)
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
				  // team one image uploade
				  
				  if(!empty($_FILES['image_one']['name'])){
					$img_one_name = $_FILES['image_one']['name'];
				  $img_one_tmp_name = $_FILES["image_one"]["tmp_name"];
				  $img_one_error = $_FILES["image_one"]["error"];
				  if($img_one_error > 0){
					  $response = array(
						  "status" => "error",
						  "error" => true,
						  "message" => "Error uploading the file!"
					  );
				  }else 
				  {
					  $img_one_random_name = rand(1000,1000000)."-".strtolower($img_one_name);
					  $img_one_upload_name = $upload_dir.''.$img_one_random_name;
					  $img_one_upload_name = preg_replace('/\s+/', '-', $img_one_upload_name);

					  if(move_uploaded_file($img_one_tmp_name , $img_one_upload_name)) {
						  $response = array(
							  "status" => "success",
							  "error" => false,
							  "message" => "File uploaded successfully",
							  "url" => $img_one_upload_name
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
					$img_one_random_name = $data['image_one'];
				}
				  // team two image uploade
				  
				  if(!empty($_FILES['image_two']['name'])){
					$img_two_name = $_FILES['image_two']['name'];
				  $img_two_tmp_name = $_FILES["image_two"]["tmp_name"];
				  $img_two_error = $_FILES["image_two"]["error"];
				  if($img_two_error > 0){
					  $response = array(
						  "status" => "error",
						  "error" => true,
						  "message" => "Error uploading the file!"
					  );
				  }else 
				  {
					  $img_two_random_name = rand(1000,1000000)."-".strtolower($img_two_name);
					  $img_two_upload_name = $upload_dir.''.$img_two_random_name;
					  $img_two_upload_name = preg_replace('/\s+/', '-', $img_two_upload_name);

					  if(move_uploaded_file($img_two_tmp_name , $img_two_upload_name)) {
						  $response = array(
							  "status" => "success",
							  "error" => false,
							  "message" => "File uploaded successfully",
							  "url" => $img_two_upload_name
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
					$img_two_random_name = $data['image_two'];
				}
					
					 $image_data = [
						
						'image_one' => $img_one_random_name,
						'image_two' => $img_two_random_name,
						'image_category'=> $data['image_category'],
						
					];
				
					
					// return json_encode($user_data);
					$res = $this->model->updatesportshallimage($image_data,$id);
					if($res){
						try{
					$output = [
						'message' => 'Image Update Successfully',
						'status' => 'success'
					];
						return $this->respond($output,200);
				}catch (\Exception $e) {
					$output = [
							'message' => 'Image not updated',
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

public function deletesportshallimage($image_name){
	$path = "uploads/".$image_name;
	if(file_exists($path)){
		unlink($path);
		$output = [
			'message' => 'Image Deleted Successfully.',
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
