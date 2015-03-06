<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluacion extends CI_Controller {

	function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('evaluacion/'.$name_view.'', $data);
		$this->load->view('footer');

	}

	public function agregar()
	{
		$name="agregar";
		$this->load->model('evaluacion_model');
		$data['formu']=$this->evaluacion_model->getForm();
		$data['escalas']=$this->evaluacion_model->getEscalas();
		$this->view($name,$data);
	}
	
	public function index()
	{
		$name="index";
		$this->load->model('evaluacion_model');
		$data['formu']=$this->evaluacion_model->getForm();
		$data['escalas']=$this->evaluacion_model->getEscalas();
		$this->view($name,$data);
	}

	public function ver($id)
	{
		$this->load->model('cursos_model');
		$name="ver";
		$get=$this->cursos_model->get($id);
		$this->view($name,$get);
	}

	public function save()
	{
		$this->load->model('Evaluacion_model');
	}
	
	public function excel($id_curso)
	{	
		$this->load->library('reportes_excel');
		$this->load->model('evaluacion_model');
		
		$primerHeader= "reporte";
				
		$tituloExcel= 'reporte_excel';
	
		$reporte_data = $this->evaluacion_model->reporteGeneral($id_curso);
						
			$header = array(
				$primerHeader
			);
			
			$reporte_header =array(
				'A'=>'Pregunta',
				'B'=>'Escala',
				'C'=>'Cantidad de personas'
			);
			
			$this->reportes_excel->genera_excel_basico($tituloExcel,$header,$reporte_header,$reporte_data);
	}
	
	public function hacerRespaldo()
	{
		$this->persona_model->respaldo();
	}
	public function editar($id)
	{
		$this->load->model('cursos_model');
		$name="editar";
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
}