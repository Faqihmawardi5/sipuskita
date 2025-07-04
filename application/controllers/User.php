<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->data['CI'] =& get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');

		// Cek login
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			redirect(base_url('login'));
		}
	}

	// Hanya petugas
	private function is_petugas() {
		if ($this->session->userdata('level') !== 'Petugas') {
			show_error('Akses ditolak: hanya petugas yang diperbolehkan.', 403);
		}
	}

	public function index()
	{
		$this->is_petugas();
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['user'] = $this->M_Admin->get_table('tbl_login');
		$this->data['title_web'] = 'Data User ';
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('user/user_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function tambah() {	
		$this->is_petugas();
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['title_web'] = 'Tambah User ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('user/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add() {
		$this->is_petugas();

		$id = $this->M_Admin->buat_kode('tbl_login', 'PPD.25.', 'id_login', 'ORDER BY id_login DESC LIMIT 1'); 
		$nama = htmlentities($this->input->post('nama', TRUE));
		$user = htmlentities($this->input->post('user', TRUE));
		$pass = password_hash($this->input->post('pass', TRUE), PASSWORD_DEFAULT);
		$level = htmlentities($this->input->post('level', TRUE));
		$jenkel = htmlentities($this->input->post('jenkel', TRUE));
		$telepon = htmlentities($this->input->post('telepon', TRUE));
		$status = htmlentities($this->input->post('status', TRUE));
		$alamat = htmlentities($this->input->post('alamat', TRUE));
		$email = htmlentities($this->input->post('email', TRUE));

		$cek = $this->db->where('user', $user)->or_where('email', $email)->get('tbl_login');
		if ($cek->num_rows() > 0) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning">Username atau email sudah digunakan</div>');
			redirect(base_url('user/tambah'));
		}

		$foto = '';
		if (!empty($_FILES['gambar']['name'])) {
			$nmfile = "user_" . time();
			$config['upload_path'] = './assets_style/image/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = $nmfile;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('gambar')) {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array(
			'anggota_id' => $id,
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'level' => $level,
			'tempat_lahir' => $this->input->post('lahir'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'email' => $email,
			'telepon' => $telepon,
			'foto' => $foto,
			'jenkel' => $jenkel,
			'alamat' => $alamat,
			'tgl_bergabung' => date('Y-m-d')
		);

		$this->db->insert('tbl_login', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">User berhasil ditambahkan</div>');
		redirect(base_url('user'));
	}

	public function edit($id = null) {
		if (!$id) show_404();

		if ($this->session->userdata('level') == 'Anggota') {
			if ($this->session->userdata('ses_id') !== $id) {
				show_error("Akses ditolak", 403);
			}
		} else {
			$this->is_petugas();
		}

		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login', 'id_login', $id);
		if (!$this->data['user']) show_404();

		$this->data['title_web'] = 'Edit User ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('user/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail($id = null) {
		if (!$id) show_404();

		if ($this->session->userdata('level') == 'Anggota') {
			if ($this->session->userdata('ses_id') !== $id) {
				show_error("Akses ditolak", 403);
			}
		} else {
			$this->is_petugas();
		}

		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login', 'id_login', $id);
		if (!$this->data['user']) show_404();

		$this->data['title_web'] = 'Detail User ';
		$this->load->view('user/detail', $this->data);
	}

	public function upd() {
		$id_login = $this->input->post('id_login', TRUE);
		$user_edit = $this->M_Admin->get_tableid_edit('tbl_login', 'id_login', $id_login);
		if (!$user_edit) show_404();

		if ($this->session->userdata('level') == 'Anggota' && $this->session->userdata('ses_id') !== $id_login) {
			show_error('Akses ditolak', 403);
		}

		$nama = htmlentities($this->input->post('nama', TRUE));
		$user = htmlentities($this->input->post('user', TRUE));
		$pass = $this->input->post('pass');
		$level = ($this->session->userdata('level') == 'Petugas') ? htmlentities($this->input->post('level', TRUE)) : $user_edit->level;
		$jenkel = htmlentities($this->input->post('jenkel', TRUE));
		$telepon = htmlentities($this->input->post('telepon', TRUE));
		$alamat = htmlentities($this->input->post('alamat', TRUE));
		$email = htmlentities($this->input->post('email', TRUE));
		$foto = $user_edit->foto;

		if (!empty($_FILES['gambar']['name'])) {
			$nmfile = "user_" . time();
			$config['upload_path'] = './assets_style/image/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = $nmfile;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('gambar')) {
				if ($foto != '') {
					@unlink('./assets_style/image/' . $foto);
				}
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama' => $nama,
			'user' => $user,
			'tempat_lahir' => $this->input->post('lahir'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'level' => $level,
			'email' => $email,
			'telepon' => $telepon,
			'jenkel' => $jenkel,
			'alamat' => $alamat,
			'foto' => $foto
		);

		if (!empty($pass)) {
			$data['pass'] = password_hash($pass, PASSWORD_DEFAULT);
		}

		$this->M_Admin->update_table('tbl_login', 'id_login', $id_login, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">User berhasil diperbarui</div>');
		redirect(base_url('user'));
	}

	public function del($id = null) {
		$this->is_petugas();
		if (!$id) show_404();

		$user = $this->M_Admin->get_tableid_edit('tbl_login', 'id_login', $id);
		if (!$user) show_404();

		if ($user->foto != '') {
			@unlink('./assets_style/image/' . $user->foto);
		}

		$this->M_Admin->delete_table('tbl_login', 'id_login', $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning">User berhasil dihapus</div>');
		redirect(base_url('user'));
	}
}
