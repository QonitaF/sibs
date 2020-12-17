<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">laporan Observasi</li>
    </ol>
</nav>

<div class="row">
    <div class="col-xl-7">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">

                <form action="<?= base_url('admin/laporan_observasi_pdf/'); ?>" method="POST">
                    <div class="form-group">
                        <label for="dari">Dari</label>
                        <input type="datetime-local" class="form-control" id="dari" name="dari">
                    </div>
                    <div class="form-group">
                        <label for="sampai">Sampai</label>
                        <input type="datetime-local" class="form-control" id="sampai" name="sampai">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i> Submit
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>