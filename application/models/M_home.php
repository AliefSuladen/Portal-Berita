<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

    public function iklan(){
        $this->db->select('*');
        $this->db->from('tbl_iklan');
        $this->db->order_by('id_iklan', 'DESC');
        return $this->db->get()->result();
        
        
    }

}

/* End of file M_home.php */
