<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aset_model');
	}
	
	public function index()
	{
		$data['Aset'] = $this->Aset_model->getDataAllAset();
        $this->load->view('user/aset/index',$data);
	}
	
	public function update()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
        
		$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
		$this->form_validation->set_rules('no_surat', 'No_surat', 'trim|required');
		$this->form_validation->set_rules('tgl_surat', 'Tgl_Surat', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('id_syarat', 'Syarat', 'trim|required');
		$this->form_validation->set_rules('tgl_mulai', 'Tgl_Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_selesai', 'Tgl_Selesai', 'trim|required');
		$id_surat = $this->input->post('id_surat');
		
		if ($this->form_validation->run()==FALSE){
		}else{
            $this->SPK_model->updateSPK($id_surat);
			echo "<script>alert('Successfully Updated'); </script>";
			redirect('SPK','refresh');
		}
	}
	public function delete($id)
	{
		$this->Aset_model->_deleteAset($id);
		echo "<script>alert('Successfully Deleted'); </script>";
		redirect('Aset/','refresh');
	}
}

