<?php namespace App\Controllers;
use \Firebase\JWT\JWT;
use App\Controllers\AuthController;
use CodeIgniter\RESTful\ResourceController;


header('Access-Control-Allow-Origin: *');        
header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization, Token, App-version,Access-Control-Allow-Headers");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Max-Age: 3600'); 

class SportshallusesController extends ResourceController
{
	protected $modelName = 'App\Models\SportshallusesModel';
	
	public function __construct(){
$this->protect = new AuthController();
	}
	// public function index(){
	// 	echo view('welcome_message');
	// 		}
	

	
	public function addsportshalluses()
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
                        $uses_data = [
							'hall_uses'=> $data->hall_uses
                        ];
					
                        $res = $this->model->insert($uses_data);
                        if($res){
                            $output = [
								'status' => 'success',
								'message' => 'Sportshall Uses Added successfully'
							];
							return $this->respond($output, 200);
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

	public function getsportshalluses()
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
							$uses = $this->model->findAll();
                        // if($uses){
                            $output = [
								'status' => 'success',
								'data' => $uses
							];
							return $this->respond($output, 200);
                        // } else{
                        //     $output = [
                        //         'error' => $this->db->error(),
                        //         'status' => 'fail'
                        //     ];
                        //         return $this->respond($output,401);
                        // }              
							
				
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

	public function updatesportshalluses(){
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
		$uses_data = [
			'hall_uses' => $data->hall_uses
		];
		
		
			$res =  $this->model->where(['id' => $data->id])->set($uses_data)->update();
			if($res){
                $output = [
                    'status' => 'success',
                    'message' => 'Sportshall Uses Update Successfully.'
                ];
                return $this->respond($output, 200);
            }else{
                $output = [
                    'status' => 'faile',
                    'error' =>  $this->db->error()
                ];
                return $this->respond($output, 401); 
            }
			
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
    


    
    public function deletesportshalluses($id)
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
                        'message' => 'Sportshall Uses Deleted Successfully'
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



	public function editsportshalluses($id){
		$secret_key = $this->protect->privateKey();
		$token  = null;
		$authHeader = $this->request->getHeader('Authorization');
		$arr = explode(" ", $authHeader);
		$token = $arr[1];
		if($token){
			try {
				$decode = JWT::decode($token,$secret_key,array('HS256'));
				if($decode){
                    $getuses = $this->model->edituses($id);
                    if($getuses){
                        $output = [
                            'status' => 'success',
                            'data' => $getuses
                        ];
    return $this->respond($output, 200);
                    }else{
                        $output = [
                            'error' => $this->db->error(),
                            'status' => 'fail'
                        ];
                            return $this->respond($output,401);
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


	


	//--------------------------------------------------------------------

}
