<!DOCTYPE html>
<html>
<head>
	<title>Bukti Pendaftaran</title>
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css')?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('assets/custom/frontEnd.css')?>" rel="stylesheet" type="text/css"/>

</head>
<body><br>
	<?php function tgl_indo($tanggal){
		$bulan = [1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2]. ' - '.$bulan[(int)$pecahkan[1]].' - '.$pecahkan[0];
	} ?>
	<div class="container" style="font-size: 20px">
		<div class="row">
			<div class="col-md-8 offset-md-2">
			<h5 class="text-center" style="font-size: 35px;">Kartu / Tanda Bukti Pendaftaran Pendakian Gunung</h5>
			</div>
		</div>
		<hr style="border-top:3px double black;margin-bottom: 0px;">
		<hr style="border-top:3px double black;margin-top: 5px;">

		<div class="row mb-2">
			<div class="bold col-md-3 offset-md-1">
				KODE BOOKING
			</div>
			<div class="col-md-3 text-left">:<span class="ml-4"><?= $book['id_booking'] ?></span></div>
		</div>

		<div class="row mb-2">
			<div class="bold col-md-3 offset-md-1">
				TANGGAL BOOKING
			</div>
			<div class="col-md-3 text-left">:
				<span class="ml-4"><?= tgl_indo($book['tgl_booking']) ?></span>
			</div>
		</div>

		<div class="row mb-2">
			<div class="bold col-md-3 offset-md-1">
				NAMA KELOMPOK
			</div>
			<div class="col-md-3 text-left">:<span class="ml-4"><?= $klp['nama'] ?></span></div>
		</div>

		<div class="row mb-2">
			<div class="bold col-md-3 offset-md-1">
				JUMLAH PESERTA
			</div>
			<div class="col-md-3 text-left">:<span class="ml-4"><?= $book['jml_anggota'] ?> orang</span></div>
		</div>

		<div class="row mb-2">
			<div class="bold col-md-3 offset-md-1">
				KETUA KELOMPOK
			</div>
			<div class="col-md-3 text-left">:<span class="ml-4"><?= $ketua['nama_ketua']?></span></div>
		</div>

		<div class="row mb-2">
			<div class="bold col-md-3 offset-md-1">
				EMAIL KETUA 
			</div>
			<div class="col-md-3 text-left">:<span class="ml-4"><?= $book['email_ketua'] ?></span></div>
		</div>

		<div class="row mb-2">
			<div class="bold col-md-3 offset-md-1">
				TANGGAL PENDAKIAN
			</div>
			<div class="col-md-3 text-left">:
				<span class="ml-4"><?= tgl_indo($book['tanggal']) ?></span>
			</div>
		</div>

		<div class="row mb-2">
			<div class="bold col-md-3 offset-md-1">
				TANGGAL PULANG
			</div>
			<div class="col-md-3 text-left">:
				<span class="ml-4"><?= tgl_indo($book['tgl_pulang']) ?></span>
			</div>
		</div>

		<div class="row mb-2">
			<div class="bold col-md-3 offset-md-1">
				LAMA PENDAKIAN
			</div>
			<div class="col-md-3 text-left">:
				<span class="ml-4"><?= $book['lm_hari'] ?> hari</span>
			</div>
		</div>
		<hr style="border-top:3px double black;margin-top: 5px;">


		<?php
		$no=1; foreach ($agt as $anggota ): ?>
		<div class="row mb-2">
			<div class="bold col-md-1 offset-md-3">
				Anggota
			</div>
			<div class="col-md-6 text-left"><?= $no++ ?>
			<span class="ml-3"><?= $anggota['nama_anggota'] ?></span>
		</div>
		</div><?php endforeach ?>
		<hr style="border-top:3px double black;margin-top: 5px;">
		<div class="row ml-5" style="font-size: 25px; text-align: justify;">
			<div class="col-md-6">
				Selamat, anda sudah terdaftar dalam database pendakian, silahkan cetak kartu ini sebagai bukti pendaftaran, terimakasih ..
				<hr style="border-top:3px double black;margin-top: 5px;">
			</div>
		</div>
	</div>



	<script type="text/javascript">
		window.print();
	</script> --><!-- 
</body>
</html>