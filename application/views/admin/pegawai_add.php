     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Tambah Pegawai</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                             <li class="breadcrumb-item"><a href="<?= base_url('admin/pegawai') ?>">Pegawai</a></li>
                             <li class="breadcrumb-item active">Tambah Pegawai</li>
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
                     <form method="POST" action="<?= base_url('admin/pegawai_add_act') ?>">
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>" required>
                                 <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="jenkel">
                                     <option selected>-- Pilih</option>
                                     <option value="L">Laki-Laki</option>
                                     <option value="P">Perempuan</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Tempat Lahir</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="tgl" name="tmp_lahir" placeholder="Tempat Lahir" value="<?= set_value('tmp_lahir'); ?>" required>
                                 <?= form_error('tmp_lahir', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                             <div class="col-sm-10">
                                 <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Lahir" value="<?= set_value('tgl'); ?>">
                                 <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nomer Hp</label>
                             <div class="col-sm-10">
                                 <input type="number" class="form-control" id="hp" name="hp" placeholder="Nomor Hp" value="<?= set_value('hp'); ?>">
                                 <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                             <div class="col-sm-10">
                                 <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="<?= set_value('alamat'); ?>" required></textarea>
                                 <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <!-- <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Job Desk</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="desk">
                                     <option selected>-- Pilih</option>
                                     <option value="2">Bagian Kasir</option>
                                     <option value="3">Bagian Gudang</option>
                                 </select>
                             </div>
                         </div> -->
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