<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="card" style="width: 60%;">
    <div class="card-body">
      <?php foreach($pot_gaji as $p): ?>
        <form action="<?= base_url('admin/potonganGaji/updateDataAksi'); ?>" method="post">

          <div class="form-group">
            <label for="">Jenis Potongan</label>
            <input type="hidden" name="id" value="<?= $p->id; ?>">
            <input type="text" name="potongan" class="form-control" value="<?= $p->potongan; ?>">
            <?= form_error('potongan', '<div class="text-small text-danger">', '</div>') ?>
          </div>
          
          <div class="form-group">
            <label for="">Jumlah Potongan</label>
            <input type="number" name="jml_potongan" class="form-control" value="<?= $p->jml_potongan; ?>">
            <?= form_error('jml_potongan', '<div class="text-small text-danger">', '</div>') ?>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>

        </form>
      <?php endforeach; ?>
    </div>
  </div>

</div>