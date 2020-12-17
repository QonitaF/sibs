<?php 

class Pendaftaran extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem Informasi Bank Sampah Enviro 18',
        ];

        // $this->form_validation->set_rules('name', 'deskripsi museum', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_mobile');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('pages/pendaftaran');
            $this->load->view('templates/footer');
        } else {
            echo "OK";
        }
    }
}