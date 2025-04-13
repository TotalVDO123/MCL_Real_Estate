	
	
	<section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/realestate_images.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Create MLS </h1>
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
			       
			       	<div class="row">
			<div class="form-group mb-0">

                <?php if($this->session->userdata('success') !=''):?>
                    <div class="alert alert-success">
                       <?php echo $this->session->userdata('success'); ?>
                    </div>
                <?php 
                
                $this->session->set_userdata('success', '');
                endif; ?>
                <?php if($this->session->userdata('error') !=''):?>
                    <div class="alert alert-danger">
                      <?php echo $this->session->userdata('error'); ?>
                    </div>
                <?php 
                $this->session->set_userdata('error', "");
                endif; ?>
            </div>
						
			</div>
		
			       
			       
                    <form method="POST" action="<?php echo base_url(); ?>admin/edit_mls/<?php echo $mls_id ?>"  >
                        <div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
							<label for="States">State</label>
							  
							<select name="state_id" id="state_id"  onChange="getmls(this.value);"  class="form-control" required>
							  
							<option value="0">Select State</option>
							  
							  <?php
							  foreach($states as $state)
							  {
							  ?>
							  <option value="<?php echo $state['id'] ?>" <?php if($mls_info[0]['state_id']==$state['id']) { echo 'selected'; } ?> "><?php echo $state['state_name'] ?></option>
							  <?php
							  }
							  ?>
							  </select>
                               </div>
                            </div>
						
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="MLS Name">Affiliated MLS Name</label>
                                    <input type="text" name="mls_name" placeholder="MLS Name" class="form-control" value="<?php echo $mls_info[0]['mls_name'] ?>" required />
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="License Limit">Limit for the Agent License</label>
                                    <input type="text" name="license_limit" placeholder="License Limit" class="form-control" value="<?php echo $mls_info[0]['license_limit'] ?>" />
                                </div>
                            </div>
						
						
                        <button type="submit" id="btncheck" class="btn btn-primary" >Update</button>
                    </form>
                
									
				
				</div>
              
				
			
            </div>
        </div>
    </section>
    
	
	
	

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
