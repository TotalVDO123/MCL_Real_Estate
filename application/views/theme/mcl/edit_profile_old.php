	
	<?php
	//print_r($profile_info);
	?>
	
	<section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/shutterstock_574921243.jpg");">
        <div class="container">
            <div class="caption">
                <h1 class="title">Edit Profile </h1>
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
                    <form method="POST" action="<?php echo base_url(); ?>user/update_profile"  >
					 <div class="form-group mb-0">
                            <?php if($this->session->userdata('success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->userdata('success'); ?>
                                </div>
                            <?php 
                            
                            $this->session->set_userdata('success','');
                            endif; ?>
                            <?php if($this->session->userdata('error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo $this->session->userdata('error'); ?>
                                </div>
                            <?php 
                            $this->session->set_userdata('error','');
                            endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">First Name</label>
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" value="<?php echo $profile_info[0]['first_name'] ?>" required />
                                </div>
                            </div>
                            
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Last Name</label>
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="<?php echo $profile_info[0]['last_name'] ?>" />
                                </div>
                            </div>
                            
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Phone Number</label>
                                    <input type="text" name="phone_number" placeholder="Phone Number" maxlength="10" class="form-control float-number" value="<?php echo $profile_info[0]['phone'] ?>" required />
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Email</label>
                                    <input type="email" name="email_address" placeholder="Email" class="form-control" value="<?php echo $profile_info[0]['email'] ?>" readonly required />
                                </div>
                            </div>
							
							
							
								<div class="col-lg-6 col-md-6 col-sm-12">
                               
								 <div class="form-group">
								<label for="States">State</label>
							  
							  <select name="state_id" id="state_id"  onChange="getmls(this.value);"  class="form-control" required>
							  <!--
							  <option value="">Select States</option>
							  -->
							  
							  <?php
							  foreach($states as $state)
							  {
							  ?>
							  <option value="<?php echo $state['id'] ?>" <?php if($profile_info[0]['state_id']==$state['id']) { echo 'selected'; } ?> "><?php echo $state['state_name'] ?></option>
							  <?php
							  }
							  ?>
							  </select>
                               </div>

							


                            </div>
						<?php			
							$sql = "SELECT * FROM   state_mls where is_active=1 and state_id='".$profile_info[0]['state_id']."'";
							$res = $this->db->query($sql);
							$rowcoll = $res->result_array();			
						?>
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Affiliated MLS Name</label>
									
							<select name="affiliated_mls_name" id="affiliated_mls_name" class="form-control" onChange="getbroker(this.value);" required>
							  <option value="">Select MLS Name</option>
							  <?php
							  foreach($rowcoll as $row_mls)
							  {
							  ?>
							  <option value="<?php echo $row_mls['id'] ?>" <?php if($profile_info[0]['affiliated_mls_name']==$row_mls['id']) { echo 'selected'; } ?> "><?php echo $row_mls['mls_name'] ?></option>
							  <?php
							  }
							  ?>
							  </select>
                                </div>
                            </div>
						
							
							
							
							
							<?php /* ?>
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
							<?php */ ?>
							
							<?php /* ?>
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Affiliated Real Estate Brokerage</label>
                                    <input type="text" name="realestate_brokerage" placeholder="Affiliated Real Estate Brokerage" class="form-control float-number" value="<?php echo $profile_info[0]['realestate_brokerage'] ?>" required />
                                </div>
                            </div>
							
							<?php */ ?>
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                            
                            <?php
                            if($profile_info[0]['role']=='agent')
                            {
                            ?>
                            
                            <label for="Broker">Broker</label>
                              <select name="user_broker_id" class="form-control" id="user_broker_id" >
							  <option value="0">Select Broker</option>
							  <?php
							  	
							  foreach($broker_record as $brow )
							  {
							  ?>
							  <option value="<?php echo $brow['user_id'] ?>" <?php if($profile_info[0]['user_broker_id']==$brow['user_id']) { echo 'selected'; } ?> > <?php echo $brow['first_name']." ".$brow['last_name']  ?></option>
							  
							  <?php
							  }
							  ?>

							  
							  </select>  
                            <?php
                            }
                            ?>       
                                   
                                </div>
                            </div>
							
							
							
							
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Office Address</label>
                                    <input type="text" name="office_address" placeholder="Office Address" class="form-control" value="<?php echo $profile_info[0]['office_address'] ?>" required />
                                </div>
                            </div>
							
							
							
							
							
							
						    <div class="col-lg-6 col-md-6 col-sm-12">
						   <div class="form-group">
							<label for="Buye's Phone">Office Phone Number</label>
								<input type="text" name="office_phone_number" maxlength="10" placeholder="Office Phone Number" class="form-control float-number" value="<?php echo $profile_info[0]['office_phone_number'] ?>" required />
							</div>
                            </div>
						
						
						<?php
						if($profile_info[0]['role']=='broker_record')
						{
						
						?>
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group"  id="company_show_hide">
                                 <label for="Company name">Company name</label>   
                                    <input type="text" name="broker_company"  placeholder="Company name" value="<?php echo $profile_info[0]['broker_company'] ?>" class="form-control" />
                                </div>
                            </div>
                        <?php
						}
                        ?>    
												
                        </div>
						
						
						
						
						
                        <button type="submit" id="btncheck" class="btn btn-primary" >Submit</button>
                    </form>
                
									
				
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
    alert("Passwords did not match");
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
	///alert(state);
	
	
	$.ajax({
		type: "POST",
		url: '<?php echo base_url() ?>user/get_mls/'+state,
		success: function(data){
			
			//alert(data);
			
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
			
		}
	});
	
	
	
	
}
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