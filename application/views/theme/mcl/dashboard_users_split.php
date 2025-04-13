<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Active Contracts | MCL </title>
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
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
						<div class="row">
						<div class="form-group mb-0">
							<?php if($this->session->flashdata('success') !=''):?>
								<div class="alert alert-success">
								   <?php echo $this->session->flashdata('success'); ?>
								</div>
							<?php endif; ?>
							<?php if($this->session->flashdata('error') !=''):?>
								<div class="alert alert-danger">
								  <?php echo $this->session->flashdata('error'); ?>
								</div>
							<?php endif; ?>
						</div>
									
						</div>



                    <div class="row">
                        <div class="col-sm-12">
						
						
						
                            <div class="card-box table-responsive">
							
								<h4 class="header-title"><b>Total number of users split by state:</b></h4>
                                
                                <div>&nbsp;<div>

                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
											  <th scope="col">Email</th>
											  <th scope="col">Phone</th>
											  <th scope="col">User Type</th>
											  <th scope="col">MLS Name</th>
											  <th scope="col">Companye</th>
											  <th scope="col">License Key</th>
                                        </tr>
                                    </thead>


                                       
							<tbody>
								
								<?php
			
			$sql = "SELECT U.state_id,S.state_name FROM user U left join states S on U.state_id=S.id  group by state_id  order by state_id";
			$res = $this->db->query($sql);
			if ($res->num_rows() > 0) 
			{
				$user_states= $res->result_array(); //contracts found with all buyer details
			
			foreach($user_states as $user_state)
			{
			?>	
			<tr>
			  <td colspan="7" style="color: #fff; background: #aab2b5;" ><strong><?php echo $user_state['state_name']; ?></strong></td>
			 
			</tr>	

			
			<?php	
				$sql = "SELECT state_mls.mls_name, user.* FROM user left join state_mls on user.affiliated_mls_name=state_mls.id
				
				where   user.state_id='".$user_state['state_id']."' order by user.user_id ";
				$coll = $this->db->query($sql);
				$users= $coll->result_array();
				
				foreach($users as $user)
				{
			
			$company_name="";
			$sql_comp = "SELECT broker_company FROM user where user_id='".$user['user_broker_id']."'";
			$res_comp = $this->db->query($sql_comp);
			if ($res_comp->num_rows() > 0) 
			{
				$user_states= $res_comp->result_array(); //contracts found with all buyer details
			$company_name=$user_states[0]['broker_company'];
			   
			    
			}
		
			
			
			?>
			<tr>
			  <td ><?php echo $user['first_name']." ".$user['last_name'] ?></td>
			  <td><?php echo $user['email'] ?></td>
			  <td><?php echo $user['phone'] ?></td>
			  <td><?php echo $user['role'] ?></td>
			  <td><?php echo $user['mls_name'] ?></td>
			  <td><?php echo $company_name  ?></td>
			  <td><?php echo $user['license_key'] ?></td>
			</tr>
			<?php
				}
			}
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