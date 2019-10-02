    
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header pl-5">
        <h5 class="pl-5 ml-5 pb-0 color-white" >Registrasi Admin Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" method="post" action="<?= base_url('cloginadmin/registdashboard'); ?>">

          <div class="form-group">
            <input type="hidden" name="_kode" value="<?= $kodeadm ?>">
            <input type="text" class="form-control form-control-user font-template" id="username" name="username" placeholder="Enter your username ..." value="<?= set_value('username') ?>">
            <?= form_error('username','<small class="text-danger bold pl-4">','</small>'); ?>
          </div>

          <div class="form-group">
            <input type="email" class="form-control form-control-user font-template" id="email"
            name="email" placeholder="Enter your email ...">
            <?= form_error('email','<small class="text-danger bold pl-4">','</small>'); ?>
          </div>

          <div class="form-group">
            <input type="password" class="form-control form-control-user font-template" id="password1" placeholder="Password ..." name="password1">
          </div>
          <?= form_error('password1','<small class="text-danger bold pl-4">','</small>'); ?> 

          <div class="form-group">
            <input type="password" class="form-control form-control-user font-template" id="password2" placeholder="Repeat password ..." name="password2">
          </div>

          <button type="submit" class="btn btn-primary btn-user btn-block">
            Daftar Sekarang
          </button>
          <div class="text-center">
            <a class="small" href="<?= base_url('cloginadmin');?>">Login !</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Data Admin</h3>
</div>

<div class="container">
  <div class="row pb-2 ml-5 pl-5">
    <div class="col-md-9">
      <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="col-md-2">
      <button type="button" class="" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Tambah Baru</button>
    </div>
  </div>
</div>

<div  class="table-responsive col-md-10 offset-md-1">
  <table id="myTable" class="table table-striped table-bordered table-hover table-sm table-bordered">
    <thead class="bg-purple1 color-white">
      <tr class="text-center">
        <th>No</th>
        <th>Id</th>
        <th>Nama</th>
        <th>Email</th>
        <th>status</th>
        <th>OPSI</th>
      </tr>
    </thead>

    <tbody >
      <?php 
      $no=1;
      $status=['<span class="badge badge-success">Aktif</span>','<span class="badge badge-danger">Tidak Aktif</span>'];
      foreach ($tampiladmin as $adm) {
        ?>
        <tr>
          <td class="text-center"><?= $no++; ?></td>
          <td class="text-center"><?= $adm ['adm_id']; ?></td>
          <td><?= $adm ['adm_nama']; ?></td>
          <td><?= $adm ['adm_email']; ?></td>
          <td class="text-center"><?= $status[$adm ['is_active']]; ?></td>
          <td class="text-center">

            <?php if ($adm['is_active']==1){ ?>
              <a href="<?= base_url('cdashboard/aktivkan_admin/')?><?= $adm['adm_id'] ?>" class="btn btn-primary pb-0 pt-0"title="Aktivkan <?= $adm['adm_nama'] ?>" >Aktivkan</a>
            <?php }else{?>
              <a href="<?= base_url('cdashboard/blokir_admin/')?><?= $adm['adm_id'] ?>" class="btn btn-dark pb-0 pl-4 pr-4 pt-0" title="Blokir <?= $adm['adm_nama'] ?>">Blokir</a>
            <?php } ?>
            <a href="<?= base_url('cdashboard/edit_adm/')?><?= $adm['adm_id'] ?>" class="btn btn-info pb-0 pt-0" >Edit</a>
            <a href="<?= base_url('cdashboard/hapus_data_admin/') ?><?= $adm['adm_id'] ?>" class="btn btn-danger pb-0 pt-0" title="Hapus" onclick="return confirm('yakin ?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>