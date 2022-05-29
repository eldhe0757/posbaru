<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sampel extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('sampel_m');
    }

    public function index()
    {
        $data['row'] = $this->sampel_m->get();
        $this->template->load('template','sampel/data', $data);
    }

    public function del($id)
    {
        $this->sampel_m->del($id);
        if($this->db->affected_rows()>0)
        {
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
        }
        redirect('sampel');
    }

    public function add()
    {
        $sampel = new stdClass();
        $sampel->id_sampel = null;
        $sampel->nama = null;
        $data = array(
            'warna' => 'success',
            'page' => 'Tambah',
            'row' => $sampel
        );

        $this->template->load('template', 'sampel/form', $data);
    }

    public function edit($id)
    {
        $query= $this->sampel_m->get($id);
        if($query->num_rows()>0){
            $sampel = $query->row();
            $data = array(
                'warna' => 'warning',
                'page' => 'Edit',
                'row' => $sampel
            );
            $this->template->load('template', 'sampel/form', $data);
        } else {
            $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
            redirect('sampel');
        }
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->sampel_m->add($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('add','Data Berhasil Disimpan!');
            }
        } else if(isset($_POST['Edit'])){
            $this->sampel_m->edit($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
            }
        }

        redirect('sampel');
    }

    public function cetak(){
        $show_result = $this->sampel_m->get_cetak()->result();

        $data = [
            'result'        => $show_result,
        ];

        $this->load->view('sampel/cetak', $data);
    }
}
