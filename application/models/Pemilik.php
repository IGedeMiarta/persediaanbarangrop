<?php

class Pemilik extends CI_Model
{
    function read($table)
    {
        return $this->db->get($table);
    }

    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function edit($where, $table)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }
    function user($where, $table)
    {
        return $this->db->get_where($table, $where)->result();
    }

    function _pegawai()
    {
        return $this->db->query("SELECT *, COALESCE(username,'null') AS user,pegawai.id_pegawai FROM `pegawai` LEFT JOIN user ON pegawai.id_pegawai=user.id_pegawai ORDER BY pegawai.id_pegawai ASC")->result();
    }
    function edt_pegawai($kd)
    {
        return $this->db->query("SELECT *, COALESCE(username,'null') AS user,pegawai.id_pegawai FROM `pegawai` LEFT JOIN user ON pegawai.id_pegawai=user.id_pegawai WHERE pegawai.id_pegawai=$kd")->row_array();
    }
    function data_product()
    {
        return $this->db->query("SELECT kd_produk,produk.nama AS nama_produk, material.nama AS nama_material,material_cost,deskripsi,harga FROM produk JOIN material ON produk.material=material.kd_material")->result();
    }
    function del_pegawai($id_pegawai)
    {
        return $this->db->query("SELECT pegawai.id_pegawai,nama,jenkel,tgl_lahir,no_hp,alamat,user.id_user,  COALESCE(username,'null') AS user FROM `pegawai` LEFT JOIN user ON pegawai.id_pegawai=user.id_pegawai WHERE pegawai.id_pegawai=$id_pegawai ORDER BY pegawai.id_pegawai ASC")->row_array();
    }
}
