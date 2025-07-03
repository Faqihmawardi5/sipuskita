<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
        if($this->session->userdata('masuk_perpus') != TRUE){
            redirect(base_url('login'));
        }
    }

    public function jumlah_data()
    {
        $data['title_web'] = 'Laporan Jumlah Data';
        $data['idbo'] = $this->session->userdata('ses_id');

        // Menghitung semua data yang dibutuhkan
        $data['count_buku'] = $this->db->count_all('tbl_buku');
        $data['count_anggota'] = $this->db->count_all('tbl_login');
        $data['count_pinjam'] = $this->db->where('status', 'Dipinjam')->get('tbl_pinjam')->num_rows();
        $data['count_kembali'] = $this->db->where('status', 'Di Kembalikan')->get('tbl_pinjam')->num_rows(); 
        $data['count_pengunjung'] = $this->db->count_all('tbl_pengunjung');

        // Load halaman laporan (versi tampilan biasa, bukan cetak)
        $this->load->view('laporan_jumlah_data_view', $data);
    }

    public function cetak_jumlah_data()
    {
        $data['count_buku'] = $this->db->count_all('tbl_buku');
        $data['count_anggota'] = $this->db->count_all('tbl_login');
        $data['count_pinjam'] = $this->db->where('status', 'Dipinjam')->get('tbl_pinjam')->num_rows();
        $data['count_kembali'] = $this->db->where('status', 'Di Kembalikan')->get('tbl_pinjam')->num_rows();
        $data['count_pengunjung'] = $this->db->count_all('tbl_pengunjung');

        // Load tampilan cetak laporan
        $this->load->view('laporan_jumlah_cetak_view', $data);
    }
}
