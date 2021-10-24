<?php

namespace App\Controllers\Web\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UsersController extends BaseController
{
    
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $userModel = new UserModel();
        $users['users'] = $userModel->findAll();
        return view('users/all_users', $users);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function adminNewUserForm()
    {
       return redirect()->route('new-user');
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
       return view('auth/register_form');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        
        helper('session');
        if ($this->request->getMethod() == "post") {
            $validation =  \Config\Services::validation();

            $data = $this->validate([
                "name" => [
                    "label" => "First Name", 
                    "rules" => "required|min_length[3]|max_length[20]"
                ],            
                "email" => [
                    "label" => "Email", 
                    "rules" => "required|min_length[3]|max_length[20]|valid_email|is_unique[users.email]"
                ],
                "password" => [
                    "label" => "Password", 
                    "rules" => "required|min_length[4]|max_length[20]"
                ],
                "confirm_password" => [
                    "label" => "confirm_password", 
                    "rules" => "matches[password]"
                ],
            ]);
            if($data){
               $model = new UserModel();
                $model->save([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password'=> $this->request->getPost('password'),
                ]);
                return redirect()->route('login');
                }else{
                    $data["validation"] = $validation->getErrors();
                    return view('auth/register_form', [
                        'validation' => $this->validator,
                    ]);
            } 
        }           
    }

    /**
     * Create a new resource object (by admin only), from "posted" parameters
     *
     * @return mixed
     */
    public function adminCreateUser()
    {
        helper('session');
        if ($this->request->getMethod() == "post") {
        $validation =  \Config\Services::validation();

        $data = $this->validate([
            "name" => [
                "label" => "First Name", 
                "rules" => "required|min_length[3]|max_length[20]"
            ],            
            "email" => [
                "label" => "Email", 
                "rules" => "required|min_length[3]|max_length[20]|valid_email|is_unique[users.email]"
            ],
            "password" => [
                "label" => "Password", 
                "rules" => "required|min_length[4]|max_length[20]"
            ],
            "confirm_password" => [
                "label" => "confirm_password", 
                "rules" => "matches[password]"
            ],
           ]);
        $model = new UserModel();

         if ($data) {            
            $userData=[
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password'=> $this->request->getPost('password'),
            ];
            $model->save($userData);
            $session = session();
            $session->setFlashData("success", "Success, User created!");
            return redirect()->route('all-users');
        } else {
            $data["validation"] = $validation->getErrors();
            return view('users/new_user', [
                   'validation' => $this->validator,
            ]);
        }       
       
        }else{
            return view('users/new_user');
        }
 }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        
        $userModel = new UserModel();
        $user['user'] = $userModel->find($id);
        return view('users/edit_user', $user);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new UserModel();
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);
        return redirect()->route('all-users');
    }

    /**
     * fetch soft-deleted resource object from the model
     *
     * @return mixed
     */
    public function getTrashedUsers($id = null)
    {
        $userModel = new UserModel();
        $users['users'] = $userModel->onlyDeleted()->findAll();
        return view('users/trashed_users', $users);
    }
    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $userModel = new UserModel();
        $userModel->delete([$id]);
        return redirect()->route('all-users');
    }
    /**
     * Restore  the designated resource object from the model
     *
     * @return mixed
     */
    public function restoreDeletedUser($id = null)
    {
        $model = new UserModel();
        $user = $model->onlyDeleted()->update($id, 
            ['deleted_at' => null,]           
        );
        $session = session();
        $session->setFlashData("success", "Success, User Restored!");
        return redirect()->route('trashed-users');

    }
    /**
     * Parmanently Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function parmanentlyDeleteUser($id = null)
    {
        $model = new UserModel();        
        $model->withDeleted(true);
        $user = $model->delete($id);

        $session = session();
        $session->setFlashData("success", "Success, User PARMANENTLY deleted!");
        return redirect()->route('trashed-users');
    }
}
