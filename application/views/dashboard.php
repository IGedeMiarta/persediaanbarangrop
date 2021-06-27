<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Dashboard</h4>
                        </div>

                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div>
        <!-- end page title -->
        <div class="jumbotron text-center">
            <div class="col-sm-8 mx-auto">
                <h1>Selamat datang!</h1>
                <p><?= $teks ?></p>


            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Pegawai</h6>
                            <h4 class="mb-3 mt-0 float-right"><?= $pegawai['jml'] ?></h4>
                        </div>
                        <div class="icon">
                            <!-- <i class="mdi mdi-cube-outline"></i> -->
                        </div>

                    </div>
                    <div class="p-3">
                        <div class="float-right">
                            <a href="#" class="text-white-50"><i class="dripicons-user-group h5"></i></a>
                        </div>
                        <!-- <p class="font-14 m-0">Last : 1447</p> -->
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-info mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Supplier</h6>
                            <h4 class="mb-3 mt-0 float-right"><?= $supplier['jml'] ?></h4>
                        </div>
                        <div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="float-right">
                            <a href="#" class="text-white-50"><i class="dripicons-store h5"></i></a>
                        </div>
                        <!-- <p class="font-14 m-0">Last : $47,596</p> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-pink mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Produk</h6>
                            <h4 class="mb-3 mt-0 float-right"><?= $produk['jml'] ?></h4>
                        </div>

                    </div>
                    <div class="p-3">
                        <div class="float-right">
                            <a href="#" class="text-white-50"><i class="dripicons-basket h5"></i></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Penjualan</h6>
                            <h4 class="mb-3 mt-0 float-right"><?= $terjual['jml'] ?></h4>
                        </div>

                    </div>
                    <div class="p-3">
                        <div class="float-right">
                            <a href="#" class="text-white-50"><i class="dripicons-article h5"></i></a>
                        </div>
                        <p class="font-14 m-0">Rp. <?= $jual['sell'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->