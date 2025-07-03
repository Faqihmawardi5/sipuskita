<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        // Ambil 3 kegiatan terbaru
        $data['kegiatan'] = $this->db->order_by('tgl', 'DESC')
                                     ->limit(3)
                                     ->get('tbl_kegiatan')
                                     ->result();

        $data['title'] = 'Beranda';

        $this->load->view('home/index', $data);
    }
}
