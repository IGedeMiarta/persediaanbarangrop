<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('User_model', 'user');
    }
    function index()
    {
        $data['judul'] = 'User';
        $data['user'] = $this->user->user();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('users/datauser', $data);
        $this->load->view('temp/footer');
    }
    function pegawai($id)
    {
        $nama = $this->input->post('name', true);
        $jenkel = $this->input->post('jenkel', true);
        $tmp_lahir = $this->input->post('tmp_lahir', true);
        $tgl_lahir = $this->input->post('tgl', true);
        $no_hp = $this->input->post('hp', true);
        $alamat = $this->input->post('alamat', true);
        $data = [
            'nama' => $nama,
            'jenkel' => $jenkel,
            'tmp_lahir' => $tmp_lahir,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
        ];

        $this->user->update(['id_pegawai' => $id], $data, 'pegawai');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diupdate!")</script>');
        redirect('user');
    }
    function akun($id)
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[5]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'User';
            $data['user'] = $this->user->user();
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('users/datauser', $data);
            $this->load->view('temp/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->user->update(['id_user' => $id], $data, 'user');
            $this->session->set_flashdata('messege', '<script>alert("Ukun Di Update!!");</script>');
            redirect('user');
        }
    }
}
