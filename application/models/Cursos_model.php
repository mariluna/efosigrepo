<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cursos_model extends CI_Model
{
    public $table = 'tb_curso';

    public function get_all()
    {
      
		$r=$this->ion_auth->user()->row();
        $rol = $this->ion_auth->get_users_groups()->row();
        //print_r($rol);

			if($r == null){
		
				$getcursos = $this->db->query("SELECT DISTINCT a.*, b.nro_participantes AS inscritos, e.nombre as estado, e.id_estado
											FROM tb_curso a
											INNER JOIN tr_curso_participantes b 
											ON a.id_curso = b.id_curso
											INNER JOIN tb_estado e 
											ON e.id_estado = b.id_estado
											ORDER BY a.status DESC")->result();
			} else {
		
                $query = $this->db->query("SELECT id_estado FROM tb_persona WHERE id_persona = $r->persona_id")->row();

                if(($query->id_estado == 24) AND ($rol->id == 1)){

                    $getcursos = $this->db->query("SELECT DISTINCT a.*, b.nro_participantes AS inscritos, e.nombre as estado, e.id_estado
                                                    FROM tb_curso a
                                                    INNER JOIN tr_curso_participantes b
                                                    ON a.id_curso = b.id_curso
                                                    INNER JOIN tb_estado e
                                                    ON e.id_estado = b.id_estado
                                                    ORDER BY a.status DESC")->result();
                } else {

                    $getcursos = $this->db->query("SELECT DISTINCT a.*, b.nro_participantes AS inscritos, e.nombre as estado, e.id_estado
                                                    FROM tb_curso a
                                                    INNER JOIN tr_curso_participantes b
                                                    ON a.id_curso = b.id_curso
                                                    INNER JOIN tb_estado e
                                                    ON e.id_estado = b.id_estado
                                                    WHERE e.id_estado = $query->id_estado
                                                    ORDER BY a.status DESC")->result();
											  
			}
		}
		
		return $getcursos;
    }
	
public function getCursoFac($facid)
    {
      
		$getcursos = $this->db->query("SELECT DISTINCT a.*, b.nro_participantes AS inscritos, e.nombre as estado, e.id_estado
											FROM tb_curso a
											INNER JOIN tr_curso_participantes b 
											ON a.id_curso = b.id_curso
											INNER JOIN tb_estado e 
											ON e.id_estado = b.id_estado
											INNER JOIN tr_curso_estado ce 
											ON e.id_estado = ce.estado_id
											WHERE ce.facilitador = $facid
											ORDER BY a.status DESC")->result();
	
		return $getcursos;
    }

    public function get($id,$est)
    {
    	$get=  $this->db->query("SELECT DISTINCT a.*, b.nombre as estado, b.id_estado, c.id as rel
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE a.id_curso = $id AND b.nombre = '$est'")->row();
								
		if ($get == null){
			
			$get = "Error";
			return $get;		
		
		}else{
		
			return $get;
			
		}

    }
	
    public function getForAudit($id,$est)
    {
    	$get=  $this->db->query("SELECT DISTINCT a.*, b.nombre as estado, b.id_estado, c.id as rel
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE a.id_curso = $id AND b.id_estado = $est")->row();
								
		if ($get == null){
			
			$get = "Error";
			return $get;		
		
		}else{
		
			return $get;
			
		}

    }

    public function delete($id,$est)
    {
       // print_r($id);
        $totalCursos = $this->db->query("select count(curso_id) as totalcursos from tr_curso_estado where curso_id = $id ")->row();
        $idEstado = $this->db->query("select id_estado from tb_estado where nombre ='$est'")->row();
		//print_r($totalCursos->totalcursos);die();
        if($totalCursos->totalcursos >= 2){
            
            $this->db->where(array('id_curso' => $id, 'id_estado' => $idEstado->id_estado))->delete("tr_persona_curso");
            $this->db->where(array('id_curso' => $id, 'id_estado' => $idEstado->id_estado))->delete("tr_curso_participantes");
			$this->db->where(array('curso_id' => $id, 'estado_id' => $idEstado->id_estado))->delete("tr_curso_estado");
            return $this->db->affected_rows();
        }elseif($totalCursos->totalcursos == 1){
            
            $this->db->where(array('id_curso' => $id, 'id_estado' => $idEstado->id_estado))->delete("tr_persona_curso");
            $this->db->where(array('id_curso' => $id, 'id_estado' => $idEstado->id_estado))->delete("tr_curso_participantes");
			$this->db->where(array('curso_id' => $id, 'estado_id' => $idEstado->id_estado))->delete("tr_curso_estado");
            $this->db->where('id_curso', $id)->delete($this->table);
            return $this->db->affected_rows();
        }
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->query("SELECT id_curso FROM tb_curso WHERE nombre = '$data[nombre]' AND duracion = '$data[duracion]' AND nro_participantes = '$data[nro_participantes]'")->row();
		return $id->id_curso;
	}
	
    public function addAsistencia($data)
    {
        $this->db->insert("tb_asistencia", $data);
        return $this->db->insert_id();
	}

     public function update($id, $data)
    {
        return $this->db->where('id_curso', $id)->update($this->table, $data);
    }
	
	public function getEstado()
    {
        return $this->db->get('tb_estado')->result();
    }
	
	public function getFacilitadores()
    {
        return $this->db->query("SELECT  nombre_apellido,
										 id_persona 
							    FROM users a
								INNER JOIN tb_persona b ON a.persona_id = b.id_persona
								INNER JOIN users_groups c ON c.user_id = a.id
								INNER JOIN groups d ON d.id = c.group_id
								WHERE d.id = 3")->result();
    }
	
	public function getEstadoEdit($id)
    {
        return $this->db->query("select * from tb_estado where id_estado != $id")->result();
    }
	
	public function getCursoSel($estid)
    {
        return $this->db->query("select c.* from tb_curso c 
								inner join tr_curso_estado ce
								on ce.curso_id = c.id_curso
								where ce.estado_id =  $estid")->result();
    }
	
	public function getEstadoForEdit($id)
	{
		return $this->db->query("select nombre from tb_estado where id_estado = $id")->row();
	}
	
	public function getFacEdit($id)
    {
        return $this->db->query("SELECT  nombre_apellido,
										 id_persona 
							    FROM users a
								INNER JOIN tb_persona b ON a.persona_id = b.id_persona
								INNER JOIN users_groups c ON c.user_id = a.id
								INNER JOIN groups d ON d.id = c.group_id
								WHERE d.id = 3
								AND b.id_persona != $id")->result();
    }
	
	public function getFacForEdit($id)
	{
		return $this->db->query("SELECT  nombre_apellido,
										 id_persona 
							    FROM users a
								INNER JOIN tb_persona b ON a.persona_id = b.id_persona
								INNER JOIN users_groups c ON c.user_id = a.id
								INNER JOIN groups d ON d.id = c.group_id
								WHERE d.id = 3
								AND b.id_persona = $id")->row();
	}
	
	public function getCursoName($id)
	{
		return $this->db->query("select nombre from tb_curso where id_curso = $id")->row();
	}
	
	public function get_inscritos($curso, $est)
	{
		return $this->db->query("select * from tb_persona p
								inner join tr_persona_curso pc on p.id_persona = pc.id_persona
								where pc.id_curso = $curso
								and pc.id_estado = $est")->result();
	}
	
	public function registrarPersonaCurso($cursoid, $userid, $estid)
	{
		$checkDisp = $this->db->query("SELECT id_curso, id_persona 
									   FROM tr_persona_curso 
									   WHERE id_curso = $cursoid
									   AND id_persona = $userid
									   AND id_estado = $estid")->row();
									   
		if ($checkDisp == null){
		
			$data = array(
			
				'id_curso' => $cursoid,
				'id_persona' => $userid,
				'id_estado' => $estid
			
			);
			
			$this->db->insert('tr_persona_curso', $data);
			
			$msg = "true";
		
		}else{
		
			$msg = "false";
			
		}	
		
		return $msg;
	}
	
	public function checkCursoData($part, $ins, $cursoid, $estid)
	{
		$check = $this->db->query("SELECT a.id_curso, a.nro_participantes, b.nro_participantes AS inscritos, b.id_estado
									FROM tb_curso a
									INNER JOIN tr_curso_participantes b 
									ON a.id_curso = b.id_curso
									WHERE b.nro_participantes = $ins
									AND a.id_curso = $cursoid
									AND b.id_estado = $estid")->row();
				
		if ($check == null){
		
			$msg = "false";
		
		}else{
		
			$msg = "true";
			
		}
		
		return $msg;
							
	}
	
	public function addCursoEstado($data)
    {
        $this->db->insert_batch('tr_curso_estado', $data);
        return $this->db->insert_id();
    }
	
	public function setCursoPart($data)
    {
        $this->db->insert_batch('tr_curso_participantes', $data);
        return $this->db->insert_id();
    }
	
	public function updateCursoEstado($curso,$prev,$estado)
    {
        $this->db->query("UPDATE tr_curso_estado SET estado_id = $estado WHERE curso_id = $curso AND estado_id = $prev");
		$this->db->query("UPDATE tr_curso_participantes SET id_estado = $estado WHERE id_curso = $curso AND id_estado = $prev");
		return $this->db->affected_rows();
    }
	
	public function addPersonaAsis($data)
    {
        $this->db->insert_batch('tr_persona_asistencia', $data);
        return $this->db->insert_id();
    }
	
	public function reporteGeneral($array)
	{
	
        $this->db->distinct();
        $this->db->select('asis.horas_impartidas, asis.fecha_asistencia');
        $this->db->select('pers.nombre_apellido, pers.cedula, pers.edad, pers.sexo');
        //$this->db->select('curs.nombre AS curso');
        //$this->db->select('esta.nombre AS estado');

        // Froms e Inners
        $this->db->from('tb_asistencia AS asis');
        $this->db->join('tr_persona_asistencia AS trpa', 'trpa.asistencia_id = asis.id');
        $this->db->join('tb_persona AS pers', 'trpa.persona_id = pers.id_persona');
        $this->db->join('tb_curso AS curs', 'asis.curso_id = curs.id_curso');
        $this->db->join('tb_estado AS esta', 'asis.estado_id = esta.id_estado');

        if (!empty($array['ini'])) {
            $this->db->where('asis.fecha_asistencia >=', $array['ini']);
        }

        if (!empty($array['fin'])) {
            $this->db->where('asis.fecha_asistencia <=', $array['fin']);
        }

        if (!empty($array['curso'])) {
            $this->db->where('asis.curso_id', $array['curso']);
        }

        if (!empty($array['estado'])) {
            $this->db->where('asis.estado_id', $array['estado']);
        }

        $this->db->order_by('asis.fecha_asistencia', 'asc');
        $data = $this->db->get()->result();
		
		$body = array();
		foreach($data as $row){
		
			$newDatos = explode("-",$row->fecha_asistencia);
			$fecha = $newDatos[2]."-".$newDatos[1]."-".$newDatos[0];
		
			$arrayref=array(
				$row->nombre_apellido,
				$row->cedula,
				$row->edad,
				$row->sexo,
				$fecha,
				$row->horas_impartidas
			);
			
			array_push($body, $arrayref);
		
		}
		
		return $body;
    }
	
	public function reporteDetallado($array)
	{
	
        $this->db->distinct();
        $this->db->select('asis.horas_impartidas, asis.fecha_asistencia');
        $this->db->select('pers.nombre_apellido, pers.cedula, pers.edad, pers.sexo');
        $this->db->select('curs.nombre AS curso');
        //$this->db->select('esta.nombre AS estado');

        // Froms e Inners
        $this->db->from('tb_asistencia AS asis');
        $this->db->join('tr_persona_asistencia AS trpa', 'trpa.asistencia_id = asis.id');
        $this->db->join('tb_persona AS pers', 'trpa.persona_id = pers.id_persona');
        $this->db->join('tb_curso AS curs', 'asis.curso_id = curs.id_curso');
        $this->db->join('tb_estado AS esta', 'asis.estado_id = esta.id_estado');

        if (!empty($array['ini'])) {
            $this->db->where('asis.fecha_asistencia >=', $array['ini']);
        }

        if (!empty($array['fin'])) {
            $this->db->where('asis.fecha_asistencia <=', $array['fin']);
        }

        if (!empty($array['curso'])) {
            $this->db->where('asis.curso_id', $array['curso']);
        }

        if (!empty($array['estado'])) {
            $this->db->where('asis.estado_id', $array['estado']);
        }

        $this->db->order_by('asis.fecha_asistencia', 'asc');
        $data = $this->db->get()->result();
		
		$body = array();
		foreach($data as $row){
		
			$newDatos = explode("-",$row->fecha_asistencia);
			$fecha = $newDatos[2]."-".$newDatos[1]."-".$newDatos[0];
		
			$arrayref=array(
				$row->nombre_apellido,
				$row->cedula,
				$row->edad,
				$row->sexo,
				$row->curso,
				$fecha,
				$row->horas_impartidas
			);
			
			array_push($body, $arrayref);
		
		}
		
		return $body;
    }

    public function checkCursoDate()
    {
        $cursos = $this->db->query("SELECT * FROM tb_curso")->result();
		$today = date("Y-m-d");
		
		foreach($cursos as $row){
		
			if($row->fecha_fin <= $today){
			
				$this->db->query("UPDATE tb_curso SET status = 0 WHERE id_curso = $row->id_curso");
			
			} else {
			
				$this->db->query("UPDATE tb_curso SET status = 1 WHERE id_curso = $row->id_curso");
			
			}
		
		}
		return $this->db->affected_rows();
	}
	
    public function getforaudiUpdate($id,$est)
    {
    	$get=  $this->db->query("SELECT DISTINCT a.*, b.nombre as estado, b.id_estado, c.id as rel
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE a.id_curso = $id AND b.id_estado = '$est'")->row();
								
		if ($get == null){
			
			$get = "Error";
			return $get;		
		
		}else{
		
			return $get;
			
		}

    }

    public function getforaudidelete($id)
    {
    	$get=  $this->db->query("SELECT DISTINCT a.*, b.nombre as estado, b.id_estado, c.id as rel
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE a.id_curso = $id")->row();
								
		if ($get == null){
			
			$get = "Error";
			return $get;		
		
		}else{
		
			return $get;
			
		}

    }

	public function addAuditoria($data)
    {
        $this->db->insert('tb_auditoria', $data);
        return $this->db->insert_id();
    }
	
	public function getFacilitadorFrom($est)
	{
		return $this->db->query("SELECT  nombre_apellido,
										 id_persona 
							    FROM users a
								INNER JOIN tb_persona b ON a.persona_id = b.id_persona
								INNER JOIN users_groups c ON c.user_id = a.id
								INNER JOIN groups d ON d.id = c.group_id
								WHERE d.id = 3
								AND b.id_estado = $est")->result();
	}
}