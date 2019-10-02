<?php 
$statusbayar=['<span class="badge badge-danger">Belum bayar</span>','<span class="badge badge-primary">Sudah bayar</span>'];
?>

<div class="container pt-4 pb-4">
	<div class="row">
		<div class="col-md-6 pb-2" >
			
			<div class="card-style mt-1 mb-1 pb-1 border-grey">
				<div class="card-header-style">
					<i class="fa fa-gear bold color-white"></i><span class="  bold color-white font-size-custom"> Ketentuan Pendaftaran</span>
				</div>
				<div class="card-body-custom">
					<i class="fa fa-check"></i>  Silahkan melakukan pembayaran via Transfer Bank . <br>
					<i class="fa fa-check"></i> BRI : 63247868462 a/n Surya Darma Ali . <br>
					<i class="fa fa-check"></i> Pembayaran di lakukan paling lambat 2 hari setelah booking. <br>
					<i class="fa fa-check"></i> Jika pembayaran belum di selesaikan dalam waktu yang di tentukan, maka kode booking sudah tidak berlaku dan harus daftar ulang. <br>
					<i class="fa fa-check"></i>  Upload bukti pembayaran jika telah selesai bayar. <br>
					<i class="fa fa-check"></i> harga berlaku untuk orang dewasa dan anak anak.<br><br>
					<table border="1" class="text-center center m-auto">
						<thead>
							<tr>
								<th >-</th>
								<th>Weekday</th>
								<th>Weekend</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th class="pl-3 pr-3">Harga</th>
								<th class="pl-3 pr-3">Rp.15.000,00</th>
								<th class="pl-3 pr-3">Rp.15.000,00</th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
		<div class="col-md-6 pl-3">
			<div class="row">
				<div class="col-md-9 mt-1 mb-3">
					<label>Data Pemesan</label>
					<button type="button" class="close" >
						<a href="<?= base_url('cbayar/logout') ?>"><span aria-hidden="true">&times;</span></a>
					</button>
					<table class="ml-3">
						<tr>
							<th>Kode Booking</th>
							<th class="pl-2 pr-2">:</th>
							<th><?= $book['id_booking'] ?></th>
						</tr>
						
						<tr>
							<th>Nama Kelompok</th>
							<th class="pl-2 pr-2">:</th>							
							<th><?= $klp['nama'] ?></th>
						</tr>

						<tr>
							<th>Tagihan</th>
							<th class="pl-2 pr-2">:</th>							
							<th>Rp <?= $this->custom_library->rupiah($book['subtotal']) ?></th>
						</tr>

						<tr>
							<th>Jumlah Peserta</th>
							<th class="pl-2 pr-2">:</th>
							<th><?= $book['jml_anggota'] ?> orang</th>
						</tr>

						<tr>
							<th>Ketua Kelompok</th>
							<th class="pl-2 pr-2">:</th>
							<th><?= $ketua['nama_ketua']?></th>
						</tr>

						<?php 
						$no=1;
						foreach ($agt as $anggota ): ?>

							<tr>
								<th>Anggota <?= $no++ ?></th>
								<th class="pl-2 pr-2"></th>
								<th><?= $anggota['nama_anggota'] ?></th>
							</tr>
						<?php endforeach ?>
						<tr><th><br></th></tr>

						<tr>
							<th>Tanggal Berangkat</th>
							<th class="pl-2 pr-2">:</th>
							<th><?= $book['tanggal'] ?></th>
						</tr>

						<tr>
							<th>Status bayar</th>
							<th class="pl-2 pr-2">:</th>
							<th><?= $statusbayar[$book['stt_bayar']] ?></th>
						</tr>

						<tr>
							<th></th><th></th>
							<th>
								<?php 
								if ($book['stt_acc']==0)
								{
									?>
									<span class='badge badge-danger'></span>
									<?php
								}
								else
								{
									?>
									<a href="<?= base_url('cbooking/print_bukti') ?>" class="btn btn-custom-grey" target="new">Print Bukti</a>
									<?php
								}
								?>
							</th>
						</tr>
					</table>
				</div>
				<?= $this->session->flashdata('message'); ?>
			</div>
			<div class="row pt-1 pl-1 pr-1 pb-2" >	
				<div class="col-md-10" >
					<label class="pb-0 mb-0 " style=""><i>Upload bukti bayar disini</i> ...</label>
					<form method="post" action="<?= base_url('cbayar/uploaduktibayar') ?>" enctype="multipart/form-data">
						
						<input type="hidden" name="_id_booking" value="<?= $book['id_booking'] ?>">
						<input type="hidden" name="_id_kelompok" value="<?= $book['id_kelompok'] ?>">
						<input type="hidden" name="_tgl_booking" value="<?= $book['tgl_booking'] ?>">
						<input type="hidden" name="_tgl_pulang" value="<?= $book['tgl_pulang'] ?>">
						<input type="hidden" name="_email" value="<?= $book['email_ketua'] ?>">
						<input type="hidden" name="_lm_hari" value="<?= $book['lm_hari'] ?>">
						<input type="hidden" name="_subtotal" value="<?= $book['subtotal'] ?>">
						<input type="hidden" name="_jml_anggota" value="<?= $book['jml_anggota'] ?>">


						<input type="file" name="buktibayar" class="ml-3 p-1 btn-dark" required>
						<button type="submit" class="btn-primary" style="padding-top: 3px; padding-bottom: 2px; margin-top: 0px;"><i class="fa fa-paper-plane"></i> Upload</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>