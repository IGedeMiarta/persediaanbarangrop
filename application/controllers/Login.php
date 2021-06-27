<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            // $this->load->view('login/header');
            // $this->load->view('login/login');
            // $this->load->view('login/footer');
            $this->load->view('login/index');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika user ada
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                if ($user['role'] == 'admin') {
                    $data = [
                        'id' => $user['id_user'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'pegawai' => $user['id_pegawai'],
                        'status' => 'login_admin',
                        'side' => 'admin'
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else if ($user['role'] == 'Pegawai') {
                    $data = [
                        'id' => $user['id_user'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'pegawai' => $user['id_pegawai'],
                        'status' => 'login_pegawai',
                        'side' => 'pegawai'
                    ];
                    $this->session->set_userdata($data);
                    redirect('pegawai');
                } else if ($user['role'] == 'Manager') {
                    $data = [
                        'id' => $user['id_user'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'pegawai' => $user['id_pegawai'],
                        'status' => 'login_manager',
                        'side' => 'manager'
                    ];
                    $this->session->set_userdata($data);
                    redirect('manager');
                }
            } else {
                $this->session->set_flashdata('messege', '<div class="alert alert-danger mt-n5" role="alert">Password Salah</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger mt-n5" role="alert">Username Belum Terdaftar!</div>');
            redirect('login');
        }
    }
    public function regist()
    {

        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdatar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('login/header');
            $this->load->view('login/regist');
            $this->load->view('login/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => htmlspecialchars($this->input->post('role', true))
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', '<script>alert("Selamat, Akun Sudah Dibuat!");</script>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');
        $this->session->set_flashdata('messege', '<script>alert("Anda Sudah Logout!");</script>');
        redirect('login');
    }
}
