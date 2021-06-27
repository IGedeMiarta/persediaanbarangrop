<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->model('alert');
        $this->load->model('pegawai_model', 'pegawai');
        $this->load->model('pegawai_model', 'gudang_model');
    }

    public function index()
    {
        $data['pegawai'] = $this->dashboard->_pegawai();
        $data['supplier'] = $this->dashboard->_supplier();
        $data['barang'] = $this->dashboard->_barang();
        $data['pengajuan'] = $this->dashboard->_pengajuan();
        $data['teks'] = "Halaman Admin Sistem Persedian Barang Gamalama Indah Hotel, admin dapat menambah pegawai dengan menginputkan data pegawai, mendaftarkan pegawai sebagai user untuk dapat login ke sistem sebagai pegawai";
        $data['role'] = 'Admin';
        $data['judul'] = 'Dashboard';
        $data['aju'] = $this->pegawai->dashboard_aju();
        $data['dt_masuk'] = $this->pegawai->dashboard_masuk();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('temp/dashboard', $data);
        $this->load->view('temp/footer');
    }
    public function pegawai()
    {
        $data['judul'] = 'Pegawai';
        $data['pegawai'] = $this->admin->_pegawai();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('admin/pegawai', $data);
        $this->load->view('temp/footer');
    }
    public function pegawai_add()
    {
        $data['judul'] = 'Tambah Pegawai';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('admin/pegawai_add');
        $this->load->view('temp/footer');
    }
    public function pegawai_add_act()
    {
        $nama = $this->input->post('name', true);
        $jenkel = $this->input->post('jenkel', true);
        $tmp_lahir = $this->input->post('tmp_lahir', true);
        $tgl_lahir = $this->input->post('tgl', true);
        $no_hp = $this->input->post('hp', true);
        $alamat = $this->input->post('alamat', true);
        $desk = $this->input->post('desk', true);
        $data = [
            'nama' => $nama,
            'jenkel' => $jenkel,
            'tmp_lahir' => $tmp_lahir,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
        ];

        $this->admin->insert($data, 'pegawai');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Ditambah!")</script>');
        redirect('admin/pegawai');
    }
    public function pegawai_edt($id_pegawai)
    {
        $where = array('id_pegawai' => $id_pegawai);
        $data['pegawai'] = $this->admin->edt_pegawai($id_pegawai);
        $data['judul'] = 'Edit Pegawai';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('admin/pegawai_edt');
        $this->load->view('temp/footer');
    }

    public function pegawai_edt_act($id_pegawai)
    {

        $where = array('id_pegawai' => $id_pegawai);
        $nama = $this->input->post('name', true);
        $jenkel = $this->input->post('jenkel', true);
        $tgl_lahir = $this->input->post('tgl', true);
        $no_hp = $this->input->post('hp', true);
        $alamat = $this->input->post('alamat', true);
        // $desk = $this->input->post('desk', true);
        $data = [
            'nama' => $nama,
            'jenkel' => $jenkel,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            // 'role' => $desk
        ];

        $this->admin->update($where, $data, 'pegawai');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diubah!")</script>');

        redirect('admin/pegawai');
    }

    public function pegawai_del($id_pegawai)
    {
        $pegawai = $this->admin->del_pegawai($id_pegawai);
        if ($pegawai['user'] == 'null') {
            $where = array('id_pegawai' => $id_pegawai);
            $this->admin->delete($where, 'pegawai');
            $data['akun'] = 'hapus akun != null';
        } else {
            $user = $pegawai['id_user'];
            $this->admin->delete(['id_user' => $user], 'user');
            $where = array('id_pegawai' => $id_pegawai);
            $data['akun'] = 'hapus akun != null';
            $this->admin->delete($where, 'pegawai');
        }
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Dihapus!")</script>');
        redirect('admin/pegawai');
    }
    public function regist($id_pegawai)
    {
        $data['judul'] = 'registrasi Anggota';
        $where = array('id_pegawai' => $id_pegawai);
        $data['pegawai'] = $this->admin->edit($where, 'pegawai');
        // $data['alert'] = $this->alert->notif();
        // $data['status'] = $this->alert->notifikasi();
        $data['judul'] = 'Buat User';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('admin/regist', $data);
        $this->load->view('temp/footer');
    }

    public function regist_act($id_pegawai)
    {
        $pegawai = $id_pegawai;
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdatar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $where = array('id_pegawai' => $id_pegawai);
            $data['pegawai'] = $this->admin->edit($where, 'pegawai');

            $data['judul'] = 'registrasi Anggota';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('admin/regist', $data);
            $this->load->view('temp/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_pegawai' => $pegawai,
                'role' => $this->input->post('role')
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', '<script>alert("Akun Berhasil Dibuat!")</script>');
            redirect('admin/pegawai');
        }
    }
    public function regist_edt($id_pegawai)
    {
        $pegawai = $id_pegawai;
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['pegawai'] = $this->admin->edt_pegawai($pegawai);
            $data['judul'] = 'Edit Anggota';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('admin/pegawai_edt', $data);
            $this->load->view('temp/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role')
            ];

            $this->admin->update(['id_pegawai' => $pegawai], $data, 'user');
            $this->session->set_flashdata('messege', '<script>alert("Akun User Berhasil Diperbaharui !")</script>');
            redirect('admin/pegawai');
        }
    }
}
