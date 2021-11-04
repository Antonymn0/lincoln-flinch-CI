<?php

namespace App\Controllers\Api\Work;

use App\Models\WorkModel;

use CodeIgniter\RESTful\ResourceController;

class WorkController extends ResourceController
{
     public function __construct() {
        $this->model = new workModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $workModel = new workModel();  
        $data = [
            'status'=> 200,
            'message'=> 'A list of workers retrieved successfuly',
            'data' => $workModel->paginate(5),
            'pager' => $workModel->pager,
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
        $workModel = new workModel();  
        $data = [
            'status'=> 200,
            'message'=> 'A single worker retrieved successfuly',
            'data' => $workModel->find($id),
        ];
        return $this->setResponseFormat('json')->respond([$data]);
    }

    /**
     * fetch soft-deleted resource object from the model
     *
     * @return mixed
     */
    public function getTrashedWork($id = null)
    {
        $workModel = new workModel();
        $data = [
            'status'=> 200,
            'message'=> 'A list of trashed work retrieved successfuly',
            'data' => $workModel->onlyDeleted()->paginate(5),
            'pager' => $workModel->pager,
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
            "shift_name" => [
                "label" => "Shift Name", 
                "rules" => "required|min_length[3]|max_length[20]",
            ],            
            "employee_id" => [
                "label" => "Employee id", 
                "rules" => "required",
            ],
            "status" => [
                "label" => "Status", 
                "rules" => "required|min_length[2]|max_length[20]",
            ],
            "remarks" => [
                "label" => "Remarks", 
                "rules" => "required|min_length[4]|max_length[20]",
            ],
            "shift_rules" => [
                "label" => "Shift rules", 
                "rules" => "min_length[4]|max_length[255]",
            ],
            ];

           if( $this->validate($rules) ){
               $userData=[
                    'shift_name' => $this->request->getPost('shift_name'),
                    'employee_id' => $this->request->getPost('employee_id'),
                    'status' => $this->request->getPost('status'),
                    'remarks'=> $this->request->getPost('remarks'),
                    'shift_rules'=> $this->request->getPost('shift_rules'),
                ];

            $work = $this->model->insert($userData);
            $data = [
                'status'=> 200,
                'message'=> 'Work created successfuly',
                'data' => $work,
            ];
            return $this->setResponseFormat('json')->respond([$data]);
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
            "shift_name" => [
                "label" => "Shift Name", 
                "rules" => "required|min_length[3]|max_length[20]",
            ],            
            "employee_id" => [
                "label" => "Employee id", 
                "rules" => "required",
            ],
            "status" => [
                "label" => "Status", 
                "rules" => "required|min_length[2]|max_length[20]",
            ],
            "remarks" => [
                "label" => "Remarks", 
                "rules" => "required|min_length[4]|max_length[20]",
            ],
            "shift_rules" => [
                "label" => "Shift rules", 
                "rules" => "min_length[4]|max_length[255]",
            ],
            ];

           if( $this->validate($rules) ){
               $userData=[
                    'shift_name' => $this->request->getPost('shift_name'),
                    'employee_id' => $this->request->getPost('employee_id'),
                    'status' => $this->request->getPost('status'),
                    'remarks'=> $this->request->getPost('remarks'),
                    'shift_rules'=> $this->request->getPost('shift_rules'),
                ];

            $this->model->update($id, $userData);
            $work = $this->model->find($id);
            $data = [
                'status'=> 200,
                'message'=> 'Work updated successfuly',
                'data' => $work,
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
        $workModel = new workModel();
        $work = $workModel->find($id);
        if($work){
            $workModel->delete([$id]);
            $data = [
                'status'=> 200,
                'message'=> 'Work deleted successfuly',
                'data' => $work,
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
        $workModel = new workModel();
        $work = $workModel->onlyDeleted();
        if($work){
            $workModel->delete($id, true); // forceDelete
            $data = [
                'status'=> 200,
                'message'=> 'Work PARMANENTLY deleted',
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
