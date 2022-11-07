<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_berita');
        $this->load->model('m_kategori');
        
        
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Aferofublik.Com',
            'title2' => 'Data Berita',
            'berita' => $this->m_berita->get_all_data(),
            'isi'   => 'admin/berita/v_list'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add(){
            $this->form_validation->set_rules('nama_berita', 'Nama Berita', 'required');
            $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required');
            $this->form_validation->set_rules('iframe', 'Video Youtube', 'required');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required',array('required'=>'%s Harus DIisi'));
    
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './foto_berita/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('foto_berita'))
                    {
                            $data = array(
                                'title' => 'Aferofublik.Com',
                                'title2' => ' Add Berita',
                                'error' => $this->upload->display_errors(),
                                'kategori'  => $this->m_kategori->get_all_data(),
                                'isi'   => 'admin/berita/v_add'
                            );
                            $this->load->view('admin/layout/v_wrapper',$data,FALSE); 
    
                    }
                    else
                    {
                            $upload_data             = array('uploads' => $this->upload->data());
                            $config['image_library'] = 'gd2';
                            $config['source_image']  = './foto_berita/'.$upload_data['uploads']['file_name'];
                            $this->load->library('image_lib', $config);
    
                            $data = array(
                                'nama_berita' => $this->input->post('nama_berita'),
                                'id_kategori' => $this->input->post('id_kategori'),
                                'iframe' => $this->input->post('iframe'),
                                'slug_berita' => url_title($this->input->post('nama_berita'),'dash',TRUE),
                                'isi_berita' => $this->input->post('isi_berita'),
                                'tgl_berita' => date('Y-m-d'),
                                'id_user'    => $this->session->userdata('id_user'),
                                'foto_berita' => $upload_data['uploads']['file_name']
                                 );
                                 $this->m_berita->add($data);
                                 $this->session->set_flashdata('pesan', 'Berita Berhasil Diposting !!');
                                 redirect('berita');
    
              }
           } 
            $data = array(
                'title' => 'SMA N 14 MUBA',
                'title2' => 'Add Berita',
                'kategori'  => $this->m_kategori->get_all_data(),
                'isi'   => 'admin/berita/v_add'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE); 
        }

        public function edit($id_berita){
            $this->form_validation->set_rules('nama_berita', 'Judul Berita', 'required');
            $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required');
            $this->form_validation->set_rules('iframe', 'Video Youtube', 'required');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required',array('required'=>'%s Harus DIisi'));
    
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './foto_berita/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('foto_berita'))
                    {
                            $data = array(
                                'title' => 'Aferofublik.Com',
                                'title2' => ' Edit Berita',
                                'error' => $this->upload->display_errors(),
                                'kategori'  => $this->m_kategori->get_all_data(),
                                'berita' =>$this->m_berita->detail($id_berita),
                                'isi'   => 'admin/berita/v_edit'
                            );
                            $this->load->view('admin/layout/v_wrapper',$data,FALSE); 
    
                    }
                    else
                    {
                            $upload_data             = array('uploads' => $this->upload->data());
                            $config['image_library'] = 'gd2';
                            $config['source_image']  = './foto_berita/'.$upload_data['uploads']['file_name'];
                            $this->load->library('image_lib', $config);
                            //hapus file gambar lamo
                            $berita=$this->m_berita->detail($id_berita);
                            if ($berita->foto_berita !="") {
                                unlink('./foto_berita/'.$berita->foto_berita);
                            }
                            //end
    
                            $data = array(
                                'id_berita'   =>$id_berita,
                                'nama_berita' => $this->input->post('nama_berita'),
                                'id_kategori' => $this->input->post('id_kategori'),
                                'iframe' => $this->input->post('iframe'),
                                'slug_berita' => url_title($this->input->post('nama_berita'),'dash',TRUE),
                                'isi_berita' => $this->input->post('isi_berita'),
                                'tgl_berita'  => date('Y-m-d'),
                                'id_user'    => $this->session->userdata('id_user'),
                                'foto_berita' => $upload_data['uploads']['file_name']
                                 );
                                 $this->m_berita->edit($data);
                                 $this->session->set_flashdata('pesan', 'Berita Berhasil Direposting !!');
                                 redirect('berita');
    
              }
              $data = array(
                'id_berita'   =>$id_berita,
                'nama_berita' => $this->input->post('nama_berita'),
                'id_kategori' => $this->input->post('id_kategori'),
                'iframe' => $this->input->post('iframe'),
                'slug_berita' => url_title($this->input->post('nama_berita'),'dash',TRUE),
                'isi_berita' => $this->input->post('isi_berita'),
                'tgl_berita'  => date('Y-m-d'),
                'id_user'    => $this->session->userdata('id_user'),
                 );
                 $this->m_berita->edit($data);
                 $this->session->set_flashdata('pesan', 'Berita Berhasil Direposting !!');
                 redirect('berita');
    
           } 
            $data = array(
                'title' => 'Aferofublik.Com',
                'title2' => 'Edit Berita',
                'kategori'  => $this->m_kategori->get_all_data(),
                'berita' =>$this->m_berita->detail($id_berita),
                'isi'   => 'admin/berita/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE); 
        }
    
       
    
        public function delete($id_berita){
             //hapus file gambar lamo
             $berita=$this->m_berita->detail($id_berita);
             if ($berita->foto_berita !="") {
                 unlink('./foto_berita/'.$berita->foto_berita);
             }
             //end
    
             $data = array('id_berita' => $id_berita);
             $this->m_berita->delete($data);
             $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
             redirect('berita');
        }
    
    }



/* End of file Berita.php */
