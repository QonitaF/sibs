<div class="row m-t-30">
    <div class="col-md-12">
        <h2 class="text-center">KATALOG SAMPAH</h2>
        <!-- Search form -->
        <form action="<?= base_url('katalog_sampah/search') ?>" method="POST" class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" name="keyword" type="text" placeholder="Search" aria-label="Search">
        </form>
        <div class="row m-t-30">
            <div class="card-deck">
                <?php foreach ($katalogs as $kat) : ?>
                    <div class="card">
                        <img style="height: 150px;" src="<?= base_url('./assets/images/katalog/' . $kat->gambar_katalog); ?>" class="img-thumbnail" height="10" alt="Katalog">
                        <div class="card-body">
                            <h5 class="card-title"><?= $kat->nama_katalog; ?></h5>
                            <p class="card-text"><?= $kat->keterangan_katalog ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= $kat->nama_jenis_sampah; ?></li>
                            <li class="list-group-item">Harga Per <?= $kat->satuan_katalog; ?> <?= $kat->harga_katalog; ?></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- DATA TABLE-->
        <!-- END DATA TABLE-->
    </div>
</div>