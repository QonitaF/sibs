<?php

class Laporan_keuangan_ketua_model extends CI_Model
{
    public function getAllPenjualan()
    {
        $query = "SELECT `tbl_penjualan`.*, `tbl_users`.`name`, `tbl_katalog`.`nama_katalog`
        FROM `tbl_penjualan`
        INNER JOIN `tbl_users` ON `tbl_penjualan`.`id_users` = `tbl_users`.`id_users`
        INNER JOIN `tbl_katalog` ON `tbl_penjualan`.`id_katalog` = `tbl_katalog`.`id_katalog`";

        return $this->db->query($query)->result_array();
    }

    function tampil_data()
    {
        return $this->db->get('tbl_katalog');
    }

    function cari($id_katalog)
    {
        $query = $this->db->get_where('tbl_katalog', array('id_katalog' => $id_katalog));
        return $query;
    }

    public function getTotalPenjualan()
    {
        $this->db->select('sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');

        $result = $this->db->get();

        return $result->result();
    }

    public function getNasabahbytgl($keyword1, $keyword2)
    {
        $this->db->select('tbl_users.name,tbl_penjualan.time_create_penjualan,tbl_katalog.nama_katalog,sum(tbl_penjualan.berat_penjualan) as berat,tbl_penjualan.harga_penjualan,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_katalog', 'tbl_katalog.id_katalog=tbl_penjualan.id_katalog');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_penjualan.id_users');
        $this->db->group_by('tbl_penjualan.id_penjualan');
        $this->db->where('time_create_penjualan >=', $keyword1);
        $this->db->where('time_create_penjualan <=', $keyword2);
        $result = $this->db->get();

        return $result->result();
    }
    public function getSaldoku($keyword1, $keyword2)
    {
        $this->db->select('sum(tbl_penjualan.berat_penjualan) as berat,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_katalog', 'tbl_katalog.id_katalog=tbl_penjualan.id_katalog');
        $this->db->where('time_create_penjualan >=', $keyword1);
        $this->db->where('time_create_penjualan <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }

    public function getStokReady()
    {
        $this->db->select('*, COUNT(*) as count');

        $this->db->from('armada');
        $this->db->where('status', 'ready');
        $result = $this->db->get();

        return $result->result();
    }
}
