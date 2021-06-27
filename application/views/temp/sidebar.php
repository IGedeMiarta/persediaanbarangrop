<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <img src="<?= base_url('assets/logo/logo-white.png') ?>" class="ml-5 mt-2" alt="AdminLTE Logo" width="100px" style="opacity: .8"> -->
    <h4 class="text-light ml-3 mb-2 mt-2">Persediaan Barang</h4>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-n2 pb-3 mb-3 d-flex">
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php if ($this->session->userdata('side') == 'admin') { ?>
                    <li class="nav-header">HOME</li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home mr-4"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/pegawai') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users mr-4"></i>
                            <p>
                                Pegawai
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('pegawai/supplier') ?>" class="nav-link">
                            <i class="nav-icon fas fa-store mr-4"></i>
                            <p>
                                Supplier
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-archive mr-4"></i>
                            <p>
                                Barang
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/satuan_barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Satuan Barang</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/jenis_barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Jenis Barang</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Data Barang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit mr-4"></i>
                            <p>
                                Transaksi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/barang_masuk') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p> Barang Masuk</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/barang_keluar') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p> Barang Keluar</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/pengajuan_barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Pengajuan Barang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } else if ($this->session->userdata('side') == 'pegawai') { ?>
                    <li class="nav-header">HOME</li>
                    <li class="nav-item">
                        <a href="<?= base_url('pegawai') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home mr-4"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('pegawai/supplier') ?>" class="nav-link">
                            <i class="nav-icon fas fa-store mr-4"></i>
                            <p>
                                Supplier
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-archive mr-4"></i>
                            <p>
                                Barang
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/satuan_barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Satuan Barang</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/jenis_barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Jenis Barang</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Data Barang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit mr-4"></i>
                            <p>
                                Transaksi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/barang_masuk') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p> Barang Masuk</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/barang_keluar') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p> Barang Keluar</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pegawai/pengajuan_barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Pengajuan Barang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } else if ($this->session->userdata('side') == 'manager') { ?>
                    <li class="nav-header">HOME</li>
                    <li class="nav-item">
                        <a href="<?= base_url('manager') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home mr-4"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('manager/pengajuan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-paste mr-4"></i>
                            <p>
                                Pengajuan
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-header ">LAPORAN</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard mr-4"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('report/bahan_masuk') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Laporan Barang Masuk</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('report/bahan_keluar') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Laporan Barang Keluar</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('report/pengajuan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Laporan Pengajuan</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>