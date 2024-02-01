<?php  
  
   
  //  require '../vendor/autoload.php';
   
   //Load Composer's autoloader
   
       if(isset($_POST['send'])){ 
        $messageId = rand(90876, 34576);
        $name = cleaninput($_POST['name']);
        $email = cleaninput($_POST['email']);
        $userSubject = cleaninput($_POST['subject']);
        $userMessage = cleaninput($_POST['message']);
        $date = date('Y-m-d');
        $to = 'davidaniago@gmail.com';
        $subject = $userSubject  ;  
       
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
            <p>$userMessage.</p>
          </div>
        </body>
        </html>
        ";

        // Additional headers
        $headers .= "From: LandmarkTutors.org" . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            $emailErr = "
                <div class='alert alert-info alert-dismissible'>
                We've received your message - we would get back to you shortly
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
                ";
                $sql = $conn->query("INSERT INTO `contact-messages` SET messageId='$messageId', name='$name', email='$email', subject='$subject', message='$userMessage', date='$date'");
        } else {
          $emailErr = "
          <div class='alert alert-info alert-dismissible'>
          Failed to send your message.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
          ";
        }

  }
  else{ 
    echo "Error in database query: " . $conn->error;
      }
  
?>
