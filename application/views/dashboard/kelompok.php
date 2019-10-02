
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Data Kelompok</h3>
</div>

<div class="container">
  <div class="row pb-2 ml-5 pl-5">
    <div class="col-md-9  pb-1 ">
    </div>
  </div>
</div><br>

<div class="table-responsive col-md-10 offset-md-1">
  <table id="myTable" class="table table-striped table-hover table-striped table-sm table-bordered">
    <thead class="bg-purple1 color-white">
      <tr class="text-center">
        <th>No</th>
        <th>Id</th>
        <th>Nama Kelompok</th>
        <th>Jumlah Anggota</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>

      <?php 
      $no=1;
      foreach ($tampilkelompok as $kel) {
        ?>
        <tr>
          <td class="text-center"><?= $no++; ?></td>
          <td class="text-center"><?= $kel ['id_kelompok']; ?></td>
          <td class="bold"><?= $kel ['nama']; ?></td>
          <td class="text-center"><?= $kel ['jumlahanggota']; ?> orang</td>
          <td class="text-center">
            <a href="<?= base_url('cdashboard/detail_data_kelompok/') ?><?= $kel['id_kelompok'] ?>" class="badge badge-success pt-1 pb-1" >Detail</a>
            <a href="<?= base_url('cdashboard/hapus_data_kelompok/') ?><?= $kel['id_kelompok'] ?>" class="badge badge-danger pt-1 pb-1" onclick="return confirm('yakin ?');">Hapus</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>