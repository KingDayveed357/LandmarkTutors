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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transactions Details </h4>
              <!-- <div class="row">
             <h6>Dashboard</h6>
             <h6>Transaction History</h6>
             </div> -->
              <div class="container">
              <a href="transactions" class='btn rounded-pill btn-outline-primary bx bx-left-arrow-alt mb-4 '>Back</a>
               
               <?php $transactionId = $_GET['transactionId'];
		$sql= $conn->query(" SELECT * FROM transactions WHERE transactionId='$transactionId' ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
               <div class="card">
                <div class="card-header bg-light ">
                <div class="row ">
                <div class="col-md-10 ">
                <span class="text-muted">Amount Paid</span>
                <div style="display: flex; gap: 10px;">
                <h3>&#8358;<?php echo $row['course_amount'] ?>.00  </h3> 
                <?php if ($row['payment_status'] === "PAID") { ?>
                            <span class="badge bg-label-success me-1 my-auto"> <?php echo $row['payment_status'] ?></span>
                        <?php  }else{ ?>
                          <span class="badge bg-label-warning me-1 my-auto"> <?php echo $row['payment_status'] ?></span>
                        <?php } ?>
               
                </div>
                </div>
                <div class="col-md-2  m-auto">
                <button class="btn btn-primary" onclick="printReceiptCard('<?php echo $transactionId; ?>')"><i class="bx bx-printer"></i> Print</button>
                </div>
                </div> 
                </div>
                <div class="card-body pt-4">
                <div class="row">
                <div class="col-lg-6 " style="border-right: 1px solid #E5E5E5;">
                 <h5 class="mb-4">Payment Information</h5>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Initialized Amount</h6>
                    </div>
                    <div class="col-md-6">
                    <h6>&#8358;<?php echo $row['course_amount'] ?>.00</h6>
                  </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Expected Amount</h6>
                    </div>
                    <div class="col-md-6">
                    <h6>&#8358;<?php echo $row['course_amount'] ?>.00</h6>
                  </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Date Initialized</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['date'] ?></h6>
                  </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Payment Date</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['date'] ?></h6>
                  </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Payment Description</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['course_description'] ?></h6>
                  </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Transaction Reference</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['transactionReference'] ?></h6>
                  </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Payment Reference</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['paymentReference'] ?></h6>
                  </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Payment Gateway</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['payment_method'] ?></h6>
                  </div>
                 </div>
                 <div class="row mt-3 mb-5">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Course Category</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['course_category'] ?></h6>
                  </div>
                 </div>
                </div>
                <div class="col-lg-6 customer" id="customer">
                <h5 class="mb-4 ">Customer Information</h5>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Customer Name</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['customer_name'] ?></h6>
                  </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-md-6 ">
                    <h6 class='text-muted'>Customer Email</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['customer_email'] ?></h6>
                  </div>
                 </div>
                 <div class="row mt-3">
                  <div class="col-md-6">
                    <h6 class='text-muted'>Customer Phone No</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['customer_phone'] ?></h6>
                  </div>
                 </div>
                 <div class="row mt-3 ">
                  <div class="col-md-6 ">
                    <h6 class='text-muted'>Customer Id</h6>
                    </div>
                    <div class="col-md-6">
                    <h6><?php echo $row['studentId'] ?></h6>
                  </div>
                 </div>
                </div>
                </div>
                </div>
            <!-- Examples -->
            
        </div>
        <?php }}?>
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

    <script>
    function printReceiptCard(transactionId) {
        let printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Print Transaction History</title>');
        printWindow.document.write('</head><body>');
        
        // Fetch the content of printable_receipt.php using AJAX
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                printWindow.document.write(this.responseText);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            }
        };
        xhttp.open("GET", "printable_receipt.php?transactionId=" + transactionId, true);
        xhttp.send();
    }
</script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php  include_once 'scripts.php'; ?>
  </body>
</html>
