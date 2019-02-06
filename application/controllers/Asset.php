<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asset extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Asset_model');
		$this->load->model('Aset_model');
		$this->load->model('User_model');
        if($this->session->userdata('logged_in')['role'] != "Admin"){
            redirect("Login");
        }
    }
	public function index()
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$id = $data ['id'];
		$data['user2'] = $this->User_model->selectAll($id);
		$data['aset'] = $this->Asset_model->select();
		$this->load->view('admin/asset/index',$data);
	}
    public function search()
    {
        if($this->input->post('search') != null){
            $search = $this->Asset_model->search($this->input->post('search'));
            $data = [
                'aset' => $search,
			];
			$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$id = $data ['id'];
		$data['user2'] = $this->User_model->selectAll($id);
            $this->load->view('admin/asset/index', $data);
        }else{
            echo"data tidak ditemukan";
        }
    }
	public function tambah()
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$id = $data ['id'];
		$this->load->helper('url','form');
        $this->load->library('form_validation');
		$data['user2'] = $this->User_model->selectAll($id);
		$data["kategori"] = $this->Aset_model->getKatAset();
		$data["lokasi"] = $this->Aset_model->getLokAset();
		$data["jenis_asset"] = $this->Aset_model->getJenisAset();
		$this->form_validation->set_rules('nama_aset', 'nama aset', 'trim|required');
		$this->form_validation->set_rules('kode_aset', 'kode aset', 'trim|required');
		$this->form_validation->set_rules('tgl_terima', 'tanggal terima', 'trim|required');
		$this->form_validation->set_rules('masa_pemakaian', 'masa pemakaian', 'trim|required');
		$this->form_validation->set_rules('kondisi_awal', 'kondisi awal', 'trim|required');
		$this->form_validation->set_rules('nilai_aset', 'nilai aset', 'trim|required');
		$this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'kategori aset', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'jenis aset', 'trim|required');
		$this->form_validation->set_rules('id_lokasi', 'lokasi aset', 'trim|required');

		
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		
		if ($this->form_validation->run()==FALSE){
			$this->load->view('admin/asset/create',$data);
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
				$this->load->view('admin/asset/create',$data);
			} else {
				$this->Aset_model->insertAset($data['id']);
				echo "<script>alert('Successfully Created'); </script>";
				redirect('asset');
			}
		}
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
		$this->form_validation->set_rules('kode_aset', 'kode aset', 'trim|required');
		$this->form_validation->set_rules('tgl_terima', 'tanggal terima', 'trim|required');
		$this->form_validation->set_rules('masa_pemakaian', 'masa pemakaian', 'trim|required');
		$this->form_validation->set_rules('kondisi_awal', 'kondisi awal', 'trim|required');
		$this->form_validation->set_rules('nilai_aset', 'nilai aset', 'trim|required');
		$this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'kategori aset', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'jenis aset', 'trim|required');
		$this->form_validation->set_rules('id_lokasi', 'lokasi aset', 'trim|required');

		
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		
		if ($this->form_validation->run()==FALSE){
			$this->load->view('admin/aset/create',$data);
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
				$this->load->view('admin/aset/create',$data);
			} else {
				$id = $this->Aset_model->insertAset($data['id']);
				echo "<script>alert('Successfully Created'); </script>";
				redirect('asset');
			}
		}
	}

	public function edit($id)
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$id_user = $data ['id'];
		$data['user2'] = $this->User_model->selectAll($id_user);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_aset','Nama',"required");
		if ($this->form_validation->run() == false) {
			$data['aset'] = $this->Asset_model->select_id($id);
			$this->load->view('admin/asset/edit',$data);
		}else{
			$this->Asset_model->update($id);
			redirect('Asset');
		}
	}
	public function destroy($id)
	{
		$this->Asset_model->delete($id);
		redirect('Asset');
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
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->load_view('user/aset/cetak_laporan', $data, $title);
	}
}