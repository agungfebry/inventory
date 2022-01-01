<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_model extends CI_Model
{

    public function all()
    {
        return $this->db->get('item')->result_array();
    }

    public function add($params)
    {
        return $this->db->insert('item',$params);
    }

    public function update($id_o,$params){
        $this->db->where('id',$id_o);
        $this->db->update('item',$params);
    }

    public function delete($id){
        $this->db->delete('item',['id'=>$id]);
    }

    public function get($id){
        return $this->db->get_where('item',['id'=>$id])->row_array();
    }
    public function get_data_by_id($id_o){
        return $this->db->get_where('item',['id'=>$id_o])->row_array();
    }
}
