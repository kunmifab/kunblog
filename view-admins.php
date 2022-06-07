<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>All Admins - KunBlog</title>
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
        <script src="assets/libs/jquery/jquery.min.js"></script>


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
            //for deleting an admin
            if(isset($_GET['delbtn'])){
                $delete_admin_id = mysqli_real_escape_string($connect,filter_var($_GET['delbtn'],FILTER_SANITIZE_STRING));
                $check_admin_sql = "SELECT * FROM admins WHERE id = $delete_admin_id";
                $check_admin = mysqli_query($connect,$check_admin_sql);
                if(mysqli_num_rows($check_admin) == 1){
                    $delete_admin_sql = "DELETE FROM admins WHERE id = $delete_admin_id";
                    $delete_admin = mysqli_query($connect,$delete_admin_sql);
                    if($delete_admin){
                        $delete_msg = "<div class='bg-success text-white p-2 mb-1'>Admin has been deleted successfully.</div>";
                    }else{
                        $delete_msg = "<div class='bg-warning text-white p-2 mb-1'>An error occured. Please try again later.</div>";
                    }
                }else{
                    $delete_msg = "";
                }
            }else{
                $delete_msg = "";
            }

            //for the action to change the status 
            if(isset($_GET['statusbtn'])){
               $status_admin_id = mysqli_real_escape_string($connect,filter_var($_GET['statusbtn'],FILTER_SANITIZE_STRING)); 
               $check_status_admin_sql = "SELECT * FROM admins WHERE id = $status_admin_id";
               $check_status_admin = mysqli_query($connect,$check_status_admin_sql);
                if(mysqli_num_rows($check_status_admin) == 1){
                    while($get_admins_status_details = mysqli_fetch_assoc($check_status_admin)){
                        $change_admin_status = $get_admins_status_details['status_id'];
                        $change_admin_username = $get_admins_status_details['username'];
                    }
                    switch($change_admin_status){
                        case 0:
                            $update_status_id_sql = "UPDATE admins SET status_id = 1 WHERE id = $status_admin_id";
                            $status = "ACTIVE";
                        break;
                        case 1:
                            $update_status_id_sql = "UPDATE admins SET status_id = 0 WHERE id = $status_admin_id";
                            $status = "LOCKED UP";
                        break;
                        default;
                        break;
                    }
                    $update_status_id = mysqli_query($connect,$update_status_id_sql);
                    if($update_status_id){
                        $status_msg = "<div class='bg-success text-white p-2 mb-1'>The admin <b>'$change_admin_username'</b> status is now $status. They will be unable to access thier profile.</div>";  
                    }else{
                        $status_msg = "<div class='bg-warning text-white p-2 mb-1'>An error occured. Please try again later.</div>";
                    }
                }else{
                    $status_msg = "";
                }
            }else{
                $status_msg = "";
            }

             //for the action to change the role 
             if(isset($_GET['rolebtn'])){
                $role_admin_id = mysqli_real_escape_string($connect,filter_var($_GET['rolebtn'],FILTER_SANITIZE_STRING)); 
                $check_role_admin_sql = "SELECT * FROM admins WHERE id = $role_admin_id";
                $check_role_admin = mysqli_query($connect,$check_role_admin_sql);
                 if(mysqli_num_rows($check_role_admin) == 1){
                     while($get_admins_role_details = mysqli_fetch_assoc($check_role_admin)){
                         $change_admin_role = $get_admins_role_details['role'];
                         $change_admin_role_username = $get_admins_role_details['username'];
                     }
                     switch($change_admin_role){
                         case "superadmin":
                             $update_role_sql = "UPDATE admins SET role = 'editor' WHERE id = $role_admin_id";
                             $role = "<b class='text-secondary bg-white'>AN EDITOR</b>";
                         break;
                         case "editor":
                             $update_role_sql = "UPDATE admins SET role = 'superadmin' WHERE id = $role_admin_id";
                             $role = "<b class='text-primary bg-white'>A SUPER-ADMIN</>";
                         break;
                         default;
                         break;
                     }
                     $update_role = mysqli_query($connect,$update_role_sql);
                     if($update_role){
                         $role_msg = "<div class='bg-success text-white p-2 mb-1'>The admin <b>'$change_admin_role_username'</b> is now $role</div>";  
                     }else{
                         $role_msg = "<div class='bg-warning text-white p-2 mb-1'>An error occured. Please try again later.</div>";
                     }
                 }else{
                     $role_msg = "";
                 }
             }else{
                 $role_msg = "";
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
                                    <h4 class="mb-sm-0 font-size-18">ADMINS</h4>
                                </div>
                            </div>
                        </div>
                       
                        <!-- end page title -->
                        <?php echo $delete_msg; ?>
                        <?php echo $role_msg; ?>
                        <?php echo $status_msg; ?>
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
                                                    <a type="button" href='add-admin.php' class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Admin</a>
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
                                                        <th class="align-middle">Admin Image</th>
                                                        <th class="align-middle">Username</th>
                                                        <th class="align-middle">Role</th>
                                                        <th class="align-middle">Action</th>
                                                        <th class="align-middle">Status</th>
                                                        <th class="align-middle">Action</th>
                                                        <th class="align-middle">View</th>
                                                        <th class="align-middle"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php 
                                                   $sn = 1;
                                                   $get_admins_details_sql = "SELECT * FROM admins";
                                                   $get_admins_details = mysqli_query($connect,$get_admins_details_sql);
                                                   if(mysqli_num_rows($get_admins_details) < 1){
                                                       echo "No admin yet";
                                                   }else{
                                                       while($all_admin_row = mysqli_fetch_assoc($get_admins_details)){
                                                           $admin_username = $all_admin_row['username'];
                                                           $admin_image = $all_admin_row['image'];
                                                           $admin_role = $all_admin_row['role'];
                                                           $admin_id = $all_admin_row['id'];
                                                           $admin_status_id = $all_admin_row['status_id'];
                                                           
                                                           
                                                    //    //to get the category name from the categories table    
                                                    //   $get_cat_sql = "SELECT * FROM categories WHERE id = $post_cat_id";
                                                    //   $get_cat = mysqli_query($connect,$get_cat_sql);
                                                    //   while($cat_row = mysqli_fetch_assoc($get_cat)){
                                                    //       $cat_name = $cat_row['name'];
                                                    //   }

                                                    //   //to get author name 
                                                    //   $get_author_sql = "SELECT * FROM admins WHERE id = $post_author_id";
                                                    //   $get_author = mysqli_query($connect,$get_author_sql);
                                                    //   while($admin_row = mysqli_fetch_assoc($get_author)){
                                                    //       $author_name = $admin_row['username'];
                                                    //   }

                                                      //to get the status
                                                      if($admin_status_id == 1){
                                                          $admin_status_msg = "<div class='badge bg-success'>Active</div>";
                                                          $admin_status_icon = "<a title='Lock out' href='" .$_SERVER['PHP_SELF'] ."?statusbtn=$admin_id;'" ."onclick=\"javascript: return confirm('Are you sure you want to make this admin LOCKED OUT? This would make the admin unable to login anymore.')\"" ."class='text-success'><i  class='bx bx-lock-alt text-danger font-size-20'></i></a>";
                                                          
                                                      }else{
                                                          $admin_status_msg = "<div class='badge bg-danger'>Locked Out</div>";
                                                          $admin_status_icon = "<a title='Make Active' href='" .$_SERVER['PHP_SELF'] ."?statusbtn=$admin_id;'" ."onclick=\"javascript: return confirm('Are you sure you want to make this admin ACTIVE? This would make the admin able to login.')\"" ."class='text-success'><i  class='bx bx-lock-open-alt text-success font-size-20'></i></a>";
                                                      }

                                                      

                                                      //to get role 
                                                      if($admin_role == "superadmin"){
                                                        $admin_role_msg = "<div class='badge bg-primary'>Super-Admin</div>";
                                                        $admin_role_icon = "<a title='Make Editor' href='" .$_SERVER['PHP_SELF'] ."?rolebtn=$admin_id;'" ."onclick=\"javascript: return confirm('Are you sure you want to make this admin an EDITOR? ')\"" ."class='text-success'><i  class='bx bx-downvote text-secondary font-size-20'></i></a>";
                                                      }elseif($admin_role == "editor"){
                                                        $admin_role_msg = "<div class='badge bg-secondary'>Editor</div>";
                                                        $admin_role_icon = "<a title='Make Super-admin' href='" .$_SERVER['PHP_SELF'] ."?rolebtn=$admin_id;'" ."onclick=\"javascript: return confirm('Are you sure you want to make this admin a Super-Admin?')\"" ."class='text-success'><i  class='bx bx-upvote text-primary font-size-20'></i></a>";
                                                      }else{
                                                        $admin_role_msg = "none";
                                                        $admin_role_icon = "";
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
                                                        <td><img src="assets/images/admins/<?php echo $admin_image; ?>" width="50px" class="img-fluid" alt=""></td>
                                                        <td><?php echo $admin_username; ?></td>
                                                        <td><?php echo $admin_role_msg; ?></td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <?php echo $admin_role_icon; ?>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $admin_status_msg; ?></td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <?php echo $admin_status_icon; ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a title="View Profile" href="<?php echo "?viewbtn=$admin_id";?>  " id="myBtn"  class="text-dark"><i class="bx bx-show font-size-18"></i></a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a title="Delete" href="<?php echo $_SERVER['PHP_SELF'] ."?delbtn=$admin_id";?>" onclick="javascript: return confirm('Are you sure you want to delete this admin?')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
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
                        <?php include_once "includes/modal/profile-modal.php";?>
                        <!-- end row -->
                        <?php }else{ echo "<div class='bg-danger text-white p-5 text-center'><b> You are not allowed to view this. Contact the Superadmin to inquire about this.</b></div>";}?>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->

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
        
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/ecommerce-orders.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Apr 2021 21:03:29 GMT -->
</html>
