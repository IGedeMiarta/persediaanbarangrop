     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Dashboard</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?php if ($this->session->userdata('side') == 'admin') {
                                                                        echo base_url('owner');
                                                                    } else {
                                                                        echo base_url('gudang');
                                                                    }
                                                                    ?>">Home</a></li>
                             <li class="breadcrumb-item active">Dashboard</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
             <div class="content">
                 <div class="container-fluid">
                     <!-- start -->
                     <div class="jumbotron text-center">
                         <div class="col-sm-8 mx-auto">
                             <h1>Selamat datang!</h1>
                             <p><?= $teks ?></b>.</p>
                             <p>
                                 Anda telah login sebagai <b><?php echo $role ?></b>
                             </p>

                         </div>
                     </div>


                     <?php if ($this->session->userdata('side') != 'manager') : ?>

                         <div class="row">
                             <div class="col-lg-6 col-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h4>Barang Perlu Diajukan</h4>
                                     </div>
                                     <div class="card-body">
                                         <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                             <thead>
                                                 <tr>
                                                     <th scope="col">No</th>
                                                     <th scope="col">ID Barang</th>
                                                     <th scope="col">Nama</th>
                                                     <th scope="col">Jenis</th>
                                                     <th scope="col">Safty Stok</th>
                                                     <th scope="col">Stok</th>
                                                     <th scope="col">Opsi</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php
                                                    $no = 1;
                                                    foreach ($aju as $b) { ?>
                                                     <tr>
                                                         <th width="10px" scope="row"><?= $no++ ?></th>
                                                         <td><?= $b->kode ?></td>
                                                         <td><?= $b->nama_barang ?></td>
                                                         <td><?= $b->jenis ?></td>
                                                         <td><?= $b->ss . ' ' . $b->satuan ?></td>
                                                         <td>
                                                             <?php
                                                                if ($b->stok <= $b->ss) {
                                                                    echo '<span class="badge badge-warning">' . $b->stok . ' ' . $b->satuan . '</span>';
                                                                } else {
                                                                    echo $b->stok . ' ' . $b->satuan;
                                                                }

                                                                ?>
                                                         </td>
                                                         <?php $masuk = $this->db->query("SELECT * FROM barang_masuk WHERE kd_barang = $b->kd_barang ORDER BY kd_masuk DESC LIMIT 1")->row_array() ?>
                                                         <td class="text-center"><a href="<?= base_url('pegawai/rop/') . $masuk['kd_masuk'] ?>" class="badge badge-info"> <i class="fas fa-external-link-square-alt"></i></a></td>

                                                     </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-6">
                                 <div class="card">
                                     <div class="card-header">
                                         <h4>Barang Masuk Tertakhir</h4>
                                     </div>
                                     <div class="card-body">

                                         <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                             <thead>
                                                 <tr>
                                                     <th scope="col">No</th>
                                                     <th scope="col">Tanggal</th>
                                                     <th scope="col">Nama Barang</th>
                                                     <th scope="col">Jumlah</th>
                                                     <th scope="col">Harga (st)</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php
                                                    $no = 1;
                                                    foreach ($dt_masuk as $m) { ?>
                                                     <tr>
                                                         <th width="10px" scope="row"><?= $no++ ?></th>

                                                         <td><?= date("d M Y", strtotime($m->waktu)) ?></td>
                                                         <td><?= $m->nama_barang ?></td>
                                                         <td><?= $m->jumlah . ' ' . $m->satuan ?></td>
                                                         <td><?= "Rp " . number_format($m->harga, 0, ",", "."); ?></td>
                                                     </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     <?php endif ?>


                     <!-- Small boxes (Stat box) -->
                     <div class="row">
                         <div class="col-lg-3 col-6">
                             <!-- small box -->
                             <div class="small-box bg-info">
                                 <div class="inner">
                                     <h3><?= $supplier['jml'] ?></h3>

                                     <p>Supplier</p>
                                 </div>
                                 <div class="icon">
                                     <i class="ion ion-bag"></i>
                                 </div>

                             </div>
                         </div>
                         <!-- ./col -->
                         <!-- ./col -->
                         <div class="col-lg-3 col-6">
                             <!-- small box -->
                             <div class="small-box bg-success">
                                 <div class="inner">
                                     <h3><?= $barang['jml'] ?></h3>

                                     <p>Barang</p>
                                 </div>
                                 <div class="icon">
                                     <i class="ion ion-pie-graph"></i>
                                 </div>
                             </div>
                         </div>
                         <!-- ./col -->
                         <!-- ./col -->
                         <div class="col-lg-3 col-6">
                             <!-- small box -->
                             <div class="small-box bg-warning">
                                 <div class="inner">
                                     <h3><?= $pegawai['jml'] ?></h3>

                                     <p>Pegawai</p>
                                 </div>
                                 <div class="icon">
                                     <i class="ion ion-person-add"></i>
                                 </div>

                             </div>
                         </div>

                         <div class="col-lg-3 col-6">
                             <div class="small-box bg-danger">
                                 <div class="inner">

                                     <h3><?= $pengajuan['jml'] ?><sup style="font-size: 20px"></sup></h3>
                                     <p>Pengajuan</p>

                                 </div>
                                 <div class="icon">
                                     <i class="ion ion-stats-bars"></i>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <!-- /.row -->





                     <!-- end -->
                 </div><!-- /.container-fluid -->
             </div>
         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->