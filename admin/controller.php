<?php
include_once('config.php');
// $verify= $_GET ['verify'];
// $instructorId = $_GET['id'];
// $id= $_GET['id'];
// if($verify=='pending'){
//     $sql = $conn->query("UPDATE instructor SET verify='verified' WHERE instructorId='$instructorId' ");

//     header("location:instructor.php");
// }
$verify= $_GET ['verify'];
$instructorId = $_GET['id'];
$id= $_GET['id'];
if($verify=='pending'){
    $sql = $conn->query("UPDATE instructor SET verify='verified' WHERE instructorId='$instructorId' ");
    header("location:instructor.php");
}
else{
    $sql = $conn->query("UPDATE instructor SET verify='pending' WHERE instructorId='$instructorId' ");
    header("location:instructor.php");
}
?>