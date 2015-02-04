<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluacion extends CI_Controller {

	function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('evaluacion/'.$name_view.'', $data);
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
	
}