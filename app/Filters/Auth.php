<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface {
    
    // before function
    public function before(RequestInterface $request, $arguments = null) {
        $session = session();
        $session->setFlashdata('message', 'Please login first to access the content!');
       if(!session()->get('user')) return redirect()->to('/login'); 

        if(!session()->get('user')['loggedIn']){
            return redirect()->to('/login'); 
        }
    }
     
    // after function
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        
    }
}