<?php

class Pegawai_model extends CI_Model
{


    function read($table)
    {
        return $this->db->get($table)->result();
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
    function kode_barang()
    {
        $query = $this->db->query("SELECT MAX(kode) as kd from barang");
        $data = $query->row();
        $kode = $data->kd;
        $nourut = substr($kode, 2, 6);

        $_barang = $nourut + 1;
        $kode_barang = 'B' . sprintf("%06s", $_barang);
        return $kode_barang;
    }
    function kode_masuk()
    {
        $query = $this->db->query("SELECT MAX(kode) as kd from barang_masuk");
        $data = $query->row();
        $kode = $data->kd;
        $nourut = substr($kode, 11, 15);
        $_barang = $nourut + 1;
        $tgl = date("ymd");
        $masuk = 'T-BM-' . $tgl . sprintf("%04s", $_barang);
        return $masuk;
    }
    function kode_keluar()
    {
        $query = $this->db->query("SELECT MAX(kode) as kd from barang_keluar");
        $data = $query->row();
        $kode = $data->kd;
        $nourut = substr($kode, 11, 15);
        $_barang = $nourut + 1;
        $tgl = date("ymd");
        $masuk = 'T-BK-' . $tgl . sprintf("%04s", $_barang);
        return $masuk;
    }

    function _enum($table, $field)
    {
        $row =  $this->db->query("SHOW COLUMNS FROM " . $table . " WHERE field LIKE '$field'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all($regex, $row, $enum_array);
        $enum_field = $enum_array[1];
        foreach ($enum_field as $key => $value) {
            $enums[$value] = $value;
        }
        return $enums;
    }

    function barang()
    {
        return $this->db->query("SELECT barang.kd_barang,kode,nama_barang,jenis_barang.jenis,COALESCE(rop.ss,'0') AS ss,barang.stok,satuan_barang.satuan FROM `barang` JOIN satuan_barang ON barang.satuan=satuan_barang.id JOIN jenis_barang ON barang.jenis=jenis_barang.id LEFT JOIN rop ON barang.kd_barang=rop.kd_barang ORDER BY barang.kd_barang DESC")->result();
    }
    function masuk()
    {
        return $this->db->query("SELECT barang_masuk.kd_masuk,barang_masuk.kode,barang.nama_barang,barang_masuk.waktu,satuan_barang.satuan,harga, supplier.nama_supp AS supplier, barang_masuk.jumlah, barang_masuk.pegawai FROM barang_masuk, barang,satuan_barang, supplier WHERE barang_masuk.kd_barang=barang.kd_barang AND barang_masuk.supplier=supplier.kd_supp AND barang.satuan=satuan_barang.id ORDER BY kd_masuk DESC")->result();
    }

    function data_aju()
    {
        return $this->db->query("SELECT * FROM barang, satuan_barang, jenis_barang,rop WHERE barang.satuan=satuan_barang.id AND barang.jenis=jenis_barang.id AND rop.kd_barang=barang.kd_barang AND barang.stok <= rop.ss")->result();
    }
    function pengajuan($kode)
    {
        return $this->db->query("SELECT barang_masuk.kd_masuk,barang.kd_barang,barang_masuk.supplier as kd_sup,barang_masuk.kode,barang.nama_barang,barang_masuk.waktu,satuan_barang.satuan,harga, supplier.nama_supp AS supplier, barang_masuk.jumlah,barang.stok, barang_masuk.pegawai FROM barang_masuk, barang,satuan_barang, supplier WHERE barang_masuk.kd_barang=barang.kd_barang AND barang_masuk.supplier=supplier.kd_supp AND barang.satuan=satuan_barang.id AND barang_masuk.kd_masuk=$kode")->row_array();
    }

    function keluar()
    {
        return $this->db->query("SELECT barang_keluar.kd_keluar, barang_keluar.kode,barang.nama_barang,barang_keluar.waktu,barang_keluar.jumlah,barang_keluar.pegawai,satuan_barang.satuan FROM barang_keluar, barang, satuan_barang WHERE barang_keluar.kd_barang=barang.kd_barang AND barang.satuan=satuan_barang.id ORDER BY kd_keluar DESC")->result();
    }
    function keluar_edt($id)
    {
        return $this->db->query("SELECT *,barang_keluar.kode as kd_trak FROM barang_keluar JOIN barang ON barang_keluar.kd_barang=barang.kd_barang WHERE kd_keluar=$id")->row_array();
    }

    function data_pengajuan()
    {
        return $this->db->query("SELECT * FROM pengajuan,barang,supplier,satuan_barang WHERE pengajuan.barang=barang.kd_barang AND pengajuan.supplier=supplier.kd_supp AND barang.satuan=satuan_barang.id ORDER BY kd_pengajuan DESC")->result();
    }
    function masuk_edit($id)
    {
        return $this->db->query("SELECT *,barang_masuk.kode as kode1 FROM `barang_masuk` JOIN barang JOIN supplier on barang_masuk.kd_barang=barang.kd_barang  AND barang_masuk.supplier=supplier.kd_supp WHERE kd_masuk=$id")->row_array();
    }


    function dashboard_aju()
    {
        return $this->db->query("SELECT * FROM barang, satuan_barang, jenis_barang,rop WHERE barang.satuan=satuan_barang.id AND barang.jenis=jenis_barang.id AND rop.kd_barang=barang.kd_barang AND barang.stok <= rop.ss LIMIT 5")->result();
    }
    function dashboard_masuk()
    {
        return $this->db->query("SELECT barang_masuk.kd_masuk,barang_masuk.kode,barang.nama_barang,barang_masuk.waktu,satuan_barang.satuan,harga, supplier.nama_supp AS supplier, barang_masuk.jumlah, barang_masuk.pegawai FROM barang_masuk, barang,satuan_barang, supplier WHERE barang_masuk.kd_barang=barang.kd_barang AND barang_masuk.supplier=supplier.kd_supp AND barang.satuan=satuan_barang.id ORDER BY kd_masuk DESC LIMIT 5")->result();
    }
}
