<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function login($username,$password){
    	$this->db->select('*');
    	$this->db->from('user');
    	$this->db->where('username',$username);
		$this->db->where('password',MD5($password));
		$query =$this->db->get();
		if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
	}
	public function getAsetMember($id){
		$this->db->select("`a`.`id` AS `id`,`a`.`nama_aset` AS `nama_aset`,`a`.`kode_aset` AS `kode_aset`,`a`.`nilai_aset` AS `nilai_aset`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`masa_pemakaian` AS `masa_pemakaian`,`a`.`kondisi_awal` AS `kondisi_awal`,`a`.`keterangan` AS `keterangan`,`a`.`id_kategori` AS `id_kategori`,`a`.`id_jenis` AS `id_jenis`,`a`.`id_lokasi` AS `id_lokasi`,`a`.`id_user` AS `id_user`,`u`.`username` AS `username`,`l`.`nama_lokasi` AS `nama_lokasi`,`k`.`nama_kategori` AS `nama_kategori`,`j`.`nama_jenis` AS `nama_jenis`");
		$this->db->where("((`a`.`id_kategori` = `k`.`id`) and (`a`.`id_user` = `u`.`id`) and (`a`.`id_jenis` = `j`.`id`)and (`a`.`id_lokasi` = `l`.`id`)and (`a`.`id_user` = $id))");
        $this->db->from("((((`aset` `a` join `kategori` `k`) join `jenis_asset` `j`)join `lokasi` `l`)join `user` `u`)");
		$hasilquery = $this->db->get();
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
	}

	public function insertUser()
	{
		$password = $this->input->post('password');
        $pass = md5($password);
        $role = 'User';
        $photo = 'default.png';
		$object = array('username' => $this->input->post('username'),
						'nama' => $this->input->post('nama'), 
						'password' => $pass,
						'role' => $role,
						'photo' => $photo);
		$insert = $this->db->insert('user',$object);
		if (!$insert && $this->db->_error_number()==1062) {
			echo "<script>alert('Username is already used'); </script>";
		}
	}

	public function register($username){
        $this->db->select('username');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }
	
	public function selectAll($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }                        
	}
	
	public function getDataUser()
	{
		$query = $this->db->get('user');
		return $query->result();
		
	}

	public function getUser($id)
	{
		$this->db->select('*');
        $this->db->from('user');
        $this->db->where('role', 'user');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}

	public function updateNoPass($id)
	{
		$object = array('username' => $this->input->post('username'),
						'email' => $this->input->post('email'));
		$this->db->where('id',$id);
		$this->db->update('user', $object);
	}
	
	public function updatePass($id)
    {   
        $password = $this->input->post('password');
        $pass = md5($password);

                $object = array(
                'password' => $pass
            );
            $this->db->where('id', $id);
            $this->db->update('user', $object);

	}
	
	public function updatePic($id)
    {   
                $object = array(
                'photo' => $this->upload->data('file_name')
            );
            $this->db->where('id', $id);
            $this->db->update('user', $object);

	}

	public function list($limit, $start, $search)
    {
		// $this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->join('tbl_spk','tbl_spk.id_user=tbl_user.id_user');
		if($search !='null')
		{
			$this->db->like('username',$search);
			$this->db->or_like('no',$search);
			$this->db->or_like('namaTutorial',$search);
		}
        $query = $this->db->get('tbl_user', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

	public function getTotal($search='')
    {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('tbl_spk','tbl_spk.id_user=tbl_user.id_user');
		if($search !='null')
		{
			$this->db->like('username',$search);
			$this->db->or_like('no',$search);
			$this->db->or_like('perihal',$search);
		}
        $query = $this->db->get('tbl_user', $search);
		return $this->db->count_all('tbl_user');
	}
}
?>