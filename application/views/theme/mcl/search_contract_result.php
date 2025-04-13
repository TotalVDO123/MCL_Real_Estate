<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Search Contracts | MCL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico">

    <!-- Table datatable css -->
    <link href="<?php echo base_url()?>admin_assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin_assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin_assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin_assets/libs/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin_assets/libs/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin_assets/libs/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin_assets/libs/datatables/fixedColumns.bootstrap4.min.html" rel="stylesheet" type="text/css" />

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
                                 <!--   <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Zircos</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Datatable</li>
                                    </ol> -->
                                </div>
                                <h4 class="page-title">Search Contracts</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    
					<?php
					if(!empty($contracts1))
					{
					?>
					<div class="row">
						<div class="col-sm-12">
						<div><strong>Contracts found with all buyer details</strong></div>
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
					<?php
					}
					?>


					 <?php
					 //echo "<pre>";
					 //print_r($contracts2);
					 
					if(!empty($contracts2))
					{
					?>
			
                    <div class="row">
                   			
						<div class="col-sm-12">
						<div><strong>Contracts found with only buyer email</strong></div>
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
										  <th scope="col">Action</th>      
										  </tr>
																						
																						</thead>

                                    <tbody>
                                        <?php
										foreach($contracts2  as $row)
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
		  <a href="#" type="button"  onclick="cancel_contract('<?php echo $row['id'] ?>')" class="btn btn-primary btn-rounded width-md waves-effect waves-light" >Cancel</a>&nbsp;
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
					
					<?php
					}
					?>

					 <?php
					if(!empty($contracts3))
					{
			
					?>	
                    <div class="row">
                   
						
						<div class="col-sm-12">
						<div><strong>Suggested buyer</strong></div>
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
										  <th scope="col">Action</th>      
										  </tr>
																						
																						</thead>

                                    <tbody>
                                        <?php
										foreach($contracts3  as $row)
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
				<a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>" class="btn btn-primary btn-rounded width-md waves-effect waves-light" >View Contract</a>
		  </td>
		  <?php
			}
		 	
		else
		{
		?>	
		 <td>
		 <a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>" class="btn btn-primary btn-rounded width-md waves-effect waves-light" >View Contract</a>
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
					<?php
					}
					?>
					
					
					<?php
					if(empty($is_search))
					{	
					?>
					
					<div class="row">
                        <div class="col-12" style="height: 100px;">
						</div>
						<div class="col-12">
                            <div class="page-title-box">
								
						<div>	
						<a class="btn btn-primary btn-rounded width-md waves-effect waves-light"  href="<?php echo base_url()?>/home/add_buyer?add=1&name=<?php echo $name ?>&last_name=<?php echo $last_name ?>&email=<?php echo $email ?>&phone=<?php echo $phone ?>&sbuyer_name=<?php echo $secondary_name ?>&secondary_last_name=<?php echo $secondary_last_name ?>&sbuyer_email=<?php echo $secondary_email ?>&sbuyer_phone=<?php echo $secondary_phone ?>" role="button">ADD BUYER</a>	
						</div>	
												
								
								
                            </div>
                        </div>
                    </div>
					<?php
					}
					?>
				
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
    
    <!-- Vendor js -->
    <script src="<?php echo base_url()?>admin_assets/js/vendor.min.js"></script>

    <!-- Datatable plugin js -->
    <script src="<?php echo base_url()?>admin_assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="<?php echo base_url()?>admin_assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <script src="<?php echo base_url()?>admin_assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/datatables/buttons.bootstrap4.min.js"></script>

    <script src="<?php echo base_url()?>admin_assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/datatables/buttons.print.min.js"></script>

    <script src="<?php echo base_url()?>admin_assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/datatables/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/datatables/dataTables.fixedColumns.min.html"></script>

    <script src="<?php echo base_url()?>admin_assets/libs/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>admin_assets/libs/pdfmake/vfs_fonts.js"></script>

    <!-- Datatables init -->
    <script src="<?php echo base_url()?>admin_assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin_assets/js/app.min.js"></script>

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:56 GMT -->
</html>


<script type="text/javascript">
    /*
	 $(document).ready(function () {
 
      $('#search_contracts').click(function () {
		  
		  var buyer_name = $('#buyer_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		
        
        $.ajax({
          url: '<?php echo base_url() ?>home/buyer_search',
          type: 'post',
          data: { buyer_name:buyer_name,buyer_email:buyer_email,buyer_phone:buyer_phone },
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
      });
 
    });
	
	*/
  </script>