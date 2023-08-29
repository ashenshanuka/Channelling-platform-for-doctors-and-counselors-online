<?php 
session_start();
include 'common/connect.php';

$id = $_SESSION['user_id'];
$result = $obj->query("select * from appoinment where u_id = '$id'");
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
  <title>My appoinment</title>
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
                My appoinment   </h2>
                              <p class="inner-page-para mt-2">
                              Embark on a transformative journey with our compassionate counseling support!            </p>
          </div>
          <div class="w3breadcrumb-right">
                <ul class="breadcrumbs-custom-path">
                  <li><a href="index.html">Home</a></li>
                  <li class="active"><span class="fas fa-angle-double-right mx-2"></span> My appoinment</li>
                </ul>
          </div>
    </div>
      </div>
      <div class="hero-overlay"></div>
  </div>
</section>
<!--//breadcrumb-->
 <!-- contact-form 2 -->


 <section class="w3l-contact-2 py-5" id="contact">
  <div class="form-41-mian py-5">
    <div class="container py-lg-4">
      <div class="row align-form-map">
        <div class="title-content text-left">
          <h3 class="hny-title mb-lg-5 mb-4">Your Appointments</h3>
        </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">App. ID</th>
              <th scope="col">Counseller Name</th>
              <th scope="col">Description</th>
              <th scope="col">Status</th>
              <th scope="col">Booked Date</th>
              <th scope="col">Booked Time</th>
              <th scope="col">Pay Here</th>
              <th scope="col">Meeting Link</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while ($row = $result->fetch_object()) {
              // Fetch the doctor's name from the doctor table using the d_id from the appointment table
              $doctor_id = $row->d_id;
              $doctor_result = $obj->query("SELECT name, zoom FROM doctor WHERE d_id = '$doctor_id'");
              $doctor_row = $doctor_result->fetch_object();
              $doctor_name = $doctor_row ? $doctor_row->name : 'N/A';
              $meeting_link = $doctor_row ? $doctor_row->zoom : null;
            ?>
            <tr>
              <td><?php echo $row->b_id; ?></td>
              <td><?php echo $doctor_name; ?></td>
              <td><?php echo $row->msg; ?></td>
              <td><?php echo $row->status; ?></td>
              <td><?php echo $row->book_date; ?></td>
              <td><?php echo $row->book_time; ?></td>
              <?php if ($row->status == 'accepted' && $row->payment_status == 'pending') { ?>
                <!-- <td><a href="payment.php?a_id=<?php echo $row->b_id; ?>"><button class="btn btn-danger">Complete payment</button></a></td> -->

                <td><a href="payment.php?a_id=<?php echo $row->b_id; ?>&u_id=<?php echo $_SESSION['user_id']; ?>"><button class="btn btn-danger">Complete payment</button></a></td>

              <?php } elseif ($row->status == 'accepted' && $row->payment_status == 'completed') { ?>
                <td>Payment completed</td>
              <?php } elseif ($row->status == 'rejected') { ?>
                <td>Your appointment rejected by the doctor</td>
              <?php } ?>

              
              <td>
                <?php 
                  if ($row->status == 'accepted' && $row->payment_status == 'completed') {
                    echo '<a href="' . $meeting_link . '" target="_blank">Join Now</a>';
                  } else {
                    echo '  ';
                  }
                ?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
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

</body>

</html>