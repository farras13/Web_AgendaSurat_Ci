<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('log') == null) {
			redirect('Auth');
		}
		$this->load->model('M_basic', 'm');
	}

	public function index()
	{
		$data['masuk'] = $this->m->getData('surat_masuk')->result();
		$data['dlist'] = $this->m->getData('claim')->result();
		$data['total'] = $this->m->lastId('surat_masuk')->row();
		$this->load->view('template/head_user');
		$this->load->view('user/home', $data);
		$this->load->view('template/footer_user');
	}

	public function masuk()
	{
		$data['masuk'] = $this->m->getData('surat_masuk')->result();
		$data['dlist'] = $this->m->getData('claim')->result();
		$data['total'] = $this->m->lastId('surat_masuk')->row();
		$this->load->view('template/head_user');
		$this->load->view('user/index', $data);
		$this->load->view('template/footer_user');
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
		redirect('Home/masuk', 'refresh');
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

		redirect('Home/masuk', 'refresh');
	}

	public function hapusM($id)
	{
		$w = array('id' => $id,);
		$this->m->del('surat_masuk', $w);
		redirect('Home/masuk', 'refresh');
	}

	public function printM($id)
	{
		$w = array('id' => $id);
		$data['pm'] = $this->m->getData('surat_masuk', $w)->row();
		$data['user'] = $this->session->userdata('log');
		$this->load->view('user/print', $data);
	}

	function uploadSM($dokumen, $jenis)
	{
		$year = date("y");
		$wc = array('claim' => $this->input->post('perihal'),);
		$cek = $this->m->getData('claim', $wc)->row();
		$jns =0;
		if ($cek == null) {
			$this->m->ins('claim', $wc);
			$getlast = $this->m->getData('claim', $wc)->row();
			$jns += $getlast->id_claim;
		} else {
			$jns += $cek->id_claim;
		}

		$norut = $this->m->lastId('surat_masuk')->row();
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
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_entry' => date('Y-m-d'),
				'pengirim' => $this->input->post('pengirim'),
				'nama_peserta' => $this->input->post('peserta'),
				'nrp' => $this->input->post('nrp'),
				'no_ktpa' => $this->input->post('ktpa'),
				'alamat' => $this->input->post('alamat'),
				'no_tlp' => $this->input->post('telpon'),
				'jenis_klaim' => $jenis,
				'catatan' => $this->input->post('catatan'),
				'dokumen' => $dokumen,
			);
			$this->m->ins('surat_masuk', $data);
			
		} elseif ($dokumen == null && $jenis == 'tambah') {
			$data = array(
				'no_urut' => $urut,
				'no_agenda' => $this->input->post('no'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_entry' => date('Y-m-d'),
				'pengirim' => $this->input->post('pengirim'),
				'nama_peserta' => $this->input->post('peserta'),
				'nrp' => $this->input->post('nrp'),
				'no_ktpa' => $this->input->post('ktpa'),
				'alamat' => $this->input->post('alamat'),
				'no_tlp' => $this->input->post('telpon'),
				'jenis_klaim' => $jns,
				'catatan' => $this->input->post('catatan'),
			);
			$this->m->ins('surat_masuk', $data);
			
			
		} elseif ($dokumen != null && $jenis == 'update') {
			$data = array(
				'no_urut' => $urut,
				'no_agenda' => $this->input->post('no'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'pengirim' => $this->input->post('pengirim'),
				'nama_peserta' => $this->input->post('peserta'),
				'nrp' => $this->input->post('nrp'),
				'no_ktpa' => $this->input->post('ktpa'),
				'alamat' => $this->input->post('alamat'),
				'no_tlp' => $this->input->post('telpon'),
				'jenis_klaim' => $jenis,
				'catatan' => $this->input->post('catatan'),
				'dokumen' => $dokumen,
			);
			$w = array('id' => $this->uri->segment(3),);
			$this->m->upd('surat_masuk', $data, $w);
		} else {
			$data = array(
				'no_urut' => $urut,
				'no_agenda' => $this->input->post('no'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'pengirim' => $this->input->post('pengirim'),
				'nama_peserta' => $this->input->post('peserta'),
				'nrp' => $this->input->post('nrp'),
				'no_ktpa' => $this->input->post('ktpa'),
				'alamat' => $this->input->post('alamat'),
				'no_tlp' => $this->input->post('telpon'),
				'jenis_klaim' => $jns,
				'catatan' => $this->input->post('catatan'),
			);
			$w = array('id' => $this->uri->segment(3),);
			$this->m->upd('surat_masuk', $data, $w);
		}
	}
}

/* End of file Home.php */
