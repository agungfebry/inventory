<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales_model extends CI_Model
{

    public function search_item($item)
    {
        return $this->db
        ->select('*')
        ->from('item')
        ->like('nama_item',$item)
        ->limit(5)
        ->get()->result();
    }

    public function get_item_detail($id){
        return $this->db->get_where('item',['id'=>$id])->row();
    }
}
