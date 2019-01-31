<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin_model extends CI_Model {

    public function select()
    {
        return $this->db->get('user')->result();
    }
    public function select_id($id)
    {
        return $this->db->where('id',$id)->get('user')->result()[0];
    }
    public function insert_user($data = [])
    {
        $set['password'] = md5($set['password']);
        $result = $this->db->insert('user', $data);
        return $result;
    }
    public function insert()
    {
        $password = $this->input->post('password');
        $pass = md5($password);
        $object = array('nama' => $this->input->post('nama'),
                        'nip' => $this->input->post('nip'),
                        'username' => $this->input->post('username'),
						'role' => $this->input->post('role'), 
						'password' => $pass,
						'photo' => $this->upload->data('file_name'));
        $this->db->insert('user',$object);
    }
    public function update($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('user',$data);
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('user');
    }
    public function search($search)
    {
        $this->db->select('*');
        $this->db->like('nama',$search);
        $query = $this->db->get("user");
        return $query->result();    
    }
}
/* End of file ModelName.php */