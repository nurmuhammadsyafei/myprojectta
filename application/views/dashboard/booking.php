

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Data Booking</h3>
</div>

<div class="row">
  <div class="col-md-3">
    <form method="post" action="<?= base_url('cdashboard/data_booking_srt') ?>">
      <i>bulan berangkat </i>
      <div class="row ml-3">
        <select name="_data" class="mt-0" style="padding-left: 35px ;padding-top: 2px;padding-bottom: 2px">
          <option value="1">- Januari -</option>
          <option value="2">- Februari -</option>
          <option value="3">- Maret -</option>
          <option value="4">- April -</option>
          <option value="5">- Mei -</option>
          <option value="6">- Juni -</option>
          <option value="7">- Juli -</option>
          <option value="8">- Agustus -</option>
          <option value="9">- September -</option>
          <option value="10">- Oktober -</option>
          <option value="11">- November -</option>
          <option value="12">- Desember -</option>
        </select>
        <div class="col-3">
          <button type="submit" class="badge badge-dark"  style="padding:6px 25px">Go</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-3">
    <form method="post" action="<?= base_url('cdashboard/data_booking_srt1') ?>">
      <i>Status Accept</i>
      <div class="row ml-3">
        <select name="_data" class="mt-0" style="padding-left: 40px ;padding-top: 2px;padding-bottom: 2px">
          <option value="">- Status -</option>
          <option value="1">- Accepted -</option>
          <option value="0">- Un-accepted -</option>
        </select>
        <div class="col-3">
          <button type="submit" class="badge badge-dark" style="padding:6px 25px">Go</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-3 ">
    <form method="post" action="<?= base_url('cdashboard/data_booking_srt2') ?>">
      <i>Status Pembayaran </i>
      <div class="row ml-3">
        <select name="_data" class="mt-0" style="padding: 2px 40px 2px 42px;">
          <option value="0">- Status -</option>
          <option value="1">- Lunas -</option>
          <option value="0">- Belum -</option>
        </select>
        <div class="col-3">
          <button type="submit" class="badge badge-dark" style="padding:6px 25px">Go</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-2">
    <?php   

    if ($this->input->post('_data')==TRUE) {
     ?>
     <a href="<?= base_url('cdashboard/cetak_booking/') ?><?= $this->input->post('_data') ?>" target="_new"><button type="button"><i class="fa fa-print"> </i> Print</button></a>
     <?php
   }elseif ($this->input->post('_tahun')==NULL) {
    ?>
    <a href="<?= base_url('cdashboard/cetak_all_booking/') ?><?= $this->input->post('_data') ?>" target="_new"><button type="button"><i class="fa fa-print">  </i> Print</button></a>
    <?php
  }?>
  <a href="<?= base_url('cdashboard/data_booking') ?>"><button type="button"><i class="fa fa-refresh"> </i> Refresh</button></a>
</div>
<div class="col-md-3">
  <?= $this->session->flashdata('message'); ?>
</div>
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
        <th>Jml Pendaki</th>
        <th>Status Bayar</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php 
      $no=1;
      $statusbayar=['<span class="badge badge-danger">Belum</span>','<span class="badge badge-success">Sudah</span>'];
      $stt_acc=['<span class="badge badge-danger">Un-accept</span>','<span class="badge badge-success">Accepted</span>'];
      foreach ($tampilbooking as $boo) {
        ?>

        <tr>
          <td><?= $no++; ?></td>
          <td><?= $boo ['id_booking']; ?></td>
          <td class="bold text-left "><?= $boo ['nama']; ?></td>
          <td><?= $this->custom_library->indo_date($boo['tgl_booking']); ?></td>
          <td><?= $this->custom_library->indo_date($boo['tanggal']); ?></td>
          <td><?= $stt_acc[$boo ['stt_acc']]; ?></td>
          <td><?= $boo ['jml_anggota']; ?> orang</td>
          <td><?= $statusbayar[$boo ['stt_bayar']]; ?></td>
          <td>
            <a href="<?= base_url('cdashboard/detail_data_booking/') ?><?= $boo['id_booking'] ?>" class="btn btn-dark pt-0 pb-0" title="Detail">
              <i class="fa fa-search-plus" style=""></i>
            </a> 
            <form action="<?= base_url('cdashboard/hapus_data_booking') ?>" method="post" >
              <input type="hidden" name="_idbook" value="<?= $boo ['id_booking']; ?>">
              <input type="hidden" name="_idklp" value="<?= $boo ['id_kelompok']; ?>">
              <input type="hidden" name="_tglkuota" value="<?= $boo ['tanggal'] ?>">
              <input type="hidden" name="_tersedia" value="<?= $boo ['tersedia'] ?>">
              <input type="hidden" name="_terisi" value="<?= $boo ['terisi'] ?>">
              <input type="hidden" name="_jmlkuota" value="<?= $boo ['jml_anggota'] ?>">

              <button href="#" type="submit" class="btn btn-danger pt-0 pb-0" title="Hapus" onclick="return confirm('yakin ?');">
                <i class="fa fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<script>
        // Fungsi JS untuk membuat pop-up new window browser
        jQuery('a[target^="_new"]').click(function () {
          var width = window.innerWidth * 0.8;
          var height = width * window.innerHeight / window.innerWidth;
          window.open(this.href, 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
        });
      </script>