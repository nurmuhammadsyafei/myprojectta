<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('custom_library');
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda Harus Login!</div>');
			redirect(base_url('cloginadmin'));
		}
		/*		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';*/
	}

	public function index()
	{
		$d['admin'] = $this->db->get_where('1_admin',['adm_email'=>
			$this->session->userdata('email')])->row_array();
		$d['januari'] = $this->db->get_where('lap_bulan',['bln'=>'januari','thn'=>'2019'])->row_array();
		$d['februari'] = $this->db->get_where('lap_bulan',['bln'=>'februari','thn'=>'2019'])->row_array();
		$d['maret'] = $this->db->get_where('lap_bulan',['bln'=>'maret','thn'=>'2019'])->row_array();
		$d['april'] = $this->db->get_where('lap_bulan',['bln'=>'april','thn'=>'2019'])->row_array();
		$d['mei'] = $this->db->get_where('lap_bulan',['bln'=>'mei','thn'=>'2019'])->row_array();
		$d['juni'] = $this->db->get_where('lap_bulan',['bln'=>'juni','thn'=>'2019'])->row_array();
		$d['juli'] = $this->db->get_where('lap_bulan',['bln'=>'juli','thn'=>'2019'])->row_array();
		$d['agustus'] = $this->db->get_where('lap_bulan',['bln'=>'agustus','thn'=>'2019'])->row_array();
		$d['september'] = $this->db->get_where('lap_bulan',['bln'=>'september','thn'=>'2019'])->row_array();
		$d['oktober'] = $this->db->get_where('lap_bulan',['bln'=>'oktober','thn'=>'2019'])->row_array();
		$d['november'] = $this->db->get_where('lap_bulan',['bln'=>'november','thn'=>'2019'])->row_array();
		$d['desember'] = $this->db->get_where('lap_bulan',['bln'=>'desember','thn'=>'2019'])->row_array();

		$d['unacc']	= $this->model_lawu->book_unacc();
		$d['blmbayar']	= $this->model_lawu->book_blmbayar();
		$d['total'] = $this->model_lawu->totsembilanbelas();
		$d['totjuni']=$this->model_lawu->totjuli();
		$this->load->view('dashboard/header',$d);
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/footer');
	}


	public function data_admin(){
		$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
			$this->session->userdata('email')])->row_array();
		$data['tampiladmin'] = $this->model_lawu->tampil_data_admin();
		$data['kodeadm']=$this->model_lawu->kodeadmin();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/admin');
		$this->load->view('dashboard/footer');
	}

	public function aktivkan_admin($id)
	{
		$data=['is_active'=>0];
		$this->db->where('adm_id',$id);
		$this->db->update('1_admin',$data);
		redirect(base_url('cdashboard/data_admin'));
	}

	public function blokir_admin($id)
	{
		$data=['is_active'=>1];
		$this->db->where('adm_id',$id);
		$this->db->update('1_admin',$data);
		redirect(base_url('cdashboard/data_admin'));
	}
	public function hapus_data_admin($id){
		$this->model_lawu->delete_data_admin($id);
		redirect('cdashboard/data_admin');
	}

	public function edit_adm($id)
	{
		$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
			$this->session->userdata('email')])->row_array();
		$data['adm']=$this->db->get_where('1_admin',['adm_id'=>$id])->row_array();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/detail/edit_admin');
		$this->load->view('dashboard/footer');
	}
	public function act_edit_adm()
	{
		$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
			$this->session->userdata('email')])->row_array();
		$id=$this->input->post('_id',true);
		$data['adm']=$this->db->get_where('1_admin',['adm_id'=>$id])->row_array();
		$data=[
			'adm_nama'=>$this->input->post('_nama',true),
			'adm_email'=>$this->input->post('_email',true)
		];
		$this->db->where('adm_id',$this->input->post('_id',true));
		$this->db->update('1_admin',$data);
		redirect('cdashboard/data_admin');
	}/*
	public function aktivasiadmin($id){
		$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
			$this->session->userdata('email')])->row_array();
		$data['adm']=$this->model_lawu->getadmBYID($id);
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/aktivasiadm');
		$this->load->view('dashboard/footer');
	}

	public function aktivkan(){
		$data2=['is_active'=>0];

		$this->db->where('adm_id',$this->input->post('_adm_id',true));
		$this->db->update('1_admin',$data2);
		redirect('cdashboard/data_admin');
	}

	public function nonaktivkan(){
		$data2=['is_active'=>1];

		$this->db->where('adm_id',$this->input->post('_adm_id',true));
		$this->db->update('1_admin',$data2); echo ('ok');
		redirect('cdashboard/data_admin');
	}*/
	/*-----------------KELOMPOK---------------------*/
	public function data_kelompok(){
		$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
			$this->session->userdata('email')])->row_array();
		$data['tampilkelompok'] = $this->model_lawu->tampil_data_kelompok();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/kelompok');
		$this->load->view('dashboard/footer');
	}


	public function detail_data_kelompok($id){
		$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
			$this->session->userdata('email')])->row_array();
		$data['kel']=$this->model_lawu->getkelBYID($id);
		$data['boo']=$this->db->get_where('booking',['id_kelompok'=>$id])->row_array();
		$data['ket']=$this->db->get_where('ketua',['id_kelompok'=>$id])->row_array();
		$data['agt']=$this->db->get_where('anggota',['id_kelompok'=>$id])->result_array();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/detail/detail_kelompok');
		$this->load->view('dashboard/footer');
	}

	public function hapus_data_kelompok($id){
		$this->model_lawu->delete_data_kelompok($id);
		redirect('cdashboard/data_kelompok');
	}
	/*-----------------END KELOMPOK---------------------*/

	public function data_anggota(){
		$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
			$this->session->userdata('email')])->row_array();
		$data['tampilanggota'] = $this->model_lawu->tampil_data_anggota();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/anggota');
		$this->load->view('dashboard/footer');
	}
	public function hapus_data_anggota($id){
		$this->model_lawu->delete_data_anggota($id);
		redirect('cdashboard/data_anggota');
	}

	public function deleteall(){
		$this->model_lawu->deleteagt();
		redirect('cdashboard/data_anggota');
	}


	public function data_kuota(){
		$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
			$this->session->userdata('email')])->row_array();

		$data['tampilkuota'] = $this->model_lawu->tampil_data_kuota();
		$data['kodekuo'] = $this->model_lawu->kodekuota();
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/kuota');
		$this->load->view('dashboard/footer');
	}
	public function hapus_data_kuota($id){
		$this->model_lawu->delete_data_kuota($id);
		redirect('cdashboard/data_kuota');
	}

	public function tambah_data_kuota(){
		//$tgl=strtotime($this->input->post('tanggal',true));
		$tgl=$this->input->post('tanggal',true);
		$data=
				[ // untuk memasukkan data ke database
				// 'id_kuota'=>$this->input->post('_kode',true),
				'tanggal'=>$tgl,
				/*htmlspecialchars() berfungsi untuk filter dari karakter aneh*/
				'tersedia'=> 50,
				'terisi'=> 0,
				'harga'=>15000
			];
			$this->db->insert('kuota',$data);
			redirect('cdashboard/data_kuota');
		}

		/*-----------------------Data Booking-----------------------*/
		public function data_booking(){
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			
			$data['tampilbooking'] = $this->model_lawu->tampil_data_booking();
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/booking');
			$this->load->view('dashboard/footer');
		}
		public function hapus_data_booking(){
			$idbook   	 = $this->input->post('_idbook',true);
			$idkuota  	 = $this->input->post('_tglkuota',true);
			$idklp  	 = $this->input->post('_idklp',true);
			$jmlkuota 	 = $this->input->post('_jmlkuota',true);
			$tersedia 	 = $this->input->post('_tersedia',true);
			$terisi   	 = $this->input->post('_terisi',true);
			$newtersedia = $tersedia + $jmlkuota;
			$newterisi	 = $terisi   - $jmlkuota;
			$data=[ 
				'tersedia'	=>$newtersedia,'terisi'	=>$newterisi
			];
			// echo $idbook;
			$this->db->where('tanggal',$idkuota);
			$this->db->update('kuota',$data);
			$this->model_lawu->delete_data_booking($idbook);
			$this->db->delete('kelompok',['id_kelompok'=>$idklp]);
			$this->db->delete('anggota',['id_kelompok'=>$idklp]);
			$this->db->delete('ketua',['id_kelompok'=>$idklp]);
			redirect('cdashboard/data_booking');
		}
		/*public function hapus_data_booking(){
			$idbook   = $this->input->post('_idbook',true);
			$idkuota  = $this->input->post('_tglkuota',true);
			$jmlkuota = $this->input->post('_jmlkuota',true);

			$this->db->query("UPDATE kuota SET 
				tersedia = tersedia + '$jmlkuota',
				terisi   = terisi   - '$jmlkuota',
				WHERE      id_kuota = '$idkuota'
				");

			$this->model_lawu->delete_data_booking($idbook);
			redirect('cdashboard/data_booking');
		}*/

		public function detail_data_booking($id){
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			$data['book']=$this->model_lawu->getbookBYID($id);
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/detailbook');
			$this->load->view('dashboard/footer');
		}

		public function data_ketua(){
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			$data['tampilketua'] = $this->model_lawu->tampil_data_ketua();
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/ketua');
			$this->load->view('dashboard/footer');
		}
		public function detail_data_ketua($id)
		{
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			$this->db->join('kelompok k','k.id_kelompok = ketua.id_kelompok' ,'left');
			$data['ket']=$this->db->get_where('ketua',['id_ketua'=>$id])->row_array();
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/detail/detail_ketua');
			$this->load->view('dashboard/footer');
		}
		public function hapus_data_ketua($id){
			$this->model_lawu->delete_data_ketua($id);
			redirect('cdashboard/data_ketua');
		}

		public function accbooking(){
			$data2=[ 
				'stt_acc'		=>1,
				'adm_id'	=>$this->input->post('_nama_admin')
			];
			$this->db->where('id_booking',$this->input->post('_id_booking',true));
			$this->db->update('booking',$data2);
			
			$this->_kirimEmail();  // ----------- <- koding kirim email
			redirect('cdashboard/data_booking');
		}

		private function _kirimEmail()
		{
			$config=[
				'protocol' => 'smtp',
				'smtp_host'=> 'ssl://smtp.googlemail.com',
				'smtp_user'=> 'syafeibsi6d@gmail.com',
				'smtp_pass'=> '744144Ii',
				'smtp_port'=> 465,
				'mailtype' => 'html',
				'charset'  => 'utf-8',
				'newline'  => "\r\n"
			];

			$idbook =$this->input->post('_id_booking');
			$this->load->library('email',$config);

			$this->email->from('syafeibsi6d@gmail.com', 'Nur Muhammad Syafei');
			$this->email->to($this->input->post('_email_ketua',true));
			$this->email->subject('KONFIRMASI PEMBAYARAN');
			$this->email->message('Selamat <b>'.$idbook.'</b><br>pembayaran anda telah berhasil <br> Harap simpan Email ini !! , sebagai bukti pembayaran anda<br>
				dan jangan lupa cetak bukti pemesanan <a href="http://localhost:8080/ta/cbayar">disini</a>' );
			$this->email->send();
		}


		/*-----------------------Data Unaccepter-----------------------*/
		public function data_unaccepted(){
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			
			$data['tampil_unacc'] = $this->model_lawu->tampil_unacc();
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/book_unacc');
			$this->load->view('dashboard/footer');
		}

		/*---------------LAPORAN BULANAN--------------------*/
		public function lap_bulanan(){
			$d['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			$d['lap_bulanan'] = $this->model_lawu->tampil_data_bulanan();
			$d['januari'] = $this->db->get_where('lap_bulan',['bln'=>'januari','thn'=>'2019'])->row_array();
			$d['februari'] = $this->db->get_where('lap_bulan',['bln'=>'februari','thn'=>'2019'])->row_array();
			$d['maret'] = $this->db->get_where('lap_bulan',['bln'=>'maret','thn'=>'2019'])->row_array();
			$d['april'] = $this->db->get_where('lap_bulan',['bln'=>'april','thn'=>'2019'])->row_array();
			$d['mei'] = $this->db->get_where('lap_bulan',['bln'=>'mei','thn'=>'2019'])->row_array();
			$d['juni'] = $this->db->get_where('lap_bulan',['bln'=>'juni','thn'=>'2019'])->row_array();
			$d['juli'] = $this->db->get_where('lap_bulan',['bln'=>'juli','thn'=>'2019'])->row_array();
			$d['agustus'] = $this->db->get_where('lap_bulan',['bln'=>'agustus','thn'=>'2019'])->row_array();
			$d['september'] = $this->db->get_where('lap_bulan',['bln'=>'september','thn'=>'2019'])->row_array();
			$d['oktober'] = $this->db->get_where('lap_bulan',['bln'=>'oktober','thn'=>'2019'])->row_array();
			$d['november'] = $this->db->get_where('lap_bulan',['bln'=>'november','thn'=>'2019'])->row_array();
			$d['desember'] = $this->db->get_where('lap_bulan',['bln'=>'desember','thn'=>'2019'])->row_array();
			$d['totjuni']=$this->model_lawu->totjuli();
			$d['profit']=$this->model_lawu->profit();
			$this->load->view('dashboard/header',$d);
			$this->load->view('dashboard/laporan/laporanbulanan');
			$this->load->view('dashboard/footer');
		}
		public function edit_data_bulanan($id)
		{
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			$data['lap_bulanan'] = $this->model_lawu->tampil_data_bulanan();
			$data['byid'] = $this->model_lawu->getbulananBYID($id);

			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/laporan/edit_laporanbulanan');
			$this->load->view('dashboard/footer');
		}
		public function edit_lap_bulanan()
		{
			$data=[ 
				'pendaki'	=>$this->input->post('_pendaki',true),
				'profit'	=>$this->input->post('_profit',true)
			];

			$this->db->where('id',$this->input->post('_id',true));
			$this->db->update('lap_bulan',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Perubahan Data Sukses ..
				</div>');
			redirect('cdashboard/lap_bulanan');
		}
		public function tambah_data_bulanan()
		{		
			$data=
			[
				'thn'=>$this->input->post('_tahun',true),
				'bln'=> $this->input->post('_bulan',true),
				'pendaki'=> $this->input->post('_pendaki',true),
				'profit'=>15000*$this->input->post('_pendaki',true)
			];
			$this->db->insert('lap_bulan',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Penambahan Data Sukses ..
				</div>');
			redirect('cdashboard/lap_bulanan');
		}
		public function hapus_data_bulanan($id){
			$this->model_lawu->delete_data_bulanan($id);
			redirect('cdashboard/lap_bulanan');
		}
		
		/*---------------LAPORAN TAHUNAN--------------------*/
		public function lap_tahunan(){
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			$data['lap_bulanan'] = $this->model_lawu->tampil_data_bulanan();
			$data['empatbelas'] = $this->db->get_where('lap_tahun',['tahun'=>'2014'])->row_array();
			$data['limabelas'] = $this->db->get_where('lap_tahun',['tahun'=>'2015'])->row_array();
			$data['enambelas'] = $this->db->get_where('lap_tahun',['tahun'=>'2016'])->row_array();
			$data['tujubelas'] = $this->db->get_where('lap_tahun',['tahun'=>'2017'])->row_array();
			$data['delapanbelas'] = $this->db->get_where('lap_tahun',['tahun'=>'2018'])->row_array();
			$data['sembilanbelas'] = $this->db->get_where('lap_tahun',['tahun'=>'2019'])->row_array();
			$data['duapuluh'] = $this->db->get_where('lap_tahun',['tahun'=>'2020'])->row_array();
			$data['duasatu'] = $this->db->get_where('lap_tahun',['tahun'=>'2021'])->row_array();
			$data['duadua'] = $this->db->get_where('lap_tahun',['tahun'=>'2022'])->row_array();
			$data['duatiga'] = $this->db->get_where('lap_tahun',['tahun'=>'2023'])->row_array();
			$data['duaempat'] = $this->db->get_where('lap_tahun',['tahun'=>'2024'])->row_array();
			$data['dualima'] = $this->db->get_where('lap_tahun',['tahun'=>'2025'])->row_array();
			$data['total'] = $this->model_lawu->totsembilanbelas();
			$data['lap_tahunan'] = $this->model_lawu->tampil_data_tahunan();
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/laporan/laporantahunan');
			$this->load->view('dashboard/footer');
		}
		public function edit_data_tahunan($id)
		{
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			$data['lap_tahunan'] = $this->model_lawu->tampil_data_tahunan();
			$data['byid'] = $this->model_lawu->gettahunanBYID($id);

			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/laporan/edit_laporantahunan');
			$this->load->view('dashboard/footer');
		}
		public function edit_lap_tahunan()
		{
			$data=[ 
				'pendaki'	=>$this->input->post('_pendaki',true),
				'profit'	=>$this->input->post('_profit',true)
			];

			$this->db->where('id',$this->input->post('_id',true));
			$this->db->update('lap_tahun',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Perubahan Data Sukses ..
				</div>');
			redirect('cdashboard/lap_tahunan');
		}
		public function tambah_data_tahunan()
		{
			$data=
			[
				'tahun'=>$this->input->post('_tahun',true),
				'pendaki'=> $this->input->post('_pendaki',true),
				'profit'=>15000*$this->input->post('_pendaki',true)
			];
			$this->db->insert('lap_tahun',$data);
			redirect('cdashboard/lap_tahunan');
		}
		public function hapus_data_tahunan($id){
			$this->model_lawu->delete_data_tahunan($id);
			redirect('cdashboard/lap_tahunan');
		}


		/*---------------------PRINT PDF--------------------*/

		public function sortir_thn()
		{
			$d['admin'] = $this->db->get_where('1_admin',['adm_email'=>$this->session->userdata('email')])->row_array();

			$thn=$this->input->post('_tahun',true);
			$d['lap_bulanan'] = $this->db->get_where('lap_bulan',['thn'=>$thn])->result_array();

			$d['januari'] = $this->db->get_where('lap_bulan',['bln'=>'januari','thn'=>'2019'])->row_array();
			$d['februari'] = $this->db->get_where('lap_bulan',['bln'=>'februari','thn'=>'2019'])->row_array();
			$d['maret'] = $this->db->get_where('lap_bulan',['bln'=>'maret','thn'=>'2019'])->row_array();
			$d['april'] = $this->db->get_where('lap_bulan',['bln'=>'april','thn'=>'2019'])->row_array();
			$d['mei'] = $this->db->get_where('lap_bulan',['bln'=>'mei','thn'=>'2019'])->row_array();
			$d['juni'] = $this->db->get_where('lap_bulan',['bln'=>'juni','thn'=>'2019'])->row_array();
			$d['juli'] = $this->db->get_where('lap_bulan',['bln'=>'juli','thn'=>'2019'])->row_array();
			$d['agustus'] = $this->db->get_where('lap_bulan',['bln'=>'agustus','thn'=>'2019'])->row_array();
			$d['september'] = $this->db->get_where('lap_bulan',['bln'=>'september','thn'=>'2019'])->row_array();
			$d['oktober'] = $this->db->get_where('lap_bulan',['bln'=>'oktober','thn'=>'2019'])->row_array();
			$d['november'] = $this->db->get_where('lap_bulan',['bln'=>'november','thn'=>'2019'])->row_array();
			$d['desember'] = $this->db->get_where('lap_bulan',['bln'=>'desember','thn'=>'2019'])->row_array();

			$d['totjuni']=$this->model_lawu->totjuli();
			$d['profit']=$this->model_lawu->profit();
			$this->load->view('dashboard/header',$d);
			$this->load->view('dashboard/laporan/laporanbulanan');
			$this->load->view('dashboard/footer');
		}
		/*---------------------SORTIR DATA BOOKING---------------------*/
		public function data_booking_srt(){
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			
			$this->db->join('kuota u','u.id_kuota = booking.id_kuota' ,'left');
			$this->db->join('kelompok k','k.id_kelompok = booking.id_kelompok' ,'left');
			$bln=$this->input->post('_data',true);
			$data['tampilbooking'] = $this->db->get_where('booking',['month(tanggal)'=>$bln])->result_array();
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/booking',$data);
			$this->load->view('dashboard/footer');
		}
		public function data_booking_srt1(){
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			
			$this->db->join('kuota u','u.id_kuota = booking.id_kuota' ,'left');
			$this->db->join('kelompok k','k.id_kelompok = booking.id_kelompok' ,'left');
			$stt=$this->input->post('_data',true);
			$data['tampilbooking'] = $this->db->get_where('booking',['stt_acc'=>$stt])->result_array();
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/booking',$data);
			$this->load->view('dashboard/footer');
		}
		public function data_booking_srt2(){
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			
			$this->db->join('kuota u','u.id_kuota = booking.id_kuota' ,'left');
			$this->db->join('kelompok k','k.id_kelompok = booking.id_kelompok' ,'left');
			$stt=$this->input->post('_data',true);
			$data['tampilbooking'] = $this->db->get_where('booking',['stt_bayar'=>$stt])->result_array();
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/booking',$data);
			$this->load->view('dashboard/footer');
		}
		/*---------------------END SORTIR DATA BOOKING---------------------*/
		public function cetak_tahun()
		{
			$this->load->library('mypdf');
			$data['tahunan']=$this->model_lawu->tampil_data_tahunan();
			$this->mypdf->generate('dashboard/laporan/printpdf_thn', $data, 'laporan-tahunan', 'A4','landscape');
		}	
		public function cetak_bulan($id)
		{
			$this->load->library('mypdf');
			$data['lap_bulanan'] = $this->model_lawu->getlapblnbyID($id);
			$this->mypdf->generate('dashboard/laporan/printpdf_bln', $data, 'laporan-bulanan', 'A4','portrait');
		}	
		public function cetak_all_bulan()
		{
			$this->load->library('mypdf');
			$data['lap_bulanan'] = $this->model_lawu->tampil_data_bulanan();
			$this->mypdf->generate('dashboard/laporan/printpdf_bln', $data, 'laporan-bulanan', 'A4','portrait');
		}	
		public function cetak_booking($id)
		{
			$this->load->library('mypdf');
			$this->db->join('1_admin a','a.adm_id = booking.adm_id' ,'left');
			$this->db->join('kelompok k','k.id_kelompok = booking.id_kelompok' ,'left');
			$this->db->join('kuota u','u.id_kuota = booking.id_kuota' ,'left');
			$data['lap_booking'] = $this->db->get_where('booking',['month(tanggal)'=>$id])->result_array();
			$this->mypdf->generate('dashboard/laporan/printpdf_booking', $data, 'laporan-bulanan', 'A4','landscape');
		}	
		public function cetak_all_booking()
		{

			$this->load->library('mypdf');
			$this->db->join('kuota u','u.id_kuota = booking.id_kuota' ,'left');
			$this->db->join('1_admin a','a.adm_id = booking.adm_id' ,'left');
			$this->db->join('kelompok k','k.id_kelompok = booking.id_kelompok' ,'left');
			$data['lap_booking'] = $this->db->get('booking')->result_array(); 
			$this->mypdf->generate('dashboard/laporan/printpdf_allbooking', $data, 'laporan-bulanan', 'A4','landscape');
		}	
		public function cetak_kelompok($id)
		{
			$this->load->library('mypdf');
			/*$data['kel']=$this->model_lawu->getkelBYID($id);
			$data['ket']=$this->db->get_where('ketua',['id_kelompok'=>$id])->row_array();
			$data['agt']=$this->db->get_where('anggota',['id_kelompok'=>$id])->result_array();
			$data['lap_booking'] = $this->db->get('booking')->result_array();*/


			$data['kel']=$this->model_lawu->getkelBYID($id);
			$data['boo']=$this->db->get_where('booking',['id_kelompok'=>$id])->row_array();
			$data['ket']=$this->db->get_where('ketua',['id_kelompok'=>$id])->row_array();
			$data['agt']=$this->db->get_where('anggota',['id_kelompok'=>$id])->result_array();
			 
			$this->mypdf->generate('dashboard/laporan/print_pdf_klp', $data, 'laporan-bulanan', 'A4','landscape');
		}
	}
