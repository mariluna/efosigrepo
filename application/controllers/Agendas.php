<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Agendas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		
	}
	function view($name_view,$data){
		$this->load->view('header');
		$this->load->view('agendas/'.$name_view.'', $data);
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
		$this->load->model('agendas_model');
		$name="ver";
		$get['data']=$this->agendas_model->get($id);
		$this->view($name,$get);
	}

	public function agregar()
	{
		$name="agregar";
		$this->load->model('agendas_model');
		$get['agenda'] = $r=$this->ion_auth->user()->row();
		$this->view($name,$get);
	}

	public function editar($id)
	{
		$this->load->model('agendas_model');
		$name="editar";
		$get["data"]=$this->agendas_model->get($id);		
		$this->view($name,$get);
	}

}
/* End of file Agendas.php */