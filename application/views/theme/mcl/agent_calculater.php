<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:23 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Agents calculator | MCL</title>
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
                                <div class="page-title-right">
                                    <!--<ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Zircos</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                        <li class="breadcrumb-item active">Form elements</li>
                                    </ol>-->
                                </div>
                                <h4 class="page-title">Agents calculator</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-12">
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
								
								
								
                                <form method="POST" action="<?php echo base_url(); ?>home/agent_calculater"  >
                                <div class="row">
                                    <div class="col-lg-6">
                                        
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Viewings Per Week </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="viewings_per_week" id="viewings_per_week" placeholder="Viewings per week" class="form-control" value="0" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label" for="example-email">Buyer Meetings Per Week</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="buyer_meetings_per_week" id="buyer_meetings_per_week" class="form-control" value="0" required >
                                                </div>
                                            </div>
											

                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Sales Price</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="average_sales_price" id="average_sales_price" maxlength="10" value="0" required >
                                                </div>
                                            </div>
                                           
										 <div class="form-group row">
                                                <label class="col-md-4 control-label">Months to Close </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="months_to_close" id="months_to_close" value="0" required >
                                                </div>
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-6">

                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Viewing Duration (per hr) </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="viewing_duration" id="viewing_duration" placeholder="Viewing Duration" class="form-control"  value="0" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Buyer Meeting Duration (per hr) </label>
                                                <div class="col-md-8">
                                                    
													<input type="text" name="buyer_meeting_duration" id="buyer_meeting_duration" placeholder="Buyer Meeting Duration" class="form-control" value="0"  required />
													
                                                </div>
											</div>
											
											<div class="form-group row">
                                                <label class="col-sm-4 control-label">Commission Rate </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="commission_rate" id="commission_rate" placeholder="Office Address" value="0" required >
                                                    
                                                </div>
                                            </div>

                                            

                                       
                                    </div>

                                </div>


                            
                               

							   <!-- end row -->


                                <!-- end row -->

                                <!-- Inline Form -->
                              

                              
                                <!-- end row -->
							<button onclick="calculator_functionally()" type="button" class="btn btn-success btn-rounded width-md waves-effect waves-light">calculate </button>
                            </div>
							</form>
							
							
							<div class="row">
                              <div class="col">
							  
							  <div class="form-group row">
                                                <label class="col-md-4 control-label">Commission Rate Per Hour </label>
                                                <div class="col-md-8">
                                                    
													<input type="text" name="rate_per_hours" id="rate_per_hours" placeholder="Buyer Meeting Duration" class="form-control" value="0"  readonly />
													
                                                </div>
											</div>
							  
							  </div>		
									
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
function calculator_functionally()
{
//alert('--------');

	
	
	var average_sales_price=$("#average_sales_price").val();
	var commission_rate=$("#commission_rate").val();
	var months_to_close=$("#months_to_close").val();
	
	var per_hours_price=	(average_sales_price*commission_rate)/(100*months_to_close);
	$("#rate_per_hours").val(per_hours_price.toFixed(2));
	//alert(per_hours_price);
}
</script>


<script>
function getbroker(mls)
{
	
	
	$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>user/get_broker/'+mls,
		success: function(data){
			
			//alert(data);
			
			$("#user_broker_id").html(data);
			
			
			
		}
	});
	
	
	
	
}
</script>






<script>

jQuery(document).ready(function() {
    $('.float-number').keypress(function(event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
});


</script>