</div>
</div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>
</div>

<!-- Jquery JS-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= base_url('assets'); ?>/vendor/slick/slick.min.js">
</script>
<script src="<?= base_url('assets'); ?>/vendor/wow/wow.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/animsition/animsition.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?= base_url('assets'); ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?= base_url('assets'); ?>/vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/select2/select2.min.js"></script>

<!-- Main JS-->
<script src="<?= base_url('assets'); ?>/js/main.js"></script>

<!-- datatable -->
<script src="<?= base_url('assets') ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/js/dataTables.bootstrap4.min.js"></script>

<script>
    $('#id_users').select2();
</script>

<script>
    function autofill() {
        var id_katalog = document.getElementById('id_katalog').value;
        $.ajax({
            url: "<?php echo base_url('/'); ?>admin/cari",
            data: '&id_katalog=' + id_katalog,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('id_katalog').value = val.id_katalog;
                    document.getElementById('nama_katalog').value = val.nama_katalog;
                    document.getElementById('harga_katalog').value = val.harga_katalog;
                });
            }
        });
    }

    function total() {
        var as = parseInt(document.getElementById('berat_penjualan').value);
        var ad = parseInt(document.getElementById('harga_katalog').value);
        var jumlah_harga = as * ad;
        document.getElementById('total_penjualan').value = jumlah_harga;
    }

    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

</body>

</html>
<!-- end document-->