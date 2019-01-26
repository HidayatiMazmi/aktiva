<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_admin_model');
        if($this->session->userdata('logged_in')['role'] != "Admin"){
            redirect("Login");
        }
    }
	public function index()
	{
		$data['user'] = $this->User_admin_model->select();
		$this->load->view('admin/user/index',$data);
	}
    public function search()
    {
        if($this->input->post('search') != null){
            $this->load->model('User_admin_model');
            $search = $this->User_admin_model->search($this->input->post('search'));
            $data = [
                'user' => $search,
            ];
            $this->load->view('admin/user/index', $data);
        }else{
            echo"data tidak ditemukan";
        }
	}
	public function tambah()
	{
		$this->load->view('admin/user/create');
	}
	public function create()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules('id','id',"required");
		$this->form_validation->set_rules('username','username',"required");
		$this->form_validation->set_rules('password','password',"required");
        $this->form_validation->set_rules('nama','nama',"required");
        $this->form_validation->set_rules('nip','nip',"required");
        $this->form_validation->set_rules('role','role',"required");
		$this->form_validation->set_rules('photo','photo',"required");
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/user/create');
		}else{
			$this->User_admin_model->insert();
			redirect('User');
		}
	}
	public function update()
	{
		$this->load->view('admin/user/edit');
	}
	public function edit($id)
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules('id','id',"required");
		$this->form_validation->set_rules('username','username',"required");
		$this->form_validation->set_rules('password','password',"required");
        $this->form_validation->set_rules('nama','nama',"required");
        $this->form_validation->set_rules('nip','nip',"required");
        $this->form_validation->set_rules('role','role',"required");
		$this->form_validation->set_rules('photo','photo',"required");
		if ($this->form_validation->run() == false) {
			$data['user'] = $this->User_admin_model->select_id($id);
			$this->load->view('admin/user/edit',$data);
		}else{
			$this->User_admin_model->update($id);
			redirect('User');
		}
	}
	public function destroy($id)
	{
		$this->User_model->delete($id);
		redirect('User');
	}
}