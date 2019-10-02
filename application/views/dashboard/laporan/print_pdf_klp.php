<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Pertahun</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url('assets/chart.js')?>"></script>
	
	<style type="text/css">
	.container_custom{
		width: 100%;padding-right: 25px;
		padding-left: 25px;margin-right: 35px;margin-left: 35px;
	}
	.fontsize{font-size: 15px;}
	.bold{font-weight: bold;}
	.cw{color:white;}
	.bord{border: 2px solid black;}
	footer{position: fixed;bottom: -30px;left: 0px; 
		right: 0px;height: 49px; padding-left:4%; color: black;
		text-align: left;line-height: 35px;
	}
	hr{width:100%;height:3px; 
		display: block;border-top: 1px solid #999; 
		border-bottom:1px solid #999;background: #FFF; 
		text-align:center; margin-top:10px;margin-bottom:10px}
		td{
			padding-top: -5px
		}
		.bbt{border-top:1px solid black;border-bottom: 1px solid black}
		.blr{border-right: 1px solid black;border-left: 1px solid black}
		.bblr{border-bottom:1px solid black;border-left:1px solid black;border-right:1px solid black}
	</style>
	<?php 
	$sttbyr=['belum','lunas'];$sttacc=['belum','accept']
	?>
</head>
<body >
	<div class="container_custom">
		<div class="text-center">
			<h4>POS PENDAKIAN GUNUNG</h4>
			<h6 class="fontsize pb-0 mb-0">Jl. Raya Sarangan, Sampe, Ngancar, Plaosan, Kabupaten Magetan, Jawa Timur 63361</h6>
			<span class="fontsize">Telpon : 021-8273 6431, 0813 9821 7755, 0812 8986 6565</span>
		</div>
	</div>
	<hr style="background-color: black"><br>
	<div class="container_custom mb-3">
		<div class="text-center bold h4">
			Detail Data Kelompok
		</div>
	</div>
	<div class="container_custom">
		<div class="row">
			<div class="col-md-5">	
				<table class="ml-3" style="font-size: 14px">
					<thead > 
						<tr>
							<td style="padding-bottom: -8px;"><h5><b>Ketua</b></h5></td>
							<td></td><td></td>
							<td class="cw">:</td>
							<td colspan="3"><h5><b>Kelompok</b></h5></td>
							<td class="cw">:</td>
							<td><h5><b>Booking</b></h5></td>
						</tr>

					</thead>
					<tbody>
						<tr>
							<td>Nama</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['nama_ketua']?></td>
							<td class="cw">space</td>
							<td>ID Kelompok</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $kel['id_kelompok'] ?></td>
							<td class="cw">space</td>
							<td>ID Booking</td>
							<td>:</td>
							<td><?= $boo['id_booking'] ?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['jeniskelamin'] ?></td>
							<td class="cw"></td>
							<td>Nama Kelompok</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $kel['nama'] ?></td>
							<td class="cw"></td>
							<td>Tgl booking</td>
							<td>:</td>
							<td><?= $boo['tgl_booking'] ?></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $this->custom_library->indo_date($ket['tanggallahir']) ?></td>
							<td class="cw"></td>
							<td>Jumlah Pendaki</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $kel['jumlahanggota'] ?> orang</td>
							<td class="cw"></td>
							<td>Tgl Pulang</td>
							<td>:</td>
							<td><?= $boo['tgl_pulang'] ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['alamat_ketua'] ?></td>
							<td class="cw"></td>
							<td>ID Booking</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $boo['id_booking'] ?></td>
							<td class="cw"></td>
							<td>Lama Hari</td>
							<td>:</td>
							<td><?= $boo['lm_hari'] ?></td>
						</tr>
						<tr>
							<td>No KTP</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['ktp'] ?></td>
							<td colspan="5"></td>
							<td>Status Bayar</td>
							<td>:</td>
							<td><?= $sttbyr[$boo['stt_bayar']] ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['email'] ?></td>
							<td colspan="5"></td>
							<td>Tgl Bayar</td>
							<td>:</td>
							<td><?= $boo['tgl_bayar'] ?></td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['telepon'] ?></td>
							<td colspan="5"></td>
							<td>Status Acc</td>
							<td>:</td>
							<td><?= $sttacc[$boo['stt_acc']] ?></td>
						</tr>
						<tr>
							<td>Kontak Darurat</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['kontak_darurat'] ?></td>
							<td colspan="5"></td>
							<td>Admin Acc</td>
							<td>:</td>
							<td><?= $boo['adm_id'] ?></td>
						</tr>
						<tr>
							<td>Nama Kontak</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['nama_kondar'] ?></td>
							<td colspan="5"></td>
						</tr>
						<tr>
							<td>Hubungan</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['hubungan'] ?></td>
							<td colspan="5"></td>
						</tr>
						<tr>
							<td>Alamat Kontak</td>
							<td class="pl-1 pr-1">:</td>
							<td><?= $ket['alamat_kondar'] ?></td>
							<td colspan="5"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12">
				<table class="ml-3 mt-4" style="font-size: 14px" >
					<thead>					
						<tr>
							<td><h5><b>Anggota</b></h5></td>
						</tr>
					</thead>
					<tbody>
						<tr class="bold">
							<td class="pr-3 bbt blr">No</td>
							<td class="bbt">Nama</td>
							<td class="pl-4 pr-4 bbt blr">Gender</td>
							<td class="bbt">Tanggal Lahir</td>
							<td class="pl-4 pr-4 bbt blr">No KTP</td>
							<td class="bbt">Alamat</td>
							<td class="pl-4 pr-4 bbt blr">Telepon</td>
						</tr>
						<?php $gen=['Pria','Wanita'];$no=1;foreach ($agt as $ag): ?>
						<tr>
							<td class="pl-2 bblr"><?= $no++ ?>. </td>
							<td class="bblr"><?= $ag['nama_anggota']?></td>
							<td class="pl-4 pr-4 bblr"><?= $gen[$ag['jeniskelamin']]?></td>
							<td class="bblr"><?= $ag['tanggallahir']?></td>
							<td class="pl-4 pr-4 bblr"><?= $ag['ktp']?></td>
							<td class="bblr"><?= $ag['alamat']?></td>
							<td class="pl-4 pr-4 bblr"><?= $ag['telepon']?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</table>
	</div>
</div>
</div>
<div class="container_custom">
	<footer>
		<i>Detail Kelompok Pendakian Pos Pendakian Gunung</i>
	</footer>
</div>
<pagefooter name="odds" z content-right="{PAGENO}" footer-style-left="font-size:11px; font-weight: bold; color: blue" footer-style-center="font-size:12px" footer-style-right="color: #880000; font-style: italic;" line="1"></pagefooter>
</body>

</html>