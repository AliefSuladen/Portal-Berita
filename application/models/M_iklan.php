<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_iklan extends CI_Model {

    public function lists(){
        $this->db->select('*');
        $this->db->from('tbl_iklan');
        $this->db->order_by('id_iklan', 'DESC');
        return $this->db->get()->result();
    }
    public function detail($id_iklan){
        $this->db->select('*');
        $this->db->from('tbl_iklan');
        $this->db->where('id_iklan', $id_iklan);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tbl_iklan', $data);

    }

    public function edit($data){
        $this->db->where('id_iklan', $data['id_iklan']);
        $this->db->update('tbl_iklan',$data);
    }

    public function delete($data){
        $this->db->where('id_iklan', $data['id_iklan']);
        $this->db->delete('tbl_iklan',$data);
    }

}

/* End of file M_iklan.php */
