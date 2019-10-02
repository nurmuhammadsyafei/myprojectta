<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cloginadmin extends CI_Controller {
	public function index()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if ($this->form_validation->run() == false) {	
			$this->load->view('home/header');
			$this->load->view('home/loginadmin');
			$this->load->view('home/footer');
		}
		else{
			$this->_login();
		}
	}


	private function _login()
	{/*ambil data dari form email dan password saat login*/
		$email   =$this->input->post('email');
		$password=$this->input->post('password');
		/*cek apakah ada data di database yang sesuai dengan email inputan login */
		$user = $this->db->get_where('1_admin',['adm_email'=>$email])->row_array();
		if($user){	
			//jika user aktif
			if ($user['is_active']==0) {
				//cek password nya
				if(password_verify($password, $user['adm_password'])) {
					$data=[
						'email'=>$user['adm_email'],
						'status'=>'login'
					];
					$this->session->set_userdata($data);
					redirect('cdashboard');	
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center color-red" role="alert">Password salah!
						</div>');
					redirect('cloginadmin');
				}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger text-center color-red" role="alert">Email anda belum aktif
					</div>');
				redirect('cloginadmin');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center color-red" role="alert">Email tidak terdaftar
				</div>');
			redirect('cloginadmin');

		}	
	}


	public function registrasi(){
		$this->form_validation->set_rules('username', 'Name','required|trim');//validasi nama harus ada
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[1_admin.adm_email]',[
			'is_unique'=>'Email ini sudah terdaftar! |  gunakan email lain! ..'
			]); //validasi email harus ada

		$this->form_validation->set_rules('password1', 'Password','required|trim|min_length[5]|matches[password2]',[
			'matches'=>'Password harus sama!',	
			'min_length'=>'Password terlalu pendek, minimal 5 karakter!'
			]);//validasi nama harus ada
		$this->form_validation->set_rules('password2', 'Password','matches[password1]');//validasi nama harus ada

		if($this->form_validation->run()==false){	
			$data['kodeadm']=$this->model_lawu->kodeadmin();
			$this->load->view('home/header');
			$this->load->view('home/registrasi',$data);
			$this->load->view('home/footer');
		}else{
			$data=
				[ // untuk memasukkan data ke database
				'adm_id'=>$this->input->post('_kode',true),
				'adm_nama'=>htmlspecialchars($this->input->post('username',true)),
				/*htmlspecialchars() berfungsi untuk filter dari karakter aneh*/
				'adm_email'=>htmlspecialchars($this->input->post('email',true)),
				'adm_password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'is_active'=>1	
			];

			$this->db->insert('1_admin',$data);
			$this->session->set_flashdata('message','<div class="alert alert-warning text-center" role="alert">Selamat! akun anda berhasil didaftarkan,<br> silahkan aktivasi!
				</div>');
			redirect('cloginadmin');
		}
	}

	public function registdashboard(){
		$this->form_validation->set_rules('username', 'Name','required|trim');//validasi nama harus ada
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[1_admin.adm_email]',[
			'is_unique'=>'Email ini sudah terdaftar! |  gunakan email lain! ..'
			]); //validasi email harus ada

		$this->form_validation->set_rules('password1', 'Password','required|trim|min_length[5]|matches[password2]',[
			'matches'=>'Password harus sama!',	
			'min_length'=>'Password terlalu pendek, minimal 5 karakter!'
			]);//validasi nama harus ada
		$this->form_validation->set_rules('password2', 'Password','matches[password1]');//validasi nama harus ada

		if($this->form_validation->run()==false){
			$data['admin'] = $this->db->get_where('1_admin',['adm_email'=>
				$this->session->userdata('email')])->row_array();
			$data['tampiladmin'] = $this->model_lawu->tampil_data_admin();
			$data['kodeadm']=$this->model_lawu->kodeadmin();	
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/admin');
			$this->load->view('dashboard/footer');
		}else{
			$data=
				[ // untuk memasukkan data ke database
				'adm_id'=>$this->input->post('_kode',true),
				'adm_nama'=>htmlspecialchars($this->input->post('username',true)),
				/*htmlspecialchars() berfungsi untuk filter dari karakter aneh*/
				'adm_email'=>htmlspecialchars($this->input->post('email',true)),
				'adm_password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'is_active'=>1
			];

			$this->db->insert('1_admin',$data);
			$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">Selamat! akun anda berhasil didaftarkan, silahkan login!
				</div>');
			redirect('cdashboard/data_admin');
		}
	}

	public function logout(){
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('status');
		redirect(base_url('cloginadmin')); 
	}
	
}
