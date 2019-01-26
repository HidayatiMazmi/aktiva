<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pemeliharaan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemeliharaan_model');
        if($this->session->userdata('logged_in')['role'] != "Admin"){
            redirect("Login");
        }
    }
	public function index()
	{

		$data['pemeliharaan'] = $this->Pemeliharaan_model->select();
		$this->load->view('admin/pemeliharaan/index',$data);
	}
    public function search()
    {
        if($this->input->post('search') != null){
            $this->load->model('Pemeliharaan_model');
            $search = $this->Pemeliharaan_model->search($this->input->post('search'));
            $data = [
                'pemeliharaan' => $search,
            ];
            $this->load->view('admin/pemeliharaan/index', $data);
        }else{
            echo"data tidak ditemukan";
        }
    }
	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_pemeliharaan','Nama',"required");
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/pemeliharaan/create');
		}else{
			$this->Pemeliharaan_model->insert();
			redirect('pemeliharaan');
		}
	}
	public function edit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_pemeliharaan','Nama',"required");
		if ($this->form_validation->run() == false) {
			$data['pemeliharaan'] = $this->Pemeliharaan_model->select_id($id);
			$this->load->view('admin/pemeliharaan/edit',$data);
		}else{
			$this->Pemeliharaan_model->update($id);
			redirect('pemeliharaan');
		}
	}
	public function destroy($id)
	{
		$this->Pemeliharaan_model->delete($id);
		redirect('pemeliharaan');
	}
}