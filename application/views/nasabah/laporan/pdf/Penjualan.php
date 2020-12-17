<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head><body>
    <h1 style="text-align: center;"><?= $logo; ?> SISTEM INFORMASI BANK SAMPAH</h1>
    <h4 style="background-color: #d63031; color: white; padding: 1px; width: 190px; border: 1px solid #d63031; margin-left: 420px; text-align: center;">LAPORAN PENJUALAN</h4>
    <p style="text-align: center;"><span>Antara Tanggal </span></span>: <?= $awal; ?> - <?= $akhir; ?></p>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
    <div class="row m-t-30">
    <div class="col-sm-12">
        <?php $no = 1;
        foreach ($saldoku as $data) : ?>
            <p><b>Total Penjualan Sampah :</b> Rp. <?= number_format($data->total, 0, ',', '.'); ?></p>
        <?php endforeach ?>
    </div>
</div>
</body></html>