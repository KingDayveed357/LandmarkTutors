  <!-- Navbar -->
  <?php $studentId=$_SESSION['studentId'];
							$sql= $conn->query(" SELECT * FROM student WHERE studentId='$studentId'");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
 <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center "
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
                <div class="nav-item d-flex  text-center align-items-center">
                  <h5 class="my-auto"> Welcome <?php  echo $row['name']?></h5>
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
    <img src="../assets/img/avatars/student-profile.png" alt class="w-px-40 h-5 rounded-circle" />
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
    <img src="../assets/img/avatars/student-profile.png" alt class="w-px-40 h-auto rounded-circle" />
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
                      <a class="dropdown-item" href="profile">
                        <i class="bx bx-user me-2"></i>
                        <span  class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="change-password">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <!-- <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li> -->
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout">
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