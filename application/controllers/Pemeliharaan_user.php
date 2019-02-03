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
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
        $id = $data ['id'];
		$this->load->helper('url','form');
        $this->load->library('form_validation');
		$data["hari"] = $this->Pemeliharaan_model->getHari();
		$data["aset"] = $this->Pemeliharaan_model->getAset();
		$data['user'] = $this->User_model->selectAll($id);
		$this->form_validation->set_rules('no_pemeliharaan', 'no pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('hasil_pemeliharaan', 'hasil pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('tanggal_pemeliharaan', 'tanggal pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('id_aset', 'aset', 'trim|required');
		$this->form_validation->set_rules('id_hari', 'hari', 'trim|required');
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/pemeliharaan/create_new_jadwal',$data);
		}else{
			$id = $this->Pemeliharaan_model->insertPemeliharaan();
			echo "<script>alert('Successfully Created'); </script>";
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

	public function update($id)
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['role']=$session_data['role'];
		$data['id']=$session_data['id'];
		$id_user = $data ['id'];
		$data['user'] = $this->User_model->selectAll($id_user);
		$this->load->helper('url','form');
        $this->load->library('form_validation');		
		$data['aset'] = $this->Aset_model->getAset($id);
		$data["kategori"] = $this->Aset_model->getKatAset();
		$data["jenis_asset"] = $this->Aset_model->getJenisAset();
		$data["lokasi"] = $this->Aset_model->getLokAset();
		//$data['pemeliharaan'] = $this->Aset_model->getAsetPemeliharaan();
		
		$this->form_validation->set_rules('nama_aset', 'nama aset', 'trim|required');
		$this->form_validation->set_rules('kode_aset', 'kode aset', 'trim|required');
		$this->form_validation->set_rules('tgl_terima', 'tanggal terima', 'trim|required');
		$this->form_validation->set_rules('masa_pemakaian', 'masa pemakaian', 'trim|required');
		$this->form_validation->set_rules('kondisi_awal', 'kondisi awal', 'trim|required');
		$this->form_validation->set_rules('nilai_aset', 'nilai aset', 'trim|required');
		$this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'kategori aset', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'jenis aset', 'trim|required');
		$this->form_validation->set_rules('id_lokasi', 'lokasi aset', 'trim|required');
		
		//$this->tgl_lahir=date('Y-m-d', strtotime($this->tgl_lahir));
		$config['upload_path']='./assets/img/aset/';
            $config['allowed_types']='gif|jpg|jpeg|png';
            $config['max_size']=1000000000;
            $config['max_width']=10240;
            $config['max_height']=7680;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
		if ($this->form_validation->run()==FALSE){
			$this->load->view('user/pemeliharaan/edit_jadwal',$data);
		}else{
			if(isset($_FILES['foto_fisik_aset']['name']) && $_FILES['foto_fisik_aset']['name'] != '') {
				if (! $this->upload->do_upload('foto_fisik_aset')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('user/pemeliharaan/edit_jadwal',$data);
				} else {
					$this->Aset_model->updateAsetWithImage($id);
					echo "<script>alert('Successfully Updated'); </script>";
					redirect('master', 'refresh');
				}
			} else {
				$this->Aset_model->updateAset($id);
				echo "<script>alert('Successfully Updated'); </script>";
				redirect('master', 'refresh');
			}
		}
	}

	public function delete($id)
	{
		$this->Pemeliharaan_model->delete($id);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('Pemeliharaan_user','refresh');
	}

    public function search()
    {
		$s = [
			'id_hari' => $this->input->post('id_hari'),
			'tanggal_pemeliharaan' => $this->input->post('tanggal_pemeliharaan'),
			'kunci' => $this->input->post('kunci'),
		];
        if($s != null){
			$search = $this->Pemeliharaan_model->get_quick_num($s);
			$config['base_url'] = base_url() . "pemeliharaan_user/index";
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
					'results' =>  $this->Pemeliharaan_model->get_quick_list($s,$config),
					'title' => 'Master',
					'username' => $session_data['username'],
					'role' => $session_data['role'],
					'id' => $session_data['id'],
				];
				$data["hari"] = $this->Pemeliharaan_model->getHari();
				$id = $data['id'];
				$data['user'] = $this->User_model->selectAll($id);
				$this->load->view('user/pemeliharaan/index', $data);
			}
		}
		else{
            echo"data tidak ditemukan";
        }
	}

	public function show($id_pemeliharaan)
	{
      	$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$data['pemeliharaan'] = $this->Pemeliharaan_model->show($id_pemeliharaan);
		//$data['aset'] = $this->Pemeliharaan_model->getAset($id_pemeliharaan);
		$id = $data['id'];
		$data['user'] = $this->User_model->selectAll($id);
		$this->load->view('user/pemeliharaan/show_jadwal', $data);
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