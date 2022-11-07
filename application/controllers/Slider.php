<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_slide');
        
    }
    
    public function index()
    {
        $data = array(
            'title' => 'SMA N 14 MUBA',
            'title2' => 'Slider Home',
            'slider'=> $this->m_slide->lists(),
            'isi'   => 'admin/slider/v_list'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);

    }

    public function add(){

        $this->form_validation->set_rules('judul', 'Judul Slider', 'required');
        $this->form_validation->set_rules('isi', 'Isi Slider', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_slider/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('foto'))
                {
                        $data = array(
                            'title' => 'SMA N 14 MUBA',
                            'title2' => ' Add Data Guru',
                            'error' => $this->upload->display_errors(),
                            'isi'   => 'admin/slider/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE); 

                }
                else
                {
                        $upload_data             = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image']  = './foto_slider/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);

                        $data = array(
                            'judul' => $this->input->post('judul'),
                            'isi' => $this->input->post('isi'),
                            'foto' => $upload_data['uploads']['file_name']
                             );
                             $this->m_slide->add($data);
                             $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
                             redirect('slider');

          }
       } 

         $data = array(
                            'title' => 'SMA N 14 MUBA',
                            'title2' => ' Add Slider Home',
                            'isi'   => 'admin/slider/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE); 
    }

    
    
    
    public function delete($id_slider){
        //hapus file foto lamo
        $slider=$this->m_slide->detail($id_slider);
        if ($slider->foto !="") {
            unlink('./foto_slider/'.$slider->foto);
        }
        //end

        $data = array('id_slider' => $id_slider);
        $this->m_slide->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        redirect('slider');
   }
}

/* End of file Slider.php */
