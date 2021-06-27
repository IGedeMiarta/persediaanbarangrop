     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Supplier</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Supplier</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
             <?php echo $this->session->flashdata('messege'); ?>

             <!-- Default box -->
             <div class="card">
                 <div class="card-body">
                     <a href="<?= base_url('pegawai/supplier_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a>

                     <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th scope="col">No</th>
                                 <th scope="col">Nama Supplier</th>
                                 <th scope="col">Pemilik</th>
                                 <th scope="col">No Hp</th>
                                 <th scope="col">Alamat</th>
                                 <th scope="col">Otion</th>
                             </tr>
                         </thead>

                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($supplier as $sup) { ?>
                                 <tr>
                                     <th width="10px" scope="row"><?= $no++ ?></th>
                                     <td><?= $sup->nama_supp ?></td>
                                     <td><?= $sup->owner ?></td>
                                     <td><?= $sup->no_hp ?></td>
                                     <td><?= $sup->alamat ?></td>
                                     <td>
                                         <a href="<?= base_url('pegawai/supplier_edt/' . $sup->kd_supp) ?>" class="badge badge-warning"><i class="dripicons-document-edit"></i> Edit</a>
                                         <a href="<?= base_url('pegawai/supplier_del/' . $sup->kd_supp) ?>" class="badge badge-danger" onclick="return confirm('Yakin Hapus?')"><i class="dripicons-trash"></i> Hapus</a>
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