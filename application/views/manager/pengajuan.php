     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Pengajuan Barang</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Pengajuan Barang</li>
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
                 <div class="card-header">
                     <h5 class="text-center">Status Pengajuan</h5>
                 </div>
                 <div class="card-body">
                     <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th scope="col">No</th>
                                 <th scope="col">Tanggal Diajuakn</th>
                                 <th scope="col">ID Barang</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Harga Satuan</th>
                                 <th scope="col">Jumlah</th>
                                 <th scope="col">Supplier</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Opsi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($status as $b) { ?>
                                 <tr>
                                     <th width="10px"><?= $no++ ?></th>
                                     <td><?= date("d M Y", strtotime($b->tgl_diajukan)) ?></td>
                                     <td><?= $b->kode ?></td>
                                     <td><?= $b->nama_barang ?></td>
                                     <td><?= "Rp " . number_format($b->harga, 0, ",", "."); ?></td>
                                     <td><?= $b->jumlah . ' ' . $b->satuan ?></td>
                                     <td><?= $b->nama_supp ?></td>
                                     <td><?= $b->status ?></td>
                                     <td>
                                         <?php if ($b->status == 'Pending') : ?>
                                             <div class="dropdown">
                                                 <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                     Aksi
                                                 </button>
                                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                     <a class="dropdown-item" href="<?= base_url('manager/pengajuan_act/') . $b->kd_pengajuan . '/Diterima' ?>" onclick="return confirm('Yakin Pengajuan Disetuji?')"> <i class="far fa-check-square"></i> Diterima</a>
                                                     <a class="dropdown-item" href="<?= base_url('manager/pengajuan_act/') . $b->kd_pengajuan . '/Ditolak' ?>" onclick="return confirm('Yakin Pengajuan Ditolak?')"> <i class="far fa-times-circle"></i> Ditolak</a>
                                                 </div>
                                             </div>
                                         <?php else : ?>
                                             -
                                         <?php endif ?>
                                     </td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </section>
         <!-- /.content -->
     </div>