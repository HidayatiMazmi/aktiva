<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Aset_model');
        $this->load->model('User_model');
	}
	
	public function index()
	{
        if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['role'] != 'User') {
                redirect('Login');
            }else{
                $data = [
                    'title' => 'User',
                    'username' => $session_data['username'],
                    'role' => $session_data['role'],
                    'id' => $session_data['id'],
                    'countAsetBergerak' => $this->Home_model->_getAllAsetBergerak(),
                    'countAsetNonBergerak' => $this->Home_model->_getAllAsetNonBergerak(),
                    'countAllAset' => $this->Aset_model->getDataAllAset(),
                ];
                $this->load->view('user/index', $data);
            }
        } else {
            redirect('Login');
        }
    }

    public function Admin(){
        if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['role'] != 'Admin') {
                redirect('Login');
            }else{
                $data = [
                    // 'results' => $this->m_home->getAll($config),
                    'title' => 'Admin',
                    'username' => $session_data['username'],
                    'role' => $session_data['role'],
                    'id' => $session_data['id'],
                    'countAsetBergerak' => $this->Home_model->_getAllAsetBergerak(),
                    'countAsetNonBergerak' => $this->Home_model->_getAllAsetNonBergerak(),
                    'countAllAset' => $this->Aset_model->getDataAllAset(),
                ];
                $this->load->view('admin/index', $data);
            }
        } else {
            redirect('Login');
        }
    }
}
