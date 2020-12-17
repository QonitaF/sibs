<h1 class="text-center">Edit About</h1>

<div class="row mt-4 justify-content-center">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('admin/edit_about/' . $about["id_about"]); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_about">Nama</label>
                        <input type="text" class="form-control" id="name" name="nama_about" required value="<?= $about["nama_about"]; ?>">
                    </div>

                    <div class="form-group">
                        <label for="keterangin">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"><?= $about["keterangan"]; ?></textarea>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-dark float-right">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>