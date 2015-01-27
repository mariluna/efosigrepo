<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bancos_model extends CI_Model
{
    public $table = 'bancos';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get($id)
    {
    	$get=  $this->db->where('id', $id)->get($this->table)->row();
        return $get;

    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->table);
        return $this->db->affected_rows();
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

     public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

}