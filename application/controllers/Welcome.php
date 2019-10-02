<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/index');
		$this->load->view('home/footer');
	}
	public function booking()
	{
		$this->load->view('home/header');
		$this->load->view('home/sop');
		$this->load->view('home/footer');
	}
	public function admin()
	{
		$this->load->view('home/header');
		$this->load->view('home/loginadmin');
		$this->load->view('home/footer');
	}
	public function registrasi()
	{
		$this->load->view('home/header');
		$this->load->view('home/registrasi');
		$this->load->view('home/footer');
	}
	public function chart(){
		$data = $this->model_lawu->mdchart();
		// $data['tampiladmin'] = $this->model_lawu->tampil_data_admin();
		$x['data'] = json_encode($data);
		$this->load->view('chart_view',$x);
	}
	public function line(){
		$data['pdk'] = $this->model_lawu->mdchart();

		$this->load->view('line',$data);
	}
}
