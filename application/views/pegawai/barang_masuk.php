     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Penerimaan Barang</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Penerimaan Barang</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>
         <!-- Main content -->
         <section class="content">

             <!-- Default box -->
             <?php echo $this->session->flashdata('messege'); ?>
             <?php if (validation_errors()) { ?>
                 <div class="alert alert-danger">
                     <?php echo validation_errors(); ?>
                 </div>
             <?php } ?>



             <div class="card">

                 <div class="card-header badge badge-dark">
                     <h5 class="text-dark">Data Barang</h5>
                 </div>
                 <div class="card-body">
                     <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah_data">
                         Tambah Barang
                     </button>
                 </div>
                 <div class="card-body">

                     <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th scope="col">No</th>
                                 <th scope="col">No. Transaksi</th>
                                 <th scope="col">Tanggal</th>
                                 <th scope="col">Nama Barang</th>
                                 <th scope="col">Supplier</th>
                                 <th scope="col">Jumlah Masuk</th>
                                 <th scope="col">Harga (st)</th>
                                 <th scope="col">Pegawai</th>
                                 <th scope="col">Opsi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($masuk as $b) { ?>
                                 <tr>
                                     <th width="10px" scope="row"><?= $no++ ?></th>
                                     <td><?= $b->kode ?></td>
                                     <td><?= date("d M Y", strtotime($b->waktu)) ?></td>
                                     <td><?= $b->nama_barang ?></td>
                                     <td><?= $b->supplier ?></td>
                                     <td><?= $b->jumlah . ' ' . $b->satuan ?></td>
                                     <td><?= "Rp " . number_format($b->harga, 0, ",", "."); ?></td>
                                     <td><?= $b->pegawai ?></td>
                                     <td>

                                         <!-- <a href="" data-masuk="<?= $b->kd_masuk ?>" class="badge badge-warning edit-masuk" data-toggle="modal" data-target="#edit_masuk<?php echo $b->kode;  ?>"><i class="fas fa-edit"></i> Edit</a> -->
                                         <a href="<?= base_url('pegawai/masuk_edit/') . $b->kd_masuk ?>" class="badge badge-warning "><i class="fas fa-edit"></i> Edit</a>
                                         <?php if ($this->session->userdata('side') == 'admin') : ?>
                                             <a href="<?= base_url('pegawai/masuk_del/' . $b->kd_masuk) ?>" class="badge badge-danger" onclick="return confirm('Yakin Hapus?')"><i class="fas fa-trash"></i> Hapus</a>
                                         <?php endif ?>
                                     </td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>

             <!-- /.card -->

         </section>
         <!-- /.content -->
     </div>

     <!-- Modal Tambah -->
     <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="tambah_dataTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Barang Masuk</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form method="POST" action="">
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">ID Transaksi</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode" value="<?= $kode ?>" readonly>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal </label>
                             <div class="col-sm-8">
                                 <!-- <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tgl" value="<?= set_value('tgl'); ?>"> -->
                                 <input name="tgl" id="tanggal" class="form-control datepicker" placeholder="Tanggal Masuk" type="text" required>

                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Supplier</label>
                             <div class="col-sm-6">
                                 <select name="supplier" class="form-control" id="">
                                     <option value="">--pilih</option>
                                     <?php foreach ($supplier as $s) : ?>
                                         <option value="<?= $s->kd_supp ?>"><?= $s->nama_supp ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                             <div class="col-sm-2">
                                 <a href="<?= base_url('pegawai/supplier') ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i></a>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Nama Barang</label>
                             <div class="col-sm-6">
                                 <select name="barang" class="form-control" id="barang" onchange="masuk()">
                                     <option value="">--pilih</option>
                                     <?php foreach ($barang as $b) : ?>
                                         <option value="<?= $b->kd_barang ?>"><?= $b->nama_barang ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                             <div class="col-sm-2">
                                 <a href="<?= base_url('pegawai/barang') ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i></a>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Stok </label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="stok" name="stok" placeholder="stok" readonly>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Harga Satuan </label>
                             <div class="col-sm-8">
                                 <input type="number" class="form-control" id="harga" name="harga" placeholder="harga" value="<?= set_value('harga'); ?>" required>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Jumlah Masuk </label>
                             <div class="col-sm-8">
                                 <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                         <input class="form-control" type="number" name="jml" id="jml" required>
                                     </div>
                                     <input type="text" class="form-control" name="satuan" placeholder="satuan" id="satuan" readonly>
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