<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
    public function _getAllAsetBergerak() {
        $this->db->select('*');
        $this->db->from('aset');
        $this->db->where('id_jenis',1);
		$query = $this->db->get('');
		return $query->result_array();
	}

	public function _getAllAsetNonBergerak() {
        $this->db->select('*');
        $this->db->from('aset');
        $this->db->where('id_jenis',2);
		$query = $this->db->get('');
		return $query->result_array();
	}
}

?>