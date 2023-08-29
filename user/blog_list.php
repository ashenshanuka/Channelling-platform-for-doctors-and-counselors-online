<?php 
session_start();
include 'common/connect.php';
$result = $obj->query("SELECT b_id, tittle, image, des FROM blog ORDER BY b_id DESC");
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
  <title>Blog List</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <style>
        /* Adjust card height to make them the same size */
        .card {
            height: 100%;
           
            
        }
        .card-img-top {
            height: 200px; /* Set the desired height */
            object-fit: cover; /* Scale the image to cover the entire container */
        }

        /* Limit description to 4 lines and add ellipsis for overflow */
        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Overlay with light red color on hover */
        .card:hover {
            background-color: rgba(255, 0, 0, 0.1);
        }
    </style>
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
                  About Us   </h2>
                              <p class="inner-page-para mt-2">
                              Healing Hearts, 
                              Restoring Hope.           </p>
          </div>
          <div class="w3breadcrumb-right">
                <ul class="breadcrumbs-custom-path">
                  <li><a href="index.html">Home</a></li>
                  <li class="active"><span class="fas fa-angle-double-right mx-2"></span> About Us</li>
                </ul>
          </div>
    </div>
      </div>
      <div class="hero-overlay"></div>
  </div>
</section>
<!--//breadcrumb-->
<!--/w3l-aboutblock1-->
<section class="w3l-blog py-5" id="blog">
        <div class="container py-lg-5">
            <h5 class="title-subw3hny mb-1 text-center">Finding Serenity in Self-Discovery"</h5>
            <h3 class="title-w3l text-center">Inner Harmony-Our Blog</h3>
            <div class="row blog-row mt-md-5 mt-4">

                <?php
                $count = 0; // Initialize a counter for tracking the number of cards in a row
                // Display blog posts on the page
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Get first 4 lines of the description
                        $description_lines = explode("\n", $row['des']);
                        $short_description = implode("<br>", array_slice($description_lines, 0, 4));
                ?>

                        <!-- Blog Card -->
                        <div class="col-lg-4 col-6 team-wrap">
                            <div class="card">
                                <img src="../admin/monster-html/blog_upload/<?php echo $row['image']; ?>" alt="Blog Image" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="team-title"><?php echo $row['tittle']; ?></h5>
                                    <p class="card-text"><?php echo $short_description; ?></p>
                                    <a href="blog_view.php?b_id=<?php echo $row['b_id']; ?>" class="btn btn-danger">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Blog Card -->

                <?php
                        $count++;
                        // If 4 cards are displayed in a row, start a new row
                        if ($count % 4 === 0) {
                            echo '</div><div class="row blog-row mt-md-5 mt-4">';
                        }
                    }
                } else {
                    echo "No blog posts found.";
                }

                // Close the database connection
                $obj->close();
                ?>

            </div>
        </div>
    </section>
<!-- /contact-form-2 -->

  <!-- /contact1 -->
 <!--/footer-->
<?php include 'common/footer.php'; ?>
<!-- //footer -->
<!-- copyright -->

<!-- //copyright -->
<!--//footer-->
<!-- Template JavaScript -->
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