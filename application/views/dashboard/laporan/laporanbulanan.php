    
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
            <input name="_bulan" type="text" class="form-control-custom ml-2 mb-2" required>
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


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
  <h3>Laporan Bulanan</h3>
</div>
<div class="row pb-0">
  <div class="col-md-3 offset-md-1">
    <form method="post" action="<?= base_url('cdashboard/sortir_thn') ?>">
      <i>Sortir data dengan tahun</i>
      <div class="row ml-3">
        <div class="">
          <select name="_tahun" class="form-control-custom mt-0">
            <option value="2014">- 2014 -</option>
            <option value="2015">- 2015 -</option>
            <option value="2016">- 2016 -</option>
            <option value="2017">- 2017 -</option>
            <option value="2018">- 2018 -</option>
            <option value="2019">- 2019 -</option>
          </select>
        </div>
        <div class="col-3">
          <button type="submit" class="btn btn-dark mb-2">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-4">

    <?php   

    if ($this->input->post('_tahun')==TRUE) {
     ?>
     <a href="<?= base_url('cdashboard/cetak_bulan/') ?><?= $this->input->post('_tahun') ?>" target="_new"><button type="button">Cetak</button></a>
     <?php
   }elseif ($this->input->post('_tahun')==NULL) {
    ?>
    <a href="<?= base_url('cdashboard/cetak_all_bulan') ?>" target="_new"><button type="button">Cetak</button></a>
    <?php
  }?>

  <button type="button" class="" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Tambah Baru</button>
</div>
<div class="col-md-3">
  <?= $this->session->flashdata('message'); ?>
</div>
</div>


<div class="row">
  <div  class="table-responsive col-md-6">
    <table id="myTable" class="table table-striped table-hover table-sm table-bordered">
      <thead class="bg-purple1 color-white text-center">
        <tr>
          <th>No</th>
          <th>Tahun</th>
          <th>Bulan</th>
          <th>Pendaki</th>
          <th>Profit</th>
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
            <td><?= $lap ['thn']; ?></td>
            <td><?= $lap ['bln']; ?></td>
            <td class="text-center"><?= $lap ['pendaki']; ?></td>
            <td class="text-right">Rp.<?= $this->custom_library->rupiah($lap ['profit']); ?></td>
            <td>
              <a href="<?= base_url('cdashboard/edit_data_bulanan/') ?><?= $lap['id'] ?>"><button type="button" class="badge badge-primary">Edit</button>
              </a>
              <a href="
              <?= base_url('cdashboard/hapus_data_bulanan/') ?><?= $lap['id'] ?>" class="badge badge-danger " onclick="return confirm('yakin ?');">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <!-- <div class="container mb-5 mt-3">
      <div class="row pb-2 ml-5">
        <div class="col-md-2 offset-md-10">
          <a href="<?= base_url('cdashboard/cetak_bulan/') ?><?= $this->input->post('_tahun') ?>" target="_new"><button type="button">Cetak</button></a>
        </div>
      </div>
    </div> -->
  </div>
  <br>

  <div class="col-md-6">

    <!-- <div style="border-bottom: 2px solid black; width: 70%;font-size: 20px">
      Total pendaki bulan <?= $this->custom_library->nama_bulan(date('m')) ; ?> => <?php echo $totjuni; ?>
    </div><br> 
    <div style="border-bottom: 2px solid black; width: 70%;font-size: 20px">
      Profit Bulan ini => Rp <?php echo $this->custom_library->rupiah($totjuni*15000); ?>
    </div><br>    --> 
    <div class="col-md-6 offset-md-3 text-center">
      <div class="small-box bg-dark1">
        <div class="row">
          <div class="col-md-12">
            <h3 class="bold"><?= $totjuni ?> <span style="font-size: 15px">Pendaki Bulan <?= $this->custom_library->nama_bulan(date('m')) ?></span></h3>

          </div>
          
        </div>
        <div class="row bg-dark11 bottom-icon-1 pt-1 pb-1 pl-3 m-0">
          <span> Profit Bulan ini => Rp <?php echo $this->custom_library->rupiah($totjuni*15000); ?></span>
        </div>
      </div>
    </div>

    <div style="background-color: white; width: 500px;height: 200px">
      <h2 class="text-center"><u>Data Pendaki Perbulan</u></h2>
      <canvas id="myChart"></canvas>
    </div>
    
    <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli","Agustus","September",'Oktober',"November","Desember"],
          datasets: [{
            label: 'Data Pendaki perbulan',
            data: [<?= $januari['pendaki'] ?>,<?= $februari['pendaki'] ?>,<?= $maret['pendaki'] ?>,<?= $april['pendaki'] ?>,<?= $mei['pendaki'] ?>,<?= $juni['pendaki'] ?>,<?= $juli['pendaki'] ?>,<?= $agustus['pendaki'] ?>,<?= $september['pendaki'] ?>,<?= $oktober['pendaki'] ?>,<?= $november['pendaki'] ?>,<?= $desember['pendaki'] ?>],
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
    <script>
        // Fungsi JS untuk membuat pop-up new window browser
        jQuery('a[target^="_new"]').click(function () {
          var width = window.innerWidth * 0.8;
          var height = width * window.innerHeight / window.innerWidth;
          window.open(this.href, 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
        });
      </script>
    </div>
  </div>