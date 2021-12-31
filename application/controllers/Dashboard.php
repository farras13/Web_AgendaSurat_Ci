<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('log') == null) {
			redirect('Auth');
		}
		$this->load->model('M_basic', 'm');
		error_reporting(0);
	}

	public function index()
	{
		$data['claim'] = $this->m->getData('claim')->result();
		$data['yangan'] = $this->m->getData('surat_masuk')->num_rows();
		$data['keluar'] = $this->m->getData('surat_keluar')->num_rows();
		$data['adum'] = $this->m->getData('adum')->num_rows();
		$data['user'] = $this->session->userdata('log');
		$this->load->view('template/header', $data);
		$this->load->view('index', $data);
		$this->load->view('template/footer', $data);
	}

	public function masuk()
	{
		$claim = $this->uri->segment(3);
		$w = array('jenis_surat' => $claim);
		if ($claim == null) {
			$data['getdata'] = $this->m->getData('adum')->result();
		} else {
			$data['total'] = $this->m->lastId('adum', $w)->row();
			$data['getdata'] = $this->m->getData('adum', $w)->result();
		}
		$data['total'] = $this->m->lastId('adum')->row();
		$data['tab'] = $this->m->tabklaim('adum', 'jenis_surat');
		$data['side'] = $this->m->tabklaim('surat_keluar', 'klaim');
		$data['claim'] = $this->m->getData('claim')->result();
		$data['user'] = $this->session->userdata('log');
		$this->load->view('template/header', $data);
		$this->load->view('masuk/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function ins_masuk()
	{
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '5120';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('toast', 'error:' . $this->upload->display_errors());
			$this->uploadSM(null, 'tambah');
		} else {
			$data = $this->upload->data('file_name');
			$this->uploadSM($data, 'tambah');
		}
		$this->session->set_flashdata('toast', 'success:Data berhasil di tambahkan');
		redirect('Dashboard/masuk', 'refresh');
	}

	public function upd_masuk()
	{
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '5120';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('toast', 'error:' . $this->upload->display_errors());
			$this->uploadSM(null, 'update');
		} else {
			$data = $this->upload->data('file_name');
			$this->uploadSM($data, 'update');
		}
		$this->session->set_flashdata('toast', 'success:Data berhasil di update');

		redirect('Dashboard/masuk', 'refresh');
	}

	public function hapusM($id)
	{
		$w = array('id' => $id,);
		$this->m->del('surat_masuk', $w);
		redirect('Dashboard/masuk', 'refresh');
	}

	public function printM($id)
	{
		$w = array('id' => $id);
		$data['pm'] = $this->m->getData('adum', $w)->row();
		$data['user'] = $this->session->userdata('log');
		$this->load->view('masuk/print', $data);
	}

	public function uploadSM($dokumen, $jenis)
	{
		$year = date("Y");
		$wc = array('claim' => $this->input->post('jns'),);
		$cek = $this->m->getData('claim', $wc)->row();
		$jns = "";
		if ($cek == null) {
			$this->m->ins('claim', $wc);
			$getlast = $this->m->getData('claim', $wc)->row();
			$jns = $getlast->claim;
		} else {
			$jns = $cek->claim;
		}

		$norut = $this->m->lastId('adum')->row();
		if ($norut != null) {
			$lastYear = date('Y', strtotime($norut->tgl_entry));
			if ($lastYear != $year) {
				$urut = 1;
			} else {
				$urut = $this->input->post('norut');
			}
		} else {
			$urut = $this->input->post('norut');
		}

		if ($dokumen != null && $jenis == 'tambah') {
			$data = array(
				'no_urut' => $urut,
				'no_agenda' => $this->input->post('no'),
				'no_surat' => $this->input->post('nosur'),
				'jenis_surat' => $jns,
				'tanggal_surat' => $this->input->post('tgl'),
				'pengirim' => $this->input->post('pengirim'),
				'perihal' => $this->input->post('perihal'),
				'created_at' => date('Y-m-d'),
				'dokumen' => $dokumen,
			);
			$this->m->ins('adum', $data);
		} elseif ($dokumen == null && $jenis == 'tambah') {
			$data = array(
				'no_urut' => $urut,
				'no_agenda' => $this->input->post('no'),
				'no_surat' => $this->input->post('nosur'),
				'jenis_surat' => $jns,
				'tanggal_surat' => $this->input->post('tgl'),
				'pengirim' => $this->input->post('pengirim'),
				'perihal' => $this->input->post('perihal'),
				'created_at' => date('Y-m-d')
			);
			$this->m->ins('adum', $data);
		} elseif ($dokumen != null && $jenis == 'update') {
			$data = array(
				'no_agenda' => $this->input->post('no'),
				'no_surat' => $this->input->post('nosur'),
				'jenis_surat' => $jns,
				'tanggal_surat' => $this->input->post('tgl'),
				'pengirim' => $this->input->post('pengirim'),
				'perihal' => $this->input->post('perihal'),
				'dokumen' => $dokumen,
			);
			$w = array('id' => $this->uri->segment(3),);
			$this->m->upd('adum', $data, $w);
		} else {
			$data = array(
				'no_agenda' => $this->input->post('no'),
				'no_surat' => $this->input->post('nosur'),
				'jenis_surat' => $jns,
				'tanggal_surat' => $this->input->post('tgl'),
				'pengirim' => $this->input->post('pengirim'),
				'perihal' => $this->input->post('perihal')
			);
			$w = array('id' => $this->uri->segment(3),);
			$this->m->upd('adum', $data, $w);
		}
	}

	public function yanggan()
	{
		$data['getdata'] = $this->m->getData('surat_masuk')->result();
		$data['claim'] = $this->m->getData('claim')->result();
		$data['total'] = $this->m->lastId('surat_masuk')->row();
		$this->load->view('template/header', $data);
		$this->load->view('yanggan', $data);
		$this->load->view('template/footer', $data);
	}

	public function keluar()
	{
		$claim = $this->uri->segment(3);
		$w = array('klaim' => $claim);
		$data['claim'] = $this->m->getData('claim')->result();
		$data['tab'] = $this->m->tabklaim('surat_keluar', 'klaim');
		$data['side'] = $this->m->tabklaim('surat_keluar', 'klaim');

		if ($claim == null) {
			$data['getdata'] = $this->m->getData('surat_keluar', null)->result();
			$data['total'] = $this->m->lastId('surat_keluar', null)->row();
		} else {
			$data['total'] = $this->m->lastId('surat_keluar', $w)->row();
			$data['getdata'] = $this->m->getData('surat_keluar', $w)->result();
		}

		$data['user'] = $this->session->userdata('log');
		$this->load->view('template/header', $data);
		$this->load->view('keluar/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function printK($id)
	{
		$w = array('id' => $id);
		$data['pm'] = $this->m->getData('surat_keluar', $w)->row();
		$data['user'] = $this->session->userdata('log');
		$this->load->view('keluar/print', $data);
	}

	public function ins_keluar()
	{
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '5120';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('toast', 'error:' . $this->upload->display_errors());
			$this->uploadSK(null, 'tambah');
		} else {
			$data = $this->upload->data('file_name');
			$this->uploadSK($data, 'tambah');
		}
		$this->session->set_flashdata('toast', 'success:Data berhasil di tambahkan');
		redirect('Dashboard/keluar', 'refresh');
	}

	public function upd_keluar()
	{
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '5120';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('toast', 'error:' . $this->upload->display_errors());
			$this->uploadSK(null, 'update');
		} else {
			$data = $this->upload->data('file_name');
			$this->uploadSK($data, 'update');
		}

		$this->session->set_flashdata('toast', 'success:Data berhasil di update');
		redirect('Dashboard/keluar', 'refresh');
	}

	public function hapusK($id)
	{
		$w = array('id' => $id,);
		$this->m->del('surat_keluar', $w);
		$this->session->set_flashdata('toast', 'success:Data berhasil di hapus');
		redirect('Dashboard/keluar', 'refresh');
	}

	public function uploadSK($dokumen, $jenis)
	{
		$year = date("Y");
		$norut = $this->m->lastId('surat_keluar')->row();
		if ($norut != null) {
			$lastYear = date('Y', strtotime($norut->tgl_entry));
			if ($lastYear != $year) {
				$urut = 1;
			} else {
				$urut = $this->input->post('norut');
			}
		} else {
			$urut = $this->input->post('norut');
		}

		if ($dokumen != null && $jenis == 'tambah') {
			$data = array(
				'no_urut' => $urut,
				'klaim' => $this->input->post('jns'),
				'kode_surat' => $this->input->post('ks'),
				'no_surat' => $this->input->post('nosur'),
				'tgl_surat' => $this->input->post('tgl'),
				'tgl_kirim' => date('Y-m-d'),
				'tujuan' => $this->input->post('tujuan'),
				'alamat' => $this->input->post('alamat'),
				'perihal' => $this->input->post('perihal'),
				'dokumen' => $dokumen,
			);
			$this->m->ins('surat_keluar', $data);
		} elseif ($dokumen == null && $jenis == 'tambah') {
			$data = array(
				'no_urut' => $urut,
				'klaim' => $this->input->post('jns'),
				'kode_surat' => $this->input->post('ks'),
				'no_surat' => $this->input->post('nosur'),
				'tgl_surat' => $this->input->post('tgl'),
				'tgl_kirim' => date('Y-m-d'),
				'tujuan' => $this->input->post('tujuan'),
				'alamat' => $this->input->post('alamat'),
				'perihal' => $this->input->post('perihal'),
			);
			$this->m->ins('surat_keluar', $data);
		} elseif ($dokumen != null && $jenis == 'update') {
			$data = array(
				'no_urut' => $urut,
				'klaim' => $this->input->post('jns'),
				'kode_surat' => $this->input->post('ks'),
				'no_surat' => $this->input->post('nosur'),
				'tgl_surat' => $this->input->post('tgl'),
				'tujuan' => $this->input->post('tujuan'),
				'alamat' => $this->input->post('alamat'),
				'perihal' => $this->input->post('perihal'),
				'dokumen' => $dokumen,
			);
			$w = array('id' => $this->uri->segment(4),);
			$this->m->upd('surat_keluar', $data, $w);
		} else {
			$data = array(
				'no_urut' => $urut,
				'klaim' => $this->input->post('jns'),
				'kode_surat' => $this->input->post('ks'),
				'no_surat' => $this->input->post('nosur'),
				'tgl_surat' => $this->input->post('tgl'),
				'tujuan' => $this->input->post('tujuan'),
				'alamat' => $this->input->post('alamat'),
				'perihal' => $this->input->post('perihal'),
			);
			$w = array('id' => $this->uri->segment(4),);
			$this->m->upd('surat_keluar', $data, $w);
		}
	}
}

/* End of file Dashboard.php */
