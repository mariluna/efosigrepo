<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Cursos_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('cursos_model');
    }

    function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('cursos/'.$name_view.'', $data);
		$this->load->view('footer');

	}

    public function index_get()
	{
		$this->response($this->cursos_model->get_all());
    }

    public function show_get($id)
	{
		$f=$this->response($this->cursos_model->get($id));

		$this->load->view('header');
		$this->load->view('cursos/ver', $f);
		$this->load->view('footer');

	}

	public function remove_delete($id = NULL)
	{
		if ($this->cursos_model->delete($id))
		{
			$this->response(array('status' => true, 'message' => sprintf('Project #%d has been deleted.', $id)), 200);
		}
		else
		{
			$this->response(array('status' => false, 'error_message' => 'This project does not exist!'), 404);
		}
	}

	public function save_post()
	{
		$this->db->trans_start();
		
		$data=array(
			'nombre'=>$this->post("nombre"),
			'duracion'=>$this->post("duracion"),
			'nro_participantes'=>$this->post("participantes"),
			'status'=>1,
			'fecha_inicio'=>$this->post("fechaini"),
			'fecha_fin'=>$this->post("fechafin")
		 );

		$cursoId = $this->cursos_model->add($data);
		
		$estadosCurso = array();
		
		$cursoPart = array();
		
		foreach ($_POST['estado'] as $estado) {
				
			$datainsert = array(

				'curso_id' => $cursoId,
				'estado_id' => $estado,

			);
			
			$datainsertpar = array(

				'id_curso' => $cursoId,
				'nro_participantes' => 0,
				'id_estado' => $estado

			);

			array_push($estadosCurso, $datainsert);
			
			array_push($cursoPart, $datainsertpar);
			
			}
		
		$this->cursos_model->addCursoEstado($estadosCurso);
		
		$this->cursos_model->setCursoPart($cursoPart);
		
		$this->db->trans_complete();
		
		redirect(base_url().'Cursos');

	}
	
	public function saveAsis_post()
	{
		echo"<pre>";
		print_r($this->post());
		echo"</pre>";
		
		$datos = $this->post("curso");
		$newDatos = explode("_",$datos);
		$curso = $newDatos[0];
		$estado = $newDatos[1];
		
		$this->db->trans_start();
		
		$dataAsistencia=array(
			'horas_impartidas'=>$this->post("duracion"),
			'fecha_asistencia'=>$this->post("fechaini"),
			'curso_id'=>$curso,
			'estado_id'=>$estado
		 );

		$asistenciaId = $this->cursos_model->addAsistencia($dataAsistencia);
		
		$personaAsistencia = array();
		
		foreach ($this->post("asistencia") as $row) {
		
			if($row != null){
				
				$datainsert = array(

				'persona_id' => $row,
				'asistencia_id' => $asistenciaId,

				);

				array_push($personaAsistencia, $datainsert);
			
			}
							
		}
		
		$this->cursos_model->addPersonaAsis($personaAsistencia);
		
		$this->db->trans_complete();
		
		redirect(base_url().'Cursos');

	}

	public function update_post()
	{
		$data=array(
			'nombre'=>$this->post("nombre"),
			'duracion'=>$this->post("duracion"),
			'nro_participantes'=>$this->post("participantes"),
			'status'=>$this->post("estatus"),
			'fecha_inicio'=>$this->post("fechaini"),
			'fecha_fin'=>$this->post("fechafin")
		 );

		$this->cursos_model->update($this->post("id"),$data);
		
		$this->cursos_model->updateCursoEstado($this->post("id"),$this->post("prev"),$this->post("estado"));		

		redirect(base_url().'Cursos');
	}
}