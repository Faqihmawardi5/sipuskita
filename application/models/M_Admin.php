<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    /** Get all rows from a table */
    function get_table($table_name) {
        return $this->db->get($table_name)->result_array();
    }

    /** Get row(s) by ID (multiple rows) */
    function get_tableid($table_name, $where, $id) {
        return $this->db->where($where, $id)->get($table_name)->result_array();
    }

    /** Get a single row by ID */
    function get_tableid_edit($table_name, $where, $id) {
        return $this->db->where($where, $id)->get($table_name)->row();
    }

    /** Insert multiple data */
    function add_multiple($table, $data = array()) {
        if (!empty($data)) {
            return $this->db->insert_batch($table, $data);
        }
        return false;
    }

    /** Insert single row */
    function insertTable($table_name, $data) {
        return $this->db->insert($table_name, $data);
    }

    /** Insert and return last ID */
    function LastinsertId($table_name, $data) {
        $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }

    /** Update row by ID */
    function update_table($table_name, $where, $id, $data) {
        return $this->db->where($where, $id)->update($table_name, $data);
    }

    /** Delete row by ID */
    function delete_table($table_name, $where, $id) {
        return $this->db->where($where, $id)->delete($table_name);
    }

    /** Delete multiple rows by array of ID */
    function delete_table_multiple($table_name, $where, $id) {
        if (!empty($id)) {
            return $this->db->where_in($where, $id)->delete($table_name);
        }
        return false;
    }

    /** Get single row by condition */
    function edit_table($table_name, $where, $id) {
        return $this->db->where($where, $id)->get($table_name)->row();
    }

    /** Count total rows in table */
    function CountTable($table_name) {
        return $this->db->get($table_name)->num_rows();
    }

    /** Count rows with condition */
    function CountTableId($table_name, $where, $id) {
        return $this->db->where($where, $id)->get($table_name)->num_rows();
    }

    /** Select with query builder */
    function SelectTable($table_name, $select, $order_by_field, $order_by_dir) {
        return $this->db->select($select)
                        ->from($table_name)
                        ->order_by($order_by_field, $order_by_dir)
                        ->get();
    }

    /** Get user detail */
    function get_user($id_login) {
        return $this->db->where('id_login', $id_login)->get('tbl_login')->row();
    }

    /** Format rupiah */
    function rp($angka) {
        return "Rp" . number_format($angka, 0, ',', '.') . ',-';
    }

    /** Generate auto code (prefix + nomor urut) */
    public function buat_kode($table_name, $kode_awal, $id_field, $order_by = '') {
        $query = $this->db->query("SELECT * FROM $table_name $order_by");

        if ($query->num_rows() > 0) {
            $last = $query->row()->$id_field;
            // Ambil angka paling akhir
            $angka = (int) filter_var($last, FILTER_SANITIZE_NUMBER_INT);
            $kode = $angka + 1;
        } else {
            $kode = 1;
        }

        return $kode_awal . str_pad($kode, 3, "0", STR_PAD_LEFT);
    }

    /** Generate kode dengan raw query (gunakan hanya jika yakin aman) */
    public function buat_kode_join($sql, $kode_awal, $id_field) {
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $last = $query->row()->$id_field;
            $angka = (int) filter_var($last, FILTER_SANITIZE_NUMBER_INT);
            $kode = $angka + 1;
        } else {
            $kode = 1;
        }

        return $kode_awal . str_pad($kode, 3, "0", STR_PAD_LEFT);
    }

    /** Generate random string */
    function acak($panjang) {
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
            $pos = rand(0, strlen($karakter) - 1);
            $string .= $karakter[$pos];
        }
        return $string;
    }
}
