<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agendas_model extends CI_Model
{
    public $table = 'tb_actividad';

    public function get_all($idUser)
    {
        return $this->db->query("SELECT t1.id_actividad,
							   t1.id_usuario,
							   t2.first_name || ' ' || t2.last_name as name,
							   t1.titulo, 
							   t1.fecha
							   FROM tb_actividad t1
							   INNER JOIN users t2 ON t1.id_usuario = t2.id WHERE  t1.id_usuario IN (1, $idUser) ")->result();//get($this->table)->result();
    }
	
	

    public function get($idActividad)
    {
    	$get =  $this->db->query("SELECT t1.id_actividad,
							   t1.id_usuario,
							   t2.first_name || ' ' || t2.last_name as name,
							   t1.titulo,
								t1.descripcion,							   
							    to_char(t1.fecha,'DD-MM-YYYY') as fecha
							   FROM tb_actividad t1
							   INNER JOIN users t2 ON t1.id_usuario = t2.id WHERE t1.id_actividad = $idActividad")->result();//where('id_divulgacion', $id)->get($this->table)->row();
	
        return $get;
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM tb_actividad WHERE id_actividad = $id");//where('id_divulgacion', $id)->delete($this->table);
        return $this->db->affected_rows();
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

     public function update($id, $data)
    {
	print_r($id);
	print_r($data);
        return $this->db->where('id_actividad', $id)->update($this->table, $data);
    }

}