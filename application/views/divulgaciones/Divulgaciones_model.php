<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divulgaciones_model extends CI_Model
{
    public $table = 'tb_divulgacion';

    public function get_all()
    {
        return $this->db->query("SELECT a.id_divulgacion, 
										count(dr.id_divulgacion_radio) as rad,
										count(dp.id_divulgacion_prensa) as pre,
										count(dt.id_divulgacion_tv) as tv,
										b.id_curso, 
										b.nombre
									FROM tb_divulgacion a 
									INNER JOIN tb_curso b ON a.id_curso = b.id_curso 
									LEFT JOIN tb_divulgacion_radio dr ON a.tipo_divulgacion_radio = dr.id_divulgacion_radio
									LEFT JOIN tb_divulgacion_tv dt ON a.tipo_divulgacion_tv = dt.id_divulgacion_tv
									LEFT JOIN tb_divulgacion_prensa dp ON a.tipo_divulgacion_prensa = dp.id_divulgacion_prensa
									group by b.nombre, b.id_curso, a.id_divulgacion")->result();
    }

    public function get($id)
    {
    	$get =  $this->db->query("SELECT  dr.*,
											dp.*,
											dt.*, 
											b.nombre 
										FROM tb_divulgacion a 
										INNER JOIN tb_curso b ON a.id_curso = b.id_curso 
										LEFT JOIN tb_divulgacion_radio dr ON a.tipo_divulgacion_radio = dr.id_divulgacion_radio
										LEFT JOIN tb_divulgacion_tv dt ON a.tipo_divulgacion_tv = dt.id_divulgacion_tv
										LEFT JOIN tb_divulgacion_prensa dp ON a.tipo_divulgacion_prensa = dp.id_divulgacion_prensa
										WHERE a.id_curso = $id")->result();

        return $get;
    }

    public function delete($id)
    {
		$get = $this->db->query("SELECT * FROM tb_divulgacion WHERE id_divulgacion = $id")->row();
		if($get->tipo_divulgacion_radio != null){
		$this->db->query("DELETE FROM tb_divulgacion_radio WHERE id_divulgacion_radio = $get->tipo_divulgacion_radio");
		}
		if($get->tipo_divulgacion_prensa != null){
		$this->db->query("DELETE FROM tb_divulgacion_prensa WHERE id_divulgacion_prensa = $get->tipo_divulgacion_prensa");
		}
		if($get->tipo_divulgacion_tv != null){
		$this->db->query("DELETE FROM tb_divulgacion_tv WHERE id_divulgacion_tv = $get->tipo_divulgacion_tv");
		}
		$this->db->query("DELETE FROM tb_divulgacion WHERE id_divulgacion = $id");
        return $this->db->affected_rows();
    }

    public function add($data)
    {
		//print_r($data);die();
        $this->db->insert_batch($this->table, $data);
        return $this->db->affected_rows();
    }

     public function updateRadio($id, $data)
    {
        return $this->db->where('id_divulgacion_radio', $id)->update('tb_divulgacion_radio', $data);
    }
	
     public function updatePrensa($id, $data)
    {
        return $this->db->where('id_divulgacion_prensa', $id)->update('tb_divulgacion_prensa', $data);
    }

     public function updateTv($id, $data)
    {
        return $this->db->where('id_divulgacion_tv', $id)->update('tb_divulgacion_tv', $data);
    }
	
	public function getCurso()
	{
		//$get = $this->db->query("SELECT id_curso, nombre FROM tb_curso WHERE id_curso NOT IN (SELECT DISTINCT id_curso FROM tb_divulgacion)")->result();
		$get = $this->db->query("SELECT id_curso, nombre FROM tb_curso")->result();
		return $get;
	}
	
	public function getradio()
	{
		$get = $this->db->query("SELECT id_tipo_divulgacion, nombre FROM tb_tipo_divulgacion WHERE medio = 'radio'")->result();
		return $get;
	}

	public function getTv()
	{
		$get = $this->db->query("SELECT id_tipo_divulgacion, nombre FROM tb_tipo_divulgacion WHERE medio = 'tv'")->result();
		return $get;
	}

	public function getPrensa($tipo)
	{
		$get = $this->db->query("SELECT id_tipo_divulgacion, nombre FROM tb_tipo_divulgacion WHERE medio = '$tipo'")->result();
		return $get;
	}
	
	 public function addDiv($data)
    {
        $this->db->insert_batch('tb_divulgacion', $data);
        return $this->db->affected_rows();
    }
	
    public function addNewRadio($data)
    {
        $this->db->insert("tb_divulgacion_radio", $data);
        return $this->db->insert_id();
	}

    public function addNewTv($data)
    {
        $this->db->insert("tb_divulgacion_tv", $data);
        return $this->db->insert_id();
	}

    public function addNewPrensa($data)
    {
        $this->db->insert("tb_divulgacion_prensa", $data);
        return $this->db->insert_id();
	}

    public function get_radio($id)
    {
    	$get =  $this->db->query("SELECT  a.*, b.nombre	
									FROM tb_divulgacion_radio a 
									INNER JOIN tb_tipo_divulgacion b on b.id_tipo_divulgacion = a.tipo_divulgacion_radio
									WHERE id_divulgacion_radio = $id")->row();

        return $get;
    }
	
    public function getOtrosRadios($id)
    {
    	$get =  $this->db->query("SELECT  * 
									FROM tb_tipo_divulgacion
									WHERE medio = 'radio'
									AND id_tipo_divulgacion NOT IN ($id)")->result();

        return $get;
    }
	
    public function get_prensa($id)
    {
    	$get =  $this->db->query("SELECT  a.*, b.nombre, b.medio
									FROM tb_divulgacion_prensa a 
									INNER JOIN tb_tipo_divulgacion b on b.id_tipo_divulgacion = a.tipo_divulgacion_prensa
									WHERE id_divulgacion_prensa = $id")->row();

        return $get;
    }
	
    public function getOtrosPrensa($id,$formato)
    {
    	$get =  $this->db->query("SELECT  * 
									FROM tb_tipo_divulgacion
									WHERE medio = '$formato'
									AND id_tipo_divulgacion NOT IN ($id)")->result();

        return $get;
    }
	
    public function get_tv($id)
    {
    	$get =  $this->db->query("SELECT  a.*, b.nombre, b.medio
									FROM tb_divulgacion_tv a 
									INNER JOIN tb_tipo_divulgacion b on b.id_tipo_divulgacion = a.tipo_divulgacion_tv
									WHERE id_divulgacion_tv = $id")->row();

        return $get;
    }
	
    public function getOtrosTv($id)
    {
    	$get =  $this->db->query("SELECT * 
									FROM tb_tipo_divulgacion
									WHERE medio = 'tv'
									AND id_tipo_divulgacion NOT IN ($id)")->result();

        return $get;
    }

    public function del_rad($id)
    {
        $this->db->query("DELETE FROM tb_divulgacion_radio WHERE id_divulgacion_radio = $id");//where('id_divulgacion', $id)->delete($this->table);
        $this->db->query("UPDATE tb_divulgacion SET tipo_divulgacion_radio = null WHERE tipo_divulgacion_radio = $id");
		return $this->db->affected_rows();
    }
	
    public function del_pre($id)
    {
        $this->db->query("DELETE FROM tb_divulgacion_prensa WHERE id_divulgacion_prensa = $id");//where('id_divulgacion', $id)->delete($this->table);
        $this->db->query("UPDATE tb_divulgacion SET tipo_divulgacion_prensa = null WHERE tipo_divulgacion_prensa = $id");
		return $this->db->affected_rows();
    }
	
    public function del_tv($id)
    {
        $this->db->query("DELETE FROM tb_divulgacion_tv WHERE id_divulgacion_tv = $id");//where('id_divulgacion', $id)->delete($this->table);
        $this->db->query("UPDATE tb_divulgacion SET tipo_divulgacion_tv = null WHERE tipo_divulgacion_tv = $id");
		return $this->db->affected_rows();
    }

	public function getInformeData($id)
    {
        $forpdf=  $this->db->query("SELECT
									dr.emisora,
									dr.dial,
									dr.hora,
									dp.nombre_prensa,
									dp.fecha_prensa,
									dp.tipo_divulgacion_prensa,
									dt.id_divulgacion_tv,
									dt.nombre_programa,
									dt.canal,
									dt.hora_emision,
									b.nombre as curso,
									a.fecha_actual,
									dr.tipo_divulgacion_radio,
									dt.tipo_divulgacion_tv
									FROM
									tb_divulgacion AS a
									INNER JOIN tb_curso AS b ON a.id_curso = b.id_curso
									LEFT JOIN tb_divulgacion_radio AS dr ON a.tipo_divulgacion_radio = dr.id_divulgacion_radio
									LEFT JOIN tb_divulgacion_tv AS dt ON a.tipo_divulgacion_tv = dt.id_divulgacion_tv
									LEFT JOIN tb_divulgacion_prensa AS dp ON a.tipo_divulgacion_prensa = dp.id_divulgacion_prensa
									WHERE
									a.id_curso = $id")->result();
										return $forpdf;
										
    }
}