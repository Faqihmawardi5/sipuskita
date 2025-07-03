<?php
class Pengunjung_model extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('tbl_pengunjung', $data);
    }

    public function get_all()
    {
        return $this->db->order_by('id', 'DESC')->get('tbl_pengunjung')->result();
    }
    

}
