    


	<section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/realestate_images.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Signup</h1>
            </div>
        </div>
    </section>
	
	
	<div>&nbsp;</div>
        
		
		<?php /* ?>
		<div class="container">
	
	<div class="row">
			<div class="col-xl-2 col-lg-2 col-md-2"></div>
			<div class="col-xl-8 col-lg-8 col-md-8">
				<button type="button" class="btn btn-primary btn-lg btn-block"><a href="<?php echo $dotloop_signin; ?>"> Dotloop Signup </a> </button>

			</div>
			
			<div class="col-xl-2 col-lg-2 col-md-2"></div>
			</div>
	 </div>
  
	<?php */ ?>
	
	
    <section class="section">
        <div class="container">
           
			
			
			
            <div class="row align-items-start justify-content-between">
			 <div class="col-xl-2 col-lg-2 col-md-12">
			</div>		

			   <div class="col-xl-8 col-lg-8 col-md-12">
                    <form method="POST" action="<?php echo base_url(); ?>user/signup/do_signup" onsubmit="return matchPassword()" >
					 <div class="form-group mb-0">
                            <?php if($this->session->userdata('sign_up_success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->userdata('sign_up_success'); ?>
                                </div>
                            <?php 
                             $this->session->set_userdata('sign_up_success',"");
                            endif; ?>
                            <?php if($this->session->userdata('sign_up_error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo html_entity_decode( $this->session->userdata('sign_up_error')); ?>
                                </div>
                            <?php 
                            
                            $this->session->set_userdata('sign_up_error',"");
                            endif; ?>
                        </div>
                        
                        
                        
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
						
						
                        <button type="submit" id="btncheck" class="btn btn-primary" disabled >Submit</button>
                    </form>
                
							<div>&nbsp;</div>
							<a href="<?php echo base_url(); ?>user/login" class="item"><strong>Login</strong></a>
							
						
				
				
				</div>
                <div class="col-xl-2 col-lg-2 col-md-12">
                    <?php /* ?>
					<div class="grid gap-10">
                        <h4 class="font-weight-700">Contact Details</h4>
                        <a href="#" class="auto-fr gap-10">
                            <i class="link las la-envelope"></i>
                            <p class="m-0">support@multipleclientlist.com</p>
                        </a>
                        <div class="flex gap-15 mt-3">
                            <a href="#">
                                <img class="svg-icon" src="<?php echo base_url(); ?>assets/mcl_assets/images/fb.svg">
                            </a>
                            <a href="#">
                                <img class="svg-icon" src="<?php echo base_url(); ?>assets/mcl_assets/images/ig.svg">
                            </a>
                        </div>
                    </div>
					<?php */ ?>
					
                </div>
				
				
			
            </div>
        </div>
    </section>
    
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