<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Pemeliharaan_model');
		$this->load->model('User_admin_model');
		$this->load->model('User_model');
        if($this->session->userdata('logged_in')['role'] != "Admin"){
            redirect("Login");
        }
    }
	public function index()
	{
		if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['role'] != 'Admin') {
                redirect('Login');
            }else{
                $data = [
                    'title' => 'Admin',
                    'username' => $session_data['username'],
                    'role' => $session_data['role'],
                    'id' => $session_data['id'],
                ];
        $id = $data['id'];
        $data['user2'] = $this->User_model->selectAll($id);
		$data['Pemeliharaan'] = $this->Pemeliharaan_model->getPemeliharaanAll();
		
		$this->load->view('admin/Pemeliharaan/index',$data);
			}
	}
}
    public function search()
    {
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$id_user = $data ['id'];
		$data['user2'] = $this->User_model->selectAll($id_user);
        if($this->input->post('search') != null){
            $this->load->model('Pemeliharaan_model');
            $search = $this->Pemeliharaan_model->search($this->input->post('search'));
            $data['pemeliharaan'] = $search;
            $this->load->view('admin/Pemeliharaan/index', $data);
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
		$data["aset"] = $this->Pemeliharaan_model->getAset();
        $data["hari"] = $this->Pemeliharaan_model->getHari();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_pemeliharaan', 'no pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('hasil_pemeliharaan', 'hasil pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('tanggal_pemeliharaan', 'tanggal pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('id_aset', 'aset', 'trim|required');
		$this->form_validation->set_rules('id_hari', 'hari', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/pemeliharaan/create',$data);
		}else{
			$this->Pemeliharaan_model->insert();
			redirect('Pemeliharaan');
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
		$data['pemeliharaan'] = $this->Pemeliharaan_model->getPemeliharaan($id);
		$data["aset"] = $this->Pemeliharaan_model->getAset();
		$data["hari"] = $this->Pemeliharaan_model->getHari();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_pemeliharaan', 'no pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('hasil_pemeliharaan', 'hasil pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('tanggal_pemeliharaan', 'tanggal pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('id_aset', 'aset', 'trim|required');
		$this->form_validation->set_rules('id_hari', 'hari', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/pemeliharaan/edit',$data);
		}else{
			$this->Pemeliharaan_model->update($id);
			redirect('Pemeliharaan');
		}
	}
	public function destroy($id)
	{
		$this->Pemeliharaan_model->delete($id);
		redirect('Pemeliharaan');
	}
	public function downloadLaporan() {
		$this->load->library('pdf');
		$session_data=$this->session->userdata('logged_in');
		$data = [
			'results' => $this->Pemeliharaan_model->getPemeliharaanAll(),
			'username' => $session_data['username'],
			'role' => $session_data['role'],
			'id' => $session_data['id'],
		];
		$id = $data['id'];
		$data['user'] = $this->User_model->selectAll($id);
		$data['pemeliharaan'] = $this->Pemeliharaan_model->getPemeliharaanAll();
		$title='Laporan Pemeliharaan Aset PG. Kebon Agung.pdf';
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->load_view('user/pemeliharaan/cetak_laporan', $data,$title);
	}
}