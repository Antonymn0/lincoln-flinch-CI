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
                $verifyPassword = $password == $user['password'] ? true: false;   // verify password
                if($user && $verifyPassword ){ 
                    $logged_in = true;                      
                    $session->set($user);                     
                    return redirect()->route('dashboard');
                }else{
                    $session->setFlashdata('message', 'Invalid email or password!');
                    return view('auth/login');
                } 
            }else{
                $session->setFlashdata('message', 'Invalid credentials');
                return view('auth/login');
            }
        } else{
            $session->setFlashdata('message', 'Bad request method!');
            return view('auth/login');
        }           
    }

    // logout user
     public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->route('login');
    }
}
