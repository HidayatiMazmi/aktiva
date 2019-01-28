<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeliharaan_model extends CI_Model {

    public function select()
    {
        return $this->db->get('pemeliharaan')->result();
    }
    public function select_id($id)
    {
        return $this->db->where('id',$id)->get('pemeliharaan')->result()[0];
    }
    public function insert()
    {
        $set = $this->input->post();
        $this->db->insert('pemeliharaan',$set);
    }
    public function update($id)
    {
        $set = $this->input->post();
        $this->db->where('id',$id);
        $this->db->update('pemeliharaan',$set);
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('pemeliharaan');
    }
    public function search($search)
    {
        $this->db->select('*');
        $this->db->like('hasil_pemeliharaan',$search);
        $query = $this->db->get("pemeliharaan");
        return $query->result();    
    }
}
/* End of file ModelName.php */