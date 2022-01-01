<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public function all()
    {
        return $this->db->get('customer')->result_array();
    }

    public function add($params)
    {
        return $this->db->insert('customer', $params);
    }

    public function get_data($id)
    {
        return $this->db->get_where('customer', ['id' => $id])->row_array();
    }
    public function get_data_by_id($id)
    {
        return $this->db->get_where('customer', ['id' => $id])->row_array();
    }

    public function update($id_o,$params){
        $this->db->where('id',$id_o);
        $this->db->update('customer', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customer');
    }
}
