<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Auditoria_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('Auditoria_model');
    }
function view($name_view,$data){
		
		$this->load->view('header');
		$this->load->view('auditoria/'.$name_view.'', $data);
		$this->load->view('footer');

	}
	
	
	
    public function index_get(){

	 $this->response($this->db->query("SELECT  u.username, a.accion, a.fecha, a.tabla_afectada,
       									a.campo_afectado,
										a.informacion_campo,
										a.id_auditoria
										FROM tb_auditoria as a
										inner join users as u
										on a.id_usuario=u.id")->result());
    }

    public function show_get($id)
	{
		$f=$this->response($this->auditoria_model->get($id));
		$this->load->view('header');
		$this->load->view('auditoria/ver', $f);
		$this->load->view('footer');

	}

	/*public function remove_delete($id = NULL)
	{
		if ($this->auditoria_model->delete($id))
		{
			$this->response(array('status' => true, 'message' => sprintf('Project #%d has been deleted.', $id)), 200);
		}
		else
		{
			$this->response(array('status' => false, 'error_message' => 'This project does not exist!'), 404);
		}
	}*/
}