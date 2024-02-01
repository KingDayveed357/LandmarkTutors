       <?php  include_once 'head.php';
             if(isset($_POST['add-comment'])){
              include_once 'video-process.php';
              // header('Location:video-lectures.php');
          }
          if(isset($_GET['actionId'])){
            $actionId= $_GET['actionId'];
            if($_GET['status']=='delete'){
            //? delete user account
            $sql=$conn->query("DELETE FROM `comments` WHERE actionId='$actionId'");
            // header('Location:view-video.php');
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Video Lectures /</span> View Videos </h4>
             
            
                              
              <input type="hidden" name="" value="<?php echo $row['videoId'] ?>" >
              <!-- Examples -->
              <?php 
               $videoId = $_GET['videoId'];
							$sql= $conn->query(" SELECT * FROM `video-lectures` WHERE videoId='$videoId'");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
              <div class="container row mb-5">
              <div class="col-lg-12">
              <div class="card p-3">
                <div class="card-top flex-top my-2">
              <div class="d-flex ">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar ">
   
                      <img src="<?php echo $row['profile']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />

                              
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h4 class="fw-bold d-block"><?php echo $row['tutor'];   ?></h4>
                           
                          </div>
                        </div>
                     <div class="">
                  <h5><?php echo $row['date']; ?></h5>
                     </div>
                        </div>
              <iframe width="auto" class="" height="500" src="<?php echo $row['videoLink'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              <div class="flex mt-3">
                <h4><?php echo $row['name']; ?></h4>
              <p><?php echo $row['introMsg']; ?></p>
              </div>
            </div>
              <!-- <div class="card p-3">
              <figure class="card-img-top" >
              <iframe width="900"  height="315" src="<?php echo $row['videoLink'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <figcaption class="figure-caption-semibold ml-3    mt-2" >
              <div class="mb-2" >
              <h3><?php echo $row['name']; ?></h3>
              </div>
                <div style="display: flex; gap: 20px;">
                <p></p>
                 <p>44 likes</p>
                 </div>
          </figcaption>
        </figure>
                   <hr class="" style="margin-left: 30px; margin-right: 30px"/>
                    <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar ">
   
                      <img src="<?php echo $row['profile']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />

                              
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h4 class="fw-bold d-block"><?php echo $row['tutor'];   ?></h4>
                           
                          </div>
                        </div>
                   <div style="display: flex; justify-content: space-between;  margin-top: 7px;">
                   <button class="btn btn-primary  " style="margin-left: 15px; width:fit-content;">View Playlist</button>
                   <button type="button" class="btn btn-outline-secondary">like</button>
                  </div>
                   <p class="mt-4 " style="margin-left: 15px;"><?php echo $row['introMsg'];   ?></p>
                   </div>
             
              
              </div> -->
             
              <div class="pt-5">
              <h3>Reviews</h3>
              <span class="text-success" id="timeoutMessage"  ><?php echo isset($status)? $status: ""?></span>
               <hr class="mb-4" />
                
                <div class="card mb-4">
                    <div class="card-body">
                    <div class="row lg-mx-5">
                      <div class="col-md-4 mt-4 text-center sm-text-left md-mt-0 mb-2 md-mb-0">
                     <h3> <span id="average_rating">0.0</span>/5</h3>
                     <div class="mb-3" >
                      <?php 
                    // echo $conn->query("SELECT * FROM `course_reviews` WHERE courseId='$courseId'")
                      ?>
                      <small class="fas fa-star  star-light mr-1 main_star"></small>
                      <small class="fas fa-star star-light mr-1 main_star"></small>
                      <small class="fas fa-star star-light mr-1 main_star"></small>
                      <small class="fas fa-star star-light mr-1 main_star"></small>
                      <small class="fas fa-star star-light mr-1 main_star"></small>
                      <!-- <small>(123)</small> -->
                    </div>

                            <h3><span id="total_review">0
                       </span> Review</h3>
                      </div>
                      <div class="col-md-4 mt-3 md-mt-0" >
                        <div class="flex" style="display: flex; justify-content:space-between;">
                         <p>5 <small class="fas fa-star text-primary"></small> </p>
                         <p>(<span id="total_five_star_review"> 0</span>)</p>
                         </div>
                         <div class="progress mb-2">
                      <div class="progress-bar" role="progressbar"  aria-valuenow="0" aria-valuemin="0" id="five_star_progress"
                      aria-valuemax="100" ></div> </div>
                      <div class="flex" style="display: flex; justify-content:space-between;">
                         <p>4 <small class="fas fa-star text-primary"></small> </p>
                         <p>(<span id="total_four_star_review">0</span>)</p>
                         </div>
                         <div class="progress mb-2">
                      <div class="progress-bar" role="progressbar"  aria-valuenow="0" aria-valuemin="0" id="four_star_progress"
                      aria-valuemax="100" ></div> </div>
                      <div class="flex" style="display: flex; justify-content:space-between;">
                         <p>3 <small class="fas fa-star text-primary"></small> </p>
                         <p>(<span id="total_three_star_review">0</span>)</p>
                         </div>
                         <div class="progress mb-2">
                      <div class="progress-bar" role="progressbar"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"
                      aria-valuemax="100"></div> </div>
                      <div class="flex" style="display: flex; justify-content:space-between;">
                         <p>2 <small class="fas fa-star text-primary"></small> </p>
                         <p>(<span id="total_two_star_review">0</span>)</p>
                         </div>
                         <div class="progress mb-2">
                      <div class="progress-bar" role="progressbar"  aria-valuenow="0" aria-valuemin="0" id="two_star_progress"
                      aria-valuemax="100" ></div> </div>
                      <div class="flex" style="display: flex; justify-content:space-between;">
                         <p>1 <small class="fas fa-star text-primary"></small> </p>
                         <p>(<span id="total_one_star_review">0</span>)</p>
                         </div>
                         <div class="progress mb-2">
                      <div class="progress-bar" role="progressbar"  aria-valuenow="0" aria-valuemin="0" id="one_star_progress"
                      aria-valuemax="100" ></div> </div>
                        </div>
                     

                        <!-- <div class="col-md-4 text-center  mt-4 md-mt-0 mb-2 md-mb-0">
                        <h4 class="text-center">Write Review Here</h4>
                        <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                        </div> -->
                    </div>
                    </div>
                  </div>
              </div>

              
                  <div class="pt-5">
              <h3>User Reviews</h3>
               <hr class="mb-4" />
               
               <div class="row mt-4" id="review_content"></div>
              
                </div>
              
              </div>
              <div id="review_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Review</h5>
                    <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4">
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
                    <input type="hidden" name="courseId" id="courseId" value="<?php echo $row['videoId'] ?>">
                    <!-- <div class="form-group mb-4">
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                    </div> -->
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                    </div>
                </div>
            </div>
            </div>
             
              <!-- Examples -->
      
              <?php }}  ?>
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

    <script>
var rating_data = 0;
var courseId = <?php echo json_encode($_GET['videoId']); ?>;
// Function to load rating data

function load_rating_data() {
    $.ajax({
        url: "../student/submit_rating.php",
        method: "POST",
        data: { action: 'load_data', courseId: courseId },
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            $('#average_rating').text(data.average_rating);
            $('#total_review').text(data.total_review);

            var count_star = 0;

            $('.main_star').each(function () {
                count_star++;
                if (Math.ceil(data.average_rating) >= count_star) {
                    $(this).addClass('text-primary');
                    $(this).addClass('star-light');
                }
            });

            $('#total_five_star_review').text(data.five_star_review);
            $('#total_four_star_review').text(data.four_star_review);
            $('#total_three_star_review').text(data.three_star_review);
            $('#total_two_star_review').text(data.two_star_review);
            $('#total_one_star_review').text(data.one_star_review);

            $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');
            $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');
            $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');
            $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');
            $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');


            if (data.review_data.length > 0) {
                var html = '';

                for(var count = 0; count < data.review_data.length; count++)
                {
             
                    
                    html += '<div class="col-md-6 col-lg-4 mb-3">'
                    html += '<div class="card text-center  mb-3" style="display:flex;flex-direction:column; justify-content:center">';
                    html += '<div class="card-body text-center">';
                    // html += '';
                    html += '<div class="avatar rounded-circle "  style="position:inherit"> ';
                    html += '<img src="' + data.review_data[count].profilePic + '" alt="Profile Image" class=" img-fluid  rounded-circle text-center" ">'+data.review_data[count].user_name+'';
                    html += '</div>';
                    
                    for(var star = 1; star <= 5; star++)
                    {
                        var class_name = '';
                        if(data.review_data[count].rating >= star)
                        {
                            class_name = 'text-primary';
                        }
                        else
                        {
                            class_name = 'star-light';
                        }
                        html += '<i class="fas fa-star '+class_name+' mr-1 mt-4"></i>';
                    }
                    html += '<br />';
                    html += '<p class="card-text">'+data.review_data[count].user_review+'</p>';
                    html += '<div class="mb-1 text-right">On '+data.review_data[count].datetime+'</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    
                }
                $('#review_content').html(html);
            }
        }
    });
}

// Initial load of rating data when the page loads
$(document).ready(function () {
    load_rating_data();
});

$('#add_review').click(function () {
    $('#review_modal').modal('show');
});

$(document).on('mouseenter', '.submit_star', function () {
    var rating = $(this).data('rating');
    reset_background();
    for (var count = 1; count <= rating; count++) {
        $('#submit_star_' + count).addClass('text-primary');
    }
});

function reset_background() {
    for (var count = 1; count <= 5; count++) {
        $('#submit_star_' + count).addClass('star-light');
        $('#submit_star_' + count).removeClass('text-primary');
    }
}

$(document).on('mouseleave', '.submit_star', function () {
    reset_background();
    for (var count = 1; count <= rating_data; count++) {
        $('#submit_star_' + count).removeClass('star-light');
        $('#submit_star_' + count).addClass('text-primary');
    }
});

$(document).on('click', '.submit_star', function () {
    rating_data = $(this).data('rating');
});

$('#save_review').click(function () {
    // var user_name = $('#user_name').val();
    var user_review = $('#user_review').val();
    var courseId = $('#courseId').val();
    if (user_review == '' || rating_data == ''){
        alert("Please Fill Both Field");
        return false;
    } else {
        $.ajax({
            url: "../student/submit_rating.php",
            method: "POST",
            data: {rating_data: rating_data, courseId: courseId, user_review: user_review },
            success: function (data) {
                $('#review_modal').modal('hide');
                // Load rating data after the review is saved
                load_rating_data();
                alert(data);
            }
        });
    }
});
</script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php  include_once 'scripts.php'; ?>
  </body>
</html>
