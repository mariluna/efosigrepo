<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Informe extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$rol = $this->ion_auth->get_users_groups()->row();
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		
		if(($rol->id != 3) AND ($rol->id != 1)){
		redirect(base_url());
		}
		
	}
	function view($name_view,$data){
		$this->load->view('header');
		$this->load->view('informe/'.$name_view.'', $data);
		$this->load->view('footer');

	}

	public function index()
	{
		$name="index";
		$data=" ";
		$this->view($name,$data);
	}

	public function ver($id)
	{
		$this->load->model('informe_model');
		$name="ver";
		$get['data']=$this->informe_model->get($id);
		$this->view($name,$get);
	}
	public function agregar()
	{
		$name="agregar";
		$this->load->model('informe_model');
		$data['redi']=$this->informe_model->cargar_redi();
		$data['curso']=$this->informe_model->cargar_curso();
		$data['user'] = $r=$this->ion_auth->user()->row();
		$this->view($name,$data);
	}

	public function editar($id)
{
		$this->load->model('informe_model');
		$name="editar";
		$get['data'] = $this->informe_model->get($id);
		$get['cursosel'] = $this->informe_model->getSelectedCurso($id);
		$get['redisel'] = $this->informe_model->getSelectedRedi($id);
		$get['estadosel'] = $this->informe_model->getSelectedEstado($id);
		$get['municipiosel'] = $this->informe_model->getSelectedMunicipio($id);
		$get['parroquiasel'] = $this->informe_model->getSelectedParroquia($id);
		//print_r($get['cursosel'][0]->id_curso);
		$get['cursos'] = $this->informe_model->getOtrosCursos($get['cursosel'][0]->id_curso);
		$get['redis'] = $this->informe_model->getOtrosRedis($get['redisel'][0]->id_redi);
		$get['municipios'] = $this->informe_model->getOtrosMunicipios($get['municipiosel'][0]->id_municipio);
		$get['estados'] = $this->informe_model->getOtrosEstados($get['estadosel'][0]->id_estado);
		$get['parroquias'] = $this->informe_model->getOtrosParroquias($get['parroquiasel'][0]->id_parroquia);
		//print_r($get['cursos']);die();
		$this->view($name,$get);
	}
	
	public function estado($redi)
	{
		$this->load->model('Informe_model');
		$getEstado = $this->Informe_model->cargar_estado($redi);
		
		echo $getEstado;
	}
	
	public function municipio($estado)
	{
		$this->load->model('Informe_model');
		$getMunicipio = $this->Informe_model->cargar_municipio($estado);
		
		echo $getMunicipio;
	}
	
	public function parroquia($municipio)
	{
		$this->load->model('Informe_model');
		$getParroquia = $this->Informe_model->cargar_parroquia($municipio);
		
		echo $getParroquia;
	}
		
	function show_informe($id)
	{
		$this->load->model('informe_model');
		
		$paraPdf=$this->informe_model->getInformeData($id);
		$data['user'] = $r=$this->ion_auth->user()->row();
		$data['content'] =$paraPdf;

		$footer="DIRECCI&Oacute;N NACIONAL DE FORMACI&Oacute;N SOCIALISTA FEMINISTA";
       //print_r($data['content']);die();
		$html=$this->load->view('pdf_informe_output', $data, true);
		
		$pdfFilePath = "informe_".$paraPdf[0]->curso."_".$paraPdf[0]->estado.".pdf";

		$this->load->library('m_pdf');

		$pdf = $this->m_pdf->load();
		
		$pdf->SetHTMLHeader("<img src='".base_url()."img/banner-inf.png' />");

		/*$pdf->SetHTMLFooter('
		<img src="'.base_url().'img/footer-pdf.png" style="width:100%">
		<table width="100%" style="border: 0px;vertical-align: bottom; font-family: serif; font-size: 12pt; color: #000000; font-weight: bold; margin-top:-40px"><tr>
		<td width="100%" align="center" style="border:0px;font-size: 12px; color: white; font-weight: bold;">'.$footer.'</td>
		</tr></table>
		');*/
		$pdf->SetHTMLFooter('
		<table width="100%" style="border: 0px;vertical-align: bottom; font-family: serif; font-size: 12pt; color: #66666; font-weight: bold; margin-top:-40px"><tr>
		<td width="100%" align="center" style="border:0px;font-size: 14px; color: black; font-weight: bold;">'.$footer.'</td>
		</tr></table>
		');

		$pdf->WriteHTML($html);

		$pdf->Output($pdfFilePath, "I");

	}
	public function delete($id)
	{
		$this->load->model('informe_model');
		$this->db->trans_start();
		$this->informe_model->delete($id);
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> El informe fue eliminado de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		$this->db->trans_complete();
		redirect(base_url().'informe');
		
	}
	


}
/* End of file Cursos.php */