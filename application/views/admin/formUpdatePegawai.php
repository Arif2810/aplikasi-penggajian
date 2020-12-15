<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="card" style="width: 60%; margin-bottom:100px;">
    <div class="card-body">

      <?php foreach($pegawai as $p): ?>

      <form action="<?= base_url('admin/dataPegawai/updateDataAksi') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">NIK</label>
          <input type="hidden" name="id_pegawai" value="<?= $p->id_pegawai; ?>">
          <input type="number" name="nik" class="form-control" value="<?= $p->nik; ?>">
          <?= form_error('nik', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        
        <div class="form-group">
          <label for="">Nama Pegawai</label>
          <input type="text" name="nama_pegawai" class="form-control" value="<?= $p->nama_pegawai; ?>">
          <?= form_error('nama_pegawai', '<div class="text-small text-danger">', '</div>') ?>
        </div>

        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" class="form-control" value="<?= $p->username; ?>">
          <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control" value="<?= $p->password; ?>">
          <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
        </div>

        <div class="form-group">
          <label for="">Jenis Kelamin</label>
          <select name="jenis_kelamin" id="" class="form-control">
            <option value="<?= $p->jenis_kelamin; ?>"><?= $p->jenis_kelamin; ?></option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <?= form_error('jenis_kelamin', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        
        <div class="form-group">
          <label for="">Jabatan</label>
          <select name="jabatan" id="" class="form-control">
            <option value="<?= $p->jabatan; ?>"><?= $p->jabatan; ?></option>
            <?php foreach($jabatan as $j): ?>
              <option value="<?= $j->nama_jabatan; ?>"><?= $j->nama_jabatan; ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('jabatan', '<div class="text-small text-danger">', '</div>') ?>
          </div>
          
          <div class="form-group">
            <label for="">Tanggal masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" value="<?= $p->tanggal_masuk; ?>">
            <?= form_error('tanggal_masuk', '<div class="text-small text-danger">', '</div>') ?>
          </div>

          <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="" class="form-control">
              <option value="<?= $p->status; ?>"><?= $p->status; ?></option>
              <option value="Pegawai Tetap">Pegawai Tetap</option>
              <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
            </select>
            <?= form_error('status', '<div class="text-small text-danger">', '</div>') ?>
          </div>

          <div class="form-group">
            <label for="">Photo</label>
            <input type="file" name="photo" class="form-control" value="<?= $p->photo; ?>">
            <?= form_error('photo', '<div class="text-small text-danger">', '</div>') ?>
          </div>

          <div class="form-group">
            <label for="">Hak Akses</label>
            <select name="hak_akses" id="" class="form-control">
              <option value="<?= $p->hak_akses; ?>">
              <?php if($p->hak_akses == '1') echo "Admin";
                else echo "Pegawai";
              ?>
              </option>
              <option value="1">Admin</option>
              <option value="2">Pegawai</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>

      </form>
      <?php endforeach; ?>
    </div>

  </div>


</div>