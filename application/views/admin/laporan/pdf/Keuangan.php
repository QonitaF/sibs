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
    <h4 style="background-color: #d63031; color: white; padding: 1px; width: 370px; border: 1px solid #d63031; margin-left: 330px; text-align: center;">LAPORAN DATA KEUANGAN PENJUALAN</h4>
    <p style="text-align: center;"><span>Antara Tanggal </span></span>: <?= $awal; ?> - <?= $akhir; ?></p>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Berat</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($nasabah as $data) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->time_create_penjualan ?></td>
                    <td><?= $data->nama_katalog ?></td>
                    <td><?= $data->berat ?></td>
                    <td>Rp. <?= number_format($data->total, 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="3"><b>Total</b></td>
                <td><?php foreach ($totalpenjualan as $data) : ?>
                <p><b> <?= $data->berat ?></b></p>
                 <?php endforeach ?></td>
                <td><?php foreach ($totalpenjualan as $data) : ?>
            <p><b>Rp. <?= number_format($data->total, 0, ',', '.'); ?></b></p>
        <?php endforeach ?></td>
            </tr>
        </tbody>
    </table>
</body></html>