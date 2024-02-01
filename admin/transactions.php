<?php  include_once 'head.php';
         if(isset($_GET['transactionId'])){
          $transactionId= $_GET['transactionId'];
          if($_GET['status']=='delete'){
          //? delete user account
          $sql=$conn->query("DELETE FROM `transactions` WHERE transactionId='$transactionId'");
          header('Location: transactions.php'); 
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transactions </h4>
              <!-- <div class="row">
             <h6>Dashboard</h6>
             <h6>Transaction History</h6>
             </div> -->
              <div class="container">
              <h3>Transaction History</h3>
               <hr class="mb-4" />
                
               <div class="card">
                <h5 class="card-header">Latest Transactions</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Course Category</th>
                        <th>Customer</th>
                        <th>Amount Paid</th>
                        <th>Payment Status</th>
                        <th>Date/Time</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <?php 
		$sql= $conn->query(" SELECT * FROM transactions ORDER BY id DESC ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                    <tbody class="table-border-bottom-0">
                  
                      <tr>
                        <td>
                          <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong><?php echo $row['course_category'] ?></strong>
                        </td>
                        <td><?php echo $row['customer_email'] ?></td>
                       
                        <td>
                        &#8358;<?php echo $row['course_amount'] ?>
                        </td>
                        <td>
                          <?php if ($row['payment_status'] === "PAID") { ?>
                            <span class="badge bg-label-success me-1"> <?php echo $row['payment_status'] ?></span>
                        <?php  }else{ ?>
                          <span class="badge bg-label-warning me-1"> <?php echo $row['payment_status'] ?></span>
                        <?php } ?>
                        </td>
                        <td><?php echo $row['date'] ?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="transaction_details.php?transactionId=<?= $row['transactionId']; ?>&status=view"
                                ><i class="bx bx-edit-alt me-1"></i> View</a
                              >
                              
                              <a class="dropdown-item" href="transactions.php?transactionId=<?php echo $row ['transactionId']; ?>&status=delete"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>

                        </td>
                      </tr>
                    
                    </tbody>
                    <?php }}  else {  ?>
    <h5  class="text-bold text-center">
    <span style="color:red;">No Transactions yet!!</span>
    </h5>
    <?php }   ?>
                  </table>
                </div>
              </div>
              <!-- Examples -->
              
            </div>
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
  </body>
</html>
