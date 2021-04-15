<h2 class="text-center">DATA NASABAH</h2>
<div style="text-align: center;" class="row m-t-30">
    <div class="col-sm-12">
        <?php $no = 1;
        foreach ($saldoku as $data) : ?>
            <p><b>Total Saldo : Rp <?= number_format($data->total, 0, ',', '.'); ?></b></p>
        <?php endforeach ?>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tangal</th>
                        <th>Katalog</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($penjualanku as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->time_create_penjualan ?></td>
                            <td><?= $data->nama_katalog ?></td>
                            <td>Rp. <?= number_format($data->harga_penjualan, 0, ',', '.'); ?></td>
                            <td><?= $data->berat_penjualan ?></td>
                            <td>Rp. <?= number_format($data->total_penjualan, 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>