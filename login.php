<?php  include_once 'head.php';
    require_once './admin/config.php' ;
    
    if(isset($_POST['login'])){
      include_once './admin/process.php';
   } 
   if(isset($_POST['instructor_login'])){
    include_once './instructor/process.php';
 } 
 if(isset($_POST['student_login'])){
  include_once './student/process.php';
} 

?>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Login -->
          <div class="text-left mb-2">
          <a href="./index" class="d-flex ">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to home
            </a>
            </div>
          <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-home"
                          aria-controls="navs-pills-justified-home"
                          aria-selected="true"
                        >
                          <i class="tf-icons bx bx-home"></i> Admin
                          
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-profile"
                          aria-controls="navs-pills-justified-profile"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-user"></i> Instructor
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-messages"
                          aria-controls="navs-pills-justified-messages"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-class"></i> Students
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                      <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                
                  <span class="app-brand-text demo text-body fw-bolder"><i class="fa fa-book me-1"></i>LandmarkTutors</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome Admin! 👋</h4>
              <p class="mb-4 text-danger">Unauthorised Access</p>

              <form id="formAuthentication" class="mb-3" action="login" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <span class="text-danger"><?php echo isset($emailErr)? $emailErr: ""?></span>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email "
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="./admin_forgot-password">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
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
               
                <div class="mb-3">
                  <button name="login" class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>
              <a href="./index" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to home
                </a>
            </div>
          </div>

                      </div>
                      <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                      <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                 
                  <span class="app-brand-text demo text-body fw-bolder"><i class="fa fa-book me-1"></i>LandmarkTutors</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome Instructor! 👋</h4>
              <p class="mb-4">Please sign-in to your account </p>

              <form id="formAuthentication" class="mb-3" action="login" method="POST">
              <span class="text-danger" id="timeoutMessage"  ><?php echo isset($instructorStatus)? $instructorStatus: ""?></span>
              <input type="hidden"class="form-control" name="verify"  />
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <span class="text-danger"><?php echo isset($emailErr)? $emailErr: ""?></span>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email "
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="instructor_forgot-password">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
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
               
                <div class="mb-3">
                  <button name="instructor_login" class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>
              <p class="text-center">
                <span>Become an instructor?</span>
                <a href="./register_instructor">
                  <span>Create an account</span>
                </a>
                
              </p>
            </div>
          </div>

                      </div>
                      <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                      <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                 
                  <span class="app-brand-text demo text-body fw-bolder"> <i class="fa fa-book me-1"></i>LandmarkTutors</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome Students 👋</h4>
              <p class="mb-4">Please sign-in to your account and start learning</p>
              <span class="text-danger" id="timeoutMessage" ><?php echo isset($studentStatus)? $studentStatus: ""?></span>
              <form id="formAuthentication" class="mb-3" action="login" method="POST">
              <input type="hidden"class="form-control" name="status"  />
                 
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <span class="text-danger"><?php echo isset($emailErr)? $emailErr: ""?></span>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email "
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="student_forgot-password">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
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
               
                <div class="mb-3">
                  <button name="student_login" class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <a href="./register_student">
                  <span>Create an account</span>
                </a>
              </p>
            </div>
          </div>

                      </div>
                    </div>
                  </div>
                </div>
              
          <!-- /Register -->
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
