
<br>

<div style="background-color: white; width: 700px;height: 400px">
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
<div class="row">

	<div class="col-md-3">
		<div class="small-box bg-ungu pl-3">
			<div class="row">
				<div class="col-md-8 ml-0">
					<h3 class="bold"><?= $totjuni ?> <span style="font-size: 15px">Pendaki</span></h3>
					<?php function tgl_indo($tanggal){
						$bulan = [1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
						$pecahkan = explode('-', $tanggal);
						return $bulan[(int)$pecahkan[0]];
					} ?>
					<span style="font-size: 17px">Bulan <?= tgl_indo(date('m')) ?></span>
				</div>
				<div class="col-md-4 pl-0">
					<i class="fa fa-bell icon"></i>
				</div>
			</div>
			<div class="row bg-ungu1 bottom-icon pt-1 pb-1	">
				<a href="<?= base_url('cdashboard/lap_bulanan') ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="small-box bg-dark1 pl-3">
			<div class="row">
				<div class="col-md-8 ml-0">
					<h3 class="bold"><?= $total ?> <span style="font-size: 15px">Pendaki</span></h3>

					<span style="font-size: 17px">Tahun <?= date('Y') ?></span>
				</div>
				<div class="col-md-4 pl-0">
					<i class="fa fa-bell icon"></i>
				</div>
			</div>
			<div class="row bg-dark11 bottom-icon pt-1 pb-1	">
				<a href="<?= base_url('cdashboard/lap_tahunan') ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="small-box bg-merah pl-3">
			<div class="row">
				<div class="col-md-8 ml-0">
					<h3 class="bold"><?= $unacc ?> <span style="font-size: 15px"></h3>

					<span style="font-size: 15px">Unaccepted booking</span>
				</div>
				<div class="col-md-4 pl-0">
					<i class="fa fa-bell icon"></i>
				</div>
			</div>
			<div class="row bg-merah1 bottom-icon pt-1 pb-1	">
				<a href="<?= base_url('cdashboard/data_booking') ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="small-box bg-oren pl-3">
			<div class="row">
				<div class="col-md-8 ml-0">
					<h3 class="bold"><?= $blmbayar ?> <span style="font-size: 15px"></h3>

					<span style="font-size: 15px">Booking Belum bayar</span>
				</div>
				<div class="col-md-4 pl-0">
					<i class="fa fa-bell icon"></i>
				</div>
			</div>
			<div class="row bg-oren1 bottom-icon pt-1 pb-1	">
				<a href="<?= base_url('cdashboard/data_booking') ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>

</div>