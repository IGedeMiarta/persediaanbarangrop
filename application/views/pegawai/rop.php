     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Reorder Point</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Home</a></li>
                             <li class="breadcrumb-item active">reorder point</li>
                         </ol>
                     </div>
                 </div>
             </div>
         </section>


         <!-- ==============PERHITUNGAN ROP ================== -->
         <?php
            $kd_barang = $pengajuan['kd_barang'];

            $aju = $this->db->query("SELECT *,MAX(leadtime)as max, AVG(leadtime) as avg FROM pengajuan WHERE barang=$kd_barang")->row_array();
            // LT = waktu yang dibutuhkan pemesanan 
            if ($aju['avg'] === null) {
                $lt_terlama = 7;
                $rata_lt = 4;
            } else {
                $lt_terlama = $aju['max'];
                $rata_lt = round($aju['avg']);
            }

            $keluar =  $this->db->query("SELECT *,MAX(jumlah)as max, AVG(jumlah) as avg FROM `barang_keluar` WHERE kd_barang=$kd_barang")->row_array();
            $pengeluarantertinggi = $keluar['max'];
            $rataharian = round($keluar['avg']);

            // SS = (max * lt)-(avg*avg(lt))
            $ss = ($pengeluarantertinggi * $lt_terlama) - ($rataharian * $rata_lt);


            $d = $rataharian;

            // ROP = (LT*D)+SS
            $rop = ($rata_lt * $d) + $ss;
            ?>

         <!-- ================ END PERHITUNGAN ================= -->




         <!-- Main content -->
         <section class="content">

             <!-- Default box -->
             <div class="card">
                 <div class="container">
                     <div class="card-header">
                         <h5 class="text-center mb-3 mt-3"><b>PENGAJUAN BARANG BERDASDARKAN METODE ROP (REORDER POINT)</b></h5>
                     </div>
                     <div class="card-body">
                         <H5 class="strong text-secondary"><?= $pengajuan['kode'] ?></H5>
                         <h5><a href="#" data-toggle="modal" data-target="#exampleModal"><?= $pengajuan['nama_barang'] ?></a></h5>
                         <div class="row">
                             <div class="col-md-8">
                                 <table class="table table-borderless text-left">
                                     <tr>
                                         <td width="10px">
                                             <div class="badge badge-danger">
                                                 <div class="text-danger">0</div>
                                             </div>
                                         </td>
                                         <td>Pengeluaran Barang Tertinggi</td>
                                         <td><?= $keluar['max'] . ' ' . $pengajuan['satuan'] ?> </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="badge badge-warning">
                                                 <div class="text-warning">0</div>
                                             </div>
                                         </td>
                                         <td>Leadtime Terlama</td>
                                         <td><?= $lt_terlama ?> hari</td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="badge badge-success">
                                                 <div class="text-success">0</div>
                                             </div>
                                         </td>
                                         <td>Rata-Rata Pengeluaran Harian</td>
                                         <td><?= $rataharian . ' ' . $pengajuan['satuan'] ?></td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="badge badge-success">
                                                 <div class="text-success">0</div>
                                             </div>
                                         </td>
                                         <td>Rata-Rata Lead Time</td>
                                         <td><?= $rata_lt ?> hari</td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="badge badge-success">
                                                 <div class="text-success">0</div>
                                             </div>
                                         </td>
                                         <td>Safety Stok (SS)</td>
                                         <td><?= $ss . ' ' . $pengajuan['satuan']  ?> </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="badge badge-success">
                                                 <div class="text-success">0</div>
                                             </div>
                                         </td>
                                         <td>Penggunaan Perhari</td>
                                         <td><?= $d . ' ' . $pengajuan['satuan'] ?></td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div class="badge badge-success">
                                                 <div class="text-success">0</div>
                                             </div>
                                         </td>
                                         <td>Lead Time</td>
                                         <td><?= $rata_lt ?> hari</td>
                                     </tr>
                                 </table>
                             </div>
                             <div class="col-md-4">
                                 <div class="float-right">
                                     <div class="small-box border border-warning">
                                         <div class="inner text-center">
                                             <h4><i class="fas fa-info-circle"></i> <b class="text-warning">Time to restok</b></h4>
                                             <form action="<?= base_url('pegawai/pengajuan_tambah') ?>" method="POST">
                                                 <input type="hidden" name="barang" value="<?= $pengajuan['kd_barang'] ?>">
                                                 <input type="hidden" name="harga" value="<?= $pengajuan['harga'] ?>">
                                                 <input type="hidden" name="jml" value="<?= $rop ?>">
                                                 <input type="hidden" name="supplier" value="<?= $pengajuan['kd_sup'] ?>">

                                                 <input name="tgl" id="tanggal" class="form-control datepicker" placeholder="tanggal diajukan" type="text">
                                                 <!-- simpan perhitungan rop -->
                                                 <input type="hidden" name="lt" class="form-control" value="<?= $rata_lt ?>">
                                                 <input type="hidden" name="ss" value="<?= $ss ?>">
                                                 <input type="hidden" name="rop" value="<?= $rop ?>">
                                                 <button type="submit" class="btn btn-warning btn-sm mt-3">Send to GM</button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="container">
                         <div class="row ml-2 mr-2">
                             <div class="col-lg-6">
                                 <!-- small box -->
                                 <div class="small-box border border-info bg-light">
                                     <div class="inner">
                                         <h4 class="text-bold text-info">Safety Stok</h4>
                                         <h6 class="text-bold">SS = (max * maxLT)-( avg * avgLT) </h6>
                                         <h6 class="text-bold">SS = <?= '( ' . $pengeluarantertinggi . ' * ' . $lt_terlama . ' ) ' . ' - ' . ' ( ' . $rataharian . ' * ' . $rata_lt . ' )' ?> </h6>
                                         <h6 class="text-bold">SS = <?= $ss ?> </h6>
                                         <div class="container">
                                             <table>
                                                 <tr>
                                                     <td><b>max</b> </td>
                                                     <td> : </td>
                                                     <td>Pengeluaran Tertinggi</td>
                                                 </tr>
                                                 <tr>
                                                     <td><b>maxLT</b> </td>
                                                     <td> : </td>
                                                     <td>Leadtime Terlama</td>
                                                 </tr>
                                                 <tr>
                                                     <td><b>avg</b> </td>
                                                     <td> : </td>
                                                     <td>Rata-rata Pengeluaran Harian</td>
                                                 </tr>
                                                 <tr>
                                                     <td><b>avgLT</b> </td>
                                                     <td> : </td>
                                                     <td>Rata-rata Lead Time</td>
                                                 </tr>
                                             </table>
                                         </div>
                                         <!-- <h5 class="text-bold text-info"><?= $ss ?> Pcs</h5> -->

                                     </div>

                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <!-- small box -->
                                 <div class="small-box border border-info bg-light">
                                     <div class="inner">
                                         <h4 class="text-bold text-info">Reorder Point</h4>

                                         <h6 class="text-bold">ROP = (LT*D)+SS</h6>
                                         <h6 class="text-bold">ROP = <?= '( ' . $rata_lt . ' * ' . $d . ' ) ' . ' + ' . $ss ?></h6>
                                         <h6 class="text-bold">ROP = <?= ($rata_lt * $d) + $ss ?></h6>
                                         <div class="container">
                                             <table>
                                                 <tr>
                                                     <td><b>LT</b> </td>
                                                     <td> : </td>
                                                     <td>Leadtime</td>
                                                 </tr>
                                                 <tr>
                                                     <td><b>D</b> </td>
                                                     <td> : </td>
                                                     <td>Penggunaan Perhari</td>
                                                 </tr>
                                                 <tr>
                                                     <td><b>SS</b> </td>
                                                     <td> : </td>
                                                     <td>Safty Stok</td>
                                                 </tr>

                                             </table>
                                             <br>
                                         </div>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>





                     <div class="card-body">
                         <div class="row mt-3">
                             <div class="col-lg-3 col-6">
                                 <!-- small box -->
                                 <div class="small-box border border-warning bg-light">
                                     <div class="inner">
                                         <h4 class="text-bold">Safety Stok</h4>

                                         <h5 class="text-bold text-info"><?= $ss . ' ' . $pengajuan['satuan'] ?> </h5>
                                     </div>
                                     <div class="icon mb-3">
                                         <i class="fas fa-shield-alt"></i>
                                     </div>
                                 </div>
                             </div>
                             <!-- ./col -->
                             <!-- ./col -->
                             <div class="col-lg-3 col-6">
                                 <!-- small box -->
                                 <div class="small-box border border-success bg-light">
                                     <div class="inner">
                                         <h4 class="text-bold">Penggunaan</h4>

                                         <h5 class="text-bold text-info"><?= $d . ' ' . $pengajuan['satuan'] ?> </h5>
                                     </div>
                                     <div class="icon mb-3">
                                         <i class="fas fa-calendar-check"></i>
                                     </div>
                                 </div>
                             </div>
                             <!-- ./col -->
                             <!-- ./col -->
                             <div class="col-lg-3 col-6">
                                 <!-- small box -->
                                 <div class="small-box border border-danger bg-light">
                                     <div class="inner">
                                         <h4 class="text-bold">Lead Time</h4>

                                         <h5 class="text-bold text-info"><?= $rata_lt ?> Days</h5>
                                     </div>
                                     <div class="icon mb-3">
                                         <i class="fas fa-clock"></i>
                                     </div>

                                 </div>
                             </div>

                             <div class="col-lg-3 col-6">
                                 <div class="small-box border border-primary bg-light">
                                     <div class="inner">

                                         <h4 class="text-bold">ROP<sup style="font-size: 20px"></sup></h4>
                                         <h5 class="text-bold text-info"><?= $rop . ' ' . $pengajuan['satuan'] ?></h5>

                                     </div>
                                     <div class="icon mb-3">
                                         <i class="fas fa-align-justify"></i>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- /.card -->
         </section>
         <!-- /.content -->

     </div>
     <!-- /.content-wrapper -->

     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">

                 <div class="modal-body">
                     <table class="table table-borderless text-left">
                         <tr>

                             <td>Nomor Transaksi</td>
                             <td><?= $pengajuan['kode'] ?></td>
                         </tr>
                         <tr>
                             <td>Tanggal Masuk</td>
                             <td><?= date("d-m-Y", strtotime($pengajuan['waktu'])) ?></td>
                         </tr>
                         <tr>

                             <td>Nama Barang</td>
                             <td><?= $pengajuan['nama_barang'] ?></td>
                         </tr>
                         <tr>

                             <td>Harga Satuan</td>
                             <td><?= $pengajuan['harga'] ?></td>
                         </tr>
                         <tr>

                             <td>Jumlah Stok</td>
                             <td><?= $pengajuan['stok'] . ' ' . $pengajuan['satuan'] ?></td>
                         </tr>
                         <tr>

                             <td>Supplier</td>
                             <td><?= $pengajuan['supplier'] ?></td>
                         </tr>

                     </table>
                     <button type="button" class="btn btn-success float-right" data-dismiss="modal">Close</button>
                 </div>

             </div>
         </div>
     </div>