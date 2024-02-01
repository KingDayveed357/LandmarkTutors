<?php 
$isError = false;

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['register_student'])){
    //Validate Full Name
    if (empty($_POST['name'])) {
        $nameErr = "First Name is Required!";
        $isError = true;
    }
    else{
        $name = cleanInput($_POST['name']);
    }
   
    if(empty($_POST['email'])){
        $emailErr = "Email is required!";
        $isError = true;
    }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
       $emailErr = 'Email is Invalid!';
        $isError = true;
    }
    else{
        $email = cleanInput($_POST['email']);
        $sql = $conn->query ("SELECT email FROM student WHERE email='$email' ");
        if($sql->num_rows>0){
         $emailErr = "Email is already taken!!!";
         $isError = true;
        }
    }
  if(empty($_POST['phone'])){
        $phoneErr = "Phone Number is required!";
        $isError = true;
    
    }elseif(strlen($_POST['phone'])<10){
        $phoneErr = "Phone Number is invalid!!";
        $isError = true;
        }
    else{
        $phone=cleaninput($_POST['phone']);
        $sql = $conn->query ("SELECT phone FROM student WHERE phone='$phone' ");
        if($sql->num_rows>0){
         $phoneErr = "Phone Number is already taken!!!";
         $isError = true;
        }
    }
    if (empty($_POST['password'])) {
        $passErr = "Password is required"; 
        $isError = true;
    }elseif(strlen($_POST['password'])<6){
        $passErr="password is too short!!";
        $isError = true;
        }
    else{
        $password = cleanInput($_POST['password']);
    }
    if(empty($_POST['cpass'])){
        $cpassErr = " Confirm password is required";
        $isError = true;
    }else{
        $cpass = cleanInput($_POST['cpass']);
        $password = cleanInput($_POST['password']);
        if($password !== $cpass){
            $cpassErr = " Confirm password Doesn't Match";
            $isError = true;
        }
    }
    //check for any error
        if($isError === false){
            //run sql here...
            $studentId = rand(9087, 34576);
            $sql= $conn->query("INSERT INTO student SET studentId='$studentId', name='$name', email='$email', phone='$phone', password='$password', cpass='$cpass' ");
            if($sql){
                $status = "Registration Successful!!!" ;
            }else{
                $status = "Registration Error!!!" ;
            }
        } else {
  
        }
     }  else{
        if (isset($_POST['student_login'])) {
            $email = cleanInput($_POST['email']);
            $password = cleanInput($_POST['password']);
            $banned = 'active';
            
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("SELECT * FROM `student` WHERE password=? AND email=? AND status=?");
            $stmt->bind_param('sss', $password, $email, $banned);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                // Account is verified
                $row = $result->fetch_assoc();
                $_SESSION['student_login'] = true;
                $_SESSION['studentId'] = $row['studentId'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
            
                ?>
                <script>alert('Welcome'); window.location.replace('./student/home')</script>
                <?php
            } else {
                // Check if the account exists but is not banned
                $stmt = $conn->prepare("SELECT * FROM `student` WHERE password=? AND email=?");
                $stmt->bind_param('ss', $password, $email);
                $stmt->execute();
                $result = $stmt->get_result();
            
                if ($result->num_rows > 0) {
                    // Account exists but is banned
                    $isError = true;
                    $studentStatus = '<div class="alert alert-danger alert-dismissible" role="alert">
                        This account has been banned !!!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            
                    // JavaScript code to delay showing the warning message
                    echo '<script>
                    setTimeout(function(){
                        document.getElementById("timeoutMessage").innerHTML = \'\';
                    }, 10000);
                    </script>';
                } else {
                    // Account does not exist or credentials are incorrect
                    $isError = true;
                    $studentStatus = '<div class="alert alert-danger alert-dismissible" role="alert">
                        Email or password is incorrect.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            
                    // JavaScript code to delay showing the warning message
                    echo '<script>
                    setTimeout(function(){
                        document.getElementById("timeoutMessage").innerHTML = \'\';
                    }, 10000);
                     </script>';
                }
            } 
              
        }
    }
    }
    ?>
   