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
    <h4 style="background-color: #d63031; color: white; padding: 1px; width: 250px; border: 1px solid #d63031; margin-left: 420px; text-align: center;">LAPORAN DATA NASABAH</h4>
    <p style="text-align: center;"><span>Antara Tanggal </span></span>: <?= $awal; ?> - <?= $akhir; ?></p>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>RT</th>
                <th>Alamat</th>
                <th>No Hp / WA</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($nasabah as $data) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->name ?></td>
                    <td><?= $data->rt_users ?></td>
                    <td><?= $data->alamat_users ?></td>
                    <td><?= $data->telepon_users ?></td>
                    <td>Rp. <?= number_format($data->total, 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body></html>