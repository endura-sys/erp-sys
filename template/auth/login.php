<?php include('../header.php'); ?>
<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<body>
  <div id="auth">

      <div class="row h-100">
          <div class="col-lg-8 col-12">
              <div id="auth-left">
                  <div class="auth-logo">
                      <a href="index"><img src="template/assets/images/logo/sake_logo.png" alt="Logo will appear here"></a>
                  </div>
                  <h1 class="auth-title">Log in</h1>
                  <p class="auth-subtitle mb-5">Log in with the data provided by the Company</p>

                  <form method="post" action="login">
                    <!-- Error Display -->
                    	<?php include('errors.php'); ?>
                    <!-- Error Display -->
                      <div class="form-group position-relative has-icon-left mb-4">
                          <input type="text" name="username" class="form-control form-control-md" placeholder="Username" style="font-size: 1rem;">
                          <div class="form-control-icon">
                              <i class="bi bi-person"></i>
                          </div>
                      </div>
                      <div class="form-group position-relative has-icon-left mb-4">
                          <input type="password" name="password" class="form-control form-control-md" placeholder="Password" style="font-size: 1rem;">
                          <div class="form-control-icon">
                              <i class="bi bi-shield-lock"></i>
                          </div>
                      </div>
                      <!-- <div class="text-lg fs-6">
                          <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a></p>
                      </div> -->
                      <!-- Login Button -->
                      <button class="btn btn-primary btn-block btn-md shadow-lg mt-4" name="login_user">Log in</button>
                      <!-- Login Button -->
                  </form>
              </div>
          </div>
          <div class="col-lg-4 d-none d-lg-block">
              <div id="auth-right">
                <div class="title-erp">
                  Enterprise Resource Planning System
                </div>

              </div>
          </div>
      </div>

  </div>
</html>
