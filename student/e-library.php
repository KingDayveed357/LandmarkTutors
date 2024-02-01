<?php  include_once 'head.php';

    ?>

  <body>
    <!-- Layout wrapper -->
    <?php  include_once 'sidebar.php';?>
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            <!-- Navbar -->
  <?php $studentId=$_SESSION['studentId'];
							$sql= $conn->query(" SELECT * FROM student WHERE studentId='$studentId'");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
  <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
               <i onclick="searchBook()" class="bx bx-search fs-4 lh-0"></i> 
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search for books"
                    aria-label="Search for books"
                    id="input"
                    onkeyup="searchBook()"
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
               

           <!-- User -->
           <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                    <?php if (empty($row['user_img'])) {
     ?>  
    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-5 rounded-circle" />
    <?php
 }else {
     ?> 
   
    <img src="<?php echo $row['user_img']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />
     <?php
 }
 ?>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                            <?php if (empty($row['user_img'])) {
     ?>  
    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
    <?php
 }else {
     ?> 
    <img src="<?php echo $row['user_img']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />
     <?php
 }
 ?>
                              
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $row['name'];   ?> </span>
                            <small class="text-muted">Student</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li >
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span  class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="change-password.php">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" >
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle"></span>
                      Log out
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
          <?php }} ?>
          <!-- / Navbar -->

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
          <div class="col-md-10">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">E-library /</span>View Books</h4>
              
              </div>
             
</div>
                

              <!-- Examples -->
        <div class="spinner-border spinner-border-lg text-primary" style="display:none" id="loader" role="status">
            <span class="visually-hidden" id="loader">Loading...</span>
        </div>
        <div id="display"></div>
              <!-- Examples -->
                  </div>
                  </div>
             
             
              <!--/ Card layout -->
            
            
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
    <script src="api.js"></script>
    <?php  include_once 'scripts.php'; ?>
    
  </body>
</html>
