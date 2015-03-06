<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Evaluacion_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('evaluacion_model');
    }

    function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('evaluacion/'.$name_view.'', $data);
		$this->load->view('footer');

	}
	
    public function index_get(){
        $this->response($this->evaluacion_model->getCursos());
    }

    public function show_get($id)
	{
		$f=$this->response($this->persona_model->get($id));

		$this->load->view('header');
		$this->load->view('personas/ver', $f);
		$this->load->view('footer');
	}

	public function remove_delete($id = NULL)
	{
		if ($this->persona_model->delete($id))
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
	$id_persona=$this->ion_auth->user()->id_persona->row();
	$id_curso = $this->post("id_curso");
		$data1=array(
			'id_pregunta'=>$this->post("pregunta1"),
			'id_escala'=>$this->post("respuesta1"),
			'id_persona'=>$id_persona,
			'id_curso'=>$id_curso,
		);
		
		$data2=array(
			'id_pregunta'=>$this->post("pregunta2"),
			'id_escala'=>$this->post("respuesta2"),
			'id_persona'=>$id_persona,
			'id_curso'=>$id_curso,
		);
		
		$data3=array(
			'id_pregunta'=>$this->post("pregunta3"),
			'id_escala'=>$this->post("respuesta3"),
			'id_persona'=>$id_persona,
			'id_curso'=>$id_curso,
		);
		
		$data4=array(
			'id_pregunta'=>$this->post("pregunta4"),
			'id_escala'=>$this->post("respuesta4"),
			'id_persona'=>$id_persona,
			'id_curso'=>$id_curso,
		);
		
		$data5=array(
			'id_pregunta'=>$this->post("pregunta5"),
			'id_escala'=>$this->post("respuesta5"),
			'id_persona'=>$id_persona,
			'id_curso'=>$id_curso,
		);
		
		$data6=array(
			'id_pregunta'=>$this->post("pregunta6"),
			'id_escala'=>$this->post("respuesta6"),
			'id_persona'=>$id_persona,
			'id_curso'=>$id_curso,
		);
		
		$data7=array(
			'id_pregunta'=>$this->post("pregunta7"),
			'id_escala'=>$this->post("respuesta7"),
			'id_persona'=>$id_persona,
			'id_curso'=>$id_curso,
		);
		
		$data8=array(
			'id_pregunta'=>$this->post("pregunta9"),
			'id_escala'=>$this->post("respuesta9"),
			'id_persona'=>$id_persona,
			'id_curso'=>$id_curso,
		);
		
		$data10=array(
			'id_pregunta'=>$this->post("pregunta10"),
			'id_escala'=>$this->post("respuesta10"),
			'id_persona'=>$id_persona,
			'id_curso'=>$id_curso,
		);
		$this->Evaluacion_model->add($data1);
		$this->Evaluacion_model->add($data2);
		$this->Evaluacion_model->add($data3);
		$this->Evaluacion_model->add($data4);
		$this->Evaluacion_model->add($data5);
		$this->Evaluacion_model->add($data6);
		$this->Evaluacion_model->add($data7);
		$this->Evaluacion_model->add($data8);
		$this->Evaluacion_model->add($data9);
		$this->Evaluacion_model->add($data10);
		
	    redirect(base_url().'Evaluacion');	
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