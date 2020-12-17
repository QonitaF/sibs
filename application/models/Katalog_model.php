<?php

class Katalog_model extends CI_Model
{
    public function getAllKatalog()
    {
        $query = "SELECT `tbl_katalog`.*, `tbl_jenis_sampah`.`nama_jenis_sampah`, `tbl_users`.`name`
        FROM `tbl_katalog`
        INNER JOIN `tbl_jenis_sampah` ON `tbl_katalog`.`id_jenis_katalog_sampah` = `tbl_jenis_sampah`.`id_jenis_sampah`
        INNER JOIN `tbl_users` ON `tbl_katalog`.`id_users` = `tbl_users`.`id_users`";

        return $this->db->query($query)->result_array();
    }

    public function get_katalog_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tbl_katalog');
        $this->db->join('tbl_jenis_sampah', 'tbl_jenis_sampah.id_jenis_sampah=tbl_katalog.id_jenis_katalog_sampah');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_katalog.id_users');
        $this->db->like('tbl_katalog.nama_katalog', $keyword);
        $this->db->or_like('tbl_katalog.harga_katalog', $keyword);
        return $this->db->get()->result();
    }
}
