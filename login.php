<?php session_start(); ?>
<?php include_once "includes/auth/db.php";  ?>
<?php include_once "includes/auth/login_auth.php";  ?>

<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Apr 2021 21:04:01 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Login KunBlog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.carousel.min.css">

        <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.theme.default.min.css">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    
                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">
    
                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">
                                                    
                                                    <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i>USER'S COMMENTS</h4>
                                                    
                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" A lovely blog that just keeps me going, never want to stop reading! "</p>
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">Bimbo Akinfela</h4>
                                                                        <p class="font-size-14 mb-0">- Influencer</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
    
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" The interaction with fellow users is topnotch. Great work by the developer for the attention to details. "</p>
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">Anonymous</h4>
                                                                        <p class="font-size-14 mb-0">- KunBlog User</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                        <a href="index-2.html" class="d-block auth-logo">
                                            <img src="assets/images/logo-dark.png" alt="" height="18" class="auth-logo-dark">
                                            <img src="assets/images/logo-light.png" alt="" height="18" class="auth-logo-light">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to KunBlog.</p>
                                           <?php echo $errormessage; ?>
                                        </div>
            
                                        <div class="mt-4">
                                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" name="username" required class="form-control" id="username" placeholder="Enter username">
                                                </div>
                        
                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="auth-recoverpw-2.html" class="text-muted">Forgot password?</a>
                                                    </div>
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" required name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>
                        
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>
                                                
                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" name="login_submit" type="submit">Log In</button>
                                                </div>
                    
                                                
                                                
                                                

                                            </form>
                                            <div class="mt-5 text-center">
                                                <p>Don't have an account ? <a href="signup.php" class="fw-medium text-primary"> Signup now </a> </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> KunBlog. Crafted with <i class="mdi mdi-heart text-danger"></i> by KunmiFab</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- owl.carousel js -->
        <script src="assets/libs/owl.carousel/owl.carousel.min.js"></script>

        <!-- auth-2-carousel init -->
        <script src="assets/js/pages/auth-2-carousel.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Apr 2021 21:04:01 GMT -->
</html>
