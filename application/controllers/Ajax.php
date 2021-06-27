<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function edit_satuan()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('satuan');
            $satuan_barang = $this->db->get_where('satuan_barang', ['id' => $id])->row();
            echo json_encode($satuan_barang);
        } else {
            redirect('eror');
        }
    }
    public function edit_jenis()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('jenis');
            $jenis_barang = $this->db->get_where('jenis_barang', ['id' => $id])->row();
            echo json_encode($jenis_barang);
        } else {
            redirect('eror');
        }
    }
    public function edit_barang()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('barang');
            $barang = $this->db->get_where('barang', ['kd_barang' => $id])->row();
            echo json_encode($barang);
        } else {
            redirect('eror');
        }
    }
    public function cari()
    {
        $barang = $_GET['barang'];
        $cari = $this->db->query("SELECT * FROM barang, satuan_barang WHERE barang.satuan=satuan_barang.id AND kd_barang=$barang")->result();
        echo json_encode($cari);
    }

    public function pengajuan_barang()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('pengajuan');
            $pengajuan = $this->db->query("SELECT * FROM pengajuan,barang,supplier,satuan_barang WHERE pengajuan.barang=barang.kd_barang AND pengajuan.supplier=supplier.kd_supp AND barang.satuan=satuan_barang.id AND kd_pengajuan=$id")->row();
            echo json_encode($pengajuan);
        } else {
            redirect('eror');
        }
    }
    public function edit_masuk()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('kd_masuk');
            $barang = $this->db->query("SELECT * FROM `barang_masuk` JOIN barang on barang_masuk.kd_barang=barang.kd_barang WHERE kd_masuk=$id")->row();

            echo json_encode($barang);
        } else {
            redirect('eror');
        }
    }
}
