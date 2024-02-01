<?php
include_once 'head.php';
// include "config.php";
if (isset($_GET['transactionId'])) {
    $transactionId = $_GET['transactionId'];

    $sql = $conn->query("SELECT * FROM transactions WHERE transactionId='$transactionId'");

    if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_assoc()) {
?>
         <div class="card">
                <div class="card-header bg-light ">
                <div class="row ">
                <div class="col-md-10 ">
                <span class="text-muted">Amount Paid</span>
                <div style="display: flex; gap: 10px;">
                <h3>&#8358;<?php echo $row['course_amount'] ?>.00  </h3> 
                <span class="badge bg-label-success me-1 my-auto"> Paid</span>
                </div>
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
                    <h6><?php echo $row['course_amount'] ?></h6>
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
<?php
        }
    }
}
?>
