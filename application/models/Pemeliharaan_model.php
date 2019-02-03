<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeliharaan_model extends CI_Model {

    public function select()
    {
        return $this->db->get('pemeliharaan')->result();
    }
    public function select_id($id)
    {
        return $this->db->where('id',$id)->get('pemeliharaan')->result()[0];
    }
    public function insert()
    {
        $set = $this->input->post();
        $this->db->insert('pemeliharaan',$set);
    }

    public function insertPemeliharaan()
	{
		$object = array('keterangan' => $this->input->post('keterangan'),
						'id_aset' => $this->input->post('id_aset'),
						'id_hari' => $this->input->post('id_hari'),
                        'hasil_pemeliharaan' => $this->input->post('hasil_pemeliharaan'),
                        'no_pemeliharaan' => $this->input->post('no_pemeliharaan'),
						'tanggal_pemeliharaan' => $this->input->post('tanggal_pemeliharaan')
					);
        return $this->db->insert('pemeliharaan',$object);
    }
    
    public function update($id)
    {
        $set = $this->input->post();
        $this->db->where('id',$id);
        $this->db->update('pemeliharaan',$set);
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('pemeliharaan');
    }
    public function search($search)
    {
        $this->db->select('*');
        $this->db->like('hasil_pemeliharaan',$search);
        $query = $this->db->get("pemeliharaan");
        return $query->result();    
    }

    function getAll($config){
        $this->db->select("`a`.`id` AS `id_aset`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`u`.`username` AS `username`,`l`.`nama_lokasi` AS `nama_lokasi`,`k`.`nama_kategori` AS `nama_kategori`,`j`.`nama_jenis` AS `nama_jenis`,`p`.`id` AS `id`,`p`.`hasil_pemeliharaan` AS `hasil_pemeliharaan`,`p`.`tanggal_pemeliharaan` AS `tanggal_pemeliharaan`,`h`.`nama_hari` AS `nama_hari`,`p`.`no_pemeliharaan` AS `no_pemeliharaan`,`p`.`keterangan` AS `keterangan`");
        $this->db->where("((`p`.`id_aset` = `a`.`id`) and(`p`.`id_hari` = `h`.`id`) and(`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`))");
        $this->db->from("((`pemeliharaan` `p` join `hari` `h`)join((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`))");
        $this->db->limit($config['per_page'], $this->uri->segment(3)); 
        $hasilquery = $this->db->get();
        
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }
    function getPemeliharaanAll(){
        $this->db->select("`a`.`id` AS `id_aset`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`u`.`username` AS `username`,`l`.`nama_lokasi` AS `nama_lokasi`,`k`.`nama_kategori` AS `nama_kategori`,`j`.`nama_jenis` AS `nama_jenis`,`p`.`id` AS `id`,`p`.`hasil_pemeliharaan` AS `hasil_pemeliharaan`,`p`.`tanggal_pemeliharaan` AS `tanggal_pemeliharaan`,`h`.`nama_hari` AS `nama_hari`,`p`.`no_pemeliharaan` AS `no_pemeliharaan`,`p`.`keterangan` AS `keterangan`");
        $this->db->where("((`p`.`id_aset` = `a`.`id`) and(`p`.`id_hari` = `h`.`id`) and(`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`))");
        $this->db->from("((`pemeliharaan` `p` join `hari` `h`)join((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`))");
        $hasilquery = $this->db->get();
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }
    public function getPemeliharaanFilter(){
		return $this->db->query('select `a`.`id` AS `id_aset`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`u`.`username` AS `username`,`l`.`nama_lokasi` AS `nama_lokasi`,`k`.`nama_kategori` AS `nama_kategori`,`p`.`id` AS `id`,`p`.`hasil_pemeliharaan` AS `hasil_pemeliharaan`,`p`.`tanggal_pemeliharaan` AS `tanggal_pemeliharaan` from (`pemeliharaan` `p` join((((`aset` `a` join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`) join `kategori` `k`)) where ((`p`.`id_aset` = `a`.`id`) and(`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`))')->num_rows();
    }
    public  function get_quick_list($s,$config)
	{  
		$this->db->select('h.*, p.*,a.*,j.*,k.*,l.*');
		$this->db->from('pemeliharaan as p');
		$this->db->join('hari as h', 'h.id = p.id_hari','left');
        $this->db->join('aset as a', 'a.id = p.id_aset','left');
        $this->db->join('jenis_asset as j', 'j.id = a.id_jenis','left');
        $this->db->join('kategori as k', 'k.id = a.id_kategori','left');
        $this->db->join('lokasi as l', 'l.id = a.id_lokasi','left');
		if($s['id_hari'] !="")
		$this->db->like('p.id_hari',$s['id_hari'],'both');
		if($s['tanggal_pemeliharaan'] !="")
		$this->db->like('p.tanggal_pemeliharaan',$s['tanggal_pemeliharaan'],'both');
		if($s['kunci'] !="")
		$this->db->like('p.hasil_pemeliharaan', $s['kunci'],'both');
		$this->db->limit($config['per_page'], $this->uri->segment(3)); 
		$hasilquery = $this->db->get();
		if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }
    public  function get_quick_num($s)
	{  
		$this->db->select('h.*, p.*,a.*,j.*,k.*,l.*');
		$this->db->from('pemeliharaan as p');
		$this->db->join('hari as h', 'h.id = p.id_hari','left');
        $this->db->join('aset as a', 'a.id = p.id_aset','left');
        $this->db->join('jenis_asset as j', 'j.id = a.id_jenis','left');
        $this->db->join('kategori as k', 'k.id = a.id_kategori','left');
        $this->db->join('lokasi as l', 'l.id = a.id_lokasi','left');
		if($s['id_hari'] !="")
		$this->db->like('p.id_hari',$s['id_hari'],'both');
		if($s['tanggal_pemeliharaan'] !="")
		$this->db->like('p.tanggal_pemeliharaan',$s['tanggal_pemeliharaan'],'both');
		if($s['kunci'] !="")
		$this->db->like('p.hasil_pemeliharaan', $s['kunci'],'both');
		$hasilquery = $this->db->get();
		return $hasilquery->num_rows();
	}
    public function getIdAset($kode_aset){
        $this->db->where('kode_aset',$kode_aset);
        $query = $this->db->get('aset');
        return $query->result_array();
    }
    public function getAset(){
        $query = $this->db->get('aset');
        if($query->num_rows()>0){	
            return $query->result_array();
        }
    }
    public function getHari(){
        $query = $this->db->get('hari');
        if($query->num_rows()>0){	
            return $query->result_array();
        }
    }
    public function show($id){
		$this->db->select("`a`.`id` AS `id_aset`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`a`.`foto_fisik_aset` AS `foto_fisik_aset`,`u`.`username` AS `username`,`l`.`nama_lokasi` AS `nama_lokasi`,`k`.`nama_kategori` AS `nama_kategori`,`j`.`nama_jenis` AS `nama_jenis`,`p`.`id` AS `id`,`p`.`hasil_pemeliharaan` AS `hasil_pemeliharaan`,`p`.`tanggal_pemeliharaan` AS `tanggal_pemeliharaan`,`h`.`nama_hari` AS `nama_hari`");
        $this->db->where("((`p`.`id_aset` = `a`.`id`) and(`p`.`id_hari` = `h`.`id`) and(`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`))");
        $this->db->from("((`pemeliharaan` `p` join `hari` `h`)join((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`))");
        $query = $this->db->get();
		return $query->row();
	}
}
/* End of file ModelName.php */