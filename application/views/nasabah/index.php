<h2 class="text-center">DATA NASABAH</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">laporan Penjualan</li>
    </ol>
</nav>
<div class="row">
    <form action="<?= base_url('nasabah/penjualan/laporan_penjualan_pdf'); ?>" method="POST" class="form-inline">
        <div class="form-group mb-2">
            <label for="dari">Dari </label>
            <input type="datetime-local" class="form-control ml-2" id="dari" name="keyword1">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="sampai">Sampai </label>
            <input type="datetime-local" class="form-control ml-2" id="sampai" name="keyword2">
        </div>
        <button type="submit" class="au-btn btn-danger m-b-20"><i class="far fa-file-pdf"></i> cetak</button>
    </form>

</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
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
                            <td><?= $data->name ?></td>
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
<div class="row m-t-30">
    <div class="col-sm-12">
        <?php $no = 1;
        foreach ($saldoku as $data) : ?>
            <p><b>Total Penjualan Sampah : Rp. <?= number_format($data->total, 0, ',', '.'); ?></b></p>
        <?php endforeach ?>
    </div>
</div>