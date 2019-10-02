<style>
.bbt{border-top:1px solid black;border-bottom: 1px solid black}
.blr{border-right: 1px solid black;border-left: 1px solid black}
.bblr{border-bottom:1px solid black;border-left:1px solid black;border-right:1px solid black}
</style>
<div class="container mt-3">
	<div class="row ">
		<div class="col-md-7">
			<h5 class="mb-4">Detail Data Kelompok => <span class="bold"><?= $kel['nama'] ?></span></h5>
		</div>

		<div class="col-md-5">
			<a href="<?= base_url('cdashboard/cetak_kelompok/') ?><?= $kel['id_kelompok'] ?>" target="_new"><button class="pt-1 pb-1 pl-3 pr-3" type="button">Cetak</button></a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">	
			<table class="ml-3">
				<thead > 
					<h5>Ketua Kelompok</h5>
				</thead>
				<tbody>
					<tr>
						<td>Nama</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['nama_ketua']?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['jeniskelamin'] ?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $this->custom_library->indo_date($ket['tanggallahir']) ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['alamat_ketua'] ?></td>
					</tr>
					<tr>
						<td>No KTP</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['ktp'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['email'] ?></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['telepon'] ?></td>
					</tr>
					<tr>
						<td><hr></td>
						<td><hr></td>
						<td><hr></td>
					</tr>
					<tr>
						<td>Kontak Darurat</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['kontak_darurat'] ?></td>
					</tr>
					<tr>
						<td>Nama Kontak</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['nama_kondar'] ?></td>
					</tr>
					<tr>
						<td>Hubungan</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['hubungan'] ?></td>
					</tr>
					<tr>
						<td>Alamat Kontak</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['alamat_kondar'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<table class="ml-3">
				<thead > 
					<h5>Data Kelompok</h5>
				</thead>
				<tbody>
					<tr>
						<td>ID Kelompok</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $kel['id_kelompok']?></td>
					</tr>
					<tr>
						<td>Nama Kelompok</td>
						<td class="pl-5 pr-3">:</td>
						<td class="bold"><?= $kel['nama'] ?></td>
					</tr>
					<tr>
						<td>Jumlah Pendaki</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $kel['jumlahanggota'] ?> orang</td>
					</tr>
					<tr>
						<td>ID Booking</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $boo['id_booking'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-12">
			<table class="ml-3">
				<thead>					
					<h5>Anggota</h5>
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
	</div>
</div>
</div>

<script>
        // Fungsi JS untuk membuat pop-up new window browser
        jQuery('a[target^="_new"]').click(function () {
        	var width = window.innerWidth * 0.8;
        	var height = width * window.innerHeight / window.innerWidth;
        	window.open(this.href, 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
        });
    </script>