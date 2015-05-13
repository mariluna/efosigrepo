<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Biblioteca extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		
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

	public function agregar()
	{
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$name="agregar";
		$data="";
		$this->view($name,$data);
	}

	public function subir_archivo()
	{
		$this->load->model('biblioteca_model');
		$ruta = "./uploads/".$_FILES['archivo']['name'];
		
		$max_size = "104857600";
		 
		$archivo = array(
			'descripcion' => $_POST['desc'],
			'ruta' => $ruta,
			'tipo_multimedia' => $_POST['tipo'],
			'titulo'=> $_FILES['archivo']['name']	
		);
		
		if($_FILES['archivo']['size'] <= $max_size){
			//if(($_FILES['archivo']['type'] == 'image/jpeg') OR ($_FILES['archivo']['type'] == 'application/pdf') OR ($_FILES['archivo']['type'] == 'video/mp4') OR ($_FILES['archivo']['type'] == 'video/wma') OR ($_FILES['archivo']['type'] == 'video/mpeg')){
				move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta);
				$this->biblioteca_model->add($archivo);
				$this->session->set_flashdata('message', '<div class="alert alert-success info" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span> Archivo "'.$_FILES['archivo']['name'].'" Agregado de forma exitosa
				<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
				redirect(base_url()."Biblioteca");
		/*	}else{
			 $this->session->set_flashdata('message', '<div class="alert alert-danger info" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span> El Archivo "'.$_FILES['archivo']['name'].'" no tiene el formato aceptado (jpeg, pdf, mp4, wmv, mpeg).
				<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
				redirect(base_url()."Biblioteca");
			}*/
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger info" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span> El tama&ntilde;o Archivo "'.$_FILES['archivo']['name'].'" es mayor al permitido (100 mb).
				<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
				redirect(base_url()."Biblioteca"); 
		}
		/*move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta);
		$this->biblioteca_model->add($archivo);
		redirect(base_url()."Biblioteca");*/		
	}

}
/* End of file Biblioteca.php */