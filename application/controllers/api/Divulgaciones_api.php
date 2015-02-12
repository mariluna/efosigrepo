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

        foreach ($values as $value) {

            $datainsert = array(

                'id_curso' => $this->post('curso'),
                'tipo_divulgacion_radio' => $value[3],
                'nombre_radio' => null,
                'fecha_actual' => date("Y-m-d"),
                'emisora' => $value[0],
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
			
			}
			
				
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