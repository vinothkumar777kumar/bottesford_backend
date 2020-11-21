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
class TicketController extends ResourceController
{
	protected $modelName = 'App\Models\TicketModel';
	public function __construct(){
$this->protect = new AuthController();

	}

	

	// users ticket booking
	public function ticket_booking()
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
						$ticket_data = $data->data;
						$user_id = $data->user_id;
						$user_data = array();
						foreach($ticket_data as $t){
                        $user_data[] = [
							'match_id' => $t->match_id,
                            'match_type'=> $t->match_name,
                            'matchdate' => $t->matchdate,
                            'team_one' => $t->team_one,
                            'team_one_img' => $t->team_one_image,
                            'team_two' => $t->team_two,
                            'team_two_img' => $t->team_two_image,
                            'ticket' => $t->ticket,
							'ticket_price' => $t->ticket_price,
							'type' => $t->type,
							'adult_ticket_price' => $t->adult_ticket_price,
							'conses_ticket_price' => $t->conses_ticket_price,
							'under_16_ticket_price' => $t->under_16_ticket_price,
                            'user_id' => $t->user_id
						];
					}
					// return json_encode($user_data);
					$res = $this->model->insertBatch($user_data);
						// return json_encode($user_data);
                        // $model = new TicketModel();
						// return json_encode($user_data);
						if($res){
                        
                        $output = [
                            'message' => 'Ticket Booking Successfully',
                            'status' => 'success',
                            'data' => $res
                        ];
							return $this->respond($output,200);
					}else{
						$db  = \Config\Database::connect();
						$query = $db->getLastQuery();
						$output = [
                            'message' => $db->error(),
                            'status' => 'fail',
                            'data' => $res
                        ];
							return $this->respond($output);
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

	public function get_bookedtickets($id)
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
					$res = $this->model->gettickets($id);
					
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

	// admin get users ticket booking deatils
	public function getTickets($match_id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
					$res = $this->model->get_userbookedtickets($match_id);
					// return json_encode($res);
					$data   =   array();
					// echo count($res);
					foreach($res as $d){
						$ticketcount = $this->model->getnotickets($d->user_id,$d->match_id);
						$adult_t_p = 0;
						$conse_t_p = 0;
						$under16_t_p = 0;
						foreach($ticketcount as $t){
$adult_t_p += $t->adult_ticket_price;
$conse_t_p += $t->conses_ticket_price;
$under16_t_p += $t->under_16_ticket_price;
						}
						$data[] = array(
							'ticket'=>$d->ticket,
							'matchdate'=>$d->matchdate,
							'team_one'=>$d->team_one,
							'team_two'=>$d->team_two,
							'ticket_price'=>$adult_t_p + $conse_t_p + $under16_t_p,
							'adult_ticket_price' => $adult_t_p,
							'conses_ticket_price' => $conse_t_p,
							'under_16_ticket_price' => $under16_t_p,
							'match_type'=>$d->match_type,
							'name'=>$d->name,
							'total_ticket'=>count($ticketcount)
						);
					}
					$output = [
						'status' => 'success',
						'data' => $data
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

	public function today_ticket_booking(){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		// if($token){
		// 	try {
		// 		$decode = JWT::decode($token,$secret_key,array('HS256'));
		// 		if($decode){
					$res = $this->model->get_todaybookedtickets();					
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
