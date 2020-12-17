<h1 class="text-center">PENJUALAN SAMPAH</h1>

<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <form action="<?= base_url('admin/update_penjualan_sampah/' . $penjualan["id_penjualan"]); ?>" method="POST">

                    <input type="hidden" name="id_penjualan" value="<?= $penjualan["id_penjualan"]; ?>">

                    <div class="form-group">
                        <label for="time_create_penjualan">Tanggal</label>
                        <input type="datetime-local" class="form-control" id="time_create_penjualan" name="time_create_penjualan" required>
                        <?= form_error('time_create_penjualan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="id_users">Nama</label>
                        <select class="form-control" id="id_users" multiple name="id_users" required>
                            <?php foreach ($user as $u) : ?>
                                <option value="<?= $u["id_users"] ?>"><?= $u["name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id_users', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="id_katalog">Jenis Sampah</label>
                        <select class="form-control" id="id_katalog" name="id_katalog" required>
                            <?php foreach ($katalog as $k) : ?>
                                <option value="<?= $k["id_katalog"] ?>"><?= $k["nama_katalog"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id_katalog', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="berat_penjualan">Berat</label>
                        <input type="text" class="form-control" id="berat_penjualan" name="berat_penjualan" onchange="total()" value="<?= $penjualan["berat_penjualan"] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="harga_penjualan">Harga</label>
                        <input type="text" class="form-control" id="harga_katalog" name="harga_penjualan" onchange="total()" value="<?= $penjualan["harga_penjualan"] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="total_penjualan">Total</label>
                        <input type="text" class="form-control" id="total_penjualan" name="total_penjualan" value="<?= $penjualan["total_penjualan"] ?>" required>
                    </div>


                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<datalist id="data_santri">
    <?php
    foreach ($record->result() as $b) {
        echo "<option value='$b->id_katalog'> $b->nama_katalog </option>";
    }
    ?>
</datalist>