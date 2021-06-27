<?php

class Laporan extends CI_Model
{

    function tgl_masuk($mulai, $sampai)
    {
        return $this->db->query("SELECT barang_masuk.kd_masuk,barang_masuk.kode,barang.nama_barang,barang_masuk.waktu,satuan_barang.satuan,harga, supplier.nama_supp AS supplier, barang_masuk.jumlah, barang_masuk.pegawai FROM barang_masuk, barang,satuan_barang, supplier WHERE barang_masuk.kd_barang=barang.kd_barang AND barang_masuk.supplier=supplier.kd_supp AND barang.satuan=satuan_barang.id AND date(waktu) >='$mulai' AND date(waktu) <= '$sampai'  ORDER BY kd_masuk DESC")->result();
    }
    function m_masuk()
    {
        return $this->db->query("SELECT barang_masuk.kd_masuk,barang_masuk.kode,barang.nama_barang,barang_masuk.waktu,satuan_barang.satuan,harga, supplier.nama_supp AS supplier, barang_masuk.jumlah, barang_masuk.pegawai FROM barang_masuk, barang,satuan_barang, supplier WHERE barang_masuk.kd_barang=barang.kd_barang AND barang_masuk.supplier=supplier.kd_supp AND barang.satuan=satuan_barang.id ORDER BY kd_masuk DESC")->result();
    }

    function m_keluar()
    {
        return $this->db->query("SELECT barang_keluar.kd_keluar, barang_keluar.kode,barang.nama_barang,barang_keluar.waktu,barang_keluar.jumlah,barang_keluar.pegawai,satuan_barang.satuan FROM barang_keluar, barang, satuan_barang WHERE barang_keluar.kd_barang=barang.kd_barang AND barang.satuan=satuan_barang.id ORDER BY kd_keluar DESC")->result();
    }
    function tgl_keluar($mulai, $sampai)
    {
        return $this->db->query("SELECT barang_keluar.kd_keluar, barang_keluar.kode,barang.nama_barang,barang_keluar.waktu,barang_keluar.jumlah,barang_keluar.pegawai,satuan_barang.satuan FROM barang_keluar, barang, satuan_barang WHERE barang_keluar.kd_barang=barang.kd_barang AND barang.satuan=satuan_barang.id AND date(waktu) >='$mulai' AND date(waktu) <= '$sampai'  ORDER BY kd_keluar DESC")->result();
    }
    function pemesanan()
    {
        return $this->db->query("SELECT * FROM pengajuan,barang,supplier,satuan_barang WHERE pengajuan.barang=barang.kd_barang AND pengajuan.supplier=supplier.kd_supp AND barang.satuan=satuan_barang.id ORDER BY kd_pengajuan DESC")->result();
    }
    function tgl_pemesanan($mulai, $sampai)
    {
        return $this->db->query("SELECT * FROM pengajuan,barang,supplier,satuan_barang WHERE pengajuan.barang=barang.kd_barang AND pengajuan.supplier=supplier.kd_supp AND barang.satuan=satuan_barang.id AND  date(tgl_diajukan) >='$mulai' AND date(tgl_diajukan) <= '$sampai'  ORDER BY kd_pengajuan DESC")->result();
    }
}
