<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aset_model');
		$this->load->model('User_model');
	}

	public function cek() {
		if($this->session->has_userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			if($session_data['company'] != 'Member') {
				redirect('HomeAdmin');
			}
		} else {
			redirect('Login');
		}
	}
	
	public function index()
	{
		$data['Aset'] = $this->Aset_model->getDataAllAset();
        $this->load->view('user/aset/index',$data);
	}
	
	public function update($id)
	{
		$this->cek();
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
		$this->load->helper('url','form');
        $this->load->library('form_validation');		
		$data['aset'] = $this->Aset_model->getAset($id);
		$data["kategori"] = $this->Aset_model->getKatAset();
		$data["jenis"] = $this->Aset_model->getJenAset();
		$data['pemeliharaan'] = $this->Aset_model->getAsetPemeliharaan($id);
		
		$this->form_validation->set_rules('nama_tutorial', 'nama tutorial', 'trim|required');
		$this->form_validation->set_rules('kat_id', 'kategori tutorial', 'trim|required');
		
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		
		if ($this->form_validation->run()==FALSE){
			$this->load->view('/base_start_member',$data);
		}else{
			if(isset($_FILES['foto_fisik_aset']['name']) && $_FILES['foto_fisik_aset']['name'] != '') {
				$config['upload_path']='./assets/img/';
				$config['allowed_types']='gif|jpg|jpeg|png';
				$config['max_size']=1000000000;
				$config['max_width']=10240;
				$config['max_height']=7680;
				
				$this->load->library('upload', $config);
				if (! $this->upload->do_upload('photo_hasil')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('tutorial/update',$error);
					$this->load->view('layouts/base_end');
				} else {
					$this->Tutorial_model->updateTutorialWithImage($idUser);
					echo "<script>alert('Successfully Updated'); </script>";
					redirect('tutorial/edit/' . $id, 'refresh');
				}
			} else {
				$this->Tutorial_model->updateTutorial($idUser);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('tutorial/edit/' . $id, 'refresh');
			}
		}
	}
	public function delete($id)
	{
		$this->Aset_model->_deleteAset($id);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('Aset/','refresh');
	}
	public function search()
    {
		$s = [
			'jenis_asset' => $this->input->post('jenis_asset'),
			'kategori' => $this->input->post('kategori'),
			'lokasi' => $this->input->post('lokasi'),
			'kunci' => $this->input->post('kunci'),
		];
		print_r($s);
        if($s != null){
			$search = $this->Aset_model->get_quick_list($s);
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
					'results' => $search,
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
				//$this->load->view('user/master', $data);
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
		$data['pemeliharaan'] = $this->Aset_model->getAset($id_aset);
		$id = $data['id'];
		$data['user'] = $this->User_model->selectAll($id);
		$this->load->view('user/aset/show_aset', $data);
	}
}

