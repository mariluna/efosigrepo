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

		//$size =
		
		$archivo = array(
			'descripcion' => $_POST['desc'],
			'ruta' => $ruta,
			'tipo_multimedia' => $_POST['tipo'],
			'titulo'=> $_FILES['archivo']['name']	
		);
		
		if($_FILES['archivo']['size'] <= $max_size){
			echo "Exito:<br>"; 
			echo "<pre>"; print_r($_FILES); echo "</pre>"; 
		} else {
			echo "max size overflow!:<br>"; 
			echo "el size del archivo, el cual es de: ".$_FILES['archivo']['size']." es mayor al size permitido, el cual es de: ".$max_size; 
		
		}
		
		
		
		/*move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta);
		$this->biblioteca_model->add($archivo);
		redirect(base_url()."Biblioteca");*/		
	}

}
/* End of file Biblioteca.php */