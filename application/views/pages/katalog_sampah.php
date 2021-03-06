<div class="row m-t-30">
    <div class="col-md-12">
        <h2 class="text-center">KATALOG SAMPAH</h2>
        <!-- Search form -->
        <form action="<?= base_url('katalog_sampah/search') ?>" method="POST" class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" name="keyword" type="text" placeholder="Search" aria-label="Search">
        </form>
        <div class="row m-t-30">
            <div class="col-md">
                <div class="card-deck">
                    <?php foreach ($katalog as $kat) : ?>

                        <div class="col-md-4">
                            <img style="height: 150px;" alt="gambar sampah" src="<?= base_url('./assets/images/katalog/' . $kat['gambar_katalog']); ?>" class="img-thumbnail" height="10" alt="Katalog">
                            <div class="card-body">
                                <h5 class="card-title"><?= $kat['nama_katalog']; ?></h5>
                                <p class="card-text"><?= $kat['keterangan_katalog'] ?></p>
                                <p class="card-text"><?= $kat['nama_jenis_sampah'] ?></p>
                                <p class="card-text">Per <?= $kat['satuan_katalog'] ?> <b><?= $kat['harga_katalog']; ?></b></p>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <!-- DATA TABLE-->
        <!-- END DATA TABLE-->
    </div>
</div>