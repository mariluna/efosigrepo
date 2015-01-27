<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Divulgaciones extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$rol = $this->ion_auth->get_users_groups()->row();
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		if ($rol->id != 1){redirect(base_url(), 'refresh');}
		
	}
	function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('divulgaciones/'.$name_view.'', $data);
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
		$this->load->model('divulgaciones_model');
		$name="ver";
		$get["prueba"]=$this->divulgaciones_model->get($id);
		$get["prueba"]=json_encode($get["prueba"]);
		$get["prueba"]=json_decode($get["prueba"],true);
		
		$this->view($name,$get);
	}

	public function agregar()
	{
		$name="agregar";
		$this->load->model('divulgaciones_model');
		$get['curso'] = $this->divulgaciones_model->getCurso();
		$this->view($name,$get);
	}

	public function editar($id)
	{
		$this->load->model('divulgaciones_model');
		$name="editar";
		$get=$this->divulgaciones_model->get($id);
		$this->view($name,$get);
	}

}
/* End of file Divulgaciones.php */