<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function getDataAsetBergerak() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`st`.`persen` AS `persen`,`u`.`username` AS `username` from ((((`aset` `a` join `kategori` `k`) join `jenis` `j`)join `lokasi` `l`)join `user` `u`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id_jenis` = 1))');

		return $query->result_array();
	}
	public function getDataAsetNonBergerak() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`st`.`persen` AS `persen`,`u`.`username` AS `username` from ((((`aset` `a` join `kategori` `k`) join `jenis` `j`)join `lokasi` `l`)join `user` `u`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id_jenis` = 2))');

		return $query->result_array();
	}
	public function getDataAsetBaik() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`st`.`persen` AS `persen`,`u`.`username` AS `username` from ((`pemeliharaan` `p` join `aset` `a`) join `hari` `h`) where ((`p`.`id_aset` = `a`.`id`) and (`p`.`id_hari` = `h`.`id`) and (`p`.`hasil_pemeliharaan` = `Baik`))');

		return $query->result_array();
	}
	public function getDataAsetRusak() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`st`.`persen` AS `persen`,`u`.`username` AS `username` from ((`pemeliharaan` `p` join `aset` `a`) join `hari` `h`) where ((`p`.`id_aset` = `a`.`id`) and (`p`.`id_hari` = `h`.`id`) and (`p`.`hasil_pemeliharaan` = `Rusak`))');
 
		return $query->result_array();
	}
	public function getDataAsetElektronik() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`st`.`persen` AS `persen`,`u`.`username` AS `username` from ((((`aset` `a` join `kategori` `k`) join `jenis` `j`)join `lokasi` `l`)join `user` `u`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id_kategori` = 1))');

		return $query->result_array();
	}
	public function getDataAsetTanah() {
		$query = $this->db->query('select `a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`st`.`persen` AS `persen`,`u`.`username` AS `username` from ((((`aset` `a` join `kategori` `k`) join `jenis` `j`)join `lokasi` `l`)join `user` `u`) where ((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id_kategori` = 2))');

		return $query->result_array();
	}
	public function getDataAllAset() {
		$query = $this->db->query('select * from aset');

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