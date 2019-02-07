<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
    
        public function index()
        {
            // Cek dan kirim notifikasi setiap membuka halaman login
            $semua_pemeliharaan = $this->db->get('pemeliharaan')->result_array();
            $numberDays = 0;

            foreach($semua_pemeliharaan as $pemeliharaan) {
                $now = date('Y-m-d', time());

                $startTimeStamp = strtotime($now);
                $endTimeStamp = strtotime($pemeliharaan['tanggal_pemeliharaan']);

                $timeDiff = abs($endTimeStamp - $startTimeStamp);

                $numberDays = $timeDiff/86400;
                $numberDays = intval($numberDays);

                if($numberDays == 7 || $numberDays == 3) {
                    $cek_notifikasi = $this->db->get_where('daftar_notifikasi', array('tanggal_notifikasi' => $now, 'id_pemeliharaan' => $pemeliharaan['id']))->result_array();

                    if(count($cek_notifikasi) == 0) {
                        send_email('PG. Kebon Agung Malang', 'forselemel4@gmail.com', 'fumukaba@gmail.com', $pemeliharaan['keterangan'], 'Jadwal pemeliharaan dalam ' . $pemeliharaan['keterangan'] . ' sisa ' . $numberDays . ' hari lagi.');

                        $this->db->insert('daftar_notifikasi', array('tanggal_notifikasi' => $now, 'id_pemeliharaan' => $pemeliharaan['id']));
                    }
                }
            }
            // End
        
            $data['title'] = 'Login';
            $this->load->view('user/login', $data);
        }

        public function logout()
        {
            $this->load->library('session');
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();
            redirect('Login','refresh');
        }

        public function cekDb($password)
        {
            $this->load->model('User_model');
            $username = $this->input->post('username'); 
            $result = $this->User_model->login($username,$password);
            if($result){
                $session_array = array();
                foreach ($result as $key) {
                    $session_array = array(
                        'id'=>$key->id,
                        'username'=>$key->username,
                        'nama' => $key->nama,
                        'nip' => $key->nip,
                        'role'=>$key->role
                    );
                    $this->session->set_userdata('logged_in',$session_array);
                }
                return true;
            }else{
                $this->form_validation->set_message('cekDb',"login failed");
                return false;
            }
        }

        public function cekLogin()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDb');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('user/login');
            } else {
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['role'] = $session_data['role'];
                if ($data['role']=='Admin') {
                    redirect('Admin');
                }else{
                    redirect('home');
                }
            }
        }

        // public function kirim() {
            
        // }
    }
    
    /* End of file Controllername.php */
    
?>