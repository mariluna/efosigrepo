<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persona_model extends CI_Model
{
    public $table = 'tb_persona';

    public function get_all()
    {
		$r=$this->ion_auth->user()->row();		
		$query=$this->db->query("SELECT id_estado FROM tb_persona WHERE id_persona=$r->user_id")->row();    
		$getpersona = $this->db->query("select * from tb_persona where id_estado = $query->id_estado")->result();
		return $getpersona;
    }

    public function get($id)
    {
    	$get=  $this->db->where('id', $id)->get($this->table)->row();
        return $get;

    }

    public function delete($id)
    {
        $this->db->where('id_persona', $id)->delete($this->table);
		$this->db->where('id_general',$id)->delete("tb_general");
        return $this->db->affected_rows();
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
	
	public function add_general($data)
	{
		$this->db->insert("tb_general", $data);
        return $this->db->insert_id();
	}

     public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
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
}