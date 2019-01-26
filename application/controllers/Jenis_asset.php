<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_asset extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_asset_model');
        if($this->session->userdata('logged_in')['role'] != "Admin"){
            redirect("Login");
        }
    }
	public function index()
	{

		$data['jenis_asset'] = $this->Jenis_asset_model->select();
		$this->load->view('admin/jenis_asset/index',$data);
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

	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_jenis','Nama',"required");
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/jenis_asset/create');
		}else{
			$this->Jenis_asset_model->insert();
			redirect('jenis_asset');
		}
	}
	public function edit($id)
	{
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
