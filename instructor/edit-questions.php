<?php  include_once 'head.php'; ?>
<?php 
       if(isset($_POST['update_question'])){
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Past Questions /</span> Edit past-questions </h4>
             
            
                              
              <!-- Examples -->
              <div class="mx-1 row mb-5">
              <?php  
              $questionsId = $_GET['id'];
		$sql= $conn->query(" SELECT * FROM `past-questions` WHERE questionsId='$questionsId' ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                 <span class="text-success" id="timeoutMessage"  ><?php echo isset($status)? $status: ""?></span>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit Past-question</h5>
                    </div>
                    <div class="card-body">
                      <form action="" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="questionsId" value="<?php echo $row['questionsId'] ?>">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Questions Title</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              value="<?php echo $row['title'];   ?>"
                              name="title"
                              required
                            />
                          </div>
                        </div>
                        
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Brief Course Introduction</label>
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
                          <label class="form-label" for="basic-icon-default-phone">Course Picture</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="file"
                              id="upload"
                              class="form-control"
                              name="coursePic"
                              value="<?php echo $row['coursePic'];?>"
                              required
                            />
                          </div>
                          <div class="form-text"><?php echo $row['coursePic'];?></div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Course Note</label>
                          <div class="input-group input-group-merge">
                          <input
                              type="file"
                              id="upload"
                              class="form-control"
                              name="pdfFile"
                              value="<?php echo $row['pdfFile'];?>"
                              placeholder="<?php echo $row['pdfFile'];?>"
                              required
                            />
                          </div>
                          <?php echo $row['pdfFile'];?>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Price</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              value="<?php echo $row['fee'];?>"
                              name="fee"
                              required
                            />
                          </div>
                        </div>
                        <button type="submit" href="" name="update_question" class="btn btn-primary">Update</button>
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
