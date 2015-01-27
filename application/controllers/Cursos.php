<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	function view($name_view,$data)
	{

		$this->load->view('header');
		$this->load->view('cursos/'.$name_view.'', $data);
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
		//if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$this->load->model('cursos_model');
		$name="ver";
		$get['data']=$this->cursos_model->get($id);
		$get['estado']=$this->cursos_model->getEstadoForEdit($get['data']->id_estado);
		$this->view($name,$get);
	}

	public function agregar()
	{
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$name="agregar";
		$this->load->model('cursos_model');
		$data['estado']=$this->cursos_model->getEstado();
		$this->view($name,$data);
	}

	public function editar($id)
	{
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$this->load->model('cursos_model');
		$name="editar";
		$get['data']=$this->cursos_model->get($id);
		$get['list']=$this->cursos_model->getEstadoEdit($get['data']->id_estado);
		$get['estado']=$this->cursos_model->getEstadoForEdit($get['data']->id_estado);
		$this->view($name,$get);
	}
	
		public function estado()
	{
		$this->load->model('persona_model');
		$redi = $_POST['redi'];
		$getEstado = $this->cursos_model->cargar_estado($redi);
		
		echo $getEstado;
	}

}
/* End of file Cursos.php */