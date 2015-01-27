<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('persona/'.$name_view.'', $data);
		$this->load->view('footer');

	}

	public function index()
	{
		$name="index";
		$data=" ";
		$this->view($name,$data);
	}

	public function ver($id)
	{
		$this->load->model('cursos_model');
		$name="ver";
		$get=$this->cursos_model->get($id);
		$this->view($name,$get);
	}

	public function agregar()
	{
		$name="agregarGeneral";
		$this->load->model('persona_model');
		$data['redi']=$this->persona_model->cargar_redi();
		$this->view($name,$data);
	}

	public function editar($id)
	{
		$this->load->model('cursos_model');
		$name="editar";
		$get=$this->cursos_model->get($id);
		$this->view($name,$get);
	}
	
	public function eliminar($id)
	{
		$this->load->model('cursos_model');
		$name="editar";
		$get=$this->cursos_model->get($id);
		$this->view($name,$get);
	}
	
	public function estado($redi)
	{
		$this->load->model('persona_model');
		$getEstado = $this->persona_model->cargar_estado($redi);
		
		echo $getEstado;
	}
	
	public function municipio($estado)
	{
		$this->load->model('persona_model');
		$getMunicipio = $this->persona_model->cargar_municipio($estado);
		
		echo $getMunicipio;
	}
	
	public function parroquia($municipio)
	{
		$this->load->model('persona_model');
		$getParroquia = $this->persona_model->cargar_parroquia($municipio);
		
		echo $getParroquia;
	}
}