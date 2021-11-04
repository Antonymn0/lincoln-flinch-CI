<?php

namespace App\Controllers\Api\Department;

use App\Models\DepartmentModel;

use CodeIgniter\RESTful\ResourceController;

class DepartmentController extends ResourceController
{
     public function __construct() {
        $this->model = new DepartmentModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
       
        $data = [
            'status'=> 200,
            'message'=> 'A list of departments retrieved successfuly',
            'data' => $this->model->paginate(5),
            'pager' => $this->model->pager,
        ];
        return $this->setResponseFormat('json')->respond([$data]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {  
        $data = [
            'status'=> 200,
            'message'=> 'A single department retrieved successfuly',
            'data' => $this->model->find($id),
        ];
        return $this->setResponseFormat('json')->respond([$data]);
    }

    /**
     * fetch soft-deleted resource object from the model
     *
     * @return mixed
     */
    public function getTrashedDepartment($id = null)
    {
        $data = [
            'status'=> 200,
            'message'=> 'A list of trashed departments retrieved successfuly',
            'data' => $this->model->onlyDeleted()->paginate(5),
            'pager' => $this->model->pager,
        ];
        return $this->setResponseFormat('json')->respond([$data]);
    }
    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    { 
        $rules =[
            "department_name" => [
                "label" => "Department Name", 
                "rules" => "required|min_length[3]|max_length[255]",
            ],            
            
            "manager" => [
                "label" => "Manager", 
                "rules" => "required|min_length[2]|max_length[20]",
            ],
            "number_of_staff" => [
                "label" => "Number of staff", 
                "rules" => "required|min_length[1]|max_length[5]",
            ],
           
            ];

           if( $this->validate($rules) ){
               $userData=[
                    'department_name' => $this->request->getPost('department_name'),
                    'manager' => $this->request->getPost('manager'),
                    'number_of_staff' => $this->request->getPost('number_of_staff'),
                ];

            $department = $this->model->insert($userData);
            $data = [
                'status'=> 200,
                'message'=> 'Department created successfuly',
                'data' => $department,
            ];
            return $this->setResponseFormat('json')->respond([$data]);
           } else {
               return $this->validator;
           }        
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
         $rules =[
           "department_name" => [
                "label" => "Shift Name", 
                "rules" => "required|min_length[3]|max_length[255]",
            ],            
            
            "manager" => [
                "label" => "Status", 
                "rules" => "required|min_length[2]|max_length[20]",
            ],
            "number_of_staff" => [
                "label" => "Remarks", 
                "rules" => "required|min_length[1]|max_length[5]",
            ],
            ];

           if( $this->validate($rules) ){
               $userData=[
                    'department_name' => $this->request->getPost('department_name'),
                    'manager' => $this->request->getPost('manager'),
                    'number-of_staff' => $this->request->getPost('number_of_staff'),
                ];

            $this->model->update($id, $userData);
            $department = $this->model->find($id);
            $data = [
                'status'=> 200,
                'message'=> 'Department updated successfuly',
                'data' => $department,
            ];
            return $this->setResponseFormat('json')->respond([$data]);
           }   
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $department = $this->model->find($id);
        if($department){
            $this->model->delete([$id]);
            $data = [
                'status'=> 200,
                'message'=> 'Department deleted successfuly',
                'data' => $department,
                ];
            return $this->respondDeleted([$data]);
        }else{
            return $this->failNotFound(sprintf(
                'Resource not found'
            ));
        }
        
    }

    /**
     * force Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function forceDelete($id = null)
    {
        $department = $this->model->onlyDeleted();
        if($department){
            $this->model->delete($id, true); // forceDelete
            $data = [
                'status'=> 200,
                'message'=> 'Department PARMANENTLY deleted',
                'data' => $work,
                ];
            return $this->respondDeleted([$data]);
        }else{
            return $this->failNotFound(sprintf(
                'Resource not found'
            ));
        }
    }

}
