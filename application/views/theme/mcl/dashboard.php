<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/dashboard_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:36:54 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard 2 | Zircos - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>admin_assets/images/favicon.ico">

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
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Zircos</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard </a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo $full_name ?> Dashboard</h4>
                            <h4 class="page-title"><strong>Total Contracts: <?php  echo $tot_contract[0]['tot'] ?></strong></h4>
							</div>
                        </div>
                    </div>
                    <!-- end page title -->
					
                    <div class="row">

                        <div class="col-xl-3 col-md-6">
                            <div class="card widget-box-one border border-primary bg-soft-primary">
                                <div class="card-body">
                                    <div class="float-right avatar-lg rounded-circle mt-3">
                                        <i class="mdi mdi-chart-areaspline font-30 widget-icon rounded-circle avatar-title text-primary"></i>
                                    </div>
                                    <div class="wigdet-one-content">
                                        <a href="<?php echo base_url() ?>user/user_active_contracts/0">
										<p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Active</p>
										</a>
                                        <h2><span data-plugin="counterup"><?php echo $active_contract[0]['tot'] ?></span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                       
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
                                        <a href="<?php echo base_url() ?>user/user_pending_contracts">
										<p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">Pending</p>
										</a>
                                        <h2><span data-plugin="counterup"><?php echo $pending_contract[0]['tot'] ?> </span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                        
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
                                        <a href="<?php echo base_url() ?>user/user_contracts/2">
										<p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Inactive</p>
										</a>
                                        <h2><span data-plugin="counterup"><?php echo $inactive_contract[0]['tot'] ?> </span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                        
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
                                        <a href="<?php echo base_url() ?>user/user_contracts/4">
										<p class="m-0 text-uppercase font-weight-bold text-muted" title="User Today">Terminated</p>
										</a>
                                        <h2><span data-plugin="counterup"><?php echo $terminated_contract[0]['tot'] ?></span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
				
                    
					<div class="row">

                        <div class="col-xl-3 col-md-6">
                            <div class="card widget-box-one border border-primary bg-soft-primary">
                                <div class="card-body">
                                    <div class="float-right avatar-lg rounded-circle mt-3">
                                        <i class="mdi mdi-chart-areaspline font-30 widget-icon rounded-circle avatar-title text-primary"></i>
                                    </div>
                                    <div class="wigdet-one-content">
                                        <a href="<?php echo base_url() ?>user/user_active_contracts/1">
										<p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Expired</p>
										</a>
                                        <h2><span data-plugin="counterup"><?php echo $record_expired_contract[0]['tot'] ?></span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                       
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
                                        <a href="<?php echo base_url() ?>user/user_contracts/3">
										<p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">Closed</p>
										</a>
                                        <h2><span data-plugin="counterup"><?php echo $closed_contract[0]['tot'] ?></span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<?php
						if($login_type=='broker_record')
						{
						?> 
						 <div class="col-xl-3 col-md-6">
                            <div class="card widget-box-one border border-danger bg-soft-danger">
                                <div class="card-body">
                                    <div class="float-right avatar-lg rounded-circle mt-3">
                                        <i class="mdi mdi-av-timer font-30 widget-icon rounded-circle avatar-title text-danger"></i>
                                    </div>
                                    <div class="wigdet-one-content">
                                        <a href="<?php echo base_url() ?>home/agent_list">
										<p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">No of agents</p>
										</a>
                                        <h2><span data-plugin="counterup"><?php echo $tot_agent[0]['tot'] ?> </span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                        
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
                                        <a href="<?php echo base_url() ?>user/buyer_cancellation_requests">
										<p class="m-0 text-uppercase font-weight-bold text-muted" title="User Today">Termination Requests</p>
										</a>
                                        <h2><span data-plugin="counterup"><?php echo $tot_contract_process[0]['tot'] ?></span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

						
						
						<?php
						}
						?>
						
						
						
                        
                    </div>
				
					

				   <!-- end row -->
				   
				   <?php
					//if($duplicate_contract_exist==1)
					//{
					?>
				          <div class="row">
						  <div class="col-lg-12">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Agent List</h4>

                                <div class="table-responsive">
                                    <table class="table table table-hover m-0">
                                        <thead>
                                            <tr>
                                                <tr>
                                      <th scope="col">First Name </th>
									  <th scope="col">Last Name </th>
									  <th scope="col">Email </th>
									  
									  <th scope="col">Phone</th>
									  <th scope="col">State</th>
									  <th scope="col">Role</th>
									  
									  <th scope="col">Status</th>
									</tr>
                                            </tr>
                                        </thead>
                                        
										<tbody>
			<?php
				foreach($total_agents as $row)
				{

				?>
				<tr>
				  <td><a href="<?php echo base_url()?>home/dashboard/<?php echo $row['user_id'] ?>" target="_blank"  > <strong> <?php echo $row['first_name'] ?></strong></a></td>
				  <td><a href="<?php echo base_url()?>home/dashboard/<?php echo $row['user_id'] ?>" target="_blank"  > <strong><?php echo $row['last_name'] ?></strong></a></td>
				  <td><?php echo $row['email'] ?></td>
				  <td><?php echo $row['phone'] ?></td>
				  <td><?php echo $row['state_name'] ?></td>
				  <td><?php echo ucfirst( $row['role'] )?></td>
				 
				   
				   
				   <td><?php
					if($row['status']=='0')
					{
					?>
					<strong> Pending </strong>
					<?php
					}
					if($row['status']=='1')
					{
					?>
					<strong> Active </strong>
					<?php
					}
					?>
					</td>
				
					
					
				
					<?php /* ?>
					<td>
					  <a href="<?php echo base_url() ?>admin/edit_user/<?php echo $row['user_id']  ?>"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-edit.gif"  width="30" height="20"> </a>
					  
					  
					  <a href="<?php echo base_url() ?>admin/delete_user/<?php echo $row['user_id']  ?>" onclick="return confirm('Are you sure you want to delete this item?');"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-delete-30.png"  width="30" height="20"> </a>
					    
					</td>
					<?php */ ?>	
					
					
				 
				</tr>
				<?php
				}
				?>			
			</tbody>
										
										
                                    </table>

                                </div>
                                <!-- table-responsive -->
                            </div>
                            <!-- end card -->
                        </div>
					<!-- end col -->
					</div>
				<?php
				//}
				?>	



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