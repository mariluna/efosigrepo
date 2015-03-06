<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Personas_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('persona_model');
    }

    function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('persona/'.$name_view.'', $data);
		$this->load->view('footer');

	}

    public function index_get(){
        $this->response($this->persona_model->get_all());
    }

    public function show_get($id)
	{
		$f=$this->response($this->persona_model->get($id));

		$this->load->view('header');
		$this->load->view('personas/ver', $f);
		$this->load->view('footer');

	}

	public function remove_delete($id = NULL)
	{
		if ($this->persona_model->delete($id))
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

		if($this->post("etnia")=="Si")
		{
			$etnia=$this->post("cualEtnia");
			$idioma=$this->post("idioma");
		}else
		{
			$etnia=$this->post("etnia");
			$idioma="";
		}
		
		if($this->post("discapacidad")=="Si")
		{
			$discapacidad=$this->post("cualDiscapacidad");
		}
		else
		{
			$discapacidad=$this->post("discapacidad");
		}
		
		if($this->post("instruccion")=="Universitario")
		{
			$instruccion=$this->post("profesion");
		}
		else
		{
			$instruccion=$this->post("instruccion");
		}
		
		if($this->post("estudio")=="Si")
		{
			$estudioAct=$this->post("estudio");
			$institucion=$this->post("inst");
			$queEstudia=$this->post("queEstudia");
			$tipoInstitucion=$this->post("tipoInst");
		}
		else
		{
			$estudioAct=$this->post("estudio");
			$institucion="";
			$queEstudia="";
			$tipoInstitucion="";
		}
		
		if($this->post("mision")=="Si")
		{
			$mision=$this->post("cualMision");
		}
		else
		{
			$mision=$this->post("mision");
		}
		
		if($this->post("estudiar")=="Si")
		{
			$gustEstudiar=$this->post("gustEstudiar");
		}
		else
		{
			$gustEstudiar=$this->post("estudiar");
		}
		
		if($this->post("movimiento")=="Si")
		{
			$movimiento=$this->post("cualMovimiento");
			$militanciaMov=$this->post("militanciaMov");
			$responsabilidadMov=$this->post("responsabilidadMov");
		}
		else
		{
			$movimiento=$this->post("movimiento");
			$militanciaMov=0;
			$responsabilidadMov="";
		}
		
		if($this->post("partido")=="Si")
		{
			$partido=$this->post("cualPartido");
			$militanciaPar=$this->post("militanciaPar");
			$responsabilidadPar=$this->post("responsabilidadPar");
		}
		else
		{
			$partido=$this->post("partido");
			$militanciaPar=0;
			$responsabilidadPar="";
		}
		
		if($this->post("concejoC")=="Si")
		{
			$concejoC=$this->post("nombreConcejoC");
			if($this->post("voceria")=="Si"){
				$voceria=$this->post("cualVoceria");
			}else{
				$voceria=$this->post("voceria");;
			}
			if($this->post("comuna")=="Si"){
				$comuna=$this->post("cualComuna");
			}else{
				$comuna=$this->post("comuna");;
			}
		}
		else
		{
			$concejoC=$this->post("concejoC");
			$voceria="No";
			$comuna="No";
		}
		
		$data=array(
			'id_redi'=>$this->post("redi"),
			'id_estado'=>$this->post("estado"),
			'id_municipio'=>$this->post("municipio"),
			'id_parroquia'=>$this->post("parroquia"),
			'direccion'=>$this->post("direccion"),
			'nombre_apellido'=>$this->post("nombreApellido"),
			'cedula'=>$this->post("cedula"),
			'nacionalidad'=>$this->post("nacionalidad"),
			'edad'=>$this->post("edad"),
			'sexo'=>$this->post("sexo"),
			'fecha_nacimiento'=>$this->post("fecha"),
			'num_hijos'=>$this->post("nroHijos"),
			'etnia'=>$etnia,
			'domina_idioma'=>$idioma,
			'discapacidad'=>$discapacidad,
			'estado_civil'=>$this->post("edoCivil"),
			'tel_local'=>$this->post("telHab"),
			'tel_celular'=>$this->post("telCel"),
			'email'=>$this->post("correo"),
			'nivel_instruccion'=>$instruccion,
			'estudia_act'=>$estudioAct,
			'nombre_inst'=>$institucion,
			'grado'=>$queEstudia,
			'tipo_inst'=>$tipoInstitucion,
			'estudia_mision'=>$mision,
			'gustaria_estudiar'=>$gustEstudiar,
			'participa_org_mujeres'=>$movimiento,
			'anios_militancia'=>$militanciaMov,
			'responsabilidad'=>$responsabilidadMov,
			'participa_part_politico'=>$partido,
			'anios_militancia_pp'=>$militanciaPar,
			'responsabilidad_pp'=>$responsabilidadPar,
			'concejo_comunal'=>$concejoC,
			'voceria_cc'=>$voceria,
			'comuna_cc'=>$comuna,
			'status'=>"General"
			);

		$this->db->trans_start();
		
		$cedula = $this->post("cedula");
		
		$this->persona_model->add($data);
			
		$id_persona=$this->db->query("select id_persona from tb_persona where cedula= $cedula")->row();
		
		$data2=array(
			'id_persona'=>$id_persona->id_persona,
			'institucion_labora'=>$this->post("instTrabajo"),
			'cargo'=>$this->post("cargo"),
			'telefono'=>$this->post("telOficina"),
			'email'=>$this->post("correoTrabajo")
		);
		
		$this->persona_model->add_general($data2);
		
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->helper('language');
		
		$username = $this->post("nombreApellido");
		$email    = $this->post("correo");
		$password = $this->post("cedula");

		$additional_data = array(
			'persona_id'      => $id_persona->id_persona,
			'first_name'	  => $this->post("nombreApellido"),
			'pregunta'		  => 'Cuantos hijos tengo?',
			'respuesta'		  => $this->post("nroHijos")			
		);
		
		//funcion del correo//
		
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
						<img style="width: 100%; max-width: 500px;" src="img/logo_efosig.jpg">
					</th>
				  </tr>
				  <tr>
					<td class="tg-031e" colspan="2" style="padding: 17px;">
						<p>Gracias por inscribirse en nuestro sitio de EFOSIG, sus datos para ingresar al sistema son: </p>
						<p style="text-align:center">Usuario: '.$this->post("correo").'<br>Password: '.$this->post("cedula").'</p>
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
        $this->email->to($this->post("correo"));
        $this->email->subject('Bienvenido/a a EFOSIG');
		
        $this->email->message($body);
        $this->email->send();
		
		$this->ion_auth->register($username, $password, $email, $additional_data);
		
		$this->db->trans_complete();
		$this->session->set_flashdata('message', '<div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> Usuario Agregado de forma exitosa.
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect(base_url());

	}
	
	public function saveMMDB_post()
	{
		if($this->post("etnia")=="Si")
		{
			$etnia=$this->post("cualEtnia");
			$idioma=$this->post("idioma");
		}else
		{
			$etnia=$this->post("etnia");
			$idioma="";
		}
		
		if($this->post("discapacidad")=="Si")
		{
			$discapacidad=$this->post("cualDiscapacidad");
		}
		else
		{
			$discapacidad=$this->post("discapacidad");
		}
		
		if($this->post("instruccion")=="Universitario")
		{
			$instruccion=$this->post("profesion");
		}
		else
		{
			$instruccion=$this->post("instruccion");
		}
		
		if($this->post("estudio")=="Si")
		{
			$estudioAct=$this->post("estudio");
			$institucion=$this->post("inst");
			$queEstudia=$this->post("queEstudia");
			$tipoInstitucion=$this->post("tipoInst");
		}
		else
		{
			$estudioAct=$this->post("estudio");
			$institucion="";
			$queEstudia="";
			$tipoInstitucion="";
		}
		
		if($this->post("mision")=="Si")
		{
			$mision=$this->post("cualMision");
		}
		else
		{
			$mision=$this->post("mision");
		}
		
		if($this->post("estudiar")=="Si")
		{
			$gustEstudiar=$this->post("gustEstudiar");
		}
		else
		{
			$gustEstudiar=$this->post("estudiar");
		}
		
		if($this->post("movimiento")=="Si")
		{
			$movimiento=$this->post("cualMovimiento");
			$militanciaMov=$this->post("militanciaMov");
			$responsabilidadMov=$this->post("responsabilidadMov");
		}
		else
		{
			$movimiento=$this->post("movimiento");
			$militanciaMov=0;
			$responsabilidadMov="";
		}
		
		if($this->post("partido")=="Si")
		{
			$partido=$this->post("cualPartido");
			$militanciaPar=$this->post("militanciaPar");
			$responsabilidadPar=$this->post("responsabilidadPar");
		}
		else
		{
			$partido=$this->post("partido");
			$militanciaPar=0;
			$responsabilidadPar="";
		}
		
		if($this->post("concejoC")=="Si")
		{
			$concejoC=$this->post("nombreConcejoC");
			if($this->post("voceria")=="Si"){
				$voceria=$this->post("cualVoceria");
			}else{
				$voceria=$this->post("voceria");;
			}
			if($this->post("comuna")=="Si"){
				$comuna=$this->post("cualComuna");
			}else{
				$comuna=$this->post("comuna");;
			}
		}
		else
		{
			$concejoC=$this->post("concejoC");
			$voceria="No";
			$comuna="No";
		}
		if($this->post("mmdb")=="Si")
		{
			$mmdb="Si";
			if($this->post("comite")=="Si"){
				$comite=$this->post("cualComite");
				$responsabilidadCom=$this->post("responsabilidadCom");
			}else{
				$comite=$this->post("comite");
				$responsabilidadCom=$this->post("comite");
			}
		}
		else
		{
			$mmdb="No";
			$comite="No";
			$responsabilidadCom="No";
		}
		$data=array(
			'id_redi'=>$this->post("redi"),
			'id_estado'=>$this->post("estado"),
			'id_municipio'=>$this->post("municipio"),
			'id_parroquia'=>$this->post("parroquia"),
			'direccion'=>$this->post("direccion"),
			'nombre_apellido'=>$this->post("nombreApellido"),
			'cedula'=>$this->post("cedula"),
			'nacionalidad'=>$this->post("nacionalidad"),
			'edad'=>$this->post("edad"),
			'sexo'=>$this->post("sexo"),
			'fecha_nacimiento'=>$this->post("fecha"),
			'num_hijos'=>$this->post("nroHijos"),
			'etnia'=>$etnia,
			'domina_idioma'=>$idioma,
			'discapacidad'=>$discapacidad,
			'estado_civil'=>$this->post("edoCivil"),
			'tel_local'=>$this->post("telHab"),
			'tel_celular'=>$this->post("telCel"),
			'email'=>$this->post("correo"),
			'nivel_instruccion'=>$instruccion,
			'estudia_act'=>$estudioAct,
			'nombre_inst'=>$institucion,
			'grado'=>$queEstudia,
			'tipo_inst'=>$tipoInstitucion,
			'estudia_mision'=>$mision,
			'gustaria_estudiar'=>$gustEstudiar,
			'participa_org_mujeres'=>$movimiento,
			'anios_militancia'=>$militanciaMov,
			'responsabilidad'=>$responsabilidadMov,
			'participa_part_politico'=>$partido,
			'anios_militancia_pp'=>$militanciaPar,
			'responsabilidad_pp'=>$responsabilidadPar,
			'concejo_comunal'=>$concejoC,
			'voceria_cc'=>$voceria,
			'comuna_cc'=>$comuna,
			'status'=>"MMDB"
			);
			
			$id_persona=$this->persona_model->add($data);		
		
		$data2=array(
			'id_persona'=>$id_persona,
			'beneficiaria'=>$mmdb,
			'comite'=>$comite,
			'responsabilidad'=>$responsabilidadCom,
			'proy_socio_productivo'=>$this->post("socioProd"),
			'frente_comites'=>$this->post("frenteComite")
		);
		
		$this->persona_model->add_MMDB($data2);
		$this->session->set_flashdata('message', '<div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> Usuario agregado de forma exitosa.
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect(base_url().'Persona');
	}

	public function update_post()
	{
		if($this->post("etnia")=="Si")
		{
			$etnia=$this->post("cualEtnia");
			$idioma=$this->post("idioma");
		}else
		{
			$etnia=$this->post("etnia");
			$idioma="";
		}
		
		if($this->post("discapacidad")=="Si")
		{
			$discapacidad=$this->post("cualDiscapacidad");
		}
		else
		{
			$discapacidad=$this->post("discapacidad");
		}
		
		if($this->post("instruccion")=="Universitario")
		{
			$instruccion=$this->post("profesion");
		}
		else
		{
			$instruccion=$this->post("instruccion");
		}
		
		if($this->post("estudio")=="Si")
		{
			$estudioAct=$this->post("estudio");
			$institucion=$this->post("inst");
			$queEstudia=$this->post("queEstudia");
			$tipoInstitucion=$this->post("tipoInst");
		}
		else
		{
			$estudioAct=$this->post("estudio");
			$institucion="";
			$queEstudia="";
			$tipoInstitucion="";
		}
		
		if($this->post("mision")=="Si")
		{
			$mision=$this->post("cualMision");
		}
		else
		{
			$mision=$this->post("mision");
		}
		
		if($this->post("estudiar")=="Si")
		{
			$gustEstudiar=$this->post("gustEstudiar");
		}
		else
		{
			$gustEstudiar=$this->post("estudiar");
		}
		
		if($this->post("movimiento")=="Si")
		{
			$movimiento=$this->post("cualMovimiento");
			$militanciaMov=$this->post("militanciaMov");
			$responsabilidadMov=$this->post("responsabilidadMov");
		}
		else
		{
			$movimiento=$this->post("movimiento");
			$militanciaMov=0;
			$responsabilidadMov="";
		}
		
		if($this->post("partido")=="Si")
		{
			$partido=$this->post("cualPartido");
			$militanciaPar=$this->post("militanciaPar");
			$responsabilidadPar=$this->post("responsabilidadPar");
		}
		else
		{
			$partido=$this->post("partido");
			$militanciaPar=0;
			$responsabilidadPar="";
		}
		
		if($this->post("concejoC")=="Si")
		{
			$concejoC=$this->post("nombreConcejoC");
			if($this->post("voceria")=="Si"){
				$voceria=$this->post("cualVoceria");
			}else{
				$voceria=$this->post("voceria");;
			}
			if($this->post("comuna")=="Si"){
				$comuna=$this->post("cualComuna");
			}else{
				$comuna=$this->post("comuna");;
			}
		}
		else
		{
			$concejoC=$this->post("concejoC");
			$voceria="No";
			$comuna="No";
		}
		
		$data=array(
			'id_redi'=>$this->post("redi"),
			'id_estado'=>$this->post("estado"),
			'id_municipio'=>$this->post("municipio"),
			'id_parroquia'=>$this->post("parroquia"),
			'direccion'=>$this->post("direccion"),
			'nombre_apellido'=>$this->post("nombreApellido"),
			'cedula'=>$this->post("cedula"),
			'nacionalidad'=>$this->post("nacionalidad"),
			'edad'=>$this->post("edad"),
			'sexo'=>$this->post("sexo"),
			'fecha_nacimiento'=>$this->post("fecha"),
			'num_hijos'=>$this->post("nroHijos"),
			'etnia'=>$etnia,
			'domina_idioma'=>$idioma,
			'discapacidad'=>$discapacidad,
			'estado_civil'=>$this->post("edoCivil"),
			'tel_local'=>$this->post("telHab"),
			'tel_celular'=>$this->post("telCel"),
			'email'=>$this->post("correo"),
			'nivel_instruccion'=>$instruccion,
			'estudia_act'=>$estudioAct,
			'nombre_inst'=>$institucion,
			'grado'=>$queEstudia,
			'tipo_inst'=>$tipoInstitucion,
			'estudia_mision'=>$mision,
			'gustaria_estudiar'=>$gustEstudiar,
			'participa_org_mujeres'=>$movimiento,
			'anios_militancia'=>$militanciaMov,
			'responsabilidad'=>$responsabilidadMov,
			'participa_part_politico'=>$partido,
			'anios_militancia_pp'=>$militanciaPar,
			'responsabilidad_pp'=>$responsabilidadPar,
			'concejo_comunal'=>$concejoC,
			'voceria_cc'=>$voceria,
			'comuna_cc'=>$comuna,
			'status'=>"General"
			);
			
		$data2=array(
			'id_persona'=>$this->post('idper'),
			'institucion_labora'=>$this->post("instTrabajo"),
			'cargo'=>$this->post("cargo"),
			'telefono'=>$this->post("telOficina"),
			'email'=>$this->post("correoTrabajo")
		);
		
		$this->db->trans_start();
		
		$cedula = $this->post("cedula");
		
		$this->persona_model->update($this->post('idper'),$data, $data2);
		
		$this->db->trans_complete();
		$this->session->set_flashdata('message', '<div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> Usuario editado de forma exitosa.
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect(base_url().'Persona');


	}

	public function updateMMDB_post()
	{
			if($this->post("etnia")=="Si")
		{
			$etnia=$this->post("cualEtnia");
			$idioma=$this->post("idioma");
		}else
		{
			$etnia=$this->post("etnia");
			$idioma="";
		}
		
		if($this->post("discapacidad")=="Si")
		{
			$discapacidad=$this->post("cualDiscapacidad");
		}
		else
		{
			$discapacidad=$this->post("discapacidad");
		}
		
		if($this->post("instruccion")=="Universitario")
		{
			$instruccion=$this->post("profesion");
		}
		else
		{
			$instruccion=$this->post("instruccion");
		}
		
		if($this->post("estudio")=="Si")
		{
			$estudioAct=$this->post("estudio");
			$institucion=$this->post("inst");
			$queEstudia=$this->post("queEstudia");
			$tipoInstitucion=$this->post("tipoInst");
		}
		else
		{
			$estudioAct=$this->post("estudio");
			$institucion="";
			$queEstudia="";
			$tipoInstitucion="";
		}
		
		if($this->post("mision")=="Si")
		{
			$mision=$this->post("cualMision");
		}
		else
		{
			$mision=$this->post("mision");
		}
		
		if($this->post("estudiar")=="Si")
		{
			$gustEstudiar=$this->post("gustEstudiar");
		}
		else
		{
			$gustEstudiar=$this->post("estudiar");
		}
		
		if($this->post("movimiento")=="Si")
		{
			$movimiento=$this->post("cualMovimiento");
			$militanciaMov=$this->post("militanciaMov");
			$responsabilidadMov=$this->post("responsabilidadMov");
		}
		else
		{
			$movimiento=$this->post("movimiento");
			$militanciaMov=0;
			$responsabilidadMov="";
		}
		
		if($this->post("partido")=="Si")
		{
			$partido=$this->post("cualPartido");
			$militanciaPar=$this->post("militanciaPar");
			$responsabilidadPar=$this->post("responsabilidadPar");
		}
		else
		{
			$partido=$this->post("partido");
			$militanciaPar=0;
			$responsabilidadPar="";
		}
		
		if($this->post("concejoC")=="Si")
		{
			$concejoC=$this->post("nombreConcejoC");
			if($this->post("voceria")=="Si"){
				$voceria=$this->post("cualVoceria");
			}else{
				$voceria=$this->post("voceria");;
			}
			if($this->post("comuna")=="Si"){
				$comuna=$this->post("cualComuna");
			}else{
				$comuna=$this->post("comuna");;
			}
		}
		else
		{
			$concejoC=$this->post("concejoC");
			$voceria="No";
			$comuna="No";
		}
		if($this->post("mmdb")=="Si")
		{
			$mmdb="Si";
			if($this->post("comite")=="Si"){
				$comite=$this->post("cualComite");
				$responsabilidadCom=$this->post("responsabilidadCom");
			}else{
				$comite=$this->post("comite");
				$responsabilidadCom=$this->post("comite");
			}
		}
		else
		{
			$mmdb="No";
			$comite="No";
			$responsabilidadCom="No";
		}
		$data=array(
			'id_redi'=>$this->post("redi"),
			'id_estado'=>$this->post("estado"),
			'id_municipio'=>$this->post("municipio"),
			'id_parroquia'=>$this->post("parroquia"),
			'direccion'=>$this->post("direccion"),
			'nombre_apellido'=>$this->post("nombreApellido"),
			'cedula'=>$this->post("cedula"),
			'nacionalidad'=>$this->post("nacionalidad"),
			'edad'=>$this->post("edad"),
			'sexo'=>$this->post("sexo"),
			'fecha_nacimiento'=>$this->post("fecha"),
			'num_hijos'=>$this->post("nroHijos"),
			'etnia'=>$etnia,
			'domina_idioma'=>$idioma,
			'discapacidad'=>$discapacidad,
			'estado_civil'=>$this->post("edoCivil"),
			'tel_local'=>$this->post("telHab"),
			'tel_celular'=>$this->post("telCel"),
			'email'=>$this->post("correo"),
			'nivel_instruccion'=>$instruccion,
			'estudia_act'=>$estudioAct,
			'nombre_inst'=>$institucion,
			'grado'=>$queEstudia,
			'tipo_inst'=>$tipoInstitucion,
			'estudia_mision'=>$mision,
			'gustaria_estudiar'=>$gustEstudiar,
			'participa_org_mujeres'=>$movimiento,
			'anios_militancia'=>$militanciaMov,
			'responsabilidad'=>$responsabilidadMov,
			'participa_part_politico'=>$partido,
			'anios_militancia_pp'=>$militanciaPar,
			'responsabilidad_pp'=>$responsabilidadPar,
			'concejo_comunal'=>$concejoC,
			'voceria_cc'=>$voceria,
			'comuna_cc'=>$comuna,
			'status'=>"MMDB"
			);
			
		$data2=array(
			'id_persona'=>$this->post('idper'),
			'beneficiaria'=>$mmdb,
			'comite'=>$comite,
			'responsabilidad'=>$responsabilidadCom,
			'proy_socio_productivo'=>$this->post("socioProd"),
			'frente_comites'=>$this->post("frenteComite")
		);
		
		$id_persona=$this->persona_model->updatemmdb($id,$data,$data2);		

		$this->session->set_flashdata('message', '<div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> Usuario agregado de forma exitosa.
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect(base_url().'Persona');

	}
}