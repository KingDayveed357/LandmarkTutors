<?php  
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['register_course'])){
        $courseId=$_SESSION['courseId'];
        $date= date('Y-m-d');
        $sql= $conn->query(" SELECT * FROM `course-note` WHERE courseId='$courseId'");
        if($sql->num_rows>0){
            while($row=$sql->fetch_assoc()){ 
                    $message = $row['title'];
                    // $profil = $row['user_img'];
                    $notifId =mysqli_real_escape_string($conn, rand(100000 , 999999));
                    
                    
                }  
                $sql= $conn->query("INSERT INTO `notification` SET notifId='$notifId', message='$message', time='$date' ");
                if ($sql) {
                    $status = '<div class="alert alert-success alert-dismissible" role="alert">
                   
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
  }
 }
}
?>