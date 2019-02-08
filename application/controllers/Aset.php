<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			if($session_data['role'] != 'User') {
				redirect('Login');
			}
		} else {
			redirect('Login');
		}
		$this->load->model('Aset_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$data['Aset'] = $this->Aset_model->getDataAllAset();
        $this->load->view('user/aset/index',$data);
	}

	public function create()
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
        $id = $data ['id'];
		$this->load->helper('url','form');
        $this->load->library('form_validation');
		$data["kategori"] = $this->Aset_model->getKatAset();
		$data["lokasi"] = $this->Aset_model->getLokAset();
		$data["jenis_asset"] = $this->Aset_model->getJenisAset();
		$data['user'] = $this->User_model->selectAll($id);
		$this->form_validation->set_rules('nama_aset', 'nama aset', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('tahun_perolehan', 'tahun perolehan', 'trim|required');
		$this->form_validation->set_rules('masa_manfaat', 'masa manfaat', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'kategori aset', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'jenis aset', 'trim|required');
		$this->form_validation->set_rules('id_lokasi', 'lokasi aset', 'trim|required');

		
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/aset/create_new_aset',$data);
		}else{
			$config['upload_path']='./assets/img/aset/';
            $config['allowed_types']='gif|jpg|jpeg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (! $this->upload->do_upload('foto_fisik_aset')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('user/aset/create_new_aset',$data);
			} else {
				$id = $this->Aset_model->insertAset($data['id']);
				echo "<script>alert('Successfully Created'); </script>";
				redirect('aset/show/' . $id);
			}
		}
	}

	public function createAset()
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
        $id = $data ['id'];
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$data['aset'] = $this->Aset_model->getAsetKendaraan();
		$data["kategori"] = $this->Aset_model->getKatAset();
		$data["lokasi"] = $this->Aset_model->getLokAset();
		$data["jenis_asset"] = $this->Aset_model->getJenisAset();
		$data['user'] = $this->User_model->selectAll($id);
		$this->form_validation->set_rules('nama_aset', 'nama aset', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('tahun_perolehan', 'tahun perolehan', 'trim|required');
		$this->form_validation->set_rules('masa_manfaat', 'masa manfaat', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'kategori aset', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'jenis aset', 'trim|required');
		$this->form_validation->set_rules('id_lokasi', 'lokasi aset', 'trim|required');

		
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/aset/create_new_aset_kendaraan',$data);
		}else{
			$config['upload_path']='./assets/img/aset/';
            $config['allowed_types']='gif|jpg|jpeg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (! $this->upload->do_upload('foto_fisik_aset')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('user/aset/create_new_aset_kendaraan',$data);
			} else {
				$this->Aset_model->insertAset($data['id']);
				echo "<script>alert('Successfully Created'); </script>";
				redirect('aset/createAsetKendaraan/');
			}
		}
	}

	public function createAsetKendaraan()
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
		$data['id']=$session_data['id'];
        $id = $data ['id'];
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$data['aset'] = $this->Aset_model->getAsetKendaraan();
		$data["kategori"] = $this->Aset_model->getKatAset();
		$data["lokasi"] = $this->Aset_model->getLokAset();
		$data["jenis_asset"] = $this->Aset_model->getJenisAset();
		$data['user'] = $this->User_model->selectAll($id);
		$this->form_validation->set_rules('id_aset', 'aset', 'trim|required');
		$this->form_validation->set_rules('no_polisi', 'nomor polisi', 'trim|required');
		$this->form_validation->set_rules('no_rangka', 'nomor rangka', 'trim|required');
		$this->form_validation->set_rules('no_mesin', 'nomor mesin', 'trim|required');
		$this->form_validation->set_rules('tanggal_pembelian', 'tanggal pembelian', 'trim|required');
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/aset/create_new_aset_kendaraan',$data);
		}else{
				$id_kendaraan = $this->Aset_model->insertKendaraan();
				echo "<script>alert('Successfully Created'); </script>";
				redirect('aset/showAsetKendaraan/' . $id_kendaraan);
		}
	}
	
	public function update($id)
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['role']=$session_data['role'];
		$data['id']=$session_data['id'];
		$id_user = $data ['id'];
		$data['user'] = $this->User_model->selectAll($id_user);
		$this->load->helper('url','form');
        $this->load->library('form_validation');		
		$data['aset'] = $this->Aset_model->getAset($id);
		$data["kategori"] = $this->Aset_model->getKatAset();
		$data["jenis_asset"] = $this->Aset_model->getJenisAset();
		$data["lokasi"] = $this->Aset_model->getLokAset();
		//$data['pemeliharaan'] = $this->Aset_model->getAsetPemeliharaan();
		
		$this->form_validation->set_rules('nama_aset', 'nama aset', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('tahun_perolehan', 'tahun perolehan', 'trim|required');
		$this->form_validation->set_rules('masa_manfaat', 'masa manfaat', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'kategori aset', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'jenis aset', 'trim|required');
		$this->form_validation->set_rules('id_lokasi', 'lokasi aset', 'trim|required');
		
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		$config['upload_path']='./assets/img/aset/';
            $config['allowed_types']='gif|jpg|jpeg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/aset/edit_aset',$data);
		}else{
			if(isset($_FILES['foto_fisik_aset']['name']) && $_FILES['foto_fisik_aset']['name'] != '') {
				if (! $this->upload->do_upload('foto_fisik_aset')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('user/aset/edit_aset',$data);
				} else {
					$this->Aset_model->updateAsetWithImage($id);
					echo "<script>alert('Successfully Updated'); </script>";
					redirect('master', 'refresh');
				}
			} else {
				$this->Aset_model->updateAset($id);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('master', 'refresh');
			}
		}
	}
	public function updateAset($id)
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['role']=$session_data['role'];
		$data['id']=$session_data['id'];
		$id_user = $data ['id'];
		$data['user'] = $this->User_model->selectAll($id_user);
		$this->load->helper('url','form');
        $this->load->library('form_validation');		
		$data['aset'] = $this->Aset_model->getAset($id);
		$data['kendaraan'] = $this->Aset_model->getKendaraan($id);
		$data["kategori"] = $this->Aset_model->getKatAset();
		$data["jenis_asset"] = $this->Aset_model->getJenisAset();
		$data["lokasi"] = $this->Aset_model->getLokAset();
		//$data['pemeliharaan'] = $this->Aset_model->getAsetPemeliharaan();
		
		$this->form_validation->set_rules('nama_aset', 'nama aset', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('tahun_perolehan', 'tahun perolehan', 'trim|required');
		$this->form_validation->set_rules('masa_manfaat', 'masa pemakaian', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'kategori aset', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'jenis aset', 'trim|required');
		$this->form_validation->set_rules('id_lokasi', 'lokasi aset', 'trim|required');
		
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		$config['upload_path']='./assets/img/aset/';
            $config['allowed_types']='gif|jpg|jpeg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/aset/edit_aset_kendaraan',$data);
		}else{
			if(isset($_FILES['foto_fisik_aset']['name']) && $_FILES['foto_fisik_aset']['name'] != '') {
				if (! $this->upload->do_upload('foto_fisik_aset')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('user/aset/edit_aset_kendaraan',$data);
				} else {
					$this->Aset_model->updateAsetWithImage($id);
					echo "<script>alert('Successfully Updated'); </script>";
					redirect('master', 'refresh');
				}
			} else {
				$this->Aset_model->updateAset($id);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('master', 'refresh');
			}
		}
	}
	public function updateKendaraan($id_aset)
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['role']=$session_data['role'];
		$data['id']=$session_data['id'];
		$id_user = $data ['id'];
		$data['user'] = $this->User_model->selectAll($id_user);
		$this->load->helper('url','form');
		$this->load->library('form_validation');		
		$data['kendaraan'] = $this->Aset_model->getKendaraan($id_aset);
		$data['aset'] = $this->Aset_model->getAset($id_aset);
		$data["kategori"] = $this->Aset_model->getKatAset();
		$data["jenis_asset"] = $this->Aset_model->getJenisAset();
		$data["lokasi"] = $this->Aset_model->getLokAset();
		$this->form_validation->set_rules('no_polisi', 'nomor polisi', 'trim|required');
		$this->form_validation->set_rules('no_rangka', 'nomor rangka', 'trim|required');
		$this->form_validation->set_rules('no_mesin', 'nomor mesin', 'trim|required');
		$this->form_validation->set_rules('tanggal_pembelian', 'tanggal pembelian', 'trim|required');
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/aset/edit_aset_kendaraan',$data);
		}else{
				$this->Aset_model->updateKendaraan($id_aset);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('master', 'refresh');
		}
	}
	public function delete($id)
	{
		$this->Aset_model->_deleteAset($id);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('Master','refresh');
	}
	public function deleteAsetKendaraan($id)
	{
		$this->Aset_model->_deleteAsetKendaraan($id);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('Master','refresh');
	}
	public function search()
    {
		$s = [
			'id_jenis' => $this->input->post('id_jenis'),
			'id_kategori' => $this->input->post('id_kategori'),
			'id_lokasi' => $this->input->post('id_lokasi'),
			'kunci' => $this->input->post('kunci'),
		];
        if($s != null){
			$search = $this->Aset_model->get_quick_num($s);
			$config['base_url'] = base_url() . "master/index";
			$config['total_rows'] = $search;
			$config['per_page'] = 3;
			$config['num_links'] = 2;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$this->pagination->initialize($config);
			if($this->session->userdata('logged_in')){
				$session_data=$this->session->userdata('logged_in');
				$data = [
					'results' =>  $this->Aset_model->get_quick_list($s,$config),
					'title' => 'Master',
					'username' => $session_data['username'],
					'role' => $session_data['role'],
					'id' => $session_data['id'],
				];
				$data["kategori"] = $this->Aset_model->getKatAset();
				$data["lokasi"] = $this->Aset_model->getLokAset();
				$data["jenis_asset"] = $this->Aset_model->getJenisAset();
				$id = $data['id'];
				$data['user'] = $this->User_model->selectAll($id);
				$this->load->view('user/aset/index', $data);
			}
		}
		else{
            echo"data tidak ditemukan";
        }
	}
	public function show($id_aset)
	{
      	$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$data['aset'] = $this->Aset_model->show($id_aset);
		$id = $data['id'];
		$data['user'] = $this->User_model->selectAll($id);
		$this->load->view('user/aset/show_aset', $data);
	}
	// public function showAset($id_kendaraan)
	// {
    //   	$session_data=$this->session->userdata('logged_in');
	// 	$data['username']=$session_data['username'];
    //     $data['role']=$session_data['role'];
    //     $data['id']=$session_data['id'];
	// 	$data['aset'] = $this->Aset_model->show($id_aset);
	// 	$id = $data['id'];
	// 	$data['user'] = $this->User_model->selectAll($id);
	// 	$this->load->view('user/aset/show_aset', $data);
	// }
	public function showAsetKendaraan($id)
	{
      	$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$data['aset'] = $this->Aset_model->showAset($id);
		$data['kendaraan'] = $this->Aset_model->showKendaraan($id);
		$id = $data['id'];
		$data['user'] = $this->User_model->selectAll($id);
		$this->load->view('user/aset/show_aset_kendaraan', $data);
	}
	public function downloadLaporan() {
		$this->load->library('pdf');
		$session_data=$this->session->userdata('logged_in');
		$data = [
			'results' => $this->Aset_model->getAsetAll(),
			'username' => $session_data['username'],
			'role' => $session_data['role'],
			'id' => $session_data['id'],
		];
		$id = $data['id'];
		$data['user'] = $this->User_model->selectAll($id);
		$title='Laporan Semua Aset PG. Kebon Agung.pdf';
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->load_view('user/aset/cetak_laporan', $data, $title);
	}
	public function downloadLaporanPerAset($id_aset) {
		$this->load->library('pdf');
		$session_data=$this->session->userdata('logged_in');
		$data = [
			'results' => $this->Aset_model->getAsetAll(),
			'username' => $session_data['username'],
			'role' => $session_data['role'],
			'id' => $session_data['id'],
		];
		$id = $data['id'];
		$title='Laporan Aset PG. Kebon Agung.pdf';
		$data['user'] = $this->User_model->selectAll($id);
		$data['aset'] = $this->Aset_model->show($id_aset);
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->load_view('user/aset/cetak_per_aset', $data, $title);
	}
}