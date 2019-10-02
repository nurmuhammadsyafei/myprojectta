



<br>
<form method="post" action="<?= base_url('cdashboard/accbooking') ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<label class="mb-0"><i>Kode Booking</i></label><br>
				<input type="hidden" name="_nama_admin" value="<?= $admin['adm_id'] ?>">
				<input type="text" name="_id_booking" class="ml-3 form-control-custom" value="<?= $book['id_booking'] ?>"><br>

				<label class="mb-0"><i>ID Kelompok</i></label><br>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $book['id_kelompok'] ?>"><br>

				<label class="mb-0"><i>Tanggal Booking</i></label><br>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $book['tgl_booking'] ?>"><br>

				<label class="mb-0"><i>Tanggal Berangkat</i></label><br>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $book['tanggal'] ?>"><br>

				<label class="mb-0"><i>Tanggal Pulang</i></label><br>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $book['tgl_pulang'] ?>"><br>

				<label class="mb-0"><i>Lama Hari</i></label><br>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $book['lm_hari'] ?> hari"><br>
				<label class="mb-0"><i>Tagihan</i></label><br>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $book['subtotal'] ?>"><br>
				<label class="mb-0"><i>Admin Accepted</i></label><br>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $book['adm_nama'] ?>"><br>

			</div>	
			<div class="col-md-4">

				<label class="mb-0"><i>Email Ketua</i></label><br>
				<input type="text" name="_email_ketua" readonly class="ml-3 form-control-custom" value="<?= $book['email_ketua'] ?>"><br>

				<label class="mb-0"><i>Jumlah Anggota</i></label><br>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $book['jml_anggota'] ?> orang"><br>

				<label class="mb-0"><i>Status Bayar</i></label><br>
				<?php $stt=['Belum Bayar','Sudah Bayar']; ?>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $stt[$book['stt_bayar']] ?>"><br>

				<label class="mb-0"><i>Tanggal Bayar</i></label><br>
				<input type="text" readonly class="ml-3 form-control-custom" value="<?= $book['tgl_bayar'] ?>"><br>


				<label class="mb-0"><i>Bukti Bayar</i></label><br>
				<a href="" data-toggle="modal" data-target=".modal-buktibayar" class="pl-3">
					<img src="<?= base_url('images/buktibayar/')?><?= $book['buktibayar'];?>" style="max-width: 18%; width: 18%;">
				</a>
				<!-- <input type="text" name="_buktibayar" class="ml-3 form-control-custom" value="<?= $book['buktibayar'] ?>"><br>
				--><br><br>
				<label class="mb-0"><i>Status ACC</i></label><br>
				<?php $acc=['Belum Acc','Sudah Acc'] ?>
				<input type="text" name="_stt_acc" class="ml-3 form-control-custom" value="<?= $acc[$book['stt_acc']] ?>">
			</div>
			<div class="col-md-4">
				<a href="<?= base_url('cdashboard/data_booking') ?>" class="btn btn-danger text-center" style="margin-bottom: 462px">Kembali</a><br>
				<?php if ($book['stt_bayar']==1) {?>
					<button type="submit" class="btn btn-primary" onclick="return confirm('yakin ?');">Accept ?</button>
				<?php }else{
					?>
					<button type="button" class="btn btn-dark">Belum bayar !</button>
					<?php
				} ?>
				<br>
			</div>
		</div>
	</div>
</form>

<div class="modal fade modal-buktibayar" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="row bg-custom-black">
				<div class="col-md-1 offset-md-11">
					<button type="button" class="float-right close pr-2" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="col-md-8 offset-md-2 pb-4">
					<div class="modal-body">
						<img src="<?= base_url('images/buktibayar/')?><?= $book['buktibayar'];?>" style="width: 100%;">
					</div>
				</div>
				<br>	
			</div>
		</div>
	</div>
</div>