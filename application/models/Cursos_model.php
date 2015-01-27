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

}