 <?php
  if(isset($_POST['suscribe'])){
      include_once 'newsletter-subscription.php';
   } ?>
  <!-- Footer Start -->

  <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="index#about">About Us</a>
                    <a class="btn btn-link" href="contact">Contact Us</a>
                     <a class="btn btn-link" href="course">Explore Courses</a>
                   <a class="btn btn-link" href="login">Sign-in</a>
                    <!-- <a class="btn btn-link" href="">FAQs & Help</a> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Owerri, Imo state, Nigeria</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+234 816 068 9836</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>landmarktutorial@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" target="_blank" href="https://wa.link/6tgtzj"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.youtube.com/@landmarktutorial7702"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
    <h4 class="text-white mb-3">Featured Courses</h4>
    <div class="row g-2 pt-2">
        <!-- Replace the course information with your actual course details -->
        <?php 
		$sql= $conn->query(" SELECT * FROM `course-note` ORDER BY id ASC LIMIT 1,3 ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
           ?>
        <div class="col-4">
            <img class="img-fluid bg-light h-50 w-100 p-1" src="./course-pics/<?php echo $row['coursePic']?>" alt="">
            <h6 class="mt-2 text-sm text-light"><?php echo $row['title']?></h6>
        </div>
        <?php }} ?>
        <!-- Add more courses as needed -->
    </div>
</div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Suscribe to our Newsletter and stay abreast to our latest course content.</p>
                    <form class="position-relative mx-auto" style="max-width: 400px;" method="POST">
                        <span class="text-danger"><?php echo isset($emailErr)? $emailErr: ""?></span>
                        <span class="text-danger"><?php echo isset($message)? $message: ""?></span>
                        <input name="emailAddress" class="form-control border-0 w-100 py-3 ps-4 pe-5" type="email" required placeholder="Your email">
                        <button type="submit" name="suscribe" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="index">LandmarkTutors</a>, All Right Reserved.

                        
                        Developed By <a class="border-bottom" href="index">King Day_veed</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="index">Home</a>
                            <a href="index#about">About</a>
                            <a href="contact">Contact</a>
                            <a href="">FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
   
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="https://wa.link/6tgtzj" target="_blank" class="btn btn-lg my-auto py-auto btn-outline-light  btn-md-square message-button" style="display:block; position:fixed; left: 20px; bottom: 45px; z-index: 99;">
    <h1 class="fab fa-whatsapp text-success " style="font-size: 2rem;"></h1> 
</a>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js frontend/main.js"></script>


   