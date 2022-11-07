<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'Aferofublic.Com',
            'title2' => 'Administrator',
            //'galeri' =>$this->m_berita->lists(),
            'isi'   => 'admin/v_home'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

}

/* End of file Admin.php */
