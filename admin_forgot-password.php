<?php
include_once './admin/config.php';


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if (isset($_POST['resetPass'])) {
    $email = $_POST['email'];
    $check_email = mysqli_query($conn, "SELECT * FROM `admin` WHERE email= '$email' ");
    $res = mysqli_num_rows($check_email);

    if ($res > 0) {
      // $resetToken = bin2hex(random_bytes(16)); // Generate a reset token
      $resetToken = rand(9087, 34576);
      $_SESSION['reset_token']= $resetToken;
        // Store the token and its expiration time in the database
        // Example query: UPDATE admin SET reset_token = '$resetToken', reset_token_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = '$email'
        $updateTokenQuery = "UPDATE admin SET reset_token = '$resetToken', reset_token_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = '$email'";
        mysqli_query($conn, $updateTokenQuery);

        $to = $email;
        $subject = "Reset Password";

        // Headers for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Your HTML and CSS content
        $message = "
        <html>
        <head>
          <style>
            body {
              font-family: Arial, sans-serif;
              background-color: #f4f4f4;
              color: #333;
            }
            .container {
              max-width: 500px;
              margin: 0 auto;
              padding: 20px;
              background-color: #fff;
              border-radius: 5px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
          </style>
        </head>
        <body>
          <div class='container'>
            <p>You are receiving this email because we received a password reset request for your account.</p>
            <p>If you did not request a password reset, no further action is required.</p>
            <p>Here is your password reset Link <b><a href=\"http://localhost/LandmarkTutors/admin_reset-password?resetPass=" . $resetToken . "\"></a></b></p>
          </div>
        </body>
        </html>
        ";

        // Additional headers
        $headers .= "From: LandmarkTutors.org" . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            $emailErr = "
                <div class='alert alert-info alert-dismissible'>
                We've sent a reset link to your email - $email
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
                ";
        } else {
            echo "Failed to send email notification to the user.";
        }
    } else {
        $emailErr = "<div class='alert alert-danger alert-dismissible'>
      $email - We don't recognize this email!!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    }
}
?>

<?php include_once 'head.php'; ?>
  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <!-- <span class="text-danger"><?php echo isset($status)? $status: ""?></span> -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
          
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder"> <i class="fa fa-book me-3"></i>LandmarkTutors</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Forgot Password? 🔒</h4>
              <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
              <form id="formAuthentication" class="mb-3" action="#" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <span class="text-danger"><?php echo isset($emailErr)? $emailErr: ""?></span>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    
                  />
                </div>
                <button name="resetPass" class="btn btn-primary d-grid w-100">Send Reset Link</button>
              </form>
              <div class="text-center">
                <a href="./login" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
