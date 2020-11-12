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
	// public function index(){
	// 	echo view('welcome_message');
	// 		}
	

	
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
                            $output = [
                                'message' => 'Sports Hall Booking Successfully',
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
    
    public function getbooksportsdata($id){
        $secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
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
                    $res = $this->model->findAll();
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





	


	//--------------------------------------------------------------------

}
