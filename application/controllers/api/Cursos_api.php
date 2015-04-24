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

	public function remove_delete($id,$est)
	{
		 $this->load->model('cursos_model');
		 $dataAudi1=$this->cursos_model->getforaudidelete($id);		

			$r=$this->ion_auth->user()->row();
			$dataAudi = array (
				'id_usuario' => $r->id,
				'accion' => 'Eliminar',
				'fecha'=> date("Y-m-d H:i:s"),
				'tabla_afectada' => 'Tb_Curso',
				'campo_afectado'=> 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin date',
				'informacion_campo' => $dataAudi1->nombre.",".$dataAudi1->duracion.",".$dataAudi1->nro_participantes.",".$dataAudi1->status.",".$dataAudi1->fecha_inicio.",".$dataAudi1->fecha_fin//para despues guardar esa info aqui antes de modificar
				);

		$this->cursos_model->addAuditoria($dataAudi);
		return $this->cursos_model->delete($id,$est);
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
		
		$values = array_map(null, 
					$this->post('estado'), 
					$this->post('facilitador')
					);
		//print_r($values);die();
		foreach ($values as $value) {
				
			$datainsert = array(

				'curso_id' => $cursoId,
				'estado_id' => $value[0],
				'facilitador' => $value[1]

			);
			
			$datainsertpar = array(

				'id_curso' => $cursoId,
				'nro_participantes' => 0,
				'id_estado' => $value[0]

			);

			array_push($estadosCurso, $datainsert);
			
			array_push($cursoPart, $datainsertpar);
			
			}
		
		$this->cursos_model->addCursoEstado($estadosCurso);
		
		$this->cursos_model->setCursoPart($cursoPart);
		
		$r=$this->ion_auth->user()->row();
		$dataAudi = array (
			'id_usuario' => $r->id,
			'accion' => 'INSERTAR',
			'fecha'=> date("Y-m-d H:i:s"),
			'tabla_afectada' => 'Tb_Curso',
			'campo_afectado'=> 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin',
			'informacion_campo' => $data['nombre'].",".$data['duracion'].",".$data['nro_participantes'].",".$data['status'].",".$data['fecha_inicio'].",".$data['fecha_fin']
			);
		//Se guarda la informacion del nuevo curso en la tabla tb_auditoria 
		$this->cursos_model->addAuditoria($dataAudi);
		
		$this->db->trans_complete();
		$this->session->set_flashdata('message', '<div class="alert alert-success info" role="alert">
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
		$this->session->set_flashdata('message', '<div class="alert alert-success info" role="alert">
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
			'fecha_fin'=>$this->post("fechafin")
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
			'campo_afectado'=>'nombre ,duracion ,nro_participantes ,status , fecha_inicio, fecha_fin, estado, id_estado, rel',
			'informacion_campo'=>$dataPreviaCurso->nombre.
								 $dataPreviaCurso->duracion.
								 $dataPreviaCurso->nro_participantes.
								 $dataPreviaCurso->status.
								 $dataPreviaCurso->fecha_inicio.
								 $dataPreviaCurso->fecha_fin.
								 $dataPreviaCurso->estado.
								 $dataPreviaCurso->id_estado.
								 $dataPreviaCurso->rel
		);
	//	$this->cursos_model->addAuditoria($dataAudi);
	$dataAudi1=$this->cursos_model->getforaudiUpdate($this->post("id"),$this->post("prev"));		

		$r=$this->ion_auth->user()->row();
		$dataAudi = array (
			'id_usuario' => $r->id,
			'accion' => 'Modificar',
			'fecha'=> date("Y-m-d H:i:s"),
			'tabla_afectada' => 'Tb_Curso',
			'campo_afectado'=> 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date',
			'informacion_campo' => $dataAudi1->nombre.",".$dataAudi1->duracion.",".$dataAudi1->nro_participantes.",".$dataAudi1->status.",".$dataAudi1->fecha_inicio.",".$dataAudi1->fecha_fin
			);

		//se guarada en la tabla auditoria antes de la modificacion 
		$this->cursos_model->addAuditoria($dataAudi);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El curso: "'.$this->post("nombre").'" fue modificado con exito!
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		$this->db->trans_complete();
		redirect('Cursos');
	}
    public function getEstadoName_post()
    {
        $est = $this->cursos_model->getEstadoForEdit($_POST['estadoid']);

		echo $est->nombre;
    }
	
    public function getFacilitadores_post()
    {
        $fac = $this->cursos_model->getFacilitadorFrom($_POST['estado']);
        $html = '<option value="0" selected="selected">Seleccione...</option>';
        foreach ($fac as $data) {
            $html .= "<option value='$data->id_persona'>$data->nombre_apellido</option>";
        }
        echo $html;
    }
}