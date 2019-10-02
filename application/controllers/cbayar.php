<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbayar extends CI_Controller {

	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('booking/pembayaran');
		$this->load->view('home/footer');
	}

	public function login()
	{
		$_kode   =$this->input->post('kdbooking');
		$user = $this->db->get_where('booking',['id_booking'=>$_kode])->row_array();

		if ($user) 
		{
			$data=[
				'id_book'=>$user['id_booking'],
				'id_klp'=>$user['id_kelompok'],
				'booking'=>'booked'
			];
			$this->session->set_userdata($data);
			redirect('cbayar/uploadbayar');
		}
		else
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Kode booking tidak valid
				</div>');
			redirect('cbayar');
		}
		
	}

	public function uploadbayar()
	{
		if($this->session->userdata('booking') != "booked"){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Masukkah Kode Booking Anda!</div>');
			redirect(base_url('cbayar'));
		}else{
			$this->db->join('kuota u','u.id_kuota = booking.id_kuota' ,'left');
			$data['book'] = $this->db->get_where('booking',['id_booking'=>
				$this->session->userdata('id_book')])->row_array();
			$data['klp']= $this->db->get_where('kelompok',['id_kelompok'=> $this->session->userdata('id_klp')])->row_array();
			$data['ketua']= $this->db->get_where('ketua',['id_kelompok'=> $this->session->userdata('id_klp')])->row_array();
			$data['agt']= $this->db->get_where('anggota',['id_kelompok'=> $this->session->userdata('id_klp')])->result_array();
			$this->load->view('home/header',$data);
			$this->load->view('booking/uploadbayar',$data);
			$this->load->view('home/footer');
		}
	}
	/*public function uploadbayar()
	{
		$data['book'] = $this->db->get_where('booking',['id_booking'=>
			$this->session->userdata('kode')])->row_array();
		$data['tampilkelompok'] = $this->model_lawu->tampil_data_kelompok();
		$this->load->view('home/header',$data);
		$this->load->view('booking/uploadbayar');
		$this->load->view('home/footer');
	}*/

	public function uploaduktibayar()
	{
		$data2=[ 
			'id_booking'	=>$this->input->post('_id_booking',true),
			'id_kelompok'	=>$this->input->post('_id_kelompok',true),
			'stt_bayar'		=>1,
			'tgl_bayar'		=>date('Y-m-d'),
			'buktibayar'	=>$this->_uploadbuktibayar()
		];

		$this->db->where('id_booking',$this->input->post('_id_booking',true));
		$this->db->update('booking',$data2);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Upload Data berhasil, Silahkan tunggu email konfirmasi ..
			</div>');
		redirect('cbayar/uploadbayar');
	}

	private function _uploadbuktibayar()
	{
		$config['upload_path']          = './images/buktibayar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100000;  // max 10 mb
		$config['max_width']            = 10200004;
		$config['max_height']           = 7680000; 
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('buktibayar')) {
			return $this->upload->data("file_name");	
		}
		return "default.jpg";
	}

	

	public function logout()
	{
		$this->session->unset_userdata('booking');
		$this->session->unset_userdata('kode');
		redirect(base_url('cbayar')); 
	}
}
