<?php  include_once 'head.php'; ?>

  <body>
    <!-- Layout wrapper --> 
    <?php  include_once 'sidebar.php';?>
        <!-- Layout container -->
        <div class="layout-page">
        <?php  include_once 'navbar.php';?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Account Settings / </span> Change Password
              </h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="profile"
                        ><i class="bx bx-user me-1"></i> Account</a
                      >
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-notifications.php"
                        ><i class="bx bx-bell me-1"></i> Notifications</a
                      >
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"
                        ><i class="bx bx-link-alt me-1"></i> Change Password</a
                      >
                    </li>
                  </ul> 
</div>
</div>
                 
                  <div class="row">
                    <div class="col-md-8  mb-4">
                      <div class="card p-5">
                      <form id="formAuthentication" class="mb-3" action="change-password.php" method="POST">
                      <?php
if (isset($_POST['change_pass'])){
 $password = (cleanInput($_POST['password']));
 $newpass = (cleanInput($_POST['newpass']));
 $cnewpass = (cleanInput($_POST['cnewpass']));
 $email = $_SESSION['email'];

 $sql = $conn->query("SELECT email  AND password FROM instructor WHERE email='$email' AND password='$password' ");
 if($sql->num_rows>0){
     if($newpass === $cnewpass){
 $sql = $conn->query("UPDATE instructor SET password='$newpass' WHERE email='$email' AND password='$password' ");
 $status = '<div class="alert alert-success alert-dismissible" role="alert">
 You have successfully updated your password
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
  // JavaScript code to delay showing the warning message
  echo '<script>
  setTimeout(function(){
      document.getElementById("timeoutMessage").innerHTML = \'\';
  }, 6000);
  </script>';
//  echo 'You have successfully updated your password ';
}else {
  $status = '<div class="alert alert-danger alert-dismissible" role="alert">
  New Password and Confirm new Password must match!!
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
   
   // JavaScript code to delay showing the warning message
   echo '<script>
   setTimeout(function(){
       document.getElementById("timeoutMessage").innerHTML = \'\';
   }, 6000);
   </script>';
}
 }else {
  $status = '<div class="alert alert-danger alert-dismissible" role="alert">
   Wrong Password Details, Try again.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
   
   // JavaScript code to delay showing the warning message
   echo '<script>
   setTimeout(function(){
       document.getElementById("timeoutMessage").innerHTML = \'\';
   }, 6000);
   </script>';
   
 }
}
?>
 <span class="text-success" id="timeoutMessage"  ><?php echo isset($status)? $status: ""?></span>
                      <div class="mb-3">
                  <label for="email" class="form-label">Old Password</label>
                  <span class="text-danger"><?php echo isset($passErr)? $passErr: ""?></span>
                  <div class="mb-3 form-password-toggle">
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
                </div>
                <label for="email" class="form-label">New Password</label>
                  <span class="text-danger"><?php echo isset($passErr)? $passErr: ""?></span>
                <div class="mb-3 form-password-toggle">
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="newpass"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  
                </div>
                <label for="email" class="form-label">Confirm New Password</label>
                  <span class="text-danger"><?php echo isset($passErr)? $passErr: ""?></span>
                <div class="mb-3 form-password-toggle">
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="cnewpass"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  
                </div>

                <div class="mb-3">
                  <button name="change_pass" class="btn btn-primary d-grid w-100" type="submit">Save Changes</button>
                </div>
              </form>
              </div> </div>
                      </div>
                    </div>
                 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php  include_once 'footer.php'; ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php  include_once 'scripts.php'; ?>
  </body>
</html>
