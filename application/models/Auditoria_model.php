<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auditoria_model extends CI_Model
{
    public $table = 'tb_auditoria';

    public function get_all()
    {
       return $this->db->query("SELECT  u.username, a.accion, a.fecha, a.tabla_afectada,
                                        a.campo_afectado,
                                        a.informacion_campo,
                                        a.id_auditoria
                                        FROM tb_auditoria as a
                                        inner join users as u
                                        on a.id_usuario=u.id")->result();//get($this->table)->result();
    }

    public function get($id_auditoria)
    {
				$get =  $this->db->query("SELECT  u.username, a.accion, a.fecha, a.tabla_afectada,
										a.campo_afectado,
										a.informacion_campo
										FROM tb_auditoria as a
										inner join users as u
										on a.id_usuario=u.id
										where id_auditoria= $id_auditoria")->row();//where('id_divulgacion', $id)->get($this->table)->row();
	
        return $get;

    }


    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


	public function getSelectedAuditoria($id)
    {
        return $this->db->query("select audi.* from tb_auditoria audi WHERE audi.id_auditoria = $id")->result();
    }


}


