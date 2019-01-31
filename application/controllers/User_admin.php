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
        $this->load->model('User_model');
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
        $data['user1'] = $this->User_admin_model->select();
        $id = $data['id'];
        $data['user2'] = $this->User_model->selectAll($id);
        $this->load->view('admin/user/index',$data);
            }
        }
    }
    public function search()
    {
        if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['role'] != 'Admin') {
                redirect('Login');
            }else{
                
                if($this->input->post('search') != null)
                {
                    $this->load->model('User_admin_model');
                    $search = $this->User_admin_model->search($this->input->post('search'));
                    $data = [
                        'title' => 'Admin',
                        'username' => $session_data['username'],
                        'role' => $session_data['role'],
                        'id' => $session_data['id'],
                        'user1' => $search,
                    ];
                    $id = $data['id'];
                    $data['user2'] = $this->User_model->selectAll($id);
                    $this->load->view('admin/user/index', $data);
                }else
                    {
                    echo"data tidak ditemukan";
                    }
                }
    }
	}
    public function validate($dataval)
    {
        // Validasi
        $rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
			],
			[
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ],
          ];
        $this->form_validation->set_rules($rules);

        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    } 
	public function tambah()
	{
        $session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$id_user = $data ['id'];
		$data['user2'] = $this->User_model->selectAll($id_user);
		$this->load->view('admin/user/create',$data);
	}
	public function create()
	{
        $session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
		$id_user = $data ['id'];
		$data['user2'] = $this->User_model->selectAll($id_user);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','nama',"required");
        $this->form_validation->set_rules('role','role',"required");
        $this->form_validation->set_rules('nip','nip',"required");
		$this->form_validation->set_rules('username','username',"required");
		$this->form_validation->set_rules('password','password',"required");
        $this->form_validation->set_rules('photo','photo',"required");
        $config['upload_path']='./assets/img/upload/';
			$config['allowed_types']='gif|jpg|jpeg|png';
			$config['max_size']=1000000000;
			$config['max_width']=10240;
			$config['max_height']=7680;

			$this->load->library('upload', $config);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/user/create',$data);
		}else{
			$this->User_admin_model->insert();
			$this->load->view('admin/user/index',$data);
		}
	}
	public function update()
	{
		$this->load->view('admin/user/edit');
	}
	public function edit($id)
	{
        $session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
        $data['role']=$session_data['role'];
        $data['id']=$session_data['id'];
        $id_user = $data ['id'];
        $data['user2'] = $this->User_model->selectAll($id_user);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','nama',"required");
        $this->form_validation->set_rules('role','role',"required");
        $this->form_validation->set_rules('nip','nip',"required");
		$this->form_validation->set_rules('username','username',"required");
		$this->form_validation->set_rules('password','password',"required");
        // $this->form_validation->set_rules('photo','photo',"required"); 
        $nama = $this->input->post('nama');
		$role = $this->input->post('role');
        $nip = $this->input->post('nip');
		$username = $this->input->post('username');
        $password = $this->input->post('password');
        $pass = md5($password);
		$photo = $this->input->post('photo');
        $dataval = $nama;
        $errorval = $this->validate($dataval);  
        $config['upload_path']          = './assets/images/faces/';
		 $config['allowed_types']        = 'gif|jpg|png';
		 $config['max_size']             = 1000000000;
		 $config['max_width']            = 10240;
		 $config['max_height']           = 7680;
         $this->load->library('upload', $config);    
         $data['user'] = $this->User_admin_model->select_id($id);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/user/edit',$data);
		}else{
            if ( ! $this->upload->do_upload('photo'))
            {
                $data['error'] = $this->upload->display_errors();
			$this->load->view('admin/user/edit',$data);
            }
            else
            {
                // Insert data
                $object = [
                    'nama' => $nama,
                    'role' => $role,
					'nip' => $nip,
					'username' => $username,
					'password' => $pass,
                    'photo' => $this->upload->data('file_name'),
                    ];
                    $this->User_admin_model->update($id,$object);
                    redirect(User_admin);
            }
		}
	}
	public function store()
    {
		// Ambil value 
		$this->load->library('form_validation');
		$nama = $this->input->post('nama');
		$role = $this->input->post('role');
        $nip = $this->input->post('nip');
		$username = $this->input->post('username');
        $password = $this->input->post('password');
        $pass = md5($password);
		$photo = $this->input->post('photo');
        $dataval = $nama;
        $errorval = $this->validate($dataval);
// Konfigurasi Upload
		 $config['upload_path']          = './assets/images/faces/';
		 $config['allowed_types']        = 'gif|jpg|png';
		 $config['max_size']             = 1000000000;
		 $config['max_width']            = 10240;
		 $config['max_height']           = 7680;
		 $this->load->library('upload', $config);
        if ($errorval==false)
        {
            // Percobaan Upload
            if ( ! $this->upload->do_upload('photo'))
            {
                $error = $this->upload->display_errors();
                $this->create($error);
            }
            else
            {
                // Insert data
                $data = [
                    'nama' => $nama,
                    'role' => $role,
					'nip' => $nip,
					'username' => $username,
					'password' => $pass,
                    'photo' => $this->upload->data('file_name'),
                    ];
                $result = $this->User_admin_model->insert_user($data);
                
                if ($result)
                {
                    redirect(User_admin);
                }
                else
                {
                    $error = array('error' => 'Gagal');
                    $error['kategori'] = $this->db->get('kategori')->result();
                    $this->load->view('admin/user/create', $error);
                }
            }
        }
        else
        {
            $error = validation_errors();
            $this->create($error);
        }
	}
	public function destroy($id)
	{
		$this->User_admin_model->delete($id);
		redirect('User_admin');
	}
}