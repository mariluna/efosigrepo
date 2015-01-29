<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Informe extends CI_Controller {

	function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('informe/'.$name_view.'', $data);
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
		$this->load->model('informe_model');
		$name="ver";
		$get=$this->informe_model->get($id);
		$this->view($name,$get);
	}

	public function agregar()
	{
		$name="agregar";
		$this->load->model('informe_model');
		$data['cursos']=$this->informe_model->getCursos();
		$data['redi']=$this->informe_model->cargar_redi();
		$data['user'] = $r=$this->ion_auth->user()->row();
		$this->view($name,$data);
	}

	public function editar($id)
	{
		$this->load->model('Informe_model');
		$name="editar";
		$get=$this->cursos_model->get($id);
		$this->view($name,$get);
	}
	
	public function estado($redi)
	{
		$this->load->model('Informe_model');
		$getEstado = $this->Informe_model->cargar_estado($redi);
		
		echo $getEstado;
	}
	
	public function municipio($estado)
	{
		$this->load->model('Informe_model');
		$getMunicipio = $this->Informe_model->cargar_municipio($estado);
		
		echo $getMunicipio;
	}
	
	public function parroquia($municipio)
	{
		$this->load->model('Informe_model');
		$getParroquia = $this->Informe_model->cargar_parroquia($municipio);
		
		echo $getParroquia;
	}
	
	public function guardar()
	{
		echo "<pre>";		
		print_r($_POST);		
		echo "</pre>";
	}


}
/* End of file Cursos.php */