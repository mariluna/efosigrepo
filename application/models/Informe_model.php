<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informe_model extends CI_Model
{
    public $table = 'tb_informe';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get($id)
    {
    	$get=  $this->db->where('id_informe', $id)->get($this->table)->row();
        return $get;

    }

    public function delete($id)
    {
        print_r($id);
        $this->db->where('id_informe', $id)->delete($this->table);
        return $this->db->affected_rows();
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


