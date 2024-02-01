<?php 
if(isset($_POST['send_review'])){
 
 
 $review =mysqli_real_escape_string($conn, $_POST['review']);
 
  $date = date('Y-m-d');
 
$studentId=$_SESSION['studentId'];
$sql= $conn->query(" SELECT * FROM student WHERE studentId='$studentId'");
if($sql->num_rows>0){
 while($row=$sql->fetch_assoc()){ 
         $acctName = $row['name'];
         $profil = $row['user_img'];
         $reviewId =mysqli_real_escape_string($conn, rand(100000 , 999999));
         
         
     }  
     $sql= $conn->query("INSERT INTO `reviews` SET reviewId='$reviewId', review='$review', name='$acctName', profilePic='$profil', date='$date', studentId='$studentId' "); 
     if ($sql) {
         $status = '<div class="alert alert-success alert-dismissible" role="alert">
        Review Uploaded successfully!!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
         
         // JavaScript code to delay showing the warning message
         echo '<script>
         setTimeout(function(){
             document.getElementById("timeoutMessage").innerHTML = \'\';
         }, 6000);
         </script>';
       }
       else {
         $status = '<div class="alert alert-danger alert-dismissible" role="alert">
         An error occured!!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
         
         // JavaScript code to delay showing the warning message
         echo '<script>
         setTimeout(function(){
             document.getElementById("timeoutMessage").innerHTML = \'\';
         }, 6000);
         </script>';
       } 

           //Notification Process
           $date= date('Y-m-d');
           $message = $review;
          // $profil = $row['user_img'];
          $notifId =mysqli_real_escape_string($conn, rand(100000 , 999999));   
                
            $sql= $conn->query("INSERT INTO `notification` SET notifId='$notifId', message='$message', time='$date' ");
              
        
 }}

 ?>