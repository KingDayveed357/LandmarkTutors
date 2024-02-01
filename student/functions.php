<?php

function getStarsAndRating($conn, $courseId) {
    $starsHtml = '';

    // Fetch the average rating and other data for the course
    $result = $conn->query("SELECT * FROM `course_reviews` WHERE courseId='$courseId' ORDER BY id ASC");

    // Calculate average rating and other statistics
    $average_rating = 0; // Initialize to avoid potential errors
    $total_review = 0;
    $total_user_rating = 0;

    while ($row = $result->fetch_assoc()) {
        $total_review++;
        $total_user_rating += $row["user_rating"];
    }

    if ($total_review > 0) {
        $average_rating = $total_user_rating / $total_review;
    }

    // Add stars to the HTML string
    $count_star = 0;
    for ($i = 1; $i <= 5; $i++) {
        $count_star++;
        $starsHtml .= '<small class="fas fa-star star-light mr-1 main_star';
        if (ceil($average_rating) >= $count_star) {
            $starsHtml .= ' text-primary';
        }
        $starsHtml .= '"></small>';
    }

    // Display the average rating
    $starsHtml .= '<small>(' . number_format($average_rating, 1) . '/5)</small>';

    return $starsHtml;
}
