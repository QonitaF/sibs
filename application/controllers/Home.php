<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem Informasi Bank Sampah Enviro 18',
            'abouts' => $this->db->get('tbl_about')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar_home');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
    }
}
