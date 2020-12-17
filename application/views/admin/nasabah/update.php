<h1 class="text-center">Data Nasabah</h1>

<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('Admin/UpdateNasabah') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" value="<?= $nasabah["name"] ?>" name="name" class="form-control" id="name">
                        <input type="text" hidden value="<?= $nasabah["id_users"] ?>" name="id_users" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <input name="email" value="<?= $nasabah["email"] ?>" type="email" id="inputEmail" class="form-control" placeholder="alamatemail@gmail.com" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" name="rt_users" value="<?= $nasabah["rt_users"] ?>" class="form-control" id="rt">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat_users" value="<?= $nasabah["alamat_users"] ?>" class="form-control" id="alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp / WA</label>
                        <input type="text" name="telepon_users" value="<?= $nasabah["telepon_users"] ?>" class="form-control" id="no_hp">
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>