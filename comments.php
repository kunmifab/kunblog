<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Comments - KunBlog</title>
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
            //for approving and unapproving the comment
            if(isset($_GET['approvebtn'])){
                $approve_comment_id = mysqli_real_escape_string($connect,filter_var($_GET['approvebtn'],FILTER_SANITIZE_STRING));
                $check_existing_comment_sql = "SELECT * FROM comments WHERE id = $approve_comment_id";
                $check_existing_comment = mysqli_query($connect,$check_existing_comment_sql);
                if(mysqli_num_rows($check_existing_comment) == 1){
                    while($comment_row = mysqli_fetch_assoc($check_existing_comment)){
                        $comment_approve_status_id = $comment_row['status_id'];
                    }
                    switch($comment_approve_status_id){
                        case 0:
                            $change_status_approve_sql = "UPDATE comments SET status_id = 1 WHERE id = $approve_comment_id";
                            $change_status_action = " Approved";
                        break;
                        case 1:
                            $change_status_approve_sql = "UPDATE comments SET status_id = 0 WHERE id = $approve_comment_id";
                            $change_status_action = " Unapproved";
                        break;
                        default;
                        break;
                    }
                        $change_status_approve = mysqli_query($connect,$change_status_approve_sql);
                        if($change_status_approve){
                            $approve_msg = "<div class='bg-success text-white p-2 mb-2'>The comment has been $change_status_action successfully.</div>";
                        }else{
                            $approve_msg = "<div class='bg-warning text-white p-2 mb-2'>Error occured, please try again.</div>";
                        }
                    
                }else {
                    $approve_msg = "";
                }
            }else {
                $approve_msg = "";
            }
            //for deleting the comment
            if(isset($_GET['delcommentid'])){
                $delete_comment_id = mysqli_real_escape_string($connect,filter_var($_GET['delcommentid'],FILTER_SANITIZE_STRING));
                $check_existing_del_comment_sql = "SELECT * FROM comments WHERE id = $delete_comment_id";
                $check_existing_del_comment = mysqli_query($connect,$check_existing_del_comment_sql);
                if(mysqli_num_rows($check_existing_del_comment) == 1){
                    $delete_comment_sql = "DELETE FROM comments WHERE id = $delete_comment_id";
                    $delete_comment = mysqli_query($connect,$delete_comment_sql);
                    if($delete_comment){
                        $delete_msg = "<div class='bg-success text-white p-2 mb-2'>The comment has been deleted successfully.</div>";
                    }else{
                        $delete_msg = "<div class='bg-warning text-white p-2 mb-2'>Error occurred while trying to delete comment. Please try again later.</div>";
                    }
                }else{
                    $delete_msg = "";
                }
            }else{
                $delete_msg = "";
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
                                    <h4 class="mb-sm-0 font-size-18">ALL COMMENTS</h4>
                                </div>
                            </div>
                        </div>
                        <?php echo $approve_msg; ?>
                        <?php echo $delete_msg; ?>
                        <!-- end page title -->
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
                                                    <a type="button" href='add-comment.php' class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Comment</a>
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
                                                        <th class="align-middle">Name</th>
                                                        <th class="align-middle">Email</th>
                                                        <th class="align-middle">Comment</th>
                                                        <th class="align-middle">Post</th>
                                                        <th class="align-middle">Date Added</th>
                                                        <th class="align-middle">Status</th>
                                                        <th class="align-middle">Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php 
                                                   $sn = 1;
                                                   $get_comments_details_sql = "SELECT * FROM comments";
                                                   $get_comments_details = mysqli_query($connect,$get_comments_details_sql);
                                                   if(mysqli_num_rows($get_comments_details) < 1){
                                                       echo "No comments yet";
                                                   }else{
                                                       while($all_comment_row = mysqli_fetch_assoc($get_comments_details)){
                                                           $comment_name = $all_comment_row['name'];
                                                           $comment_email = $all_comment_row['email'];
                                                           $comment_content = $all_comment_row['comment'];
                                                           $comment_post_id = $all_comment_row['post_id'];
                                                           $comment_id = $all_comment_row['id'];
                                                           $comment_date = $all_comment_row['date'];
                                                           $comment_status_id = $all_comment_row['status_id'];
                                                           
                                                           
                                                       //to get the category name from the categories table    
                                                      $get_post_sql = "SELECT * FROM posts WHERE id = $comment_post_id";
                                                      $get_post = mysqli_query($connect,$get_post_sql);
                                                      while($post_row = mysqli_fetch_assoc($get_post)){
                                                          $post_name = $post_row['title'];
                                                      }

                                                      

                                                      //to get the status
                                                      if($comment_status_id == 1){
                                                          $comment_status_msg = "<div class='badge bg-success'>Approved</div>";
                                                          $comment_approve_icon = "<a title='Unapprove' href='" .$_SERVER['PHP_SELF'] ."?approvebtn=$comment_id;'" ."onclick=\"javascript: return confirm('Are you sure you want to UNAPPROVE this comment? This would make this comment unavailable to viewers')\"" ."class='text-success'><i  class='bx bx-x text-warning font-size-20'></i></a>";
                                                      }else{
                                                          $comment_status_msg = "<div class='badge bg-warning'>Unapproved</div>";
                                                          $comment_approve_icon = "<a title='Approve' href='" .$_SERVER['PHP_SELF'] ."?approvebtn=$comment_id;'" ."onclick=\"javascript: return confirm('Are you sure you want to APPROVE this comment? It would make the comment visible to all viewers.')\"" ."class='text-success'><i class='bx bx-check font-size-20'></i></a>";
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
                                                        <td><?php echo $comment_name; ?></td>
                                                        <td><?php echo $comment_email; ?></td>
                                                        <td><?php echo substr($comment_content,0,20) ." ..."; ?></td>
                                                        <td><?php echo $post_name; ?></td>
                                                        <td><?php echo $comment_date; ?></td>
                                                        <td><?php echo $comment_status_msg; ?></td>
                                                        
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <?php echo $comment_approve_icon; ?>
                                                                <a title="Delete" href="<?php echo $_SERVER['PHP_SELF'] ."?delcommentid=$comment_id";?>" onclick="javascript: return confirm('Are you sure you want to delete this post?')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
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
