<h2 class="text-center">PENJUALAN SAMPAH</h2>

<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Jenis Sampah</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($penjualan as $penjual) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $penjual["time_create_penjualan"]; ?></td>
                            <td><?= $penjual["name"]; ?></td>
                            <td><?= $penjual["nama_katalog"]; ?></td>
                            <td><?= $penjual["berat_penjualan"]; ?></td>
                            <td>Rp. <?= number_format($penjual["harga_penjualan"], 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($penjual["total_penjualan"], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>