     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Data Satuan Barang</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Data Satuan Barang</li>
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
                     <div class="card-header badge badge-primary" id="headingOne">
                         <h5 class="text-dark">Tambah Satuan Barang</h5>
                         <h2 class="mt-n5 mb-n1">
                             <button class="btn btn-link btn-block text-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <a href="#" class="btn btn-secondary mt-2"><i class="far fa-eye"></i></a>
                             </button>
                         </h2>
                     </div>
                     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                         <div class="card-body">
                             <form method="POST" action="">
                                 <div class="form-group row">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">Nama Satuan</label>
                                     <div class="col-sm-10">
                                         <input type="text" class="form-control" id="name" name="name" placeholder="Nama Satuan" value="<?= set_value('name'); ?>">
                                         <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-sm-2">
                                     </div>
                                     <div class="col-sm-10">
                                         <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                     </div>
                                 </div>

                             </form>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="card">
                 <div class="card-header badge badge-dark">
                     <h5 class="text-dark">Satuan Barang</h5>
                 </div>
                 <div class="card-body">
                     <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th scope="col">No</th>
                                 <th scope="col">Nama Satuan</th>
                                 <th scope="col">Opsi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($satuan as $b) { ?>
                                 <tr>
                                     <th width="10px" scope="row"><?= $no++ ?></th>
                                     <td><?= $b->satuan ?></td>
                                     <td>
                                         <a href="" data-satuan="<?= $b->id ?>" class="badge badge-warning edit-satuan" data-toggle="modal" data-target="#edit_jenis"><i class="dripicons-document-edit"></i> Edit</a>
                                         <a href="<?= base_url('pegawai/satuan_del/' . $b->id) ?>" class="badge badge-danger" onclick="return confirm('Yakin Hapus?')"><i class="dripicons-trash"></i> Hapus</a>
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
     <!-- /.content-wrapper -->
     <div class="modal fade" id="edit_jenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Edit Satuan</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form method="POST" action="<?= base_url('pegawai/satuan_update/') ?>">
                         <div class="form-group row">
                             <input type="hidden" name="id" id="id">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Satuan</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Nama Satuan" value="<?= set_value('name'); ?>">

                             </div>
                         </div>
                 </div>
                 <div class="modal-footer">
                     <button type="reset" class="btn btn-secondary">reset</button>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>