
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Laporan Bulanan</h3>
</div>

<div class="container">
  <div class="row pb-2  ml-5">
    <div class="col-md-4 ml-2">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>
</div>

<div class="row">
  <div  class="table-responsive col-md-6">
    <table id="myTable" class="table table-striped table-hover table-sm table-bordered text-center">
      <thead class="bg-purple1 color-white">
        <tr>
          <th>No</th>
          <th>Tahun</th>
          <th>Bulan</th>
          <th>Pendaki</th>
          <th>Terisi</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=1;
        foreach ($lap_bulanan as $lap) {
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $lap ['tahun']; ?></td>
            <td><?= $lap ['bulan']; ?></td>
            <td><?= $lap ['pendaki']; ?></td>
            <td><?= $lap ['profit']; ?></td>
            <td>
              <a href="<?= base_url('cdashboard/edit_data_bulanan/') ?><?= $lap['id'] ?>"><button type="button" class="badge badge-primary">Edit</button>
              </a>
              <a href="#" class="badge badge-danger ">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-4">
    <br><br><br>
    <form class="user" method="post" action="<?= base_url('cdashboard/edit_lap_bulanan'); ?>">

      <div class="form-group">
        <b class="mb-0">Tahun</b>
        <input type="hidden" name="_id" value="<?= $byid['id'] ?>">
        <input name="_tahun" type="text" readonly class="ml-3 mb-2 form-control-custom" value="<?= $byid['tahun'] ?>">
        <b class="mb-0">Bulan</b>
        <input name="_bulan" type="text" readonly class="ml-3 mb-2 form-control-custom" value="<?= $byid['bulan'] ?>">
        <b class="mb-0">Jumlah Pendaki</b>
        <input name="_pendaki" type="text" class="ml-3 mb-2 form-control-custom" value="<?= $byid['pendaki'] ?>">
        <b class="mb-0">Profit</b>
        <input name="_profit" type="text" class="ml-3 mb-2 form-control-custom" value="<?= $byid['profit'] ?>">
      </div>

      <button type="submit" class="btn btn-primary btn-user btn-block">
        Tambah
      </button>
    </form>
  </div>
</div>