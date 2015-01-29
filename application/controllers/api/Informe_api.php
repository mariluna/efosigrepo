<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Informe_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('Informe_model');
    }

    public function index_get(){

        $this->response($this->db->get('tb_informe')->result());

    }

    public function show_get($id)
	{
		$f=$this->response($this->informe_model->get($id));

		$this->load->view('header');
		$this->load->view('informe/ver', $f);
		$this->load->view('footer');

	}

	public function remove_delete($id = NULL)
	{
		if ($this->informe_model->delete($id))
		{
			$this->response(array('status' => true, 'message' => sprintf('Project #%d has been deleted.', $id)), 200);
		}
		else
		{
			$this->response(array('status' => false, 'error_message' => 'This project does not exist!'), 404);
		}
	}

	public function save_post()
	{
		echo "<pre>";		
		print_r($_POST);		
		echo "</pre>";
		
		
		/*$data=array(
			'nombre'=>$this->post("nombre"),
			'duracion'=>$this->post("duracion"),
			'nro_participantes'=>$this->post("participantes"),
			'id_estado'=>$this->post("estado"),
			'status'=>$this->post("estatus")
		 );

		$this->informe_model->add($data);

		redirect(base_url().'Informe');*/

	}

	public function update_post()
	{
		$data=array(
			'nombre'=>$this->post("nombre"),
			'cuenta'=>$this->post("cuenta"),
			'observaciones'=>$this->post("observaciones"),
			'fecha_actualizacion'=>date("Y-m-d H:i:s")
		 );
		$id=$this->post("id");

		$this->bancos_model->update($id,$data);

		redirect(base_url().'Entidades_bancarias');


	}
}