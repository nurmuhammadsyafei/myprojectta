<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Pertahun</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url('assets/chart.js')?>"></script>
	
	<style type="text/css">
	.container_custom {
		width: 100%;
		padding-right: 25px;
		padding-left: 25px;
		margin-right: 35px;
		margin-left: 35px;
	}
	.fontsize{
		font-size: 15px	;
	}
	.bold{
		font-weight: bold;
	}
	.bord{
		border: 2px solid black;
	}

	footer{
		position: fixed; 
		bottom: -30px; 
		left: 0px; 
		right: 0px;
		height: 50px; 
		padding-left:4%; 
		color: black;
		text-align: left;
		line-height: 35px;
	}
	hr{
		width:100%;
		height:3px; 
		display: block; 
		border-top: 1px solid #999; 
		border-bottom: 1px solid #999; 
		background: #FFF; 
		text-align:center; 
		margin-top:10px;
		margin-bottom:10px}
	</style>
</head>
<body>
	<div class="container_custom">
		<div class="text-center">
			<h4>POS PENDAKIAN GUNUNG</h4>
			<h6 class="fontsize pb-0 mb-0">Jl. Raya Sarangan, Sampe, Ngancar, Plaosan, Kabupaten Magetan, Jawa Timur 63361</h6>
			<span class="fontsize">Telpon : 021-8273 6431, 0813 9821 7755, 0812 8986 6565</span>
		</div>
	</div>
	<hr style="background-color: black"><br>
	<div class="container_custom">
		<div class="text-center bold h4">
			Tabel Perkembangan Jumlah Pendaki Perbulan
		</div>
	</div>
	<div class="container_custom">
		<table class="text-center center m-auto" style="border: 2px solid black">
			<thead style="background-color: rgba(47, 54, 64,1.0);color: white;">
				<tr>
					<th class="bord">No</th>
					<th class="bord">Tahun</th>
					<th class="bord">Bulan</th>
					<th class="bord">Jumlah Pendaki</th>
					<th class="bord">Profit</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1;
				foreach ($lap_bulanan as $bln): ?>
					<tr>
						<th class="pl-3 pr-3 bord"><?= $no++ ?></th>
						<th class="ml-3 pr-3 bord"><?= $bln['thn'] ?></th>
						<th class="text-left ml-3 pr-3 bord"><?= $bln['bln'] ?></th>
						<th class="text-right pl-3 pr-3 bord"><?= $this->custom_library->rupiah($bln['pendaki']) ?></th>
						<th class="text-right pl-3 pr-3 bord">Rp.<?= $this->custom_library->rupiah($bln['profit']) ?></th>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>

		<div class="container_custom">
			<footer>
				<i>Statistik Jumlah Pendaki Tahunan Pos Pendakian Gunung</i>
			</footer>
		</div>
		<pagefooter name="odds" z content-right="{PAGENO}" footer-style-left="font-size:11px; font-weight: bold; color: blue" footer-style-center="font-size:12px" footer-style-right="color: #880000; font-style: italic;" line="1"></pagefooter>
	</body>

	</html>