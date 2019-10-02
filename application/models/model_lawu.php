<?php

class Model_lawu extends CI_Model{


	/*DASHBOARD*/
	public function tampil_data_admin()
	{
		return $this->db->get('1_admin')->result_array(); 
	}
	public function delete_data_admin($id){
		$this->db->delete('1_admin',['adm_id'=>$id]);
	}

	public function getadmBYID($id){
		return $this->db->get_where('1_admin',['adm_id'=>$id])->row_array();
	}
	/*----------------------------*/
	public function tampil_data_kelompok()
	{
		return $this->db->get('kelompok')->result_array(); 
	}

	public function getkelBYID($id)
	{
		
		return $this->db->get_where('kelompok',['id_kelompok'=>$id])->row_array();
	}

	public function delete_data_kelompok($id){
		$this->db->delete('kelompok',['id_kelompok'=>$id]);
	}


	public function tampil_data_anggota_bayar()
	{
		$this->db->join('kelompok k','k.id_kelompok = anggota.id_kelompok' ,'left');
		return $this->db->get('anggota')->result_array(); 
	}
	/*public function kuota_tersedia()
	{	
		//tgl hari ini
		date_default_timezone_set('Asia/Jakarta');
		$datenow=date("Y-m-d"); 
		//data 
		$string=(86400*2)+strtotime($datenow);
		$tanggal= date('Y-m-d',$string);

		//select berdasarkan tgl
		return $this->db->query("SELECT * FROM kuota WHERE tanggal >= '$tanggal'")->result_array();

		//select all	
		//return $this->db->get('kuota')->result_array(); 
	}*/

	/*----------------------------*/
	public function tampil_data_anggota()
	{
		$this->db->join('kelompok k','k.id_kelompok = anggota.id_kelompok' ,'left');
		return $this->db->get('anggota')->result_array(); 
	}
	public function delete_data_anggota($id){
		$this->db->delete('anggota',['id_anggota'=>$id]);
	}

	public function deleteagt(){
		$this->db->truncate('anggota');
	}
	/*---------------DATA BOOKING-------------*/
	
	public function tampil_data_booking()
	{
		$this->db->join('kuota u','u.id_kuota = booking.id_kuota' ,'left');
		$this->db->join('kelompok k','k.id_kelompok = booking.id_kelompok' ,'left');
		return $this->db->get('booking')->result_array(); 
	}
	public function delete_data_booking($id){
		$this->db->delete('booking',['id_booking'=>$id]);
	}

	public function getbookBYID($id){
		$this->db->join('kuota u','u.id_kuota = booking.id_kuota' ,'left');
		$this->db->join('1_admin a','a.adm_id = booking.adm_id' ,'left');
		return $this->db->get_where('booking',['id_booking'=>$id])->row_array();
	}
	/*-----------------BOOKING UNACCEPTED---------------*/
	public function tampil_unacc()
	{
		$this->db->join('kelompok k','k.id_kelompok = booking.id_kelompok' ,'left');
		return $this->db->get_where('booking',['stt_acc'=>'0'])->result_array();
	}
	/*-----------------------------*/
	public function tampil_data_ketua()
	{
		$this->db->join('kelompok k','k.id_kelompok = ketua.id_kelompok' ,'left');
		return $this->db->get('ketua')->result_array();
	}
	public function delete_data_ketua($id){
		$this->db->delete('ketua',['id_ketua'=>$id]);
	}
	/*----------------------------*/
	public function kuota_tersedia()
	{	
		//tgl hari ini
		date_default_timezone_set('Asia/Jakarta');
		$datenow=date("Y-m-d"); 
		//data 
		$string=(86400*2)+strtotime($datenow);
		$tanggal= date('Y-m-d',$string);

		//select berdasarkan tgl
		return $this->db->query("SELECT * FROM kuota ")->result_array();
//		return $this->db->query("SELECT * FROM kuota WHERE tanggal >= '$tanggal'")->result_array();

		//select all	
		//return $this->db->get('kuota')->result_array(); 
	}

	public function xxx()
	{
		return $this->db->get('kuota')->result_array();
	}
	public function tampil_data_kuota()
	{
		return $this->db->get('kuota')->result_array(); 
		//return $this->db->get('kuota')->result_array(); 
	}
	public function delete_data_kuota($id){
		$this->db->delete('kuota',['id_kuota'=>$id]);
	}
	/*DASHBOARD*/



	/*BOOKING*/	/*
	public function tampil_data_kuota()
	{
		return $this->db->get('kuota')->result_array(); 
	}*/



	public function getkuotaBYID($id){
		return $this->db->get_where('kuota',['id_kuota'=>$id])->row_array();
	}

	public function save_batch($data){
		return $this->db->insert_batch('anggota', $data);
	}


	public function kodebooking(){
		$this->db->select('RIGHT(booking.id_booking,2) as id_booking', FALSE);
		$this->db->order_by('id_booking','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('booking');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			$data = $query->row();      
			$kode = intval($data->id_booking) + 1; 
		}
		else{      
			 $kode = 1;  //cek jika kode belum terdapat pada table
			}
			$tgl=date('dmY'); 
			$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			$kodetampil = "BO".$tgl.$batas;  //format kode
			return $kodetampil;  
		}

		public function kodekelompok(){
			$this->db->select('RIGHT(kelompok.id_kelompok,2) as id_kelompok', FALSE);
			$this->db->order_by('id_kelompok','DESC');    
			$this->db->limit(1);    
		$query = $this->db->get('kelompok');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			$data = $query->row();      
			$kode = intval($data->id_kelompok) + 1; 
		}
		else{      
			 $kode = 1;  //cek jika kode belum terdapat pada table
			}
			$tgl=date('dm'); 
			$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			$kodetampil = "KLP".$tgl.$batas;  //format kode
			return $kodetampil;  
		}


		public function kodeadmin(){
			$this->db->select('RIGHT(1_admin.adm_id,2) as adm_id', FALSE);
			$this->db->order_by('adm_id','DESC');    
			$this->db->limit(1);    
		$query = $this->db->get('1_admin');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			$data = $query->row();      
			$kode = intval($data->adm_id) + 1; 
		}
		else{      
			 $kode = 1;  //cek jika kode belum terdapat pada table
			}
			$tgl=date('dm'); 
			$batas = str_pad($kode, 2, "0", STR_PAD_LEFT);    
			$kodetampil = "ADM".$tgl.$batas;  //format kode
			return $kodetampil;  
		}

		public function kodeketua(){
			$this->db->select('RIGHT(ketua.id_ketua,2) as id_ketua', FALSE);
			$this->db->order_by('id_ketua','DESC');    
			$this->db->limit(1);    
		$query = $this->db->get('ketua');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			$data = $query->row();      
			$kode = intval($data->id_ketua) + 1; 
		}
		else{      
			 $kode = 1;  //cek jika kode belum terdapat pada table
			}
			$tgl=date('md');
			$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			$kodetampil = "KET".$tgl.$batas;  //format kode
			return $kodetampil;  
		}

		/*public function kodeanggota(){
			$this->db->select('RIGHT(anggota.id_anggota,2) as id_anggota', FALSE);
			$this->db->order_by('id_anggota','DESC');    
			$this->db->limit(1);    
		$query = $this->db->get('anggota');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			$data = $query->row();      
			$kode = intval($data->id_anggota) + 1; 
		}
		else{      
			 $kode = 1;  //cek jika kode belum terdapat pada table
			}
			$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			$kodetampil = "AGT".$batas;  //format kode
			return $kodetampil;  
		}*/
		public function kodekuota(){
			$this->db->select('RIGHT(kuota.id_kuota,2) as id_kuota', FALSE);
			$this->db->order_by('id_kuota','DESC');    
			$this->db->limit(1);    
		$query = $this->db->get('kuota');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			 //cek kode jika telah tersedia    
			$data = $query->row();      
			$kode = intval($data->id_kuota) + 1; 
		}
		else{      
			 $kode = 1;  //cek jika kode belum terdapat pada table
			}
			$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
			$kodetampil = "KUO".$batas;  //format kode
			return $kodetampil;  
		}
		/*BOOKING*/

		/*CHART*/
		public function mdchart(){
			return $this->db->get('kuota')->result_array(); 
		}	

		/*------------------DATA BULANAN--------------------*/
		public function tampil_data_bulanan()
		{
			return $this->db->get('lap_bulan')->result_array(); 
		}
		public function getbulananBYID($id){
			return $this->db->get_where('lap_bulan',['id'=>$id])->row_array();
		}
		public function delete_data_bulanan($id){
			$this->db->delete('lap_bulan',['id'=>$id]);
		}
		/*------------------DATA tahunan--------------------*/
		public function tampil_data_tahunan()
		{
			return $this->db->get('lap_tahun')->result_array(); 
		}
		public function gettahunanBYID($id){
			return $this->db->get_where('lap_tahun',['id'=>$id])->row_array();
		}
		public function delete_data_tahunan($id){
			$this->db->delete('lap_tahun',['id'=>$id]);
		}

		/*COBA*/
	   // return $this->db->query("SELECT * FROM kuota WHERE tanggal >= '$tanggal'")->result_array();

/*		public function mytotjuli()
		{
			$bln='8';
			$this->db->select_sum('terisi');
			$query = $this->db->get_where('kuota',['month(tanggal)'=>$bln]);
			if($query->num_rows()>0)
			{
				return $query->row()->terisi;
			}
			else
			{
				return 0;
			}
		}*/

		public function totjuli()
		{   
			$bln=date('m');
			$this->db->select_sum('terisi');
			$query = $this->db->get_where('kuota',['month(tanggal)'=>$bln]);
			if($query->num_rows()>0)
			{
				return $query->row()->terisi;
			}
			else
			{
				return 0;
			}
		}

		public function totsembilanbelas()
		{
			$thn=date('Y');
			$this->db->select_sum('pendaki');
			$query = $this->db->get_where('lap_bulan',['thn'=>$thn]);
			if($query->num_rows()>0)
			{
				return $query->row()->pendaki;
			}
			else
			{
				return 0;
			}
		}

		public function book_unacc()
		{
			$query = $this->db->get_where('booking',['stt_acc'=>'0']);
			if($query->num_rows()>0)
			{
				return $query->num_rows();
			}
			else
			{
				return 0;
			}
		}

		public function book_blmbayar()
		{
			$query = $this->db->get_where('booking',['stt_bayar'=>'0']);
			if($query->num_rows()>0)
			{
				return $query->num_rows();
			}
			else
			{
				return 0;
			}
		}

		public function profit()
		{
			$bln='6';
			$this->db->select_sum('terisi');
			$query = $this->db->get_where('kuota',['month(tanggal)'=>$bln]);
			if($query->num_rows()>0)
			{
				return $query->row()->terisi;
			}
			else
			{
				return 0;
			}
		}

		public function getlapblnbyID($id){
			return $this->db->get_where('lap_bulan',['thn'=>$id])->result_array();
		}
		public function getlapboobyID($id){
			return $this->db->get_where('booking',['month(id_kuota)'=>$id])->result_array();
		}


		public function hitungJumlahAsset()
		{   
			$query = $this->db->get('1_admin');
			if($query->num_rows()>0)
			{
				return $query->num_rows();
			}
			else
			{
				return 0;
			}
		}
	}
