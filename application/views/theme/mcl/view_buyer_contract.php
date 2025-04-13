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
                                               
											 <?php
											if($this->session->userdata('search_type')=='primary')
											{
											?>	
											   <tr>
                                                    <th><strong>Primary Buyer name: </strong></th>
                                                    <td><?php echo $contract[0]['name']." ". $contract[0]['last_name'] ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th><strong>Primary Buyer Email: </strong></th>
                                                    <td><?php echo $contract[0]['primery_email'] ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th><strong>Primary Buyer Phone: </strong> </th>
                                                    <td><?php echo $contract[0]['primery_phone'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Secondary Buyer name: </strong></th>
                                                    <td><?php echo $contract[0]['secondary_buyer_name']." ". $contract[0]['secondary_buyer_last_name'] ?></td>
                                                </tr>
                                               <?php
											  }
											  elseif($this->session->userdata('search_type')=='secondary')
											  {
											  ?> 
												
												<tr>
                                                    <th><strong>Secondary Buyer name: </strong></th>
                                                    <td><?php echo $contract[0]['secondary_buyer_name']." ". $contract[0]['secondary_buyer_last_name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Secondary Buyer Email: </strong></th>
                                                    <td><?php echo $contract[0]['secondary_buyer_email'] ?></td>
                                                </tr>
												
												<tr>
                                                    <th><strong>Secondary Buyer Phone: </strong></th>
                                                    <td><?php echo $contract[0]['secondary_buyer_phone'] ?></td>
                                                </tr>
												
												
												<tr>
                                                    <th><strong>Primary Buyer name: </strong></th>
                                                    <td><?php echo $contract[0]['name']." ". $contract[0]['last_name'] ?></td>
                                                </tr>
												
												 <?php
												}
												?>
												
												<tr>
                                                    <th><strong>Realtor Name: </strong></th>
                                                    <td><?php echo $contract[0]['user_first_name']." ". $contract[0]['user_last_name'] ?></td>
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
											<?php 
							  
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
								

								<?php 
							if($show_button==1)
							{	
							?>
							<tr>
							<th colspan="2">
							<?php
								if($contract[0]['status']=='0')
								{
								?>
								<a href="<?php echo base_url() ?>home/contract_status?id=<?php echo $contract[0]['id'];?>&status=<?php echo $contract[0]['status'];?>" 
								 type="button" class="btn btn-primary btn-rounded width-md waves-effect waves-light" onclick="return confirm('Approve');"> Approve</a>
								<?php
								}
										
								?>		
							
							</th>
							<tr>
							<?php
							}
							?>
	
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
  
  <script type="text/javascript">
    
	/*
	$(document).ready(function () {
 
      $('#search_contracts').click(function () {
		  
		  alert('----------');
		  
		var buyer_name = $('#buyer_name');
		var buyer_email = $('#buyer_email');
		var buyer_phone = $('#buyer_phone');
        $.ajax({
          url: 'home/buyer_search',
          type: 'POST',
          data: { buyer_name:buyer_name,buyer_email:buyer_email,buyer_phone:buyer_phone },
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
      });
 
    });
	
	*/
	
	
	 $(document).ready(function () {
 
      $('#search_contracts').click(function () {
		var search_type="";  
		
		
		
		var sbuyer_name=$('#secondary_buyer_name').val();
		var sbuyer_last_name=$('#secondary_buyer_last_name').val();
		var sbuyer_email=$('#secondary_buyer_email').val();
		var sbuyer_phone=$('#secondary_buyer_phone').val();
		
		
		
		
		
		var buyer_name = $('#primary_buyer_name').val();
		var buyer_last_name = $('#primary_buyer_last_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		
		
		if((buyer_name!="" ||buyer_last_name!="") && (buyer_email!="" || buyer_phone!="" ))
		{
		    search_type='primary';
		    
		    sbuyer_name="";
		    sbuyer_last_name="";
		    sbuyer_email="";
		    sbuyer_phone="";
		}
	
		
		
		if((sbuyer_name!="" ||sbuyer_last_name!="") && (sbuyer_email!="" || sbuyer_phone!="" ))
		{
		    search_type='secondary';
		    
		    buyer_name = "";
		    buyer_last_name = "";
		    buyer_email = "";
		    buyer_phone = "";
		}
	
		
		
		
		
		
		
	document.location.href = '<?php echo base_url(); ?>home/search_contracts_list?name='+buyer_name+'&last_name='+buyer_last_name+'&email='+buyer_email+'&phone='+buyer_phone+'&search=1&secondary_name='+sbuyer_name+'&secondary_last_name='+sbuyer_last_name+'&secondary_email='+sbuyer_email+'&secondary_phone='+sbuyer_phone+'&search_type='+search_type ;
	
	
		
		
      });
 
    });
	
	
  </script>
  
 
  
  <script>
  
  $(function() {
    //hang on event of form with id=myform
   //$("#myform").submit(function(e) {
	$('#add_new_buyer').click(function () {
        //prevent Default functionality
        //e.preventDefault();

		 
		var buyer_name = $('#buyer_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		
		var user_id = $('#user_id').val();		
		 var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		  if(buyer_name=='')
		  {
			  alert('Name is required');
			  return false;
			  
		  }
		  else if(buyer_email=='')
		  {
			  alert('Email is required');
			  return false;
			  
		  }
		  else if(!testEmail.test(buyer_email))
		  {
			  alert('Valid email is required');
			return false;
		  }	
		  else if(buyer_phone=='')
		  {
			  alert('Phone is required');
			  return false;
			  
		  }	  

        $.ajax({
          url: '<?php echo base_url(); ?>user/ajax_add_buyer',
          type: 'post',
          data: { buyer_name:buyer_name,buyer_email:buyer_email,buyer_phone:buyer_phone,user_id:user_id },
          success: function (response) {
            
			
			if(response=='available')
			{	
				alert('This buyer already exists.');
			}
			
			else if(response>0)
			{
				alert('Buyer has been saved successfully.');
				
			}
			else if(!response)
			{
				alert('problems in data saving.');
				
			}		
          }
        });	
			
			

        //get the action-url of the form
       

    });

});
  
  </script>
  
	
	
	
	
	
    <script>
  $( function() {
    $( "#end_date,#start_date" ).datepicker({
                dateFormat:'mm-dd-yy'
            });
  } );
  </script>
  
 
  
  <script>
  function isVideo(film) 
  {
	const ext = ['.pdf', '.PDF'];
	return ext.some(el => film.endsWith(el));
  }

function fileValidation() {
  let files = document.getElementById('formFileDisabled');
  for (let i = 0; i < files.files.length; ++i) {
    let fname = files.files.item(i).name;
	
	if (!isVideo(fname)) {
      
	$('#formFileDisabled').val('');	
	  alert("File extension not supported!");
      return false;
    }
  }
}
  
  
  </script>
 
<script>
$(document).ready(
    function(){
        $("#secondary_buyer").click(function () {
            $("#secondary_buyer_card").show("slow");
			$("#secondary_buyer_name").val('');
			$("#secondary_buyer_email").val('');
			$("#secondary_buyer_phone").val('');
			$("#secondary_buyer").hide();
			$("#hide_secondary_buyer").show();
			
			
			
        });

    });



$(document).ready(
    function(){
        $("#hide_secondary_buyer").click(function () {
            $("#secondary_buyer_card").hide("slow");
			$("#secondary_buyer_name").val('');
			$("#secondary_buyer_email").val('');
			$("#secondary_buyer_phone").val('');
			
			$("#secondary_buyer").show();
			$("#hide_secondary_buyer").hide();
			
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

<script>
function validate_date() {

		var from = $("#start_date").val();
		var to = $("#end_date").val();

		if(Date.parse(from) >= Date.parse(to))
		{
		alert("Invalid Date Range");
		return false
		}
		else{

		}


}
</script>
