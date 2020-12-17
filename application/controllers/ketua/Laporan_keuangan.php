<?php

class Laporan_keuangan extends CI_Controller
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
        $data['penjualanku'] = $this->Nasabah_model->getPenjualanku();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_ketua');
        $this->load->view('templates/topbar_ketua');
        $this->load->view('ketua/laporan/keuangan');
        $this->load->view('templates/footer');
    }

    public function laporan_keuangan_pdf()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'admin') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'nasabah') {
                redirect('nasbah/penjualan');
            }
        }
        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');
        $data = [
            'awal' =>  $keyword1,
            'akhir' => $keyword2,
            'totalpenjualan' => $this->Laporan_keuangan_ketua_model->getSaldoku($keyword1, $keyword2),
            // 'totalpenjualan' => $this->Penjualan_model->getTotalPenjualan(),
            'logo' => '<img src="assets/images/icon/logo-mini.png" alt="" class="mr-3">',
            'gambar' => 'assets/img/perbaikan/'
        ];
        $data['nasabah'] = $this->Laporan_keuangan_ketua_model->getNasabahbytgl($keyword1, $keyword2);
        $this->load->view('ketua/laporan/pdf/Keuangan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_keuangan.pdf", ['Attachment' => 0]);
    }
}
