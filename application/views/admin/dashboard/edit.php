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
                        <textarea class="form-control" id="summernote" name="keterangan"><?= $about["keterangan"]; ?></textarea>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-dark float-right">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>