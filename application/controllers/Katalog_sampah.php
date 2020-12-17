<?php

class Katalog_sampah extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem Informasi Bank Sampah Enviro 18',
            'katalog' => $this->Katalog_model->getAllKatalog()
        ];

        $data['katalog'] = $this->Katalog_model->getAllKatalog();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pages/katalog_sampah');
        $this->load->view('templates/footer');
    }
    public function search()
    {
        $data = [
            'title' => 'Sistem Informasi Bank Sampah Enviro 18'
        ];
        $keyword = $this->input->post('keyword');
        $data['katalogs'] = $this->Katalog_model->get_katalog_keyword($keyword);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pages/search');
        $this->load->view('templates/footer');
    }
}
