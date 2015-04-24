<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biblioteca_model extends CI_Model
{
    public $table = 'tb_biblioteca';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get($id)
    {
    	$get=  $this->db->where('id_biblioteca', $id)->get($this->table)->row();
        return $get;

    }

    public function delete($id)
    {
        print_r($id);
        $this->db->where('id_biblioteca', $id)->delete($this->table);
        return $this->db->affected_rows();
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

     public function update($id, $data)
    {
        return $this->db->where('id_biblioteca', $id)->update($this->table, $data);
    }
	
    public function addAuditoria($data)
    {
        $this->db->insert('tb_auditoria', $data);
        return $this->db->insert_id();
    }
	
}