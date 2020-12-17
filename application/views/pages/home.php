<h3 class="text-center">Selamat Datang</h3>
<?php foreach ($abouts as $about) : ?>
    <h3 class="text-center mt-3"><?= $about["nama_about"] ?></h3>

    <div class="card mt-5">
        <div class="card-body" style="margin-bottom: 450px;">
            <?= $about["keterangan"]; ?>
        </div>
    </div>
<?php endforeach; ?>