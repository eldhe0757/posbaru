<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('kategori_m');
    }

    public function index()
    {
        $data['row'] = $this->kategori_m->get();
        $this->template->load('template','kategori/data', $data);
    }

    public function del($id)
    {
        $this->kategori_m->del($id);
        if($this->db->affected_rows()>0)
        {
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
        }
        redirect('kategori');
    }

    public function add()
    {
        $kategori = new stdClass();
        $kategori->id_kategori = null;
        $kategori->kd_ktg = null;
        $kategori->nama = null;
        $data = array(
            'kdsup' => $this->kategori_m->kdk(),
            'warna' => 'success',
            'page' => 'Tambah',
            'disp1' => 'display: ;',
            'disp2' => 'display: none;',
            'row' => $kategori
        );

        $this->template->load('template', 'kategori/form', $data);
    }

    public function edit($id)
    {
        $query= $this->kategori_m->get($id);
        if($query->num_rows()>0){
            $kategori = $query->row();
            $data = array(
                'kdsup' => $this->kategori_m->kdk(),
                'warna' => 'warning',
                'page' => 'Edit',
                'disp1' => 'display: none;',
                'disp2' => 'display: ;',
                'row' => $kategori
            );
            $this->template->load('template', 'kategori/form', $data);
        } else {
            $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
            redirect('kategori');
        }
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->kategori_m->add($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('add','Data Berhasil Disimpan!');
            }
        } else if(isset($_POST['Edit'])){
            $this->kategori_m->edit($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
            }
        }

        redirect('kategori');
    }
}
