<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Aset_model');
        $this->load->model('User_model');
        if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            if($session_data['role'] != 'User') {
                redirect('Home/Admin');
            }
        } else {
            redirect('Login');
        }
	}
	
	public function index()
	{
        $total=$this->Aset_model->getAsetFilter();
        $config['base_url'] = base_url() . "master/index";
        $config['total_rows'] = $total;
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
                'results' => $this->Aset_model->getAll($config),
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
            $this->load->view('user/master', $data);
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
