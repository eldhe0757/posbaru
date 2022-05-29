<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_m extends CI_Model {
    public function kcs()
    {
        $sql = "SELECT MAX(MID(kd_cust,9,4)) AS nos
                FROM customer
                WHERE MID(kd_cust,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $row = $query->row();
            $n = ((int)$row->nos) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $ret = "CS".date('ymd').$no;
        return $ret;
    }
    public function get($id = null)
    {
        $this->db->from('customer');
        if($id != null)
        {
            $this->db->where('id_customer', $id);
        }
        $this->db->order_by('id_customer','desc');
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_customer', $id);
        $this->db->delete('customer');

    }

    public function add($post)
    {
        $params = [
            'kd_cust' => $post['kd_cust'],
            'nama' => $post['nama'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
        ];
        $this->db->insert('customer', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
        ];
        $this->db->where('id_customer', $post['id']);
        $this->db->update('customer', $params);
    }

    public function get_cust_rep()
    {
        $this->db->select('*');
        $this->db->from('customer');
        
		$post = $this->db->get();
		return $post;
    }
}