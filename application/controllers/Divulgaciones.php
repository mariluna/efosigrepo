<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Divulgaciones extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$rol = $this->ion_auth->get_users_groups()->row();
		if (!$this->ion_auth->logged_in()){redirect('auth/login', 'refresh');}
		if ($rol->id != 1){redirect(base_url(), 'refresh');}
		
	}
	function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('divulgaciones/'.$name_view.'', $data);
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
		$this->load->model('divulgaciones_model');
		$name="ver";
		$get["divulgaciones"]=$this->divulgaciones_model->get($id);
		$get["idCurso"] = $id;
		$this->view($name,$get);
	}

	public function agregar()
	{
		$name="agregar";
		$this->load->model('divulgaciones_model');
		$get['curso'] = $this->divulgaciones_model->getCurso();
		$get['tipo_radio'] = $this->divulgaciones_model->getRadio();
		$get['tipo_tv'] = $this->divulgaciones_model->getTv();
		$this->view($name,$get);
	}

	public function editar_radio($id)
	{
		$this->load->model('divulgaciones_model');
		$name="editar_radio";
		$get['info']=$this->divulgaciones_model->get_radio($id);
		$get['otros_radios'] = $this->divulgaciones_model->getOtrosRadios($get['info']->tipo_divulgacion_radio);
		
		$this->view($name,$get);
	}
	
	public function editar_prensa($id)
	{
		$this->load->model('divulgaciones_model');
		$name="editar_prensa";
		$get['info']=$this->divulgaciones_model->get_prensa($id);
		$get['otros_formatos'] = $this->divulgaciones_model->getOtrosPrensa($get['info']->tipo_divulgacion_prensa,$get['info']->medio);
		
		$this->view($name,$get);
	}
	
	public function editar_tv($id)
	{
		$this->load->model('divulgaciones_model');
		$name="editar_tv";
		$get['info']=$this->divulgaciones_model->get_tv($id);
		$get['otros_tvs'] = $this->divulgaciones_model->getOtrosTv($get['info']->tipo_divulgacion_tv);
		//print_r($get);die();
		$this->view($name,$get);
	}
	
	public function borrar_radio($id)
	{
		$this->load->model('divulgaciones_model');
		$this->db->trans_start();
		$this->divulgaciones_model->del_rad($id);
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> La divulgaci&oacute;n fue eliminada de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		$this->db->trans_complete();
		redirect(base_url().'Divulgaciones');
	}
	
	public function borrar_prensa($id)
	{
		$this->load->model('divulgaciones_model');
		$this->db->trans_start();
		$this->divulgaciones_model->del_pre($id);
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> La divulgaci&oacute;n fue eliminada de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		$this->db->trans_complete();
		redirect(base_url().'Divulgaciones');
	}
	
	public function borrar_tv($id)
	{
		$this->load->model('divulgaciones_model');
		$this->db->trans_start();
		$this->divulgaciones_model->del_tv($id);
		$this->session->set_flashdata('message', '<br><br><div class="alert alert-success info" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span> La divulgaci&oacute;n fue eliminada de forma exitosa
						<span class="glyphicon glyphicon-remove close" aria-hidden="true"></span></div>');
		$this->db->trans_complete();
		redirect(base_url().'Divulgaciones');
	}

	function show_informe($id)
	{
	
		$this->load->model('divulgaciones_model');
		//$paraPdf = $this->divulgaciones_model->getInformeData($id);
		$data['user'] = $r=$this->ion_auth->user()->row();
		$paraPdf =$this->divulgaciones_model->getInformeData($id);	
		$data['content'] =$paraPdf;

		$footer="DIRECCI&Oacute;N NACIONAL DE FORMACI&Oacute;N SOCIALISTA FEMINISTA";
      // print_r($data['content']);die();
		$html=$this->load->view('pdf_informe_output2', $data, true);
		
		$pdfFilePath = "divulgacion_".$paraPdf[0]->curso.".pdf";

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

		$pdf->WriteHTML(utf8_encode($html));

		$pdf->Output($pdfFilePath, "I");

	}
}
/* End of file Divulgaciones.php */