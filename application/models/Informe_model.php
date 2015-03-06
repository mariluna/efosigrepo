<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informe_model extends CI_Model
{
    public $table = 'tb_informe';

    public function get_all()
    {
       return $this->db->query("SELECT
			tb_informe.tipo_actividad_for,
			tb_informe.act_nombre_for,
			tb_redi.nombre AS region,
			users.first_name || ' ' || users.last_name as usuario,
			tb_curso.nombre as curso
			FROM
			tb_informe
			INNER JOIN tb_redi ON tb_informe.id_redi = tb_redi.id_redi
			INNER JOIN users ON tb_informe.id_usuario = users.id
			INNER JOIN tb_curso ON tb_curso.id_curso = tb_informe.id_curso")->result();//get($this->table)->result();
    }

    public function get($id_informe)
    {
				$get =  $this->db->query("SELECT
				tb_informe.id_informe,
				tb_redi.id_redi,
				tb_estado.id_estado,
				tb_municipio.id_municipio,
				tb_parroquia.id_parroquia,
				tb_curso.id_curso,
				tb_redi.nombre AS redi,
				tb_estado.nombre AS estado,
				tb_municipio.nombre AS municipio,
				tb_parroquia.nombre AS parroquia,
				users.id as user,
				users.first_name || ' ' || users.last_name AS usuario,
				users.email,
				tb_curso.nombre AS curso,
				tb_informe.tipo_actividad_for,
				tb_informe.act_nombre_for,
				tb_informe.tot_asistentes_for,
				tb_informe.tot_femeninos_for,
				tb_informe.tot_masculinos_for,
				tb_informe.tot_div_sexual_for,
				tb_informe.tot_mujeres_indigenas_for,
				tb_informe.tot_mujeres_discapacidad_for,
				tb_informe.tot_mujeres_afrodecendientes_for,
				tb_informe.tot_movimientos_mujeres_for,
				tb_informe.nombre_movimiento_for,
				tb_informe.fec_inicio_for,
				tb_informe.hora_inicio_for,
				tb_informe.fec_final_for,
				tb_informe.hora_final_for,
				tb_informe.tipo_actividad_div,
				tb_informe.act_nombre_div,
				tb_informe.tot_asistentes_div,
				tb_informe.tot_femeninos_div,
				tb_informe.tot_masculinos_div,
				tb_informe.tot_div_sexual_div,
				tb_informe.tot_mujeres_indigenas_div,
				tb_informe.tot_mujeres_discapacidad_div,
				tb_informe.tot_mujeres_afrodecendientes_div,
				tb_informe.tipo_material_div,
				tb_informe.cantidad_div,
				tb_informe.convocacion_medios_div,
				tb_informe.medios_radio_div,
				tb_informe.medios_prensa_div,
				tb_informe.medios_tv_div,
				tb_informe.medios_comunitarios_div,
				tb_informe.medios_otros_div
				FROM
									tb_informe
									INNER JOIN tb_redi ON tb_informe.id_redi = tb_redi.id_redi
									INNER JOIN tb_estado ON tb_informe.id_estado = tb_estado.id_estado
									INNER JOIN tb_municipio ON tb_informe.id_municipio = tb_municipio.id_municipio
									INNER JOIN tb_parroquia ON tb_informe.id_parroquia = tb_parroquia.id_parroquia
									INNER JOIN users ON tb_informe.id_usuario = users.id
									INNER JOIN tb_curso ON tb_informe.id_curso = tb_curso.id_curso
				where tb_informe.id_informe= $id_informe")->result();//where('id_divulgacion', $id)->get($this->table)->row();
	
        return $get;

    }

	   public function delete($id)
    {
        $this->db->query("DELETE FROM tb_informe WHERE id_informe = $id");
        return $this->db->affected_rows();
    }
	public function update($id, $data)
    {
        return $this->db->where('id_informe', $id)->update('tb_informe', $data);
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

     public function getCursos()
    {
        return $this->db->query("select * from tb_curso")->result();
    }

	public function getRedis()
    {
        return $this->db->query("select * from tb_redi")->result();
    }

     public function getEstados()
    {
        return $this->db->query("select * from tb_estado")->result();
    }

	public function getMunicipios()
    {
        return $this->db->query("select * from tb_municipio")->result();
    }
    public function getParroquias()
    {
        return $this->db->query("select * from tb_parroquia")->result();
    }

	public function getUsers()
    {
        return $this->db->query("select * from users")->result();
    }
	
	public function cargar_redi(){
		$r= $this->ion_auth->user()->row();
		$rol = $this->ion_auth->get_users_groups()->row();
	
	$query = $this->db->query("SELECT id_redi FROM tb_persona WHERE id_persona = $r->persona_id")->row();
		
		if($rol->id == 1){

		$redi=$this->db->query("Select * from tb_redi")->result();
		return $redi;
		}elseif($rol->id == 3){

		$redi=$this->db->query("Select * from tb_redi 
		where tb_redi.id_redi = $query->id_redi ")->result();
		return $redi;
		}
	}
	public function cargar_curso(){
		$curso=$this->db->query("SELECT id_curso,nombre FROM tb_curso")->result();
		return $curso;
	}
	public function cargar_estado($redi)
	{
		$html = '<option value="" selected="selected">Seleccione una opcion</option>';
		$estados=$this->db->query("Select * from tb_estado where id_redi = $redi")->result();
		foreach($estados as $estado){
			$html .= '<option value="'.$estado->id_estado.'">'.$estado->nombre.'</option>';
		}
		return $html;
	}
	
	public function cargar_municipio($estado)
	{
		$html = '<option value="" selected="selected">Seleccione una opcion</option>';
		$municipios=$this->db->query("Select * from tb_municipio where id_estado = $estado")->result();
		foreach($municipios as $municipio){
			$html .= '<option value="'.$municipio->id_municipio.'">'.$municipio->nombre.'</option>';
		}
		return $html;
	}
	
	public function cargar_parroquia($municipio)
	{
		$html = '<option value="" selected="selected">Seleccione una opcion</option>';
		$parroquias=$this->db->query("Select * from tb_parroquia where id_municipio = $municipio")->result();
		foreach($parroquias as $parroquia){
			$html .= '<option value="'.$parroquia->id_parroquia.'">'.$parroquia->nombre.'</option>';
		}
		return $html;
	}
	
	public function getSelectedCurso($id)
    {
        return $this->db->query("select cur.* from tb_curso cur INNER JOIN tb_informe inf ON inf.id_curso = cur.id_curso WHERE inf.id_informe = $id")->result();
    }
	
	public function getOtrosCursos($id_curso)
    {
        return $this->db->query("select * from tb_curso WHERE id_curso NOT IN ($id_curso)")->result();
    }
	public function getSelectedRedi($id)
    {
        return $this->db->query("select red.* from tb_redi red INNER JOIN tb_informe inf ON inf.id_redi = red.id_redi WHERE inf.id_informe =  $id")->result();
    }
	
	public function getOtrosRedis($id_redi)
    {
        return $this->db->query("select * from tb_redi WHERE id_redi NOT IN ($id_redi)")->result();
    }
	
	public function getSelectedMunicipio($id)
    {
        return $this->db->query("select mun.* from tb_municipio mun INNER JOIN tb_informe inf ON inf.id_municipio = mun.id_municipio WHERE inf.id_informe = $id")->result();
    }
	
	public function getOtrosMunicipios($id_municipio)
    {
        return $this->db->query("select * from tb_municipio WHERE id_municipio NOT IN ($id_municipio)")->result();
    }
	public function getSelectedEstado($id)
    {
        return $this->db->query("select est.* from tb_estado est INNER JOIN tb_informe inf ON inf.id_estado = est.id_estado WHERE inf.id_informe = $id")->result();
    }
	
	public function getOtrosEstados($id_estado)
    {
        return $this->db->query("select * from tb_estado WHERE id_estado NOT IN ($id_estado)")->result();
    }
	public function getSelectedParroquia($id)
    {
        return $this->db->query("select paq.* from tb_parroquia paq INNER JOIN tb_informe inf ON inf.id_parroquia = paq.id_parroquia WHERE inf.id_informe = $id")->result();
    }
	
	public function getOtrosParroquias($id_parroquia)
    {
        return $this->db->query("select * from tb_parroquia WHERE id_parroquia NOT IN ($id_parroquia)")->result();
    }
	
    public function getInformeData($id)
    {
        $forpdf=  $this->db->query("SELECT
								tb_informe.id_informe,
								tb_redi.id_redi,
								tb_estado.id_estado,
								tb_municipio.id_municipio,
								tb_parroquia.id_parroquia,
								tb_curso.id_curso,
								tb_redi.nombre AS redi,
								tb_estado.nombre AS estado,
								tb_municipio.nombre AS municipio,
								tb_parroquia.nombre AS parroquia,
								users.first_name || ' ' || users.last_name AS usuario,
								tb_persona.cedula,
								users.email,
								tb_curso.nombre AS curso,
								tb_informe.tipo_actividad_for,
								tb_informe.act_nombre_for,
								tb_informe.tot_asistentes_for,
								tb_informe.tot_femeninos_for,
								tb_informe.tot_masculinos_for,
								tb_informe.tot_div_sexual_for,
								tb_informe.tot_mujeres_indigenas_for,
								tb_informe.tot_mujeres_discapacidad_for,
								tb_informe.tot_mujeres_afrodecendientes_for,
								tb_informe.tot_movimientos_mujeres_for,
								tb_informe.nombre_movimiento_for,
								tb_informe.fec_inicio_for,
								tb_informe.hora_inicio_for,
								tb_informe.fec_final_for,
								tb_informe.hora_final_for,
								tb_informe.tipo_actividad_div,
								tb_informe.act_nombre_div,
								tb_informe.tot_asistentes_div,
								tb_informe.tot_femeninos_div,
								tb_informe.tot_masculinos_div,
								tb_informe.tot_div_sexual_div,
								tb_informe.tot_mujeres_indigenas_div,
								tb_informe.tot_mujeres_discapacidad_div,
								tb_informe.tot_mujeres_afrodecendientes_div,
								tb_informe.tipo_material_div,
								tb_informe.cantidad_div,
								tb_informe.convocacion_medios_div,
								tb_informe.medios_radio_div,
								tb_informe.medios_prensa_div,
								tb_informe.medios_tv_div,
								tb_informe.medios_comunitarios_div,
								tb_informe.medios_otros_div,
								tb_persona.tel_celular,
								tb_informe.fecha_creacion

								FROM
								tb_informe
								INNER JOIN tb_redi ON tb_informe.id_redi = tb_redi.id_redi
								INNER JOIN tb_estado ON tb_informe.id_estado = tb_estado.id_estado
								INNER JOIN tb_municipio ON tb_informe.id_municipio = tb_municipio.id_municipio
								INNER JOIN tb_parroquia ON tb_informe.id_parroquia = tb_parroquia.id_parroquia
								INNER JOIN users ON tb_informe.id_usuario = users.id
								INNER JOIN tb_curso ON tb_informe.id_curso = tb_curso.id_curso
								INNER JOIN tb_persona ON users.persona_id = tb_persona.id_persona
								WHERE
								tb_informe.id_informe =  $id")->result();
										return $forpdf;
    }
	
}


