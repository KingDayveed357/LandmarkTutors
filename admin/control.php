<?php
include_once('config.php');
$status= $_GET['status'];

$studentId = $_GET['studentId'];
$sql= $conn->query(" SELECT * FROM `student` WHERE studentId='$studentId' ");



if($status = 'active') {
    $sql = $conn->query("UPDATE `student` SET status='banned' WHERE studentId='$studentId' ");
    header("location:students.php");
}

else  {
    $sql = $conn->query("UPDATE `student` SET status='active' WHERE studentId='$studentId' ");
    header("location:students.php");
}
