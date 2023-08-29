<?php
session_start();

include 'common/connect.php';

// Assuming you have received the counselor's ID as a parameter
if (isset($_GET['d_id'])) {
  $d_id = $_GET['d_id'];

  // Fetch counselor's data from the database based on the ID
  $result = $obj->query("SELECT d_id, f_name, l_name, pro_pic, expert, age, address, des FROM doc_pro WHERE d_id = '$d_id'");
  $row = $result->fetch_assoc();

    // Fetch the email from the doctor table based on the ID
    $doctor_email = '';
    $doctor_result = $obj->query("SELECT email FROM doctor WHERE d_id='$d_id'");
    if ($doctor_result && $doctor_result->num_rows > 0) {
        $doctor_data = $doctor_result->fetch_assoc();
        $doctor_email = $doctor_data['email'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MindBoost - Counselor Details</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
  <!--header-->
  <?php include 'common/header.php'; ?>
  <!--/header-->
  <!-- breadcrumb -->
  <section class="w3l-about-breadcrumb text-center">
  <div class="breadcrumb-bg breadcrumb-bg-about py-5">
      <div class="container py-lg-5 py-md-4">
        <div class="w3breadcrumb-gids">
          <div class="w3breadcrumb-left text-left">
                    <h2 class="title AboutPageBanner">
                   <?php echo $row['f_name']; ?>'s Profile </h2>
                              <p class="inner-page-para mt-2">
                              Healing Hearts, 
                              Restoring Hope.           </p>
          </div>
          <div class="w3breadcrumb-right">
                <ul class="breadcrumbs-custom-path">
                  <li><a href="index.html">Home</a></li>
                  <li class="active"><span class="fas fa-angle-double-right mx-2"></span><?php echo $row['f_name']; ?>'s  Profile</li>
                </ul>
          </div>
    </div>
      </div>
      <div class="hero-overlay"></div>
  </div>
  <section class="w3l-about-breadcrumb text-center">
    <!-- ... (breadcrumb code continues) ... -->
  </section>
  <!--//breadcrumb-->

  <!-- Counselor Details -->
  <section class="w3l-team-main team py-5">
  <div class="container py-lg-5">
    <div class="row team-row">
      <div class="col-md-6 mx-auto">
        <div class="card text-center" style="border-radius: 55px;">
          <div class="card-img-top d-flex justify-content-center" style="height: 350px; overflow: hidden;">
            <!-- Change the background-image URL to the counselor's profile image -->
            <div style="background-image: url('../doctor/monster-html/counpro_upload/<?php echo $row['pro_pic']; ?>'); background-size: cover; width: 55%; height: 150%; border-radius: 15px; background-position: top center;" ></div>
          </div>
          <div class="card-body">
            <h4 class="card-title"><strong><?php echo $row['f_name'] . ' ' . $row['l_name']; ?></strong></h4>
            <p class="card-text">Specialized in <?php echo $row['expert']; ?></p>
            <!-- Add the "Book Appointment" button below the image -->
            <a href="coun_app.php?d_id=<?php echo $row['d_id']; ?>" class="btn btn-primary btn-lg">Book an appointment<br> with <?php echo $row['f_name']; ?></a>
          </div>
          <ul class="list-group list-group-flush">
           
            <li class="list-group-item"><strong>Age: </strong><?php echo $row['age']; ?></li>
            <li class="list-group-item"><strong>Email: </strong><?php echo $doctor_email; ?></li>
            <li class="list-group-item"><strong>Address:</strong> <?php echo $row['address']; ?></li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <!-- Display the counselor's description on the right side -->
        <p class="text-center"><?php echo $row['des']; ?></p>
      </div>
    </div>
  </div>
</section>

 <!-- Include the reviews section -->
 <?php
    // Check if a review was successfully submitted (using POST-Redirect-GET pattern)
    $review_submitted = isset($_GET['review_submitted']) && $_GET['review_submitted'] === 'true';

    // Include the reviews.php file only if a review was submitted or if there is a valid "d_id" in the URL
    if ($review_submitted || isset($_GET['d_id'])) {
        include 'reviews.php';
    }
    ?>
  <!--/footer-->
  <?php include 'common/footer.php'; ?>
  <!-- //footer -->

  <!-- ... (remaining code continues) ... -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/theme-change.js"></script>
<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->

<!--/MENU-JS-->
<script>
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
      $("#site-header").addClass("nav-fixed");
    } else {
      $("#site-header").removeClass("nav-fixed");
    }
  });

  //Main navigation Active Class Add Remove
  $(".navbar-toggler").on("click", function () {
    $("header").toggleClass("active");
  });
  $(document).on("ready", function () {
    if ($(window).width() > 991) {
      $("header").removeClass("active");
    }
    $(window).on("resize", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
    });
  });
</script>
<!--//MENU-JS-->
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>