<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Add Comment - KunBlog</title>
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
            if(isset($_POST['comment_addbtn'])){
            $comment_name = mysqli_real_escape_string($connect,filter_var($_POST['comment_name'],FILTER_SANITIZE_STRING));
            $comment_email = mysqli_real_escape_string($connect,filter_var($_POST['comment_email'],FILTER_SANITIZE_STRING));
            $comment_content = mysqli_real_escape_string($connect,filter_var($_POST['comment_content'],FILTER_SANITIZE_STRING));
            $comment_post_id = mysqli_real_escape_string($connect,filter_var($_POST['comment_post'],FILTER_SANITIZE_STRING));

            
                    $insert_comment_sql = "INSERT INTO comments(name,email,comment,post_id) VALUES('$comment_name','$comment_email','$comment_content',$comment_post_id) ";
                    $insert_comment = mysqli_query($connect,$insert_comment_sql);
                    if($insert_comment){
                        $add_comment_msg = "<div class='bg-success text-white p-1'>Comment added successfully. Click <a href='comments.php'>HERE</a> to view all comments.</div>";
                         //insert the details inside the notification table
                         $submit_comment_not_sql = "INSERT INTO notifications(title,type,content) VALUES('New comment from: $comment_name','comment','$comment_content')";
                         $submit_comment_not = mysqli_query($connect,$submit_comment_not_sql);
                    }else{
                        $add_comment_msg = "<div class='bg-warning text-white p-1'>Error, try again.</div>";
                    }
               

            
        }else{
            $add_comment_msg = "";
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
                                    <h4 class="mb-sm-0 font-size-18">ADD COMMENTS</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="card">
                                    

                                    <div class="card-body">
    
                
                                            <h4 class="card-title mb-4">Add New Comment</h4>
                                            <?php echo $add_comment_msg; ?>
                                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                                                <div class="row">
                                                    
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Name</label>
                                                            <input type="text" class="form-control" required name="comment_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Email</label>
                                                            <input type="email" class="form-control" required name="comment_email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-password-input" class="form-label">Comment</label>
                                                            <textarea class="form-control" required name="comment_content"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Post:</label>
                                                            <select name="comment_post" id="" class="form-control">
                                                                <?php
                                                                $get_post_info_sql = "SELECT * FROM posts";
                                                                $get_post_info = mysqli_query($connect,$get_post_info_sql);
                                                                while($all_posts = mysqli_fetch_assoc($get_post_info)){
                                                                    $post_title = $all_posts['title'];
                                                                    $post_id = $all_posts['id'];
                                                                 
                                                                
                                                                ?>
                                                                <option value="<?php echo $post_id; ?>"><?php echo $post_title; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md" name="comment_addbtn">Add Comment</button>
                                                </div>
                                            </form>
                                        </div>
    
                         </div>
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
