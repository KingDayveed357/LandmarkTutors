<?php require_once 'config.php';
if(isset($_POST['register_question'])){
 
    $title =mysqli_real_escape_string($conn, $_POST['title']);
    $introMsg =mysqli_real_escape_string($conn, $_POST['introMsg']);
    $fee =mysqli_real_escape_string($conn, $_POST['fee']);
     $date = date('Y-m-d');
     $isError = false;


// $pdf_file =mysqli_real_escape_string($conn, $_POST['pdfFile']);
$pdf_dir = "../questions/";
$pdf_file = $pdf_dir . basename($_FILES["pdfFile"]["name"]);
$imageFileType = strtolower(pathinfo($pdf_file,PATHINFO_EXTENSION));
// $pdfUpload = true;
if(isset($_POST["register_question"])) {
    $check = getimagesize($_FILES["pdfFile"]["tmp_name"]);
    }
    
    // Allow certain file formats
    if($imageFileType !="application/msword" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "pdf" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
    && $imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "xls" ) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $isError = true;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($isError == true) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file was not uploaded.</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $pdf_file)) {
     $message = "The file ". htmlspecialchars( basename( $_FILES["pdfFile"]["name"])). " has been uploaded.";
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


// $target_file =mysqli_real_escape_string($conn, $_POST['coursePic']);
    $target_dir = "../questions-pic/";
    $target_file = $target_dir . basename($_FILES["coursePic"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // $uploadOk = true;
    if(isset($_POST["register_question"])) {
        $check = getimagesize($_FILES["coursePic"]["tmp_name"]);
        }
        
        // Allow certain file formats
        if( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "wmv"  && $imageFileType != "gif"  
        && $imageFileType != "txt" && $imageFileType != "xls"  && $imageFileType != "jfif"  ) {
        $_SESSION['mgs'] = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        $isError = true;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($isError == true) {
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
         $message = "The file ". htmlspecialchars( basename( $_FILES["coursePic"]["name"])). " has been uploaded.";
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
// }    
//check for any error
    if($isError == false){
        //run sql here...
        $instructorId=$_SESSION['instructorId'];
        $sql= $conn->query(" SELECT * FROM instructor WHERE instructorId='$instructorId'");
        if($sql->num_rows>0){
            while($row=$sql->fetch_assoc()){ 
                    $acctName = $row['name'];
                    $profil = $row['user_img'];
                    $questionsId =mysqli_real_escape_string($conn, rand(100000 , 999999));
                    
                    
                }  
            $sql= $conn->query("INSERT INTO `past-questions` SET questionsId='$questionsId', title='$title', introMsg='$introMsg', coursePic='$target_file', pdfFile='$pdf_file', tutor='$acctName', profile='$profil', date='$date', fee='$fee', instructorId='$instructorId' "); 
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
                    
                } 
}
}
?>