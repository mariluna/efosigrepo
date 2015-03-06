<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evaluacion_model extends CI_Model
{
    public $table = 'tr_escalas_evaluacion';
	public $table2 ='tb_evaluacion';
	public $table3 ='tb_escalas';

    public function getForm()
    {
    	$get=$this->db->get($this->table2)->result();
        return $get;
    }
	
	public function getEscalas()
    {
    	$get=$this->db->get($this->table3)->result();
        return $get;
    }
	
	public function getCursos()
    {
		$r=$this->ion_auth->user()->row();	
		if($r != null)
		{	
			$query = $this->db->query("SELECT id_estado FROM tb_persona WHERE id_persona = $r->persona_id")->row();  
			if($query->id_estado == 24){
				$getcursos = $this->db->query("SELECT a.id_curso, a.nombre, c.nro_participantes AS total,
													(SELECT Count (*) FROM (SELECT id_persona,id_curso, COUNT(1) 
													FROM tr_escalas_evaluacion 
													WHERE id_curso =a.id_curso
													GROUP BY id_persona,id_curso 
													HAVING COUNT(1)>=10) as mas) as lleno
											FROM tb_curso a 
											INNER JOIN tr_curso_participantes c 
											ON a.id_curso = c.id_curso")->result();
			} else {			
				$getcursos = $this->db->query("SELECT a.id_curso, a.nombre, b.estado_id , c.nro_participantes AS total,
													(SELECT Count (*) FROM (SELECT id_persona,id_curso, COUNT(1) 
													FROM tr_escalas_evaluacion 
													WHERE id_curso =a.id_curso
													GROUP BY id_persona,id_curso 
													HAVING COUNT(1)>=10) as mas) as lleno
											FROM tb_curso a
											INNER JOIN tr_curso_estado b 
											ON a.id_curso = b.curso_id
											INNER JOIN tr_curso_participantes c 
											ON a.id_curso = c.id_curso
											WHERE b.estado_id = $query->id_estado")->result();
			}
		}
		else
		{
			$getcursos = $this->db->query("SELECT DISTINCT a.id_curso, a.nombre 
											FROM tb_curso a inner join tr_persona_curso b on b.id_persona = $r->persona_id 
											WHERE  b.id_persona NOT IN (select id_persona FROM tr_escalas_evaluacion where id_curso= a.id_curso)");
		}
		return $getcursos;
    }
	
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }	
	
	public function reporteGeneral($id_curso)
	{
	
        $data = $this->db->query("SELECT a.descripcion, c.descripcion as descripciones,
			(SELECT count(*) FROM tr_escalas_evaluacion WHERE id_curso=$id_curso AND id_pregunta=c.id_escala) as cuenta 
			FROM tb_evaluacion a , tb_escalas c")->result();

		$body = array();
		foreach($data as $row){
		
			$arrayref=array(
				$row->descripcion,
				$row->descripciones,
				$row->cuenta
			);
			array_push($body, $arrayref);
		}
		return $body;
    }
}