<?php

namespace App\Controllers\Web\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
 
    // show login form
    public function index(){
        return view('auth/login');
    }

    //login the user
    public function login()
    { 
        if ($this->request->getMethod() == "post") {
            $validation =  \Config\Services::validation();
            $session = session();
            // validate input data
            $data = $this->validate([                      
                "email" => [
                    "label" => "Email", 
                    "rules" => "required|min_length[3]|max_length[20]|valid_email"
                ],
                "password" => [
                    "label" => "Password", 
                    "rules" => "required|min_length[4]|max_length[20]"
                ],
            ]);
            if($data){
                $model = new UserModel();        
                $email =  $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $user = $model->where('email', $email)->first();   // fetch user by email
                if($user){
                  $verifyPassword = $password == $user['password'] ? true : false;   // verify password  
                }else{
                    $session->setFlashdata('message', 'Invalid email or password!');
                    return view('auth/login'); 
                }
                
                if($user && $verifyPassword ){ 
                    $user_data= [
                        'loggedIn' => true,
                        'name' => $user ['name'],
                        'email' => $user ['email'],
                        'id' => $user['id'],
                    ];
                                          
                    $session->set( 'user', $user_data);
                    return redirect()->route('admin/dashboard');
                }else{
                    $session->setFlashdata('message', 'Invalid email or password!');
                    return view('auth/login');
                } 
            }else{
                $session->setFlashdata('message', 'Invalid credentials');
                return view('auth/login');
            }
        }            
    }

    // logout user
     public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->route('login');
    }
}
