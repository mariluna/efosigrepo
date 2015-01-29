<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Biblioteca_api extends REST_Controller{

    public function __construct()
    {
        parent::__construct();

        //$this->load->model('biblioteca_model');
    }

    public function index_get(){

        $this->response($this->db->get('tb_biblioteca')->result());

    }

	public function save_post()
	{
		$data=array(
			'nombre'=>$this->post("nombre"),
			'duracion'=>$this->post("duracion"),
			'nro_participantes'=>$this->post("participantes"),
			'id_estado'=>$this->post("estado"),
			'status'=>1
		 );

		$this->biblioteca_model->add($data);

		redirect(base_url().'biblioteca');

	}

	public function update_post()
	{
		$data=array(
			'nombre'=>$this->post("nombre"),
			'duracion'=>$this->post("duracion"),
			'nro_participantes'=>$this->post("participantes"),
			'id_estado'=>$this->post("estado"),
			'status'=>$this->post("estatus")
		 );

		$this->biblioteca_model->update($this->post("id"),$data);

		redirect(base_url().'biblioteca');


	}
}