<?php  include_once 'head.php';
   
    if(isset($_GET['id'])){
      $studentId= $_GET['id'];
      if($_GET['status']=='delete'){
      //? delete user account
      $sql=$conn->query("DELETE FROM `student` WHERE studentId='$studentId'");
      header('Location: students'); 
      } }
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
            <div class="row">
          <div class="col-md-9">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Students /</span> Manage Students</h4>
              </div>
             
                      
                    </div>
           
              <!-- Examples -->
              <div class="container row mb-5">

                <span class="text-success" id="timeoutMessage"><?php echo isset($status)? $status: ""?></span>
              <div class="card">
                <div class="table-responsive p-5 text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <!-- <th>Course</th> -->
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 ">
                    <?php 
		$sql= $conn->query(" SELECT * FROM student ORDER BY id DESC ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['name'] ?></strong></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <!-- <td><span class="badge bg-label-primary me-1"></span></td> -->
                        <td style="display: flex; gap: 7px;">
                        <?php if($row['status']=='active'){?>
                            <a href= "ban_students.php?status&id=<?php echo
                            $row['studentId']; ?>&status=active" class="btn btn-outline-warning btn-sm">Ban</a>
                            <?php }else{ ?>
                            <a href="ban_students.php?status&id=<?php echo
                            $row['studentId']; ?>&status=banned" class="btn btn-info btn-sm">Unban</a>
                            <?php } ?>
                         
                            <button
                          type="button"
                          class="btn btn-outline-danger btn-sm"
                          data-bs-toggle="modal"
                          data-bs-target="#smallModal"
                        >
                        Delete
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
                                <p class="mt-4">Are you sure you want to delete this <br/> student account?</p>
                             <small class="text-muted">Once you delete, it can't be recovered</small>
                            </div>
                            <div class="mb-4  text-center" >
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                              </button>
                              <a  href="students.php?id=<?php echo $row ['studentId']; ?>&status=delete" class=" btn btn-danger">Yes, delete it</a>
                            </div>
                          </div>
                        </div>
                        </td>
                      </tr>
                      <?php }} else {  ?>
              
                        </div>
              <h3 colspan='6' class="text-bold">
              <span style="color:red;"> No student available!!</span>
              </h3>
              <?php } ?>
                    </tbody>
                  </table>
                </div>
                </div>
                </div>
               

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


    <?php  include_once 'scripts.php'; ?>
  </body>
</html>
