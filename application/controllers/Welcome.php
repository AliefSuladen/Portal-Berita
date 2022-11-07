<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_iklan');
		$this->load->model('m_kategori');
		
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Aferofublic.Com',
            'title2' => 'Administrator',
            'iklan'=>$this->m_iklan->lists(),
			'kategori'=>$this->m_kategori->get_all_data(),
            'isi'   => 'v_home'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }
}
