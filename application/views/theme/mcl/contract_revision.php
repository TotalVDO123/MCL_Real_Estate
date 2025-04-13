<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Contract Revision | MCL</title>
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
                                <h4 class="page-title">Contract Revision</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
						



                    <div class="row">
                        <div class="col-sm-12">
						
						
						
                            <div class="card-box table-responsive">
                                

                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
											 <th scope="col">Buyer Name </th>
											  <th scope="col">Realtor </th>
											  
											  <th scope="col">User Type</th>
											  <th scope="col">Contract Type</th>
											  <th scope="col">Contract Start Date</th>
											  <th scope="col">Contract End Date</th>
											  <th scope="col">Document</th>
											  <th scope="col">Status</th>
											  <th scope="col">Action</th>
																	</tr>
                                    </thead>


                                       
							  <tbody>
							<?php
				foreach($contract as $row)
				{
				
							  $tmp_status="";
							  if($row['status']==0 )
							  {
								  
								  $tmp_status="Pending";
							  }	  
							  elseif($row['status']==1)
							  {
								$tmp_status="Active";
							  }
							  
							  
							  $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where DATE(contract_end_date)< DATE(NOW()) and  id='".$row['id']."'";
				
                			  $record_expired = $this->db->query($sql_expired);
                			  if($record_expired->num_rows() > 0) 
                				{
                					$record_expired_contract = $record_expired->result_array();
                				
                				    if($record_expired_contract[0]['tot']>0)
                				    {
                				        $tmp_status="Expired";
                				    }
                				            
                				}	


				
				
				
				
				    $array_filename=explode(",",$row['file_name']);
				    
				    //print_r($array_filename);
				    $file_link="";
				    foreach($array_filename as $row_file)
				    {
				        $file_link.="<a href='".base_url()."assets/document/". $row_file."' target='_blank'  > <img src='".base_url()."assets/mcl_assets/images/icons8-pdf-24.png'   width='30' height='20'> </a>";
				    }


				
				
				
				
				
				
				?>
				<tr>
				  <td><?php echo $row['full_name'] ?></td>
				  <td><?php echo $row['first_name']." ".$row['last_name'] ?></td>
				 
				  <td><?php echo $row['role'] ?></td>
				  <td><?php echo $row['contract_type'] ?></td>
				  <td><?php echo date("m-d-Y", strtotime($row['contract_start_date']))  ?></td>
				  <td>
			        <?php echo date("m-d-Y", strtotime($row['contract_end_date']))  ?>
				  </td>
				 <td><?php echo $file_link; ?></td>
				  
				  <?php /*?>
				 
				   <td><?php
					if($row['status']=='0')
					{
					?>
					<a href="<?php echo base_url() ?>home/contract_status?id=<?php echo $row['id'];?>&status=<?php echo $row['status'];?>" 
					 type="button" class="btn btn-danger" onclick="return confirm('Active');"  > Pending  </a>
					<?php
					}
					if($row['status']=='1')
					{
					?>
					<a href="<?php echo base_url() ?>home/contract_status?id=<?php echo $row['id'];?>&status=<?php echo $row['status'];?>" 
					 type="button" class="btn btn-success" onclick="return confirm('Pending');"> Active</a>
					<?php
					}
					?>
					</td>
				  <?php */?>
				 
				  
				   <td> <strong> <?php echo $tmp_status ?></strong></td>
					<td><?php
					if($row['status']=='0')
					{
					?>
					<a href="<?php echo base_url() ?>user/view_buyercontract/<?php echo $row['id']?>/1" 
					 type="button" class="btn btn-primary btn-rounded width-md waves-effect waves-light" onclick="return confirm('do you want to approve the contract');"  > Approve </a>
						
					<a href="<?php echo base_url() ?>home/contract_deny_status?id=<?php echo $row['id'];?>&status=3" 
					 type="button" class="btn btn-danger btn-rounded width-md waves-effect waves-light" onclick="return confirm('do you want to deny the contract');"  > Deny </a>	
						
						
					<?php
					}
					
					?>
					</td>
				  
				 
				</tr>
				<?php
				}
				?>
							  </tbody>
									   
									   
                                    
									
                                </table>
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