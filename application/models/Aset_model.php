<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	function getAll($config){
        $this->db->select("`a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`u`.`username` AS `username`,`l`.`nama_lokasi` AS `nama_lokasi`,`k`.`nama_kategori` AS `nama_kategori`,`j`.`nama_jenis` AS `nama_jenis`");
        $this->db->where("((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`))");
        $this->db->from("((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`)");
        $this->db->limit($config['per_page'], $this->uri->segment(3)); 
        $hasilquery = $this->db->get();
        
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
	}
	public function show($id){
		$this->db->select("`a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`u`.`username` AS `username`,`l`.`nama_lokasi` AS `nama_lokasi`,`k`.`nama_kategori` AS `nama_kategori`,`j`.`nama_jenis` AS `nama_jenis`");
        $this->db->where("((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id` = $id))");
        $this->db->from("((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`)");
                $query = $this->db->get();

		return $query->row();
	}
	public function getAset($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('aset');
		return $query->result_array();
	}
	public  function get_quick_list($s)  
	{  
		$this->db->select('j.*, l.*,k.*,a.*');
		$this->db->from('aset as a');
		$this->db->join('jenis_asset as j', 'j.id = a.id_jenis','left');
		$this->db->join('kategori as k', 'k.id = a.id_kategori','left');
		$this->db->join('lokasi as l', 'l.id = a.id_lokasi','left');
		if($s['jenis_asset'] !="")
		$this->db->like('a.id_jenis',$s['jenis_asset'],'both');
		if($s['kategori'] !="")
		$this->db->like('a.id_kategori',$s['kategori'],'both');
		if($s['lokasi'] !="")
		$this->db->like('a.id_lokasi', $s['lokasi'],'both');
		if($s['kunci'] !="")
		$this->db->like('a.nama_aset', $s['kunci'],'both');
		$query=$this->db->get()->result(); 
		return $query;
	}
	public function getKatAset(){
        $query = $this->db->get('kategori');
        if($query->num_rows()>0){	
            return $query->result_array();
        }
	}
	public function getJenisAset(){
        $query = $this->db->get('jenis_asset');
        if($query->num_rows()>0){	
            return $query->result_array();
        }
	}
	public function getLokAset(){
        $query = $this->db->get('lokasi');
        if($query->num_rows()>0){	
            return $query->result_array();
        }
	}
	public function getAsetFilter(){
		return $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`u`.`username` AS `username`,`l`.`nama_lokasi` AS `nama_lokasi`,`k`.`nama_kategori` AS `nama_kategori` from ((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`))')->num_rows();
	}
	public function getDataAsetBergerak() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`u`.`username` AS `username` from ((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id_jenis` = 1))');

		return $query->result_array();
	}
	public function getDataAsetNonBergerak() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`u`.`username` AS `username` from ((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id_jenis` = 2))');

		return $query->result_array();
	}
	public function getDataAsetBaik() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`, `u`.`username` AS `username` from ((`pemeliharaan` `p` join `aset` `a`) join `hari` `h`) where ((`p`.`id_aset` = `a`.`id`) and (`p`.`id_hari` = `h`.`id`) and (`p`.`hasil_pemeliharaan` = `Baik`))');

		return $query->result_array();
	}
	public function getDataAsetRusak() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`, `u`.`username` AS `username` from ((`pemeliharaan` `p` join `aset` `a`) join `hari` `h`) where ((`p`.`id_aset` = `a`.`id`) and (`p`.`id_hari` = `h`.`id`) and (`p`.`hasil_pemeliharaan` = `Rusak`))');
 
		return $query->result_array();
	}
	public function getDataAsetElektronik() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`, `u`.`username` AS `username` from ((((`aset` `a` join `kategori` `k`) join `jenis` `j`)join `lokasi` `l`)join `user` `u`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id_kategori` = 1))');

		return $query->result_array();
	}
	public function getDataAsetTanah() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`, `u`.`username` AS `username` from ((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id_kategori` = 2))');

		return $query->result_array();
	}
	public function getDataAllAset() {
		$query = $this->db->query('select * from aset');

		return $query->result_array();
	}
	public function getAsetPemeliharaan() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`p`.`id` AS `id_pemeliharaan`,`p`.`hasil_pemeliharaan ` AS `hasil_pemeliharaan`, `u`.`username` AS `username` from (((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`)join `pemeliharaan` `p`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`) and (`p`.`id_aset` = `a`.`id`))');

		return $query->result_array();
	}
	public function _deleteAset($id) {
		$this->db->where('id', $id);
        $this->db->delete('aset');
	}

	public function updateAset($id)
    {
        $data = array(
            'nama_aset'  => $this->input->post('nama_aset'),
            'no_surat'     => $this->input->post('no_surat'),
            'tgl_surat'     => $this->input->post('tgl_surat'),
			'harga'      => $this->input->post('harga'),
			'tgl_mulai'     => $this->input->post('tgl_mulai'),
			'tgl_selesai'     => $this->input->post('tgl_selesai'),
			'keterangan'     => $this->input->post('keterangan'),
			'id_syarat'     => $this->input->post('id_syarat'),
        );
        $this->db->update('aset', $data, array('id' => $id));
    }
}
?>