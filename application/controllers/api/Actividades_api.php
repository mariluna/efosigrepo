<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Actividades_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->model('actividades_model');
    }

    function view($name_view,$data){
		var_dump($name_view);
		$this->load->view('header');
		$this->load->view('actividades/'.$name_view.'', $data);
		$this->load->view('footer');

	}

    public function index_get(){
		$r=$this->ion_auth->user()->row();
        $this->response($this->db->query("SELECT t1.id_actividad,
							   t1.id_usuario,
							   t2.first_name || ' ' || t2.last_name as name,
							   t1.titulo, 
							   t1.fecha
							   FROM tb_actividad t1
							   INNER JOIN users t2 ON t1.id_usuario = t2.id WHERE  t1.id_usuario IN (1, $r->id) ")->result());

    }

    public function show_get($id)
	{
		$f=$this->response($this->actividades_model->get($id));

		$this->load->view('header');
		$this->load->view('actividades/ver', $f);
		$this->load->view('footer');

	}

	public function remove_delete($id = NULL)
	{
		var_dump($id);
		if ($this->actividades_model->delete($id))
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
		$r=$this->ion_auth->user()->row();
		$data=array(
			
			'id_usuario'=>$r->id,
			'titulo'=>$this->post("titulo"),
			'descripcion'=>$this->post("desc"),
			'fecha'=>$this->post("fecha")
		 );

		$this->actividades_model->add($data);

		redirect(base_url().'Actividades');

	}

	public function update_post()
	{
	    $r=$this->ion_auth->user()->row();
		$data=array(
			'titulo'=>$this->post("titulo"),
			'descripcion'=>$this->post("desc"),
			'fecha'=>$this->post("fecha"),
		 );
		$id=$this->post("id");

		$this->actividades_model->update($id,$data);

		redirect(base_url().'actividades');


	}
}