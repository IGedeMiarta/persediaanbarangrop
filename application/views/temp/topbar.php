<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user ">
                <?php
                $id = $this->session->userdata('id');
                $user =  $this->db->query("SELECT * FROM user WHERE id_user=$id")->row_array();
                $id_pegawai = $user['id_pegawai'];
                $pegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai=$id_pegawai")->row_array();
                ?>


                <?php if ($this->session->userdata('side') == 'admin') {
                    echo ' <b>ADMIN</b>';
                } elseif ($this->session->userdata('side') == 'pegawai') {
                    echo $pegawai['nama'] . ' | <b>Pegawai</b>';
                } else {
                    echo $pegawai['nama'] . ' | <b>Manager</b>';
                } ?>
                <i class="fas fa-angle-down ml-2"></i>
            </i>

        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <?php if ($this->session->userdata('side') != 'admin') { ?>
                <a href="<?= base_url('user') ?>" class="dropdown-item">
                    <i class="fas fa-user mr-4"></i>User
                </a>
                <a href="<?= base_url('login/logout') ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-4"></i>Logout
                </a>
            <?php } else { ?>
                <a href="<?= base_url('login/logout') ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-4"></i>Logout
                </a>
            <?php } ?>


        </div>
    </li>
</ul>
</nav>
<!-- /.navbar -->