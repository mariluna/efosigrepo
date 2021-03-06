<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	function view($name_view,$data)
	{
		$this->load->model('cursos_model');
		$this->cursos_model->checkCursoDate();
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
		//if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
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
		$data['facilitadores']=$this->cursos_model->getFacilitadores();
		$this->view($name,$data);
	}
	
	public function agregarAsistencia()
	{
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		$name="asistencia";
		$this->load->model('cursos_model');
		$user = $this->ion_auth->user()->row();
		$data['cursos']=$this->cursos_model->getCursoFac($user->persona_id);
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
			$this->session->set_flashdata('message', '<br><br><div class="alert alert-danger info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El curso Indicado no existe.
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
			redirect('Cursos');
		} else {
			$get['list']=$this->cursos_model->getEstadoEdit($get['data']->id_curso);
			$get['estado']=$this->cursos_model->getEstadoForEdit($get['data']->id_curso);
			//$get['facilitadores']=$this->cursos_model->getFacEdit($get['data']->id_facilitador);
			//$get['facilitador']=$this->cursos_model->getFacForEdit($get['data']->id_facilitador);
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
			$this->session->set_flashdata('message', '<br><br><div class="alert alert-danger info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El curso no existe.
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
			redirect(base_url().'Cursos');
		}else{
			$checkCursoStatus = $this->cursos_model->checkCursoStatus($cursoid);
			
			if ($checkCursoStatus =="false"){
				$this->session->set_flashdata('message', '<br><br><div class="alert alert-danger info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El curso se encuentra inactivo, por lo que no es posible su inscripcion.
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
				redirect(base_url().'Cursos');
			}else{
				$checkCursoData = $this->cursos_model->checkCursoData($part, $ins, $cursoid, $estid);
				
				if ($checkCursoData =="true"){
					
					$cupo = $part-$ins;
				
					if ($cupo > 0){		
						$inscribirCurso = $this->cursos_model->registrarPersonaCurso($cursoid, $userid, $estid);
						if($inscribirCurso == "true"){
							$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span> Usted fue inscrito con exito.
								<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
							redirect(base_url().'Cursos');
						}else{
								$this->session->set_flashdata('message', '<br><br><div class="alert alert-danger info" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span> Usted ya esta inscrito en ese curso.
								<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
							redirect(base_url().'Cursos');
						}
						
					}else{
						$this->session->set_flashdata('message', '<br><br><div class="alert alert-danger info" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span> El cupo de participantes esta completo.
							<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
						redirect(base_url().'Cursos');
					}
						
				} else {	
					$this->session->set_flashdata('message', '<br><br><div class="alert alert-danger info" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span> El curso no existe.
							<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
					redirect(base_url().'Cursos');
				
				}	
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
	public function test(){
	$this->load->library("email");
 
        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'joynertagf@gmail.com',
            'smtp_pass' => 'albafarizo',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );    
 
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);
		$body='<style type="text/css">
				.tg  {font-family:Arial, sans-serif;font-size:14px;border-collapse:collapse;border-spacing:0;border:0px}
				.tg td{padding:10px 5px;overflow:hidden;word-break:normal;}
				.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;overflow:hidden;word-break:normal;}
				</style>
				<table class="tg">
				  <tr>
					<th class="tg-031e" colspan="2">
						<img style="max-width: 500px;" src="'.base_url().'img/head.png">
						<img style="max-width: 500px;" src="'.base_url().'img/cintillo-200.png"><br>
						<img style="width: 100%; max-width: 500px;" src="'.base_url().'img/logo_efosig.jpg">
					</th>
				  </tr>
				  <tr>
					<td class="tg-031e" colspan="2" style="padding: 17px;">
						<p>Gracias por inscribirse en nuestro sitio de EFOSIG, sus datos para ingresar al sistema son: </p>
						<p style="text-align:center">Usuario: joynertagf@gmail<br>Password: 19565827</p>
						<p>para acceder al sitio EFOSIG, haga click en este <a href="">enlace</a> </p>
					</td>
				  </tr>
				  <tr>
					<td class="tg-031e" colspan="2">
						<img style="width: 100%;" src="'.base_url().'img/footer-pdf.png">
						<table width="100%" style="border: 0px;vertical-align: bottom; font-family: serif; font-size: 12pt; color: #000000; font-weight: bold; margin-top:-45px"><tr>
						<td width="100%" align="center" style="border:0px; color: white; font-weight: bold;">Escuela de Formaci&oacute;n Socialista para la Igualdad de G&eacute;nero "Ana Mar&iacute;a Campos"</td>
						</tr></table>
					</td>
				  </tr>
				</table>
				';
        $this->email->from('no-reply@efosig.com.ve');
        $this->email->to('joynertagf@gmail');
        $this->email->subject('Bienvenido/a a EFOSIG');
		
        $this->email->message($body);
        $this->email->send();
		
		echo $body;
	}

}
/* End of file Cursos.php */