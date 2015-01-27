<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Divulgaciones_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('divulgaciones_model');
    }

    function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('divulgaciones/'.$name_view.'', $data);
		$this->load->view('footer');

	}

    public function index_get(){

        $this->response($this->divulgaciones_model->get_all());//($this->db->get('tb_divulgacion')->result());

    }

    public function show_get($id)
	{
		$f=$this->response($this->divulgaciones_model->get($id));

		$this->load->view('header');
		$this->load->view('divulgaciones/ver', $f);
		$this->load->view('footer');

	}

	public function remove_delete($id = NULL)
	{
		var_dump($id);
		if ($this->divulgaciones_model->delete($id))
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
		$data=array(
			'nombre'=>$this->post("nombre"),
			'duracion'=>$this->post("duracion"),
			'nro_participantes'=>$this->post("participantes"),
			'id_estado'=>$this->post("estado"),
			'status'=>$this->post("estatus")
		 );

		$this->cursos_model->add($data);

		redirect(base_url().'Cursos');

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