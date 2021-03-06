<?php

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
        $this->load->library('session');
    }

    // |------------------------------------------------------
    // | Dashboard
    // |------------------------------------------------------

    public function index()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'admin') {
                redirect('admin');
            } elseif ($this->CI->session->userdata['level'] == 'ketua') {
                redirect('ketua');
            }
        }

        $data = [
            'title' => 'Nasabah | Data Penjualan',
            'saldoku' => $this->Nasabah_model->getSaldoku(),
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $data['penjualanku'] = $this->Nasabah_model->getPenjualanku();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_nasabah');
        $this->load->view('templates/topbar');
        $this->load->view('nasabah/index', $data);
        $this->load->view('templates/footer');
    }
    public function laporan_penjualan_pdf()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'pengelola') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
                redirect('Admin');
            }
        }
        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');
        $data = [
            'awal' =>  $keyword1,
            'akhir' => $keyword2,
            'saldoku' => $this->Nasabah_model->getSaldoku(),
            'logo' => '<img src="assets/images/icon/logo-mini.png" alt="" class="mr-3">',
            'gambar' => 'assets/img/perbaikan/'
        ];
        // $data['penjualanku'] = $this->Nasabah_model->getPenjualanku();
        $data['penjualanku'] = $this->Nasabah_model->getbytgl($keyword1, $keyword2);
        $this->load->view('nasabah/laporan/pdf/Penjualan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_penjualan.pdf", ['Attachment' => 0]);
    }

    public function create_nasabah()
    {
        $data = [
            'title' => 'Admin | Tambah Data Nasabah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/nasabah/create');
        $this->load->view('templates/footer');
    }

    public function registerForm()

    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confrim_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('auth');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            // $level = $this->input->post('level');
            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $pass,
                'level' => 'admin',
                'time_create_users' => date('Y-m-d H:i:s')
            ];

            $insert = $this->Auth_model->register("tbl_users", $data);
            //$insert = $this->db->insert('tbl_users', $data);

            if ($insert) {

                $this->session->set_flashdata('success_login', 'Sukses, Anda berhasil register. Silahkan login sekarang.');
                redirect('auth');
            }
        }
    }

    public function update_nasabah()
    {
        $data = [
            'title' => 'Admin | Update Data Nasabah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/nasabah/update');
        $this->load->view('templates/footer');
    }

    // |------------------------------------------------------
    // | Katalog Sampah
    // |------------------------------------------------------

    public function katalog_sampah()
    {
        $data = [
            'title' => 'Admin | Katalog Sampah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'katalog' => $this->Katalog_model->getAllKatalog()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/katalog_sampah/index');
        $this->load->view('templates/footer');
    }

    public function create_katalog_sampah()
    {
        $data = [
            'title' => 'Admin | Create Katalog Sampah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'jenis_sampah' => $this->db->get('tbl_jenis_sampah')->result_array(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/katalog_sampah/create');
        $this->load->view('templates/footer');
        if ($this->upload->do_upload('gambar_katalog')) {
            $new_image = $this->upload->data('file_name');
            $this->db->set('gambar_katalog', $new_image);
        } else {
            echo $this->upload->display_errors();
        }


        $this->db->insert('tbl_katalog', [
            'id_users' => $data["users"]["id_users"],
            'nama_katalog' => $this->input->post('nama_katalog'),
            'id_jenis_katalog_sampah' => $this->input->post('id_jenis_katalog_sampah'),
            'satuan_katalog' => $this->input->post('satuan_katalog'),
            'harga_katalog' => $this->input->post('harga_katalog'),
            'keterangan_katalog' => $this->input->post('keterangan_katalog'),
            'time_create_katalog' => date("Y-m-d h:i:s"),
            'time_update_katalog' => date("Y-m-d h:i:s"),
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data katalog Berhasil Ditambahkan</div>');
        redirect('admin/katalog_sampah');
    }


    public function update_katalog_sampah($id)
    {
        $data = [
            'title' => 'Admin | Update Katalog Sampah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'katalog' => $this->db->get_where('tbl_katalog', ['id_katalog' => $id])->row_array(),
            'jenis_sampah' => $this->db->get('tbl_jenis_sampah')->result_array(),
        ];

        $old_image = $data["katalog"]["gambar_katalog"];

        $this->form_validation->set_rules('satuan_katalog', 'satuan katalog', 'required');
        $this->form_validation->set_rules('harga_katalog', 'harga katalog', 'required');
        $this->form_validation->set_rules('keterangan_katalog', 'keterangan katalog', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_mobile');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/katalog_sampah/update');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_katalog' => $this->input->post('nama_katalog'),
                'id_users' => $data["users"]["id_users"],
                'id_jenis_katalog_sampah' => $this->input->post('id_jenis_katalog_sampah'),
                'satuan_katalog' => $this->input->post('satuan_katalog'),
                'harga_katalog' => $this->input->post('harga_katalog'),
                'keterangan_katalog' => $this->input->post('keterangan_katalog'),
                'time_update_katalog' => date("Y-m-d h:i:s"),
            ];

            $upload_image = $_FILES['gambar_katalog']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/images/katalog/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_katalog')) {
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/katalog/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_katalog', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_katalog', $this->input->post('id_katalog'));
            $this->db->update('tbl_katalog', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data katalog Berhasil Diubah</div>');
            redirect('admin/katalog_sampah');
        }
    }

    public function delete_katalog_sampah($id)
    {
        $katalog = $this->db->get_where('tbl_katalog', ['id_katalog' => $id])->row_array();
        $old_image = $katalog["gambar_katalog"];

        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/images/katalog/' . $old_image);
        }

        $this->db->delete('tbl_katalog', ['id_katalog' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data katalog Berhasil Dihapus</div>');
        redirect('admin/katalog_sampah');
    }

    // |------------------------------------------------------
    // | Penjualan Sampah
    // |------------------------------------------------------

    public function penjualan_sampah()
    {
        $data = [
            'title' => 'Admin | Penjualan Sampah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'penjualan' => $this->Penjualan_model->getAllPenjualan()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/penjualan_sampah/index');
        $this->load->view('templates/footer');
    }

    public function create_penjualan_sampah()
    {
        $data = [
            'title' => 'Admin | Create Penjualan Sampah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'user' => $this->db->get('tbl_users')->result_array(),
            'katalog' => $this->db->get('tbl_katalog')->result_array(),
        ];

        $this->form_validation->set_rules('time_create_penjualan', 'tanggal', 'required');
        $this->form_validation->set_rules('id_users', 'nama', 'required');
        $this->form_validation->set_rules('id_katalog', 'jenis', 'required');
        $this->form_validation->set_rules('berat_penjualan', 'berat', 'required');
        $this->form_validation->set_rules('harga_penjualan', 'harga', 'required');
        $this->form_validation->set_rules('total_penjualan', 'total', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_mobile');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/penjualan_sampah/create');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'time_create_penjualan' => $this->input->post('time_create_penjualan'),
                'id_users' => $this->input->post('id_users'),
                'id_katalog' => $this->input->post('id_katalog'),
                'berat_penjualan' => $this->input->post('berat_penjualan'),
                'harga_penjualan' => $this->input->post('harga_penjualan'),
                'total_penjualan' => $this->input->post('total_penjualan')
            ];

            $this->db->insert('tbl_penjualan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penjualan Sampah Berhasil Ditambahkan</div>');
            redirect('admin/penjualan_sampah');
        }
    }

    public function update_penjualan_sampah($id)
    {
        $data = [
            'title' => 'Admin | Update Penjualan Sampah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'penjualan' => $this->db->get_where('tbl_penjualan', ['id_penjualan' => $id])->row_array(),
            'user' => $this->db->get('tbl_users')->result_array(),
            'katalog' => $this->db->get('tbl_katalog')->result_array(),
        ];

        $this->form_validation->set_rules('time_create_penjualan', 'tanggal', 'required');
        $this->form_validation->set_rules('id_users', 'nama', 'required');
        $this->form_validation->set_rules('id_katalog', 'jenis', 'required');
        $this->form_validation->set_rules('berat_penjualan', 'berat', 'required');
        $this->form_validation->set_rules('harga_penjualan', 'harga', 'required');
        $this->form_validation->set_rules('total_penjualan', 'total', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_mobile');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/penjualan_sampah/update');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'time_create_penjualan' => $this->input->post('time_create_penjualan'),
                'id_users' => $this->input->post('id_users'),
                'id_katalog' => $this->input->post('id_katalog'),
                'berat_penjualan' => $this->input->post('berat_penjualan'),
                'harga_penjualan' => $this->input->post('harga_penjualan'),
                'total_penjualan' => $this->input->post('total_penjualan'),
                'time_update_penjualan' => date("Y-m-d h:i:s"),
            ];

            $this->db->where('id_penjualan', $this->input->post('id_penjualan'));
            $this->db->update('tbl_penjualan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penjualan Sampah Berhasil Diubah!</div>');
            redirect('admin/penjualan_sampah');
        }
    }

    public function delete_penjualan_sampah($id)
    {
        $this->db->delete('tbl_penjualan', ['id_penjualan' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penjualan Sampah Berhasil Dihapus!</div>');
        redirect('admin/penjualan_sampah');
    }

    // |------------------------------------------------------
    // | Laporan
    // |------------------------------------------------------

    public function laporan()
    {
        echo "OK";
    }
























    // public function laporan_observasi_pdf()
    // {
    //     if ($this->CI->router->fetch_class() != "login") {
    //         // session check logic here...change this accordingly
    //         if ($this->CI->session->userdata['level'] == 'pengelola') {
    //             redirect('Admin');
    //         } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
    //             redirect('Admin');
    //         }
    //     }
    //     $this->load->library('dompdf_gen');

    //     $tgl_awal = $this->input->post('dari');
    //     $tgl_akhir = $this->input->post('sampai');
    //     $data = [
    //         'awal' =>  $tgl_awal,
    //         'akhir' => $tgl_akhir,
    //         'logo' => '<img src="assets/img/Logo.png" width="30" alt="" class="mr-3">'
    //     ];
    //     $data['observasi'] = $this->Observasi_model->getbytgl($tgl_awal, $tgl_akhir);
    //     $this->load->view('admin/laporan/pdf/Observasi', $data);
    //     $paper_size = 'A4';
    //     $orientation = 'landscape';
    //     $html = $this->output->get_output();
    //     $html .=  '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">';
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("laporan_observasi.pdf", ['Attachment' => 0]);
    // }

}
