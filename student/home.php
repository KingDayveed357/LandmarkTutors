<?php  include_once 'head.php'; ?>

  <body>
  <?php  include_once 'sidebar.php';?> 
        <!-- Layout container -->
        <div class="layout-page">
        <?php  include_once 'navbar.php';?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <span class="text-success" id="timeoutMessage"  ><?php echo isset($status)? $status: ""?></span>
              <div class="row">
                <div class="col-lg-4 mb-4">
                      <div class="card ">
                        <div class="card-body ">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                           
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="courses">View More</a>
                               
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Lecture Note</span>
                          <h3 class="card-title mb-2"><?php   
                         
                          echo 
                    $conn->query("SELECT * FROM `course-note`  ") ->num_rows;?></h3>
                          <small class="text-muted fw-semibold"></i> Courses</small>
                        </div>
                        </div>
                      </div>
                    
                    <div class="col-lg-4 mb-4">
                      <div class="card">
                        <div class="card-body ">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="past-questions">View More</a>
                              
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold">Past Questions</span>
                          <h3 class="card-title text-nowrap mb-1"><?php echo 
                    $conn->query("SELECT * FROM `past-questions`") ->num_rows;?></h3>
                          <small class="text-muted"> Courses</small>
                        </div>
                      </div>
                    </div>
                  
                    <div class="col-lg-4 mb-4">
                      <div class="card">
                        <div class="card-body ">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="video-lectures">View More</a>
                              
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold">Video Lectures</span>
                          <h3 class="card-title text-nowrap mb-1"><?php 
                          echo 
                    $conn->query("SELECT * FROM `video-lectures` ") ->num_rows;?></h3>
                          <small class="text-muted"> Courses</small>
                        </div>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                <div class="col-lg-4 mb-4">
                      <div class="card ">
                        <div class="card-body ">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                           
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="students">View More</a>
                               
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">My Courses</span>
                          <h3 class="card-title mb-2"><?php 
                          $studentId = $_SESSION['studentId'];
                          echo  $conn->query("SELECT * FROM `my_courses` WHERE studentId='$studentId'") ->num_rows ;?>
                        </h3>
                          <small class="text-muted fw-semibold"></i>Purchased courses</small>
                        </div>
                        </div>
                      </div>
                    
                    <!-- <div class="col-lg-4 mb-4">
                      <div class="card">
                        <div class="card-body ">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="instructor">View More</a>
                              
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold">Registered Instructors</span>
                          <h3 class="card-title text-nowrap mb-1"><?php echo 
                    $conn->query("SELECT * FROM `instructor`") ->num_rows;?></h3>
                          <small class="text-muted"> Tutors</small>
                        </div>
                      </div>
                    </div> -->
                  
                    <div class="col-lg-4 mb-4">
                      <div class="card">
                        <div class="card-body ">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="reviews">View More</a>
                              
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold">My Reviews</span>
                          <h3 class="card-title text-nowrap mb-1"><?php 
                           $studentId = $_SESSION['studentId'];
                           echo   $conn->query("SELECT * FROM `reviews` WHERE studentId='$studentId'") ->num_rows;?></h3>
                          <small class="text-muted"> Feedback</small>
                        </div>
                      </div>
                    </div>
                    </div>
            
            </div>
            </div>
            <!-- / Content -->

   
            <?php  include_once 'footer.php'; ?>
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

   
    <?php  include_once 'scripts.php'; ?>
  </body>
</html>
