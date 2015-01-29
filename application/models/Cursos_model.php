<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cursos_model extends CI_Model
{
    public $table = 'tb_curso';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get($id)
    {
    	$get=  $this->db->where('id_curso', $id)->get($this->table)->row();
        return $get;

    }

    public function delete($id)
    {
        print_r($id);
        $this->db->where('id_curso', $id)->delete($this->table);
        return $this->db->affected_rows();
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
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
	
	public function getEstadoEdit($id)
    {
        return $this->db->query("select * from tb_estado where id_estado != $id")->result();
    }
	
	public function getEstadoForEdit($id)
	{
		return $this->db->query("select nombre from tb_estado where id_estado = $id")->row();
	}
	
	public function registrarPersonaCurso($cursoid, $userid)
	{
		$checkDisp = $this->db->query("SELECT id_curso, id_persona 
									   FROM tr_persona_curso 
									   WHERE id_curso = $cursoid
									   AND id_persona = $userid")->row();
									   
		if ($checkDisp == null){
		
			$data = array(
			
				'id_curso' => $cursoid,
				'id_persona' => $userid	
			
			);
			
			$this->db->insert('tr_persona_curso', $data);
			
			$msg = "true";
		
		}else{
		
			$msg = "false";
			
		}	

		return $msg;
	}
	
	public function checkCursoData($part, $ins, $cursoid)
	{
		$check = $this->db->query("SELECT a.id_curso, a.nro_participantes, b.nro_participantes AS inscritos 
									FROM tb_curso a
									INNER JOIN tr_curso_participantes b 
									ON a.id_curso = b.id_curso
									WHERE a.nro_participantes = $part
									AND a.id_curso = $cursoid")->row();
				
		if ($check == null){
		
			$msg = "false";
		
		}else{
		
			$msg = "true";
			
		}
		
		return $msg;
									

	}
}