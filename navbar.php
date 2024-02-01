<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book"></i>LandmarkTutors</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index" class="nav-item nav-link active">Home</a>
                <a href="index#about" class="nav-item nav-link ">About</a>
                <a href="index#courses" class="nav-item nav-link">Courses</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="#team" class="dropdown-item">Our Team</a>
                        <a href="#testimonial" class="dropdown-item">Testimonial</a>
                    </div>
                </div> -->
                <a href="contact" class="nav-item nav-link">Contact</a>
            </div>
            <?php 


if(isset($_SESSION['login'])){
    $status = "Dashboard" ;
    $link = "./admin/home";
  } else if (isset($_SESSION['instructor_login'])){
    $status = "Dashboard" ;
    $link = "./instructor/home";
  } 
 else if(isset($_SESSION['student_login'])){
    $status = "Dashboard" ;
    $link = "./student/home";
  }  else{
    $status = "Join Now" ;
    $link = "./login";
  }
 
?>
            <a href="<?php echo isset($link)? $link: ""?>" class="btn btn-primary py-4 px-lg-5  d-block"> <span  ><?php echo isset($status)? $status: ""?></span><i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->