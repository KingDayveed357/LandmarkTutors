<?php 

// // if ($_POST['update_payment_status'] && $_POST['update_payment_status'] === true) {
//     $transactionId = $_SESSION['transactionId'];
//     $updateSql = $conn->query("UPDATE `transactions` SET payment_status='paid' WHERE transactionId='$transactionId' ");

//     if ($updateSql) {
        
//         echo "Payment status updated successfully.";
//         // Email sending functionality
//         $subject = "Payment Receipt";
//         $message = "Thank you for your purchase!\n";
//         $message .= "Amount: NGN " . $amount . "\n";
//         $message .= "Payment Method: " . $payment_method . "\n";
//         // Add other relevant details to the email content

//         $headers = "From: LandmarkTutors.com";

//         if (mail($customerEmail, $subject, $message, $headers)) {
//             echo "Email sent successfully";
//         } else {
//             echo "Email failed to send";
//         }
//     } else {
//         echo "Failed to update payment status.";
//     }
// // }
// ?>