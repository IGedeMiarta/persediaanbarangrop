     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Data User</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item active">Data User</li>
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
                     <div class="row ">
                         <div class="card col-sm-7 mr-5 bg-secondary">
                             <div class="card-header">
                                 <h3>Profile User</h3>
                             </div>
                             <div class="card-body bg-light mb-2">
                                 <form method="POST" action="<?= base_url('user/pegawai/' . $user['id_pegawai']) ?>">
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= $user['nama'] ?>">
                                             <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                         <div class="col-sm-10">
                                             <select class="form-control" name="jenkel">
                                                 <option value="<?= $user['jenkel'] ?>" selected><?php if ($user['jenkel'] == 'L') {
                                                                                                        echo 'Laki-Laki';
                                                                                                    } else {
                                                                                                        echo 'Perempuan';
                                                                                                    } ?></option>
                                                 <option value="L">Laki-Laki</option>
                                                 <option value="P">Perempuan</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control" id="tgl" name="tmp_lahir" placeholder="Tempat Lahir" value="<?= $user['tmp_lahir'] ?>">
                                             <?= form_error('tmp_lahir', '<small class="text-danger pl-3">', '</small>');  ?>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                         <div class="col-sm-10">
                                             <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Lahir" value="<?= $user['tgl_lahir'] ?>">
                                             <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>');  ?>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Nomer Hp</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor Hp" value="<?= $user['no_hp'] ?>">
                                             <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                                         <div class="col-sm-10">
                                             <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap"><?= $user['alamat'] ?></textarea>
                                             <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');  ?>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-sm-2">

                                         </div>
                                         <div class="col-sm-10">
                                             <button type="submit" class="btn btn-primary mt-3">Update</button>
                                         </div>
                                     </div>
                                 </form>

                             </div>
                         </div>

                         <div class="card col-sm-4 ml-5 bg-secondary">
                             <div class="card-header">
                                 <h3>Edit Akun</h3>
                             </div>
                             <div class="card-body bg-light mb-2">
                                 <form method="POST" action="<?= base_url('user/akun/' . $user['id_user']) ?>">
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-4 col-form-label">Username</label>
                                         <div class="col-sm-8">
                                             <input type="text" class="form-control" id="name" name="username" placeholder="Nama Lengkap" value="<?= $user['username'] ?>">
                                             <?= form_error('username', '<small class="text-danger pl-3">', '</small>');  ?>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-4 col-form-label">Password</label>
                                         <div class="col-sm-8">
                                             <input type="password" class="form-control" id="hp" name="password1" placeholder="Password">
                                             <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-4 col-form-label">Ulangi Password</label>
                                         <div class="col-sm-8">
                                             <input type="password" class="form-control" id="hp" name="password2" placeholder="Retype Password" value="<?= set_value('hp'); ?>">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-4 col-form-label">Role</label>
                                         <div class="col-sm-8">
                                             <input type="text" class="form-control" id="name" name="role" placeholder="Nama Lengkap" value="<?= $this->session->userdata('side'); ?>" readonly>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-sm-4">

                                         </div>
                                         <div class="col-sm-8">
                                             <button type="submit" class="btn btn-primary mt-3">Update</button>
                                         </div>
                                     </div>
                                 </form>

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