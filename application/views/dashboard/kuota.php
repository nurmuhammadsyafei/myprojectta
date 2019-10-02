    
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header pt-2 pb-1">
        <h5 class="color-white" >Tambah Kuota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" method="post" action="<?= base_url('cdashboard/tambah_data_kuota'); ?>">

          <div class="form-group">
            <label class="mb-0">Tanggal</label>
            <input type="hidden" name="_kode" value="<?= $kodekuo ?>">
            <input name="tanggal" type="date"  class="form-control form-control-user font-template" required>
          </div>

          <button type="submit" class="btn btn-primary btn-user btn-block">
            Tambah
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Data Kuota Pendakian</h3>
</div>

<div class="container">
  <div class="row pb-2  ml-5">
    <div class="col-md-4 ml-2">
      <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="col-md-2">
      <button type="button" class="" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Tambah Baru</button>
    </div>
  </div>
</div>


<div  class="table-responsive col-md-6">
  <table id="myTable" class="table table-striped table-hover table-sm table-bordered text-center">
    <thead class="bg-purple1 color-white">
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Hari</th>
        <th>Tesedia</th>
        <th>Terisi</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no=1;

    //fungsi convert hari ke nama indonesia
      function getDayIndonesia($date)
      {
        if($date != '0000-00-00'){
          $data = hari(date('D', strtotime($date)));
        }else{
          $data = '*';
        }
        return $data;
      }
      function hari($day) {
        $hari = $day;
        switch ($hari) {
          case "Sun":$hari = "Minggu";break;
          case "Mon":$hari = "Senin";break;
          case "Tue":$hari = "Selasa";break;
          case "Wed":$hari = "Rabu";break;
          case "Thu":$hari = "Kamis";break;
          case "Fri":$hari = "Jum'at";break;
          case "Sat":$hari = "Sabtu";break;
        }
        return $hari;
      }

      foreach ($tampilkuota as $kuota) {
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $kuota ['tanggal']; ?></td>
          <td><?= getDayIndonesia($kuota ['tanggal']); ?></td>
          <td><?= $kuota ['tersedia']; ?></td>
          <td><?= $kuota ['terisi']; ?></td>
          <td>
            <a href="
<?= base_url('cdashboard/hapus_data_kuota/') ?><?= $kuota['id_kuota'] ?>" class="badge badge-danger float-right" onclick="return confirm('yakin ?');">Hapus</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>