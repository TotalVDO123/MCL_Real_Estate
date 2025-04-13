<?php

$dotloop_signin="https://auth.dotloop.com/oauth/authorize?response_type=code&client_id=2da9bbf6-ca23-4f0e-8dc0-ba51287b8cc9&client_secret=a05b2465-7303-4358-8d9d-319c5fdbc593&redirect_uri=https://multipleclientslist.com/user/link_with_dotloop&redirect_on_deny=true";

$docusign_signin="https://account-d.docusign.com/oauth/auth?prompt=login&response_type=code
&scope=signature+impersonation+dtr.rooms.read+dtr.rooms.write+dtr.documents.read+dtr.documents.write+dtr.profile.read+dtr.profile.write+dtr.company.read+dtr.company.write
&client_id=5f6633c0-9e1f-4041-a17f-ea9dcc2129b9
&redirect_uri=https://multipleclientslist.com/user/link_with_docusign"

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/dashboard_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:36:54 GMT -->
<head>
    <meta charset="utf-8" />
    <title>User Details | MCL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico">

    <link href="<?php echo base_url()?>admin_assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
    
                    <div class="clearfix"></div>
				<!--
                    <div class="help-box">
                        <h5 class="text-muted mt-0">For Help ?</h5>
                        <p class=""><span class="text-info">Email:</span>
                            <br/> support@support.com</p>
                        <p class="mb-0"><span class="text-info">Call:</span>
                            <br/> (+123) 123 456 789</p>
                    </div>
				-->	
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
                                <div class="page-title-right">
                                    <!--<ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Zircos</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard </a></li>
                                        <li class="breadcrumb-item active">User Details</li>
                                    </ol>-->
									
									<?php
						if($duplicate_contract==1)
						{	
						?>
						
						<div class="text-center" style="height:20px;color:red;">
						You have some pending actions, please check dashboard
						</div>
						
						<?php
						}
						?>
									
									
                                </div>
								
                                <h4 class="page-title">User Details</h4> 
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
					<!--
                    <div class="row">

                        <div class="col-xl-3 col-md-6">
                            <div class="card widget-box-one border border-primary bg-soft-primary">
                                <div class="card-body">
                                    <div class="float-right avatar-lg rounded-circle mt-3">
                                        <i class="mdi mdi-chart-areaspline font-30 widget-icon rounded-circle avatar-title text-primary"></i>
                                    </div>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Statistics</p>
                                        <h2><span data-plugin="counterup">34578</span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 30.4k</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-xl-3 col-md-6">
                            <div class="card widget-box-one border border-warning bg-soft-warning">
                                <div class="card-body">
                                    <div class="float-right avatar-lg rounded-circle mt-3">
                                        <i class="mdi mdi-layers font-30 widget-icon rounded-circle avatar-title text-warning"></i>
                                    </div>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">User This Month</p>
                                        <h2><span data-plugin="counterup">52410 </span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 40.33k</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-md-6">
                            <div class="card widget-box-one border border-danger bg-soft-danger">
                                <div class="card-body">
                                    <div class="float-right avatar-lg rounded-circle mt-3">
                                        <i class="mdi mdi-av-timer font-30 widget-icon rounded-circle avatar-title text-danger"></i>
                                    </div>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Statistics</p>
                                        <h2><span data-plugin="counterup">6352 </span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 956</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-xl-3 col-md-6">
                            <div class="card widget-box-one border border-success bg-soft-success">
                                <div class="card-body">
                                    <div class="float-right avatar-lg rounded-circle mt-3">
                                        <i class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-success"></i>
                                    </div>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="User Today">User Today</p>
                                        <h2><span data-plugin="counterup">895</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                                        <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 1250</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
				-->
                    
	<?php
    $user_type="";
    if($this->session->userdata('login_type')=='broker_record')
    $user_type="Broker";
    elseif($this->session->userdata('login_type')=='admin')
    $user_type="Admin";
    elseif($this->session->userdata('login_type')=='agent')
    $user_type="Agent";
?>	
					
					<div class="row">
                        <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title mb-4"><strong><?php echo ucfirst( $user_type) ?> Info</strong></h4>

                               <!-- <div id="website-stats" style="height: 320px;" class="flot-chart"></div>-->
                            <div class="col-lg-12 col-md-12 col-sm-12" style="height: 40px;">
                               
								First Name: <?php echo ucfirst( $users->first_name) ?>
                                <!--    <input type="text" name="first_name" placeholder="First Name" class="form-control" required />-->
                               
                            </div>
                            
							<div class="col-lg-12 col-md-12 col-sm-12" style="height: 40px;">
                                
								Last Name: <?php echo ucfirst( $users->last_name) ?>
                                 <!--   <input type="text" name="last_name" placeholder="Last Name" class="form-control" />-->
                                
                            </div>
                            
							<div class="col-lg-12 col-md-12 col-sm-12" style="height: 40px;">
                                
								Email: <?php echo  $users->email ?>
                                  <!--  <input type="email" name="email_address" placeholder="Email" class="form-control" required />-->
                                
                            </div>

							
							
							</div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title mb-4"></h4>


        <div class="row">
		    
		
		<?php
	
		if($users->link_with_dotloop==0)
		{	
		?>
		
		
		<div class="caption" style="height: 70px;width:100%">
			   <a type="button" href="<?php echo $dotloop_signin; ?>" class="btn btn-primary btn-rounded btn-lg btn-block">Link with DotLoop</a>
			   
		</div>	   
        	
		<?php
		}
		elseif($users->link_with_dotloop==1)
		{
		?>
		
		
		
		<div class="caption" style="max-width:100%">
		       <div>The MCL account has been linked with Dotloop <button onclick="delink_dotloop(<?php echo $users->user_id ?>);" ><i class="fa fa-unlink" style="font-size:20px"></i> Delink with DotLoop </button></div>
		</div>	   
        	
		
		
		
		<?php
		}
		
			elseif($users->link_with_room==1)
		{
		
		?>
		
		<div class="caption" style="max-width:100%">
		       <div>The MCL account has been linked with docusign
		       
		       <button onclick="delink_docusign(<?php echo $users->user_id ?>);" ><i class="fa fa-unlink" style="font-size:20px"></i> Delink with Docusign </button>
		       </div>
		</div>	   
        	
		<?php
		}
		?>

		</div>
		
		<div class="row">
		
		<?php
	
		if($users->link_with_room==0)
		{	
		?>
		
		<div class="caption" style="height: 70px;width:100%">
			<a type="button" href="<?php echo $docusign_signin; ?>" class="btn btn-primary btn-rounded btn-lg btn-block">Link with DocuSign</a>
		</div>	   
        	
		<?php
		}
		?>
		</div>
		
		

                              
                            </div>
                        </div>

                    </div>
                    <!-- end row -->


						<div class="row">
                        <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Broker Info</h4>

                               <!-- <div id="website-stats" style="height: 320px;" class="flot-chart"></div>-->
                            <?php
						if($users->role=='agent')
						{
						?>
						
						<div style="height: 40px;">
						<b> Broker Name: </b> <?php echo ucfirst( $broker_details->first_name." ".$broker_details->last_name) ?>
						 </div style="height: 40px;" >
						 <div>
						 <b>Email:</b> <?php echo ucfirst( $broker_details->email) ?>  
						 </div>    
						<?php
						}
						elseif($users->role=='admin')
						{
                        ?>						    
						<b>As you are admin, no broker assigned</b>    
						    
						<?php    
						}
						else
						{
						?>
						<b>As you are broker of record, no broker assigned</b>
						<?php
						}
						?>
						
							
							
							</div>
                        </div>

					</div>	

					<?php /* ?>
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Messages</h4>

                                <div class="inbox-widget slimscroll" style="max-height: 360px;">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Chadengle</p>
                                            <p class="inbox-item-text font-12">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">13:40 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Tomaslau</p>
                                            <p class="inbox-item-text font-12">I've finished it! See you so...</p>
                                            <p class="inbox-item-date">13:34 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Stillnotdavid</p>
                                            <p class="inbox-item-text font-12">This theme is awesome!</p>
                                            <p class="inbox-item-date">13:17 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kurafire</p>
                                            <p class="inbox-item-text font-12">Nice to meet you</p>
                                            <p class="inbox-item-date">12:20 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Shahedk</p>
                                            <p class="inbox-item-text font-12">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">10:15 AM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Adhamdannaway</p>
                                            <p class="inbox-item-text font-12">This theme is awesome!</p>
                                            <p class="inbox-item-date">9:56 AM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-8.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Arashasghari</p>
                                            <p class="inbox-item-text font-12">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">10:15 AM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets/images/users/avatar-9.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Joshaustin</p>
                                            <p class="inbox-item-text font-12">I've finished it! See you so...</p>
                                            <p class="inbox-item-date">9:56 AM</p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                        <div class="col-lg-8">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Recent Users</h4>

                                <div class="table-responsive">
                                    <table class="table table table-hover m-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>User Name</th>
                                                <th>Phone</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <img src="assets/images/users/avatar-6.jpg" alt="user" class="avatar-sm rounded-circle" />
                                                </th>
                                                <td>
                                                    <h5 class="m-0 font-15">Louis Hansen</h5>
                                                    <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                                                </td>
                                                <td>+12 3456 789</td>
                                                <td>USA</td>
                                                <td>07/08/2016</td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <span class="avatar-sm-box bg-primary">C</span>
                                                </th>
                                                <td>
                                                    <h5 class="m-0 font-15">Craig Hause</h5>
                                                    <p class="m-0 text-muted font-13"><small>Programmer</small></p>
                                                </td>
                                                <td>+89 345 6789</td>
                                                <td>Canada</td>
                                                <td>29/07/2016</td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <img src="assets/images/users/avatar-7.jpg" alt="user" class="avatar-sm rounded-circle" />
                                                </th>
                                                <td>
                                                    <h5 class="m-0 font-15">Edward Grimes</h5>
                                                    <p class="m-0 text-muted font-13"><small>Founder</small></p>
                                                </td>
                                                <td>+12 29856 256</td>
                                                <td>Brazil</td>
                                                <td>22/07/2016</td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <span class="avatar-sm-box bg-pink">B</span>
                                                </th>
                                                <td>
                                                    <h5 class="m-0 font-15">Bret Weaver</h5>
                                                    <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                                                </td>
                                                <td>+00 567 890</td>
                                                <td>USA</td>
                                                <td>20/07/2016</td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <img src="assets/images/users/avatar-8.jpg" alt="user" class="avatar-sm rounded-circle" />
                                                </th>
                                                <td>
                                                    <h5 class="m-0 font-15">Mark</h5>
                                                    <p class="m-0 text-muted font-13"><small>Web design</small></p>
                                                </td>
                                                <td>+91 123 456</td>
                                                <td>India</td>
                                                <td>07/07/2016</td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <!-- table-responsive -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                    </div>
					
					<?php */ ?>
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
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">
        
            <div class="p-4">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout, etc.
                </div>
                <div class="mb-2">
                    <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>
            
                <div class="mb-2">
                    <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                        data-appStyle="assets/css/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>
            
                <div class="mb-2">
                    <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                        data-appStyle="assets/css/app-dark-rtl.min.css" />
                    <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>

                <a href="https://1.envato.market/eKY0g" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!--<a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
        <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
    </a>-->

    <!-- Vendor js -->
    <script src="<?php echo base_url()?>admin_assets/js/vendor.min.js"></script>

    <script src="<?php echo base_url()?>admin_assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/moment/moment.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url()?>admin_assets/js/pages/dashboard_2.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin_assets/js/app.min.js"></script>

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/dashboard_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:37:00 GMT -->
</html>