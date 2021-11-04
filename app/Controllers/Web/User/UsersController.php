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
    public function index($search_term='all') 
    {
       
        
        $data =array();
        $userModel = new UserModel();  
           
        if($search_term){
            if($search_term == 'complete' || $search_term == 'pending'){
                $data['users'] = $userModel->where('status', $search_term )->paginate(5);
                $data['pageTitle'] = ucwords($search_term)  . ' users';
                return view('users/all_users', $data);
            }else{
                $data['users'] = $userModel->paginate(3);
                $data['pager'] = $userModel->pager;
                $data['pageTitle'] = 'All users';
            }    
        }  
        return view('users/all_users', $data);
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
       return view('auth/register_form');
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
       return view('users/new_user');
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
        // validate input
        $data = $this->validate([
            "name" => [
                "label" => "First Name", 
                "rules" => "required|min_length[3]|max_length[20]"
            ],            
            "email" => [
                "label" => "Email", 
                "rules" => "required|min_length[3]|max_length[20]|valid_email|is_unique[users.email]"
            ],
            "phone" => [
                "label" => "Phone", 
                "rules" => "required|min_length[7]|max_length[20]|is_unique[users.phone]"
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
                'phone' => $this->request->getPost('phone'),
                'password'=> $this->request->getPost('password'),
            ];
            
            $model->save($userData);
            $session = session();
            $session->setFlashData("success", "Success, User created!");
            return redirect()->to('/admin/users/all');
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
        $img='';
        $data = $this->validate([
            "name" => [
                "label" => "First Name", 
                "rules" => "required|min_length[3]|max_length[20]"
            ],            
            "email" => [
                "label" => "Email", 
                "rules" => "required|min_length[3]|max_length[20]|valid_email|is_unique[users.email]"
            ],
            "phone" => [
                "label" => "Phone", 
                "rules" => "required|min_length[7]|max_length[20]|is_unique[users.phone]"
            ],
            'file' => [
                "label" => "Image", 
                'uploaded[file]',
                'rules' => "is_image[file]|uploaded[file]|max_size[file,2048]|mime_in[file,image/png,image/jpg]",
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
        if($this->request->getPost('file')){
           try {
            $img = $this->request->getFile('file');
            $img->move(WRITEPATH . 'uploads');
            }
            catch(Exception $e) {
            return redirect()->back();
            } 
        }        
        
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'file' => $img ? $img->getName() : '' ,
            'file_type' => $img ? $img->getClientMimeType() : '',
        ]);
         $session = session();
        $session->setFlashData("success", "Success, User updated!");
        return redirect()->back();
    }

    /**
     * fetch soft-deleted resource object from the model
     *
     * @return mixed
     */
    public function getTrashedUsers($id = null)
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->onlyDeleted()->paginate(5);
        $data['pageTitle'] = 'Trashed users';
        $data['pager'] = $userModel->pager;
        return view('users/trashed_users', $data);
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
        $session = session();
        $session->setFlashData("success", "Success, User deleted!");
        return redirect()->to('/admin/users/all');
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
        return redirect()->to('admin/trashed-users');

    }
    /**
     * Parmanently Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function parmanentlyDeleteUser($id = null)
    {
        $model = new UserModel(); 
        $user = $model->delete($id, true);

        $session = session();
        $session->setFlashData("success", "Success, User PARMANENTLY deleted!");
        return redirect()->to('admin/trashed-users');
    }
}
