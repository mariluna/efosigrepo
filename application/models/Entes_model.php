<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entes_model extends CI_Model
{
    public $table = 'ente';

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

    public function act($id)
    {
        $act=$this->db->query("update forma_pago set estatus=1::bit where id = $id");
        return $act;
    }

    public function deact($id)
    {
        $deact=$this->db->query("update forma_pago set estatus=0::bit where id = $id");
        return $deact;
    }

}