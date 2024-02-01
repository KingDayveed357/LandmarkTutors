<?php  include_once 'head.php';
       if(isset($_GET['reviewId'])){
        $reviewId= $_GET['reviewId'];
        if($_GET['status']=='delete'){
        //? delete user account
        $sql=$conn->query("DELETE FROM `reviews` WHERE reviewId='$reviewId'");
        header('Location: reviews'); 
        } } 
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
             
<!-- </div> -->
                  
</div>
              <!-- Examples -->
            <!-- <div class="container row mb-5"> -->
          
           
            <div class="row mb-5">
            <span class="text-success" id='timeout-message'><?php echo isset($status)? $status: ""?></span>
            <?php  
							$sql= $conn->query("SELECT * FROM `reviews` ");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card">
                    <div class="card-header">    
                    <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar ">
                        
                    <!-- Account -->
                      <?php if (empty($row['profilePic'])) {
     ?>  
                        <img  src="../assets/img/avatars/student-profile.png" alt class="w-px-40 w-100  h-100  rounded-circle" />
     

    <?php
 } else {
     ?> 
     <input type="hidden" name="studentId" value="<?php echo $row['studentId'] ?>" >
     <img src="<?php echo $row['profilePic']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />
                      
     <?php
 }
?>
  
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $row['name'];   ?> </span>
                            <small class="text-muted"><?php echo $row['date'];   ?></small>
                          </div>
                        </div>    
     </div>
                    <div class="card-body">
                    <p class="card-text">
                      <?php echo $row['review']?>
                      </p>
                    <button
                          type="button"
                          class="btn btn-outline-secondary"
                          data-bs-toggle="modal"
                          data-bs-target="#smallModal"
                        >
                        Delete Review
                        </button>

                    <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header ">
                            
                                <h5 class="modal-title" id="exampleModalLabel2">Are you sure?</h5>
                                <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                ></button>
                                
                            </div>
                            <div class="modal-body text-center">
                                <img src="../assets/img/delete-img.png" style="width:45%" alt="">
                                <p class="mt-4">Are you sure you want to delete this review?</p>
                             <small class="text-muted">Once you delete, it can't be recovered</small>
                            </div>
                            <div class="mb-4  text-center" >
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                              </button>
                              <a  href="reviews.php?reviewId=<?php echo $row ['reviewId']; ?>&status=delete" class=" btn btn-danger">Yes, delete it</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              
                            </div>
            <?php }} else {  ?>
                  <h5 colspan='6' class="text-bold">
    <span style="color:red;"> No reviews available!!</span>
    </h5>
    <?php } ?>
   
              <!-- </div> -->


         
     
            
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
