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
		var_dump($id);
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
		/*$values = array_map(null, 
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
							);*/

		$arrRadio = array_map(null,
							  $this->post('emisoras'),
							  $this->post('dial'),
							  $this->post('horaR'),
							  $this->post('tipDiv')
							  );
		$arrTv = array_map(null,
							  $this->post('nombreTv'),
							  $this->post('canal'),
							  $this->post('horatv'),
							  $this->post('tipDivTv')
							  );
		$arrPrensa= array_map (null, 
							  $this->post('nombrePrensa'),
							  $this->post('fecha'),
							  $this->post('tipDivPrensa'),
							  $this->post('tipDivPrensaSel')
							  );
							  
        $array = array();

       /* foreach ($values as $value) {

            $datainsert = array(

                'id_curso' => $this->post('curso'),
                'tipo_divulgacion_radio' => $value[3],
                'nombre_radio' => null,
                'fecha_actual' => date("Y-m-d"),
                'emisoras' => $value[0],
                'dial' => $value[1],
                'hora_radio' => $value[2],
				'canal' => $value[5],
                'hora_tv' => $value[6],
                'tipo_divulgacion_tv' => $value[7],
                'nombre_tv' => $value[4],
                'prensa' => $value[8],
                'fecha_prensa' => $value[9],
                'tipo_divulgacion_prensa' => $value[10]
            );
			array_push($array, $datainsert);
			
		}*/
		
		foreach ($arrRadio as $radio){
				$radioInsert = array(
				'id_tipo_divulgacion' => $radio[3],
                'nombre' => $radio[0],
                //'emisora' => $radio[0],
                'dial' => $radio[1],
                'fecha_emision' => $radio[2],
				);
				array_push($array, $radioInsert);
			}
		
		foreach ($arrTv as $tele){
				$teleInsert = array(
				'nombre_programa' => $tele[0],
                'canal' => $tele[1],
                //'emisora' => $radio[0],
                'hora_emision' => $tele[2],
                'tipo_divulgacion' => $tele[3],
				);
				array_push($array, $teleInsert);
			}
            
		foreach ($arrPrensa as $prensa){
				$prensaInsert = array(
				'nombre' => $prensa[0],
                'canal' => $prensa[1],
                //'emisora' => $radio[0],
                'hora_emision' => $prensa[2],
                'tipo_divulgacion' => $prensa[3],
				);
				array_push($array, $prensaInsert);
			}	
			echo"<pre> AQUIIIII -- >";print_r($arrPrensa);echo"</pre>";
	
		$this->divulgaciones_model->add($array);

		redirect(base_url().'Divulgaciones');

	}

	public function update_post()
	{
		$data=array(
			'nombre'=>$this->post("nombre"),
			'cuenta'=>$this->post("cuenta"),
			'observaciones'=>$this->post("observaciones"),
			'fecha_actualizacion'=>date("Y-m-d H:i:s")
		 );
		$id=$this->post("id");

		$this->bancos_model->update($id,$data);

		redirect(base_url().'Entidades_bancarias');


	}
}