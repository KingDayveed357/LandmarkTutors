<?php
include_once('config.php');
$status= $_GET ['status'];
$studentId = $_GET['id'];
$id= $_GET['id'];
if($status=='active'){
    $sql = $conn->query("UPDATE student SET status='banned' WHERE studentId='$studentId' ");
    header("location:students.php");
    $selectSql = $conn->query("SELECT * FROM student WHERE studentId='$studentId'");
    if ($sql->num_rows >0) {
       while ($row=$sql->fetch_assoc()) {
      $studentName = $row['name'];
       }
    }
    if ($status == "active") {   
    echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
      $studentName has been banned!!
     <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
     </div>";
     
     // JavaScript code to delay showing the warning message
     echo '<script>
     setTimeout(function(){
         document.getElementById("timeoutMessage").innerHTML = \'\';
     }, 6000);
     </script>';
}
else{
    $status = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
    An error occured!!!!!!
   <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
   </div>";
   
   // JavaScript code to delay showing the warning message
   echo '<script>
   setTimeout(function(){
       document.getElementById("timeoutMessage").innerHTML = \'\';
   }, 6000);
   </script>';
}
}
else{
    $sql = $conn->query("UPDATE student SET status='active' WHERE studentId='$studentId' ");
    header("location:students.php");
}
