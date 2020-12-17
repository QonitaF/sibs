<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title></head>
<body>

    <h1 style="text-align: center;">Penjualan Sampah</h1>

    <p>Tanggal Cetak : <?= date('d/m/Y') ?></p>

    <table border="1" style="width:100%">
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
                <td><?= $penjual["harga_penjualan"]; ?></td>
                <td><?= $penjual["total_penjualan"]; ?></td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
    
</body></html>