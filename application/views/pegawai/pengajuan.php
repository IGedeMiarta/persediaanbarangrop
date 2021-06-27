     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Pengajuan Barang</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Pengajuan Barang</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>
         <!-- Main content -->
         <section class="content">

             <!-- Default box -->
             <?php echo $this->session->flashdata('messege'); ?>

             <div class="accordion" id="accordionExample">
                 <div class="card">
                     <div class="card-header" id="headingOne">
                         <h2 class="mb-0">
                             <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <h5 class="text-dark text-center">Pengajuan Barang</h5>
                             </button>
                         </h2>
                     </div>

                     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                         <div class="card-body">
                             <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
             </div>

             <div class="card">
                 <div class="card-header">
                     <h5 class="text-center">Status Pengajuan</h5>
                 </div>
                 <div class="card-body">
                     <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th scope="col">No</th>
                                 <th scope="col">Tanggal Diajuakn</th>
                                 <th scope="col">ID Barang</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Harga Satuan</th>
                                 <th scope="col">Jumlah</th>
                                 <th scope="col">Supplier</th>
                                 <th scope="col">Status</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($status as $b) { ?>
                                 <tr>
                                     <th width="10px"><?= $no++ ?></th>
                                     <td><?= date("d M Y", strtotime($b->tgl_diajukan)) ?></td>
                                     <td><?= $b->kode ?></td>
                                     <td><?= $b->nama_barang ?></td>
                                     <td><?= "Rp " . number_format($b->harga, 0, ",", "."); ?></td>
                                     <td><?= $b->jumlah . ' ' . $b->satuan ?></td>
                                     <td><?= $b->nama_supp ?></td>
                                     <td><?php
                                            if ($b->status == 'Diterima') { ?>
                                             <a href="" data-pengajuan="<?= $b->kd_pengajuan ?>" class="badge badge-info barang-masuk" data-toggle="modal" data-target="#tambah_data"> <i class="fas fa-external-link-square-alt"></i> Atur Masuk</a>
                                         <?php } else {
                                                echo $b->status;
                                            } ?>
                                     </td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </section>
         <!-- /.content -->
     </div>


     <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="tambah_dataTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title text-center" id="exampleModalLongTitle"><b>Atur Barang Masuk</b></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form method="POST" action="">
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal </label>
                             <div class="col-sm-8">
                                 <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tgl" value="<?= set_value('tgl'); ?>">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">ID Transaksi</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode" value="<?= $kode ?>" readonly>
                             </div>
                         </div>

                         <input type="hidden" class="form-control" id="kd_barang" name="kd_barang" placeholder="kd_barang" readonly>
                         <input type="hidden" class="form-control" id="kd_pengajuan" name="kd_pengajuan" placeholder="kd_pengajuan" readonly>
                         <input type="hidden" class="form-control" id="tgl_diajukan" name="tgl_diajukan" placeholder="tgl_diajukan" readonly>

                         <input type="hidden" class="form-control" id="kd_supp" name="kd_supp" placeholder="kd_supp" readonly>

                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Supplier</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="supplier" name="supplier" placeholder="supplier" readonly>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Nama Barang</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="barang" name="barang" placeholder="barang" readonly>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Harga Satuan </label>
                             <div class="col-sm-8">
                                 <input type="number" class="form-control" id="harga" name="harga" placeholder="harga" value="<?= set_value('harga'); ?>" readonly>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Jumlah Masuk </label>
                             <div class="col-sm-8">
                                 <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                         <input class="form-control" type="number" name="jumlah" id="jumlah" placeholder="atur jumlah masuk">
                                     </div>
                                     <input type="text" class="form-control" name="jml" placeholder="jml" id="jml" readonly>
                                 </div>
                             </div>
                         </div>

                 </div>
                 <div class="modal-footer center-block">
                     <button type="reset" class="btn btn-secondary">Reset</button>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>