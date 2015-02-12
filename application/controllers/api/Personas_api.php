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
			'telefono'=>$this->post("telTrab"),
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

		$this->ion_auth->register($username, $password, $email, $additional_data);
		
		$this->db->trans_complete();
		
		redirect(base_url().'Persona');

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
		redirect(base_url().'persona');
	}

	public function update_post()
	{
		$data=array(
			'nombre'=>$this->post("nombre"),
			'cuenta'=>$this->post("cuenta"),
			'observaciones'=>$this->post("observaciones"),
			'fecha_actualizacion'=>date("Y-m-d H:i:s")
		 );
		$id=$this->post("id");

		$this->bancos_model->update($id,$data);

		redirect(base_url().'Entidades_bancarias');


	}
}