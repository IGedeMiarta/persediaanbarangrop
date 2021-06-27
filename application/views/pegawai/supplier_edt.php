     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Edit Supplier</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Home</a></li>
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai/supplier') ?>">Supplier</a></li>
                             <li class="breadcrumb-item active">Edit Supplier</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">

             <!-- Default box -->

             <div class="card">
                 <div class="card-body">

                     <form method="POST" action="">
                         <div class="form-group">
                             <label>Nama Supplier</label>
                             <input type="text" class="form-control" id="sup_name" name="sup_name" placeholder="Nama Supplier" value="<?= $supplier['nama_supp'] ?>">
                             <?= form_error('sup_name', '<small class="text-danger pl-3">', '</small>');  ?>
                         </div>
                         <div class="form-group">
                             <label>Pemilik Usaha</label>
                             <input type="text" class="form-control" id="owner" name="owner" placeholder="Nama Pemilik" value="<?= $supplier['owner'] ?>">
                             <?= form_error('owner', '<small class="text-danger pl-3">', '</small>');  ?>
                         </div>
                         <div class="form-group">
                             <label>Nomer Hp</label>
                             <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan No Hp" value="<?= $supplier['no_hp'] ?>">
                             <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                         </div>
                         <div class="form-group">
                             <label>Alamat</label>
                             <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $supplier['alamat'] ?>">
                             <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');  ?>
                         </div>
                         <button type="submit" class="btn btn-primary">Ubah</button>
                     </form>

                 </div>

             </div>
             <!-- /.card -->

         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->