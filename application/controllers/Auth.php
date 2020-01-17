<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// .
// .
// .
// .
//                            user
// .
// .
// .
// .

class Auth extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->model('M_user');
	}

	private function _validasiLogin(){
		// sudah login atau belum
		// kalau sudah redirect ke home
		if ( $this->session->userdata('isLogin') == 1 ) {
			redirect(base_url());
		}
	}
	private function _validasiPrivilege($tipeLogin = ''){
		// ada 3 tipe login
		// superadmin, provider, biasa (untuk member)
		if ( ($tipeLogin == 'superadmin') or ($tipeLogin == 'provider') or ($tipeLogin == '') ) {
		}else {
      redirect(base_url('login'));
    }
	}

//  ===============================================LOGIN===============================================
	public function login($tipeLogin = '')
	{
		// --- $tipeLogin diambil dari parameter sebelum login pada URL
		// --- misal, website.com/SUPERADMIN/login, maka $tipeLogin = 'SUPERADMIN'

		// sudah login atau belum
		// kalau sudah redirect ke home
		$this->_validasiLogin();
		// superadmin harus login melalui superadmin/login
		// provider harus login melalui provider/login
		// lakukan validasi apakah superadmin/provider login melalui halan login biasa atau sudah sesuai
    $this->_validasiPrivilege($tipeLogin);

		// syarat form
		$this->form_validation->set_rules('emailUsername', 'E-Mail / Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$header = array(
			'tabTitle' => 'Login ' . ucfirst($tipeLogin),
      'tipeLogin' =>  ucfirst($tipeLogin),
		);
		if ($this->form_validation->run() == FALSE){
			// jika syarat form belum terpenuhi (tombol login belum ditekan)
      $this->load->view('v_login', $header);
    }else{
			// jika syarat pada form sudah terpenuhi (tombol login sudah ditekan)
			// cek email / username pada db
			$query = $this->M_user->get_user_by_username_email( $this->input->post('emailUsername', true) );
			if ( $query != false ) {
				// jika email dan privilege >= 5 terdaftar pada db
				$user = $query->row();

				// lalu cek apakah password sesuai dengan db
				// jika benar akun terdaftar pada tb_user
				if ( password_verify($this->input->post('password', true), $user->password) ) {
					$this->session->set_flashdata('success_message', 1);
					$this->session->set_flashdata('title', "Bonjour, {$user->username} !");
					$this->session->set_flashdata('text', 'Selamat menggunakan Futsalbandung.com');
					$this->session->set_userdata('isLogin', 1);

					// --- cek jenis akun yg login (privilege akun)
					// MEMBER
					// validasi member harus login dari halaman login biasa
					if ($user->privilege == 'member' AND ($tipeLogin != 'superadmin' OR $tipeLogin != 'provider')) {
						// get info dari tb_member
						$query = $this->M_user->get_member_by_username($user->username);
						$member = $query->row();
						// set session userdata
						$this->session->set_userdata('id', $member->id);
						$this->session->set_userdata('nama', $member->nama);
						$this->session->set_userdata('username', $member->username);
						redirect(base_url('member'));

					// PROVIDER
				}elseif ($user->privilege == 'provider' AND $tipeLogin == 'provider') {
						// get info dari tb_provider
						$query = $this->M_user->get_provider_by_username($user->username);
						echo "<pre>";
						print_r($user->privilege);die();
						$provider = $query->row();
						// set session userdata
						$this->session->set_userdata('id', $provider->id);
						$this->session->set_userdata('nama', $provider->nama);
						$this->session->set_userdata('username', $provider->username);
						redirect(base_url('provider'));

					// SUPERADMIN
				}elseif ($user->privilege == 'superadmin' AND $tipeLogin == 'superadmin') {
						// set session userdata
						$this->session->set_userdata((array)$user);
						redirect(base_url('superadmin'));

					// TIDAK LOGIN SESUAI DENGAN HALAMAN LOGIN
					}else {
						$this->session->set_userdata('isLogin', 0);
						$this->session->set_flashdata('failed_message', 1);
						$this->session->set_flashdata('title', 'Login gagal !');
						$this->session->set_flashdata('text', 'Kredensi yang anda gunakan salah !');
						redirect(base_url("{$tipeLogin}/login"));
					}

				// jika password inputan tidak cocok pada db
				}else {
					$this->session->set_flashdata('failed_message', 1);
					$this->session->set_flashdata('title', 'Login gagal !');
					$this->session->set_flashdata('text', 'Username / E-mail / password salah !');
					redirect(base_url("{$tipeLogin}/login"));
				}
			}else {
				// jika username/email tidak terdaftar pada db
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Login gagal !');
				$this->session->set_flashdata('text', 'Username / E-mail / password salah !');
				redirect(base_url("{$tipeLogin}/login"));
			}
    }
	} //end fungsi login

//  ===============================================REGISTER===============================================
  public function register()
	{
		$this->_validasiLogin();
		$this->_validasiPrivilege();

		// syarat form
		$this->form_validation->set_rules('daftar-fullname', 'Full Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('daftar-username', 'Username', 'trim|required|min_length[5]|alpha_dash|is_unique[user.username]',
																				array('is_unique' => 'Username already registered.'));
		$this->form_validation->set_rules('daftar-email', 'E-Mail', 'trim|required|valid_email|is_unique[user.email]',
																				array('is_unique' => 'E-Mail already registered.'));
		$this->form_validation->set_rules('daftar-phone', 'Phonenumber', 'trim|required|numeric|is_unique[user.phone]',
																				array('is_unique' => 'Phonenumber already registered.'));
		$this->form_validation->set_rules('daftar-gender', 'Gender', 'required');
		$this->form_validation->set_rules('daftar-password', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('daftar-verPassword', 'Repeat Password', 'trim|required|matches[daftar-password]');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			// jika syarat form belum terpenuhi (tombol register belum ditekan)
      $header = array(
  			'tabTitle' => 'Register',
  		);
			$this->load->view('v_register', $header);
		}else {
			// jika syarat pada form sudah terpenuhi (tombol register sudah ditekan)

			$code = md5(rand().time());
			$data = array(
				'fullname' => $this->input->post('daftar-fullname'),
				'username' => $this->input->post('daftar-username'),
				'email' => $this->input->post('daftar-email'),
				'phone' => $this->input->post('daftar-phone'),
				'gender' => $this->input->post('daftar-gender'),
				'password' => $this->bcrypt->hash_password($this->input->post('daftar-password',TRUE)),
				'privilege' => 5,
				'activation_code' => $code,
			);
			$register = $this->M_user->create($data['fullname'], $data['username'], $data['email'], $data['phone'],
			 																	$data['gender'], $data['password'], $data['privilege'], $data['activation_code']);

			if ($register) {
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', 'Registration complete !');
				$this->session->set_flashdata('text', 'Please activate your account via email');
				redirect(base_url('login'));
			}else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Registration failed !');
				$this->session->set_flashdata('text', 'Please check again your information');
				redirect(base_url('register'));
			}

		}
	}

//  ===============================================RESET PASSWORD===============================================
	public function reset($resetCode = '')
	{
		$this->_validasiLogin();
		$this->_validasiPrivilege();

		if ( $resetCode != '' ) {
      // kalo masuk ke resetpassword/(:any)
			if ( $this->M_user->get_reset_code($resetCode)->num_rows() == 1 ) {
        // cek reset_code nya ada di db atau engga
				$row = $this->M_user->get_reset_code($resetCode)->row();
				echo $row->activation_code;
			}
			// print_r($res);
			die();
		}

		// syarat form
		$this->form_validation->set_rules('reset-email', 'E-Mail', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$header = array(
			'title' => 'Reset Password'
		);
		if ( $this->form_validation->run() == FALSE ) {
			$this->load->view('v_header_auth', $header);
			$this->load->view('v_reset_password');
			$this->load->view('v_footer_auth');
		}else {
			$this->session->set_flashdata('reset-email', $this->input->post('reset-email'));
			redirect(base_url( 'mail/reset_password' ));
		}
	}

//  ===============================================LOGOUT===============================================
  public function logout(){

    $this->session->sess_destroy();
		redirect(base_url());

  }

}
