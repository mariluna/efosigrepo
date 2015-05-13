<?php defined('BASEPATH') OR exit('No direct script access allowed');

class auditoria extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		
	}
	function view($name_view,$data){
		$this->load->view('header');
		$this->load->view('auditoria/'.$name_view.'', $data);
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
		$this->load->model('auditoria_model');
		$name="ver";
		$get['data']=$this->auditoria_model->get($id);
		$this->view($name,$get);
	}
	
	
	public function guardar()
	{
		echo "<pre>";		
		print_r($_POST);		
		echo "</pre>";
	}
	

}

/* End of file Cursos.php */