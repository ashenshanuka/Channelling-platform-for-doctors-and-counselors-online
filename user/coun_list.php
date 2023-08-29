<?php 
session_start();
include 'common/connect.php';
$result = $obj->query("SELECT d_id,f_name,l_name,pro_pic,expert FROM doc_pro ORDER BY d_id DESC");
//$row = $result->fetch_object();
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MindBoost - Counsellers</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <style>
  /* Fixed size for the team member images */
  .team-img img {
    width: 250px;
    height: 400px;
    object-fit: cover;
  }

  /* Fixed size for the team member cards */
  .team-member {
    max-width: 300px;
    margin: 0 auto;
  }
</style>

</head>

<body>
  <!--header-->
  <?php include 'common/header.php'; ?>
  <!--/header-->
  <section class="w3l-about-breadcrumb text-center">
  <div class="breadcrumb-bg breadcrumb-bg-about py-5">
      <div class="container py-lg-5 py-md-4">
        <div class="w3breadcrumb-gids">
          <div class="w3breadcrumb-left text-left">
                    <h2 class="title AboutPageBanner">
                Contact Us   </h2>
                              <p class="inner-page-para mt-2">
                                You Don't Have To Face Your Problems Alone. We Are Here To Help You.
                                             </p>
          </div>
          <div class="w3breadcrumb-right">
                <ul class="breadcrumbs-custom-path">
                  <li><a href="index.html">Home</a></li>
                  <li class="active"><span class="fas fa-angle-double-right mx-2"></span> Contact Us</li>
                </ul>
          </div>
    </div>
      </div>
      <div class="hero-overlay"></div>
  </div>
</section>
   
  <!-- breadcrumb -->
  <section class="w3l-about-breadcrumb text-center">

    <!-- ... (breadcrumb code continues) ... -->
  </section>
  <!--//breadcrumb-->

  <!-- Display team members' data here -->
  <section class="w3l-team-main team py-5" id="team">
    <div class="container py-lg-5">
      <h5 class="title-subw3hny mb-1 text-center">The Guided Compass: Navigating Life's Crossroads</h5>
      <h3 class="title-w3l text-center">Our Team</h3>
      <div class="row team-row mt-md-5 mt-4">

        <?php
        $count = 0; // Initialize a counter variable to keep track of the number of cards in the current row

        // Assuming you have fetched the data from the database and stored it in $result variable
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $fullName = $row['f_name'] . ' ' . $row['l_name'];
            $expert = $row['expert'];
            $profilePic = $row['pro_pic'];
            ?>
<div class="col-lg-4 col-6 team-wrap">
      <div class="team-member text-center">
        <div class="team-img">
          <img src="../doctor/monster-html/counpro_upload/<?php echo $profilePic; ?>" alt="Counseller Image" class="radius-image">
          <div class="overlay-team">
            <div class="team-details text-center">
              <div class="socials mt-20">
                <a href="#url">
                  <span class="fab fa-facebook-f"></span>
                </a>
                <a href="#url">
                  <span class="fab fa-twitter"></span>
                </a>
                <a href="#url">
                  <span class="fab fa-linkedin-in"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <a href="coun_view.php?d_id=<?php echo $row['d_id']; ?>" class="team-title"><?php echo $fullName; ?></a>
        <p>Specialized in <?php echo $expert; ?></p>
      </div>
    </div>


            <?php
            $count++;
            // If 4 cards are displayed in a row, start a new row
            if ($count % 4 === 0) {
              echo '</div><div class="row team-row mt-md-5 mt-4">';
            }
          }
        } else {
          echo "No counselors found.";
        }
        ?>

      </div>
    </div>
  </section>
  <!--//team-sec-->

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

</body>

</html>
