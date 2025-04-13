<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:39:23 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Add Buyer | MCL</title>
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

	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

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
                                <h4 class="page-title">Add Buyer</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
					<form id="frm" method="POST" enctype="multipart/form-data" onsubmit="return validate_date()" action="<?php echo base_url() ?>user/add_buyer_contract" >
					<input type="hidden" id="user_id" name="user_id" value="<?php echo $users->user_id ?>">	
                    
					
					<div class="row">
                        <div class="col-sm-1"></div>
						<div class="col-sm-10">
                            <div class="card-box">
							
							<div class="text-right">
							<?php
								if(!empty($sbuyer_name) or !empty($sbuyer_email) or !empty($sbuyer_phone))
								{
								?>
								<button type="button" style="display:none;" id="secondary_buyer" class="btn btn-primary btn-rounded width-md waves-effect waves-light">Add Secondary Buyer </button>
                                <button type="button"  id="hide_secondary_buyer" class="btn btn-primary btn-rounded width-md waves-effect waves-light">Hide Secondary Buyer </button>
								
								<?php
								}
								else
								{	
								?>
								
								<button type="button" id="secondary_buyer" class="btn btn-primary btn-rounded width-md waves-effect waves-light">Add Secondary Buyer </button>
                                <button type="button" style="display:none;" id="hide_secondary_buyer" class="btn btn-primary btn-rounded width-md waves-effect waves-light">Hide Secondary Buyer </button>
								
								<?php
								}
								?>

						    </div>
						
								
                              
                          <div class="row">
                          <div class="col-lg-12">
                                        
                          <div class="col-xl-12 col-lg-12 col-md-12">
						  <div class="row">      
                          <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">Primary Buyer's First Name</label>
                                    <input type="text" id="primary_buyer_name" name="primary_buyer_name" class="form-control"  value="<?php echo $name ?>" required/>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">Primary Buyer's Last Name</label>
                                    <input type="text" id="primary_buyer_last_name" name="primary_buyer_last_name"  class="form-control" value="<?php echo $last_name ?>" required   />
                                </div>
                            </div>
                            </div>
                            </div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Email">Primary Buyer's Email</label>
                                 <input type="email" id="buyer_email" name="buyer_email" value="<?php echo $email ?>" class="form-control" required />   
                                </div>
                            </div>
											
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Primary Buyer's Phone</label>
                                   <input type="text" maxlength="10" id="buyer_phone" name="buyer_phone" value="<?php echo $phone ?>"  class="form-control float-number" required />
                                </div>
                            </div>				
											
											
											
											 
											

                                         
                                           

                                       
                                    </div>
								
								
										
									
								
                                </div>
                                <!-- end row -->
							
                            </div>
							
							
							
                        </div>
						<div class="col-sm-1"></div>
                    </div>
					
					
					<!-- secondary buyer --->
					
                    <!-- end page title -->
					<?php
				if(!empty($sbuyer_name) or !empty($sbuyer_email) or !empty($sbuyer_phone))
				{
								?>
							<div id="secondary_buyer_card" class="box-shadow row"  >
							<?php
							}
							else
							{	
							?>
							<div id="secondary_buyer_card" class="box-shadow row" style="display:none;" >
							
							<?php
							}
							?>
					
					
                        <div class="col-sm-1"></div>
						<div class="col-sm-10">
                            <div class="card-box">
							
							
								
                              
                          <div class="row">
                          <div class="col-lg-12">
                                        
                          <div class="col-xl-12 col-lg-12 col-md-12">
						  <div class="row">      
                          <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">Secondary Buyer's First Name</label>
                                    <input type="text" id="secondary_buyer_name" name="secondary_buyer_name" value="<?php echo $sbuyer_name ?>" class="form-control" />
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">Secondary Buyer's Last Name</label>
                                    <input type="text" id="secondary_buyer_last_name" name="secondary_buyer_last_name" value="<?php echo $sbuyer_last_name ?>" class="form-control"  />
                                </div>
                            </div>
                            </div>
                            </div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Email">Secondary Buyer's Email</label>
                                 <input type="email" id="secondary_buyer_email" name="secondary_buyer_email" value="<?php echo $sbuyer_email ?>"  class="form-control" required />   
                                </div>
                            </div>
											
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Secondary Buyer's Phone</label>
                                   <input type="text" maxlength="10" id="secondary_buyer_phone" name="secondary_buyer_phone" value="<?php echo $sbuyer_phone ?>"  class="form-control float-number" required />
                                </div>
                            </div>				
                                       
                                    </div>
								
                                </div>
                                <!-- end row -->
							
                            </div>
							
							
							
                        </div>
						<div class="col-sm-1"></div>
                    </div>
					
					<?php
							
							if(empty($is_add_buyer) )
							{			
							?>
							<div class="row">
							<div class="col-sm-1"></div>
												
								
							<div class="col-sm-10 text-right">
                                
								<a id="search_contracts" class="btn btn-primary btn-rounded width-md waves-effect waves-light" href="javascript:void(0);" role="button">Search Contracts</a>
								 
								
								
								</div>	
							<div class="col-sm-1"></div>
                           </div> 
							<?php
							}
							?>
					
					
					<!-- end secondary buyer -->
					
					
					<!-- contract form -->
					<?php
							
					if(!empty($is_add_buyer) )
					{			
					?>
					<div class="row">
                        <div class="col-sm-1"></div>
						<div class="col-sm-10">
                            <div class="card-box">
							
							
						
								
                              
                          <div class="row">
                          <div class="col-lg-12">
                                        
                         	
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Realtor Name">Realtor Name</label>
                                 <input type="text"  name="full_name" class="form-control" value="<?php echo $users->first_name." ".$users->last_name ?>" required />   
                                </div>
                            </div>
											
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Contact Number">Contact Number</label>
                                   <input type="text"   class="form-control float-number" name="contact_number float-number" maxlength="10" value="<?php echo $users->phone ?>" />
                                </div>
                            </div>				
											
											
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="E-mail">E-mail</label>
                                   <input type="email"   class="form-control float-number" name="email" value="<?php echo $users->email ?>" />
                                </div>
                            </div>				
											 
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Contract Type">Contract Type</label>
                                    <select name="contract_type" class="form-control" required>
							  	<option value="Buyer Agreement">Buyer Agreement</option>
							  </select>
                                </div>
                            </div>					

							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Contract Start Date">Contract Start Date</label>
                                   <input type="text" id="start_date" name="start_date"  class="form-control" required />
                                </div>
                            </div>		
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Contract End Date">Contract End Date</label>
                                   <input type="text"  id="end_date" name="end_date"  class="form-control" required />
                                </div>
                            </div>	
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Upload Contract (only .pdf format)">Upload Contract (only .pdf format)</label>
                                   <input class="form-control" name="document_file[]" type="file" id="formFileDisabled" onchange="fileValidation()" multiple required />
                                </div>
                            </div>	
							<input name="status" type="hidden" value="0">
							
                            <div class="col-lg-12 col-md-12 col-sm-12">
                               <button type="submit" class="btn btn-primary btn-rounded width-md waves-effect waves-light">Upload</button>   
                            </div>	             
                                           

                                       
                                    </div>
								
								
										
									
								
                                </div>
                                <!-- end row -->
							
                            </div>
							
							
							
                        </div>
						
                    </div>
					<?php
					}
					?>
					</form>
					<!-- end of contract form -->
					
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
	
<!--	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>-->
   <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	
	
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
		
		
		//if((buyer_name!="" ||buyer_last_name!="") && (buyer_email!="" || buyer_phone!="" ))
		if((buyer_name!="" ||buyer_last_name!="" ||buyer_email!="" || buyer_phone!="" ))
		{
		    search_type='primary';
		    
		    sbuyer_name="";
		    sbuyer_last_name="";
		    sbuyer_email="";
		    sbuyer_phone="";
		}
	
		//if((sbuyer_name!="" ||sbuyer_last_name!="") && (sbuyer_email!="" || sbuyer_phone!="" ))
		
		if((sbuyer_name!="" ||sbuyer_last_name!="" || sbuyer_email!="" || sbuyer_phone!="" ))
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
