<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividades_model extends CI_Model
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
							   t1.fecha
							   FROM tb_actividad t1
							   INNER JOIN users t2 ON t1.id_usuario = t2.id WHERE t1.id_actividad = $idActividad")->result();//where('id_divulgacion', $id)->get($this->table)->row();
	
        return $get;
    }

    public function delete($id)
    {
        print_r($id);
        $this->db->query("DELETE FROM tb_actividad WHERE id_actividad = $id");//where('id_divulgacion', $id)->delete($this->table);
        return $this->db->affected_rows();
    }

    public function add($data)
    {
	print_r($data);
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

     public function update($id, $data)
    {
        return $this->db->where('id_actividad', $id)->update($this->table, $data);
    }
	
	public function getCurso()
	{
		$get = $this->db->query("SELECT id_curso, nombre FROM tb_curso WHERE id_curso NOT IN (SELECT DISTINCT id_curso FROM tb_divulgacion)")->result();
		return $get;
	}

}