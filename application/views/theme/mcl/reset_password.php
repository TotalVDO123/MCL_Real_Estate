<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:23 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Reset Password | MCL </title>
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

    <!-- Begin page -->
    <div id="wrapper">

        
        <!-- Topbar Start -->
         <?php
		$this->load->view('theme/mcl/header_new.php');  
		?>    
		<!-- end Topbar --> 
        
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

                <div class="slimscroll-menu">
    
                    <!--- Sidemenu -->
                    <?php
					$this->load->view('theme/mcl/left_menu.php');  
					?>
					
                    <!-- End Sidebar -->
    
                    
    
                </div>
                <!-- Sidebar -left -->
    
            </div>
            <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                               
                                <h4 class="page-title">Reset Password</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
					<div style="height:100px"></div>
                    <form method="POST"  action="<?php echo base_url(); ?>user/reset_password/save" onsubmit="return matchPassword()" >
					<div class="row">
					
                        <div class="col-lg-1"></div>
						<div class="col-sm-10">
                            <div class="card-box">
                                
								 <div class="form-group mb-0">
                            <?php if($this->session->userdata('success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->userdata('success'); ?>
                                </div>
                            <?php 
                            
                            $this->session->set_userdata('success','');
                            endif; ?>
                            <?php if($this->session->userdata('error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo $this->session->userdata('error'); ?>
                                </div>
                            <?php 
                            $this->session->set_userdata('error','');
                            endif; ?>
                        </div>
								
								
								
                                
                                <div class="row">
								
                                    <div class="col-lg-10">
                                        
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">New Password</label>
                                                <div class="col-md-8">
                                                    <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label" ">Verify Password</label>
                                                <div class="col-md-8">
                                                    <input type="password" id="verify_password" name="verify_password" placeholder="Verify Password" class="form-control" required />
                                                </div>
                                            </div>
                                            
									<div class="col-lg-3"></div>		
											
											 
										
											  
                                                  
                                                   
                                                </div>
                                            </div>
											
											
											

                                          

                                       
                                    </div>
					<div class="text-center">		
					<button type="submit" class="btn btn-primary btn-rounded width-md waves-effect waves-light">Reset My Password</button>
					</div>
					</form>
					
                                </div>


                            
                               

							   <!-- end row -->


                                <!-- end row -->

                                <!-- Inline Form -->
                              

                              
                                <!-- end row -->
							
                            </div>
							
							
							
                        </div>
                    </div>
                    <!-- end row -->

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->

            

            <!-- Footer Start -->
            <?php
			$this->load->view('theme/mcl/footer_new.php');  
			?>  
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
   
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
	<!--
    <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
        <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
    </a>
	-->
    <!-- Vendor js -->
    <script src="<?php echo base_url()?>admin_assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin_assets/js/app.min.js"></script>

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:23 GMT -->
</html>

	<script>
	
	function matchPassword() {  
  var pw1 = document.getElementById("new_password").value;  
  var pw2 = document.getElementById("verify_password").value;  
  
  if(pw1 != pw2)  
  {   
    alert("Passwords do not match");
    return false;		
  } else {  
    //alert("Password created successfully");  
	return true;
  }  
}  
</script>