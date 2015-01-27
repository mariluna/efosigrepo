<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pnf extends CI_Controller {
	function view($name_view,$data){

		$this->load->view('header');
		$this->load->view('pnf/'.$name_view.'', $data);
		$this->load->view('footer');

	}
	
	public function argelia()
	{
		$name="argelia";
		$data=" ";
		$this->view($name,$data);
	}
	
	public function yoMujer()
	{
		$name="yoMujer";
		$data=" ";
		$this->view($name,$data);
	}
	
	public function defensoras()
	{
		$name="defensoras";
		$data=" ";
		$this->view($name,$data);
	}
	
	public function somxs()
	{
		$name="somxs";
		$data=" ";
		$this->view($name,$data);
	}
}
?>