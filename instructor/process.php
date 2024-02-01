<?php  
// require_once 'config.php';
    if(isset($_POST['register_instructor'])){
        $isError = false;
        $instructorId = rand(90875, 34576);
        $name =mysqli_real_escape_string($conn, $_POST['name']);
        if(empty($_POST['email'])){
            $emailErr = "Email is required!";
            $isError = true;
        }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
           $emailErr = 'Email is Invalid!';
            $isError = true;
        }else{
            $email = cleanInput($_POST['email']);
            $sql = $conn->query ("SELECT email FROM instructor WHERE email='$email' ");
            if($sql->num_rows>0){
             $emailErr = "This email is already taken!!!";
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
            $sql = $conn->query ("SELECT phone FROM instructor WHERE phone='$phone' ");
            if($sql->num_rows>0){
             $phoneErr = "Phone Number is already taken!!!";
             $isError = true;
            }
        }
        $course =mysqli_real_escape_string($conn, $_POST['course']);
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
            if($isError === false){
            $sql= $conn->query("INSERT INTO instructor SET instructorId='$instructorId', name='$name', email='$email', phone='$phone', password='$password', course='$course' "); 
            
            $status = '<div class="alert alert-success alert-dismissible" role="alert">
            Registration Successful
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    
            // JavaScript code to delay showing the warning message
            echo '<script>
            setTimeout(function(){
                document.getElementById("timeoutMessage").innerHTML = \'\';
            }, 10000);
            </script>';
        }else{
            
            $status = '<div class="alert alert-danger alert-dismissible" role="alert">
            Registration Error!!!
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
elseif (isset($_POST['instructor_login'])) {
    $email = cleanInput($_POST['email']);
    $password = cleanInput($_POST['password']);
    $verify = 'verified';
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `instructor` WHERE password=? AND email=? AND verify=?");
    $stmt->bind_param('sss', $password, $email, $verify);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Account is verified
        $row = $result->fetch_assoc();
        $_SESSION['instructor_login'] = true;
        $_SESSION['instructorId'] = $row['instructorId'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
    
        ?>
        <script>alert('Welcome'); window.location.replace('./instructor/home.php')</script>
        <?php
    } else {
        // Check if the account exists but is not verified
        $stmt = $conn->prepare("SELECT * FROM `instructor` WHERE password=? AND email=?");
        $stmt->bind_param('ss', $password, $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // Account exists but is not verified
            $isError = true;
            $instructorStatus = '<div class="alert alert-danger alert-dismissible" role="alert">
                Sorry, this account has not yet been verified as an instructor.
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
            $instructorStatus = '<div class="alert alert-danger alert-dismissible" role="alert">
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
?>