<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengunjung_model');
    }

    public function index()
    {
        $this->load->view('pengunjung/pengunjung_form');
    }

    public function simpan()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'keperluan' => $this->input->post('keperluan'),
            'tanggal_kunjungan' => date('Y-m-d'),
            'waktu_kunjungan' => date('H:i:s')
        ];

        $this->Pengunjung_model->insert($data);
        $this->session->set_flashdata('success', 'Terima kasih, data kunjungan telah dicatat.');
        redirect('pengunjung');
    }

    public function daftar()
    {
        $data['title'] = 'Daftar Pengunjung';
        $data['pengunjung'] = $this->Pengunjung_model->get_all();
        $this->load->view('pengunjung/daftar_pengunjung', $data);
    }    

}
