<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Divulgaciones_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('divulgaciones_model');
    }

    function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('divulgaciones/'.$name_view.'', $data);
		$this->load->view('footer');

	}

    public function index_get(){

        $this->response($this->divulgaciones_model->get_all());
		//($this->db->get('tb_divulgacion')->result());

    }

    public function show_get($id)
	{
		$f=$this->response($this->divulgaciones_model->get($id));
		$this->load->view('header');
		$this->load->view('divulgaciones/ver', $f);
		$this->load->view('footer');
	}

	public function remove_delete($id = NULL)
	{
		$this->load->model('divulgaciones_model');
		if ($this->divulgaciones_model->delete($id))
		{
			$this->response(array('status' => true, 'message' => sprintf('Project #%d has been deleted.', $id)), 200);
		}
		else
		{
			$this->response(array('status' => false, 'error_message' => 'This project does not exist!'), 404);
		}
	}

	public function save_post()
	{
		$values = array_map(null, 
							$this->post('emisoras'), 
							$this->post('dial'), 
							$this->post('horaR'), 
							$this->post('tipDiv'), 
							$this->post('nombreTv'),
							$this->post('canal'),
							$this->post('horatv'), 
							$this->post('tipDivTv'), 
							$this->post('nombrePrensa'), 
							$this->post('fecha'), 
							$this->post('tipDivPrensa'),
							$this->post('tipDivPrensaSel')
							);
							
		$array = array();
		$div = array();

        $radio = array();
		$tv	 = array();
		$prensa = array();
	
		$this->db->trans_start();
        foreach ($values as $value) {

			if((!empty($value[0])) and (!empty($value[1])) and (!empty($value[2])) and (!empty($value[3]))){
            $radioinsert = array(

                'tipo_divulgacion_radio' => $value[3],
                'emisora' => $value[0],
                'hora' => $value[2],
				'dial' => $value[1]
            );
						
				$tipo_radio = $this->divulgaciones_model->addNewRadio($radioinsert);
			
			}else{
			
				$tipo_radio = null;
			
			}

			if((!empty($value[8])) and (!empty($value[9])) and (!empty($value[11]))){
			$prensainsert = array(

                'nombre_prensa' => $value[8],
                'fecha_prensa' => $value[9],
                'tipo_divulgacion_prensa' => $value[11]
            );
				$tipo_prensa = $this->divulgaciones_model->addNewPrensa($prensainsert);
			
			}else{
			
				$tipo_prensa = null;
			
			}
			
			if((!empty($value[4])) and (!empty($value[5])) and (!empty($value[6])) and (!empty($value[7]))){
			$tvinsert = array(

				'nombre_programa' => $value[4],
				'canal' => $value[5],
                'tipo_divulgacion_tv' => $value[7],
				'hora_emision' => $value[6]
                
            );			
				$tipo_tv = $this->divulgaciones_model->addNewTv($tvinsert);
			
			}else{
			
				$tipo_tv = null;
			
			}
			
			$arreglo = array(
				
				'id_curso' => $this->post('curso'),
				'tipo_divulgacion_radio' => $tipo_radio,
				'tipo_divulgacion_tv' => $tipo_tv,
				'tipo_divulgacion_prensa' => $tipo_prensa,
				'fecha_actual' => date("Y-m-d H:i:s")
			
			);
			array_push($div, $arreglo);
			
			}

		$this->divulgaciones_model->add($div);
		$this->db->trans_complete();
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> Las divulgaciones fueron registradas de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect(base_url().'Divulgaciones');
	}

	public function updateRadio_post()
	{
		$data=array(
			'tipo_divulgacion_radio'=>$this->post("tipDiv"),
			'emisora'=>$this->post("emisora"),
			'hora'=>$this->post("horaR"),
			'dial'=>$this->post("dial")
		 );
		$id=$this->post("id");
		$this->db->trans_start();
		$this->divulgaciones_model->updateRadio($id,$data);
		$this->db->trans_complete();
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> La divulgaci&oacute;n fue modificada de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');

		redirect(base_url().'Divulgaciones');

	}

	public function updatePrensa_post()
	{
		$data=array(
			'nombre_prensa'=>$this->post("nombrePrensa"),
			'fecha_prensa'=>$this->post("fecha"),
			'tipo_divulgacion_prensa'=>$this->post("tipDivPrensaSel")
		 );
		$id=$this->post("id");
		$this->db->trans_start();
		$this->divulgaciones_model->updatePrensa($id,$data);
		$this->db->trans_complete();
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> La divulgaci&oacute;n fue modificada de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect(base_url().'Divulgaciones');

	}
	
	public function updateTv_post()
	{
		$data=array(
			'nombre_programa'=>$this->post("nombreTv"),
			'canal'=>$this->post("canal"),
			'tipo_divulgacion_tv'=>$this->post("tipDivTv"),
			'hora_emision'=>$this->post("horatv")
		 );
		 
		$id=$this->post("id");
		$this->db->trans_start();
		$this->divulgaciones_model->updateTv($id,$data);
		$this->db->trans_complete();
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> La divulgaci&oacute;n fue modificada de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		redirect(base_url().'Divulgaciones');

	}
	
    public function getRadiojs_get()
    {
        $radio = $this->divulgaciones_model->getRadio();
        $html = '<option value="" selected="selected">Seleccione...</option>';
        foreach ($radio as $data) {
            $html .= "<option value='$data->id_tipo_divulgacion'>$data->nombre</option>";
        }
        echo $html;
    }
	
    public function getTvjs_get()
    {
        $tv = $this->divulgaciones_model->getTv();
        $html = '<option value="" selected="selected">Seleccione...</option>';
        foreach ($tv as $data) {
            $html .= "<option value='$data->id_tipo_divulgacion'>$data->nombre</option>";
        }
        echo $html;
    }
	
    public function getPrensa_post()
    {
        $tv = $this->divulgaciones_model->getPrensa($_POST['prensa']);
        $html = '<option value="" selected="selected">Seleccione...</option>';
        foreach ($tv as $data) {
            $html .= "<option value='$data->id_tipo_divulgacion'>$data->nombre</option>";
        }
        echo $html;
    }
}