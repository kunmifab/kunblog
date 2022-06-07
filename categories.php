<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/ecommerce-orders.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Apr 2021 21:03:29 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Categories | KunBlog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
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
                                        //GET CATEGORY DETAILS
                             if(isset($_POST['cat_addbtn'])){
                                $addcat_name = mysqli_real_escape_string ($connect,filter_var($_POST["cat_name"],FILTER_SANITIZE_STRING));
                                $addcat_desc = mysqli_real_escape_string ($connect,filter_var($_POST["cat_desc"],FILTER_SANITIZE_STRING));
                                // check if that category name exists
                                $check_existing_cat_sql = "SELECT * FROM categories WHERE name = '$addcat_name'";
                                $check_existing_cat = mysqli_query($connect,$check_existing_cat_sql);
                                if(mysqli_num_rows($check_existing_cat) >= 1){
                                    $addmsg = "<div class='bg-warning text-white'>This category has been created already, please try another.</div>";
                                }else{
                                    $cat_info_sql = "INSERT INTO categories(name,description) VALUES('$addcat_name','$addcat_desc')";
                                    $cat_info = mysqli_query($connect,$cat_info_sql);
                                    $addmsg = "<div class='bg-success text-white'>Category has been successfully added.</div>";
                                }

                             } else {
                                $addmsg = "";
                             }

                             //FOR DELETING CATEGORY
                             if(isset($_GET['deleteid'])){
                                 $delete_id = mysqli_real_escape_string($connect,filter_var($_GET['deleteid'],FILTER_SANITIZE_STRING));
                                 $check_cat_id_sql = "SELECT * FROM categories WHERE id = $delete_id";
                                 $check_cat_id = mysqli_query($connect,$check_cat_id_sql);
                                 if(mysqli_num_rows($check_cat_id) != 1){
                                     echo "The category you are trying to delete does not exist";
                                 }else {
                                    $delete_cat_sql = "DELETE FROM categories where id = $delete_id";
                                    $delete_cat = mysqli_query($connect,$delete_cat_sql);
                                    if($delete_cat){
                                        $deletemsg = "<div class='bg-success text-white p-2 mb-2'>Category deleted successfully.</div>";
                                    }else{
                                        $deletemsg = "";
                                    }
                                 }
                             } else {
                                 $deletemsg = "";
                             }
                             //for editting a category
                             if(isset($_POST['cat_editbtn'])){
                                 $edit_cat_name = mysqli_real_escape_string($connect,filter_var($_POST['editcat_name'],FILTER_SANITIZE_STRING));
                                 $edit_cat_desc = mysqli_real_escape_string($connect,filter_var($_POST['editcat_desc'],FILTER_SANITIZE_STRING));
                                 $edit_id_cat = mysqli_real_escape_string($connect,filter_var($_POST['catid_input'],FILTER_SANITIZE_STRING));
                                 $update_cat_sql = "UPDATE categories SET name = '$edit_cat_name', description = '$edit_cat_desc' WHERE id = $edit_id_cat";
                                 $update_cat = mysqli_query($connect,$update_cat_sql);
                                 if($update_cat){
                                    $editmsg = "<div class='bg-success text-white p-2 mb-2'>Category <b>'$edit_cat_name'</b> edited successfully.</div>";
                                 }
                             }else{
                                 $editmsg = "";
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
                    <h4 class="mb-sm-0 font-size-18">Blog Categories</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h4>All Categories</h4>
                            </div>
                        </div>
                        <?php echo $deletemsg; ?>
                        <?php echo $editmsg; ?>
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
                                        <th class="align-middle">Description</th>
                                        <th class="align-middle">Total Posts</th>
                                        <th class="align-middle">Date Added</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 

                                        $sn = 1;
                                        $get_cat_details_sql = "SELECT * FROM categories";
                                        $get_cat_details = mysqli_query($connect,$get_cat_details_sql);
                                        if(mysqli_num_rows($get_cat_details) == 0){
                                            echo "No categories yet";
                                        }else{
                                        while($cat_details = mysqli_fetch_assoc($get_cat_details)){
                                            $cat_name = $cat_details['name'];
                                            $cat_description = $cat_details['description'];
                                            $cat_date = $cat_details['date'];
                                            $cat_id = $cat_details['id'];
                                        

                                        ?>
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                       
                                        <td><a href="javascript: void(0);" class="text-body fw-bold"><?php echo $sn; ?></a> </td>
                                        <td><?php echo $cat_name; ?></td>
                                        <td><?php echo substr($cat_description,0,20). " ..."; ?></td>
                                        <td>0</td>
                                        <td><?php echo $cat_date; ?></td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a href="<?php echo $_SERVER['PHP_SELF'] ."?editid=$cat_id"; ?>" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <a href="<?php echo $_SERVER['PHP_SELF'] ."?deleteid=$cat_id"; ?>" onclick= "javascript: return confirm('Are you sure you want to delete this category?') "  class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                        <?php $sn++; }} ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
            <?php 
            if(!isset($_GET['editid'])){
                include_once "includes/categories/add_view.php";
            }else{
                $cat_editid = mysqli_real_escape_string($connect,filter_var($_GET['editid'],FILTER_SANITIZE_STRING));
                $get_edit_id_sql = "SELECT * FROM categories WHERE id = $cat_editid";
                $get_edit_id = mysqli_query($connect,$get_edit_id_sql);
                if(mysqli_num_rows($get_edit_id) != 1){
                    include_once "includes/categories/add_view.php";
                }else{
                    while($get_edit_details = mysqli_fetch_assoc($get_edit_id)){
                        $insert_cat_name = $get_edit_details['name'];
                        $insert_cat_description = $get_edit_details['description'];
                    }
                    include_once "includes/categories/edit_view.php";
                    if(isset($_POST['cat_editbtn'])){
                        include_once "includes/categories/add_view.php";
                    }
                    
                }
            }
            
            ?>
            
           </div>
            
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
                <!-- End Page-content -->

               
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
