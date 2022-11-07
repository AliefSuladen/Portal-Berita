<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_iklan');
        
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Aferofublik.Com',
            'title2' => 'Data Sponsor',
            'iklan' => $this->m_iklan->lists(),
            'isi'   => 'admin/iklan/v_list'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
    
    public function add(){
        $this->form_validation->set_rules('nama_iklan', 'Nama Iklan', 'required');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_iklan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('foto_iklan'))
                {
                        $data = array(
                            'title' => 'Aferofublik.Com',
                            'title2' => ' Add Data Sponsor',
                            'error' => $this->upload->display_errors(),
                            'isi'   => 'admin/iklan/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE); 
                }
                else
                {
                        $upload_data             = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image']  = './foto_iklan/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);
                        $data = array(
                            'nama_iklan' => $this->input->post('nama_iklan'),
                            'foto_iklan' => $upload_data['uploads']['file_name']
                             );
                             $this->m_iklan ->add($data);
                             $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
                             redirect('iklan');
          }
       } 

         $data = array(
                            'title' => 'Aferofublik.Com',
                            'title2' => ' Add Data Sponsor',
                            'isi'   => 'admin/iklan/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE); 
    }

    public function edit($id_iklan){
        $this->form_validation->set_rules('nama_iklan', 'Nama Iklan', 'required');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_iklan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('foto_iklan'))
                {
                        $data = array(
                            'title' => 'Aferofublik.Com',
                            'title2' => 'Edit Data Siswa',
                            'error' => $this->upload->display_errors(),
                            'siswa'   => $this->m_iklan->detail($id_iklan),
                            'isi'   => 'admin/iklan/v_edit'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE); 

                }
                else
                {
                        $upload_data             = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image']  = './foto_iklan/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);
                        //hapus file foto lamo
                        $iklan=$this->m_iklan->detail($id_iklan);
                        if ($iklan->foto_iklan !="") {
                            unlink('./foto_iklan/'.$iklan->foto_iklan);
                        }
                        //end
                        $data = array(
                            'id_iklan' => $id_iklan,
                            'nama_iklan' => $this->input->post('nama_iklan'),
                            'foto_iklan' => $upload_data['uploads']['file_name']
                             );
                             $this->m_iklan->edit($data);
                             $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit');
                             redirect('iklan');

          }
          $upload_data             = array('uploads' => $this->upload->data());
          $config['image_library'] = 'gd2';
          $config['source_image']  = './foto_iklan/'.$upload_data['uploads']['file_name'];
          $this->load->library('image_lib', $config);

          $data = array(
              'id_iklan' => $id_iklan,
               );
               $this->m_siswa->edit($data);
               $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit');
               redirect('iklan');
       } 
        $data = array(
            'title' => 'SMA N 14 MUBA',
            'title2' => ' Edit Data Siswa',
            'iklan'   => $this->m_iklan->detail($id_iklan),
            'isi'   => 'admin/iklan/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE); 

    }

    public function delete($id_iklan){
        //hapus file foto lamo
        $iklan=$this->m_iklan->detail($id_iklan);
        if ($iklan->foto_iklan !="") {
            unlink('./foto_iklan/'.$iklan->foto_iklan);
        }
        //end

        $data = array('id_iklan' => $id_iklan);
        $this->m_iklan->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        redirect('iklan');
   }

}

/* End of file Iklan.php */
