	
	
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
                    <form method="POST" action="<?php echo base_url(); ?>admin/create_mls/"  >
                        <div class="col-lg-6 col-md-6 col-sm-12">
                               
								 <div class="form-group">
								<label for="States">State</label>
							  
							  <select name="state_id" id="state_id"  onChange="getmls(this.value);"  class="form-control" required>
							  
							  <option value="">Select State</option>
							  
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
						
							
						
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
								<label for="MLS Name">Affiliated MLS Name</label>
                                    <input type="text" name="mls_name" placeholder="MLS Name" class="form-control" value="" required />
                                </div>
                            </div>
							
						
						
                        <button type="submit" id="btncheck" class="btn btn-primary" >Create</button>
                    </form>
                
									
				
				</div>
              
				
			
            </div>
        </div>
    </section>
    
	
	
	

