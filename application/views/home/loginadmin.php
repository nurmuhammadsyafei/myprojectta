<div class="bg">
  <div class="container" style="padding-top: 4.35%;padding-bottom: 4.35%">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-6">

        <div class="card o-hidden border-1 shadow-md my-5" style="background-color: rgba(255, 255, 255,0.8)">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-3 font-template bold">Login Admin</h1>
                  </div>

                  <?= $this->session->flashdata('message'); ?>

                  <form class="user" method="post" action="<?= base_url('cloginadmin'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-custom font-template" id="email" name="email" placeholder="Enter your username here ..." value="<?= set_value('email') ?>">
                      <?= form_error('email','<small class="text-danger pl-4">','</small>'); ?>

                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-custom font-template" id="password" 
                      name="password" placeholder="Enter your password here ...">
                      <?= form_error('password','<small class="text-danger pl-4">','</small>'); ?>

                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
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