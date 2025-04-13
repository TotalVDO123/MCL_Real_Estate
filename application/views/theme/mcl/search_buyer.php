<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:23 GMT -->
<head>
    <meta charset="utf-8" />
    <title>MCL Search Contracts | MCL</title>
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
                                <h4 class="page-title">MCL Search Contracts</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-sm-1"></div>
						<div class="col-sm-10">
                            <div class="card-box">
                          
						    
						 <div class="form-group">
                          <div class="row">    
						  <div class="col-lg-3"></div>
						  <div class="col-lg-6">
						  <input class="form-check-input" type="radio" name="buyersearch" id="primary_buyer" checked />
                          <label class="form-check-label" for="Primary Buyer"> Primary Buyer </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input class="form-check-input" type="radio" name="buyersearch" id="secondary_buyer" />
                          <label class="form-check-label" for="Secondary Buyer">Secondary Buyer</label>
                        </div>
						<div class="col-lg-3"></div>
						</div>		
						</div>		
								
                                <?php /* ?>
								<form method="POST" action="<?php echo base_url(); ?>user/update_profile"  >
								<?php */ ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                          <div class="col-xl-12 col-lg-12 col-md-12">
						  <div class="row">      
                          <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">First Name</label>
                                    <input type="text" id="buyer_name" name="buyer_name" class="form-control" />
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">Last Name</label>
                                    <input type="text" id="buyer_last_name" name="buyer_last_name" class="form-control"  />
                                </div>
                            </div>
                            </div>
                            </div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Email">Email</label>
                                 <input type="email" id="buyer_email" name="buyer_email"  class="form-control" required />   
                                </div>
                            </div>
											
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Phone</label>
                                   <input type="text" id="buyer_phone" name="buyer_phone" maxlength="10"  class="form-control float-number" required />
                                </div>
                            </div>				
											
											
											
											 
											

                                         
                                           

                                       
                                    </div>
								<div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                <button id="search_contracts" type="submit" class="btn btn-primary btn-rounded width-md waves-effect waves-light">Search Contracts for the Buyer</button>    
								</div>
                                </div>


                            
                               

							   <!-- end row -->


                                <!-- end row -->

                                <!-- Inline Form -->
                              

                              
                                <!-- end row -->
							
                            </div>
							
							
							
                        </div>
						<div class="col-sm-1"></div>
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
	$(document).ready(function () {
 
      $('#search_contracts111').click(function () {
		  
		  var buyer_name = $('#buyer_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		
        
        $.ajax({
          url: '<?php echo base_url() ?>home/buyer_search',
          type: 'post',
          data: { buyer_name:buyer_name,buyer_email:buyer_email,buyer_phone:buyer_phone},
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
      });
 
    });
	
	
  </script>
  
  <script>
   $(document).ready(function () {
 
      $('#search_contracts').click(function () {
		  
		var buyer_name = $('#buyer_name').val();
		var buyer_last_name = $('#buyer_last_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		

		    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(buyer_email))
            {
               
            }
            else
            {
                alert("You have entered an invalid email address!")
                return false;
            }

		
		
		
		
	//document.location.href = '<?php echo base_url(); ?>home/search_contracts_list?s=1&name='+buyer_name+'&email='+buyer_email+'&phone='+buyer_phone;
	
	if ($("#primary_buyer").prop("checked")) {
        document.location.href = '<?php echo base_url(); ?>home/search_contracts_list?s=1&name='+buyer_name+'&last_name='+buyer_last_name+'&email='+buyer_email+'&phone='+buyer_phone+'&search_type=primary';
    
	    //alert('primary');
	    
	}
	
	if ($("#secondary_buyer").prop("checked")) {
       document.location.href = '<?php echo base_url(); ?>home/search_contracts_list?s=1&secondary_name='+buyer_name+'&secondary_last_name='+buyer_last_name+'&secondary_email='+buyer_email+'&secondary_phone='+buyer_phone+'&search_type=secondary';
       // alert('secondary');
       
    }
	
	
	
	
	/*
        $.ajax({
          url: 'home/search_contracts_list?name='+buyer_name+'&email='+buyer_email+'&phone='+buyer_phone,
          type: 'get',
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
	*/	
		
		
      });
 
    });
	
  
  
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
