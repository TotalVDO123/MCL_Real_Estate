<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:40:15 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Login | MCL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo base_url()?>admin_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?php echo base_url()?>admin_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin_assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="text-center account-logo-box">
                            <div class="mt-2 mb-2">
                               <h4 class="page-title" style="color:#fff" >Login</h4>  
								<?php /* ?>
								<a href="index.html" class="text-success">
                                    <span><img src="<?php echo base_url() ?>assets/mcl_assets/images/logo.svg" alt="" height="36"></span>
                                </a>
								<?php */ ?>
                            </div>
                        </div>

                        <div class="card-body">

							 <div class="form-group mb-0">
                            <?php if($this->session->flashdata('login_success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->flashdata('login_success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('login_error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo $this->session->flashdata('login_error'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                            <form method="POST" action="<?php echo base_url(); ?>user/do_login">

                                <div class="form-group">
                                    <input class="form-control" type="email" name="email_address" id="email_address" value="<?php echo $this->session->flashdata('email_address'); ?>" required="Email" placeholder="Username">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" required="" id="password" placeholder="Password" name="login_password"  >
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox checkbox-success">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-4 pt-2">
                                    <div class="col-sm-12">
                                        <a href="<?php echo base_url(); ?>user/forget_password" class="text-muted"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn btn-success btn-rounded width-md waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-5">
                        <div class="col-sm-12 text-center">
							<p class="text-muted">Don't have an account? <a href="<?php echo base_url(); ?>user/registration" class="text-primary ml-1"><b>Sign Up</b></a></p>
                        </div>
                    </div>

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?php echo base_url()?>admin_assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin_assets/js/app.min.js"></script>

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:40:15 GMT -->
</html>