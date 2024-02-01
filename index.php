<?php 
    include_once 'header.php';
    include './student/functions.php';
    ?>
 
<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->
    <?php  include_once 'navbar.php'; ?>



<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <!-- Carousel Item 1 -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="col-sm-10 col-lg-8 text-white">
                        <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                        <h1 class="display-3 text-white animated slideInDown">Explore the Best Online Learning</h1>
                        <p class="fs-5 mb-4 pb-2">Discover top-notch online courses designed for a seamless and engaging learning experience. Join us and unlock a world of knowledge.</p>
                        <a href="course" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Explore Courses</a>
                        <a href="./login" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Item 2 -->
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="col-sm-10 col-lg-8 text-white">
                        <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Simplified Online Courses</h5>
                        <h1 class="display-3 text-white animated slideInDown">Get Educated Online From Your Home</h1>
                        <p class="fs-5 mb-4 pb-2">Experience simplified online learning with LandmarkTutors. Join us to access quality education conveniently from your home.</p>
                        <a href="course" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Discover Courses</a>
                        <a href="login" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->




<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Skilled Instructors -->
            <!-- <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">Skilled Instructors</h5>
                        <p>Learn from industry experts and dedicated educators who bring real-world experience to the virtual classroom. Our skilled instructors are committed to guiding you towards academic excellence.</p>
                    </div>
                </div>
            </div> -->

            <!-- Lecture Notes -->
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                        <h5 class="mb-3">Lecture Notes</h5>
                        <p>Access comprehensive lecture notes prepared by our experienced faculty. These notes are designed to complement your learning, providing valuable insights and aiding in a deeper understanding of the subject matter.</p>
                    </div>
                </div>
            </div>

         <!-- Video Lectures -->
         <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-video text-primary mb-4"></i>
                        <h5 class="mb-3">Video Lectures</h5>
                        <p>Immerse yourself in dynamic and engaging video lectures. Our curated collection of instructional videos enhances your learning experience, allowing you to grasp complex concepts with ease and at your own pace.</p>
                    </div>
                </div>
            </div>

            <!-- Past Exam Questions -->
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-clipboard text-primary mb-4"></i>
                        <h5 class="mb-3">Past Exam Questions</h5>
                        <p>Prepare effectively for assessments by practicing with a curated collection of past exam questions. Our platform provides a valuable resource to enhance your exam readiness and ensure success in your academic journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->



   <!-- About Start -->
<section id="about">
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
          <div class="position-relative h-100">
            <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
          <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
          <h1 class="mb-4">Welcome to LandmarkTutors</h1>
          <p class="mb-4">At LandmarkTutors, we are committed to providing high-quality education that is both accessible and affordable. Our platform is designed to empower students with the knowledge and skills they need to succeed in their academic and professional journeys.</p>
          <p class="mb-4">Explore our free e-library, where you can access a vast collection of educational resources, including books, articles, and research materials. We believe in fostering a love for learning by making valuable content available to everyone.</p>
          <div class="row gy-2 gx-4 mb-4">
            <div class="col-sm-6">
              <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
            </div>
            <div class="col-sm-6">
              <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Video Lectures</p>
            </div>
            <div class="col-sm-6">
              <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Educational Games</p>
            </div>
            <div class="col-sm-6">
              <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Interactive Learning</p>
            </div>
            <div class="col-sm-6">
              <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Access</p>
            </div>
            <div class="col-sm-6">
              <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Very Affordable Courses</p>
            </div>
          </div>
          <p class="mb-4">Join LandmarkTutors today and embark on a journey of knowledge, growth, and success. Our dedicated team and innovative approach to education ensure a transformative learning experience for every student.</p>
          <a class="btn btn-primary py-3 px-5 mt-2" href="course">Explore Courses</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About End -->



    <!-- Categories Start -->
    <div class="container-xxl py-5 category" id="courses">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">Courses Categories</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="./assets/img/past-questions.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Past Question</h5>
                                    <small class="text-primary"><?php echo 
                    $conn->query("SELECT * FROM `past-questions`") ->num_rows;?> Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid w-100" src="./assets/img/images (4).jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Lecture Notes</h5>
                                    <small class="text-primary"><?php echo 
                    $conn->query("SELECT * FROM `course-note`") ->num_rows;?> Courses</small>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Video Lectures</h5>
                            <small class="text-primary"><?php echo 
                    $conn->query("SELECT * FROM `video-lectures`") ->num_rows;?> Courses</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->

    

    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Popular Courses</h1>
            </div>
           <div class="row g-4 justify-content-center">
           <?php 
		$sql= $conn->query(" SELECT * FROM `video-lectures` ORDER BY id DESC LIMIT 3 ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                    $courseId = $row['videoId'];
           ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s" data-course-id="<?php echo $courseId; ?>">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid "  style="width:100%; height:250px"   src="./video-pics/<?php echo $row['videoPic']; ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="./student/purchase-video-lectures" class="flex-shrink-0 btn btn-sm btn-primary px-3 " >Buy Course</a>
                                <!-- <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">View Course</a> -->
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">&#8358;<?php echo $row['fee']; ?>.00</h3>
                            <div class="mb-3">
                            <?php
                         echo getStarsAndRating($conn, $courseId);
                        ?>
                            </div>
                            <h5 class="mb-4"><?php echo $row['name']; ?></h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i><?php echo $row['tutor']; ?></small>
                            <!-- <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small> -->
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i><?php echo $row['date']; ?></small>
                        </div>
                    </div>
                </div>
                <script>
// Initialize rating_data, courseId outside the loop
var rating_data = 0;

$(document).ready(function () {
    // Loop through each course element
    $('.course-item').each(function () {
        // Retrieve courseId from data attribute
        var courseId = $(this).data('course-id');
        load_rating_data(courseId);
    });
});


// Function to load rating data
function load_rating_data(courseId) {
    $.ajax({
        url: "submit_rating.php",
        method: "POST",
        data: { action: 'load_data', courseId: courseId },
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            $('#average_rating_' + courseId).text(data.average_rating);
            // $('#average_rating').text(data.average_rating);
            $('#total_review').text(data.total_review);

            var count_star = 0;

            $('.main_star').each(function () {
                count_star++;
                if (Math.ceil(data.average_rating) >= count_star) {
                    $(this).addClass('text-primary');
                    $(this).addClass('star-light');
                }
            });
            console.log("load_rating_data() has executed successfully");
        }
    });
}
</script>
                <?php }} else {  ?>
                </div>
                <h5 colspan='6' class="text-bold">
                    <span style="color:red;"> No course yet!!</span>
                </h5>
                <?php } ?>
                <div class="text-center mb-4">
                <a class="btn btn-primary  py-md-3 px-md-5 me-3 animated slideInLeft" href="course">View More</a>
                </div>
            </div>
    </div>
    <!-- Courses End -->


    <!-- Team Start -->
    <div class="container-xxl py-5" id="team">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="text-center " style="display:flex; justify-content:center;">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid "  src="./assets/img/admin.jpeg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" target="_blank" href="https://wa.link/6tgtzj"><i class="fab fa-whatsapp"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" target="_blank" href="https://www.youtube.com/@landmarktutorial7702"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Sir Landmark</h5>
                            <small>Admin</small>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                        <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>  -->
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" id="testimonial">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>

            <div class="owl-carousel testimonial-carousel position-relative">
            <?php 
		$sql= $conn->query(" SELECT * FROM `reviews` ORDER BY id DESC LIMIT 7 ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
           ?>
                <div class="testimonial-item text-center">
                <?php if (empty($row['profilePic'])) {
     ?>   <img class="border rounded-circle p-2 mx-auto mb-3" src="../assets/img/avatars/student-profile.png" style="width: 80px; height: 80px;">
    <?php
 } else {
     ?> 
     <input type="hidden" name="studentId" value="<?php echo $row['studentId'] ?>" >
     <img class="border rounded-circle p-2 mx-auto mb-3" src="./student/<?php echo $row['profilePic']; ?>" style="width: 80px; height: 80px;">
                      
     <?php
 }
?>
                    
                    <h5 class="mb-0"><?php echo $row['name']; ?></h5>
                    <p>Student</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0"><?php echo $row['review']; ?></p>
                    </div>
                </div>
                <?php }} else {  ?>
                </div>
                <h5 colspan='6' class="text-bold">
                    <span style="color:red;"> No testimonies yet!!</span>
                </h5>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
                </div>
    <?php  include_once 'footer.php'; ?>
  
</body>

</html>