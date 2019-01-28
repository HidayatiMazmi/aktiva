<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asset extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Asset_model');
        if($this->session->userdata('logged_in')['role'] != "Admin"){
            redirect("Login");
        }
    }
	public function index()
	{
		$data['aset'] = $this->Asset_model->select();
		$this->load->view('admin/asset/index',$data);
	}
    public function search()
    {
        if($this->input->post('search') != null){
            $this->load->model('Asset_model');
            $search = $this->Asset_model->search($this->input->post('search'));
            $data = [
                'aset' => $search,
            ];
            $this->load->view('admin/asset/index', $data);
        }else{
            echo"data tidak ditemukan";
        }
    }
	public function tambah()
	{
		$this->load->view('admin/asset/create');
	}
	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Nama_aset','Nama',"required");
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/asset/create');
		}else{
			$this->Asset_model->insert();
			redirect('Asset');
		}
	}
	public function edit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Nama_aset','Nama',"required");
		if ($this->form_validation->run() == false) {
			$data['asset'] = $this->Asset_model->select_id($id);
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
}