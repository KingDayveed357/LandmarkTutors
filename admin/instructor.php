<?php  include_once 'head.php';
    if(isset($_GET['instructorId'])){
      $instructorId= $_GET['instructorId'];
      if($_GET['status']=='delete'){
      //? delete user account
      $sql=$conn->query("DELETE FROM `instructor` WHERE instructorId='$instructorId'");
      header('Location: instructor'); 
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Instructors /</span> Manage Instructors</h4>
              </div>
              <div class="col-md-3">
              </div>
            </div>
              <!-- Examples -->
              <div class="container row mb-5">
              <div class="card">
   
                <div class="table-responsive p-5 text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 ">
                    <?php 
		$sql= $conn->query(" SELECT * FROM instructor ORDER BY id DESC ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['name'] ?></strong></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $row['course'] ?></span></td>
                        <td class='' style="display: flex;">
                        <?php if($row['verify']=='verified'){?>
                            <a href= "controller.php?verify&id=<?php echo
                            $row['instructorId']; ?>&verify=verified" class="btn btn-success btn-sm">Verified</a>
                            <?php }else{ ?>
                            <a href="controller.php?verify&id=<?php echo
                            $row['instructorId']; ?>&verify=pending" class="btn btn-info btn-sm">UnVerified</a>
                            <?php } ?>
                          
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">                  
                              <a href="instructor.php?instructorId=<?php echo $row ['instructorId']; ?>&status=delete" class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php }} else {  ?>
              
                        </div>
              <h3 colspan='6' class="text-bold">
              <span style="color:red;"> No Instructor available!!</span>
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
