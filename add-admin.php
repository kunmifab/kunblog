<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Add Admin - KunBlog</title>
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
            if(isset($_POST['admin_addbtn'])){
            $add_admin_username = mysqli_real_escape_string($connect,filter_var($_POST['admin_username'],FILTER_SANITIZE_STRING));
            $add_admin_role = mysqli_real_escape_string($connect,filter_var($_POST['admin_role'],FILTER_SANITIZE_STRING));
            $admin_password1 = $_POST['admin_password1'];
            $admin_password2 = $_POST['admin_password2'];
                
                if(strlen($admin_password1) < 7 || strlen($admin_password2) < 7){
                    $add_admin_msg = "<div class='bg-danger p-2 text-white mb-2'>Sorry, the password must be up to 7 characters. Please try again!</div>";
                }elseif($admin_password1 != $admin_password2){
                    $add_admin_msg = "<div class='bg-danger p-2 text-white mb-2'>Sorry, the passwords must be the same. Please try again!</div>";
                }else{
                    //check if there is an existing username
                    $check_existing_admin_sql = "SELECT * FROM admins WHERE username = '$add_admin_username'";
                    $check_existing_admin = mysqli_query($connect,$check_existing_admin_sql);
                    if(mysqli_num_rows($check_existing_admin) > 0){
                        $add_admin_msg = "<div class='bg-danger p-2 text-white mb-2'>The admin with the username <b>'$add_admin_username'</b> already exists, please try another username.</div>";
                    }else{
                        $final_admin_pwd = password_hash($admin_password1,PASSWORD_BCRYPT,array("cost"=>10));
                        $submit_admin_details_sql = "INSERT INTO admins(username,password,role) VALUES('$add_admin_username','$final_admin_pwd','$add_admin_role')";
                        $submit_admin_details = mysqli_query($connect,$submit_admin_details_sql);
                        if($submit_admin_details){
                            $add_admin_msg = "<div class='bg-success p-2 text-white mb-2'>Admin with the username <b>'$add_admin_username'</b> has been created successfully. Click <a href='view-admins.php'>HERE</a> to view all admins.</div>";
                        }else{
                            $add_admin_msg = "<div class='bg-danger p-2 text-white mb-2'>An error occurred, please try again later.</div>"; 
                        }
                    }
                }
            }else{
                $add_admin_msg = "";
            }
        
            
            ?>

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <?php if($user_role == "superadmin"){?>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">ADD ADMIN</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="card">
                                    

                                    <div class="card-body">
    
                
                                            <h4 class="card-title mb-4">Add New Admin</h4>
                                            <?php echo $add_admin_msg; ?>
                                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Username</label>
                                                            <input type="text" class="form-control" required name="admin_username">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Password</label>
                                                            <input type="password" class="form-control" required name="admin_password1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Confirm Password</label>
                                                            <input type="password" class="form-control" required name="admin_password2">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" >Admin Role:</label>
                                                            <select name="admin_role" class="form-control">
                                                                <option value="superadmin">Super-admin</option>
                                                                <option value="editor">Editor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md" name="admin_addbtn">Add Admin</button>
                                                </div>
                                            </form>
                                        </div>
    
                         </div>
                        <!-- end row -->
                        <?php }else{ echo "<div class='bg-danger text-white p-5 text-center'> <b>You are not allowed to view this. Contact the Superadmin to inquire about this.</b></div>";}?>
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
