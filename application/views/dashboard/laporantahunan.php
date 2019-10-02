    
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
        <form class="user" method="post" action="<?= base_url('cdashboard/tambah_data_bulanan'); ?>">

          <div class="form-group">
            <i class="mb-0">Tahun</i>
            <input name="_tahun" type="year" class="form-control-custom ml-2 mb-2" required>
            <i class="mb-0">Bulan</i>
            <input name="_bulan" type="month" class="form-control-custom ml-2 mb-2" required>
            <i class="mb-0">Pendaki</i>
            <input name="_pendaki" type="text" class="form-control-custom ml-2 mb-2" required>
            <i class="mb-0">Profit</i>
            <input name="_profit" type="text" class="form-control-custom ml-2 mb-2" required>
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
  <h3>Laporan Tahunan</h3>
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
        <th>Tahun</th>
        <th>Pendaki</th>
        <th>Terisi</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no=1;
      foreach ($lap_tahunan as $lap) {
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $lap ['tahun']; ?></td>
          <td><?= $lap ['pendaki']; ?></td>
          <td><?= $lap ['profit']; ?></td>
          <td>
            <a href="<?= base_url('cdashboard/edit_data_tahunan/') ?><?= $lap['id'] ?>"><button type="button" class="badge badge-primary">Edit</button>
            </a>
            <a href="
            <?= base_url('cdashboard/hapus_data_tahunan/') ?><?= $lap['id'] ?>" class="badge badge-danger " onclick="return confirm('yakin ?');">Hapus</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>