<?php 
session_start();
include 'common/connect.php';

if (isset($_GET['b_id'])) {
  $b_id = $_GET['b_id'];

//$id = $_SESSION['user_id'];
$result = $obj->query("SELECT b_id, tittle, image, des FROM blog WHERE b_id = '$b_id'");
//$row = $result->fetch_object();


if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $tittle = $row['tittle'];
  $image = $row['image'];
  $description = $row['des'];
} else {
  // Redirect to a not-found page or display an error message
  header("Location: not_found.php");
  exit();
}
} else {
// Redirect to a not-found page or display an error message
header("Location: not_found.php");
exit();

}

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
  <title>Blog view</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <style>
     .card-img-top {
            height: 400px;/* Set the desired height */
            object-fit: cover; /* Scale the image to cover the entire container */
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
                Blog   </h2>
                              <p class="inner-page-para mt-2">
                                You Don't Have To Face Your Problems Alone. We Are Here To Help You.
                                             </p>
          </div>
          <div class="w3breadcrumb-right">
                <ul class="breadcrumbs-custom-path">
                  <li><a href="index.html">Home</a></li>
                  <li class="active"><span class="fas fa-angle-double-right mx-2"></span> Blog</li>
                </ul>
          </div>
    </div>
      </div>
      <div class="hero-overlay"></div>
  </div>
</section>
<!-- breadcrumb -->
<section class="w3l-blog py-5" id="blog">
        <div class="container py-lg-5">
            <h2 class="title-w3l text-center"><?php echo $tittle; ?></h3>
            <div class="row blog-row mt-md-5 mt-4 justify-content-center">
                <div class="col-lg-8">
                <img src="../admin/monster-html/blog_upload/<?php echo $row['image']; ?>" alt="Blog Image" class="card-img-top">

                    <p><?php echo nl2br($description); ?></p>
                </div>
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

</body>

</html>