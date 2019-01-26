<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

    public function select()
    {
        return $this->db->get('lokasi')->result();
    }
    public function select_id($id)
    {
        return $this->db->where('id',$id)->get('lokasi')->result()[0];
    }
    public function insert()
    {
        $set = $this->input->post();
        $this->db->insert('lokasi',$set);
    }
    public function update($id)
    {
        $set = $this->input->post();
        $this->db->where('id',$id);
        $this->db->update('lokasi',$set);
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('lokasi');
    }
    public function search($search)
    {
        $this->db->select('*');
        $this->db->like('nama_lokasi',$search);
        $query = $this->db->get("lokasi");
        return $query->result();    
    }
}
/* End of file ModelName.php */