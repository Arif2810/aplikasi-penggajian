<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="card" style="width: 60%; margin-bottom:100px;">
    <div class="card-body">

      <form action="<?= base_url('admin/dataPegawai/tambahDataAksi') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">NIK</label>
          <input type="number" name="nik" class="form-control">
          <?= form_error('nik', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        
        <div class="form-group">
          <label for="">Nama Pegawai</label>
          <input type="text" name="nama_pegawai" class="form-control">
          <?= form_error('nama_pegawai', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" class="form-control">
          <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control">
          <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
        </div>

        <div class="form-group">
          <label for="">Jenis Kelamin</label>
          <select name="jenis_kelamin" id="" class="form-control">
            <option value="">--Pilih Jenis Kelamin--</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <?= form_error('jenis_kelamin', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        
        <div class="form-group">
          <label for="">Jabatan</label>
          <select name="jabatan" id="" class="form-control">
            <option value="">--Pilih Jabatan--</option>
            <?php foreach($jabatan as $j): ?>
              <option value="<?= $j->nama_jabatan; ?>"><?= $j->nama_jabatan; ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('jabatan', '<div class="text-small text-danger">', '</div>') ?>
          </div>
          
          <div class="form-group">
            <label for="">Tanggal masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control">
            <?= form_error('tanggal_masuk', '<div class="text-small text-danger">', '</div>') ?>
          </div>

          <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="" class="form-control">
              <option value="">--Pilih Status--</option>
              <option value="Pegawai Tetap">Pegawai Tetap</option>
              <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
            </select>
            <?= form_error('status', '<div class="text-small text-danger">', '</div>') ?>
          </div>

          <div class="form-group">
            <label for="">Photo</label>
            <input type="file" name="photo" class="form-control">
            <?= form_error('photo', '<div class="text-small text-danger">', '</div>') ?>
          </div>
          
          <div class="form-group">
            <label for="">Hak Akses</label>
            <select name="hak_akses" id="" class="form-control">
              <option value="">--Pilih Hak Akses--</option>
              <option value="1">Admin</option>
              <option value="2">Pegawai</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>

      </form>
    </div>

  </div>


</div>