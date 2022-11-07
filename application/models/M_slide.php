<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_slide extends CI_Model {

    
    public function lists(){
        $this->db->select('*');
        $this->db->from('tbl_slide');
        $this->db->order_by('id_slider', 'DESC');
        return $this->db->get()->result();
        
        
    }
    public function detail($id_slider){
        $this->db->select('*');
        $this->db->from('tbl_slide');
        $this->db->where('id_slider', $id_slider);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tbl_slide', $data);

    }
    public function edit($data){
        $this->db->where('id_slider', $data['id_slider']);
        $this->db->update('tbl_slide',$data);
    }
    
    public function delete($data){
        $this->db->where('id_slider', $data['id_slider']);
        $this->db->delete('tbl_slide',$data);
    }

}

/* End of file M_slide.php */
