
<div class="pb-5 ">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">

				<form method="post" class="bg-grey p-3" 
				action="<?= base_url('cbooking/insertdata')?>"
				style="font-family: sans-serif;"
				>
				<div class="row">
					<div class="col-md-6 offset-md-4">
						<label class="bold font-size-custom border-hijau pl-5 pb-1 pr-5">Isi Data Diri</label>		
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 offset-md-4">
						<?= $this->session->flashdata('message1') ?>
					</div>
				</div>
				<input type="hidden" name="_get" value="<?= $getkuota['id_kuota'] ?>">
				<label class="mb-0"><h4>Jadwal Pendakian</h4></label>

				<div class="row pl-5 ">
					<div class="col-md-4" >
						<label class="mb-0">Tanggal berangkat</label>
						<input type="text" readonly name="tanggalberangkat" class="form-control-custom mb-1 ml-3" value="<?php echo $getkuota['tanggal']?>">
						<input type="hidden" name="_id_kuota" value="<?= $getkuota['id_kuota'] ?>">
						<input type="hidden" name="_kuota" value="<?= $getkuota['tersedia'] ?>">
						<input type="hidden" name="_harga" value="<?= $getkuota['harga'] ?>">
						<input type="hidden" name="_terisi" value="<?= $getkuota['terisi'] ?>">
					</div>
					<div class="col-md-4">
						<label class="mb-0">Tanggal Pulang	</label><i class="color-red pl-2" style="font-size: 12px;"> // maksimal 3 hari</i>
						<input type="date" name="tanggalpulang" required class="form-control-custom ml-3">
						<span>
							<?= $this->session->flashdata('message'); ?>
						</span>
					</div>
				</div>

				<hr style="background-color:grey;">

				<label class="pb-3"><h3 style="color: #003399">Data Kelompok</h3></label>
				<input type="hidden" name="kode" value="<?= $kode;?>">
				<input type="hidden"  name="kodekmpk" value="<?= $kodeklp?>">
				<input type="hidden"  name="kodeketua" value="<?= $kodeket?>">
				<div class="row">
					<div class="col-md-4 text-right">
						Nama Kelompok
					</div>
					<div class="col-md-7" >
						<input type="text" name="namakelompok" required class="form-control-custom mb-1" >
					</div>
				</div>


				<label class="pb-3"><h4>Data Ketua Kelompok</h4></label>
				<div class="row">
					<div class="col-md-4 text-right">
						Nama Ketua
					</div>
					<div class="col-md-7" >
						<input type="text" name="namaketua" required class="form-control-custom mb-1" >
					</div>
				</div>
				
				<div class="row">
					<div class="mt-1 col-md-4 text-right">
						No KTP
					</div>
					<div class="col-md-7" >
						<input type="text" name="noktp" required class="form-control-custom mb-1" >
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 text-right mt-1 mb-1">
						Jenis Kelamin
					</div>
					<div class="col-md-7" >
						<input type="radio" name="jeniskelamin" required value="1" class="ml-3">Laki Laki
						<input type="radio" name="jeniskelamin" required value="2" class="ml-5 mb-3 mt-2">Perempuan <br>	
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 text-right mt-1">
						Tanggal Lahir
					</div>
					<div class="col-md-7" >
						<input type="date" name="tanggallahir" required class="form-control-custom mb-1" >
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 text-right mt-1">
						Alamat Ketua
					</div>
					<div class="col-md-7" >
						<textarea type="text" name="alamatketua" required class="form-control-custom mb-1" ></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 text-right mt-1">
						Email
					</div>
					<div class="col-md-7" >
						<input type="email" name="email" required class="form-control-custom mb-1" >
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 text-right mt-1">
						Telepon
					</div>
					<div class="col-md-7" >
						<input type="text" name="telepon" required class="form-control-custom mb-1" >
					</div>
				</div>
				<hr style="background-color:#ff9900;" class="mt-0 mb-1">
				
				<div class="row">
					<div class="col-md-4 text-right" style="color:#ff6600;">
						Kontak Darurat
					</div>
					<div class="col-md-7" >
						<input type="text" name="kontakdarurat" required class="form-control-custom mb-1" >
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 text-right mt-1" style="color:#ff6600;">
						Nama Kerabat
					</div>
					<div class="col-md-7" >
						<input type="text" name="namakontak" required class="form-control-custom mb-1" >
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 text-right mt-1" style="color:#ff6600;">
						Hubungan Kerabat
					</div>
					<div class="col-md-7" >
						<input type="text" name="hubungan" required class="form-control-custom mb-1" >
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 text-right mt-1" style="color:#ff6600;">
						Alamat Kerabat
					</div>
					<div class="col-md-7" >
						<textarea type="text" name="alamatkerabat" required class="form-control-custom mb-1" ></textarea>
					</div>
				</div>

				<br>
				<p class="text-center" style="font-size: 15px; color: #666;">Pastikan alamat email benar karena konfirmasi booking pendakian akan dikirim ke alamat email yang anda gunakan untuk pendaftaran booking online, apabila tidak ada pesan pemberitahuan pada kotak masuk gmail harap periksa pada spam.</p>

				<br>

				<hr style="background-color:grey;" class="mb-0">
				<hr style="background-color:grey;" class="mt-1">

				<label class="pb-3"><h4>Data Anggota 1</h4></label>

				<div class="row">
					<div class="col-md-4 text-right mt-1">
						Nama 
					</div>
					<div class="col-md-7" >
						<input type="text" name="namaanggota[]" required class="form-control-custom mb-1" >
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 text-right mt-1">
						Tanggal Lahir
					</div>
					<div class="col-md-7" >
						<input type="date" name="tanggallahiranggota[]" required class="form-control-custom mb-1" >
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 text-right mt-1 mb-1">
						Jenis Kelamin
					</div>
					<div class="col-md-7" >
						<!-- <input type="radio" name="jeniskelaminanggota[]" required value="1" class="ml-3">Laki Laki
							<input type="radio" name="jeniskelaminanggota[]" required value="2" class="ml-5 mb-3 mt-2">Perempuan <br -->
							<select name="jeniskelaminanggota[]" class="form-control-custom mb-1" title="Pilih Gen"> 
								<option value="">Pilih Gen</option>
								<option value="0">Laki Laki</option>
								<option value="1">Perempuan</option>
							</select>	
						</div>
					</div>

					<div class="row">
						<div class="mt-1 col-md-4 text-right">
							No KTP
						</div>
						<div class="col-md-7" >
							<input type="text" name="noktpanggota[]" required class="form-control-custom mb-1" >
						</div>
					</div>

					<div class="row">
						<div class="mt-1 col-md-4 text-right">
							Alamat
						</div>
						<div class="col-md-7" >
							<textarea name="alamatanggota[]" required class="form-control-custom mb-1"></textarea>
						</div>
					</div>

					<div class="row">
						<div class="mt-1 col-md-4 text-right">
							Telepon
						</div>
						<div class="col-md-7" >
							<input type="text" name="teleponanggota[]" required class="form-control-custom mb-1" >
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div id="insert-form"></div>
						</div>
					</div>

					<div class="row pt-1">
						<div class="col-md-11">
							<button type="button" id="btn-tambah-form" class="float-right">Tambah Anggota</button>
						</div>
					</div>
					<input type="hidden" name="jumlahanggota" id="jumlah-form" value="1">

					<div class="row">
						<div class="col-md-11">
							<button type="submit" class="btn btn-primary mt-2  float-right">SIMPAN</button>
						</div>
					</div><br>

				</form>
			</div>
		</div>
	</div>

</div>


<script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
			
			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert-form").append("<label class='pb-3'><h4>Data Anggota "+ nextform+"</h4></label>"+

				"<div class='row'>"+
				"<div class='col-md-4 text-right mt-1'>"+
				"Nama "+
				"</div>"+
				"<div class='col-md-7' >"+
				"<input type='text' name='namaanggota[]' required class='form-control-custom mb-1' >"+
				"</div>"+
				"</div>"+

				"<div class='row'>"+
				"<div class='col-md-4 text-right mt-1'>"+
				"Tanggal Lahir"+
				"</div>"+
				"<div class='col-md-7' >"+
				"<input type='date' name='tanggallahiranggota[]' required class='form-control-custom mb-1' >"+
				"</div>"+
				"</div>"+

				"<div class='row'>"+
				"<div class='col-md-4 text-right mt-1 mb-1'>"+
				"Jenis Kelamin"+
				"</div>"+
				"<div class='col-md-7' >"+
				/*"<input type='radio' name='jeniskelaminanggota[]' required value='1' class='ml-3'>Laki Laki"+
				"<input type='radio' name='jeniskelaminanggota[]' required value='2' class='ml-5 mb-3 mt-2'>Perempuan <br>	"+*/
				"<select name='jeniskelaminanggota[]'' class='form-control-custom mb-1' title='Pilih Gen'"+ 
				"<option value=''>Pilih Gen</option>"+
				"<option value='0'>Laki Laki</option>"+
				"<option value='1'>Perempuan</option>"+
				"</select>"+
				"</div>"+
				"</div>"+

				"<div class='row'>"+
				"<div class='mt-1 col-md-4 text-right'>"+
				"No KTP"+
				"</div>"+
				"<div class='col-md-7' >"+
				"<input type='text' name='noktpanggota[]' required class='form-control-custom mb-1' >"+
				"</div>"+
				"</div>"+

				"<div class='row'>"+
				"<div class='mt-1 col-md-4 text-right'>"+
				"Alamat"+
				"</div>"+
				"<div class='col-md-7' >"+
				"<textarea name='alamatanggota[]' required class='form-control-custom mb-1'></textarea>"+
				"</div>"+
				"</div>"+

				"<div class='row'>"+
				"<div class='mt-1 col-md-4 text-right'>"+
				"Telepon "+
				"</div>"+
				"<div class='col-md-7' >"+
				"<input type='text' name='teleponanggota[]' required class='form-control-custom mb-1' >"+
				"</div>"+
				"</div>"
				);

				$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
			});

		
	});
</script>

<script type="text/javascript">
	function mulaiHitung(){
		Interval = setInterval("hitung()",1);
	}
	function hitung(){
		kap_harga  	=parseInt(document.getElementById("kap_harga").value);
		kap_hari	=parseInt(document.getElementById("kap_hari").value);
		tambahhari  =5000 ;
		kap_totalbayar 	= kap_harga + (kap_hari*tambahhari);
		document.getElementById('kap_totalbayar').value = kap_totalbayar;
	}
	function berhentiHitung(){
		clearInterval(Interval);
	}
</script>

