<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
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
		$data['masuk'] = $this->hitung('surat_masuk');
		$data['keluar'] = $this->hitung('surat_keluar');
		$data['claim'] = ['Nota dinas', 'Surat Perintah', 'Surat Perintah perjalanan dinas', 'Berita acara', 'SPKS', 'Surat Keluar Yanggan', 'Surat keluar Adum'] ;
		$this->load->view('template/header');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}

	public function masuk()
	{
		$data['masuk'] = $this->m->getData('surat_masuk')->result();
		$data['total'] = $this->m->lastId('surat_masuk')->row();
		$this->load->view('template/header');
		$this->load->view('masuk/index', $data);
		$this->load->view('template/footer');
	}

	public function ins_masuk()
	{		
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '5120';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('toast', 'error:'.$this->upload->display_errors());
			$this->uploadSM(null, 'tambah');
		}
		else{
			$data = $this->upload->data('file_name');
			$this->uploadSM($data, 'tambah');
		}		
		$this->session->set_flashdata('toast', 'success:Data berhasil di tambahkan');
		redirect('Home/masuk','refresh');
	}
	
	public function upd_masuk()
	{
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '5120';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('toast', 'error:'.$this->upload->display_errors());
			$this->uploadSM(null, 'update');
		}
		else{
			$data = $this->upload->data('file_name');
			$this->uploadSM($data, 'update');
		}	
		$this->session->set_flashdata('toast', 'success:Data berhasil di update');

		redirect('Home/masuk','refresh');
	}

	public function hapusM($id)
	{
		$w = array('id' => $id, );
		$this->m->del('surat_masuk', $w);
		redirect('Home/masuk','refresh');
	}

	public function printM($id)
	{
		$w = array('id' => $id);
		$data['pm'] = $this->m->getData('surat_masuk', $w)->row();
		$data['user'] = $this->session->userdata('log');		
		$this->load->view('masuk/print', $data);
	}

	function hitung($t){
		$keluar = $this->m->getData($t)->result();
		$a=0; $b=0; $c=0; $d=0; $e=0; $f=0; $g=0;
		if ($t == "surat_keluar") {
			foreach ($keluar as $k ) {
				if ($k->claim == 1) {
					$a += 1;
				} elseif($k->claim == 2) {
					$b += 1;
				} elseif($k->claim == 3) {
					$c += 1;
				} elseif($k->claim == 4) {
					$d += 1;
				} elseif($k->claim == 5) {
					$e += 1;
				} elseif($k->claim == 6) {
					$f += 1;
				} elseif($k->claim == 7) {
					$g += 1;
				}
			}
		} else {
			foreach ($keluar as $k ) {
				if ($k->jenis_klaim == 1) {
					$a += 1;
				} elseif($k->jenis_klaim == 2) {
					$b += 1;
				} elseif($k->jenis_klaim == 3) {
					$c += 1;
				} elseif($k->jenis_klaim == 4) {
					$d += 1;
				} elseif($k->jenis_klaim == 5) {
					$e += 1;
				} elseif($k->jenis_klaim == 6) {
					$f += 1;
				} elseif($k->jenis_klaim == 7) {
					$g += 1;
				}
			}
		}	
		
		$data = [$a, $b, $c, $d, $e, $f, $g];
		return $data;
	}

	public function uploadSM($dokumen, $jenis){
		if ($dokumen != null && $jenis == 'tambah') {
			$data = array(
				'no_agenda' => $this->input->post('no'), 
				'no_surat' => $this->input->post('nos'), 
				'perihal' => $this->input->post('perihal'), 
				'tgl_surat' => $this->input->post('tgl_surat'), 
				'tgl_entry' => date('Y-m-d'), 
				'pengirim' => $this->input->post('pengirim'), 
				'nama_peserta' => $this->input->post('peserta'), 
				'nama_pemohon' => $this->input->post('pemohon'), 
				'nrp' => $this->input->post('nrp'), 
				'no_ktpa' => $this->input->post('ktpa'), 
				'alamat' => $this->input->post('alamat'), 
				'no_tlp' => $this->input->post('telpon'), 
				'jenis_klaim' => $this->input->post('claim'), 
				'catatan' => $this->input->post('catatan'), 
				'dokumen' => $dokumen, 
			);     
			$this->m->ins('surat_masuk', $data);
		} elseif($dokumen == null && $jenis == 'tambah') {
			$data = array(
				'no_agenda' => $this->input->post('no'), 
				'no_surat' => $this->input->post('nos'), 
				'perihal' => $this->input->post('perihal'), 
				'tgl_surat' => $this->input->post('tgl_surat'), 
				'tgl_entry' => date('Y-m-d'), 
				'pengirim' => $this->input->post('pengirim'), 
				'nama_peserta' => $this->input->post('peserta'), 
				'nama_pemohon' => $this->input->post('pemohon'), 
				'nrp' => $this->input->post('nrp'), 
				'no_ktpa' => $this->input->post('ktpa'), 
				'alamat' => $this->input->post('alamat'), 
				'no_tlp' => $this->input->post('telpon'), 
				'jenis_klaim' => $this->input->post('claim'), 
				'catatan' => $this->input->post('catatan'),
			);			     
			$this->m->ins('surat_masuk',$data);
		}elseif($dokumen != null && $jenis == 'update') {
			$data = array(
				'no_agenda' => $this->input->post('no'), 
				'no_surat' => $this->input->post('nos'), 
				'perihal' => $this->input->post('perihal'), 
				'tgl_surat' => $this->input->post('tgl_surat'), 
				'tgl_entry' => date('Y-m-d'), 
				'pengirim' => $this->input->post('pengirim'), 
				'nama_peserta' => $this->input->post('peserta'), 
				'nama_pemohon' => $this->input->post('pemohon'), 
				'nrp' => $this->input->post('nrp'), 
				'no_ktpa' => $this->input->post('ktpa'), 
				'alamat' => $this->input->post('alamat'), 
				'no_tlp' => $this->input->post('telpon'), 
				'jenis_klaim' => $this->input->post('claim'), 
				'catatan' => $this->input->post('catatan'), 
				'dokumen' => $dokumen, 
			);
			$w = array('id' => $this->uri->segment(3), );     
			$this->m->upd('surat_masuk',$data, $w);
		}else{
			$data = array(
				'no_agenda' => $this->input->post('no'), 
				'no_surat' => $this->input->post('nos'), 
				'perihal' => $this->input->post('perihal'), 
				'tgl_surat' => $this->input->post('tgl_surat'), 
				'tgl_entry' => date('Y-m-d'), 
				'pengirim' => $this->input->post('pengirim'), 
				'nama_peserta' => $this->input->post('peserta'), 
				'nama_pemohon' => $this->input->post('pemohon'), 
				'nrp' => $this->input->post('nrp'), 
				'no_ktpa' => $this->input->post('ktpa'), 
				'alamat' => $this->input->post('alamat'), 
				'no_tlp' => $this->input->post('telpon'), 
				'jenis_klaim' => $this->input->post('claim'), 
				'catatan' => $this->input->post('catatan'), 
			);
			$w = array('id' => $this->uri->segment(3), );     
			$this->m->upd('surat_masuk',$data, $w);
		}       
	}

	public function keluar()
	{
		$claim = $this->uri->segment(3);
		
		if ($claim == null) {
			$w = array('claim' => 1);
			$data['judul'] = "Nota dinas"; 
		} elseif($claim == 2) {
			$w = array('claim' => 2);
			$data['judul'] = "Surat Perintah";
		} elseif($claim == 3) {
			$w = array('claim' => 3);
			$data['judul'] = "Surat Perintah perjalanan dinas";
		} elseif($claim == 4) {
			$w = array('claim' => 4);
			$data['judul'] = "Berita acara";
		} elseif($claim == 5) {
			$w = array('claim' => 5);
			$data['judul'] = "SPKS ";
		} elseif($claim == 6) {
			$w = array('claim' => 6);
			$data['judul'] = "Surat Keluar Yanggan";
		}else {
			$w = array('claim' => 7);
			$data['judul'] = "Surat keluar Adum";
		}
		
		$data['keluar'] = $this->m->getData('surat_keluar', $w)->result();
		$data['total'] = $this->m->lastId('surat_keluar', $w)->row();
		$this->load->view('template/header');
		$this->load->view('keluar/index', $data);
		$this->load->view('template/footer');
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
		
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('toast', 'error:'.$this->upload->display_errors());
			$this->uploadSK(null, 'tambah');
		}
		else{
			$data = $this->upload->data('file_name');
			$this->uploadSK($data, 'tambah');
		}		
		$this->session->set_flashdata('toast', 'success:Data berhasil di tambahkan');
		redirect('Home/keluar','refresh');
	}
	
	public function upd_keluar()
	{
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '5120';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('toast', 'error:'.$this->upload->display_errors());
			$this->uploadSK(null, 'update');
		}
		else{
			$data = $this->upload->data('file_name');
			$this->uploadSK($data, 'update');
		}	

		$this->session->set_flashdata('toast', 'success:Data berhasil di update');
		redirect('Home/keluar','refresh');
	}

	public function hapusK($id)
	{
		$w = array('id' => $id, );
		$this->m->del('surat_keluar', $w);
		$this->session->set_flashdata('toast', 'success:Data berhasil di hapus');
		redirect('Home/keluar','refresh');
	}

	public function uploadSK($dokumen, $jenis){
		if ($dokumen != null && $jenis == 'tambah') {
			$data = array(
				'id_claim' => $this->input->post('norut'), 
				'claim' => $this->input->post('claim'), 
				'kode_surat' => $this->input->post('kode'), 
				'no_surat' => $this->input->post('no'), 
				'tgl_surat' => $this->input->post('tgl_surat'), 
				'tgl_kirim' => date('Y-m-d'), 
				'tujuan' => $this->input->post('tujuan'), 
				'alamat' => $this->input->post('alamat'), 
				'perihal' => $this->input->post('perihal'),
				'catatan' => $this->input->post('catatan'), 
				'dokumen' => $dokumen, 
			);     
			$this->m->ins('surat_keluar', $data);
		} elseif($dokumen == null && $jenis == 'tambah') {
			$data = array(
				'id_claim' => $this->input->post('norut'), 
				'claim' => $this->input->post('claim'), 
				'kode_surat' => $this->input->post('kode'), 
				'no_surat' => $this->input->post('no'), 
				'tgl_surat' => $this->input->post('tgl_surat'), 
				'tgl_kirim' => date('Y-m-d'), 
				'tujuan' => $this->input->post('tujuan'), 
				'alamat' => $this->input->post('alamat'), 
				'perihal' => $this->input->post('perihal'),
				'catatan' => $this->input->post('catatan'), 
			);       
			$this->m->ins('surat_keluar',$data);
		}elseif($dokumen != null && $jenis == 'update') {
			$data = array(
				'id_claim' => $this->input->post('norut'), 
				'claim' => $this->input->post('claim'), 
				'kode_surat' => $this->input->post('kode'), 
				'no_surat' => $this->input->post('no'), 
				'tgl_surat' => $this->input->post('tgl_surat'), 
				'tgl_kirim' => date('Y-m-d'), 
				'tujuan' => $this->input->post('tujuan'), 
				'alamat' => $this->input->post('alamat'), 
				'perihal' => $this->input->post('perihal'),
				'catatan' => $this->input->post('catatan'), 
				'dokumen' => $dokumen, 
			);     
			$w = array('id' => $this->uri->segment(4), );     
			$this->m->upd('surat_keluar',$data, $w);
		}else{
			$data = array(
				'id_claim' => $this->input->post('norut'), 
				'claim' => $this->input->post('claim'), 
				'kode_surat' => $this->input->post('kode'), 
				'no_surat' => $this->input->post('no'), 
				'tgl_surat' => $this->input->post('tgl_surat'), 
				'tgl_kirim' => date('Y-m-d'), 
				'tujuan' => $this->input->post('tujuan'), 
				'alamat' => $this->input->post('alamat'), 
				'perihal' => $this->input->post('perihal'),
				'catatan' => $this->input->post('catatan')
			);     
			$w = array('id' => $this->uri->segment(4), );     
			$this->m->upd('surat_keluar',$data, $w);
		}       
	}
}

/* End of file Home.php */
