<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_model extends CI_Model {

    public function select()
    {
        return $this->db->get('aset')->result();
    }
    public function select_id($id)
    {
        return $this->db->where('id',$id)->get('aset')->result()[0];
     }

    public function create($error='')
    {
        $data = [
            'error' => $error,
            'aset' => $this->db->get('aset')->result()
        ];
        $this->load->view('admin/asset/create', $data);
    }
    public function insert()
    {
        $set = $this->input->post();
        $this->db->insert('aset',$set);
    }
    public function update($id)
    {
        $set = $this->input->post();
        $this->db->where('id',$id);
        $this->db->update('aset',$set);
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('aset');
    }
    public function search($search)
    {
        $this->db->select('*');
        $this->db->like('nama_aset',$search);
        $query = $this->db->get("aset");
        return $query->result();    
    }
}