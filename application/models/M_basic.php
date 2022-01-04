<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_basic extends CI_Model {

	public function getData($t, $w = null)
	{
		if ($w != null) {
			$this->db->where($w);
		}
		if($t == "surat_masuk"){
			$this->db->join('claim', 'surat_masuk.jenis_klaim = claim.id_claim', 'left');
		}
		if($t == "adum"){
			$this->db->join('claim', 'adum.jenis_surat = claim.id_claim', 'left');
		}
		return $this->db->get($t);
	}

	public function lastId($t, $w = null)
	{
		if ($w != null) {
			$this->db->where($w);	
			$this->db->order_by('id', 'desc');
		}else{
			if ($t == "claim") {
				$this->db->order_by('id_claim', 'desc');	
			} else {
				$this->db->order_by('id', 'desc');
			}
		}	
		return $this->db->get($t, 1);		
	}

	public function tabklaim($t, $g)
	{
		$this->db->group_by($g);
		return $this->db->get($t)->result();		
	}

	public function ins($t, $data)
	{
		$a = $this->db->insert($t, $data);
		return $a;
	}

	public function upd($t, $data, $w)
	{
		$this->db->update($t, $data, $w);
	}

	public function del($t, $w)
	{
		$this->db->where($w);
		$this->db->delete($t);
	}

	public function hitungK()
	{
		$this->db->group_by('claim');		
	}


	public function norut()
	{

	}
}

/* End of file M_basic.php */
