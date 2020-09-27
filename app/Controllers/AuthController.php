<?php
namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use \App\Libraries\Oauth;
use \Firebase\JWT\JWT;
use \OAuth2\Request;
use CodeIgniter\RESTful\ResourceController;

// use chriskacerguis\RestServer\RestController;

class AuthController extends ResourceController
{
    use ResponseTrait;
    private $Auth;
    public function __construct()
    {
        $this->Auth = new AuthModel();
        $this->setHeaders();

    }



    public function privateKey()
    {
        $privateKey = <<<EOD
                -----BEGIN RSA PRIVATE KEY-----
                MIICXAIBAAKBgQC8kGa1pSjbSYZVebtTRBLxBz5H4i2p/llLCrEeQhta5kaQu/Rn
                vuER4W8oDH3+3iuIYW4VQAzyqFpwuzjkDI+17t5t0tyazyZ8JXw+KgXTxldMPEL9
                5+qVhgXvwtihXC1c5oGbRlEDvDF6Sa53rcFVsYJ4ehde/zUxo6UvS7UrBQIDAQAB
                AoGAb/MXV46XxCFRxNuB8LyAtmLDgi/xRnTAlMHjSACddwkyKem8//8eZtw9fzxz
                bWZ/1/doQOuHBGYZU8aDzzj59FZ78dyzNFoF91hbvZKkg+6wGyd/LrGVEB+Xre0J
                Nil0GReM2AHDNZUYRv+HYJPIOrB0CRczLQsgFJ8K6aAD6F0CQQDzbpjYdx10qgK1
                cP59UHiHjPZYC0loEsk7s+hUmT3QHerAQJMZWC11Qrn2N+ybwwNblDKv+s5qgMQ5
                5tNoQ9IfAkEAxkyffU6ythpg/H0Ixe1I2rd0GbF05biIzO/i77Det3n4YsJVlDck
                ZkcvY3SK2iRIL4c9yY6hlIhs+K9wXTtGWwJBAO9Dskl48mO7woPR9uD22jDpNSwe
                k90OMepTjzSvlhjbfuPN1IdhqvSJTDychRwn1kIJ7LQZgQ8fVz9OCFZ/6qMCQGOb
                qaGwHmUK6xzpUbbacnYrIM6nLSkXgOAwv7XXCojvY614ILTK3iXiLBOxPu5Eu13k
                eUz9sHyD6vkgZzjtxXECQAkp4Xerf5TGfQXGXhxIX52yH+N2LtujCdkQZjXAsGdm
                B2zNzvrlgRmgBrklMTrMYgm1NPcW+bRLGcwgW2PTvNM=
                -----END RSA PRIVATE KEY-----
                EOD;
            return $privateKey;
    }

    public function userlogin()
    {
        $this->setHeaders();
        $data = [];
        helper(['form', 'url']);
        $this->validation = \Config\Services::validation();
        if ($this->request->getMethod() == 'post') {
            $data = $this->request->getJSON();
            $user_data = [
                'email' => $data->email,
                'password' => $data->password
            ];

            $rules = [
                $user_data['email'] => 'required|valid_email',
                $user_data['password'] => 'required|min_length[8]|max_length[255]'
            ];
            $error = $this->validation->setRules($rules);
            $msg = $this->validation->run($user_data, 'login');
            if (!$msg) {
               $output = [
                    'status' => 401,
                    'error'=> $this->validation->getErrors()
                ];
                return $this->respond($output, 200);
            } else {
                
                $model = new AuthModel();
                $userdata = [
                    'email' => $data->email,
                    'password' => $data->password
                ];
                // return $data->email;
                $email = $data->email;
                $password = $data->password;
                $check_login = $this->Auth->check_login($email);
                // return $this->respond($check_login, 200);
                if (password_verify($password, $check_login['password'])) {
                    $secret_key = $this->privateKey();
                    $issuser_claim = "THE_CLAIM";
                    $audience_claim = "THE_AUDIENCE";
                    $issuedat_claim = time();
                    $notbefore_claim = $issuedat_claim + 10;
                    $expire_claim = $issuedat_claim + 3600;

                    $token = [
                        "iss" => $issuser_claim,
                        "aud" => $audience_claim,
                        "iat" => $issuedat_claim,
                        "nbf" => $notbefore_claim,
                        "exp" => $expire_claim,
                        "data" => [
                            'id' => $check_login['id'],
                            'name' => $check_login['name'],
                            'email' => $check_login['email'],
                            'mobile' => $check_login['mobile']
                        ]
                    ];

                    $token = JWT::encode($token,$secret_key);
                    $output = [
                        'status' => 'success',
                        'message' => 'Login Successfully',
                        'token' => $token,
                        'expireat' => $expire_claim,
                        'user_id' => $check_login['id'],
                        'role_type'=>$check_login['role_type']
                    ];
                    return $this->respond($output, 200);
                } else {
                   $output = [
                        'status' => 401,
                        'message' => 'Invalid username or password'
                    ];
                    return $this->respond($output, 401);
                }

            }
        } else {
            return $this->fail('Only post request is allowed');
        }
    }

    /**
     * Set headers
     */
    public function setHeaders()
    {
        if (ENVIRONMENT === 'dev') {
            header('Access-Control-Allow-Origin: *');
        } else if (ENVIRONMENT === 'staging') {
            header('Access-Control-Allow-Origin: https://test.myApp.com');
        }
        if (ENVIRONMENT === 'production') {
            header('Access-Control-Allow-Origin: https://myApp.com');
        }
        header("Content-type: application/json");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization, Token, App-version");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }

    public function login()
    {

        // header("Access-Control-Allow-Origin:*");
        //       header("Access-Control-Allow-Methods: PUT,POST,OPTIONS,DELETE,GET");
        //       header("Access-Control-Allow-Headers:access-control-allow-origin");
        // $user = $this->input->post("user");
        // $pwd = $this->input->post("pass");
        $oauth = new Oauth();
        $request = new Request();
        $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
        $code = $respond->getStatusCode();
        $body = $respond->getResponseBody();
        return $this->respond(json_decode($body), $code);
    }

    public function register()
    {

        header('Access-Control-Allow-Origin: *');        
        header("Content-type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization, Token, App-version,Access-Control-Allow-Headers");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header('Access-Control-Max-Age: 3600');
        $data = [];
        helper(['form', 'url']);
        $this->validation = \Config\Services::validation();
        if ($this->request->getMethod() == 'post') {
            // return 'hi';
            $data = $this->request->getJSON();
            $user_data = [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'mobile' => $data->mobile
            ];
            // return  $user_data['name'];
            $rules = [
                $user_data['name'] => 'required|min_length[3]|max_length[20]',
                $user_data['email'] => 'required|valid_email|is_unique[users.email]',
                $user_data['password'] => 'required|min_length[8]|max_length[255]',
                $user_data['mobile'] => 'required|is_unique[users.mobile]'
            ];
            $error = $this->validation->setRules($rules);
            $msg = $this->validation->run($user_data, 'register');

            // $errors = $this->validation->getErrors();
            // echo json_encode($this->validation->getErrors());
            // return json_encode($msg);
            if (!$msg) {
                return $this->respondCreated(['status' => false, 'error' => $this->validation->getErrors()]);
            } else {
                $model = new AuthModel();
                $userdata = [
                    'name' => $data->name,
                    'email' => $data->email,
                    'password' => $data->password,
                    'mobile' => $data->mobile
                ];
                // echo json_encode($userdata);
                $res = $model->insert($userdata);
                // $data['id'] = $res;
                // echo json_encode(['status'=> 'success','message' => 'User Register Successfully.']);
                return $this->respondCreated(['status' => 'success', 'message' => 'User Register Successfully.']);

            }
        } else {
            return $this->fail('Only post request is allowed');
        }
    }

    public function userregister()
    {
        $this->setHeaders();
        $data = [];
        helper(['form', 'url']);
        $this->validation = \Config\Services::validation();
        if ($this->request->getMethod() == 'post') {
            $data = $this->request->getJSON();
            $user_data = [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'mobile' => $data->mobile,
                'status' => $data->status
            ];
            $rules = [
                $user_data['name'] => 'required|min_length[3]|max_length[20]',
                $user_data['email'] => 'required|valid_email|is_unique[users.email]',
                $user_data['password'] => 'required|min_length[8]|max_length[255]',
                $user_data['mobile'] => 'required|is_unique[users.mobile]'
            ];
            $error = $this->validation->setRules($rules);
            $msg = $this->validation->run($user_data, 'register');
            if (!$msg)
            {
                  $output = [
                                'status' => 401,
                                'validation_error' => $this->validation->getErrors(),
                            ];
                            return $this->respond($output, 401);
                // return $this->respondCreated(['status' => false, 'error' => $this->validation->getErrors()]);
            } else {
                    $model = new AuthModel();
                    $userdata = [
                        'name' => $data->name,
                        'email' => $data->email,
                        'password' => password_hash($data->password, PASSWORD_DEFAULT),
                        'mobile' => $data->mobile,
                        'status' => $data->status
                    ];
                    $register = $this->Auth->register($userdata);
                    if ($register == true) {
                           $output = [
                                'status' => 'success',
                                'message' => 'Register Successfully',
                            ];
                            return $this->respond($output, 200);
                    } else {
                       $output = [
                            'status' => '401',
                            'message' => 'Sorry,Register not Successfully',
                        ];
                        return $this->respond($output, 401);
                    }
                }
        } else {
            return $this->fail('Only post request is allowed');
        }
    }

    //--------------------------------------------------------------------
}

