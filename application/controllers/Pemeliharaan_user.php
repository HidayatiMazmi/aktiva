<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeliharaan_user extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Aset_model');
        $this->load->model('User_model');
        $this->load->model('Pemeliharaan_model');
        if($this->session->userdata('logged_in')['role'] != "User"){
            redirect("Login");
        }
    }
	public function index()
	{
        $total=$this->Pemeliharaan_model->getPemeliharaanFilter();
        $config['base_url'] = base_url() . "pemeliharaan_user/index";
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
                'results' => $this->Pemeliharaan_model->getAll($config),
                'title' => 'Pemeliharaan',
                'username' => $session_data['username'],
                'role' => $session_data['role'],
                'id' => $session_data['id'],
            ];
            $data["aset"] = $this->Pemeliharaan_model->getAset();
            $data["hari"] = $this->Pemeliharaan_model->getHari();
            $id = $data['id'];
            $data['user'] = $this->User_model->selectAll($id);
            $data['Pemeliharaan'] = $this->Pemeliharaan_model->select();
		    $this->load->view('user/pemeliharaan/index',$data);
        }
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('hasil_pemeliharaan','hasil',"required");
		if ($this->form_validation->run() == false) {
			$this->load->view('user/pemeliharaan/create_new_jadwal');
		}else{
			$this->Pemeliharaan_model->insert();
			redirect('Pemeliharaan_user');
		}
	}
	public function edit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('hasil_pemeliharaan','Nama',"required");
		if ($this->form_validation->run() == false) {
			$data['Pemeliharaan'] = $this->Pemeliharaan_model->select_id($id);
			$this->load->view('user/pemeliharaan/edit_jadwal',$data);
		}else{
			$this->Pemeliharaan_model->update($id);
			redirect('Pemeliharaan_user');
		}
	}

	public function destroy($id)
	{
		$this->Pemeliharaan_model->delete($id);
		redirect('Pemeliharaan_user');
    }

    public function search()
    {
		$s = [
			'id_jenis' => $this->input->post('id_jenis'),
			'id_kategori' => $this->input->post('id_kategori'),
			'id_lokasi' => $this->input->post('id_lokasi'),
			'kunci' => $this->input->post('kunci'),
		];
        if($s != null){
			$search = $this->Aset_model->get_quick_num($s);
			$config['base_url'] = base_url() . "master/index";
			$config['total_rows'] = $search;
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
					'results' =>  $this->Aset_model->get_quick_list($s,$config),
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
				$this->load->view('user/pemeliharaan/index', $data);
			}
		}
		else{
            echo"data tidak ditemukan";
        }
	}
    
}