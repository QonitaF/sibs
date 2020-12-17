<?php

class Nasabah_model extends CI_model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        //$this->db->join('tbl_users', 'tbl_users.id_users=tbl_penjualan.id_users');
        $this->db->where('level', 'nasabah');
        $result = $this->db->get();

        return $result->result();
    }
    public function getPenjualan()
    {
        $this->db->select('*');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_penjualan.id_users');
        $this->db->where('tbl_users.id_users', $this->session->userdata('id_users'));
        $result = $this->db->get();

        return $result->result();
    }
    public function getSaldoku()
    {
        $this->db->select('tbl_users.name,tbl_users.rt_users,tbl_users.alamat_users,tbl_users.telepon_users,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_penjualan.id_users');
        $this->db->where('tbl_users.id_users', $this->session->userdata('id_users'));
        $this->db->group_by('tbl_users.id_users');

        $result = $this->db->get();

        return $result->result();
    }
    public function getPenjualanku()
    {
        $this->db->select('*');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_penjualan.id_users');
        $this->db->join('tbl_katalog', 'tbl_katalog.id_katalog=tbl_penjualan.id_katalog');
        $this->db->where('tbl_users.id_users', $this->session->userdata('id_users'));
        $result = $this->db->get();

        return $result->result();
    }
    public function getAllNasabah()
    {
        $this->db->select('tbl_users.name,tbl_users.rt_users,tbl_users.alamat_users,tbl_users.telepon_users,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_penjualan.id_users');
        $this->db->where('tbl_users.level', 'nasabah');
        $this->db->group_by('tbl_users.id_users');

        $result = $this->db->get();

        return $result->result();
    }
    public function getbytgl($keyword1, $keyword2)
    {
        $this->db->select('*');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_penjualan.id_users');
        $this->db->join('tbl_katalog', 'tbl_katalog.id_katalog=tbl_penjualan.id_katalog');
        $this->db->where('tbl_users.id_users', $this->session->userdata('id_users'));
        $this->db->where('time_create_penjualan >=', $keyword1);
        $this->db->where('time_create_penjualan <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }
    public function getNasabahbytgl($keyword1, $keyword2)
    {
        $this->db->select('tbl_users.name,tbl_users.rt_users,tbl_users.alamat_users,tbl_users.telepon_users,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_penjualan.id_users');
        $this->db->where('tbl_users.level', 'nasabah');
        $this->db->group_by('tbl_users.id_users');
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

    public function getIdsId()
    {
        $this->db->select('*');
        $this->db->from('santri');
        $this->db->join('users', 'users.id=santri.id');

        $result = $this->db->get();

        return $result->result();
    }

    public function Insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }


    function tampil_data()
    {
        return $this->db->get('santri');
    }

    function cari($ids)
    {
        $query = $this->db->get_where('santri', array('ids' => $ids));
        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id_users', $id);
        $this->db->update('tbl_users', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
    public function update1($id, $data1)
    {
        $this->db->where('id', $id);
        $this->db->update('santri', $data1);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function updateAva($id, $data)
    {
        $update = $this->db->get('santri');
        $row = $update->row_array();
        if ($update->num_rows() > 0) {
            if (isset($data['gambar_santri'])) {
                #lets delete the image                
                unlink("./assets/img/users/" . $row['gambar_santri']);
            }
        }
        $this->db->where('id', $id);
        $this->db->update('santri', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function Cetak()
    {
        $this->db->select('*');
        $this->db->from('santri');
        $this->db->join('users', 'users.id=santri.id');
        $this->db->where('santri.id', $this->session->userdata('id'));

        $result = $this->db->get();

        return $result->result();
    }

    public function delete($id)
    {
        $this->db->where('id_users', $id);
        $this->db->delete('tbl_users');

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
}
