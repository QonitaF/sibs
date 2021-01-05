<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">laporan Keuangan</li>
    </ol>
</nav>
<div style="text-align: center;" class="row">
    <form action="<?= base_url('ketua/laporan_by/laporan_keuangan_by'); ?>" method="POST" class="form-inline">
        <div class="form-group mb-2">
            <label for="exampleFormControlSelect1">Bulan</label>
            <select name="bulan" class="form-control" id="exampleFormControlSelect1">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>

        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="exampleFormControlSelect1">Tahun</label>
            <select name="tahun" class="form-control" id="exampleFormControlSelect1">
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
            </select>
        </div>
        <button type="submit" class="au-btn btn-danger m-b-20"><i class="far fa-file-pdf"></i> Show</button>
    </form>

</div>

<div class="row">

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
            <?php $no = 1;
            foreach ($nasabah as $data) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->time_create_penjualan ?></td>
                    <td><?= $data->name ?></td>
                    <td><?= $data->nama_katalog ?></td>
                    <td><?= $data->berat ?></td>
                    <td>Rp. <?= number_format($data->harga_penjualan, 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($data->total, 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>