<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">laporan Keuangan</li>
    </ol>
</nav>
<div class="row">
    <form action="<?= base_url('admin/laporan_keuangan_pdf'); ?>" method="POST" class="form-inline">
        <div class="form-group mb-2">
            <label for="dari">Dari </label>
            <input type="datetime-local" class="form-control ml-2" id="dari" name="keyword1">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="sampai">Sampai </label>
            <input type="datetime-local" class="form-control ml-2" id="sampai" name="keyword2">
        </div>
        <button type="submit" class="au-btn btn-danger m-b-20"><i class="far fa-file-pdf"></i> cetak</button>
    </form>

</div>