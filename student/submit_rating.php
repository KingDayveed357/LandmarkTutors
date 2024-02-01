<?php
include 'config.php';

if (isset($_POST["rating_data"]) ) {
    $course_reviewsId = rand(100000, 999999);
    $user_rating = $_POST["rating_data"];
    $user_review = $_POST["user_review"];
    $datetime = date("Y-m-d H:i:s");
    $courseId = $_POST["courseId"];

    $studentId = $_SESSION['studentId'];
    $studentSql = $conn->query("SELECT * FROM student WHERE studentId='$studentId'");
    if ($studentSql->num_rows > 0) {
        while ($row = $studentSql->fetch_assoc()) {
            $acctName = $row['name'];
            $profile = $row['user_img'];
        }
    }
    $stmt = $conn->prepare("INSERT INTO `course_reviews` (course_reviewId, courseId, profilePic, user_review, user_name, user_rating, datetime) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param('issssss', $course_reviewsId, $courseId, $profile, $user_review, $acctName, $user_rating, $datetime);
    if ($stmt->execute()) {
        echo "Your Review & Rating Successfully Submitted";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

}

if (isset($_POST["action"])) {
    $courseId = $_POST["courseId"];
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    $review_content = array();

    $result = $conn->query("SELECT * FROM `course_reviews` WHERE courseId='$courseId' ORDER BY id DESC");
    while ($row = $result->fetch_assoc()) {
        $review_content[] = array(
            'courseId' => $row["courseId"],
            'user_name' => $row["user_name"],
            'profilePic' => $row["profilePic"],
            'user_review' => $row["user_review"],
            'rating' => $row["user_rating"],
            'datetime' => $row["datetime"]
        );

        if ($row["user_rating"] == '5') {
            $five_star_review++;
        }

        if ($row["user_rating"] == '4') {
            $four_star_review++;
        }

        if ($row["user_rating"] == '3') {
            $three_star_review++;
        }

        if ($row["user_rating"] == '2') {
            $two_star_review++;
        }

        if ($row["user_rating"] == '1') {
            $one_star_review++;
        }

        $total_review++;

        $total_user_rating = $total_user_rating + $row["user_rating"];
    }

    $average_rating = $total_user_rating / $total_review;

    $output = array(
        'average_rating' => number_format($average_rating, 1),
        'total_review' => $total_review,
        'five_star_review' => $five_star_review,
        'four_star_review' => $four_star_review,
        'three_star_review' => $three_star_review,
        'two_star_review' => $two_star_review,
        'one_star_review' => $one_star_review,
        'review_data' => $review_content
    );

    echo json_encode($output);
}
?>
