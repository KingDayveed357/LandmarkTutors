<?php 
include_once 'header.php';
include './student/functions.php';
?>

<body>

    <?php include_once 'navbar.php'; ?>

    <div class="container-xxl py-5">
        <h6 class="text-muted">Available Courses</h6>
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" id="myTabs" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                        <i class="tf-icons bx bx-home"></i> Lecture-note
                        <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
                        <i class="tf-icons bx bx-user"></i> Past-questions
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">
                        <i class="tf-icons bx bx-message-square"></i> Video-lectures
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                    <div class="row mt-5 g-4 justify-content-center">
                        <?php 
                        $sql = $conn->query(" SELECT * FROM `course-note` ORDER BY id DESC");
                        if ($sql->num_rows > 0) {
                            while ($row = $sql->fetch_assoc()) {
                                $courseId = $row['courseId'];
                        ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s" data-course-id="<?php echo $courseId; ?>">
                        <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid "  style="width:100%; height:250px"   src="./course-pic/<?php echo $row['coursePic']; ?>" alt="">
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
                            <h5 class="mb-4"><?php echo $row['title']; ?></h5>
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
                        <?php }} else { ?>
                            <h5 colspan='6' class="text-bold">
                                <span style="color:red;"> No course yet!!</span>
                            </h5>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                <div class="row mt-5 g-4 justify-content-center">
                        <?php 
                        $sql = $conn->query(" SELECT * FROM `past-questions` ORDER BY id DESC");
                        if ($sql->num_rows > 0) {
                            while ($row = $sql->fetch_assoc()) {
                                $courseId = $row['questionsId'];
                        ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s" data-course-id="<?php echo $courseId; ?>">
                        <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid "  style="width:100%; height:250px"   src="./course-pic/<?php echo $row['coursePic']; ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="./student/purchase-past-questions" class="flex-shrink-0 btn btn-sm btn-primary px-3 " >Buy Course</a>
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
                            <h5 class="mb-4"><?php echo $row['title']; ?></h5>
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
                        <?php }} else { ?>
                            <h5 colspan='6' class="text-bold">
                                <span style="color:red;"> No course yet!!</span>
                            </h5>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                <div class="row mt-5 g-4 justify-content-center">
                        <?php 
                        $sql = $conn->query(" SELECT * FROM `video-lectures` ORDER BY id DESC");
                        if ($sql->num_rows > 0) {
                            while ($row = $sql->fetch_assoc()) {
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
                        <?php }} else { ?>
                            <h5 colspan='6' class="text-bold">
                                <span style="color:red;"> No course yet!!</span>
                            </h5>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-oGiSL0zHx6OQRddqO3KqQIEd/2VeRFDL9R8DodOm5yb9tcMH48QT5b7NTOew7F5b" crossorigin="anonymous"></script>

</body>

</html>
