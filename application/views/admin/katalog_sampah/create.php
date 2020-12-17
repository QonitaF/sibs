<h1 class="text-center">KATALOG SAMPAH</h1>

<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <form action="<?= base_url('admin/create_katalog_sampah'); ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama_katalog">Nama</label>
                        <input type="text" class="form-control" id="nama_katalog" name="nama_katalog">
                        <?= form_error('nama_katalog', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="id_jenis_katalog_sampah">Jenis Sampah</label>
                        <select class="form-control" id="id_jenis_katalog_sampah" name="id_jenis_katalog_sampah">
                            <?php foreach ($jenis_sampah as $sampah) : ?>
                                <option value="<?= $sampah["id_jenis_sampah"] ?>"><?= $sampah["nama_jenis_sampah"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="satuan_katalog">Satuan</label>
                        <input type="text" class="form-control" id="satuan_katalog" name="satuan_katalog">
                        <?= form_error('satuan_katalog', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga_katalog">Harga</label>
                        <input type="text" class="form-control" id="harga_katalog" name="harga_katalog">
                        <?= form_error('harga_katalog', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="gambar_katalog">Gambar</label>
                        <div class="custom-file">
                            <!-- <input type="file" class="custom-file-input" id="gambar_katalog" name="gambar_katalog">
                            <label class="custom-file-label" for="gambar_katalog">Choose file</label> -->
                            <!-- <label for="exampleFormControlFile1">Gambar</label> -->
                            <input type="file" id="gambar_katalog" name="gambar_katalog" class="form-control-file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_katalog">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan_katalog" name="keterangan_katalog">
                        <?= form_error('keterangan_katalog', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-dark">Simpan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>