<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_asset extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Jenis_asset_model');
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
		$data['jenis_asset'] = $this->Jenis_asset_model->select();
		$this->load->view('admin/jenis_asset/index',$data);
	}

    public function search()
    {
		if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['role'] != 'Admin') {
                redirect('Login');
            }else{
                
				if($this->input->post('search') != null){
					$this->load->model('Jenis_asset_model');
					$search = $this->Jenis_asset_model->search($this->input->post('search'));
                    $data = [
                        'title' => 'Admin',
                        'username' => $session_data['username'],
                        'role' => $session_data['role'],
						'id' => $session_data['id'],
						'jenis_asset' => $search,
                    ];
                    $id = $data['id'];
                    $data['user2'] = $this->User_model->selectAll($id);
					$this->load->view('admin/jenis_asset/index',$data);
				}else{
					echo"data tidak ditemukan";
				}
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
		$data['user2'] = $this->User_model->selectAll($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_jenis','Nama',"required");
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/jenis_asset/create',$data);
		}else{
			$this->Jenis_asset_model->insert();
			redirect('jenis_asset');
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
		$this->form_validation->set_rules('nama_jenis','Nama',"required");
		if ($this->form_validation->run() == false) {
			$data['jenis_asset'] = $this->Jenis_asset_model->select_id($id);
			$this->load->view('admin/jenis_asset/edit',$data);
		}else{
			$this->Jenis_asset_model->update($id);
			redirect('jenis_asset');
		}
	}

	public function destroy($id)
	{
		$this->Jenis_asset_model->delete($id);
		redirect('jenis_asset');
	}
}
