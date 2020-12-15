<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="card mb-3">
    <div class="card-header bg-primary text-white">
      Filter Data Gaji Pegawai
    </div>
    <div class="card-body">
      <form class="form-inline">
        <div class="form-group mb-2">
          <label for="">Bulan : </label>
          <select name="bulan" id="" class="form-control ml-2">
            <option value="">--Pilih Bulan--</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="form-group mb-2 ml-5">
          <label for="">Tahun : </label>
          <select name="tahun" id="" class="form-control ml-2">
            <option value="">--Pilih Tahun--</option>
            <?php
            $tahun = date('Y');
            for($i=2020; $i<$tahun+5; $i++){ ?>
              <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php } ?>
          </select>
        </div>

        <?php
        if((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')){
          $bulan = $_GET['bulan'];
          $tahun = $_GET['tahun'];
          $bulanTahun = $bulan.$tahun;
        }
        else{
          $bulan = date('m');
          $tahun = date('Y');
          $bulanTahun = $bulan.$tahun;
        }
        ?>

        <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i>  Tampilkan Data</button>

        <?php if(count($gaji) > 0){ ?>
          <a href="<?= base_url('admin/dataPenggajian/cetakGaji?bulan='.$bulan), '&tahun='.$tahun; ?>" class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i> Cetak Daftar Gaji</a>
        <?php
        }
        else{ ?>
          <button type="button" class="btn btn-success mb-2 ml-3" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-print"></i> Cetak Daftar Gaji
          </button>
        <?php } ?>
        
      </form>
    </div>
  </div>

  <?php
  if((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')){
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $bulanTahun = $bulan.$tahun;
  }
  else{
    $bulan = date('m');
    $tahun = date('Y');
    $bulanTahun = $bulan.$tahun;
  }
  ?>

  <div class="alert alert-info">
    Menampilkan data gaji pegawai bulan: <span class="font-weight-bold"><?= $bulan; ?></span> tahun: <span class="font-weight-bold"><?= $tahun; ?></span>
  </div>

  <?php
  $jml_data = count($gaji);
  if($jml_data > 0){ ?>
  
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIK</th>
        <th class="text-center">Nama Pegawai</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Jabatan</th>
        <th class="text-center">Gaji Pokok</th>
        <th class="text-center">Tj. Transport</th>
        <th class="text-center">Uang Makan</th>
        <th class="text-center">Potongan</th>
        <th class="text-center">Total Gaji</th>
      </tr>

      <?php foreach($potongan as $p){
        $alpha = $p->jml_potongan;
      } ?>
      <?php
      $no = 1;
      foreach($gaji as $g): ?>
      <?php $potongan = $g->alpha * $alpha; ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $g->nik; ?></td>
        <td><?= $g->nama_pegawai; ?></td>
        <td><?= $g->jenis_kelamin; ?></td>
        <td><?= $g->nama_jabatan; ?></td>
        <td>Rp. <?= number_format($g->gaji_pokok,0,',','.'); ?>,-</td>
        <td>Rp. <?= number_format($g->tj_transport,0,',','.'); ?>,-</td>
        <td>Rp. <?= number_format($g->uang_makan,0,',','.'); ?>,-</td>
        <td>Rp. <?= number_format($potongan,0,',','.'); ?>,-</td>
        <?php $total_gaji = $g->gaji_pokok + $g->tj_transport + $g->uang_makan - $potongan; ?>
        <td>Rp. <?= number_format($total_gaji,0,',','.'); ?>,-</td>
      </tr>

      <?php endforeach; ?>
    </table>
  </div>

  <?php }
  else{ ?>
    <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silahkan input data kehadiran pada bulan dan tahun yang anda pilih!</span>
  <?php } ?>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Data gaji masih kosong, silahkan input absensi terlebih dahulu pada bulan dan tahun yang anda pilih!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>