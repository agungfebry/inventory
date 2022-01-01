<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Sales_model');
        $this->load->model('Customer_model');
    }


    public function index()
    {
        $data['content'] = 'admin/sales/index';
        $data['cs']      = $this->Customer_model->all();
        $this->load->view('admin/template/index', $data);
    }

    public function get_item()
    {
        $item = $this->input->post('nama_item');
        $res = $this->Sales_model->search_item($item);

        echo json_encode($res);
    }
    
    public function get_item_detail(){
        $id = $this->input->post('id');
        $res = $this->Sales_model->get_item_detail($id);
        echo json_encode($res);
    }

}
