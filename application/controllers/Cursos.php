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

	public function ver($id,$est)
	{
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$this->load->model('cursos_model');
		$name="ver";
		$get['data']=$this->cursos_model->get($id,$est);
		if($get['data'] == "Error"){
			redirect('Cursos');
		} else {
			$get['estado']=$this->cursos_model->getEstadoForEdit($get['data']->id_curso);
			$this->view($name,$get);
		}
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
		$get['list']=$this->cursos_model->getEstadoEdit($get['data']->id_curso);
		$get['estado']=$this->cursos_model->getEstadoForEdit($get['data']->id_curso);
		$this->view($name,$get);
	}
	
	public function estado()
	{
		$redi = $_POST['redi'];
		$getEstado = $this->cursos_model->cargar_estado($redi);
		
		echo $getEstado;
	}
	
	public function registrar_curso($part, $ins, $cursoid, $userid)
	{
		$this->load->model('cursos_model');

		if ((is_numeric($part) == false) OR (is_numeric($ins)== false) OR (is_numeric($cursoid)== false) OR (is_numeric($userid)== false)){
			
		}else{
		
			$checkCursoData = $this->cursos_model->checkCursoData($part, $ins, $cursoid);
			
			if ($checkCursoData =="true"){
				
				$cupo = $part-$ins;
			
				if ($cupo > 0){		
					$inscribirCurso = $this->cursos_model->registrarPersonaCurso($cursoid, $userid);
					
					redirect(base_url().'Cursos');
					
				}else{
					
					redirect(base_url().'Cursos');
				}
					
			} else {	
				
				redirect(base_url().'Cursos');
			
			}	
		}
	}

}
/* End of file Cursos.php */