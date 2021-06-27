<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Pemilik');

        $this->load->model('pegawai_model', 'pegawai');
        $this->load->model('dashboard');
        $this->load->model('laporan');
        $this->load->model('alert');
    }

    public function index()
    {
        $data['pegawai'] = $this->dashboard->_pegawai();
        $data['supplier'] = $this->dashboard->_supplier();
        $data['barang'] = $this->dashboard->_barang();
        $data['pengajuan'] = $this->dashboard->_pengajuan();
        $data['teks'] = "Halaman Pegawai Sistem Persedian Barang Gamalama Indah Hotel, pegawai dapat menajemen data barang, menginputkan data barang masuk, keluar, manajeman stok dan Melakukan Pengajuan Barang";
        $data['role'] = 'Pegawai';
        $data['judul'] = 'Dashboard';
        $data['aju'] = $this->pegawai->dashboard_aju();
        $data['dt_masuk'] = $this->pegawai->dashboard_masuk();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('temp/dashboard', $data);
        $this->load->view('temp/footer');
    }

    public function supplier()
    {
        $data['supplier'] = $this->pegawai->read('supplier');

        $data['judul'] = 'Supplier';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('pegawai/supplier', $data);
        $this->load->view('temp/footer');
    }
    public function supplier_add()
    {
        $this->form_validation->set_rules('sup_name', 'Nama Supplier', 'trim|required|min_length[5]|alpha');
        $this->form_validation->set_rules('owner', 'Nama Owner', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('hp', 'Nomer Hp', 'trim|required|min_length[11]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Tambah Supplier';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/supplier_add', $data);
            $this->load->view('temp/footer');
        } else {
            //validasi sukses
            $nama_sup = $this->input->post('sup_name', true);
            $owner = $this->input->post('owner', true);
            $no_hp = $this->input->post('hp', true);
            $alamat = $this->input->post('alamat', true);
            $data = [
                'nama_supp' => $nama_sup,
                'owner' => $owner,
                'no_hp' => $no_hp,
                'alamat' => $alamat
            ];

            $this->Pemilik->insert($data, 'supplier');
            $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Ditambahkan!");</script>');
            redirect('pegawai/supplier');
        }
    }
    public function supplier_edt($id_sup)
    {
        $this->form_validation->set_rules('sup_name', 'Sup_name', 'trim|required');
        $this->form_validation->set_rules('owner', 'Owner', 'trim|required');
        $this->form_validation->set_rules('hp', 'Hp', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['supplier'] = $this->pegawai->edit(['kd_supp' => $id_sup], 'supplier');
            $data['judul'] = 'Edit Supplier';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/supplier_edt', $data);
            $this->load->view('temp/footer');
        } else {
            //validasi sukses
            $nama_sup = $this->input->post('sup_name', true);
            $owner = $this->input->post('owner', true);
            $no_hp = $this->input->post('hp', true);
            $alamat = $this->input->post('alamat', true);
            $data = [
                'nama_supp' => $nama_sup,
                'owner' => $owner,
                'no_hp' => $no_hp,
                'alamat' => $alamat
            ];

            $this->pegawai->update(['kd_supp' => $id_sup], $data, 'supplier');
            $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diubah!");</script>');

            redirect('pegawai/supplier');
        }
    }
    function supplier_del($id)
    {
        $this->pegawai->delete(['kd_supp' => $id], 'supplier');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Dihapus!");</script>');
        redirect('pegawai/supplier');
    }

    // ============================ SATUAN BARANG ==================================
    public function satuan_barang()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Satuan Barang';
            $data['satuan'] = $this->pegawai->read('satuan_barang');
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/barang_satuan', $data);
            $this->load->view('temp/footer');
        } else {
            //validasi sukses
            $satuan = $this->input->post('name', true);
            $data = [
                'satuan' => $satuan,
            ];

            $this->pegawai->insert($data, 'satuan_barang');
            $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Ditambahkan!");</script>');
            redirect('pegawai/satuan_barang');
        }
    }
    function satuan_update()
    {
        $id = $this->input->post('id');
        $satuan = $this->input->post('satuan');
        $data = [
            'satuan' => $satuan
        ];
        $this->pegawai->update(['id' => $id], $data, 'satuan_barang');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diubah!");</script>');
        redirect('pegawai/satuan_barang');
    }
    function satuan_del($id)
    {
        $this->pegawai->delete(['id' => $id], 'satuan_barang');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Dihapus!");</script>');
        redirect('pegawai/satuan_barang');
    }

    // ============================ JENIS BARANG ==================================
    public function jenis_barang()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Jenis Barang';
            $data['jenis'] = $this->pegawai->read('jenis_barang');
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/barang_jenis', $data);
            $this->load->view('temp/footer');
        } else {
            //validasi sukses
            $jenis = $this->input->post('name', true);
            $data = [
                'jenis' => $jenis,
            ];

            $this->pegawai->insert($data, 'jenis_barang');
            $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Ditambahkan!");</script>');
            redirect('pegawai/jenis_barang');
        }
    }
    function jenis_update()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $data = [
            'jenis' => $jenis
        ];
        $this->pegawai->update(['id' => $id], $data, 'jenis_barang');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diubah!");</script>');
        redirect('pegawai/jenis_barang');
    }
    function jenis_del($id)
    {
        $this->pegawai->delete(['id' => $id], 'jenis_barang');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Dihapus!");</script>');
        redirect('pegawai/jenis_barang');
    }




    // ============================ BARANG =======================================
    public function barang()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Jenis Barang';
            $data['barang'] = $this->pegawai->barang();
            $data['kode'] = $this->pegawai->kode_barang();
            $data['jenis'] = $this->pegawai->read('jenis_barang');
            $data['satuan'] = $this->pegawai->read('satuan_barang');
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/barang', $data);
            $this->load->view('temp/footer');
        } else {
            //validasi sukses
            $kode = $this->input->post('kode', true);
            $nama_barang = $this->input->post('name', true);
            $jenis = $this->input->post('jenis', true);
            $satuan = $this->input->post('satuan', true);
            $data = [
                'kode' => $kode,
                'nama_barang' => $nama_barang,
                'satuan' => $satuan,
                'jenis' => $jenis
            ];

            $this->pegawai->insert($data, 'barang');
            $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Ditambahkan!");</script>');
            redirect('pegawai/barang');
        }
    }

    function barang_update()
    {
        $id = $this->input->post('id');
        $nama_barang = $this->input->post('nama_barang', true);
        $jenis = $this->input->post('jenis', true);
        $satuan = $this->input->post('satuan', true);
        $data = [
            'nama_barang' => $nama_barang,
            'satuan' => $satuan,
            'jenis' => $jenis
        ];
        $this->pegawai->update(['kd_barang' => $id], $data, 'barang');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diubah!");</script>');
        redirect('pegawai/barang');
    }
    function barang_del($id)
    {
        $this->pegawai->delete(['kd_barang' => $id], 'barang');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Dihapus!");</script>');
        redirect('pegawai/barang');
    }

    // ================================ BARANG MASUK =======================================

    public function barang_masuk()
    {
        $data['kode'] = $this->pegawai->kode_masuk();
        $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required', [
            'required' => 'Tanggal wajib di isi'
        ]);
        $this->form_validation->set_rules('jml', 'Jml', 'trim|required|is_natural', [
            'is_natural' => 'Jumlah Masuk Wajib Bilangan Bulat'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Barang Masuk';
            $data['masuk'] = $this->pegawai->masuk();
            $data['supplier'] = $this->pegawai->read('supplier');
            $data['barang'] = $this->pegawai->read('barang');
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/barang_masuk', $data);
            $this->load->view('temp/footer');
        } else {
            $kd_barang = $this->input->post('barang', true);
            $kode = $this->input->post('kode', true);
            $waktu = $this->input->post('tgl', true);
            $jml = $this->input->post('jml', true);
            $harga = $this->input->post('harga', true);
            $supplier = $this->input->post('supplier', true);
            $id = $this->session->userdata('pegawai');
            $nama = $this->pegawai->edit(['id_pegawai' => $id], 'pegawai');
            if ($this->session->userdata('side') == 'admin') {
                $pegawai = 'Admin';
            } else if ($this->session->userdata('side') == 'pegawai') {
                $pegawai = $nama['nama'];
            }

            $data = [

                'kd_barang' => $kd_barang,
                'kode' => $kode,
                'waktu' => $waktu,
                'jumlah' => $jml,
                'harga' => $harga,
                'supplier' => $supplier,
                'pegawai' => $pegawai
            ];
            $this->pegawai->insert($data, 'barang_masuk');

            // menentukan Safty Stok Awal 
            $cekrop = $this->db->query("SELECT * FROM rop WHERE kd_barang=$kd_barang")->row_array();
            if ($cekrop['rop'] === null) {
                if ($jml >= 5 && $jml <= 1) {
                    $ss = 1;
                } else {
                    $ss = 20 * $jml / 100;
                }
                $this->pegawai->insert(['kd_barang' => $kd_barang, 'ss' => $ss], 'rop');
            }
            $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Ditambahkan!");</script>');
            redirect('pegawai/barang_masuk');
        }
    }
    public function masuk_edit($kd_masuk)
    {
        $data['kode'] = $this->pegawai->kode_masuk();
        $this->form_validation->set_rules('tgl', 'Tgl', 'trim|required');
        $this->form_validation->set_rules('jml', 'Jml', 'trim|required|is_natural');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Edit Barang Masuk';
            $data['masuk'] = $this->pegawai->masuk_edit($kd_masuk);
            $data['supplier'] = $this->pegawai->read('supplier');
            $data['barang'] = $this->pegawai->read('barang');
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/barang_masuk_edit', $data);
            $this->load->view('temp/footer');
        } else {
            $kd_barang = $this->input->post('barang', true);
            $kode = $this->input->post('kode', true);
            $waktu = $this->input->post('tgl', true);
            $jml = $this->input->post('jml', true);
            $harga = $this->input->post('harga', true);
            $supplier = $this->input->post('supplier', true);
            $id = $this->session->userdata('pegawai');
            $nama = $this->pegawai->edit(['id_pegawai' => $id], 'pegawai');
            if ($this->session->userdata('side') == 'admin') {
                $pegawai = 'Admin';
            } else if ($this->session->userdata('side') == 'pegawai') {
                $pegawai = $nama['nama'];
            }

            $data = [
                'kd_barang' => $kd_barang,
                'kode' => $kode,
                'waktu' => $waktu,
                'jumlah' => $jml,
                'harga' => $harga,
                'supplier' => $supplier,
                'pegawai' => $pegawai
            ];
            $this->pegawai->update(['kd_masuk' => $kd_masuk], $data, 'barang_masuk');
            $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diubah!");</script>');
            redirect('pegawai/barang_masuk');
        }
    }

    function masuk_del($id)
    {
        $this->pegawai->delete(['kd_masuk' => $id], 'barang_masuk');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Dihapus!");</script>');
        redirect('pegawai/barang_masuk');
    }
    // is_natural
    // ============================== BARANG KELUAR ================================
    public function barang_keluar()
    {
        $data['kode'] = $this->pegawai->kode_keluar();
        $this->form_validation->set_rules('jml', 'Jml', 'trim|required|is_natural', [
            'is_natural' => 'Jumlah Keluar Wajib Bilangan Bulat'
        ]);
        $this->form_validation->set_rules('tgl', 'Tgl', 'trim|required', [
            'required' => 'Tanggal wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Barang Keluar';
            $data['keluar'] = $this->pegawai->keluar();
            $data['barang'] = $this->pegawai->read('barang');
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/barang_keluar', $data);
            $this->load->view('temp/footer');
        } else {
            $kd_barang = $this->input->post('barang', true);
            $kode = $this->input->post('kode', true);
            $waktu = $this->input->post('tgl', true);
            $jml = $this->input->post('jml', true);
            $id = $this->session->userdata('pegawai');
            $nama = $this->pegawai->edit(['id_pegawai' => $id], 'pegawai');
            if ($this->session->userdata('side') == 'admin') {
                $pegawai = 'Admin';
            } else if ($this->session->userdata('side') == 'pegawai') {
                $pegawai = $nama['nama'];
            }
            $data = [

                'kd_barang' => $kd_barang,
                'kode' => $kode,
                'waktu' => $waktu,
                'jumlah' => $jml,
                'pegawai' => $pegawai
            ];
            $cek = $this->pegawai->edit(['kd_barang' => $kd_barang], 'barang');
            $stok = $cek['stok'];
            if ($stok < $jml) {

                $this->session->set_flashdata('messege', '<script>alert("Jumlah diinputkan lebih besar dari stok tersedia!");</script>');
                redirect('pegawai/barang_keluar');
            } else {

                $this->pegawai->insert($data, 'barang_keluar');
                $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Ditambahkan!");</script>');
                redirect('pegawai/barang_keluar');
            }
        }
    }
    public function barang_keluar_edt($kd_keluar)
    {
        $this->form_validation->set_rules('jml', 'Jml', 'trim|required|is_natural');
        $this->form_validation->set_rules('tgl', 'Tgl', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Barang Keluar';
            $data['keluar'] = $this->pegawai->keluar_edt($kd_keluar);
            $data['barang'] = $this->pegawai->read('barang');
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/barang_keluar_edt', $data);
            $this->load->view('temp/footer');
        } else {
            $kd_barang = $this->input->post('barang', true);
            $kode = $this->input->post('kode', true);
            $waktu = $this->input->post('tgl', true);
            $jml = $this->input->post('jml', true);
            $id = $this->session->userdata('pegawai');
            $nama = $this->pegawai->edit(['id_pegawai' => $id], 'pegawai');
            if ($this->session->userdata('side') == 'admin') {
                $pegawai = 'Admin';
            } else if ($this->session->userdata('side') == 'pegawai') {
                $pegawai = $nama['nama'];
            }
            $data = [

                'kd_barang' => $kd_barang,
                'kode' => $kode,
                'waktu' => $waktu,
                'jumlah' => $jml,
                'pegawai' => $pegawai
            ];
            $cek = $this->pegawai->edit(['kd_barang' => $kd_barang], 'barang');
            $stok = $cek['stok'];
            if ($stok < $jml) {

                $this->session->set_flashdata('messege', '<script>alert("Jumlah diinputkan lebih besar dari stok tersedia!");</script>');
                redirect('pegawai/barang_keluar');
            } else {
                $this->pegawai->update(['kd_keluar' => $kd_keluar], $data, 'barang_keluar');
                $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diubah!");</script>');
                redirect('pegawai/barang_keluar');
            }
        }
    }
    function keluar_del($id)
    {
        $this->pegawai->delete(['kd_keluar' => $id], 'barang_keluar');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Dihapus!");</script>');
        redirect('pegawai/barang_keluar');
    }

    public function pengajuan_barang()
    {
        $this->form_validation->set_rules('jml', 'Jml', 'trim|required|is_natural');
        $this->form_validation->set_rules('tgl', 'Tgl', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['kode'] = $this->pegawai->kode_masuk();
            $data['judul'] = 'Pengajuan';
            $data['barang'] = $this->pegawai->barang();
            $data['aju'] = $this->pegawai->data_aju();
            $data['status'] = $this->pegawai->data_pengajuan();
            $this->load->view('temp/header', $data);
            $this->load->view('temp/topbar');
            $this->load->view('temp/sidebar');
            $this->load->view('pegawai/pengajuan', $data);
            $this->load->view('temp/footer');
        } else {
            $id = $this->session->userdata('pegawai');
            $nama = $this->pegawai->edit(['id_pegawai' => $id], 'pegawai');
            if ($this->session->userdata('side') == 'admin') {
                $pegawai = 'Admin';
            } else if ($this->session->userdata('side') == 'pegawai') {
                $pegawai = $nama['nama'];
            }
            $tgl_diajukan = $this->input->post('tgl_diajukan');
            $tgl_diterima = $this->input->post('tgl');
            $tgl1 = new DateTime($tgl_diajukan);
            $tgl2 = new DateTime($tgl_diterima);
            $d = $tgl2->diff($tgl1)->days + 1;

            $data = [
                'kd_barang' => $this->input->post('kd_barang'),
                'kode' => $this->input->post('kode'),
                'waktu' => $tgl_diterima,
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
                'supplier' => $this->input->post('kd_supp'),
                'pegawai' => $pegawai
            ];
            $where = ['kd_pengajuan' => $this->input->post('kd_pengajuan')];
            $this->pegawai->insert($data, 'barang_masuk');
            $this->pegawai->update($where, ['leadtime' => $d, 'status' => 'Selesai'], 'pengajuan');
            $this->session->set_flashdata('messege', '<script>alert("Barang Masuk Berhasil Diatur");</script>');
            redirect('pegawai/pengajuan_barang');
        }
    }
    public function rop($kode)
    {
        $data['judul'] = 'ROP';
        $data['pengajuan'] = $this->pegawai->pengajuan($kode);
        $this->load->view('temp/header', $data);
        $this->load->view('temp/topbar');
        $this->load->view('temp/sidebar');
        $this->load->view('pegawai/rop', $data);
        $this->load->view('temp/footer');
    }
    public function pengajuan_tambah()
    {
        $barang = $this->input->post('barang');
        $tgl_diajuakan = $this->input->post('tgl');
        $jumlah = $this->input->post('jml');
        $harga = $this->input->post('harga');
        $supplier = $this->input->post('supplier');
        $lt = $this->input->post('lt');
        $ss = $this->input->post('ss');
        $rop = $this->input->post('rop');

        $data = [
            'barang' => $barang,
            'tgl_diajukan' => $tgl_diajuakan,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'supplier' => $supplier,
            'ket' => 'Hasil Perhitungan Metode ROP',
            'status' => 'Pending'
        ];
        $this->pegawai->insert($data, 'pengajuan');
        $rop = [
            'lt' => $lt,
            'ss' => $ss,
            'rop' => $rop
        ];
        $this->pegawai->update(['kd_barang' => $barang], $rop, 'rop');
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diajukan!");</script>');
        redirect('pegawai/pengajuan_barang');
    }
}
