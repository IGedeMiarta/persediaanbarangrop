<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('status') != "login_admin") {
        //     $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
        //     redirect('login');
        // }
        $this->load->library('form_validation');
        $this->load->model('Pemilik', 'admin');
        $this->load->model('dashboard');
        $this->load->model('laporan');
        $this->load->model('pegawai_model', 'pegawai');
    }
    public function index()
    {
        $data['pegawai'] = $this->dashboard->_pegawai();
        $data['supplier'] = $this->dashboard->_supplier();
        $data['barang'] = $this->dashboard->_barang();
        $data['pengajuan'] = $this->dashboard->_pengajuan();
        $data['teks'] = "Halaman manager Sistem Persedian Barang Gamalama Indah Hotel, manager dapat melihat data pengajuan barang memutuskan apakah layak di approve atau tidak dan manager dapat melihat data ketersediaan barang";
        $data['role'] = 'Manager';
        $data['judul'] = 'Dashboard';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('temp/dashboard', $data);
        $this->load->view('temp/footer');
    }
    public function pengajuan()
    {
        $data['judul'] = 'Data Pengajuan';
        $data['barang'] = $this->pegawai->barang();
        $data['aju'] = $this->pegawai->data_aju();
        $data['status'] = $this->pegawai->data_pengajuan();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('manager/pengajuan', $data);
        $this->load->view('temp/footer');
    }
    public function pengajuan_act($kd, $status)
    {
        $this->pegawai->update(['kd_pengajuan' => $kd], ['status' => $status], 'pengajuan');
        $this->session->set_flashdata('messege', '<script>alert("Status Pengajuan Berhasil Diubah!")</script>');
        redirect('manager/pengajuan');
    }
}
