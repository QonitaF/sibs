<?php

class Penjualan_sampah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
    }
    public function index()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'admin') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'nasabah') {
                redirect('nasbah/penjualan');
            }
        }
        $data = [
            'title' => 'Ketua | Penjualan Sampah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'penjualan' => $this->Penjualan_model->getAllPenjualan()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_ketua');
        $this->load->view('templates/topbar_ketua');
        $this->load->view('ketua/penjualan_sampah/index');
        $this->load->view('templates/footer');
    }
}
