<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobacoba extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function tandatangan()
	{
		$this->load->view('tes');
	}
	public function bulan()
	{
		echo $this->custom_library->tgl_indo('2019-02-17');
	}
	public function tesemail()
	{
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl:/smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user'] = 'syafeibsi6D@gmail.com';
		$config['smtp_pass'] = '744144Ii';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		$config['mailtype'] = 'html';
		$config['validation'] = TRUE;
		$this->email->initialize($config);

		$this->email->to('nurmuhammadsyafei1447@gmail.com');
		$this->email->from('syafeibsi6D@gmail.com','Jurnalweb');
		$this->email->subject('JUDUL EMAIL (Teks)');
		$this->email->message('Isi email ditulis disini');
		$this->email->send();
	}
	public function tesemail2()
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

		
		$this->load->library('email',$config);
		$this->email->from('syafeibsi6d@gmail.com', 'Nur Muhammad Syafei');
		$this->email->to('nurmuhammadsyafei1447@gmail.com');
		$this->email->subject('Tes Email Berhasil');
		$this->email->message('Tes Email Berhasil');
		$this->email->send();
	}

	public function totjuli()
	{   
		echo  $this->model_lawu->totjuli();
		
	}

	public function index(){
//ini query memunculkan dua hari setelah hari ini 
		$datenow=date("Y-m-d");    // ini tanggal hari ini
//data hari ini diubah ke string dan di tambah string perhari(60 * 60 * 24) lalu dikali dua = jumlah hari
		$string=((60 * 60 * 24)*2)+strtotime($datenow);  
//kemudian di convert dari string ke tanggal
		$tanggal=date('d F Y',$string);
//kemudian di vardump atau di echo ke layar
		var_dump($tanggal);
	}

	public function tglskrg(){
		date_default_timezone_set('Asia/Jakarta');

		$date=date("d M Y");
		var_dump($date);
	}
	public function clear(){
		$datenow=date("Y-m-d"); 
		$string=((60 * 60 * 24)*2)+strtotime($datenow);  
		$tanggal=date('d F Y',$string);
		var_dump($tanggal);
	}


	public function time(){
		$time=date('i');
		var_dump($time);
	}
	public function oto(){
		if (date('i')+1) {
			$data=
				[ // untuk memasukkan data ke database
				'tanggal'=>date('Y-m-d'),
				/*htmlspecialchars() berfungsi untuk filter dari karakter aneh*/
				'hari'=>'syafei',
				'tersedia'=> 50,
				'terisi'=> 0,
				'harga'=>15000
			];
			$this->db->insert('kuota',$data);	
		}
	} 

	public function tanggalindo(){

		function tgl_indo($tanggal){
			$bulan = [1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
			$pecahkan = explode('-', $tanggal);
			return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
		}

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun


echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

echo "<br/>";
echo "<br/>";

echo tgl_indo("1994-02-15"); // 15 Februari 1994
} 

public function hariini(){
	date_default_timezone_set('Asia/Jakarta');
	
	function getDayIndonesia($date)
	{
		if($date != '0000-00-00'){
			$data = hari(date('D', strtotime($date)));
		}else{
			$data = '*';
		}

		return $data;
	}


	function hari($day) {
		$hari = $day;

		switch ($hari) {
			case "Sun":
			$hari = "Minggu";
			break;
			case "Mon":
			$hari = "Senin";
			break;
			case "Tue":
			$hari = "Selasa";
			break;
			case "Wed":
			$hari = "Rabu";
			break;
			case "Thu":
			$hari = "Kamis";
			break;
			case "Fri":
			$hari = "Jum'at";
			break;
			case "Sat":
			$hari = "Sabtu";
			break;
		}
		return $hari;
	}

    // Menampilkan nama hari format Bahasa Indonesia
	$hari_ini   = date('Y-m-d');
	echo getDayIndonesia($hari_ini);
}



public function total()
{
	$data['tot']=$this->model_lawu->totdelapanbelas();
	$this->load->view('tes',$data);
}

public function sblm_cetak()
{
	$this->load->view('tes');
}
public function cetak()
{
	$dompdf = new dompdf();
	$data = array(
		'nama' => "Nur Muhammad Syafei",
		'url'  => "http://nurmsyafei.com"
	);
	$html = $this->load->view('tes',$data,true);
	$dompdf->load_html($html);
	$dompdf->set_paper('A4','potrait');
	$dompdf->render();
	$pdf = $dompdf->output();
	$dompdf->stream('laporanku.pdf',array("Attachment" => false));
}

public function teslibrary()
{
	$this->tanggal_indo->coba();
	$this->tanggal_indo->coba1();
}
public function count()
{
	$data['total_asset'] = $this->model_lawu->hitungJumlahAsset();
	$this->load->view('tes',$data);
}



}