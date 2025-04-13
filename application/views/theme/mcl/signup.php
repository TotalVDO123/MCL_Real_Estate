<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:40:15 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Register | MCL</title>
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

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">

                        <div class="text-center account-logo-box">
                            <div class="mt-2 mb-2">
                                <h4 class="page-title" style="color:#fff" >Signup</h4>
                                    
                                
                            </div>
                        </div>

                        <div class="card-body">

                            <form method="POST" action="<?php echo base_url(); ?>user/signup/do_signup" onsubmit="return matchPassword()">
							
							<div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
							
						  <select name="user_type" class="form-control" id="usertype" on required>
						  <option value="">Select user type</option>
						  <option value="agent">Agent</option>
						  <option value="broker_record">Broker of Record</option>
						  </select>
                                
                        </div>
                        </div>
                        
                    	<div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group" style="display:none" id="company_show_hide">
                                <input type="text" name="broker_company"  placeholder="Company name" class="form-control" />
                            </div>
                        </div>
							
                        
                        
                        
                        
                       
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" required />
                                </div>
                            </div>
                            
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" />
                                </div>
                            </div>
                            
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="phone_number" maxlength="10" placeholder="Phone Number" class="form-control float-number" required />
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" name="email_address" placeholder="Email" class="form-control" required />
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="password" id="user_password" name="user_password" placeholder="Password" class="form-control" required />
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="password" id="confirm_user_password" name="confirm_user_password" placeholder="Confirm Password" class="form-control" required />
                                </div>
                            </div>
							
							
								<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
							
							  <select name="state_id" id="state_id" class="form-control"  onChange="getmls(this.value);" required>
							  <option value="">Select State</option>
							  <?php
							  foreach($states as $state)
							  {
							  ?>
							  <option value="<?php echo $state['id'] ?>"><?php echo $state['state_name'] ?></option>
							  <?php
							  }
							  ?>
							
							  </select>
							 
                               </div>
                            </div>
						
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                 <select name="affiliated_mls_name" id="affiliated_mls_name" class="form-control" onChange="getbroker(this.value);" required>
							    <option value="">Select MLS Name</option>
							  
								</select>  
									
								
                                </div>
                            </div>

							
							
							
							
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              <select name="user_broker_id" class="form-control" id="user_broker_id" >
							  
							  <?php /* ?>
							  <option value="0">Select Company</option>
							  <?php
							  foreach($broker_record as $brow )
							  {
							  ?>
							  <option value="<?php echo $brow['user_id'] ?>"> <?php echo $brow['broker_company'] ?></option>
							  
							  <?php
							  }
							  ?>
                            <?php */ ?>    
							  
							  </select>  
                                   
                                   
                                </div>
                            </div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="office_address" placeholder="Office Address" class="form-control" required />
                                </div>
                            </div>
							
							
													
								
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="office_phone_number" maxlength="10" placeholder="Office Phone Number" class="form-control float-number" required />
                                </div>
                            </div>
							
							
							
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    
                                </div>
                            </div>
							
							
							
						
							
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
							<input type="checkbox" id="chkterms" />&nbsp;<a target="_blank" href="<?php echo base_url()?>home/terms_and_conditions"><strong>I accept all terms & conditions </strong> </a>
        
							</div>
						
                        </div>
						
							
							
							
                                <!--
								<div class="form-group">
                                    <input class="form-control" type="email" id="email" required="" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="text" id="username" required="" placeholder="Username">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" required="" id="password" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <div class="checkbox checkbox-success pt-1 pl-1">
                                        <input id="checkbox-signup" type="checkbox" checked="checked">
                                        <label for="checkbox-signup" class="mb-0">I accept <a href="#">Terms and Conditions</a></label>
                                    </div>
                                </div>
								-->
                                <div class="form-group account-btn text-center mt-2">
                                    <div class="col-12">
                                        <button id="btncheck" class="btn btn-success btn-rounded width-md waves-effect waves-light" type="submit" disabled>Register</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-5">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Already have account?<a href="<?php echo base_url()?>user/login" class="text-primary ml-1"><b>Sign In</b></a></p>
                        </div>
                    </div>

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?php echo base_url()?>admin_assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin_assets/js/app.min.js"></script>

</body>


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:40:15 GMT -->
</html>

<script>
	
	function matchPassword() {  
  var pw1 = document.getElementById("user_password").value;  
  var pw2 = document.getElementById("confirm_user_password").value;  
  
  if(pw1 != pw2)  
  {   
    alert("Passwords do not match");
    return false;		
  } else {  
    //alert("Password created successfully");  
	return true;
  }  
}  
	
	</script>
	
	<script>
function getmls(state)
{
	
	
	$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>user/get_mls/'+state,
		success: function(data){
			
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
			//$('#city-list').find('option[value]').remove();
			//$("#state-list").removeClass("loader");
		}
	});
	
	
	
	
}
</script>




<script>
    
$('#usertype').on('change', function()
{
   // alert(this.value); //or alert($(this).val());
   
    
    if(this.value=='broker_record')
    {
       $("#user_broker_id").attr('disabled', true);
       $('#company_show_hide').show(); 
    }
    else
    {
        $("#user_broker_id").attr('disabled', false);
        $('#company_show_hide').hide(); 
    }
    
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

<script type="text/javascript">
        
		/*
		
		$(function() {
            $('#btncheck').click(function() {
                if ($('#chkterms').is(':checked')) {
                    alert('you agreed conditions')
                }
                else {
                    alert('please check terms & conditions');
					return false;
                }
            })
        })
    */
	
	
	$(function() {
            $('#chkterms').click(function() {
                if ($('#chkterms').is(':checked')) {
                   //alert('you agreed conditions')
					$("#btncheck").removeAttr('disabled');
					 //$('#btncheck').attr('disabled', 'false');
                }
                else 
				{
                    //alert('please check terms & conditions');
					//return false;
					$('#btncheck').attr('disabled', 'true');
                }
            })
        })
	
	
	</script>       