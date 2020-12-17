<h1 class="text-center">PENJUALAN SAMPAH</h1>

<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <form autocomplete="off" action="<?= base_url('admin/create_penjualan_sampah'); ?>" method="POST">

                    <div class="form-group">
                        <label for="time_create_penjualan">Tanggal</label>
                        <input type="datetime-local" class="form-control" id="time_create_penjualan" name="time_create_penjualan" required>
                        <?= form_error('time_create_penjualan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="id_users">Nama</label>
                        <select class="form-control" id="id_users" multiple name="id_users" required>
                            <?php foreach ($nasabah as $u) : ?>
                                <option value="<?= $u->id_users; ?>"><?= $u->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id_users', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- <div class="form-group">
                        <label for="id_katalog">Jenis Sampah</label>
                        <select class="form-control" id="id_katalog" name="id_katalog" required>
                            <?php foreach ($katalog as $k) : ?>
                                <option value="<?= $k["id_katalog"] ?>"><?= $k["nama_katalog"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id_katalog', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div> -->

                    <div class="form-group">
                        <label for="id_katalog">Jenis Sampah</label>
                        <input list="data_santri" type="text" name="id_katalog" id="id_katalog" class="form-control form-control-user" placeholder="id katalog atau nama katalog" onchange="return autofill();">
                    </div>
                    <div class="form-group">
                        <input readonly class="form-control form-control-user" type="text" id="nama_katalog">
                    </div>

                    <div class="form-group">
                        <label for="berat_penjualan">Berat</label>
                        <input type="text" class="form-control" id="berat_penjualan" name="berat_penjualan" onchange="total()" required>
                    </div>

                    <div class="form-group">
                        <label for="harga_penjualan">Harga</label>
                        <input type="text" class="form-control" id="harga_katalog" name="harga_penjualan" onchange="total()" required>
                    </div>

                    <div class="form-group">
                        <label for="total_penjualan">Total</label>
                        <input type="text" class="form-control" id="total_penjualan" name="total_penjualan" required>
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-dark">Simpan</button>
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