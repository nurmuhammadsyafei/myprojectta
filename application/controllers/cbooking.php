<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbooking extends CI_Controller {

	public function index(){
		$data['tampilkuo'] = $this->model_lawu->kuota_tersedia();
		//$data['tampilkuo'] = $this->model_lawu->xxx();

		$this->load->view('home/header');
		$this->load->view('booking/kuota',$data);
		$this->load->view('home/footer');
	}

	public function isidata($id){
		$data['getkuota']=$this->model_lawu->getkuotaBYID($id);
		$data['kode']=$this->model_lawu->kodebooking();
		$data['kodeklp']=$this->model_lawu->kodekelompok();
		$data['kodeket']=$this->model_lawu->kodeketua();
		// $data['kodeagt']=$this->model_lawu->kodeanggota();
		$this->load->view('home/header');
		$this->load->view('booking/isidata',$data);
		$this->load->view('home/footer');
	}



	public function insertdata(){
		date_default_timezone_set('Asia/Jakarta');
		$harga 				= $this->input->post('_harga',true);
		$jml_anggota 		= 1+$this->input->post('jumlahanggota',true);
		$subtotal 			= $jml_anggota*$harga;
		// Koding selisih / lama hari
		$tanggal_awal 		= $this->input->post('tanggalberangkat');
		$tanggal_akhir 		= $this->input->post('tanggalpulang'); 
			// Penghitungan diconvert kedalam bentuk timestamp
		$selisih 			= strtotime($tanggal_akhir)-strtotime($tanggal_awal); 
			// Hasilnya Dibagi dengan detik*menit*jam
		$selisih_hari 		= $selisih / (60 * 60 * 24); 
			// Tampilkan hasilnya

		if ($selisih_hari<=3)
		{
		// ID Auto = KLP2205001
			/*------------ Koding Input Data Kelompok ---------------*/
			$inputkelompok=[
				'id_kelompok'	=> $this->input->post('kodekmpk',true),
				'nama'		 	=> $this->input->post('namakelompok',true),
				'jumlahanggota' => 1+$this->input->post('jumlahanggota',true)
			];
			$this->db->insert('kelompok',$inputkelompok);

			/*------------- Koding Input Data Booking --------------- */

			$inputbooking=[
				'id_booking'		=> $this->input->post('kode',true),
				'id_kelompok'		=> $this->input->post('kodekmpk',true),
				'tgl_booking'		=> date("Y-m-d H:i:s"),
				'id_kuota'  		=> $this->input->post('_id_kuota',true),
				'tgl_pulang'		=> $this->input->post('tanggalpulang',true),
				'email_ketua'		=> $this->input->post('email',true),
				'lm_hari'			=> $selisih_hari,
				'subtotal'			=> $subtotal,
				'jml_anggota'		=> $jml_anggota,
				'stt_bayar'			=> 0	
			];
			$this->db->insert('booking',$inputbooking);

			/*------------- Koding Input Data Ketua --------------- */
			$email=$this->input->post('email',true);
			$inputketua=[
				'id_ketua'		=> $this->input->post('kodeketua',true),
				'id_kelompok'	=> $this->input->post('kodekmpk',true),
				'nama_ketua'	=> $this->input->post('namaketua',true),
				'jeniskelamin'	=> $this->input->post('jeniskelamin',true),
				'tanggallahir'	=> $this->input->post('tanggallahir',true),
				'alamat_ketua'	=> $this->input->post('alamatketua',true),
				'ktp'			=> $this->input->post('noktp',true),
				'email'			=> $email,
				'telepon'		=> $this->input->post('telepon',true),
				'kontak_darurat'=> $this->input->post('kontakdarurat',true),
				'nama_kondar'	=> $this->input->post('namakontak',true),
				'hubungan'		=> $this->input->post('hubungan',true),
				'alamat_kondar'	=> $this->input->post('tanggalpulang',true)
			];
			$this->db->insert('ketua',$inputketua);	

			/*----------- Koding Tambah Data Anggota ------------*/
			$nama_anggota 	= $_POST['namaanggota']; 
			$tanggallahir 	= $_POST['tanggallahiranggota']; 
			$jeniskelamin 	= $_POST['jeniskelaminanggota'];
			$ktp 			= $_POST['noktpanggota']; 
			$alamat			= $_POST['alamatanggota']; 
			$telepon		= $_POST['teleponanggota']; 
			$data = array();
			$index = 0; 
			foreach($nama_anggota  as $nanggota){ 
				array_push($data, array(
					'id_kelompok'	=> $this->input->post('kodekmpk',true),
					'nama_anggota'	=>$nanggota,  
					'tanggallahir'	=>$tanggallahir[$index],  
					'jeniskelamin'	=>$jeniskelamin[$index],
					'ktp'			=>$ktp[$index],
					'alamat'		=>$alamat[$index],
					'telepon'		=>$telepon[$index],
				));
				$index++;
			}
			$sql = $this->model_lawu->save_batch($data); 

		$this->_kirimEmail(); //Koding panggil Method Kirim email

		/*---------- Koding pengurangan kuota -------*/
		$terisi = $this->input->post('_terisi',true);
		$kuantitas = 1+$this->input->post('jumlahanggota',true);
		$kuota = $this->input->post('_kuota',true);
		$total = $kuota-$kuantitas;
		$updatekuota=[
			'tersedia'		=> $total,
			'terisi'		=> $terisi+$kuantitas
		];
		$this->db->where('id_kuota',$this->input->post('_id_kuota',true));
		$this->db->update('kuota',$updatekuota);

		$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">Booking anda berhasil, Silahkan cek email anda ..
			</div>');
		redirect('cbayar');
	}elseif ($selisih_hari>3) {
		$this->session->set_flashdata('message','<div class="text-danger bold pl-3" style="font-size:13px">Lama Pendakian maksimal 3 hari !!
			</div>');
		$this->session->set_flashdata('message1','<div class="alert alert-danger" role="alert">Booking anda gagal !!
			</div>');
		$id=$this->input->post('_get',true);
		$this->isidata($id);
	}
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

	$ketua 		 =$this->input->post('namaketua');
	$klp   		 =$this->input->post('namakelompok');
	$hari  		 =$this->input->post('_hari');
	$tgl   		 =$this->input->post('tanggalberangkat');
	$kode   	 =$this->input->post('kode');
	$harga 		 = $this->input->post('_harga',true);
	$jml_anggota = 1+$this->input->post('jumlahanggota',true);
	$subtotal 	 = $jml_anggota*$harga;
	$this->load->library('email',$config);
	$this->email->from('syafeibsi6d@gmail.com', 'Nur Muhammad Syafei');
	$this->email->to($this->input->post('email'));
	$this->email->subject('KONFIRMASI BOOKING');
	$this->email->message('Halo <b>'.$ketua.'</b>, terimakasih telah booking.<br>Anda adalah ketua dari kelompok <b>'.$klp.'</b> yang akan mendaki di gunung pada '.$hari.' tanggal '.$this->custom_library->indo_date($tgl).' <br> kode booking anda adalah <b>'.$kode.'</b><br> Harap simpan kode ini !!<br><br> Total tagihan yang harus anda bayar adalah sejumlah Rp.'.$subtotal.',00 <br><br>
		Silahkan melakukan pembayaran via Transfer Bank<br>
		BRI : 63247868462 a/n Surya Darma Ali<br><br>
		Segera lakukan pembayaran maksimal 1 jam setelah email ini masuk.<br>Jika tidak maka kode booking anda hangus dan harus input data ulang, terimakasih<br><br><br>
		TTD Pos Pendakian Gunung');
	$this->email->send();
}

/*-----------------PRINT BUKTI-----------------*/
public function print_bukti()
{
	$this->db->join('kuota u','u.id_kuota = booking.id_kuota' ,'left');
	$data['book'] = $this->db->get_where('booking',['id_booking'=>
		$this->session->userdata('id_book')])->row_array();
	$data['klp']= $this->db->get_where('kelompok',['id_kelompok'=> $this->session->userdata('id_klp')])->row_array();
	$data['ketua']= $this->db->get_where('ketua',['id_kelompok'=> $this->session->userdata('id_klp')])->row_array();
	$data['agt']= $this->db->get_where('anggota',['id_kelompok'=> $this->session->userdata('id_klp')])->result_array();
	$this->load->view('booking/print_bukti',$data);
}

}
