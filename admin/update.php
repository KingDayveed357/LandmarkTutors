<?php  
    //  update lecture-note
     if (isset($_POST['update_course'])){
       $courseId =mysqli_real_escape_string($conn, $_POST['courseId']);
       $title =mysqli_real_escape_string($conn, $_POST['title']);
       $introMsg =mysqli_real_escape_string($conn, $_POST['introMsg']);
       $fee =mysqli_real_escape_string($conn, $_POST['fee']);
       $isError = false;

      // Update Lecture-note PDF
       $pdf_dir = "../course_note/";
       $pdf_file = $pdf_dir . basename($_FILES["pdfFile"]["name"]);
       $imageFileType = strtolower(pathinfo($pdf_file,PATHINFO_EXTENSION));
       // $pdfUpload = true;
       if(isset($_POST["register_course"])) {
           $check = getimagesize($_FILES["pdfFile"]["tmp_name"]);
           }
           
           // Allow certain file formats
           if($imageFileType !="application/msword" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
           && $imageFileType != "pdf" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
           && $imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "xls" ) {
            $status = '<div class="alert alert-danger alert-dismissible" role="alert">
            Sorry, only JPG, JPEG, PNG & GIF files are allowed..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            
            // JavaScript code to delay showing the warning message
            echo '<script>
            setTimeout(function(){
                document.getElementById("timeoutMessage").innerHTML = \'\';
            }, 6000);
            </script>';
           $isError = true;
           }
           
           // Check if $uploadOk is set to 0 by an error
           if ($isError == true) {
           $status = '
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Sorry, your file was not uploaded.</strong> 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div>';
           // if everything is ok, try to upload file
           } else {
           if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $pdf_file)) {
               $message =  "The file ". htmlspecialchars( basename( $_FILES["pdfFile"]["name"])). " has been uploaded.";
           } else {
           $status = '
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Sorry, there was an error uploading your file</strong> 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div>';
           }
       }
       
        //  UPDATE LECTURE-NOTE PICTURE
           $target_dir = "../questions-pic/";
           $target_file = $target_dir . basename($_FILES["coursePic"]["name"]);
           $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           // $uploadOk = true;
           if(isset($_POST["register_course"])) {
               $check = getimagesize($_FILES["coursePic"]["tmp_name"]);
               }
               
               // Allow certain file formats
               if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
                 && $imageFileType != "xls" && $imageFileType != "jfif" ) {
               $status = '
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
               $status = '
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Sorry, your file was not uploaded.</strong> 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>';
               // if everything is ok, try to upload file
               } else {
               if (move_uploaded_file($_FILES["coursePic"]["tmp_name"], $target_file)) {
                $message =  "The file ". htmlspecialchars( basename( $_FILES["coursePic"]["name"])). " has been uploaded.";
               } else {
               $status = '
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Sorry, there was an error uploading your file</strong> 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>';
               }
           }

    // UPDATE LECTURE-NOTE SQL 
  if ($isError == false) {
  $sql= $conn->query("UPDATE `course-note` SET title='$title', introMsg='$introMsg', coursePic='$target_file', pdfFile='$pdf_file', fee='$fee' WHERE courseId='$courseId' ");
   if ($sql) {
    $status = '<div class="alert alert-success alert-dismissible" role="alert">
  Updated Successfully !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
  // JavaScript code to delay showing the warning message
  echo '<script>
  setTimeout(function(){
      document.getElementById("timeoutMessage").innerHTML = \'\';
  }, 6000);
  </script>';
  }
  else{
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
// }

}
} 


 // UPDATE VIDEO LECTURES
else if   (isset($_POST['update_video'])){
    $videoId =mysqli_real_escape_string($conn, $_POST['videoId']);
    $name =mysqli_real_escape_string($conn, $_POST['name']);
    $introMsg =mysqli_real_escape_string($conn, $_POST['introMsg']);
    $fee =mysqli_real_escape_string($conn, $_POST['fee']);
    $videoLink =mysqli_real_escape_string($conn, $_POST['videoLink']);

    $target_dir = "../video-pics/";
    $target_file = $target_dir . basename($_FILES["videoPic"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 $picUpload = true ;

// Check if image file is a actual image or fake image
if(isset($_POST["update_video"]) AND !empty($_POST["videoPic"])) {
 $check = getimagesize($_FILES["videoPic"]["tmp_name"]);
 if($check !== false) {
   // echo "File is an image - " . $check["mime"] . ".";
   $picUpload = true;
   } else {
   $status = '
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>File is not an image...</strong> 
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
   </div>';
   $picUpload = false;
   }
}

// Check file size
if ($_FILES["videoPic"]["size"] > 50000000) {
 $status = '
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong>Sorry, your file is too large...</strong> 
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span>
 </button>
 </div>';
 $picUpload = false;
 }



// Allow certain file formats
if($imageFileType !="application/msword" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "pdf" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
&& $imageFileType != "doc" && $imageFileType != "txt" && $imageFileType != "xls" ) {
$status = '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
// $cvErr = 'Cv is Invalid!';
}

if ($picUpload == false) {
 $status = '
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong>Sorry, your file was not uploaded.</strong> 
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span>
 </button>
 </div>';
 // if everything is ok, try to upload file
 } else {
 if (move_uploaded_file($_FILES["videoPic"]["tmp_name"], $target_file)) {
  echo "";
 } else {
 $status = '
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong>Sorry, there was an error uploading your file</strong> 
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span>
 </button>
 </div>';
 }
 $picUpload = true;
}

if (empty($_POST['videoPic'])) {
$picUpload = false;
}

// if ($picUpload === true) {
  
  $sql= $conn->query("UPDATE `video-lectures` SET name='$name', introMsg='$introMsg', videoPic='$target_file', videoLink='$videoLink' WHERE videoId='$videoId' ");
  if ($sql) {
    $status = '<div class="alert alert-success alert-dismissible" role="alert">
  Updated Successfully !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
  // JavaScript code to delay showing the warning message
  echo '<script>
  setTimeout(function(){
      document.getElementById("timeoutMessage").innerHTML = \'\';
  }, 6000);
  </script>';
  }
  else{
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



// }



  // UPDATE PAST QUESTIONS
  else{
    if (isset($_POST['update_question'])){
      $questionsId =mysqli_real_escape_string($conn, $_POST['questionsId']);
      $title =mysqli_real_escape_string($conn, $_POST['title']);
      $introMsg =mysqli_real_escape_string($conn, $_POST['introMsg']);
      $fee =mysqli_real_escape_string($conn, $_POST['fee']);
       $isError = false;

      // Update past-questions PDF
       $pdf_dir = "../questions/";
       $pdf_file = $pdf_dir . basename($_FILES["pdfFile"]["name"]);
       $imageFileType = strtolower(pathinfo($pdf_file,PATHINFO_EXTENSION));
       // $pdfUpload = true;
       if(isset($_POST["register_course"])) {
           $check = getimagesize($_FILES["pdfFile"]["tmp_name"]);
           }
           
           // Allow certain file formats
           if($imageFileType !="application/msword" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
           && $imageFileType != "pdf" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
           && $imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "xls" ) {
            $status = '<div class="alert alert-danger alert-dismissible" role="alert">
            Sorry, only JPG, JPEG, PNG & GIF files are allowed..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            
            // JavaScript code to delay showing the warning message
            echo '<script>
            setTimeout(function(){
                document.getElementById("timeoutMessage").innerHTML = \'\';
            }, 6000);
            </script>';
           $isError = true;
           }
           
           // Check if $uploadOk is set to 0 by an error
           if ($isError == true) {
           $status = '
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Sorry, your file was not uploaded.</strong> 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div>';
           // if everything is ok, try to upload file
           } else {
           if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $pdf_file)) {
               $message =  "The file ". htmlspecialchars( basename( $_FILES["pdfFile"]["name"])). " has been uploaded.";
           } else {
           $status = '
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Sorry, there was an error uploading your file</strong> 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div>';
           }
       }
       
        // update past-questions picture
           $target_dir = "../course-pic/";
           $target_file = $target_dir . basename($_FILES["coursePic"]["name"]);
           $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           // $uploadOk = true;
           if(isset($_POST["register_course"])) {
               $check = getimagesize($_FILES["coursePic"]["tmp_name"]);
               }
               
               // Allow certain file formats
               if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
                 && $imageFileType != "xls" && $imageFileType != "jfif" ) {
               $status = '
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
               $status = '
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Sorry, your file was not uploaded.</strong> 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>';
               // if everything is ok, try to upload file
               } else {
               if (move_uploaded_file($_FILES["coursePic"]["tmp_name"], $target_file)) {
                $message =  "The file ". htmlspecialchars( basename( $_FILES["coursePic"]["name"])). " has been uploaded.";
               } else {
               $status = '
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Sorry, there was an error uploading your file</strong> 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>';
               }
           }

    // UPDATE LECTURE-NOTE SQL 
  if ($isError == false) {
 $sql= $conn->query("UPDATE `past-questions` SET title='$title', introMsg='$introMsg', coursePic='$target_file', pdfFile='$pdf_file', fee='$fee' WHERE questionsId='$questionsId' ");
  if ($sql){
   $status = '<div class="alert alert-success alert-dismissible" role="alert">
 Updated Successfully !!
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
 
 // JavaScript code to delay showing the warning message
 echo '<script>
 setTimeout(function(){
     document.getElementById("timeoutMessage").innerHTML = \'\';
 }, 6000);
 </script>';
 }
 else{
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