	<br>
	<div  class="table-responsive col-md-8 offset-md-2">
		<table id="myTable" class="table  bg-grey1 table-sm table-bordered">
			<thead class="bg-dark color-white bold">
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Tanggal Pendakin</th>
					<th class="text-center">Hari</th>
					<th class="text-center">Kapasitas</th>
					<th class="text-center">OPSI</th>
				</tr>
			</thead>

			<?php 
			$no=1;

			foreach ($tampilkuo as $kuo){
				?>
				<tbody class="bold">
					<tr>
						<td class="text-center"><?= $no++; ?></td>
						<td class="text-center"><?= $this->custom_library->tgl_indo($kuo ['tanggal']); ?></td>
						<td class="text-center"><?= $this->custom_library->hari_indo($kuo ['tanggal']); ?></td>
						<td class="text-center"><?= $kuo ['tersedia']; ?></td>
						<td class="text-center">
							<?php 
							if ($kuo['tersedia']==0)
							{
								?>
								<span title="Habis" class='badge badge-danger'>Habis</span>
								<?php
							}
							else
							{
								?>
								<a title="Booking" href="<?= base_url('cbooking/isidata/') ?><?= $kuo['id_kuota'] ?>" class='badge badge-primary'>Booking sekarang</a>
								<?php
							}
							?>
						</td>
					</tr>
				</tbody>
			<?php } ?>
		</table>
	</div>