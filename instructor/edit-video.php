<?php  include_once 'head.php'; ?>
<?php 
       if(isset($_POST['update_video'])){
        include_once 'update.php';
    } 
   
?>

  <body>
    <!-- Layout wrapper -->
    <?php  include_once 'sidebar.php';?>
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php  include_once 'navbar.php';?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Videos /</span> Edit Video </h4>
             
            
                              
              <!-- Examples -->
              <div class="container row mb-5">
              <?php  $id = $_GET['videoId'];
		$sql= $conn->query(" SELECT * FROM `video-lectures` WHERE videoId='$id' ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                  <span class="text-success" id="timeoutMessage"  ><?php echo isset($status)? $status: ""?></span>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit Video</h5>
                      <small class="text-muted float-end">Video Id #<?php echo $row['videoId'];   ?></small>
                    </div>
                    <div class="card-body">
                      <form action="" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="videoId" value="<?php echo $row['videoId'] ?>">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Video Title</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              value="<?php echo $row['name'];   ?>"
                              name="name"
                              required
                            />
                          </div>
                        </div>
                        
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Brief Introduction</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input
                              class="form-control p-4"
                              value="<?php echo $row['introMsg'];?>"
                              name="introMsg"
                              required
                            ></input>
                          </div>
                          <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Video Picture</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="file"
                              id="upload"
                              class="form-control"
                              required
                              name="videoPic"
                              value="<?php echo $row['videoPic'];?>"
                            />
                          </div>
                          <div class="form-text"><?php echo $row['videoPic'];?></div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Video Link</label>
                          <div class="input-group input-group-merge">
                          <input
                              type="text"
                              id="upload"
                              class="form-control"
                              name="videoLink"
                              value="<?php echo $row['videoLink'];?>"
                             
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Course Amount</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              class="form-control"
                              id="courseFee"
                              value="<?php echo $row['fee'];   ?>"
                              name="fee"
                              required
                            />
                          </div>
                        </div>
                        <button type="submit" href="" name="update_video" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
                <?php }} else {  ?>
              </div>
    
  
    <?php } ?>
              <!-- Examples -->
             
              
              </div>
             
              <!--/ Card layout -->
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
