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
	
	public function agregarAsistencia()
	{
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$name="asistencia";
		$this->load->model('cursos_model');
		$data['cursos']=$this->cursos_model->get_all();
		$this->view($name,$data);
	}
	
	public function descargarAsistencia()
	{
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$name="descargar_asistencia";
		$this->load->model('cursos_model');
		$data['cursos']=$this->cursos_model->get_all();
		$data['estados']=$this->cursos_model->getEstado();
		$this->view($name,$data);
	}


	public function editar($id,$est)
	{
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$this->load->model('cursos_model');
		$name="editar";
		$get['data']=$this->cursos_model->get($id,$est);
		if($get['data'] == "Error"){
			redirect('Cursos');
		} else {
			$get['list']=$this->cursos_model->getEstadoEdit($get['data']->id_curso);
			$get['estado']=$this->cursos_model->getEstadoForEdit($get['data']->id_curso);
			$this->view($name,$get);
		}
	}
	
	public function getCurso($estid)
	{
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$this->load->model('cursos_model');
		$curso = $this->cursos_model->getCursoSel($estid);
		header('Content-Type: application/json');
		echo json_encode($curso);
	}
	
	public function estado()
	{
		$redi = $_POST['redi'];
		$getEstado = $this->cursos_model->cargar_estado($redi);
		
		echo $getEstado;
	}
	
	public function registrar_curso($part, $ins, $cursoid, $userid, $estid)
	{
		$this->load->model('cursos_model');

		if ((is_numeric($part) == false) OR (is_numeric($ins)== false) OR (is_numeric($cursoid)== false) OR (is_numeric($userid)== false) OR (is_numeric($estid)== false)){
			echo 'mori vaidando';die();
			redirect(base_url().'Cursos');
		}else{
		
			$checkCursoData = $this->cursos_model->checkCursoData($part, $ins, $cursoid, $estid);
			
			if ($checkCursoData =="true"){
				
				$cupo = $part-$ins;
			
				if ($cupo > 0){		
					$inscribirCurso = $this->cursos_model->registrarPersonaCurso($cursoid, $userid, $estid);
					echo 'inscribi en curso'.$inscribirCurso;die();
					redirect(base_url().'Cursos');
					
				}else{
					echo 'no inscribi en curso'.$inscribirCurso;die();
					redirect(base_url().'Cursos');
				}
					
			} else {	
				echo 'curso data es '.$checkCursoData;die();
				redirect(base_url().'Cursos');
			
			}	
		}
	}
	
	public function getInscritos($curso)
	{
		$this->load->model('cursos_model');
		
		$newDatos = explode("_",$curso);
		$cur = $newDatos[0];
		$est = $newDatos[1];
		
		
		$getInscritos = $this->cursos_model->get_inscritos($cur, $est);
		
		echo'<table class="table table-striped table-condensed" style="text-align: center;">
			<thead>
				<tr>
					<th style="min-width: 80px; text-align: center;">Nombre de la Persona</th>
					<th style="min-width: 80px; text-align: center;">Asistencia</th>
				</tr>
			</thead>
			<tbody>';
				foreach($getInscritos as $row){
					echo "<tr><td>".$row->nombre_apellido."</td>";
					echo "<td>";
						echo "<select name='asistencia[]' class='auth-input'> <option value='".$row->id_persona."'>Si</option>";
						echo "<option value=''>No</option></select>";
					echo "</td></tr>";
				}
				echo'
			</tbody>
		</table>';
		
		//echo "<pre id='ds'>";print_r($getInscritos);echo "</pre>";
	}

	public function generarExcel() {
	
		$this->load->library('reportes_excel');
		
		$user=$this->ion_auth->user()->row();
		
		$tipe = $_POST["reporte"];
		$ini  = $_POST["fechainig"];
		$fin  = $_POST["fechafinig"];
		
		$this->load->library('reportes_excel');
		$this->load->model('cursos_model');
		
		if($tipe == "general"){
		
			$newDatos = explode("_",$_POST["cursog"]);
			$curso = $newDatos[0];
			$estado = $newDatos[1];
			
			$cursoname = $this->cursos_model->getCursoName($curso);
			$estadoname = $this->cursos_model->getEstadoForEdit($estado);
			
			if($ini == $fin){
			
				$primerHeader= "Asistencia General del dia: ".$ini;
				
				$tituloExcel= 'Asistencia-'.$cursoname->nombre.'-'.$estadoname->nombre.'-del Dia-'.$ini;
			
			}else{
			
				$primerHeader= "Asistencia General del dia: ".$ini." al dia: ".$fin;
				
				$tituloExcel= 'Asistencia-'.$cursoname->nombre.'-'.$estadoname->nombre.'-del Dia-'.$ini.'-al-'.$fin;
			
			}
			$array = array(
				'ini'=>$ini, 
				'fin'=>$fin, 
				'curso'=>$curso, 
				'estado'=>$estado
			);
			
			$reporte_data = $this->cursos_model->reporteGeneral($array);
						
			$header = array(
				$primerHeader,
				"Curso: ".$cursoname->nombre,
				"Estado: ".$estadoname->nombre,
				"Generado por: ".$user->first_name." ".$user->last_name.", el ".date("d-m-Y")
			);
			
			$reporte_header =array(
				'A'=>'Nombre Asistente',
				'B'=>'Cedula',
				'C'=>'Edad',
				'D'=>'Sexo',
				'E'=>'Dia Asistido',
				'F'=>'Horas Impartidas',
			);
			
			$this->reportes_excel->genera_excel_basico($tituloExcel,$header,$reporte_header,$reporte_data);
		
		}else{
			
			if ($_POST['cursod'] != null) {
				$cursoname = $this->cursos_model->getCursoName($_POST['cursod']);
			}		
			
			$estadoname = $this->cursos_model->getEstadoForEdit($_POST['estado']);
			
			if($ini == $fin){
			
				$primerHeader= "Asistencia del dia: ".$ini;
				
				$tituloExcel= 'Asistencia-'.$cursoname->nombre.'-'.$estadoname->nombre.'-del Dia-'.$ini;
			
			}else{
			
				$primerHeader= "Asistencia del dia: ".$ini." al dia: ".$fin;
				
				$tituloExcel= 'Asistencia-'.$cursoname->nombre.'-'.$estadoname->nombre.'-del Dia-'.$ini.'-al-'.$fin;
			
			}
			
			
				
			$array = array(
				'ini'=>$ini, 
				'fin'=>$fin, 
				'curso'=>$_POST['cursod'], 
				'estado'=>$_POST['estado']
			);
				
			$reporte_data = $this->cursos_model->reporteDetallado($array);
						
			$header = array(
				$primerHeader,
				"Estado: ".$estadoname->nombre,
				"Generado por: ".$user->first_name." ".$user->last_name.", el ".date("d-m-Y")
			);
			
			$reporte_header =array(
				'A'=>'Nombre Asistente',
				'B'=>'Cedula',
				'C'=>'Edad',
				'D'=>'Sexo',
				'E'=>'Nombre del Curso',
				'F'=>'Dia Asistido',
				'G'=>'Horas Impartidas',
			);
			
			$this->reportes_excel->genera_excel_basico($tituloExcel,$header,$reporte_header,$reporte_data);
		
		}

	}

}
/* End of file Cursos.php */