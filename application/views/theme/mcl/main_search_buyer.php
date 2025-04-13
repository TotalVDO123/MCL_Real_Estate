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
					<form method="POST" action="<?php echo base_url(); ?>home/main_search_contracts">
                    <div class="row">
                        <div class="col-sm-1"></div>
						<div class="col-sm-10">
                            <div class="card-box">
                          
						  <!--  
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
						-->

						
                                <?php /* ?>
								<form method="POST" action="<?php echo base_url(); ?>user/update_profile"  >
								<?php */ ?>
                             
						 
							
						<div class="row">
                                    <div class="col-lg-12">
                                        
                          <div class="col-xl-12 col-lg-12 col-md-12">
						  <div class="row">      
                          <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">State</label>
                                     <select name="state_id" id="state_id" class="form-control"  onChange="getmls(this.value);" required>
							  <option value="">Select State</option>
							  <?php
							  foreach($states as $state)
							  {
							  ?>
							  <option  value="<?php echo $state['id'] ?>" <?php if($state['id']==$state_id){ echo "selected"; } ?> ><?php echo $state['state_name'] ?></option>
							  <?php
							  }
							  ?>
							
							  </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">MLS Name</label>
                                 <select name="mls_id" id="mls_id" class="form-control" onChange="getbroker(this.value);" required>
							    <option value="">Select MLS Name</option>
							  
							  
							  
							    <?php
							  foreach($mls_lists as $mls_list)
							  {
							  ?>
							  <option  value="<?php echo $mls_list['id'] ?>" <?php if($mls_list['id']==$mls_id){ echo "selected"; } ?> ><?php echo $mls_list['mls_name'] ?></option>
							  <?php
							  }
							  ?>
							  
								</select> 
                                </div>
                            </div>
                            </div>
                            </div>
							
							
                                       
                                    </div>
								<div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                <button id="search_contracts" value="search" name="search_contracts" type="submit" class="btn btn-primary btn-rounded width-md waves-effect waves-light">Search Contracts</button>    
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
					</form>
                    <!-- end row -->

				<div>&nbsp;</div>	
				<div>&nbsp;</div>	
				                    
					
					<div class="row">
						<div class="col-sm-12">
						
                            <div class="card-box table-responsive">
                                

                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                           <th scope="col">First Name</th>
										  <th scope="col">Last Name</th>
										  <th scope="col">Email</th>
										  <th scope="col">Phone</th>
										  
									
										  
										  <th scope="col">Company Name</th>
										  <th scope="col">Agent Name</th>
										  
										  <th scope="col">Contract Type</th>
										  <th scope="col">Status</th>
										  <th scope="col">Action</th>                                        </tr>
																</thead>

                                    <tbody>
                                        <?php
										foreach($contracts1  as $row)
			{
			///////////////status///////////////////////
			
			  
							  $tmp_status="";

							  if($row['status']==1)
							  {
								$tmp_status="Active";
							  }
							  elseif($row['status']==0 )
							  {
								  
								  $tmp_status="Pending";
							  }	  
							  elseif($row['status']==2)
							  {
								  $tmp_status="Inactive";
							  }
							   elseif($row['status']==3)
							  {
								  $tmp_status="Closed";
							  }
							   elseif($row['status']==4)
							  {
								  $tmp_status="TERMINATED";
							  }
							  elseif($row['status']==5)
							  {
								  $tmp_status="Cancel";
							  }
							  
							  $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where  DATE(contract_end_date)< DATE(NOW()) and  id='".$row['id']."'";
                			  $record_expired = $this->db->query($sql_expired);
                				if($record_expired->num_rows() > 0) 
                				{
                					$record_expired_contract = $record_expired->result_array();
                				    if($record_expired_contract[0]['tot']>0)
                				    {
                				        $tmp_status="Expired";
                				    }
                				}	

							
							  
							  
			///////////////////////////////////////////
			 $company = $this->db->get_where('user', array('user_id' => $row['user_broker_id']))->result_array();
			
			 
			
			?>
											
											
										<tr>
										<?php
		  $search_type='primary';
		  if($search_type=='primary')
		  {
		  ?>
		  <td><?php echo $row['name']?></td>
		  <td><?php echo $row['last_name']?></td>
		  <td><?php echo $row['email']?></td>
		  <td><?php echo '('.substr($row['phone'], 0, 3).') '.substr($row['phone'], 3, 3).'-'.substr($row['phone'],6);  ?></td>
		  <?php
		  }
		  elseif($search_type=='secondary')
		  {
		  
		  ?>
		  <td><?php echo $row['secondary_buyer_name'] ?></td>
		  
		  <td><?php echo $row['secondary_buyer_last_name'] ?></td>
		  
		  <td><?php echo $row['secondary_buyer_email'] ?></td>
		  
		  <td> <?php echo '('.substr($row['secondary_buyer_phone'], 0, 3).') '.substr($row['secondary_buyer_phone'], 3, 3).'-'.substr($row['secondary_buyer_phone'],6);  ?>  </td>
		  
		  <?php
		  }
		  ?>
		  
		  <td><?php echo $company[0]['broker_company'] ?></td>
		  <td><?php echo $row['first_name']." ".$row['last_name']?></td>
		 
		  
		  <td><?php echo $row['contract_type']?></td>
		  
		   <td> <?php echo $tmp_status;  ?>  </td>
		  <?php
			if($show_cancel_button==1)
			{	
			?>
		  
		  <td>
		  <a href="#" type="button" class="btn btn-primary btn-rounded width-md waves-effect waves-light" onclick="cancel_contract('<?php echo $row['id'] ?>')" >Cancel</a>&nbsp;
				<a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>" class="btn btn-primary btn-rounded width-md waves-effect waves-light">View Contract</a>
		  </td>
		  <?php
			}
		 	
		else
		{
		?>	
		 <td>
		 <a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>" class="btn btn-primary btn-rounded width-md waves-effect waves-light">View Contract</a>
		 </td>
		<?php	
		}
		?>
		</td>
  
										</tr>
                                       <?php } ?>
                                    </tbody>
									
                                </table>
                            </div>
                        </div>
                    </div>
					







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
	
	$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>user/get_mls/'+state,
		success: function(data){
			$("#mls_id").html(data);
			//$('#city-list').find('option[value]').remove();
			//$("#state-list").removeClass("loader");
		}
	});
	
}
</script>
 