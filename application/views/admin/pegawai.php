     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Pegawai</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('owner') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Pegawai</li>
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
                     <?php echo $this->session->flashdata('messege'); ?>
                     <a href="<?= base_url('admin/pegawai_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a>

                     <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th scope="col">Nama </th>
                                 <th scope="col">Jenis Kelamin</th>
                                 <th scope="col">Tempat, Tgl Lahir</th>
                                 <th scope="col">Nomor Hp</th>
                                 <th scope="col">Alamat</th>
                                 <th scope="col">Akun</th>
                                 <th scope="col">Role</th>
                                 <th scope="col">Option</th>
                             </tr>
                         </thead>

                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($pegawai as $p) { ?>
                                 <tr>
                                     <!-- <th width="10px" scope="row"><?= $no++ ?></th> -->
                                     <td width="10px"><?= $p->nama ?></td>
                                     <td width="10px"><?php
                                                        if ($p->jenkel == 'L') {
                                                            echo "Laki-Laki";
                                                        } else {
                                                            echo "Perempuan";
                                                        }
                                                        ?></td>
                                     <td width="10px"><?= $p->tmp_lahir . ', ' . date("d-M-Y", strtotime($p->tgl_lahir))  ?></td>
                                     <td width="10px"><?= $p->no_hp ?></td>
                                     <td width="10px"><?= $p->alamat ?></td>

                                     <td class="text-center" width="10px">
                                         <?php if ($p->user == 'null') { ?>
                                             <a href="<?= base_url('admin/regist/' . $p->id_pegawai) ?>" class="badge badge-success"><i class="dripicons-document-edit"></i> Buat</a>
                                         <?php } else {
                                                echo "-";
                                            } ?>
                                     </td>
                                     <td class="text-center" width="10px">
                                         <?php if ($p->user == 'null') { ?>
                                             -
                                         <?php } else {
                                                echo $p->role;
                                            } ?>
                                     </td>
                                     <td width="10px">
                                         <a href="<?= base_url('admin/pegawai_edt/' . $p->id_pegawai) ?>" class="badge badge-warning pull-right"><i class="dripicons-document-edit"></i> Edit</a>
                                         <a href="<?= base_url('admin/pegawai_del/' . $p->id_pegawai) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="badge badge-danger pull-right"><i class="dripicons-trash"></i> Hapus</a>
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