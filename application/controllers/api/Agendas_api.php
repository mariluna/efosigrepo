<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Agendas_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->model('agendas_model');
    }

    function view($name_view,$data){
	
		$this->load->view('header');
		$this->load->view('agendas/'.$name_view.'', $data);
		$this->load->view('footer');

	}

    public function index_get(){
		$r=$this->ion_auth->user()->row();
		$get = 
        $this->response($this->db->query("SELECT t1.id_actividad,
							   t1.id_usuario,
							   t2.first_name || ' ' || t2.last_name as name,
							   t1.titulo, 
							   to_char(t1.fecha, 'DD-MM-YYYY') AS fecha
							   FROM tb_actividad t1
							   INNER JOIN users t2 ON t1.id_usuario = t2.id WHERE  t1.id_usuario IN (1, $r->id) ")->result());

    }

    public function show_get($id)
	{
		$f=$this->response($this->agendas_model->get($id));

		$this->load->view('header');
		$this->load->view('agendas/ver', $f);
		$this->load->view('footer');

	}

	public function remove_delete($id = NULL)
	{

		if ($this->agendas_model->delete($id))
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

		$this->agendas_model->add($data);

		redirect(base_url().'Agendas');

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

		$this->agendas_model->update($id,$data);

		redirect(base_url().'agendas');


	}
}