<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Aferofublik.Com',
            'title2' => 'Data Kategori',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi'   => 'admin/kategori/v_list'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add(){
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Aferofublik.Com',
                'title2' => 'Add Kategori',
                'isi'   => 'admin/kategori/v_add'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE);
        }else {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
             );
            $this->m_kategori->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!');
            redirect('kategori');
        
        }
    }

    public function edit($id_kategori){
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Aferofublik.Com',
                'title2' => 'Edit Kategori',
                'kategori' =>$this->m_kategori->detail($id_kategori),
                'isi'   => 'admin/kategori/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE);
        }else {
            $data = array(
                'id_kategori'   => $id_kategori,
                'nama_kategori' => $this->input->post('nama_kategori'),
             );
            $this->m_kategori->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!!');
            redirect('kategori');
        
        }
    }
    public function delete($id_kategori){
        $data = array(
            'id_kategori'   => $id_kategori,
         );
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Delete!!');
        redirect('kategori');
    }


}

/* End of file Kategori.php */
