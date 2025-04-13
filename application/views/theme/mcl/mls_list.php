<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>MLS List | MCL </title>
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
                                 
								 <a id="search_contracts" class="btn btn-primary btn-rounded width-md waves-effect waves-light" href="<?php echo base_url()?>admin/create_mls" role="button">Add MLS</a>
								 <!--   <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Zircos</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Datatable</li>
                                    </ol> -->
                                </div>
                                <h4 class="page-title">MLS List</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
						<div class="row">
						<div class="col-sm-12">
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
                                

                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                  <th scope="col">State Name </th>
								  <th scope="col">MLS Name </th>
								  <th scope="col">Status</th>
								  <th scope="col"></th>
								  <th scope="col">Action</th>
									</tr>
                                    </thead>


                                       
							<tbody>
							<?php
				$active_inactive="";
				foreach($mls_lists as $mls_list)
				{
				
				    if($mls_list['is_active']==1)
				    {
				        $active_inactive="Active";
				    }
				    elseif($mls_list['is_active']==0)
				    {
				        $active_inactive="Inactive";
				    }
				?>
				<tr>
				  
				  <td><?php echo $mls_list['state_name'] ?></td>
				  <td><?php echo $mls_list['mls_name'] ?></td>
				  <td id="is_active<?php echo $mls_list['id']  ?>" ><?php echo $active_inactive ?></td>
				  

					<td>
					 
					  
					  <?php /* ?>
					  <a href="<?php echo base_url() ?>admin/set_mls_status/<?php echo $mls_list['id']  ?>" onclick="return confirm('Are you sure you want to delete this item?');"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-delete-30.png"  width="30" height="20"> </a>
					   <?php */ ?> 
					
					<?php
					 if($mls_list['is_active']=='1')
					{ 
					    $buttonActive="block";
					}
					else
					{
					    $buttonActive="none";
					}
					?>    
				        
                   
                    
                    <?php
					 if($mls_list['is_active']=='0')
					{ 
					
					    $buttonInActive="block";
					}
					else
					{
					    $buttonInActive="none";
					}
					?>
                        
                    <a href="javaScript:void(0)" title="Active" style="display: <?php echo $buttonActive ?>;width:20px;" id="activeBtn<?php echo  $mls_list['id'] ?>" onclick="activeInactive(<?php echo $mls_list['id'] ?> ,0);" > <i style="font-size:24px" class="fa fa-thumbs-up"></i></a>
                    
                    <a href="javaScript:void(0)" title="Inactive" style="display: <?php echo $buttonInActive ?>;width:20px;" id="inactiveBtn<?php echo $mls_list['id'] ?>" onclick="activeInactive( <?php echo $mls_list['id'] ?>,1);" > <i style="font-size:24px" class="fa fa-thumbs-down"></i></a> 
                    </td>    
					<td>
					 <a href="<?php echo base_url() ?>admin/edit_mls/<?php echo $mls_list['id']  ?>"  > <i class="fa fa-edit" ></i> </a>
					
					
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
  
  <script>
	function activeInactive(recordId,status) {
    var message = ((status == 0?" Inactive ":" Active "));
    //if (confirm("Are you sure to"+ message+ "the user")){
      
      
      if (confirm("Are you sure want to move the user to"+message+"status?")){
      
      


      
        $.post('<?php echo base_url() ?>admin/mls_status',
        {key:"activeInactive",status:status,recordId:recordId},
        function (response) {
            if (response == "success"){
                if (status == 0){
                    
                    $('#inactiveBtn'+recordId).show();
                    $('#activeBtn'+recordId).hide();
                    $('#is_active'+recordId).html('Inactive');
                    
                }else if (status == 1){
                    
                    $('#activeBtn'+recordId).show();
                    $('#inactiveBtn'+recordId).hide();
                $('#is_active'+recordId).html('Active');
                    
                }
                alert("MLS is "+ message +"now");
            }
        });
    }
}
</script>
