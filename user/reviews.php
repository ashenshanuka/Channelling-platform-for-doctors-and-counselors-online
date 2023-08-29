<!-- reviews.php -->

<?php

// Include the common/connect.php file if not already included
if (!isset($obj)) {
    include 'common/connect.php';
}

// Handle review submission
if (isset($_POST['submit_review'])) {
    $u_id = $_SESSION['user_id'];
    $d_id = $_GET['d_id'];
    $comment = $_POST['comment'];
    $created_at = date('Y-m-d H:i:s');

    // Fetch user's name from the user table based on the user_id
    $fetch_name_query = "SELECT name FROM user WHERE u_id = '$u_id'";
    $result = $obj->query($fetch_name_query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];

        // Insert the review data into the reviews table
        $insert_review_query = "INSERT INTO reviews (u_id, d_id, name, comment, created_at) VALUES ('$u_id', '$d_id', '$name', '$comment', '$created_at')";
        $obj->query($insert_review_query);
    }
    
     
}

?>

<!-- Reviews Section -->
<section class="reviews-section py-5">
    <div class="container">
        <!-- Add Review Button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addReviewModal">
            Add Review
        </button>

        <!-- Review Cards -->
        <div class="row mt-4">
            <?php
            // Fetch reviews for the specific d_id
            $d_id = $_GET['d_id'];
            $fetch_reviews_query = "SELECT name, comment, created_at FROM reviews WHERE d_id = '$d_id' ORDER BY created_at DESC";
            $result = $obj->query($fetch_reviews_query);
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $comment = $row['comment'];
                $created_at = $row['created_at'];
            ?>
                <!-- Review Card -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                        <h6 class="card-text"><span style="color: red;"><strong><?php echo $name; ?></strong></span></h6>

                            <h5 class="card-tittle"><strong><em><q><?php echo $comment; ?></q></em></strong></p></h5>

                       

                            <p class="card-text"><small class="text-muted"><?php echo $created_at; ?></small></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Add Review Modal -->
<div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addReviewModalLabel">Add Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Review Form -->
                <form action="" method="post">
            <!-- Remove the name input field since it will be fetched automatically -->
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
            </div>
            <button type="submit" name="submit_review" class="btn btn-primary">Submit</button>
        </form>
            </div>
        </div>
    </div>
</div>