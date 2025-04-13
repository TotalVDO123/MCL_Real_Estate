<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:40:15 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Recover Password | MCL</title>
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
                                
							<h4 class="page-title" style="color:#fff" >Forgot Password</h4>	

                            </div>
                        </div>

                        <div class="card-body">

                            <div class="form-group mb-0">
                            <?php if($this->session->flashdata('reset_success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->flashdata('reset_success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('reset_error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo $this->session->flashdata('reset_error'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
							
							<div class="text-center mb-4">
                                <p class="text-muted mb-0">Enter your email address and we'll send you an email with instructions to reset your password. </p>
                            </div>
							
                            <form method="POST" action="<?php echo base_url(); ?>user/forget_password/do_reset">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control" type="email" name="email_address"  required="" placeholder="Enter email">
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center mt-2 row">
                                    <div class="col-12">
                                        <button class="btn btn-success btn-rounded width-md waves-effect waves-light" type="submit">Send Email
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-5">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Already have account?<a href="<?php echo base_url()?>user/login" class="text-primary ml-1"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->

    <!-- Vendor js -->
    <script src="<?php echo base_url()?>admin_assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin_assets/js/app.min.js"></script>

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:40:15 GMT -->
</html>