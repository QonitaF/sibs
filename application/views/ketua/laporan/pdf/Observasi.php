<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head><body>
    <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
th {
  text-align: left;
}
</style>
</head><body>

    <h1 style="text-align: center;"><?= $logo; ?> SISTEM INFORMASI PERAWATAN BENDA MUSEUM</h1>
    <h4 style="background-color: #6c5ce7; color: white; padding: 1px; width: 190px; border: 1px solid #6c5ce7; margin-left: 420px; text-align: center;">LAPORAN OBSERVASI</h4>
    <p style="text-align: center;"><span>Range Date </span></span>: <?= $awal; ?> - <?= $akhir; ?></p>
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Koleksi</th>
                <th>Nama ruang koleksi</th>
                <th>Bahan</th>
                <th>Keadaan koleksi</th>
                <th>No. vitrin</th>
                <th>Tanggal observasi</th>
                <th>Rekomendasi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;

            foreach ($observasi as $data) : ?>
                <tr>
                    <td><?= $no++  ?></td>
                    <td><?= $data->nama_koleksi; ?></td>
                    <td><?= $data->nama_ruang_koleksi; ?></td>
                    <td><?= $data->bahan_observasi_koleksi; ?></td>
                    <td><?= $data->keadaan_observasi_koleksi; ?></td>
                    <td><?= $data->no_vitrin_observasi_koleksi; ?></td>
                    <td><?= $data->time_observasi; ?></td>
                    <td><?= $data->rekomendasi_observasi_koleksi; ?></td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body></html>