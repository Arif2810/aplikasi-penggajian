<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/dataJabatan/tambahData/'); ?>"><i class="fas fa-plus"></i> Tambah Data</a>

  <?= $this->session->flashdata('pesan'); ?>

  <table class="table table-bordered table-stiped mt-2">
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Nama Jabatan</th>
      <th class="text-center">Gaji Pokok</th>
      <th class="text-center">Tunjangan Transport</th>
      <th class="text-center">Uang Makan</th>
      <th class="text-center">Total</th>
      <th class="text-center">Action</th>
    </tr>

    <?php
    $no = 1;
    foreach($jabatan as $j): ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $j->nama_jabatan; ?></td>
      <td>Rp. <?= number_format($j->gaji_pokok,0,',','.'); ?>,-</td>
      <td>Rp. <?= number_format($j->tj_transport,0,',','.'); ?>,-</td>
      <?php $total = $j->gaji_pokok + $j->tj_transport + $j->uang_makan; ?>
      <td>Rp. <?= number_format($j->uang_makan,0,',','.'); ?>,-</td>
      <td>Rp. <?= number_format($total,0,',','.'); ?>,-</td>
      <td>
        <center>
          <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataJabatan/updateData/'.$j->id_jabatan); ?>"><i class="fas fa-edit"></i></a>
          <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataJabatan/deleteData/'.$j->id_jabatan); ?>"><i class="fas fa-trash"></i></a>
        </center>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>




</div>