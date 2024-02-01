<?php 
    require './admin/config.php' ;
  if(isset($_POST['register_instructor'])){
      include_once './instructor/process.php';
    } 
    ?>
    <?php  include_once 'head.php'; ?>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                   
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder"><i class="fa fa-book me-3"></i>LandmarkTutors</span>
                </a>
              </div>
              <!-- /Logo -->
              <span class="text-danger" id="timeoutMessage" ><?php echo isset($status)? $status: ""?></span>
              <h4 class="mb-2">Adventure starts here 🚀</h4>
              <p class="mb-4">Make learning easy and fun!</p>

              <form  class="mb-3" action="register_instructor.php"  method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <span class="danger" style="color: red; font-size: medium;"><?php echo isset($nameErr)? $nameErr:""?></span>
                  <input
                    type="text"
                    class="form-control"
                    name="name"
                    placeholder="Enter your username"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Course (Optional)</label>
                  <span class="danger" style="color: red; font-size: medium;"></span>
                  <input type="text" class="form-control"  name="course" placeholder="Course you teach" />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <span class="danger" style="color: red; font-size: medium;"><?php echo isset($emailErr)? $emailErr:""?></span>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Phone</label>
                  <span class="danger" style="color: red; font-size: medium;"><?php echo isset($phoneErr)? $phoneErr:""?></span>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="phone"
                    placeholder="Enter your Phone number"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <span class="danger" style="color: red; font-size: medium;"><?php echo isset($passErr)? $passErr:""?></span>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <!-- <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Confirm your Password</label>
                  <span class="danger" style="color: red; font-size: medium;"><?php echo isset($cpassErr)? $cpassErr:""?></span>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="cpass"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div> -->

                <!-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div> -->
                <button name="register_instructor" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="./login.php">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
