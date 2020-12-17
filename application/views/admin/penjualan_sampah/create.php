<h1 class="text-center">PENJUALAN SAMPAH</h1>

<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <form autocomplete="off" action="<?= base_url('admin/create_penjualan_sampah'); ?>" method="POST">
                    <div class="form-group">
                        <label for="id_users">Nama</label>
                        <select class="form-control" id="id_users" multiple name="id_users" required>
                            <?php foreach ($nasabah as $u) : ?>
                                <option value="<?= $u->id_users; ?>"><?= $u->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_katalog">Sampah</label>
                        <select class="form-control" id="id_katalog" multiple name="id_katalog" onchange="return autofill();" required>
                            <?php foreach ($sampah as $u) : ?>
                                <option value="<?= $u->id_katalog; ?>"><?= $u->nama_katalog ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <input readonly hidden class="form-control form-control-user" type="text" id="nama_katalog">
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