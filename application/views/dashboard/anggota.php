
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Data Anggota</h3>
 <!--  <a href="<?= base_url('cdashboard/deleteall') ?>"><button class="btn btn-danger" onclick="return confirm('Hapus semua data ?');">Delete All</button></a> -->
</div>

<div class="container">
  <div class="row pb-2 ml-5 pl-5">
    <div class="col-md-9 pb-1 ">
    </div>
  </div>
</div><br>

<div class="table-responsive col-md-12 ">
  <table id="myTable" class="table table-striped table-hover table-sm table-bordered">
    <thead class="bg-purple1 color-white">
      <tr class="text-center">
        <th >No</th>
        <th>Nama</th>
        <th>Id Kelompok</th>
        <th>Jenis kelamin</th>
        <th>No KTP</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th></th>
      </tr>
    </thead>
    
    <tbody >
      <?php 
      $no=1;
      $gen=['Laki-Laki','Perempuan'];
      foreach ($tampilanggota as $ang) :
        ?>

        <tr>
          <td class="text-center"><?= $no++; ?></td>
          <td><?= $ang ['nama_anggota']; ?></td>
          <td class="bold text-center"><?= $ang ['id_kelompok']; ?></td>
          <td class="text-center"><?=$gen[$ang ['jeniskelamin']]; ?></td>
          <td><?= $ang ['ktp']; ?></td>
          <td><?= $ang ['alamat']; ?></td>
          <td><?= $ang ['telepon']; ?></td>
          <td class="text-center ">
            <a href="<?= base_url('cdashboard/hapus_data_anggota/') ?><?= $ang['id_anggota'] ?>" class="badge badge-danger" onclick="return confirm('yakin ?');">Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>