<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
    }

    public function index()
    {
        $data['title_web'] = 'Koleksi Buku';
        $data['buku'] = $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC")->result();

        // bisa menggunakan view baru misal: koleksi_view
        $this->load->view('frontend/koleksi_view', $data);
    }

    public function detail($id_buku = null)
    {
        $cek = $this->M_Admin->CountTableId('tbl_buku','id_buku',$id_buku);
        if($cek > 0){
            $data['title_web'] = 'Detail Buku';
            $data['buku'] = $this->M_Admin->get_tableid_edit('tbl_buku','id_buku',$id_buku);

            $this->load->view('frontend/detail_buku', $data);
        } else {
            echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="'.base_url('koleksi').'"</script>';
        }
    }
}
