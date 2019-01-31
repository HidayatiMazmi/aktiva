<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Lokasi_model');
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
		$data['lokasi'] = $this->Lokasi_model->select();
		$this->load->view('admin/lokasi/index',$data);
	}

    public function search()
    {
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$id = $data ['id'];
		$data['user2'] = $this->User_model->selectAll($id);
        if($this->input->post('search') != null){
            $this->load->model('Lokasi_model');
			$search = $this->Lokasi_model->search($this->input->post('search'));
			$data['lokasi'] = $search;
            $this->load->view('admin/lokasi/index', $data);
        }else{
            echo"data tidak ditemukan";
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
		$this->form_validation->set_rules('nama_lokasi','Nama',"required");
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/lokasi/create',$data);
		}else{
			$this->Lokasi_model->insert();
			redirect('lokasi');
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
		$this->form_validation->set_rules('nama_lokasi','Nama',"required");
		if ($this->form_validation->run() == false) {
			$data['lokasi'] = $this->Lokasi_model->select_id($id);
			$this->load->view('admin/lokasi/edit',$data);
		}else{
			$this->Lokasi_model->update($id);
			redirect('lokasi');
		}
	}

	public function destroy($id)
	{
		$this->Lokasi_model->delete($id);
		redirect('Lokasi');
	}
}