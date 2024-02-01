<?php
include_once 'config.php';

// Get data from the AJAX request
$transactionId= mysqli_real_escape_string($conn, rand(100000 , 999999));
$course_category = $_POST['course_category'];
$course_title = $_POST['course_title'];
$course_description = $_POST['course_description'];
$course_img = $_POST['course_img'];
$customerName = $_POST['customer_name'];
$customerEmail = $_POST['customer_email'];
$phone = $_POST['phone'];
$amount = $_POST['amount']; // Adjust this based on your actual data structure
$payment_method = $_POST['payment_method']; 
$date = date("Y-m-d H:i:s");
$studentId=$_SESSION['studentId'];
$videoPic = $_POST['videoPic'];
$videoLink = $_POST['videoLink'];
$videoId = $_POST['videoId'];
$paymentReference = $_POST['paymentReference'];
$transactionReference = $_POST['transactionReference'];
$payment_status = $_POST['payment_status'];

$sql= $conn->query("INSERT INTO `transactions` SET transactionId='$transactionId', course_category='$course_category', course_title='$course_title', course_img='$course_img', course_description='$course_description', customer_name='$customerName', customer_email='$customerEmail', customer_phone='$phone', course_amount='$amount', payment_method='$payment_method', date='$date', paymentReference='$paymentReference', transactionReference='$transactionReference', payment_status='$payment_status' "); 
if ($sql) {
    if ($course_category == "past-question") {
        $questionsId = $_POST['questionsId'];
        $checkDuplicateSql = $conn->query("SELECT * FROM `my_courses` WHERE studentId='$studentId' AND courseId='$questionsId' ");
    
        if ($checkDuplicateSql->num_rows > 0) {
            echo "Error: The student has already purchased this course.";
        } else {
            $sql = $conn->query("SELECT * FROM `past-questions` WHERE questionsId='$questionsId'");
    
            if ($sql->num_rows > 0) {
                while ($row = $sql->fetch_assoc()) {
                    // Remove the following line as it overwrites $questionsId
                    // $questionsId = $_POST['questionsId'];
    
                    $tutorName = $row['tutor'];
                    $pdfFiles = $row['pdfFile'];
                    $profil = $row['profile'];
    
                    // Use the original $questionsId instead of the one from $_POST
                }
            }
            $questionSql = $conn->query("INSERT INTO `my_courses` SET courseId='$questionsId', tutor_name='$tutorName', course_category='$course_category',  course_name='$course_title', coursePic='$course_img', course_description='$course_description', amount='$amount', course_content='$pdfFiles', tutorProfile='$profil',  date='$date', studentId='$studentId' ");
        }
    }
    elseif($course_category == "lecture-note"){
          $courseId = $_POST['courseId'];
          $checkDuplicateSql = $conn->query("SELECT * FROM `my_courses` WHERE studentId='$studentId' AND courseId='$courseId'");
          if ($checkDuplicateSql->num_rows > 0) {
              echo "Error: The student has already purchased this course.";
          }else{
          $sql= $conn->query(" SELECT * FROM `course-note` WHERE courseId='$courseId'");
  if($sql->num_rows>0){
      while($row=$sql->fetch_assoc()){ 
              $tutor = $row['tutor'];
              $profil = $row['profile'];
              $pdfFile = $row['pdfFile'];    
          }  
      }
          $courseSql= $conn->query("INSERT INTO `my_courses` SET courseId='$courseId', tutor_name='$tutor', course_category='$course_category',  course_name='$course_title', coursePic='$course_img', course_description='$course_description', amount='$amount', course_content='$pdfFile', tutorProfile='$profil',  date='$date', studentId='$studentId' "); 
      }
    
    } else {
        $videoId = $_POST['videoId'];
        $checkDuplicateSql = $conn->query("SELECT * FROM `my_courses` WHERE studentId='$studentId' AND courseId='$videoId'");
        if ($checkDuplicateSql->num_rows > 0) {
            echo "Error: The student has already purchased this course.";
        }else{
        $sql= $conn->query(" SELECT * FROM `video-lectures` WHERE videoId='$videoId'");
if($sql->num_rows>0){
    while($row=$sql->fetch_assoc()){ 
            $tutors = $row['tutor'];
            $profil = $row['profile'];
        }  
    }
     $courseSql= $conn->query("INSERT INTO `my_courses` SET courseId='$videoId', tutor_name='$tutors', course_category='$course_category',  course_name='$course_title', coursePic='$videoPic', course_description='$course_description', amount='$amount', course_content='$videoLink', tutorProfile='$profil',  date='$date', studentId='$studentId' "); 
    }
    }
// ... (your existing code)


// ... (rest of your code)

}

// ... (your existing code)

if ($payment_status === "PAID") {
    $subject = "Payment Receipt";

    // Initialize $message before appending content
    $message = '<html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                line-height: 1.6;
                                background-color: #f5f5f5;
                                color: #333;
                                padding: 20px;
                            }
                            .container {
                                max-width: 600px;
                                margin: 0 auto;
                                background-color: #fff;
                                padding: 20px;
                                border-radius: 5px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            h2 {
                                color: #3498db;
                            }
                            p {
                                margin: 10px 0;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <h2>Payment Receipt</h2>
                            <p>Thank you for your purchase 😊 💙 !!</p>
                            <p>Course Title:'.$course_title.'</p>
                            <p>Amount: NGN ' . $amount . '</p>
                            <p>Payment Method: ' . $payment_method . '</p>
                            <p>Payment Reference: ' . $paymentReference . '</p>
                            <p>Payment Status: ' . $payment_status . '</p>
                        </div>
                    </body>
                </html>';

    $headers = "From: LandmarkTutors.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if (mail($customerEmail, $subject, $message, $headers)) {
        echo "Email sent successfully";
    } else {
        echo "Email failed to send";
    }
}

// ... (rest of your code)


