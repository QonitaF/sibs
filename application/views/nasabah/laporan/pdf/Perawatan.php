<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
    <h4 style="background-color: #6c5ce7; color: white; padding: 1px; width: 190px; border: 1px solid #6c5ce7; margin-left: 420px; text-align: center;">LAPORAN PERAWATAN</h4>
    <p style="text-align: center;"><span>Range Date </span></span>: <?= $awal; ?> - <?= $akhir; ?></p>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama petugas</th>
                <th>Nama koleksi</th>
                <th>Keadaan koleksi</th>
                <th>No. vitrin</th>
                <th>Tanggal perawatan</th>
                <th>Kegiatan</th>
                <th>Bahan yang digunakan</th>
                <th>Tambahan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($perawatan as $per) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $per->name ?></td>
                    <td><?= $per->nama_koleksi; ?></td>
                    <td><?= $per->keadaan_koleksi_perawatan; ?></td>
                    <td><?= $per->no_vitrin_koleksi_perawatan; ?></td>
                    <td><?= $per->time_perawatan; ?></td>
                    <td><?= $per->kegiatan_perawatan; ?></td>
                    <td><?= $per->bahan_perawatan; ?></td>
                    <td><?= $per->tambahan_perawatan; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body></html>