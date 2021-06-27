     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Registrasi Akun </h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('owner') ?>">Home</a></li>
                             <li class="breadcrumb-item"><a href="<?= base_url('owner/pegawai') ?>">Pegawai</a></li>
                             <li class="breadcrumb-item active">Registrasi Akun</li>
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

                     <form method="POST" action="<?= base_url('admin/regist_act/' . $pegawai['id_pegawai']) ?>">
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pegawai" value="<?= $pegawai['nama'] ?>" readonly>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="tgl" name="username" placeholder="Username">
                                 <?= form_error('username', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                             <div class="col-sm-10">
                                 <input type="password" class="form-control" id="hp" name="password1" placeholder="Password">
                                 <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Ulangi Password</label>
                             <div class="col-sm-10">
                                 <input type="password" class="form-control" id="hp" name="password2" placeholder="Retype Password">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Role</label>
                             <div class="col-sm-10">
                                 <select name="role" id="" class="form-control">

                                     <option value="Pegawai">Pegawai</option>
                                     <option value="Manager">Manager</option>
                                 </select>
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
             <!-- /.card -->

         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->