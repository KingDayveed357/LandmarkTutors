// document.addEventListener('DOMContentLoaded', function () {
//     const stars = document.querySelectorAll('#stars i');
//     const ratingInput = document.getElementById('rating');
//     const reviewForm = document.getElementById('submitReviewForm');
//     const avgRatingElement = document.getElementById('avgRating');

//     stars.forEach(star => {
//         star.addEventListener('mouseenter', function () {
//             highlightStars(+this.dataset.rating, true);
//         });

//         star.addEventListener('mouseleave', function () {
//             highlightStars(+ratingInput.value, false);
//         });

//         star.addEventListener('click', function () {
//             ratingInput.value = this.dataset.rating;
//             highlightStars(+ratingInput.value, true);
//         });
//     });

//     reviewForm.addEventListener('submit', function (event) {
//         event.preventDefault();

//         const reviewText = document.getElementById('review').value;
//         const rating = ratingInput.value;

//         if (reviewText.trim() === '' || rating === '0') {
//             alert('Please provide a review and rating.');
//             return;
//         }

//         submitReview(reviewText, rating);
//     });

//     // Fetch and display average rating on page load
//     fetchAverageRating();
// });

// function highlightStars(rating, isYellow) {
//     const stars = document.querySelectorAll('#stars i');
//     stars.forEach(star => {
//         const starRating = +star.dataset.rating;
//         star.classList.toggle('text-warning', starRating <= rating);
//         star.classList.toggle('text-yellow', isYellow && starRating === rating);
//     });
// }

// function submitReview(review, rating) {
//     fetch('submit_review.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: `review=${encodeURIComponent(review)}&rating=${rating}`,
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.success) {
//             alert('Review submitted successfully!');
//             fetchAverageRating(); // Update average rating after submitting a review
//         } else {
//             alert('Failed to submit review.');
//         }
//     })
//     .catch(error => console.error('Error:', error));
// }

// function fetchAverageRating() {
//     fetch('get_average_rating.php')
//     .then(response => response.json())
//     .then(data => {
//         const averageRating = data.averageRating;
//         const avgRatingElement = document.getElementById('avgRating');
//         avgRatingElement.textContent = isNaN(averageRating) ? 'Not available' : `${averageRating.toFixed(1)} stars`;
//     })
//     .catch(error => console.error('Error:', error));
// }
