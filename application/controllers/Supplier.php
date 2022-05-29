<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('supplier_m');
    }

    public function index()
    {
        $data['row'] = $this->supplier_m->get();
        $this->template->load('template','supplier/data', $data);
    }

    public function del($id)
    {
        $this->supplier_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0) {
            $this->session->set_flashdata('error','Data Tidak Dapat Dihapus! (Data Berelasi!)');
        }
        else
        {
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
        }
        redirect('supplier');
    }

    public function add()
    {
        $supplier = new stdClass();
        $supplier->id_supplier = null;
        $supplier->kd_supplier = null;
        $supplier->nama = null;
        $supplier->no_telp = null;
        $supplier->alamat = null;
        $supplier->nm_bank = null;
        $supplier->no_rek = null;
        $data = array(
            'kdsup' => $this->supplier_m->kds(),
            'warna' => 'success',
            'page' => 'Tambah',
            'disp1' => 'display: ;',
            'disp2' => 'display: none;',
            'row' => $supplier
        );

        $this->template->load('template', 'supplier/form', $data);
    }

    public function edit($id)
    {
        $query= $this->supplier_m->get($id);
        if($query->num_rows()>0){
            $supplier = $query->row();
            $data = array(
                'kdsup' => $this->supplier_m->kds(),
                'warna' => 'warning',
                'page' => 'Edit',
                'disp1' => 'display: none;',
                'disp2' => 'display: ;',
                'row' => $supplier
            );
            $this->template->load('template', 'supplier/form', $data);
        } else {
            $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
            redirect('supplier');
        }
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->supplier_m->add($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('add','Data berhasil Disimpan!');
            }
        } else if(isset($_POST['Edit'])){
            $this->supplier_m->edit($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
            }
        }
        redirect('supplier');
    }

    public function laporan(){
        $show_result = $this->supplier_m->get_supp_rep()->result();


        $data = [
            'result'        => $show_result,
        ];

        $this->template->load('template','supplier/laporan', $data);
    }

    public function cetak(){
        $show_result = $this->supplier_m->get_supp_rep()->result();

        $data = [
            'result'        => $show_result,
        ];

        $this->load->view('supplier/cetak', $data);
    }
}
