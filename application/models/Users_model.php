<?php

class Users_model extends CI_model
{
    public function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $result = $this->db->get();

        return $result->result();
    }
    public function getAllUsersNasabah()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('level', 'nasabah');
        $result = $this->db->get();

        return $result->result();
    }

    public function getID($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('id_users', $id);

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
