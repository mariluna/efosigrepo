<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('persona/'.$name_view.'', $data);
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
		$this->load->model('persona_model');
		$tipoPersona=$this->persona_model->getTipoPersona($id);
		$get['persona']=$this->persona_model->get($id);
		if(($tipoPersona->status == 'General') OR ($tipoPersona->status == 'Usuario')){
			
			$name="ver_general";
			
		}elseif($tipoPersona->status == 'MMDB'){
			
			$name="ver_mmdb";
		}
		$this->view($name,$get);
	}

	public function agregar()
	{
		$name="agregarGeneral";
		$this->load->model('persona_model');
		$data['redi']=$this->persona_model->cargar_redi();
		$this->view($name,$data);
	}
	
	public function agregarMMDB()
	{
		$name="agregarMMDB";
		$this->load->model('persona_model');
		$data['redi']=$this->persona_model->cargar_redi();
		$this->view($name,$data);
	}

	public function editar($id)
	{
		$this->load->model('persona_model');
		$tipoPersona=$this->persona_model->getTipoPersona($id);
		$get['persona']=$this->persona_model->get($id);
		$get['otros_red']=$this->persona_model->getOtrosRed($get['persona']->id_redi);
	//	$get['otros_est']=$this->persona_model->getOtrosEst($get['persona']->id_estado);
	//	$get['otros_mun']=$this->persona_model->getOtrosMun($get['persona']->id_municipio);
	//	$get['otros_par']=$this->persona_model->getOtrosPar($get['persona']->id_parroquia);
		if(($tipoPersona->status == 'General') OR ($tipoPersona->status == 'Usuario')){
			
			$name="editar_general";
			
		}elseif($tipoPersona->status == 'MMDB'){
			
			$name="editar_mmdb";
		}
		$this->view($name,$get);
	}
	
	public function editarMMDB($id)
	{
		$this->load->model('persona_model');
		$name="editarMMDB";
		$get=$this->cursos_model->get($id);
		$this->view($name,$get);
	}
	
	public function eliminar($id)
	{
		$this->load->model('cursos_model');
		$name="editar";
		$get=$this->cursos_model->get($id);
		$this->view($name,$get);
	}
	
	public function estado($redi)
	{
		$this->load->model('persona_model');
		$getEstado = $this->persona_model->cargar_estado($redi);
		
		echo $getEstado;
	}
	
	public function municipio($estado)
	{
		$this->load->model('persona_model');
		$getMunicipio = $this->persona_model->cargar_municipio($estado);
		
		echo $getMunicipio;
	}
	
	public function parroquia($municipio)
	{
		$this->load->model('persona_model');
		$getParroquia = $this->persona_model->cargar_parroquia($municipio);
		
		echo $getParroquia;
	}
	
	public function generarExcel() {
	
		$this->load->library('reportes_excel');
		$this->load->model('persona_model');
		$user=$this->ion_auth->user()->row();
		
		$primerHeader= "Listado de Personas Insccritas: ";
			
		$tituloExcel= 'Listado de Personas Insccritas';
			
		$reporte_data = $this->persona_model->reporteGeneral();
						
			$header = array(
				$primerHeader
			);
			
			$reporte_header =array(
				'A'=>'Nombre',
				'B'=>'Cedula',
				'C'=>'Edad',
				'D'=>'Sexo',
				'E'=>'Nacionalidad',
				'F'=>'Fecha Nacimiento',
				'G'=>'Numero de Hijos',
				'H'=>'Etnia',
				'I'=>'Discapacidad',
				'J'=>'Estado Civil',
				'K'=>'Tlf Local',
				'L'=>'Tlf Celular',
				'M'=>'Correo',
				'N'=>'Nivel de Instruccion',
				'O'=>'REDI',
				'P'=>'Estado',
				'Q'=>'Municipio',
				'R'=>'Parroquia'
			);
			
			$this->reportes_excel->genera_excel_basico($tituloExcel,$header,$reporte_header,$reporte_data);
	}
	
	public function respaldo()
	{
		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup(); 

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('C://backupefosig.gz', $backup); 

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('backupefosig.gz', $backup);
	}
}