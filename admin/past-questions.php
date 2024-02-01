<?php  include_once 'head.php';
      include '../student/functions.php';
       if(isset($_POST['register_question'])){
        include_once 'questions-process.php';
    } 
?>
<?php
    if(isset($_GET['questionsId'])){
      $questionsId= $_GET['questionsId'];
      if($_GET['status']=='delete'){
      //? delete user account
      $sql=$conn->query("DELETE FROM `past-questions` WHERE questionsId='$questionsId'");
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
      } }  
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
          <div class="col-md-8 ">
              <h4 class="fw-bold py-3 mb-3 md-mb-4"><span class="text-muted fw-light">Courses /</span> Past Questions</h4>
            </div>
            <div class="col-md-4  mb-4  md-text-right md-mb-0">
              <div class="text-center">
                <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalCenter"
                >
                Create Past Questions
              </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Create Past Questions</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                  ></button>
                                </div>
                              <div class="modal-body">
                              <form id="formAuthentication" class="mb-3" action="past-questions" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Course Title</label>
                                    <input
                                      type="text"
                                      required
                                      id="nameWithTitle"
                                      class="form-control"
                                      placeholder="Enter Topic"
                                      name="title"
                                      />
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col mb-3">
                                    <label class="form-label" for="basic-icon-default-message">Course Summary</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"
                              ><i class="bx bx-comment"></i
                            ></span>
                            <textarea
                            required
                              id="basic-icon-default-message"
                              class="form-control"
                              name="introMsg"
                              placeholder="A brief overview of the course"
                              aria-describedby="basic-icon-default-message2" 
                            ></textarea>
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Course picture</label>
                                  <input
                                      type="file"
                                      name="coursePic"
                                      id="nameWithTitle"
                                      class="form-control"
                                    />
                                    <small class="text-muted mb-0">Allowed JPG, GIF, JPEG, JFIF or PNG. Max size of 800K</small>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Upload Pdf</label>
                                    <input
                                  
                                      type="file"
                                      id="nameWithTitle"
                                      name="pdfFile"
                                      class="form-control"
                                    />
                                    <small class="text-muted mb-0">Allowed PDF, DOCX, PNG. Max size of 800K</small>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Course Price</label>
                                    <div class="input-group">
                        <span class="input-group-text">&#8358;</span>
                        <input
                          type="text"
                          required
                          class="form-control"
                          placeholder=" Course Amount"
                          name="fee"
                        />
                        <span class="input-group-text">.00</span>
                </div>
                                  </div>
                                </div>
                                <button type="submit" name="register_question" class="btn btn-primary">Create Past Questions</button>
                              </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Examples -->
                    <span class="text-success" id="timeoutMessage"  ><?php echo isset($status)? $status: ""?></span>
              <div class="row mb-5">
                
              <?php 
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
                                <a href="view-questions.php?questionsId=<?= $row['questionsId']; ?>&status=view" class="btn btn-sm btn-primary px-3 ">View Course</a>
                            </div>
                        </div>
                        <div class="text-left">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a href="edit-questions.php?id=<?= $row['questionsId']; ?>&status=edit" class="dropdown-item" href="javascript:void(0);"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <a href="past-questions.php?questionsId=<?php echo $row ['questionsId']; ?>&status=delete" class="dropdown-item" href="javascript:void(0);"
                              ><i class="bx bx-trash me-1"></i> Delete</a
                            >
                          </div>
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
    <?php } ?>
              <!-- Examples -->
            </div>
          </div>
            
            <!--/ Card layout -->
            
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
