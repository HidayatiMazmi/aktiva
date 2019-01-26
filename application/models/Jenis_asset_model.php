<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_asset_model extends CI_Model {

    public function select()
    {
        return $this->db->get('jenis_asset')->result();
    }
    public function select_id($id)
    {
        return $this->db->where('id',$id)->get('jenis_asset')->result()[0];
    }
    public function insert()
    {
        $set = $this->input->post();
        $this->db->insert('jenis_asset',$set);
    }
    public function update($id)
    {
        $set = $this->input->post();
        $this->db->where('id',$id);
        $this->db->update('jenis_asset',$set);
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('jenis_asset');
    }
    public function search($search)
    {
        $this->db->select('*');
        $this->db->like('nama_jenis',$search);
        $query = $this->db->get("jenis_asset");
        return $query->result();    
    }
}
/* End of file ModelName.php */