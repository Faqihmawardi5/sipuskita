<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(['form', 'url']);
        $this->load->model('M_Login');
    }

    public function index() {
        // Jika sudah login, langsung ke dashboard
        if ($this->session->userdata('masuk_perpus') === TRUE) {
            redirect('dashboard');
        }

        $this->data['title_web'] = 'Login | Sistem Informasi Perpustakaan';
        $this->load->view('login_view', $this->data);
    }

    public function auth() {
        $user = trim($this->input->post('user', TRUE));
        $pass = $this->input->post('pass', TRUE);

        if (empty($user) || empty($pass)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning">Username dan password wajib diisi.</div>');
            redirect('login');
        }

        // Cari user dari model
        $query = $this->db->get_where('tbl_login', ['user' => $user], 1);
        if ($query->num_rows() === 1) {
            $data = $query->row_array();
            $hashed_pass = $data['pass'];
            $user_id = $data['id_login'];

            $is_valid = false;

            if (strlen($hashed_pass) > 32) {
                // Password sudah di-hash
                $is_valid = password_verify($pass, $hashed_pass);
            } else {
                // Password masih MD5
                if (md5($pass) === $hashed_pass) {
                    $is_valid = true;

                    // Ubah ke password_hash() untuk keamanan
                    $hash_baru = password_hash($pass, PASSWORD_DEFAULT);
                    $this->db->update('tbl_login', ['pass' => $hash_baru], ['id_login' => $user_id]);
                }
            }

            if ($is_valid) {
                // Set session
                $this->session->set_userdata([
                    'masuk_perpus' => TRUE,
                    'ses_id'       => $data['id_login'],
                    'level'        => $data['level'],
                    'anggota_id'   => $data['anggota_id'],
                    'nama'         => $data['nama']
                ]);

                redirect('dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Password salah.</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">User tidak ditemukan.</div>');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
