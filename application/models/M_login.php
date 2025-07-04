<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model
{
    /**
     * Verifikasi user login berdasarkan username dan password
     *
     * @param string $username
     * @param string $password
     * @return object|null
     */
    public function verify_login($username, $password)
    {
        // Gunakan Active Record untuk menghindari SQL injection
        $query = $this->db->get_where('tbl_login', ['user' => $username], 1);

        if ($query->num_rows() == 1) {
            $user = $query->row();

            // Verifikasi password menggunakan password_verify
            if (password_verify($password, $user->pass)) {
                return $user; // Login berhasil
            }
        }

        return null; // Login gagal
    }

    /**
     * Insert ke tabel manapun
     */
    public function insertTable($table_name, $data)
    {
        return $this->db->insert($table_name, $data);
    }
}
