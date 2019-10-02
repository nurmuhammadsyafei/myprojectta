<br>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form method="post" action="<?= base_url('cdashboard/act_edit_adm') ?>">
				<div class="row">
					<i>Nama</i>
					<input type="hidden" name="_id" value="<?= $adm['adm_id'] ?>" class="form-control-custom">
					<input type="text" name="_nama" value="<?= $adm['adm_nama'] ?>" class="form-control-custom">
				</div>
				<div class="row">
					<i>Email</i>
					<input type="text" name="_email" value="<?= $adm['adm_email'] ?>" class="form-control-custom">
					<button type="submit" class="badge badge-success mt-3 pl-3 pr-3 pt-2 pb-2"style="font-size:">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>