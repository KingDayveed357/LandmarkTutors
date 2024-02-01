<?php  include_once 'head.php'; ?>
 

 <?php 
        $questionsId = $_GET['questionsId'];
        $sql= $conn->query(" SELECT * FROM `past-questions` WHERE questionsId='$questionsId' ");
        if($sql->num_rows>0){
        while($row=$sql->fetch_assoc()){ 
     ?>
<?php
// Include Monnify API key, amount, and other configuration details
$monnifyApiKey = "MK_TEST_6BJ88Z40H6";
$amount = $row['fee'];
$currency = "NGN";
$reference = (string) time(); // Generate a unique reference
// Monnify contract and payment details
$contractCode = "0815048183";
$paymentDescription = $row['introMsg'];
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
          <div class="col-md-10">
              <h4 class="fw-bold py-3 "><span class="text-muted fw-light">Checkout /</span>Buy Past-Questions</h4>
              </div>         
</div>
                 
           
              <!-- Examples -->
              <div class="mt-4 px-sm-0 px-lg-5 mb-5">
              <span class="text-success" id="timeoutMessage"  ><?php echo isset($status)? $status: ""?></span>
              <?php  $questionsId = $_GET['questionsId'];
              $sql= $conn->query(" SELECT * FROM `past-questions` WHERE questionsId='$questionsId' ");
              if($sql->num_rows>0){
              while($row=$sql->fetch_assoc()){ 
              ?>
              <div class="row">
                <div class="col-md-7"  >
                <div class="payment" > 
                  <h4>Payment Method</h4> 
                  <p>Secured connection <i class="bx bx-lock text-dark"></i></p> 
                </div>
                <div  >
                  <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                <div class="accordion-item card">
                      <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-1"
                          aria-controls="accordionIcon-1"
                        >
                          Pay with Monnify
                        </button>
                      </h2>

                      <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                        <div class="accordion-body">
                      <form action="transaction.php" method="POST">
                      <input type="hidden" id="questionsId" value="<?php echo $row['questionsId']; ?>" name="questionsId">
                      <input type="hidden" id="course_category" value="<?php echo $row['course_category']; ?>" name="course_category">
                        <input type="hidden" id="course_title" value="<?php echo $row['title']; ?>" name="course_title">
                        <input type="hidden" id="course_description" value="<?php echo $row['introMsg']; ?>" name="course_description">
                        <input type="hidden" id="course_img" value="<?php echo $row['coursePic']; ?>" name="course_img">
                        <input type="hidden" id="payment_method" value="Monnify" name="payment_method">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Customer Full Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text"
                              class="form-control"
                              id="customerName"
                              name="customer_name"
                              required
                              placeholder="John Doe"
                              aria-label="John Doe"
                              aria-describedby="basic-icon-default-fullname2"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-email">Customer Email</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              id="customerEmail"
                              required
                              class="form-control"
                              name="customer_email"
                              placeholder="john.doe"
                              aria-label="john.doe"
                              aria-describedby="basic-default-email2"
                            />
                            <span class="input-group-text" id="basic-default-email2">@example.com</span>
                          </div>
                          <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-phone">Customer Phone No</label>
                          <input
                            type="text"
                            id="customerPhone"
                            required=""
                            name="phone"
                            class="form-control"
                            placeholder="08012345678"
                          />
                        </div>
                        <button type="button" onclick="payWithMonnify()"  class="btn btn-primary mt-2">Proceed</button>
                      </form>
                        </div>
                      </div>
                    </div>

                    <script>
        function payWithMonnify() {
          let questionsId = document.getElementById("questionsId").value;
          let course_category = document.getElementById("course_category").value;
          let customerName = document.getElementById("customerName").value;
          let customerMail = document.getElementById("customerEmail").value;
          let course_title = document.getElementById("course_title").value;
          let course_description = document.getElementById("course_description").value;
          let course_img = document.getElementById("course_img").value;  
          let payment_method = document.getElementById("payment_method").value;

            MonnifySDK.initialize({
                amount: <?php echo $amount; ?>,
                currency: "<?php echo $currency; ?>",
                reference: "<?php echo $reference; ?>",
                customerFullName: customerName,
                customerEmail: customerMail,
                apiKey: "<?php echo $monnifyApiKey; ?>",
                contractCode: "<?php echo $contractCode; ?>",
                paymentDescription: "<?php echo $paymentDescription; ?>",
                metadata: {
                    "name": customerName,
                },
                
                onLoadStart: function () {
                    console.log("loading has started");
                },
                onLoadComplete: function () {
                    console.log("SDK is UP");
                },

               onComplete: function (response) {
                console.log(response);

    // Check if the transaction was successful
    if (response.status === 'SUCCESS') {
        // Transaction was successful, you can perform further actions here

        // Retrieve additional information from the response if needed
        let transactionReference = response.transactionReference;
        let paymentReference = response.paymentReference;
        let paymentStatus = 'PAID';
        // Perform AJAX request or other actions based on the successful transaction
        $.ajax({
            type: 'POST',
            url: 'transaction.php', // Adjust the URL based on your project structure
            data: {
                    questionsId: questionsId,
                    course_category: course_category,
                    course_title: course_title,
                    course_description: course_description,
                    course_img: course_img,
                    customer_name: customerName,
                    customer_email: customerMail,
                    phone: document.getElementById("customerPhone").value,
                    amount: <?php echo $amount; ?>,
                    payment_method: payment_method,
                    paymentReference: paymentReference,
                    transactionReference: transactionReference,
                    payment_status:paymentStatus
                // Add other parameters as needed
            },
            success: function (response) {
                // Handle the success response from the server
                console.log(response);
                alert('Payment Completed Successfully'); window.location.replace('my_courses');
            },
            error: function (error) {
                // Handle the error response from the server
                console.error(error);
            }
        });
    } else if(response.status === 'PENDING') {
        // Transaction was successful, you can perform further actions here

        // Retrieve additional information from the response if needed
        let transactionReference = response.transactionReference;
        let paymentReference = response.paymentReference;
        let paymentStatus = 'PENDING';
        // Perform AJAX request or other actions based on the successful transaction
        $.ajax({
            type: 'POST',
            url: 'transaction.php', // Adjust the URL based on your project structure
            data: {
                    questionsId: questionsId,
                    course_category: course_category,
                    course_title: course_title,
                    course_description: course_description,
                    course_img: course_img,
                    customer_name: customerName,
                    customer_email: customerMail,
                    phone: document.getElementById("customerPhone").value,
                    amount: <?php echo $amount; ?>,
                    payment_method: payment_method,
                    transactionReference: transactionReference,
                    paymentReference:paymentReference,
                   payment_status:paymentStatus
                // Add other parameters as needed
            },
            success: function (response) {
                // Handle the success response from the server
                console.log(response);
                alert('Payment Completed Successfully'); window.location.replace('my_courses');
            },
            error: function (error) {
                // Handle the error response from the server
                console.error(error);
            }
        });
      }
    else {
        // Transaction was not successful, handle accordingly
        console.log("Transaction was not successful");
    }
},
                onClose: function (data) {
                    // Implement what should happen when the modal is closed here
                    console.log(data);
                   
                }
            });
          }
    </script>
                    <div class= "accordion-item card">
                      <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-2"
                          aria-controls="accordionIcon-2"
                        >
                        Pay with PayStack
                        </button>
                      </h2>

                      <div id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                        <div class="accordion-body">
                        <form action="transaction.php" method="POST" id="paymentForm">
                        <input type="hidden" id="questionsId" value="<?php echo $row['questionsId']; ?>" name="questionsId">
                      <input type="hidden" id="courseCategory" value="<?php echo $row['course_category']; ?>" name="course_category">
                        <input type="hidden" id="courseTitle" value="<?php echo $row['title']; ?>" name="course_title">
                        <input type="hidden" id="courseDescription" value="<?php echo $row['introMsg']; ?>" name="course_description">
                        <input type="hidden" id="courseImg" value="<?php echo $row['coursePic']; ?>" name="course_img">
                        <input type="hidden" id="paymentMethod" value="Paystack" name="payment_method">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Customer First Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text"
                              class="form-control"
                              id="first-name"
                              name="customer_name"
                              required
                              placeholder="John Doe"
                              aria-label="John Doe"
                              aria-describedby="basic-icon-default-fullname2"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-email">Customer Email</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              id="email"
                              required
                              class="form-control"
                              name="customer_email"
                              placeholder="john.doe"
                              aria-label="john.doe"
                              aria-describedby="basic-default-email2"
                            />
                            <span class="input-group-text" id="basic-default-email2">@example.com</span>
                          </div>
                          <div class="form-text">You can use letters, numbers & periods</div>
        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-phone">Customer Phone No</label>
                          <input
                            type="text"
                            id="customer_phone"
                            required=""
                            name="phone"
                            class="form-control"
                            placeholder="08012345678"
                          />
                        </div>
                        <button type="submit" onclick="payWithPaystack()"  class="btn btn-primary mt-2">Pay</button>
                      </form>
                        </div>
                      </div>
                    </div>
                    </div>
                    
                 <script>
                 const paymentForm = document.getElementById('paymentForm');
                  paymentForm.addEventListener("submit", payWithPaystack, false);
                function payWithPaystack(e) { 
               e.preventDefault();
               let questionsId = document.getElementById("questionsId").value;
          let course_category = document.getElementById("courseCategory").value;
          let customerName = document.getElementById("first-name").value;
          let customerMail = document.getElementById("email").value;
          let course_title = document.getElementById("courseTitle").value;
          let course_description = document.getElementById("courseDescription").value;
          let course_img = document.getElementById("courseImg").value;  
          let payment_method = document.getElementById("paymentMethod").value;


             let handler = PaystackPop.setup({
          key: 'pk_test_ab6dbc0c68d613974ff0401167287c5c934087c7', // Replace with your public key
         email: document.getElementById("email").value,
          amount: <?php echo $amount?> * 100,
         ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      let paymentReference = response.reference;
      let paymentStatus = "PAID" ;
      $.ajax({
                    type: 'POST',
                    url: 'transaction.php', // Adjust the URL based on your project structure
                    data: {
                      questionsId: questionsId,
                        course_category: course_category,
                        course_title: course_title,
                        course_description: course_description,
                        course_img: course_img,
                        customer_name: customerName,
                        customer_email: customerMail,
                        phone: document.getElementById("customer_phone").value,
                        amount: <?php echo $amount; ?>,
                        payment_method: payment_method,
                        paymentReference:paymentReference,
                        payment_status:paymentStatus
                    },
                });
    }
  });

  handler.openIframe();
}

                </script>
              
                </div>
                <div class=" mt-5">
                      <h4>Order Details</h4>
                    <div class="row">
                    <div class="col-md-2">
                    <img class="img-fluid " src="<?php echo $row['coursePic']; ?>" alt="">
                   </div>
                    <div class="col-md-10 mt-2 m-auto">
                    <h4><?php echo $row['title']; ?></h4>
                    <p><?php echo $row['introMsg']; ?></p>
                    
                    </div>
                   
                    </div>
                  </div>
                </div>
                <div class="col-md-5 ">
                <div class="">
                        <h3>Summary</h3>
                   <div >
                   <p>Price:  &#8358;<?php echo $row['fee']; ?>.00</p>
                   </div>
                   <p class="">Total: &#8358;<?php echo $row['fee']; ?>.00</p>
                   <p class="text-muted " style="font-size: 12px;">By completing your purchase you agree to these Terms of Service.</p>
                   
                   <a  class="btn btn-primary text-white">Terms and Conditions</a>
                    </div>
                </div>
              </div>
              </div>
              </div>
          
                </div>
                <?php }  } ?>
             
             
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
    <?php }  } ?>
<script src="https://js.paystack.co/v1/inline.js"></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php  include_once 'scripts.php'; ?>
  </body>
</html>
