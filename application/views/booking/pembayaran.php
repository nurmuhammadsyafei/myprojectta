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
		<div class="col-md-4 offset-md-1 pl-3"><br><br><br><br><br>
			<div class="row pt-1 pl-1 pr-1 pb-2 mb-2" style="border: 2px solid #333;">	

				<label class="pb-0 mb-0 ">Masukkan kode booking anda disini</label>
				<form method="post" action="<?= base_url('cbayar/login') ?>">
					<input type="text" name="kdbooking" class=" pb-1 ml-4">
					<button type="submit" class="btn-primary" style="padding-top: 0px; padding-bottom: 2px; margin-top: 0px;"><i class="fa fa-paper-plane"></i> Masuk</button>
				</form>
			</div>
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
</div>