<?php  include_once 'head.php';
 if (isset($_POST['send_review'])) {
    include_once 'review-process.php' ;
 }
    ?>

  <body>
    <!-- Layout wrapper -->
    <?php  include_once 'sidebar.php';?>
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            <!-- Navbar -->
            <?php  include_once 'navbar.php';?>
          <!-- / Navbar -->

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
          <div class="col-md-10">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Reviews </span></h4>
              </div>
           </div>      

              <!-- Examples -->
            <!-- <div class="container row mb-5"> -->
            <?php  $studentId=$_SESSION['studentId'];
							$sql= $conn->query(" SELECT * FROM student WHERE studentId='$studentId'");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
           
            <div class="row mb-5">
            <span class="text-success" id='timeout-message'><?php echo isset($status)? $status: ""?></span>
            <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Say Something Nice about us</h5>
                    </div>
                    <div class="card-body">
                      <form action="reviews.php" method="POST">
                        <!-- <input type="hidden" name="studentId" value="<?php echo $studentId ?>"> -->
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Your Review</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"
                              ><i class="bx bx-comment"></i
                            ></span>
                            <textarea
                              id="basic-icon-default-message"
                              class="form-control"
                              placeholder="Hi, Do you have a moment to talk <?php echo $row['name']?>"
                              aria-label="Hi, Do you have a moment to talk Joe?"
                              aria-describedby="basic-icon-default-message2"
                              rows="7"
                              name="review"
                              required
                            ></textarea>
                          </div>
                        </div>
                        <button type="submit" name="send_review" class="btn btn-primary">Send</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php }} ?>
   
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
    <?php  include_once 'scripts.php'; ?>
    
    <script src="api.js"></script>
  </body>
</html>
