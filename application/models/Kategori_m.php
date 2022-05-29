<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_m extends CI_Model {
    public function kdk()
    {
        $sql = "SELECT MAX(MID(kd_ktg,4,7)) AS nos
                FROM kategori";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $row = $query->row();
            $n = ((int)$row->nos) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $ret = "KTG".$no;
        return $ret;
    }
    public function get($id = null)
    {
        $this->db->from('kategori');
        if($id != null)
        {
            $this->db->where('id_kategori', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');

    }

    public function add($post)
    {
        $params = [
            'kd_ktg' => $post['kd_ktg'],
            'nama' => $post['nama'],
        ];
        $this->db->insert('kategori', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
        ];
        $this->db->where('id_kategori', $post['id']);
        $this->db->update('kategori', $params);
    }
}