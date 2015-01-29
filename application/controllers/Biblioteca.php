<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Biblioteca extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	function view($name_view,$data)
	{

		$this->load->view('header');
		$this->load->view('biblioteca/'.$name_view.'', $data);
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
		$data="";
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

	public function subir_archivo()
	{
		$this->load->model('biblioteca_model');
		$ruta = "./uploads/".$_FILES['archivo']['name'];
		
		$archivo = array(
			'descripcion' => $_POST['desc'],
			'ruta' => $ruta,
			'tipo_multimedia' => $_POST['tipo'],
			'titulo'=> $_FILES['archivo']['name']	
		);
		
		move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta);
		$this->biblioteca_model->add($archivo);
		redirect(base_url()."Biblioteca");
		
	}

}
/* End of file Biblioteca.php */