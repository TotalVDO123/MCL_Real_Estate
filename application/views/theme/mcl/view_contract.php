<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:23 GMT -->
<head>
    <meta charset="utf-8" />
    <title>View Contract | MCL</title>
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
                                <h4 class="page-title">View Contract</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
					
					
					
					
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                   
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    
                                                    <th colspan="2" >
                                                        
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
												
												<tr>
                                                    <th><strong>Realtor Name: </strong></th>
                                                    <td><?php echo $contract[0]['first_name']." ". $contract[0]['last_name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Contact Number: </strong></th>
                                                    <td><?php echo $contract[0]['phone'] ?></td>
                                                </tr>
												
												<tr>
                                                    <th><strong>E-mail: </strong></th>
                                                    <td><?php echo $contract[0]['user_email'] ?></td>
                                                </tr>
												
												
												<tr>
                                                    <th><strong>Contract Type: </strong></th>
                                                    <td><?php echo $contract[0]['contract_type'] ?></td>
                                                </tr>
												<?php
											$phpdate = strtotime( $contract[0]['contract_start_date'] );
											$from_date = date( 'm-d-Y', $phpdate );
					 
											?>
											
												<tr>
                                                    <th><strong>Contract Start Date: </strong></th>
                                                    <td><?php echo $from_date ?></td>
                                                </tr>
												<?php
												$phpdate = strtotime( $contract[0]['contract_end_date'] );
												$to_date = date( 'm-d-Y', $phpdate );
											?>
												<tr>
                                                    <th><strong>Contract End Date: </strong></th>
                                                    <td><?php echo $to_date ?></td>
                                                </tr>
											
											
							 
											
											<?php /* ?>
											$array_filename=explode(",",$contract[0]['file_name']);
											
											//print_r($array_filename);
											$file_link="";
											foreach($array_filename as $row_file)
											{
												$file_link.="<a href='".base_url()."assets/document/". $row_file."' target='_blank'  > <img src='".base_url()."assets/mcl_assets/images/icons8-pdf-24.png'   width='30' height='20'> </a>";
											}
											?>
											
											<tr>
                                                    <th><strong>Document: </strong></th>
                                                    <td><?php echo $file_link ?></td>
                                            </tr>
											<?php */ ?>
											<?php		  
							  $tmp_status="";
							  if($contract[0]['status']==0 )
							  {
								  
								  $tmp_status="Pending";
							  }	  
							  elseif($contract[0]['status']==1)
							  {
								 
								$tmp_status="Active";
								 
								  
							  }
							  elseif($contract[0]['status']==2)
							  {
								  $tmp_status="Inactive";
							  }
							   elseif($contract[0]['status']==3)
							  {
								  $tmp_status="Closed";
							  }
							   elseif($contract[0]['status']==4)
							  {
								  $tmp_status="TERMINATED";
							  }
							  elseif($contract[0]['status']==5)
							  {
								  $tmp_status="Cancel";
							  }
							  
							  
							  $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where DATE(contract_end_date)< DATE(NOW()) and  id='".$contract[0]['id']."'";
				
                			  $record_expired = $this->db->query($sql_expired);
                			  if($record_expired->num_rows() > 0) 
                				{
                					$record_expired_contract = $record_expired->result_array();
                				
                				    if($record_expired_contract[0]['tot']>0)
                				    {
                				        $tmp_status="Expired";
                				    }
                				            
                				}	
							  
							  ?>

								<tr>
                                    <th><strong>Status: </strong></th>
                                    <td><?php echo $tmp_status; ?></td>
                                </tr>			

							
							<tr>
							<th colspan="2" style="text-align:center;">
							<a href="javascript:void(0);" 
								 type="button" class="btn btn-danger" onclick="cancel_contract('<?php echo $contract[0]['id'] ?>')"> Cancel Contract</a>
							
							</th>
							</tr>
							
	
	
	
	
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

					
					
                        
						
						
						
						
					
					
					<!-- end secondary buyer -->
					
					

					<!-- end of contract form -->
					
					
					
					
					
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
    function cancel_contract(id)
    {
        var result = confirm("Are you sure you want to cancel the contract?");
        if (result) 
        {
            
           
             $.ajax({
                  url: '<?php echo base_url(); ?>home/cancel_buyer_contract',
                  type: 'POST',
                  data: { id:id },
                  success: function (response) {
                    
                    if(response>0)
                    {
                     alert("Cancel contract process has been initiated");    
                        
                    }
                    
                    
                    //$('.modal-body').html(response);
                    ///$('#custModal').modal('show');
                  }
            });


        }
        
    }
      
      
  </script>
  
	
	
	