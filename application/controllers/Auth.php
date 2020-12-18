<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem Informasi Bank Sampah Enviro 18',
        ];

        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function loginForm()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('/auth');
        } else {

            $email = htmlspecialchars($this->input->post('email'));
            $pass = htmlspecialchars($this->input->post('password'));
            $cek_login = $this->Auth_model->cek_login($email);

            if ($cek_login == FALSE) {

                $this->session->set_flashdata('error_login', 'Email yang Anda masukan tidak terdaftar.');
                redirect('index.php/auth');
            } else {

                if (password_verify($pass, $cek_login->password)) {
                    $this->session->set_userdata('id_users', $cek_login->id_users);
                    $this->session->set_userdata('name', $cek_login->name);
                    $this->session->set_userdata('email', $cek_login->email);
                    $this->session->set_userdata('level', $cek_login->level);
                    date_default_timezone_set("ASIA/JAKARTA");
                    //$email = $this->session->userdata('email');
                    $data = array('time_login_users' => date('Y-m-d H:i:s'));
                    $this->Auth_model->logout($data, $email);
                    redirect('Admin');
                } else {

                    $this->session->set_flashdata('error_login', 'Email atau password yang Anda masukan salah.');
                    redirect('auth');
                }
            }
        }
    }

    public function register()
    {

        $this->load->view('auth/register');
    }

    public function registerForm()
    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('telepon_users', 'Telepon Telah Terdaftar', 'required|is_unique[tbl_users.telepon_users]');
        $this->form_validation->set_rules('email', 'Username Telah Terdaftar', 'required|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confrim_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('/pendaftaran');
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

                $this->session->set_flashdata('success_login', 'Sukses, Anda telah terdaftar.');
                redirect('/pendaftaran');
            }
        }
    }

    public function logout()
    {
        date_default_timezone_set("ASIA/JAKARTA");
        $email = $this->session->userdata('email');
        $data = array('time_logout_users' => date('Y-m-d H:i:s'));

        $this->Auth_model->logout($data, $email);
        $this->session->sess_destroy();
        echo '<script>
            alert("Sukses! Anda berhasil logout."); 
            window.location.href="' . base_url('/') . '";
            </script>';
    }
}
