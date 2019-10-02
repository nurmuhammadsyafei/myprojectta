<div class="container mt-3">
	
	<div class="row">
		<div class="col-md-7 ">	
			<table class="ml-3" style="font-size: 20px">
				<thead > 
					<h5>Detail Ketua Kelompok</h5>
				</thead>
				<tbody>
					<tr>
						<td>Id ketua</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['id_ketua']?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['nama_ketua']?></td>
					</tr>
					<tr>
						<td>Kelompok</td>
						<td class="pl-5 pr-3">:</td>
						<td><?= $ket['nama']?></td>
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
		<div class="col-md-1">
			<a href="<?= base_url('cdashboard/data_ketua') ?>"><button class="badge badge-dark pt-2 pb-2 pl-2 pr-2">Kembali</button></a>
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