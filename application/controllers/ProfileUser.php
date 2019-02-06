<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileUser extends CI_Controller {
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
    } 

	public function index()
	{
		$session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
        $data['title'] = 'Profile';
        $this->load->model('User_model');
        $id = $data['id'];
        $data['user'] = $this->User_model->selectAll($id);
        $data['aset'] = $this->User_model->getAsetMember($id);
        $this->load->view('user/profile', $data);
	}

	public function updatePhoto(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('User_model');

        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];
        $id = $data['id'];
        
            $config['upload_path']='./assets/img/';
            $config['allowed_types']='gif|jpg|jpeg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;

            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('photo')) {
                redirect('MemberDetail','refresh');
                
            }else{
                $this->User_model->updatePic($id);
                echo "<script>alert('Successfully Updated'); </script>";
                redirect('MemberDetail','refresh');
        	}
    	}

		public function update()
	    {
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];

        $id = $data['id'];

		$this->load->model('User_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $session_data=$this->session->userdata('logged_in');
        $data1['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];

        $this->load->model('User_model');
        $id = $data['id'];
        $data['username'] = $this->User_model->selectAll($id);

        $this->load->view('layouts/base_start_member', $data1);
        $this->load->view('member/profile', $data);
        $this->load->view('layouts/base_end'); 
        } else {
        	    $this->User_model->updateNoPass($id);
                $session_data['username'] = $this->input->post('username');
                $data['username']=$session_data['username'];
                  echo "<script>alert('Successfully Updated'); </script>";
                  redirect('MemberDetail','refresh');
	   }
    }

    public function updatePass()
        {
        $session_data=$this->session->userdata('logged_in');
        $data1['username']=$session_data['username'];
        $data['company']=$session_data['company'];
        $data['id']=$session_data['id'];

        $id = $data['id'];

        $this->load->model('User_model');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('old', 'Old Password', 'trim|required|callback_cekDb');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
        $data['username'] = $this->User_model->selectAll($id);

        $this->load->view('layouts/base_start_member', $data1);
        $this->load->view('member/profile', $data);
        $this->load->view('layouts/base_end'); 
        } else {
            $old = $this->input->post('old');
            $new = $this->input->post('password');
            $confirm = $this->input->post('confirm');
            
            if ($new == $confirm){
            $this->User_model->updatePass($id);
            $session_data['username'] = $this->input->post('username');
            $session_data['password'] = MD5($this->input->post('password'));
            $data['username']=$session_data['username'];
            $data['password']=$session_data['password'];
            echo "<script>alert('Successfully Updated'); </script>";
            redirect('MemberDetail','refresh');
            }
       }
    }

            public function cekDb($password)
        {
            $session_data=$this->session->userdata('logged_in');
            $this->load->model('User_model');
            $username = $session_data['username'];
            $result = $this->User_model->login($username,$password);
            if($result){
                return true;
            }else{
                $this->form_validation->set_message('cekDb',"Old Password Wrong");
                return false;
            }
        }
}
