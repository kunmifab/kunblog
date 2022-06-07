<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Posts - KunBlog</title>
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
            //for deleting a post
            if(isset($_GET['delid'])){
                $delete_post_id = mysqli_real_escape_string($connect,filter_var($_GET['delid'],FILTER_SANITIZE_STRING));
                $check_post_sql = "SELECT * FROM posts WHERE id = $delete_post_id";
                $check_post = mysqli_query($connect,$check_post_sql);
                if(mysqli_num_rows($check_post) == 1){
                    $delete_post_sql = "DELETE FROM posts WHERE id = $delete_post_id";
                    $delete_post = mysqli_query($connect,$delete_post_sql);
                    if($delete_post){
                        $delete_msg = "<div class='bg-success text-white p-2 mb-1'>Post has been deleted successfully.</div>";
                    }else{
                        $delete_msg = "<div class='bg-warning text-white p-2 mb-1'>An error occured. Please try again later.</div>";
                    }
                }else{
                    $delete_msg = "";
                }
            }else{
                $delete_msg = "";
            }

            //for editing post
            
           
             

            if(isset($_POST['post_editbtn'])){
                $get_post_id = mysqli_real_escape_string($connect,filter_var($_POST['post_id'],FILTER_SANITIZE_STRING));
                $edit_post_title = mysqli_real_escape_string($connect,filter_var($_POST['edit_post_title'],FILTER_SANITIZE_STRING));
                $edit_post_content = mysqli_real_escape_string($connect,filter_var($_POST['edit_post_content'],FILTER_SANITIZE_STRING));
                $edit_post_cat_id = mysqli_real_escape_string($connect,filter_var($_POST['edit_post_cat'],FILTER_SANITIZE_STRING));
                $edit_post_status_id = mysqli_real_escape_string($connect,filter_var($_POST['edit_post_status'],FILTER_SANITIZE_STRING));
                $current_image = mysqli_real_escape_string($connect,filter_var($_POST['current_image'],FILTER_SANITIZE_STRING));
                
                
                    $edit_post_image = $_FILES['edit_post_image']['name'];
                    if(empty($edit_post_image) || !isset($edit_post_image)){
                        $edit_post_image = $current_image;
                    }else{
                    $edit_tmp_post_image = $_FILES['edit_post_image']['tmp-name'];
                    $edit_destination = "assets/images/blog/" .$edit_post_image;
                    $edit_move_image = move_uploaded_file($edit_tmp_post_image,$edit_destination);
                    }

                        $edit_posts_sql = "UPDATE posts SET title = '$edit_post_title', content = '$edit_post_content', cat_id = $edit_post_cat_id, status_id = $edit_post_status_id, image = '$edit_post_image' WHERE id = $get_post_id";
                        $edit_posts = mysqli_query($connect,$edit_posts_sql);
                        if($edit_posts){
                            $edit_post_msg = "<div class='bg-success text-white p-1 mb-2'>You have edited the post successfully.</div>";
                        }else{
                            $edit_post_msg = "<div class='bg-warning text-white p-1 mb-2'>Error occured, please try again later.</div>";
                        }
                    
                
                
            }else{
                $edit_post_msg = "";
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
                                    <h4 class="mb-sm-0 font-size-18">POSTS</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                    <?php echo $edit_post_msg; ?>
                        <?php
                        if(isset($_GET['editid'])){
                                $edit_post_id = mysqli_real_escape_string($connect,filter_var($_GET['editid'],FILTER_SANITIZE_STRING));
                                $check_edit_post_sql = "SELECT * FROM posts WHERE id = $edit_post_id";
                                $check_edit_post = mysqli_query($connect,$check_edit_post_sql);
                                if(mysqli_num_rows($check_edit_post) == 1){
                                //get details of the post to edit first
                                    while($edit_post_row = mysqli_fetch_assoc($check_edit_post)){
                                        $post_edit_title = $edit_post_row['title'];
                                        $post_edit_content = $edit_post_row['content'];
                                        $post_edit_cat_id = $edit_post_row['cat_id'];
                                        $post_edit_image = $edit_post_row['image'];
                                        $post_edit_status_id = $edit_post_row['status_id'];
                
                                           //to get the category name from the categories table    
                                           $get_cat_edit_sql = "SELECT * FROM categories WHERE id = $post_edit_cat_id";
                                           $get_cat_edit = mysqli_query($connect,$get_cat_edit_sql);
                                           while($cat_edit_row = mysqli_fetch_assoc($get_cat_edit)){
                                               $cat_edit_name = $cat_edit_row['name'];
                                           }
                
                                           //to get the status
                                           if($post_edit_status_id == 1){
                                               $post_edit_status_msg = "Active";
                                           }else{
                                               $post_edit_status_msg = "Draft";
                                           }
                                    }
                                }
                            include_once "includes/posts/edit_post.php";
                        }
                        ?>
                        
                        <?php echo $delete_msg; ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <div class="search-box me-2 mb-2 d-inline-block">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <a type="button" href='add-post.php' class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Post</a>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-check">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="width: 20px;" class="align-middle">
                                                            <div class="form-check font-size-16">
                                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                                <label class="form-check-label" for="checkAll"></label>
                                                            </div>
                                                        </th>
                                                        <th class="align-middle">S/N</th>
                                                        <th class="align-middle">Image</th>
                                                        <th class="align-middle">Post Title</th>
                                                        <th class="align-middle">Content</th>
                                                        <th class="align-middle">Author</th>
                                                        <th class="align-middle">Category</th>
                                                        <th class="align-middle">Date Added</th>
                                                        <th class="align-middle">Status</th>
                                                        <th class="align-middle">Comments</th>
                                                        <th class="align-middle">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php 
                                                   $sn = 1;
                                                   $get_posts_details_sql = "SELECT * FROM posts";
                                                   $get_posts_details = mysqli_query($connect,$get_posts_details_sql);
                                                   if(mysqli_num_rows($get_posts_details) < 1){
                                                       echo "No posts yet";
                                                   }else{
                                                       while($all_post_row = mysqli_fetch_assoc($get_posts_details)){
                                                           $post_title = $all_post_row['title'];
                                                           $post_image = $all_post_row['image'];
                                                           $post_content = $all_post_row['content'];
                                                           $post_cat_id = $all_post_row['cat_id'];
                                                           $post_status_id = $all_post_row['status_id'];
                                                           $post_id = $all_post_row['id'];
                                                           $post_date = $all_post_row['date'];
                                                           $post_author_id = $all_post_row['author_id'];
                                                           
                                                           
                                                       //to get the category name from the categories table    
                                                      $get_cat_sql = "SELECT * FROM categories WHERE id = $post_cat_id";
                                                      $get_cat = mysqli_query($connect,$get_cat_sql);
                                                      while($cat_row = mysqli_fetch_assoc($get_cat)){
                                                          $cat_name = $cat_row['name'];
                                                      }

                                                      //to get author name 
                                                      $get_author_sql = "SELECT * FROM admins WHERE id = $post_author_id";
                                                      $get_author = mysqli_query($connect,$get_author_sql);
                                                      while($admin_row = mysqli_fetch_assoc($get_author)){
                                                          $author_name = $admin_row['username'];
                                                      }

                                                      //to get the status
                                                      if($post_status_id == 1){
                                                          $post_status_msg = "<div class='badge bg-success'>Active</div>";
                                                      }else{
                                                          $post_status_msg = "<div class='badge bg-warning'>Draft</div>";
                                                      }

                                                    
                                                   
                                                   ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input class="form-check-input" type="checkbox" id="orderidcheck09">
                                                                <label class="form-check-label" for="orderidcheck09"></label>
                                                            </div>
                                                        </td>
                                                        <td><a href="javascript: void(0);" class="text-body fw-bold"><?php echo $sn; ?></a> </td>
                                                        <td><img src="assets/images/blog/<?php echo $post_image; ?>" width="50px" class="img-fluid" alt=""></td>
                                                        <td><?php echo $post_title; ?></td>
                                                        <td><?php echo substr($post_content,0,20) ." ..."; ?></td>
                                                        <td><?php echo $author_name; ?></td>
                                                        <td><?php echo $cat_name; ?></td>
                                                        <td><?php echo $post_date; ?></td>
                                                        <td><?php echo $post_status_msg; ?></td>
                                                        <td>0</td>
                                                        
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a href="<?php echo $_SERVER['PHP_SELF'] ."?editid=$post_id";?>" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                                <a href="<?php echo $_SERVER['PHP_SELF'] ."?delid=$post_id";?>" onclick="javascript: return confirm('Are you sure you want to delete this post?')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                   <?php $sn++; }} ?> 
                                                </tbody>
                                            </table>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->
                <div class="modal fade orderdetailsModal" tabindex="-1" role="dialog" aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id=orderdetailsModalLabel">Order Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                                <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap">
                                        <thead>
                                            <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 255</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Hoodie (Blue)</h5>
                                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 145</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Shipping:</h6>
                                                </td>
                                                <td>
                                                    Free
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->
                
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
