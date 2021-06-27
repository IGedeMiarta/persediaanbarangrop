<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('laporan');
    }

    function bahan_masuk()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['masuk'] = $this->laporan->tgl_masuk($mulai, $sampai);
        } else {
            $data['masuk'] = $this->laporan->m_masuk();
        }
        $data['judul'] = "Laporan Barang Masuk";
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('laporan/lap_masuk', $data);
        $this->load->view('temp/footer');
    }
    function masuk_cetak()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['masuk'] = $this->laporan->tgl_masuk($mulai, $sampai);

            $this->load->view('laporan/cetak/masuk_cetak', $data);
        } else {
            redirect('report/bahan_masuk');
        }
    }
    function bahan_keluar()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['keluar'] = $this->laporan->tgl_keluar($mulai, $sampai);
        } else {
            $data['keluar'] = $this->laporan->m_keluar();
        }
        $data['judul'] = "Laporan Barang Keluar";
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('laporan/lap_keluar', $data);
        $this->load->view('temp/footer');
    }
    function keluar_cetak()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['keluar'] = $this->laporan->tgl_keluar($mulai, $sampai);

            $this->load->view('laporan/cetak/keluar_cetak', $data);
        } else {
            redirect('report/bahan_keluar');
        }
    }
    function pengajuan()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['status'] = $this->laporan->tgl_pemesanan($mulai, $sampai);
        } else {
            $data['status'] = $this->laporan->pemesanan();
        }
        $data['judul'] = "Laporan Barang Keluar";
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('laporan/lap_pengajuan', $data);
        $this->load->view('temp/footer');
    }
    function pengajuan_cetak()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['status'] = $this->laporan->tgl_pemesanan($mulai, $sampai);

            $this->load->view('laporan/cetak/pengajuan_cetak', $data);
        } else {
            redirect('report/pengajuan');
        }
    }
}
