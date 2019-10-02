

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Data Booking Belum ACC</h3>
</div>

<div class="container">
  <div class="row pb-2 ml-5 pl-5">
    <div class="col-md-9 pb-1">
    </div>
  </div>
</div><br>
<div  class="table-responsive col-md-12 ">
  <table id="myTable" class="table table-striped table-hover table-striped table-sm table-bordered">
    <thead class="bg-purple1 color-white">
      <tr class="text-center">
        <th>No</th>
        <th>ID</th>
        <th>Kelompok</th>
        <th>Tgl Booking</th>
        <th>Tgl Berangkat</th>
        <th>Status Acc</th>
        <th>Jml Anggota</th>
        <th>Status Bayar</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php 
      $no=1;
      $statusbayar=['<span class="badge badge-danger">Belum</span>','<span class="badge badge-success">Sudah</span>'];
      $stt_acc=['<span class="badge badge-danger">Un-accept</span>','<span class="badge badge-success">Accepted</span>'];
      foreach ($tampil_unacc as $boo) {
        ?>

        <tr>
          <td><?= $no++; ?></td>
          <td><?= $boo ['id_booking']; ?></td>
          <td class="bold text-left "><?= $boo ['nama']; ?></td>
          <td><?= $this->custom_library->indo_date($boo['tgl_booking']); ?></td>
          <td><?= $this->custom_library->indo_date($boo ['tgl_berangkat']); ?></td>
          <td><?= $stt_acc[$boo ['stt_acc']]; ?></td>
          <td><?= $boo ['jml_anggota']; ?> orang</td>
          <td><?= $statusbayar[$boo ['stt_bayar']]; ?></td>
          <td>
            <a href="<?= base_url('cdashboard/detail_data_booking/') ?><?= $boo['id_booking'] ?>" class="btn btn-dark pt-0 pb-0" title="Detail"><i class="fa fa-search-plus" style=""></i></a> 
            <a href="<?= base_url('cdashboard/hapus_data_booking/') ?><?= $boo['id_booking'] ?>" class="btn btn-danger pt-0 pb-0" title="Hapus" onclick="return confirm('yakin ?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>