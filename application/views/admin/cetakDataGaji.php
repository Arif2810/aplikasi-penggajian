<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>

  <style type="text/css">
    body{
      font-family: Arial;
      color: black;
    }
  </style>
</head>
<body>

<center>
  <h1>PT INDONESIA BANGKIT</h1>
  <h2>Daftar Gaji Pegawai</h2>
</center>

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

<table>
  <tr>
    <td>Bulan</td>
    <td>:</td>
    <td><?= $bulan; ?></td>
  </tr>
  <tr>
    <td>Tahun</td>
    <td>:</td>
    <td><?= $tahun; ?></td>
  </tr>
</table>

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
  foreach($cetakGaji as $g): ?>
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

<table width="100%;">
  <tr>
    <td></td>
    <td width="200px">
      <p>Jakarta, <?= date("d M Y"); ?> <br> Finance</p>
      <br><br>
      <p>__________________</p>
    </td>
  </tr>
</table>
  
</body>
</html>

<script type="text/javascript">
  window.print();
</script>