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
		 $this->load->model('cursos_model');
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
			'fecha_fin'=>$this->post("fechafin"),
			'id_facilitador'=>$this->post("facilitador")
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
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El curso: "'.$this->post("nombre").'" fue agregado con exito!
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect('Cursos');

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
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> La asistencia fue cargada con exito!
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect('Cursos');

	}

	public function update_post()
	{
		$this->load->model('cursos_model');
		$data=array(
			'nombre'=>$this->post("nombre"),
			'duracion'=>$this->post("duracion"),
			'nro_participantes'=>$this->post("participantes"),
			'status'=>$this->post("estatus"),
			'fecha_inicio'=>$this->post("fechaini"),
			'fecha_fin'=>$this->post("fechafin"),
			'id_facilitador'=>$this->post("facilitador")
		 );
		$this->db->trans_start();
		$this->cursos_model->update($this->post("id"),$data);
		
		$dataPreviaCurso = $this->cursos_model->getForAudit($this->post("id"),$this->post("prev"));
		$r = $this->ion_auth->user()->row();
		
		$dataAudi = array(
			'id_usuario'=>$r->id,
			'accion'=>"Modificar",
			'fecha'=>date("Y-m-d H:i:s"),
			'tabla_afectada'=>'tb_curso, tr_curso_estado',
			'campo_afectado'=>'nombre ,duracion ,nro_participantes ,status , fecha_inicio, fecha_fin, id_facilitador, estado, id_estado, rel',
			'informacion_campo'=>$dataPreviaCurso->nombre.
								 $dataPreviaCurso->duracion.
								 $dataPreviaCurso->nro_participantes.
								 $dataPreviaCurso->status.
								 $dataPreviaCurso->fecha_inicio.
								 $dataPreviaCurso->fecha_fin.
								 $dataPreviaCurso->id_facilitador.
								 $dataPreviaCurso->estado.
								 $dataPreviaCurso->id_estado.
								 $dataPreviaCurso->rel
		);
	//	$this->cursos_model->addAuditoria($dataAudi);
		
		$this->cursos_model->updateCursoEstado($this->post("id"),$this->post("prev"),$this->post("estado"));	
		
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El curso: "'.$this->post("nombre").'" fue modificado con exito!
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		$this->db->trans_complete();
		redirect('Cursos');
	}
}