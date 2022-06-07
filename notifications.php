<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Add Post - KunBlog</title>
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
            if(isset($_POST['post_addbtn'])){
            $post_title = mysqli_real_escape_string($connect,filter_var($_POST['post_title'],FILTER_SANITIZE_STRING));
            $post_content = mysqli_real_escape_string($connect,filter_var($_POST['post_content'],FILTER_SANITIZE_STRING));
            $post_cat_id = mysqli_real_escape_string($connect,filter_var($_POST['post_cat'],FILTER_SANITIZE_STRING));
            $post_status_id = mysqli_real_escape_string($connect,filter_var($_POST['post_status'],FILTER_SANITIZE_STRING));

            $check_existing_post_sql = "SELECT * FROM posts WHERE title = '$post_title'";
            $check_existing_post = mysqli_query($connect,$check_existing_post_sql);
            if(mysqli_num_rows($check_existing_post) > 0){
                $add_post_msg = "<div class='bg-danger'>The post with the title name <b>'$post_title'</b> already exists, please try another title name.</div>";
            }else{
                $post_image = $_FILES['post_image']['name'];
                $post_tmp_image = $_FILES['post_image']['tmp_name'];
                $destination = "assets/images/blog/" .$post_image;
                $move_image = move_uploaded_file($post_tmp_image,$destination);
                if($move_image){
                    $insert_post_sql = "INSERT INTO posts(title,content,cat_id,image,status_id,author_id) VALUES('$post_title','$post_content',$post_cat_id,'$post_image',$post_status_id,$user_id) ";
                    $insert_post = mysqli_query($connect,$insert_post_sql);
                    if($insert_post){
                        $add_post_msg = "<div class='bg-success text-white p-1'>Post added successfully. Click <a href='posts.php'>HERE</a> to view all posts.</div>";
                         //insert the details inside the notification table
                         $submit_post_not_sql = "INSERT INTO notifications(title,type,content,image) VALUES('New Post: $post_title','post','$post_content','$post_image')";
                         $submit_post_not = mysqli_query($connect,$submit_post_not_sql);
                    }else{
                        $add_post_msg = "<div class='bg-warning text-white p-1'>Error, try again.</div>";
                    }
                }else{
                    $add_post_msg = "upload image";
                }

            }
        }else{
            $add_post_msg = "";
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
                                    <h4 class="mb-sm-0 font-size-18">ALL NOTIFICATIONS</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="card">
                                    

                                    <div class="card-body">

                                    <?php
                                    $get_all_not_details_sql = "SELECT * FROM notifications";
                                    $get_all_not_details = mysqli_query($connect,$get_all_not_details_sql);
                                    if(mysqli_num_rows($get_all_not_details) < 1){
                                        echo "No notifications yet";
                                    }else{
                                        while($not_details = mysqli_fetch_assoc($get_all_not_details)){
                                            $all_not_title = $not_details['title'];
                                            $all_not_content = $not_details['content'];
                                            $all_not_image = $not_details['image'];
                                            $all_not_time = $not_details['time'];
                                            $all_not_type = $not_details['type'];

                                            if($all_not_type == "comment"){
                                                $all_image_not = "
                                                
                                                <div class='avatar-xs me-3'>
                                                    <span class='avatar-title bg-success rounded-circle font-size-16'>
                                                        <i class='bx bx-comment-dots'></i>
                                                    </span>
                                                </div>
                                                
                                                ";
                                            }else{
                                                $all_image_not= " <img src='assets/images/blog/$all_not_image' class='me-3 rounded-circle avatar-xs' alt='user-pic'>";
                                            }



                                           
                                            function get_time_ago( $time )
                                            {
                                                $time_difference = time() - $time;
                                            
                                                if( $time_difference < 1 ) { return 'less than 1 second ago'; }
                                                $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                                                            30 * 24 * 60 * 60       =>  'month',
                                                            24 * 60 * 60            =>  'day',
                                                            60 * 60                 =>  'hour',
                                                            60                      =>  'minute',
                                                            1                       =>  'second'
                                                );
                                            
                                                foreach( $condition as $secs => $str )
                                                {
                                                    $d = $time_difference / $secs;
                                            
                                                    if( $d >= 1 )
                                                    {
                                                        $t = round( $d );
                                                        return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
                                                    }
                                                }
                                            }

                                           
                                    ?>
                
                                    <a href="#" class="text-reset notification-item">
                                        <div class="media">
                                        <?php echo $all_image_not;?>
                                                
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1"><?php echo $all_not_title;?></h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-occidental"><?php echo $all_not_content;?></p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago"><?php echo get_time_ago( time()- $all_not_time).'<br>';?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php }}?>
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
