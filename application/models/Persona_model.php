<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persona_model extends CI_Model
{
    public $table = 'tb_persona';

    public function get_all()
    {
		$r=$this->ion_auth->user()->row();
        $rol = $this->ion_auth->get_users_groups()->row();

		$query=$this->db->query("SELECT id_estado FROM tb_persona WHERE id_persona = $r->persona_id")->row();  
		if(($query->id_estado == 24) AND ($rol->id == 1)){
		
			$getpersona = $this->db->query("select * from tb_persona")->result();
		
		}else{
		
			$getpersona = $this->db->query("select * from tb_persona where id_estado = $query->id_estado")->result();
		
		}
		return $getpersona;
    }

    public function get($id)
    {
    	$get=  $this->db->query("SELECT per.id_persona,
										per.direccion,
										per.nombre_apellido,
										per.cedula,
										per.nacionalidad,
										per.edad,
										per.sexo,
										per.fecha_nacimiento,
										per.num_hijos,
										per.etnia,
										per.domina_idioma,
										per.discapacidad,
										per.estado_civil,
										per.tel_local,
										per.tel_celular,
										per.email,
										per.nivel_instruccion,
										per.estudia_act,
										per.nombre_inst,
										per.grado,
										per.tipo_inst,
										per.estudia_mision,
										per.gustaria_estudiar,
										per.participa_org_mujeres,
										per.anios_militancia,
										per.responsabilidad,
										per.participa_part_politico,
										per.anios_militancia_pp,
										per.responsabilidad_pp,
										per.concejo_comunal,
										per.voceria_cc,
										per.comuna_cc,
										per.status,
										per.id_redi,
										per.id_estado,
										per.id_municipio,
										per.id_parroquia,
										red.nombre as redi,
										est.nombre as estado,
										mun.nombre as municipio,
										par.nombre as parroquia,
										gen.institucion_labora,
										gen.cargo as cargoTrab,
										gen.telefono as telTrab,
										gen.email as emailTrab,
										mmdb.beneficiaria,
										mmdb.comite,
										mmdb.responsabilidad as respmmdb,
										mmdb.proy_socio_productivo,
										mmdb.frente_comites
									FROM tb_persona per
									INNER JOIN tb_redi red
									ON red.id_redi = per.id_redi
									INNER JOIN tb_estado est
									ON est.id_estado = per.id_estado
									INNER JOIN tb_municipio mun
									ON mun.id_municipio = per.id_municipio
									INNER JOIN tb_parroquia par
									ON par.id_parroquia = per.id_parroquia
									LEFT JOIN tb_general gen
									ON gen.id_persona = per.id_persona
									LEFT JOIN tb_mmdb mmdb
									ON mmdb.id_persona = per.id_persona									
									WHERE per.id_persona = $id")->row();
        return $get;

    }
	
    public function getTipoPersona($id)
    {
    	$get=  $this->db->query("SELECT status FROM tb_persona WHERE id_persona = $id")->row();
        return $get;

    }

    public function delete($id)
    {
		$this->db->where('id_persona', $id)->delete("tr_persona_curso");
        $this->db->where('id_persona', $id)->delete($this->table);
		$this->db->where('id_general',$id)->delete("tb_general");
        return $this->db->affected_rows();
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function AsignarRol($email,$username)
    {
        $userdata = $this->db->query("SELECT id FROM users WHERE email = '$email' AND username = '$username'")->row();
        $data = array(

            'user_id'  => $userdata->id,
            'group_id' => 2

        );
        $this->db->insert("users_groups", $data);
        return $this->db->insert_id();
    }

	public function add_MMDB($data)
	{
		$this->db->insert("tb_mmdb", $data);
        return $this->db->insert_id();
	}
	
	public function add_general($data)
	{
		$this->db->insert("tb_general", $data);
        return $this->db->insert_id();
	}

     public function update($id, $data, $data2)
    {
         $this->db->where('id_persona', $id)->update($this->table, $data);
		 $this->db->where('id_persona', $id)->update('tb_general', $data2);
		 return $this->db->affected_rows();
    		 
    }
	
     public function updatemmdb($id, $data, $data2)
    {
         $this->db->where('id_persona', $id)->update($this->table, $data);
		 $this->db->where('id_persona', $id)->update('tb_mmdb', $data2);
		 return $this->db->affected_rows();
    		 
    }

	public function cargar_redi(){
		$redi=$this->db->query("Select * from tb_redi")->result();
		return $redi;
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
	
	public function getOtrosRed($red)
	{
		return $this->db->query("Select * from tb_redi where id_redi NOT IN ($red)")->result();
	}
	
	public function getOtrosEst($est)
	{
		return $this->db->query("Select * from tb_estado where id_estado NOT IN ($est)")->result();
	}
	
	public function getOtrosMun($mun)
	{
		return $this->db->query("Select * from tb_municipio where id_municipio NOT IN ($mun)")->result();
	}
	
	public function getOtrosPar($par)
	{
		return $this->db->query("Select * from tb_parroquia where id_parroquia NOT IN ($par)")->result();

	}
	
	public function reporteGeneral()
	{
	
        $get=  $this->db->query("SELECT per.id_persona,
										per.direccion,
										per.nombre_apellido,
										per.cedula,
										per.nacionalidad,
										per.edad,
										per.sexo,
										per.fecha_nacimiento,
										per.num_hijos,
										per.etnia,
										per.domina_idioma,
										per.discapacidad,
										per.estado_civil,
										per.tel_local,
										per.tel_celular,
										per.email,
										per.nivel_instruccion,
										per.estudia_act,
										per.nombre_inst,
										per.grado,
										per.tipo_inst,
										per.estudia_mision,
										per.gustaria_estudiar,
										per.participa_org_mujeres,
										per.anios_militancia,
										per.responsabilidad,
										per.participa_part_politico,
										per.anios_militancia_pp,
										per.responsabilidad_pp,
										per.concejo_comunal,
										per.voceria_cc,
										per.comuna_cc,
										per.status,
										per.id_redi,
										per.id_estado,
										per.id_municipio,
										per.id_parroquia,
										red.nombre as redi,
										est.nombre as estado,
										mun.nombre as municipio,
										par.nombre as parroquia,
										gen.institucion_labora,
										gen.cargo as cargoTrab,
										gen.telefono as telTrab,
										gen.email as emailTrab,
										mmdb.beneficiaria,
										mmdb.comite,
										mmdb.responsabilidad as respmmdb,
										mmdb.proy_socio_productivo,
										mmdb.frente_comites
									FROM tb_persona per
									INNER JOIN tb_redi red
									ON red.id_redi = per.id_redi
									INNER JOIN tb_estado est
									ON est.id_estado = per.id_estado
									INNER JOIN tb_municipio mun
									ON mun.id_municipio = per.id_municipio
									INNER JOIN tb_parroquia par
									ON par.id_parroquia = per.id_parroquia
									LEFT JOIN tb_general gen
									ON gen.id_persona = per.id_persona
									LEFT JOIN tb_mmdb mmdb
									ON mmdb.id_persona = per.id_persona")->result();
		
		$body = array();
		foreach($get as $row){
		
			$newDatos = explode("-",$row->fecha_nacimiento);
			$fecha = $newDatos[2]."-".$newDatos[1]."-".$newDatos[0];
		
			$arrayref=array(
				$row->nombre_apellido,
				$row->cedula,
				$row->edad,
				$row->sexo,
				$row->nacionalidad,
				$fecha,
				$row->num_hijos,
				$row->etnia,
				$row->discapacidad,
				$row->estado_civil,
				$row->tel_local,
				$row->tel_celular,
				$row->email,
				$row->nivel_instruccion,
				$row->redi,
				$row->estado,
				$row->municipio,
				$row->parroquia
			);
			
			array_push($body, $arrayref);
		
		}
		
		return $body;
    }
	
    public function addAuditoria($data)
    {
        $this->db->insert('tb_auditoria', $data);
        return $this->db->insert_id();
    }
	
}