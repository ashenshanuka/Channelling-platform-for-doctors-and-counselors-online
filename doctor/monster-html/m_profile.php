<?php
session_start();
include 'common/connect.php';

// Get the counselor's ID from the session
$id = $_SESSION['doctor_id'];

// Initialize the $counselor variable
$counselor = null;

// Retrieve counselor profile data
$result = $obj->query("SELECT * FROM doc_pro WHERE d_id='$id'");
if ($result && $result->num_rows > 0) {
    $counselor = $result->fetch_object();
}




// Handle the form submission
if (isset($_POST['submit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $expert = $_POST['expert'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $des = $_POST['des'];

    // Check if the counselor profile already exists in the database
    if ($counselor) {
        // Update counselor profile if it exists
        $stmt = $obj->prepare("UPDATE doc_pro SET f_name=?, l_name=?, expert=?, age=?, address=?, des=? WHERE d_id=?");
        $stmt->bind_param("sssisss", $f_name, $l_name, $expert, $age, $address, $des, $id);
    } else {
        // Insert new counselor profile if it doesn't exist
        $stmt = $obj->prepare("INSERT INTO doc_pro (d_id, f_name, l_name, expert, age, address, des) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssiss", $id, $f_name, $l_name, $expert, $age, $address, $des);
    }

    if ($stmt->execute()) {
        // Upload profile picture
        $filename = $_FILES['pro_pic']['name'];
        $tmp = $_FILES['pro_pic']['tmp_name'];
        $path = "counpro_upload/$filename";
        move_uploaded_file($tmp, $path);

        // Save profile picture file path in the database
        $pro_pic = $filename;
        $stmt_update_pic = $obj->prepare("UPDATE doc_pro SET pro_pic=? WHERE d_id=?");
        $stmt_update_pic->bind_param("si", $pro_pic, $id);
        $stmt_update_pic->execute();

        echo "<script>alert('Counselor profile saved successfully');window.location='m_profile.php';</script>";
    } else {
        echo "<script>alert('Error');</script>";
    }
}
?>





<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Manage Profile-Counseller</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
    /* Your existing CSS styles */

    /* Custom style for the blue button */
    .btn-blue {
        background-color: #017ABD;
        color: #fff;
    }

    .profile-picture {
    width: 200px; /* Adjust the width to your preferred fixed size */
    height: 300px; /* Adjust the height to your preferred fixed size */
    object-fit: cover; 
    border: 2px solid black;
    border-radius: 6%;
  }

</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include 'common/header.php' ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'common/sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Manage Profile-Counseller</Profile-Counseller></h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Counseller's Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                 
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
          
                <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="mt-4 mb-4">Manage Counselor Profile</h1>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="f_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter first name"
                            value="<?php echo $counselor ? $counselor->f_name : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="l_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter last name"
                            value="<?php echo $counselor ? $counselor->l_name : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="expert" class="form-label">Expertise</label>
                        <input type="text" class="form-control" id="expert" name="expert" placeholder="Enter expertise"
                            value="<?php echo $counselor ? $counselor->expert : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Enter age"
                            value="<?php echo $counselor ? $counselor->age : ''; ?>">
                    </div>
                   
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address"
                            value="<?php echo $counselor ? $counselor->address : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="des" class="form-label">Description</label>
                        <textarea class="form-control" id="des" name="des" placeholder="Enter description"
                            rows="15"><?php echo $counselor ? $counselor->des : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pro_pic" class="form-label">Upload Profile Picture</label>
                        <input type="file" class="form-control" id="pro_pic" name="pro_pic" accept="image/*">
                    </div>
                    <!-- <button type="submit" class="btn btn-primary" name="submit" id="submit">Save Profile</button> -->
                    <button type="submit" class="btn btn-primary btn-blue" name="submit" id="submit">Save Profile</button>
                </form>
            </div>
            <?php if ($counselor && !empty($counselor->pro_pic)) { ?>
                <div class="col-lg-3">
                    <!-- <h4>Profile Picture</h4> -->
                    <img src="counpro_upload/<?php echo $counselor->pro_pic; ?>" alt="Profile Picture" class="profile-picture">
                </div>
            <?php } ?>
        </div>
    </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'common/footer.php'; ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>