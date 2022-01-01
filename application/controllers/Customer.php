<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
    }

    public function index()
    {
        $data['content'] = 'admin/customer/index';
        $data['customer']    = $this->Customer_model->all();
        $this->load->view('admin/template/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('type_diskon', 'Tipe Diskon', 'trim|required');

        if ($this->form_validation->run()) {

            if (isset($_FILES['foto_ktp']['name'])) {
                $config['upload_path']   = './uploads/customer/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['overwrite']     = true;
                $config['size']          = 2000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_ktp')) {
                    $data   = $this->upload->data();
                }

                $params = [
                    'nama'            => $this->input->post('nama'),
                    'kontak'          => $this->input->post('kontak'),
                    'email'           => $this->input->post('email'),
                    'alamat'          => $this->input->post('alamat'),
                    'type_diskon'     => $this->input->post('type_diskon'),
                    'foto_ktp'        => $data['file_name']
                ];

                $this->Customer_model->add($params);
                $this->session->set_flashdata('success', 'Sukses Menambah Data');
                redirect('customer', 'refresh');
            }
        } else {
            $data['content'] = 'admin/customer/add';
            $data['title']   = 'Tambah Customer';
            $this->load->view('admin/template/index', $data);
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('type_diskon', 'Tipe Diskon', 'trim|required');

        $id_o       = $this->input->post('id');
        $old_data   = $this->Customer_model->get_data_by_id($id_o);


        if ($this->form_validation->run()) {

            if (isset($_FILES['foto_ktp']['name']) || $old_data['foto_ktp']) {
                $config['upload_path']   = './uploads/customer/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['overwrite']     = true;
                $config['size']          = 2000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_ktp')) {
                    $data   = $this->upload->data();
                }

                $params = [
                    'nama'            => $this->input->post('nama'),
                    'kontak'          => $this->input->post('kontak'),
                    'email'           => $this->input->post('email'),
                    'alamat'          => $this->input->post('alamat'),
                    'type_diskon'     => $this->input->post('type_diskon'),
                    'foto_ktp'        => isset($data['file_name']) ? $data['file_name'] : $old_data['foto_ktp']
                ];

                $this->Customer_model->update($id_o, $params);
                $this->session->set_flashdata('success', 'Sukses Merubah Data');
                redirect('customer', 'refresh');
            }
        } else {
            $data['content'] = 'admin/customer/edit';
            $data['title']   = 'Edit Customer';
            $data['customer'] = $this->Customer_model->get_data($id);
            $this->load->view('admin/template/index', $data);
        }
    }



    public function delete($id)
    {
        $this->Customer_model->delete($id);
        $this->session->set_flashdata('success', 'Sukses Menghapus Data');
        redirect('customer', 'refresh');
    }
}
