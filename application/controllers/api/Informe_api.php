<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Informe_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('Informe_model');
    }
function view($name_view,$data){
		
		$this->load->view('header');
		$this->load->view('informe/'.$name_view.'', $data);
		$this->load->view('footer');

	}
	
	
	
    public function index_get(){
	
	$r= $this->ion_auth->user()->row();
	$rol = $this->ion_auth->get_users_groups()->row();
	
	$query = $this->db->query("SELECT id_estado FROM tb_persona WHERE id_persona = $r->persona_id")->row();
	
		if(($query->id_estado == 24) && ($rol->id == 1)){

		 $this->response($this->db->query("SELECT
				tb_informe.id_informe,
				tb_informe.tipo_actividad_for,
				tb_informe.act_nombre_for,
				tb_redi.nombre AS region,
				users.first_name || ' ' || users.last_name as usuario,
				tb_curso.nombre as curso
				FROM
				tb_informe
				INNER JOIN tb_redi ON tb_informe.id_redi = tb_redi.id_redi
				INNER JOIN users ON tb_informe.id_usuario = users.id
				INNER JOIN tb_curso ON tb_curso.id_curso = tb_informe.id_curso")->result());
				
		}elseif(($query->id_estado != 24) && ($rol->id == 1)){
		
			$this->response($this->db->query("SELECT
				tb_informe.id_informe,
				tb_informe.tipo_actividad_for,
				tb_informe.act_nombre_for,
				tb_redi.nombre AS region,
				users.first_name || ' ' || users.last_name as usuario,
				tb_curso.nombre as curso
				FROM
				tb_informe
				INNER JOIN tb_redi ON tb_informe.id_redi = tb_redi.id_redi
				INNER JOIN users ON tb_informe.id_usuario = users.id
				INNER JOIN tb_curso ON tb_curso.id_curso = tb_informe.id_curso
				where tb_informe.id_estado = $query->id_estado")->result());
		
		}elseif(($query->id_estado == 24) && ($rol->id == 3)){
		
			$this->response($this->db->query("SELECT
				tb_informe.id_informe,
				tb_informe.tipo_actividad_for,
				tb_informe.act_nombre_for,
				tb_redi.nombre AS region,
				users.first_name || ' ' || users.last_name as usuario,
				tb_curso.nombre as curso
				FROM
				tb_informe
				INNER JOIN tb_redi ON tb_informe.id_redi = tb_redi.id_redi
				INNER JOIN users ON tb_informe.id_usuario = users.id
				INNER JOIN tb_curso ON tb_curso.id_curso = tb_informe.id_curso")->result());
		
		}elseif(($query->id_estado != 24) && ($rol->id == 3)){
		
			$this->response($this->db->query("SELECT
				tb_informe.id_informe,
				tb_informe.tipo_actividad_for,
				tb_informe.act_nombre_for,
				tb_redi.nombre AS region,
				users.first_name || ' ' || users.last_name as usuario,
				tb_curso.nombre as curso
				FROM
				tb_informe
				INNER JOIN tb_redi ON tb_informe.id_redi = tb_redi.id_redi
				INNER JOIN users ON tb_informe.id_usuario = users.id
				INNER JOIN tb_curso ON tb_curso.id_curso = tb_informe.id_curso
				where tb_informe.id_estado = $query->id_estado")->result());
		
		}

    }

    public function show_get($id)
	{
		$f=$this->response($this->informe_model->get($id));
		$this->load->view('header');
		$this->load->view('informe/ver', $f);
		$this->load->view('footer');

	}

	public function remove_delete($id)
	{
		
		$this->load->model('informe_model');
		$this->db->trans_start();
		$this->informe_model->delete($id);
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El informe fue eliminado de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		$this->db->trans_complete();
		redirect(base_url().'informe');
	}


	public function save_post()
	{
		if($this->post("tot_div_sexual_for")=="Si")
		{
			$tot_div_sexual_for=$this->post("tot_div_sexual_for2");
		}else
		{
			$tot_div_sexual_for=$this->post("tot_div_sexual_for");

		}
		if($this->post("tot_mujeres_indigenas_for")=="Si")
		{
			$tot_mujeres_indigenas_for=$this->post("tot_mujeres_indigenas_for2");
		}else
		{
			$tot_mujeres_indigenas_for=$this->post("tot_mujeres_indigenas_for");

		}
		if($this->post("tot_mujeres_discapacidad_for")=="Si")
		{
			$tot_mujeres_discapacidad_for=$this->post("tot_mujeres_discapacidad_for2");
		}else
		{
			$tot_mujeres_discapacidad_for=$this->post("tot_mujeres_discapacidad_for");

		}
		if($this->post("tot_mujeres_afrodecendientes_for")=="Si")
		{
			$tot_mujeres_afrodecendientes_for=$this->post("tot_mujeres_afrodecendientes_for2");
		}else
		{
			$tot_mujeres_afrodecendientes_for=$this->post("tot_mujeres_afrodecendientes_for");

		}
		if($this->post("tot_movimientos_mujeres_for")=="Si")
		{
			$tot_movimientos_mujeres_for=$this->post("tot_movimientos_mujeres_for2");
		}else
		{
			$tot_movimientos_mujeres_for=$this->post("tot_movimientos_mujeres_for");

		}
		if($this->post("tot_div_sexual_div")=="Si")
		{
			$tot_div_sexual_div=$this->post("tot_div_sexual_div2");
		}else
		{
			$tot_div_sexual_div=$this->post("tot_div_sexual_div");
		}
		
		if($this->post("tot_mujeres_indigenas_div")=="Si")
		{
			$tot_mujeres_indigenas_div=$this->post("tot_mujeres_indigenas_div2");
		}else
		{
			$tot_mujeres_indigenas_div=$this->post("tot_mujeres_indigenas_div");

		}
		if($this->post("tot_mujeres_discapacidad_div")=="Si")
		{
			$tot_mujeres_discapacidad_div=$this->post("tot_mujeres_discapacidad_div2");
		}else
		{
			$tot_mujeres_discapacidad_div=$this->post("tot_mujeres_discapacidad_div");

		}
		if($this->post("tot_mujeres_afrodecendientes_div")=="Si")
		{
			$tot_mujeres_afrodecendientes_div=$this->post("tot_mujeres_afrodecendientes_div2");
		}else
		{
			$tot_mujeres_afrodecendientes_div=$this->post("tot_mujeres_afrodecendientes_div");

		}
		$hora_ini="19:06:25";
		$hora_fin="19:06:25";
		$fecha=date("Y-m-d");
		
			$data=array(
			'id_redi'=>$this->post("redi"),
			'id_estado'=>$this->post("estado"),
			'id_municipio'=>$this->post("municipio"),
			'id_parroquia'=>$this->post("parroquia"),
			'id_usuario'=>$this->post("user"),
			'id_curso'=>$this->post("curso"),
			'tipo_actividad_for'=>$this->post("tipo_actividad_for"),
			'act_nombre_for'=>$this->post("act_nombre_for"),
			'tot_asistentes_for'=>$this->post("tot_asistentes_for"),
			'tot_femeninos_for'=>$this->post("tot_femeninos_for"),
			'tot_masculinos_for'=>$this->post("tot_masculinos_for"),
			'tot_div_sexual_for'=>$tot_div_sexual_for,
			'tot_mujeres_indigenas_for'=>$tot_mujeres_indigenas_for,
			'tot_mujeres_discapacidad_for'=>$tot_mujeres_discapacidad_for,
			'tot_mujeres_afrodecendientes_for'=>$tot_mujeres_afrodecendientes_for,
			'tot_movimientos_mujeres_for'=>$tot_movimientos_mujeres_for,
			'nombre_movimiento_for'=>$this->post("nombre_movimientos"),
			'fec_inicio_for'=>$this->post("fec_ini"),
			'hora_inicio_for'=>$hora_ini,
			'fec_final_for'=>$this->post("fec_fin"),
			'hora_final_for'=>$hora_fin,
			'tipo_actividad_div'=>$this->post("tipo_actividad_div"),
			'act_nombre_div'=>$this->post("act_nombre_div"),
			'tot_asistentes_div'=>$this->post("tot_asistentes_div"),
			'tot_femeninos_div'=>$this->post("tot_femeninos_div"),
			'tot_masculinos_div'=>$this->post("tot_masculinos_div"),
			'tot_div_sexual_div'=>$tot_div_sexual_div,
			'tot_mujeres_indigenas_div'=>$tot_mujeres_indigenas_div,
			'tot_mujeres_discapacidad_div'=>$tot_mujeres_discapacidad_div,
			'tot_mujeres_afrodecendientes_div'=>$tot_mujeres_afrodecendientes_div,
			'tipo_material_div'=>$this->post("tipo_material"),
			'cantidad_div'=>$this->post("cantidad"),
			'convocacion_medios_div'=>$this->post("convocacion_medios"),
			'medios_radio_div'=>$this->post("radio"),
			'medios_prensa_div'=>$this->post("prensa"),
			'medios_tv_div'=>$this->post("t_v"),
			'medios_comunitarios_div'=>$this->post("medios_comunitarios"),
			'medios_otros_div'=>$this->post("otros"),
			'fecha_creacion'=>$fecha
		 );

		$this->Informe_model->add($data);
		$this->db->trans_complete();
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El informe fue registrado de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect(base_url().'informe');

	}

	public function update_post()
	{
		if($this->post("tot_div_sexual_for")=="Si")
		{
			$tot_div_sexual_for=$this->post("tot_div_sexual_for2");
		}else
		{
			$tot_div_sexual_for=$this->post("tot_div_sexual_for");

		}
		if($this->post("tot_mujeres_indigenas_for")=="Si")
		{
			$tot_mujeres_indigenas_for=$this->post("tot_mujeres_indigenas_for2");
		}else
		{
			$tot_mujeres_indigenas_for=$this->post("tot_mujeres_indigenas_for");

		}
		if($this->post("tot_mujeres_discapacidad_for")=="Si")
		{
			$tot_mujeres_discapacidad_for=$this->post("tot_mujeres_discapacidad_for2");
		}else
		{
			$tot_mujeres_discapacidad_for=$this->post("tot_mujeres_discapacidad_for");

		}
		if($this->post("tot_mujeres_afrodecendientes_for")=="Si")
		{
			$tot_mujeres_afrodecendientes_for=$this->post("tot_mujeres_afrodecendientes_for2");
		}else
		{
			$tot_mujeres_afrodecendientes_for=$this->post("tot_mujeres_afrodecendientes_for");

		}
		if($this->post("tot_movimientos_mujeres_for")=="Si")
		{
			$tot_movimientos_mujeres_for=$this->post("tot_movimientos_mujeres_for2");
		}else
		{
			$tot_movimientos_mujeres_for=$this->post("tot_movimientos_mujeres_for");

		}
	if($this->post("tot_div_sexual_div")=="Si")
		{
			$tot_div_sexual_div=$this->post("tot_div_sexual_div2");
		}else
		{
			$tot_div_sexual_div=$this->post("tot_div_sexual_div");
		}
		
		if($this->post("tot_mujeres_indigenas_div")=="Si")
		{
			$tot_mujeres_indigenas_div=$this->post("tot_mujeres_indigenas_div2");
		}else
		{
			$tot_mujeres_indigenas_div=$this->post("tot_mujeres_indigenas_div");

		}
		if($this->post("tot_mujeres_discapacidad_div")=="Si")
		{
			$tot_mujeres_discapacidad_div=$this->post("tot_mujeres_discapacidad_div2");
		}else
		{
			$tot_mujeres_discapacidad_div=$this->post("tot_mujeres_discapacidad_div");

		}
		if($this->post("tot_mujeres_afrodecendientes_div")=="Si")
		{
			$tot_mujeres_afrodecendientes_div=$this->post("tot_mujeres_afrodecendientes_div2");
		}else
		{
			$tot_mujeres_afrodecendientes_div=$this->post("tot_mujeres_afrodecendientes_div");

		}
		$hora_ini="19:06:25";
		$hora_fin="19:06:25";
		$fecha=date("Y-m-d");
		
			$data=array(
			'id_redi'=>$this->post("redi"),
			'id_estado'=>$this->post("estado"),
			'id_municipio'=>$this->post("municipio"),
			'id_parroquia'=>$this->post("parroquia"),
			'id_usuario'=>$this->post("user"),
			'id_curso'=>$this->post("curso"),
			'tipo_actividad_for'=>$this->post("tipo_actividad_for"),
			'act_nombre_for'=>$this->post("act_nombre_for"),
			'tot_asistentes_for'=>$this->post("tot_asistentes_for"),
			'tot_femeninos_for'=>$this->post("tot_femeninos_for"),
			'tot_masculinos_for'=>$this->post("tot_masculinos_for"),
			'tot_div_sexual_for'=>$tot_div_sexual_for,
			'tot_mujeres_indigenas_for'=>$tot_mujeres_indigenas_for,
			'tot_mujeres_discapacidad_for'=>$tot_mujeres_discapacidad_for,
			'tot_mujeres_afrodecendientes_for'=>$tot_mujeres_afrodecendientes_for,
			'tot_movimientos_mujeres_for'=>$tot_movimientos_mujeres_for,
			'nombre_movimiento_for'=>$this->post("nombre_movimientos"),
			'fec_inicio_for'=>$this->post("fec_ini"),
			'hora_inicio_for'=>$hora_ini,
			'fec_final_for'=>$this->post("fec_fin"),
			'hora_final_for'=>$hora_fin,
			'tipo_actividad_div'=>$this->post("tipo_actividad_div"),
			'act_nombre_div'=>$this->post("act_nombre_div"),
			'tot_asistentes_div'=>$this->post("tot_asistentes_div"),
			'tot_femeninos_div'=>$this->post("tot_femeninos_div"),
			'tot_masculinos_div'=>$this->post("tot_masculinos_div"),
			'tot_div_sexual_div'=>$tot_div_sexual_div,
			'tot_mujeres_indigenas_div'=>$tot_mujeres_indigenas_div,
			'tot_mujeres_discapacidad_div'=>$tot_mujeres_discapacidad_div,
			'tot_mujeres_afrodecendientes_div'=>$tot_mujeres_afrodecendientes_div,
			'tipo_material_div'=>$this->post("tipo_material_div"),
			'cantidad_div'=>$this->post("cantidad_div"),
			'convocacion_medios_div'=>$this->post("convocacion_medios_div"),
			'medios_radio_div'=>$this->post("radio"),
			'medios_prensa_div'=>$this->post("prensa"),
			'medios_tv_div'=>$this->post("t_v"),
			'medios_comunitarios_div'=>$this->post("medios_comunitarios"),
			'medios_otros_div'=>$this->post("otros"),
			'fecha_actualizacion'=>$fecha
		 );
	
		$id=$this->post("id");

		
		$this->db->trans_start();
		$this->Informe_model->update($id,$data);
		$this->db->trans_complete();
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El informe fue modificado de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');

		redirect(base_url().'informe');


	}
	
}