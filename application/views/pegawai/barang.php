     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Data Barang</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Data Barang</li>
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
                                foreach ($barang as $b) { ?>
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
                                     <td>
                                         <a href="" data-barang="<?= $b->kd_barang ?>" class="badge badge-warning edit-barang" data-toggle="modal" data-target="#edit_data"><i class="fas fa-edit"></i> Edit</a>
                                         <a href="<?= base_url('pegawai/barang_del/' . $b->kd_barang) ?>" class="badge badge-danger" onclick="return confirm('Yakin Hapus?')"><i class="fas fa-trash"></i> Hapus</a>
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
         <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Barang</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form method="POST" action="">
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">ID Barang</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="kode" name="kode" placeholder="Nama Satuan" value="<?= $kode ?>" readonly>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Nama Barang</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="name" name="name" placeholder="Nama Barang" value="<?= set_value('name'); ?>" required>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Jenis Barang</label>
                             <div class="col-sm-6">
                                 <select name="jenis" class="form-control" id="">
                                     <?php foreach ($jenis as $j) : ?>
                                         <option value="<?= $j->id ?>"><?= $j->jenis ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                             <div class="col-sm-2">
                                 <a href="<?= base_url('pegawai/jenis_barang') ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i></a>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Satuan Barang</label>
                             <div class="col-sm-6">
                                 <select name="satuan" class="form-control" id="">
                                     <?php foreach ($satuan as $s) : ?>
                                         <option value="<?= $s->id ?>"><?= $s->satuan ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                             <div class="col-sm-2">
                                 <a href="<?= base_url('pegawai/satuan_barang') ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i></a>
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

     <div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="edit_dataTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Barang</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form method="POST" action="<?= base_url('pegawai/barang_update') ?>">
                         <div class="form-group row">
                             <input type="hidden" name="id" id="kd_barang">
                             <label for="example-text-input" class="col-sm-3 col-form-label">ID Barang</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="kode" name="kode" placeholder="Nama Satuan" value="<?= $kode ?>" readonly>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Nama Barang</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Satuan">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Jenis Barang</label>
                             <div class="col-sm-6">
                                 <select name="jenis" class="form-control" id="">
                                     <?php foreach ($jenis as $j) : ?>
                                         <option value="<?= $j->id ?>"><?= $j->jenis ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                             <div class="col-sm-2">
                                 <a href="<?= base_url('pegawai/jenis_barang') ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i></a>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-3 col-form-label">Satuan Barang</label>
                             <div class="col-sm-6">
                                 <select name="satuan" class="form-control" id="">
                                     <?php foreach ($satuan as $s) : ?>
                                         <option value="<?= $s->id ?>"><?= $s->satuan ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                             <div class="col-sm-2">
                                 <a href="<?= base_url('pegawai/satuan_barang') ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i></a>
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