<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Add Profile Details - TenBlog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Posts TenBlog" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?php include_once "includes/layout/header.php"; ?>
            
            <!-- ========== Left Sidebar Start ========== -->
           <?php include_once "includes/layout/sidebar.php"; ?>
            <!-- Left Sidebar End -->

            <?php  
            //get the form details and put inside the database
            if(isset($_POST['profile_addbtn'])){
            $admin_fullname = mysqli_real_escape_string($connect,filter_var($_POST['admin_fullname'],FILTER_SANITIZE_STRING));
            $admin_email = mysqli_real_escape_string($connect,filter_var($_POST['admin_email'],FILTER_SANITIZE_STRING));
            $admin_mobile = mysqli_real_escape_string($connect,filter_var($_POST['admin_mobile'],FILTER_SANITIZE_STRING));
            $admin_location = mysqli_real_escape_string($connect,filter_var($_POST['admin_location'],FILTER_SANITIZE_STRING));
            $admin_info = mysqli_real_escape_string($connect,filter_var($_POST['admin_info'],FILTER_SANITIZE_STRING));
            
                $admin_image = $_FILES['admin_image']['name'];
                $admin_tmp_image = $_FILES['admin_image']['tmp_name'];
                $destination = "assets/images/admins/" .$admin_image;
                $move_admin_image = move_uploaded_file($admin_tmp_image,$destination);
                if($move_admin_image){
                    $insert_admin_details_sql = "UPDATE admins SET fullname = '$admin_fullname', email = '$admin_email', mobile = $admin_mobile, location = '$admin_location',info = '$admin_info', image = '$admin_image' WHERE id = $user_id";
                    $insert_admin_details = mysqli_query($connect,$insert_admin_details_sql);
                    if($insert_admin_details){
                        $add_profile_details_msg = "<div class='bg-success text-white p-1'>Profile details added successfully. Click <a href='profile.php'>HERE</a> to go back to your profile.</div>";
                    }else{
                        $add_profile_details_msg = "<div class='bg-warning text-white p-1'>Error, please try again.</div>";
                    }
                }else{
                    $add_profile_details_msg = "upload image";
                }

            
        }else{
            $add_profile_details_msg = "";
        }

        //to get details for the edit page

        $check_admin_details_sql = "SELECT * FROM admins WHERE id = $user_id";
        $check_admin_details = mysqli_query($connect,$check_admin_details_sql);
           while($get_admin_row = mysqli_fetch_assoc($check_admin_details)){
                $get_admin_image = $get_admin_row['image'];
                $get_admin_fullname = $get_admin_row['fullname'];
                $get_admin_mobile = $get_admin_row['mobile'];
                $get_admin_email = $get_admin_row['email'];
                $get_admin_location = $get_admin_row['location'];
                $get_admin_info = $get_admin_row['info'];
            }
        
            //To edit profile 
            if(isset($_POST['profile_editbtn'])){
                $edit_admin_fullname = mysqli_real_escape_string($connect,filter_var($_POST['edit_admin_fullname'],FILTER_SANITIZE_STRING));
                $edit_admin_email = mysqli_real_escape_string($connect,filter_var($_POST['edit_admin_email'],FILTER_SANITIZE_STRING));
                $edit_admin_mobile = mysqli_real_escape_string($connect,filter_var($_POST['edit_admin_mobile'],FILTER_SANITIZE_STRING));
                $edit_admin_location = mysqli_real_escape_string($connect,filter_var($_POST['edit_admin_location'],FILTER_SANITIZE_STRING));
                $edit_admin_info = mysqli_real_escape_string($connect,filter_var($_POST['edit_admin_info'],FILTER_SANITIZE_STRING));
                $current_image = mysqli_real_escape_string($connect,filter_var($_POST['current_image'],FILTER_SANITIZE_STRING));
                $edit_admin_image = $_FILES['edit_admin_image']['name'];
                if(empty($edit_admin_image) || !isset($edit_admin_image)){
                    $edit_admin_image = $current_image;
                }else{
                    $edit_tmp_admin_image = $_FILES['edit_admin_image']['tmp_name'];
                    $edit_destination = "assets/images/admins/" .$edit_admin_image;
                    $move_edit_image = move_uploaded_file($edit_tmp_admin_image,$edit_destination);
                }
                    $submit_edit_details_sql = "UPDATE admins SET fullname = '$edit_admin_fullname', email = '$edit_admin_email', mobile = $edit_admin_mobile, location = '$edit_admin_location',info = '$edit_admin_info', image = '$edit_admin_image' WHERE id = $user_id";
                    $submit_edit_details = mysqli_query($connect,$submit_edit_details_sql);
                    if($submit_edit_details){
                        $add_profile_details_msg = "<div class='bg-success text-white p-1'>Profile details edited successfully. Click <a href='profile.php'>HERE</a> to go back to your profile.</div>";
                        
                    }else{
                        $add_profile_details_msg = "<div class='bg-warning text-white p-1'>Error, please try again.</div>";
                    }
                
            }
            
            ?>

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">PROFILE DETAILS</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php 
                            
                            if(!empty($get_admin_image) || !empty($get_admin_fullname) || !empty($get_admin_mobile) || !empty($get_admin_email) || !empty($get_admin_location)){
                                include_once "includes/profile/edit-profile-details.php";
                            }else{
                                include_once "includes/profile/add-profile-details.php";
                            }
                        ?>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

               
                
                <?php include_once "includes/layout/footer.php"; ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/ecommerce-orders.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Apr 2021 21:03:29 GMT -->
</html>
