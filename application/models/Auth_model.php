<?php

class Auth_model extends CI_Model
{

    public function cek_login($email)
    {

        $hasil = $this->db->where('email', $email)->limit(1)->get('tbl_users');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
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

    public function logout($data, $email)
    {
        $this->db->where('email', $email);
        $this->db->update('tbl_users', $data);
    }
}
