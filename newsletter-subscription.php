 <?php 
   $isError = false;

// if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['subscribe'])){
    //Validate Full Name
    if(empty($_POST['emailAddress'])){
        $emailErr = "Email is required!";
        $isError = true;
    }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
       $emailErr = 'Email is Invalid!';
        $isError = true;
    }
    else{
        $email = $_POST['emailAddress'];
        $sql = $conn->query ("SELECT email FROM newsletter WHERE email='$email' ");
        if($sql->num_rows>0){
         $emailErr = "This email has already subscribed!!!";
         $isError = true;
        }
    }
    if ($isError === false) { 
        $userId = rand(9087, 34576);
        
      $sql= $conn->query("INSERT INTO newsletter SET userId='$userId', email='$email' ");
      if ($sql) {

        $message = "<div class='alert alert-success alert-dismissible' role=\"alert\">
        We have sent a verification link to $email
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>";
           
      }
    else{
        $message = "<div class='alert alert-danger alert-dismissible' role=\"alert\">
        Something went wrong
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>";
    }
    }
    }
// }
   
   