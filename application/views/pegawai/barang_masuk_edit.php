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
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai/barang_masuk') ?>">Penerimaan Barang</a></li>
                             <li class="breadcrumb-item active">Edit Penerimaan Barang</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>
         <!-- Main content -->
         <section class="content">

             <!-- Default box -->
             <?php echo $this->session->flashdata('messege'); ?>

             <div class="card">

                 <div class="card-header badge badge-dark">
                     <h5 class="text-dark">Edit Data Barang</h5>
                 </div>

                 <div class="card-body">
                     <div class="container">
                         <form method="POST" action="">
                             <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">ID Transaksi</label>
                                 <div class="col-sm-8">
                                     <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode" value="<?= $masuk['kode1'] ?>" readonly>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal </label>
                                 <div class="col-sm-8">

                                     <input name="tgl" id="tanggal" class="form-control datepicker" placeholder="Tanggal Masuk" value="<?= $masuk['waktu'] ?>" type="text">

                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Supplier</label>
                                 <div class="col-sm-6">
                                     <select name="supplier" class="form-control" id="">
                                         <option value="<?= $masuk['kd_supp'] ?>"><?= $masuk['nama_supp'] ?></option>
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
                                         <option value="<?= $masuk['kd_barang'] ?>"><?= $masuk['nama_barang'] ?></option>
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
                                     <input type="text" class="form-control" id="stok" name="stok" placeholder="stok" value="<?= $masuk['stok'] ?>" readonly>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Harga Satuan </label>
                                 <div class="col-sm-8">
                                     <input type="number" class="form-control" id="harga" name="harga" placeholder="harga" value="<?= $masuk['harga'] ?>">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Jumlah Masuk </label>
                                 <div class="col-sm-8">
                                     <div class="input-group mb-3">
                                         <div class="input-group-prepend">
                                             <input class="form-control" type="number" name="jml" id="jml" value="<?= $masuk['jumlah'] ?>">
                                         </div>
                                         <input type="text" class="form-control" name="satuan" placeholder="satuan" id="satuan" readonly>
                                     </div>
                                 </div>
                             </div>

                     </div>
                     <div class="container">
                         <div class="modal-footer center-block">
                             <button type="reset" class="btn btn-secondary">Reset</button>
                             <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                     </div>
                     </form>
                 </div>

             </div>

             <!-- /.card -->

         </section>
         <!-- /.content -->
     </div>