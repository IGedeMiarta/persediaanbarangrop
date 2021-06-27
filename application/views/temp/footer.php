<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        Gamalama Indah Hotel <i class="fas fa-star"></i>
    </div>
    <strong>Copyright &copy; 2020 </strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('vendor/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('vendor/AdminLTE/') ?>dist/js/demo.js"></script>
<script>
    var dateToday = new Date();
    $(document).ready(function() {
        $('.datepicker').datepicker({
            startDate: '0',
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,

        });
    });
</script>


<script>
    $(function() {
        $("#example1, #datatable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script type="text/javascript">
    function autofill() {
        var barang = $("#barang").val();
        $.ajax({
            url: "<?= base_url('gudang/cari') ?>",
            data: 'barang=' + barang,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('stok').value = val.stok;
                    document.getElementById('detail').value = val.detail;
                });
            }
        });
    }
</script>

<script type="text/javascript">
    function masuk() {
        var barang = $("#barang").val();
        $.ajax({
            url: "<?= base_url('ajax/cari') ?>",
            data: 'barang=' + barang,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('stok').value = val.stok;
                    document.getElementById('satuan').value = val.satuan;
                });
            }
        });
    }
</script>

<script>
    $('.edit-satuan').click(function() {
        const satuan = $(this).data('satuan');

        $.ajax({
            type: 'POST',
            data: {
                satuan: satuan
            },
            dataType: 'JSON',
            async: true,
            url: "<?= base_url('ajax/edit_satuan') ?>",
            success: function(data) {
                $.each(data, function(id, jenis) {
                    $("#id").val(data.id);
                    $("#satuan").val(data.satuan);
                });
            }
        });
    });
    $('.edit-jenis').click(function() {
        const jenis = $(this).data('jenis');

        $.ajax({
            type: 'POST',
            data: {
                jenis: jenis
            },
            dataType: 'JSON',
            async: true,
            url: "<?= base_url('ajax/edit_jenis') ?>",
            success: function(data) {
                $.each(data, function(id, jenis) {
                    $("#id").val(data.id);
                    $("#jenis").val(data.jenis);
                });
            }
        });
    });
    $('.edit-barang').click(function() {
        const barang = $(this).data('barang');

        $.ajax({
            type: 'POST',
            data: {
                barang: barang
            },
            dataType: 'JSON',
            async: true,
            url: "<?= base_url('ajax/edit_barang') ?>",
            success: function(data) {
                $.each(data, function(id, kode, nama_barang) {
                    $("#kd_barang").val(data.kd_barang);
                    $("#kode").val(data.kode);
                    $("#nama_barang").val(data.nama_barang);
                });
            }
        });
    });

    $('.barang-masuk').click(function() {
        const pengajuan = $(this).data('pengajuan');

        $.ajax({
            type: 'POST',
            data: {
                pengajuan: pengajuan
            },
            dataType: 'JSON',
            async: true,
            url: "<?= base_url('ajax/pengajuan_barang') ?>",
            success: function(data) {
                $.each(data, function(id, kode, nama_barang) {
                    $("#kd_pengajuan").val(data.kd_pengajuan);
                    $("#tgl_diajukan").val(data.tgl_diajukan);
                    $("#kd_barang").val(data.kd_barang);
                    $("#barang").val(data.nama_barang);
                    $("#kd_supp").val(data.kd_supp);
                    $("#supplier").val(data.nama_supp);
                    $("#jml").val(data.jumlah);
                    $("#harga").val(data.harga);
                });
            }
        });
    });

    $('.edit-masuk').click(function() {
        const kd_masuk = $(this).data('masuk');
        // $kd_masuk = kd_masuk;
        $.ajax({
            type: 'POST',
            data: {
                kd_masuk: kd_masuk
            },
            dataType: 'JSON',
            async: true,
            url: "<?= base_url('ajax/edit_masuk') ?>",
            success: function(data) {
                $.each(data, function(kd_masuk, kode, kd_barang, nama_barang, supplier, jumlah, harga, waktu, stok, jumlah) {
                    $("#kd_barang1").val(data.kd_barang);
                    $("#kode1").val(data.kode);
                    $("#nama_barang").val(data.nama_barang);
                    $("#tgl1").val(data.waktu);
                    $("#stok1").val(data.stok);
                    $("#harga1").val(data.harga);
                    $("#jml1").val(data.jumlah);
                });
            }
        });
    });
</script>

</body>

</html>