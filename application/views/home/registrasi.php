<div class="bg">
 <div class="container" style="padding-top: 3.05%;padding-bottom: 3.05%">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-md-6">

      <div class="card o-hidden border-1 shadow-md"style="background-color: rgba(255, 255, 255,0.8)"  >
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-md">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4  text-gray-900 mb-3 font-template bold ">Registrasi Admin Baru</h1>
                </div>

                <?= $this->session->flashdata('message'); ?>

                <form class="user" method="post" action="<?= base_url('cloginadmin/registrasi'); ?>">

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
      </div>

    </div>

  </div>

</div>
</div>