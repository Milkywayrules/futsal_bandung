<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CS_main extends CI_Controller {
//
//
//
//  CS_main = Controller Superadmin main
//
//
//
//  ===============================================CONSTRUCT===============================================
	public function __construct(){
		parent::__construct();
		$this->load->model('M_user');
		// inisialisasi variabel kelas global
		$this->header1 = array(
			'tipeAkun'			=>	'superadmin',
			'sidebarBrand'	=>	'superadmin',
		);
		// --- inisialisasi method validasi untuk seluruh method dalam kelas
		// sudah login atau belum
		// kalau sudah redirect ke home
		$this->_validasiLogin();
		// controller CS_main.php khusus untuk superadmin yang sudah login
		// lakukan validasi privilege dengan paramater dari header1['tipeAkun'] diatas
		$this->_validasiPrivilege($this->header1['tipeAkun']);
	}
//
//
//  ===============================================VALIDASI LOGIN DAN PRIVILEGE===============================================
  private function _validasiLogin(){
		// sudah login atau belum
		// kalau sudah redirect ke home
		if ( $this->session->userdata('isLogin') == 0 ) {
			redirect(base_url(), 'refresh');
		}
	}
	private function _validasiPrivilege($tipeAkun){
		// jenis privilege / tipe akun :
		// 	superadmin, provider, member
		if ( $this->session->userdata('privilege') != $tipeAkun ) {
			redirect(base_url(), 'refresh');
		}
	}
//
//
//  ===============================================DASHBOARD===============================================
	public function index()
	{
		$this->header2 = array(
			'tabTitle' 	=> 'Superadmin',
			'heading' 	=> 'Dashboard',
			'active' 		=> 'dashboard',
		);
		$this->header = array_merge($this->header1, $this->header2);
		$this->data		= array(
											'totProvider' => count($this->M_user->get_all_provider()->result()),
											'totLapangan' => count($this->M_user->get_all_provider()->result()),
											'totMember' 	=> count($this->M_user->get_all_member()->result()),
										);

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_dashboard', $this->data);
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

//  ===============================================TAMBAH DATA===============================================
	public function add_member()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Tambah Member - superadmin',
			'heading' 		=> 'Tambah Member',
			'active' 			=> 'add_member',
		);
		$this->header = array_merge($this->header1, $this->header2);

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_add_member');
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

	public function add_provider()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Tambah Provider - superadmin',
			'heading' 		=> 'Tambah Provider',
			'active' 			=> 'add_provider',
		);
		$this->header = array_merge($this->header1, $this->header2);

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_add_provider');
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

//  ===============================================TAMPILKAN DATA===============================================
	public function data_member()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Data Member - superadmin',
			'heading' 		=> 'Data Member',
			'active' 			=> 'data_member',
			'dataTables' 	=> '1',
		);
		$this->header = array_merge($this->header1, $this->header2);
		$this->data['members'] = $this->M_user->get_all_member()->result();
		// echo "<pre>";
		// print_r($this->data['members']);
		// die();

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_data_member', $this->data);
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

	public function data_provider()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Data Provider - superadmin',
			'heading' 		=> 'Data Penyedia Lapangan',
			'active' 			=> 'data_provider',
			'dataTables' 	=> '1',
		);
		$this->header = array_merge($this->header1, $this->header2);
		$this->data['providers'] = $this->M_user->get_all_provider()->result();

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_data_provider', $this->data);
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

//  ===============================================MENU POJOK KANAN ATAS===============================================

	public function profil()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Profil - superadmin',
			'heading' 		=> 'Informasi Dasar',
			'active' 			=> 'profil',
		);
		$this->header = array_merge($this->header1, $this->header2);

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_profil');
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

	public function ubah_password()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Ubah Password - superadmin',
			'heading' 		=> 'Ubah Password',
			'active' 			=> 'ubah_password',
		);
		$this->header = array_merge($this->header1, $this->header2);

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_ubah_password');
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

//  ===============================================END OF CLASS===============================================
}
