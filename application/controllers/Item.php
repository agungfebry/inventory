<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Item_model');
    }


    public function index()
    {
        $data['content'] = 'admin/item/index';
        $data['item']    = $this->Item_model->all();
        $this->load->view('admin/template/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_item', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('unit', 'Unit', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga Satuan', 'trim|required');

        if ($this->form_validation->run()) {

            if (isset($_FILES['images']['name'])) {
                $config['upload_path']   = './uploads/item/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['overwrite']     = true;
                $config['size']          = 2000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('images')) {
                    $data   = $this->upload->data();
                }

                $params = [
                    'nama_item' => $this->input->post('nama_item'),
                    'unit'      => $this->input->post('unit'),
                    'stock'     => $this->input->post('stock'),
                    'harga'     => $this->input->post('harga'),
                    'images'    => $data['file_name']
                ];

                $this->Item_model->add($params);
                $this->session->set_flashdata('success', 'Sukses Menambah Data');
                redirect('item', 'refresh');
            }
        } else {
            $data['content'] = 'admin/item/add';
            $data['title'] = 'Add Item';
            $this->load->view('admin/template/index', $data);
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_item', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('unit', 'Unit', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga Satuan', 'trim|required');
        $id_o = $this->input->post('id');
		$old_data   = $this->Item_model->get_data_by_id($id_o);


        
        if ($this->form_validation->run()) {
            if (isset($_FILES['images']['name']) || $old_data['images']) {
                $config['upload_path']   = './uploads/item/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['overwrite']     = true;
                $config['size']          = 2000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('images')) {
                    $data   = $this->upload->data();
                }

                $params = [
                    'nama_item' => $this->input->post('nama_item'),
                    'unit'      => $this->input->post('unit'),
                    'stock'     => $this->input->post('stock'),
                    'harga'     => $this->input->post('harga'),
                    'images'    => isset($data['file_name']) ? $data['file_name'] : $old_data['images']
                ];

                
                // echo "<pre>";
                // print_r ($old_data);
                // echo "</pre>";
                // die();

                $this->Item_model->update($id_o,$params);
                $this->session->set_flashdata('success', 'Sukses Merubah Data');
                redirect('item', 'refresh');
            }
        } else {
            $data['content'] = 'admin/item/edit';
            $data['title'] = 'Edit Item';
            $data['item']    = $this->Item_model->get($id);
            $this->load->view('admin/template/index', $data);
        }
    }

    public function delete($id)
    {
        $this->Item_model->delete($id);
        $this->session->set_flashdata('success', 'Sukses Menghapus data');
        redirect('item', 'refresh');
    }
}
