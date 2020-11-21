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
                        // return json_encode($hall_data);
                        // $model = new TicketModel();
                        // return json_encode($user_data);
                        $res = $this->model->insert($hall_data);
                        if($res){
							$users = $this->model->getusers($data->user_id);
                            $output = [
                                'message' => 'Sports Hall Booking Successfully',
                                'status' => 'success'
							];
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
					$output['mail_sent'] = true;
							}else{
							
							// $err =  $email->printDebugger(['headers']);
							// print_r($err);
							$output['mail_sent'] = false;
							}
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
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
                    $res = $this->model->gethallbookingdata();
							// $teams = $this->model->findAll();
							$output = [
								'status' => 'success',
								'data' => $res
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





	


	//--------------------------------------------------------------------

}
