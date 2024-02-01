<?php  include_once 'head.php';
       include 'functions.php';
?>

  <body>
    <!-- Layout wrapper -->
    <?php  include_once 'sidebar.php';?>
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php  include_once 'navbar.php';?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
          <div class="col-md-8">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> Past Questions</h4>
              <span class="text-success" id="timeoutMessage"  ><?php echo isset($status)? $status: ""?></span>
              </div>
                      </div>
                   
           
              <!-- Examples -->
              <div class="row mb-5">
                
              <?php 
            $studentId=$_SESSION['studentId'];
		$sql= $conn->query(" SELECT * FROM `past-questions`  ORDER BY id DESC  ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
          $courseId = $row['questionsId'];
                ?>
                <div class="col-lg-4 mb-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" data-course-id="<?php echo $courseId; ?>">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" style="height:350px; width:100%" src="<?php echo $row['coursePic']; ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <?php if ($row['is_purchased'] == 'paid' && $row['studentId'] == $studentId) { ?>
                            <a href="view-questions.php?questionsId=<?= $row['questionsId']; ?>&status=view" class="btn btn-sm btn-primary px-3 ">View Course</a>
                        <?php } else { ?>
                            <a href="purchase-past-questions.php?questionsId=<?= $row['questionsId']; ?>&status=buy" class="btn btn-sm btn-primary px-3 ">Buy Course</a>
                        <?php } ?>

                               
                                
                            </div>
                        </div>
                      
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">&#8358;<?php echo $row['fee']; ?>.00</h3> 
                            <div class="mb-3">
                            <?php
                         echo getStarsAndRating($conn, $courseId);
                        ?>
                            </div>
                            <h5 class="mb-4"><?php echo $row['title']; ?></h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="bx bx-user text-primary me-2"></i><?php echo $row['tutor']; ?></small>
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
    <h5 colspan='6' class="text-bold">
    <span style="color:red;">No Past-Question yet!!</span>
    </h5>
    <?php }   ?>
     
   
              <!-- Examples -->
             
              
              </div>
             
              <!--/ Card layout -->
            </div>
            
            <!-- / Content -->

            <!-- Footer -->
            <?php  include_once 'footer.php'; ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php  include_once 'scripts.php'; ?>
  </body>
</html>
