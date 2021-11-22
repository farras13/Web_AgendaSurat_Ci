<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_basic', 'm');
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function pros_log()
	{
		$nama = $this->input->post('username');
		$pass = $this->input->post('password');
		$pas = md5($pass);	

		$w = array('username' => $nama, 'password' => $pas);
		$cek = $this->m->getData('user', $w)->row();
		if ($cek != null) {
			$log = array(
				'id' => $cek->id, 
				'username' => $cek->username, 
				'email' =>$cek->email, 
				'role' => $cek->role
			);
			$this->session->set_userdata('log',$log);
            
			$this->session->set_flashdata('toast', 'success:Welcome back '.$cek->username);

			redirect('Home', 'refresh');
		}else{
			$this->session->set_flashdata('toast', 'error:Username / Password tidak sesuai');
			redirect('Auth','refresh');
		}
	}

	public function pros_reg()
	{
		$data = array(
			'username' => $this->input->post('username'), 
			'password' => md5($this->input->post('password')),
			'email' => $this->input->post('email'),
			'role' => $this->input->post('role'),
		);

		$this->m->ins('user', $data);
		$this->session->set_flashdata('toast', 'success:Akun berhasil di tambahkan');
		redirect('Auth','refresh');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('toast', 'success:Terima kasih');
		redirect('Auth','refresh');
	}	

}

/* End of file Auth.php */
