<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:23 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Edit User | MCL</title>
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
                                <h4 class="page-title">Edit User</h4>
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
								
								
								
                                <form method="POST" action="<?php echo base_url(); ?>admin/update_user/<?php echo $user_id ?>"  >
                                <div class="row">
                                    <div class="col-lg-6">
                                        
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">First Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" value="<?php echo $profile_info[0]['first_name'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label" for="example-email">Phone Number</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="phone_number" placeholder="Phone Number" maxlength="10" class="form-control" value="<?php echo $profile_info[0]['phone'] ?>" required >
                                                </div>
                                            </div>
                                            
											   <div class="form-group row">
                                                <label class="col-sm-4 control-label">State	</label>
                                                <div class="col-sm-8">
                                             <select class="form-control" name="state_id" id="state_id"  onChange="getmls(this.value);" required>
                                              <?php
											  foreach($states as $state)
											  {
											  ?>
											  <option value="<?php echo $state['id'] ?>" <?php if($profile_info[0]['state_id']==$state['id']) { echo "selected"; } ?>><?php echo $state['state_name'] ?>
											  </option>
											  <?php
											  }
											  ?>
                                                    </select>
                                                   
                                                </div>
                                            </div>
											
											 
											<?php
											if($profile_info[0]['role']=='agent')
											{
											$user_broker_id= $profile_info[0]['user_broker_id'];
											$broker_record = $this->db->get_where('user' , array('role'=>'broker_record'))->result_array();
											
											?>
											
											<div class="form-group row">
                                                <label class="col-sm-4 control-label">Broker	</label>
                                                <div class="col-sm-8">
                                             <select class="form-control" name="user_broker_id" id="user_broker_id" >
                                              <option value="0">Select Broker</option>
											  
											  <?php
											  foreach($broker_record as $brow )
											  {
											  ?>
											  <option value="<?php echo $brow['user_id'] ?>" <?php if($profile_info[0]['user_broker_id']==$brow['user_id']) { echo 'selected'; } ?> > <?php echo $brow['first_name']." ".$brow['last_name']  ?></option>
											  
											  <?php
											  }
											  ?>
											  
											  
                                                    </select>
                                                   
                                                </div>
                                            </div>
											<?php
											}
											?>
											
											

                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Office Phone Number</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="office_phone_number" maxlength="10" placeholder="Office Phone Number" value="<?php echo $profile_info[0]['office_phone_number'] ?>" required >
                                                </div>
                                            </div>
                                           

                                       
                                    </div>

                                    <div class="col-lg-6">

                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Last Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control"  value="<?php echo $profile_info[0]['last_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 control-label">Email</label>
                                                <div class="col-md-8">
                                                    
													<input type="email" name="email_address" placeholder="Email" class="form-control" value="<?php echo $profile_info[0]['email'] ?>" readonly required />
													
                                                </div>
                                            </div>
										<?php			
							$sql = "SELECT * FROM   state_mls where is_active=1 and state_id='".$profile_info[0]['state_id']."'";
							$res = $this->db->query($sql);
							$rowcoll = $res->result_array();			
							?>
											 <div class="form-group row">
                                                <label class="col-sm-4 control-label">Affiliated MLS Name</label>
                                                <div class="col-sm-8">
                                                    <select name="affiliated_mls_name" id="affiliated_mls_name" onChange="getbroker(this.value);" class="form-control">
                                                        <?php
													  foreach($rowcoll as $row_mls)
													  {
													  ?>
													  <option value="<?php echo $row_mls['id'] ?>" <?php if($profile_info[0]['affiliated_mls_name']==$row_mls['id']) { echo 'selected'; } ?> "><?php echo $row_mls['mls_name'] ?></option>
													  <?php
													  }
													  ?>
                                                    </select>
                                                   
                                                </div>
                                            </div>
										
											<div class="form-group row">
                                                <label class="col-sm-4 control-label">Office Address</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="office_address" placeholder="Office Address" value="<?php echo $profile_info[0]['office_address'] ?>" required >
                                                    
                                                </div>
                                            </div>

                                          <?php
											if($profile_info[0]['role']=='broker_record')
											{
											
											?>  
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label">Company name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="broker_company"  placeholder="Company name" value="<?php echo $profile_info[0]['broker_company'] ?>" >
                                                    
                                                </div>
                                            </div>
											 <?php
												}
											  ?>  
                                            

                                       
                                    </div>

                                </div>


                            
                               

							   <!-- end row -->


                                <!-- end row -->

                                <!-- Inline Form -->
                              

                              
                                <!-- end row -->
							<button type="submit" class="btn btn-primary btn-rounded width-md waves-effect waves-light">Submit</button>
                            </div>
							</form>
							
							
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
function getmls(state)
{
	///alert(state);
	
	
	$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>user/get_mls/'+state,
		success: function(data){
			
			//alert(data);
			
			$("#affiliated_mls_name").html(data);
			//$('#city-list').find('option[value]').remove();
			//$("#state-list").removeClass("loader");
		}
	});
	
	
	
	
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