<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unidad_model extends CI_Model
{
    public $table = 'unidad_tributaria';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get($id)
    {
	$get=  $this->db->where('id', $id)->get($this->table)->row();
        return $get;

    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data)
    {

     $select=$this->db->query("select id from unidad_tributaria where valor=$data[valor] and fecha_actualizacion='$data[fecha_actualizacion]';")->row();
     $update=$this->db->query("update unidad_tributaria set activa=0::bit where id not in($select->id)");

    }

}

/* End of file Unidad_model.php */
/* Location: ./application/models/Unidad_model.php */
