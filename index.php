<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/dashboard-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Apr 2021 21:03:08 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>KunBlog Admin Page</title>
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

        <?php include_once "includes/layout/header.php" ?>
            <!-- ========== Left Sidebar Start ========== -->
           <?php include_once "includes/layout/sidebar.php" ?>
            <!-- Left Sidebar End -->

            

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
                                    <h4 class="mb-sm-0 font-size-18">Welcome <?php echo $user_username ?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Blog</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">

                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                
                                                <div class="d-flex flex-wrap">
                                                    <div class="me-3">
                                                        <p class="text-muted mb-2">Total Post</p>
                                                        <h5 class="mb-0">120</h5>
                                                    </div>
    
                                                    <div class="avatar-sm ms-auto">
                                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                            <i class="bx bxs-book-bookmark"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="card blog-stats-wid">
                                            <div class="card-body">

                                                <div class="d-flex flex-wrap">
                                                    <div class="me-3">
                                                        <p class="text-muted mb-2">Pages</p>
                                                        <h5 class="mb-0">86</h5>
                                                    </div>
    
                                                    <div class="avatar-sm ms-auto">
                                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                            <i class="bx bxs-note"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card blog-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex flex-wrap">
                                                    <div class="me-3">
                                                        <p class="text-muted mb-2">Comments</p>
                                                        <h5 class="mb-0">4,235</h5>
                                                    </div>
    
                                                    <div class="avatar-sm ms-auto">
                                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                            <i class="bx bxs-message-square-dots"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                

                                <div class="col-lg-3">
                                        <div class="card blog-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex flex-wrap">
                                                    <div class="me-3">
                                                        <p class="text-muted mb-2">Users</p>
                                                        <h5 class="mb-0">4,235</h5>
                                                    </div>
    
                                                    <div class="avatar-sm ms-auto">
                                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                            <i class="bx bxs-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                       
                        <!-- end row -->

                        
                            <!-- end col -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="me-2">
                                                <h5 class="card-title mb-4">Popular post</h5>
                                            </div>
                                            <div class="dropdown ms-auto">
                                                <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>
                                              
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <tr>
                                                    <th scope="col" colspan="2">Post</th>
                                                    <th scope="col">Likes</th>
                                                    <th scope="col">Comments</th>
                                                    <th scope="col">Action</th>
                                                  </tr>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 100px;"><img src="assets/images/small/img-2.jpg" alt="" class="avatar-md h-auto d-block rounded"></td>
                                                        <td>
                                                            <h5 class="font-size-13 text-truncate mb-1"><a href="#" class="text-dark">Beautiful Day with Friends</a></h5>
                                                            <p class="text-muted mb-0">10 Nov, 2020</p>
                                                        </td>
                                                        <td><i class="bx bx-like align-middle me-1"></i> 125</td>
                                                        <td><i class="bx bx-comment-dots align-middle me-1"></i> 68</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                                </a>
                                                              
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                    <a class="dropdown-item" href="#">Another action</a>
                                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><img src="assets/images/small/img-6.jpg" alt="" class="avatar-md h-auto d-block rounded"></td>
                                                        <td>
                                                            <h5 class="font-size-13 text-truncate mb-1"><a href="#" class="text-dark">Drawing a sketch</a></h5>
                                                            <p class="text-muted mb-0">02 Nov, 2020</p>
                                                        </td>
                                                        <td><i class="bx bx-like align-middle me-1"></i> 102</td>
                                                        <td><i class="bx bx-comment-dots align-middle me-1"></i> 48</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                                </a>
                                                              
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                    <a class="dropdown-item" href="#">Another action</a>
                                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><img src="assets/images/small/img-1.jpg" alt="" class="avatar-md h-auto d-block rounded"></td>
                                                        <td>
                                                            <h5 class="font-size-13 text-truncate mb-1"><a href="#" class="text-dark">Riding bike on road</a></h5>
                                                            <p class="text-muted mb-0">24 Oct, 2020</p>
                                                        </td>
                                                        <td><i class="bx bx-like align-middle me-1"></i> 98</td>
                                                        <td><i class="bx bx-comment-dots align-middle me-1"></i> 35</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                                </a>
                                                              
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                    <a class="dropdown-item" href="#">Another action</a>
                                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><img src="assets/images/small/img-2.jpg" alt="" class="avatar-md h-auto d-block rounded"></td>
                                                        <td>
                                                            <h5 class="font-size-13 text-truncate mb-1"><a href="#" class="text-dark">Project discussion with team</a></h5>
                                                            <p class="text-muted mb-0">15 Oct, 2020</p>
                                                        </td>
                                                        <td><i class="bx bx-like align-middle me-1"></i> 92</td>
                                                        <td><i class="bx bx-comment-dots align-middle me-1"></i> 22</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                                </a>
                                                              
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                    <a class="dropdown-item" href="#">Another action</a>
                                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                              
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <?php include_once "includes/layout/footer.php" ?>
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

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard blog init -->
        <script src="assets/js/pages/dashboard-blog.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/dashboard-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Apr 2021 21:03:11 GMT -->
</html>
