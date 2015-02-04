<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'libraries/REST_Controller.php');

class Cursos_api extends REST_Controller{

        public function __construct()
    {
        parent::__construct();

        $this->load->model('cursos_model');
    }

    function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('cursos/'.$name_view.'', $data);
		$this->load->view('footer');

	}

    public function index_get()
	{
        $this->response($this->db->query('SELECT DISTINCT a.*, b.nro_participantes AS inscritos, d.nombre as estado
										  FROM tb_curso a
 										  INNER JOIN tr_curso_participantes b 
										  ON a.id_curso = b.id_curso
										  INNER JOIN tr_curso_estado c
										  ON a.id_curso = c.curso_id
										  INNER JOIN tb_estado d 
										  ON c.estado_id = d.id_estado')->result()
						);
    }

    public function show_get($id)
	{
		$f=$this->response($this->cursos_model->get($id));

		$this->load->view('header');
		$this->load->view('cursos/ver', $f);
		$this->load->view('footer');

	}

	public function remove_delete($id = NULL)
	{
		if ($this->cursos_model->delete($id))
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
		
		$data=array(
			'nombre'=>$this->post("nombre"),
			'duracion'=>$this->post("duracion"),
			'nro_participantes'=>$this->post("participantes"),
			'status'=>1
		 );

		$cursoId = $this->cursos_model->add($data);
		
		$estadosCurso = array();
		
		foreach ($_POST['estado'] as $estado) {
				
				$datainsert = array(

					'curso_id' => $cursoId,
					'estado_id' => $estado,

				);

				array_push($estadosCurso, $datainsert);
			
			}
		
		$this->cursos_model->addCursoEstado($estadosCurso);
		
		
		redirect(base_url().'Cursos');

	}

	public function update_post()
	{
		$data=array(
			'nombre'=>$this->post("nombre"),
			'duracion'=>$this->post("duracion"),
			'nro_participantes'=>$this->post("participantes"),
			'id_estado'=>$this->post("estado"),
			'status'=>$this->post("estatus")
		 );

		$this->cursos_model->update($this->post("id"),$data);

		redirect(base_url().'Cursos');


	}
}