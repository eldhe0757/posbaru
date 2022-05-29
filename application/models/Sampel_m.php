<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sampel_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('sampel');
        if($id != null)
        {
            $this->db->where('id_sampel', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_sampel', $id);
        $this->db->delete('sampel');

    }

    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
        ];
        $this->db->insert('sampel', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
        ];
        $this->db->where('id_sampel', $post['id']);
        $this->db->update('sampel', $params);
    }

    public function get_cetak()
    {
        $this->db->select('*');
        $this->db->from('sampel');
        
		$post = $this->db->get();
		return $post;
    }
}