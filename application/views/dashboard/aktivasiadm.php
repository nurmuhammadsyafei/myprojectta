<br>
<form method="post" action="<?= base_url('cdashboard/aktivkan') ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<label class="mb-0">Username</label>
				<button type="button" class="close" >
					<a href="<?= base_url('cdashboard/data_admin') ?>"><span aria-hidden="true">&times;</span></a>
				</button><br>
				<div class="ml-3 pl-2 pb-2 bold" readonly style="border-bottom:2px solid black">
					<?= $adm['adm_nama']?>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-6">
				<label class="mb-0">Email</label><br>
				<div class="ml-3 pl-2 pb-2 bold" readonly style="border-bottom:2px solid black">
					<?= $adm['adm_email']?>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-3">
				<label class="mb-0">Status</label><br>
				<div class="ml-3 pl-2 pb-2 bold" readonly style="border-bottom:2px solid black">
					<?php $active=['Aktif','Tidak Aktif'] ?>
					<?= $active[$adm['is_active']]	?>
				</div>
			</div>
			<input type="hidden" name="_adm_id" value="<?= $adm['adm_id']?>">
			<input type="hidden" name="_adm_nama" value="<?= $adm['adm_nama']?>">
			<input type="hidden" name="_adm_email" value="<?= $adm['adm_email']?>">
			<input type="hidden" name="_is_active" value="<?= $adm['is_active']?>">
			<div class="col-md-1 pt-2"><button type="submit" class="btn btn-primary pl-3 pr-3">Aktivkan</button></div>
		</form>
		<form method="post" action="<?= base_url('cdashboard/nonaktivkan') ?>">
			<input type="hidden" name="_adm_id" value="<?= $adm['adm_id']?>" >
			<div class="pl-4 pt-2">
				<button type="submit" class="btn btn-danger">non-Aktivkan</button>
			</div>
		</form>
	</div>
</div>