<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aset_model');
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
        if($this->input->post('search') != null){
            $this->load->model('Jenis_asset_model');
            $search = $this->Jenis_asset_model->search($this->input->post('search'));
            $data = [
                'jenis_asset' => $search,
            ];
            $this->load->view('admin/jenis_asset/index', $data);
        }else{
            echo"data tidak ditemukan";
        }
    }
}

