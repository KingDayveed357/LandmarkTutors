<?php  require_once './config.php';
if(isset($_POST['register_video'])){
    $name =mysqli_real_escape_string($conn, $_POST['name']);
    $introMsg =mysqli_real_escape_string($conn, $_POST['introMsg']);
    $videoLink =mysqli_real_escape_string($conn, $_POST['videoLink']);
    $date = date('Y-m-d');
    $fee =mysqli_real_escape_string($conn, $_POST['fee']);

$pic_dir = "../video-pics/";
$pic_file = $pic_dir . basename($_FILES["videoPic"]["name"]);
$uploadPic = true;
$imageFileType = strtolower(pathinfo($pic_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["register_video"])) {
$check = ($_FILES["videoPic"]["tmp_name"]);
if($check !== false) {
// echo "File is an image - " . $check["mime"] . ".";
$uploadPic = true;
} else {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>File is not an image...</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$uploadPic = false;
}
}

// Check file size
if ($_FILES["videoPic"]["size"] > 50000000) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, your file is too large...</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$uploadPic = false;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "mp3" ) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$uploadPic = false;
}

// Check if $uploadPic is set to 0 by an error
if ($uploadPic == false ) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, your file was not uploaded.</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["videoPic"]["tmp_name"], $pic_file)) {
$_SESSION['mgs'] = '
"The file ". htmlspecialchars( basename( $_FILES["video"]["name"])). " has been uploaded.";';
} else {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, there was an error uploading your file</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
}
}

if($uploadPic == true) {
$adminId=$_SESSION['adminId'];
$sql= $conn->query(" SELECT * FROM admin WHERE adminId='$adminId'");
if($sql->num_rows>0){
    while($row=$sql->fetch_assoc()){ 
            $acctName = $row['name'];
            $profil = $row['user_img'];
        } 
        $videoId =mysqli_real_escape_string($conn, rand(100000 , 999999));
        $sql= $conn->query("INSERT INTO `video-lectures` SET videoId='$videoId', name='$name', introMsg='$introMsg', videoLink='$videoLink', videoPic='$pic_file', tutor='$acctName', profile='$profil', fee='$fee', date='$date' "); 
        if ($sql) {
            $status = '<div class="alert alert-success alert-dismissible" role="alert">
           Uploaded successfully!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            
            // JavaScript code to delay showing the warning message
            echo '<script>
            setTimeout(function(){
                document.getElementById("status").innerHTML = \'\';
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
                document.getElementById("status").innerHTML = \'\';
            }, 6000);
            </script>';
          } 
    }
        // if($sql->num_rows>0){
        //     //we have this record in our db
        //     $row = $sql->fetch_assoc();
        //     $_SESSION['videoId']= $row['videoId'];
        //     // header( "Location: home.php"); 
        // }
        $date= date('Y-m-d');
        $message = $name   ;
       // $profil = $row['user_img'];
       $notifId =mysqli_real_escape_string($conn, rand(100000 , 999999));   
         $sql= $conn->query("INSERT INTO `notification` SET notifId='$notifId', message='$message', time='$date' ");
    }
}


?>