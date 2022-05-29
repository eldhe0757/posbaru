<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {
    public function kds()
    {
        $sql = "SELECT MAX(MID(kd_supplier,9,4)) AS nos
                FROM supplier
                WHERE MID(kd_supplier,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $row = $query->row();
            $n = ((int)$row->nos) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $ret = "SP".date('ymd').$no;
        return $ret;
    }

    public function get($id = null)
    {
        $this->db->from('supplier');
        if($id != null)
        {
            $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');

    }

    public function add($post)
    {
        $params = [
            'kd_supplier' => $post['kd_supplier'],
            'nama' => $post['nama'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'nm_bank' => $post['nm_bank'],
            'no_rek' => $post['no_rek'],
        ];
        $this->db->insert('supplier', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'nm_bank' => $post['nm_bank'],
            'no_rek' => $post['no_rek'],
        ];
        $this->db->where('id_supplier', $post['id']);
        $this->db->update('supplier', $params);
    }

    public function get_supp_rep()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        
		$post = $this->db->get();
		return $post;
    }
}