<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class User extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('project_model');
    }

    public function index_get(){
    $this->response($this->db->get('users')->result());
        }

    public function index_post(){
        // Create a new book
    }
    public function edit_get($id = NULL)
    {
        if ( ! $id)
        {
            $this->response(array('status' => false, 'error_message' => 'No ID was provided.'), 400);
        }

        $this->response($this->project_model->get($id));
    }
    public function remove_delete($id = NULL){

        if ($this->project_model->delete($id))
        {
            $this->response(array('status' => true, 'message' => sprintf('Project #%d has been deleted.', $id)), 200);
        }
        else
        {
            $this->response(array('status' => false, 'error_message' => 'This project does not exist!'), 404);
        }
    }

}

/* End of file user.php */
