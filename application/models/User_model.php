<?php

class User_model extends CI_Model
{
    function user()
    {
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT * FROM user LEFT JOIN pegawai on user.id_pegawai = pegawai.id_pegawai WHERE user.id_user=$id")->row_array();
    }
    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
