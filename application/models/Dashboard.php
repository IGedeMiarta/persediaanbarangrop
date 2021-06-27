<?php

class Dashboard extends CI_Model
{
    function _pegawai()
    {
        return $this->db->query("SELECT COUNT(id_pegawai) AS jml FROM pegawai")->row_array();
    }
    function _supplier()
    {
        return $this->db->query("SELECT COUNT(kd_supp) as jml FROM supplier")->row_array();
    }
    function _barang()
    {
        return $this->db->query("SELECT COUNT(kd_barang) as jml FROM barang ")->row_array();
    }
    function _pengajuan()
    {
        return $this->db->query("SELECT COUNT(kd_pengajuan) as jml FROM pengajuan ")->row_array();
    }
    function _bahan_limit()
    {
        return $this->db->query("SELECT * FROM brang WHERE stok <= 50  ORDER BY stok ASC LIMIT 1")->row_array();
    }
}
