<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divulgaciones_model extends CI_Model
{
    public $table = 'tb_divulgacion';

    public function get_all()
    {
        return $this->db->query("SELECT a.*, b.nombre FROM tb_divulgacion a INNER JOIN  tb_curso b ON a.id_curso = b.id_curso")->result();//get($this->table)->result();
    }

    public function get($id)
    {
    	$get =  $this->db->query("SELECT a.*, b.nombre FROM tb_divulgacion a INNER JOIN  tb_curso b ON a.id_curso = b.id_curso WHERE a.id_divulgacion = $id")->result();//where('id_divulgacion', $id)->get($this->table)->row();
	
        return $get;
    }

    public function delete($id)
    {
        print_r($id);
        $this->db->query("DELETE FROM tb_divulgacion WHERE id_divulgacion = $id");//where('id_divulgacion', $id)->delete($this->table);
        return $this->db->affected_rows();
    }

    public function add($data)
    {
	print_r($data);
        $this->db->query("INSERT INTO");//insert($this->table, $data);
        return $this->db->insert_id();
    }

     public function update($id, $data)
    {
        return $this->db->where('id_divulgacion', $id)->update($this->table, $data);
    }
	
	public function getCurso()
	{
		$get = $this->db->query("SELECT id_curso, nombre FROM tb_curso WHERE id_curso NOT IN (SELECT DISTINCT id_curso FROM tb_divulgacion)")->result();
		return $get;
	}
	
	 public function addDiv($data)
    {
        $this->db->insert_batch('tb_divulgacion', $data);
        return $this->db->affected_rows();
    }

}