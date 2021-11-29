<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_basic', 'm');
	}
	

	public function index()
	{
		$data['claim'] = $this->m->getData('claim')->result();
		$data['user'] = $this->session->userdata('log');
		$data['getdata'] = $this->m->getData('user', null)->result();
		$this->load->view('template/header', $data);
        $this->load->view('admin/anggota', $data);
        $this->load->view('template/footer', $data);
	}

	public function edit($id)
	{
		$data['claim'] = $this->m->getData('claim')->result();
		$data['user'] = $this->session->userdata('log');
		$data['edit'] = $this->m->getData('user', ['id' => $id])->row();
		$this->load->view('template/header', $data);
		$this->load->view('admin/register', $data);
		$this->load->view('template/footer', $data);
	}

	public function pros_edt($id)
	{
		$cek = $this->m->getData('user', ['id' => $id])->row();
		if ($cek->password == md5($this->input->post('password'))) {
			$data = array(
				'username' => $this->input->post('username'), 
				'email' => $this->input->post('email'),
				'role' => $this->input->post('role'),
			);
		}else{
			$data = array(
				'username' => $this->input->post('username'), 
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),
				'role' => $this->input->post('role'),
			);
		}
		$this->m->upd('user', $data, ['id' => $id]);
		$this->session->set_flashdata('toast', 'success:Akun berhasil di tambahkan');
		redirect('Anggota','refresh');
	}

	public function register()
	{
		$data['user'] = $this->session->userdata('log');	
		$data['claim'] = $this->m->getData('claim')->result();
		$this->load->view('template/header', $data);
		$this->load->view('admin/register', $data);
		$this->load->view('template/footer', $data);
	}

	public function hapusM($id)
    {
        $w = array('id' => $id,);
        $this->m->del('user', $w);
        redirect('Anggota', 'refresh');
    }

}

/* End of file Anggota.php */
