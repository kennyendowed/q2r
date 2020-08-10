<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br /><br /><br /><br /><br /><br />
<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">
    <!-- Include Flash Data File -->
    <?php $this->load->view('_FlashAlert/flash_alert.php') ?>



    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image"  style="  background: url(assets/images/img-4.jpg);"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>

            <?= form_open('login',array('class'=>'form-horizontal')) ?>
                <div class="form-group">
                  <input type="text" name="studentreg" value="<?= set_value('studentreg'); ?>" class="form-control <?= (form_error('studentreg') == "" ? '':'is-invalid') ?>" placeholder="Student Registration ID">
                  <?= form_error('studentreg'); ?>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block" name="btn_add_course">
        <i class="fa fa-save"></i> Login
                                  </button>



              <div class="text-center">
                <a class="small" href="<?= base_url('registration') ?>">Create an Account!</a>
              </div>

          <?= form_close() ?>
              <hr>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
