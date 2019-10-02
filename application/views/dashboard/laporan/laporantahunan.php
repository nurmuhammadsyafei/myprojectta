    
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header pt-2 pb-1">
        <h5 class="color-white" >Tambah Laporan Tahunan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" method="post" action="<?= base_url('cdashboard/tambah_data_tahunan'); ?>">

          <div class="form-group">
            <i class="mb-0">Tahun</i>
            <input name="_tahun" type="year" class="form-control-custom ml-2 mb-2" required>
            <i class="mb-0">Pendaki</i>
            <input name="_pendaki" type="text" class="form-control-custom ml-2 mb-2" required>
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

<div class="row">
  <div  class="table-responsive col-md-6">
    <table id="myTable" class="table table-striped table-hover table-sm table-bordered">
      <thead class="bg-purple1 color-white text-center">
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
          <tr class="text-center">
            <td><?= $no++; ?></td>
            <td><?= $lap ['tahun']; ?></td>
            <td><?= $lap ['pendaki']; ?></td>
            <td class="text-right">Rp.<?= $this->custom_library->rupiah($lap ['profit']); ?></td>
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

    <div class="col-md-3 offset-md-8 ">
      <a href="<?= base_url('cdashboard/cetak_tahun') ?>" target="_new"><button type="button">Cetak</button></a>
    </div>


  </div>

  <div class="col-md-6">
    <div style="border-top: 2px solid black; width: 70%;font-size: 20px">
      Total pendaki tahun <?= date('Y'); ?> => <?php echo $total; ?>
    </div>
    <div style="border-bottom: 2px solid black; width: 70%;font-size: 20px">
      Profit => <?php $ttotal=$total*15000; echo 'Rp. '.$this->custom_library->rupiah($ttotal); ?>
    </div>
    <br>
    <div style="background-color: white; width: 500px;height: 200px">
      <h2 class="text-center"><u>Data Pendaki Pertahun</u></h2>
      <canvas id="myChart"></canvas>
    </div>

    <script>
        // Fungsi JS untuk membuat pop-up new window browser
        jQuery('a[target^="_new"]').click(function () {
          var width = window.innerWidth * 0.8;
          var height = width * window.innerHeight / window.innerWidth;
          window.open(this.href, 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
        });
      </script>


      <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ["2014", "2015", "2016", "2017", "2018", "2019","2020"],
            datasets: [{
              label: 'Data Pendaki Pertahun',
              data: [<?= $empatbelas['pendaki'] ?>,<?= $limabelas['pendaki'] ?>,<?= $enambelas['pendaki'] ?>,<?= $tujubelas['pendaki'] ?>,<?= $delapanbelas['pendaki'] ?>,<?= $sembilanbelas['pendaki'] ?>,<?= $duapuluh['pendaki'] ?>,<?= $duasatu['pendaki'] ?>,<?= $duadua['pendaki'] ?>,<?= $duatiga['pendaki'] ?>,<?= $duaempat['pendaki'] ?>,<?= $dualima['pendaki'] ?>],
              backgroundColor: [
              'rgba(255, 99, 132,  0.8)',
              'rgba(54, 162, 235,  0.8)',
              'rgba(255, 206, 86,  0.8)',
              'rgba(75, 192, 192,  0.8)',
              'rgba(153, 102, 255,  0.8)',
              'rgba(50, 255, 126, 0.8)',
              'rgba(52, 152, 219, 0.8)',
              'rgba(61, 61, 61, 0.8)',
              'rgba(155, 89, 182, 0.8)',
              'rgba(0, 210, 211, 0.8)',
              'rgba(52, 31, 151, 0.8)',
              'rgba(255, 56, 56, 0.8)'
              ],
              borderColor: [
              'rgba(255, 99, 132, 1.0)',
              'rgba(54, 162, 235, 1.0)',
              'rgba(255, 206, 86, 1.0)',
              'rgba(75, 192, 192, 1.0)',
              'rgba(153, 102, 255, 1.0)',
              'rgba(50, 255, 126,1.0)',
              'rgba(52, 152, 219,1.0)',
              'rgba(61, 61, 61,1.0)',
              'rgba(155, 89, 182,1.0)',
              'rgba(0, 210, 211,1.0)',
              'rgba(52, 31, 151,1.0)',
              'rgba(255, 56, 56,1.0)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        });
      </script>


    </div>
  </div>