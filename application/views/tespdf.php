oke

<table class="text-center center m-auto" style="border: 2px solid black; font-size: 15px;font-family: sans-serif;">
	<thead style="background-color: rgba(47, 54, 64,1.0);color: white;">
		<tr>
			<th class="bord">No</th>
			<th class="bord">Kode booking</th>
			<th class="bord">Kelompok</th>
			<th class="bord">Tanggal Booking</th>
			<th class="bord">Tanggal Pendakian</th>
			<th class="bord">Lama Pendakian</th>
			<th class="bord">Anggota</th>
			<th class="bord">Accepted</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		foreach ($lap_booking as $data) {?>
			<tr>
				<th class="pl-2 pr-2 bord"><?= $no++ ?></th>
				<th class="pl-2 pr-2 bord"><?= $data['id_booking'] ?></th>
				<th class="text-left ml-2 pr-2 bord"><?= $data['nama'] ?></th>
				<th class="text-center ml-2 pr-2 bord"><?= $this->custom_library->indo_date($data['tanggal']) ?></th>
				<th class="text-center ml-2 pr-2 bord"><?= $this->custom_library->indo_date($data['tgl_booking']) ?></th>
				<th class="text-center pl-2 pr-2 bord"><?= $data['lm_hari'] ?> hari</th>
				<th class="text-right pl-3 pr-3 bord"><?= $data['jml_anggota'] ?> org</th>
				<th class="text-right pl-2 pr-2 bord"><?= $data['adm_nama'] ?></th>
			</tr>
		<?php } ?>
	</tbody>
</table>