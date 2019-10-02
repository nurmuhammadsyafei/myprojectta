
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Data Ketua</h3>
</div>

<div class="container">
  <div class="row pb-2 ml-5 pl-5">
    <div class="col-md-9  pb-1 ">
    </div>
  </div>
</div><br>


<div  class="table-responsive col-md-12">
  <table id="myTable" class="table table-striped table-hover table-striped table-sm table-bordered">
    <thead class="bg-purple1 color-white">
      <tr class="text-center">
        <th>No</th>
        <th>Nama Ketua</th>
        <th>Id Kelompok</th>
        <th>Jenis Kelamin</th>
        <th>No KTP</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>

      <?php 
      $no=1;
      foreach ($tampilketua as $ket) :
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $ket ['nama_ketua']; ?></td>
          <td class="bold"><?= $ket ['id_kelompok']; ?></td>
          <td><?= $ket ['jeniskelamin']; ?></td>
          <td><?= $ket ['ktp']; ?></td>
          <td><?= $ket ['alamat_ketua']; ?></td>
          <td><?= $ket ['telepon']; ?></td>
          <td class="text-center">
            <a href="<?= base_url('cdashboard/detail_data_ketua/') ?><?= $ket['id_ketua'] ?>" class="badge badge-primary pl-2 pr-2 pt-1 pb-1" >Detail</a>
            <a href="<?= base_url('cdashboard/hapus_data_ketua/') ?><?= $ket['id_ketua'] ?>" class="badge badge-danger  pl-2 pr-2 pt-1 pb-1" onclick="return confirm('yakin ?');">Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>