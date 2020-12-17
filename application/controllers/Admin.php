<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
    }

    // |------------------------------------------------------
    // | Dashboard
    // |------------------------------------------------------

    public function index()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'nasabah') {
                redirect('nasabah/penjualan');
            } elseif ($this->CI->session->userdata['level'] == 'ketua') {
                redirect('ketua/ketua');
            }
        }
        $data = [
            'title' => 'Admin | Dashboard',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'abouts' => $this->db->get('tbl_about')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit_about($id)
    {
        $data = [
            'title' => 'Admin | Edit About',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'about' => $this->db->get_where('tbl_about', ['id_about' => $id])->row_array()
        ];

        $this->form_validation->set_rules('nama_about', 'nama', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_mobile');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/dashboard/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_about' => $this->input->post('nama_about'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $this->db->where('id_about', $id);
            $this->db->update('tbl_about', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">Sukses, Data Berhasil Diubah!</div>');
            redirect('admin');
        }
    }

    // |------------------------------------------------------
    // | Data Nasabah
    // |------------------------------------------------------
    public function SaldoNasabah()
    {
        $data = [
            'title' => 'Admin | Data Saldo Nasabah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $data['nasabahs'] = $this->Nasabah_model->getAll();
        $data['nasabah'] = $this->Nasabah_model->getAllNasabah();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/nasabah/SaldoNasabah', $data);
        $this->load->view('templates/footer');
    }
    public function nasabah()
    {
        $data = [
            'title' => 'Admin | Data Nasabah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $data['nasabah'] = $this->Nasabah_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/nasabah/index', $data);
        $this->load->view('templates/footer_admin_nasabah');
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
        //  $data['nasabah'] = $this->Nasabah_model->getAllNasabah();
        $data['nasabah'] = $this->Nasabah_model->getNasabahbytgl($keyword1, $keyword2);
        $this->load->view('admin/nasabah/laporan/pdf/Penjualan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_nasabah_penjualan.pdf", ['Attachment' => 0]);
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


    public function registerNasabah()
    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('telepon_users', 'Telepon Telah Terdaftar', 'required|is_unique[tbl_users.telepon_users]');
        $this->form_validation->set_rules('email', 'Email Telah Terdaftar', 'required|is_unique[tbl_users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confrim_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('admin/create_nasabah');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $rt = $this->input->post('rt_users');
            $alamat_users = $this->input->post('alamat_users');
            $telepon_users = $this->input->post('telepon_users');
            // $level = $this->input->post('level');
            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $pass,
                'rt_users' => $rt,
                'alamat_users' => $alamat_users,
                'telepon_users' => $telepon_users,
                'level' => 'nasabah',
                'time_create_users' => date('Y-m-d H:i:s')
            ];

            $insert = $this->Auth_model->register("tbl_users", $data);
            //$insert = $this->db->insert('tbl_users', $data);

            if ($insert) {

                $this->session->set_flashdata('success_login', 'Sukses, Nasabah Berhasil Ditambah.');
                redirect('admin/nasabah');
            }
        }
    }

    public function delete_nasabah($id)
    {
        $data['id_users'] = $this->Users_model->delete($id);
        $this->session->set_flashdata('success_login', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di Hapus!</div>');
        redirect('admin/nasabah');
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

    public function update_nasabah($id)
    {
        $data = [
            'title' => 'Admin | Update Data Nasabah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),

            'nasabah' => $this->db->get_where('tbl_users', ['id_users' => $id])->row_array()
        ];
        // $data['nasabah'] = $this->Users_model->getID($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/nasabah/update', $data);
        $this->load->view('templates/footer');
    }

    public function UpdateNasabah()
    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        // $this->form_validation->set_rules('telepon_users', 'Telepon Telah Terdaftar', 'required|is_unique[tbl_users.telepon_users]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // $this->form_validation->set_rules('password', 'Password', 'required|trim');
        // $this->form_validation->set_rules('confrim_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('admin/nasabah');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            // $password = $this->input->post('password');
            // $pass = password_hash($password, PASSWORD_DEFAULT);
            $rt = $this->input->post('rt_users');
            $alamat_users = $this->input->post('alamat_users');
            $telepon_users = $this->input->post('telepon_users');
            // $level = $this->input->post('level');
            $id = $this->input->post('id_users');
            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'email' => $email,
                // 'password' => $pass,
                'rt_users' => $rt,
                'alamat_users' => $alamat_users,
                'telepon_users' => $telepon_users,
                'level' => 'nasabah',
                'time_create_users' => date('Y-m-d H:i:s')
            ];

            $insert = $this->Users_model->update($id, $data);
            //$insert = $this->db->insert('tbl_users', $data);

            if ($insert) {

                $this->session->set_flashdata('success_login', 'Sukses, Nasabah Berhasil Di Update.');
                redirect('admin/nasabah');
            }
        }
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

        $this->form_validation->set_rules('satuan_katalog', 'satuan katalog', 'required');
        $this->form_validation->set_rules('harga_katalog', 'harga katalog', 'required');
        $this->form_validation->set_rules('keterangan_katalog', 'keterangan katalog', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_mobile');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/katalog_sampah/create');
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['gambar_katalog']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/images/katalog/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_katalog')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_katalog', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
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
            'penjualan' => $this->Penjualan_model->getAllPenjualan(),
            'totalpenjualan' => $this->Penjualan_model->getTotalPenjualan()
        ];
        //tes gus
        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/penjualan_sampah/index');
        $this->load->view('templates/footer');
    }

    public function penjualan_sampah_pdf()
    {
        $this->load->library('dompdf_gen');

        $data['penjualan'] = $this->Penjualan_model->getAllPenjualan();
        $this->load->view('admin/penjualan_sampah/penjualan_sampah', $data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_observasi.pdf", ['Attachment' => 0]);
    }

    public function create_penjualan_sampah()
    {
        $data = [
            'title' => 'Admin | Create Penjualan Sampah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'user' => $this->db->get('tbl_users')->result_array(),
            'nasabah' => $this->Users_model->getAllUsersNasabah(),
            'katalog' => $this->db->get('tbl_katalog')->result_array(),
        ];
        $data['record'] =  $this->Penjualan_model->tampil_data();

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

    public function cari()
    {
        $id_katalog = $_GET['id_katalog'];
        $cari = $this->Penjualan_model->cari($id_katalog)->result();
        echo json_encode($cari);
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
        $data['record'] =  $this->Penjualan_model->tampil_data();
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
        $data = [
            'title' => 'Admin | Update Data Nasabah',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'totalpenjualan' => $this->Penjualan_model->getTotalPenjualan()
        ];

        $data['penjualanku'] = $this->Nasabah_model->getPenjualanku();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_mobile');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan/keuangan');
        $this->load->view('templates/footer');
    }

    public function laporan_keuangan_pdf()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'ketua') {
                redirect('ketua');
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
            'totalpenjualan' => $this->Penjualan_model->getSaldoku($keyword1, $keyword2),
            // 'totalpenjualan' => $this->Penjualan_model->getTotalPenjualan(),
            'logo' => '<img src="assets/images/icon/logo-mini.png" alt="" class="mr-3">',
            'gambar' => 'assets/img/perbaikan/'
        ];
        $data['nasabah'] = $this->Penjualan_model->getNasabahbytgl($keyword1, $keyword2);
        $this->load->view('admin/laporan/pdf/Keuangan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_keuangan.pdf", ['Attachment' => 0]);
    }
    // |------------------------------------------------------
    // | Laporan
    // |------------------------------------------------------

    public function profile()
    {
        $data = [
            'title' => 'Admin | Update Profile',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $old_image = $data["users"]["gambar_users"];

        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('rt_users', 'rt', 'required');
        $this->form_validation->set_rules('rw_users', 'rw', 'required');
        $this->form_validation->set_rules('alamat_users', 'alamat', 'required');
        $this->form_validation->set_rules('telepon_users', 'telepon', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/header_mobile');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/profile/index');
            $this->load->view('templates/footer');
        } else {

            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'rt_users' => $this->input->post('rt_users'),
                'rw_users' => $this->input->post('rw_users'),
                'alamat_users' => $this->input->post('alamat_users'),
                'telepon_users' => $this->input->post('telepon_users'),
            ];

            $upload_image = $_FILES['gambar_users']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/images/users/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_users')) {
                    if ($old_image != 'default-user-image.jpg') {
                        unlink(FCPATH . 'assets/images/users/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_users', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('email', $this->input->post('email'));
            $this->db->update('tbl_users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Profile Berhasil Diubah!</div>');
            redirect('admin/profile');
        }
    }
}
