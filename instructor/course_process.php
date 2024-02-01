<?php  require_once './config.php';
if(isset($_POST['register_course'])){
 
    $title =mysqli_real_escape_string($conn, $_POST['title']);
    $introMsg =mysqli_real_escape_string($conn, $_POST['introMsg']);
    $fee =mysqli_real_escape_string($conn, $_POST['fee']);
     $date = date('Y-m-d');
    $pdf_dir = "../course_note/";
    $pdfFile = $pdf_dir . basename($_FILES["pdfFile"]["name"]);
    $pdfUpload = true;
  $imageFileType = strtolower(pathinfo($pdfFile,PATHINFO_EXTENSION));
  
// Check if image file is a actual image or fake image
if(isset($_POST["register_course"])) {
$check = getimagesize($_FILES["pdfFile"]["tmp_name"]);
if($check !== false) {
// echo "File is an image - " . $check["mime"] . ".";
$pdfUpload = true;
} else {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>File is not an image...</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$pdfUpload = false;
}
}

// Check file size
if ($_FILES["pdfFile"]["size"] > 5000000) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, your file is too large...</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$pdfUpload = false;
}

// Allow certain file formats
if($imageFileType !="application/msword" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "pdf" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
&& $imageFileType != "doc" && $imageFileType != "txt" && $imageFileType != "xls" ) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
// $cvErr = 'Cv is Invalid!';
}

// Check if $pdfUpload is set to 0 by an error
if ($pdfUpload == false) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, your file was not uploaded.</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $pdfFile)) {
 
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

  
    $target_dir = "../course-pic/";
    $target_file = $target_dir . basename($_FILES["coursePic"]["name"]);
    $uploadOk = true;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["register_course"])) {
$check = getimagesize($_FILES["coursePic"]["tmp_name"]);
if($check !== false) {
// echo "File is an image - " . $check["mime"] . ".";
$uploadOk = true;
} else {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>File is not an image...</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$uploadOk = false;
}
}

// Check file size
if ($_FILES["coursePic"]["size"] > 50000000) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, your file is too large...</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$uploadOk = false;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "MP4" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
$uploadOk = false;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == false ) {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, your file was not uploaded.</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["coursePic"]["tmp_name"], $target_file)) {
 $_SESSION['mgs'] = '
 "The file ". htmlspecialchars( basename( $_FILES["coursePic"]["name"])). " has been uploaded.";';
} else {
$_SESSION['mgs'] = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, there was an error uploading your file</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
}

if($uploadOk === true){
$instructorId=$_SESSION['instructorId'];
$sql= $conn->query(" SELECT * FROM instructor WHERE instructorId='$instructorId'");
if($sql->num_rows>0){
    while($row=$sql->fetch_assoc()){ 
            $acctName = $row['name'];
            $profil = $row['user_img'];
            $courseId =mysqli_real_escape_string($conn, rand(100000 , 999999));
            
            
        }  
        $sql= $conn->query("INSERT INTO `course-note` SET courseId='$courseId', title='$title', introMsg='$introMsg', coursePic='$target_file', pdfFile='$pdfFile', tutor='$acctName', profile='$profil', date='$date', fee='$fee', instructorId='$instructorId' "); 
        if ($sql) {
            $status = '<div class="alert alert-success alert-dismissible" role="alert">
           Uploaded successfully!!
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
    }}
}
}else{
    if(isset($_POST['register_question'])){

        $title =mysqli_real_escape_string($conn, $_POST['title']);
        $introMsg =mysqli_real_escape_string($conn, $_POST['introMsg']);
        $fee =mysqli_real_escape_string($conn, $_POST['fee']);
        $date = date('Y-m-d');
        $pdf_dir = "../questions/";
        $pdfFile = $pdf_dir . basename($_FILES["pdfFile"]["name"]);
        $pdfUpload = true;
      $imageFileType = strtolower(pathinfo($pdfFile,PATHINFO_EXTENSION));
      
    // Check if image file is a actual image or fake image
    if(isset($_POST["register_question"])) {
    $check = getimagesize($_FILES["pdfFile"]["tmp_name"]);
    if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $pdfUpload = true;
    } else {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>File is not an image...</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $pdfUpload = false;
    }
    }
    
    // Check file size
    if ($_FILES["pdfFile"]["size"] > 5000000) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file is too large...</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $pdfUpload = false;
    }
    
    // Allow certain file formats
    if($imageFileType !="application/msword" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "pdf" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
    && $imageFileType != "doc" && $imageFileType != "txt" && $imageFileType != "xls" ) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    // $cvErr = 'Cv is Invalid!';
    }
    
    // Check if $pdfUpload is set to 0 by an error
    if ($pdfUpload == false) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file was not uploaded.</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $pdfFile)) {
        $_SESSION['mgs'] = '
        "The file ". htmlspecialchars( basename( $_FILES["coursePic"]["name"])). " has been uploaded.";';
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
    
        $target_dir = "../questions-pic/";
        $target_file = $target_dir . basename($_FILES["coursePic"]["name"]);
        $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["register_question"])) {
    $check = getimagesize($_FILES["coursePic"]["tmp_name"]);
    if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = true;
    } else {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>File is not an image...</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $uploadOk = false;
    }
    }
    
    // Check file size
    if ($_FILES["coursePic"]["size"] > 50000000) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file is too large...</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $uploadOk = false;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "MP4" && $imageFileType != "png" && $imageFileType != "jpeg" 
    && $imageFileType != "gif" ) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $uploadOk = false;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == false ) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file was not uploaded.</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["coursePic"]["tmp_name"], $target_file)) {
     $_SESSION['mgs'] = '
     "The file ". htmlspecialchars( basename( $_FILES["coursePic"]["name"])). " has been uploaded.";';
    } else {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, there was an error uploading your file</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    
    if($uploadOk === true){
    $instructorId=$_SESSION['instructorId'];
    $sql= $conn->query(" SELECT * FROM instructor WHERE instructorId='$instructorId'");
    if($sql->num_rows>0){
        while($row=$sql->fetch_assoc()){ 
                $acctName = $row['name'];
                $profil = $row['user_img'];
            }  
            $sql= $conn->query("INSERT INTO `past-questions` SET questionsId='$questionsId', title='$title', date='$date', introMsg='$introMsg', coursePic='$target_file', pdfFile='$pdfFile', tutor='$acctName', profile='$profil', fee='$fee', instructorId='$instructorId' "); 
            if($sql->num_rows>0){
                //we have this record in our db
                $row = $sql->fetch_assoc();
                $_SESSION['questionsId']= $row['questionsId'];
                // header( "Location: home.php"); 
            }
            if ($sql) {
                $status = '<div class="alert alert-success alert-dismissible" role="alert">
               Deleted successfully!!
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
        }}
    }
    }
}
// else{
//     header("Location:update.php") ;
// }
?>