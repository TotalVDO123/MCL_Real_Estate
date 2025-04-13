	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/shutterstock_2069930228.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Reset Password</h1>
            </div>
        </div>
    </section>
	
	
	
	
    <section class="section">
        <div class="container">
            
			
			<!--
			<div class="grid gap-5 mb-5">
                <h2 class="title">Login</h2>
                <!--<p class="m-0">Be Informed. Be Smart. Be Sure.</p>-->
            <!--
			</div>
            -->
			
			<div class="row align-items-start justify-content-between">
			 <div class="col-xl-2 col-lg-2 col-md-12">
			</div>		

			   <div class="col-xl-8 col-lg-8 col-md-12">
                   
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
						
						<form method="POST"  action="<?php echo base_url(); ?>user/reset_password/save" onsubmit="return matchPassword()" >
						<div class="row">
							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="password"><strong>New Password</strong></label>
                                    <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control" required />
                                </div>
                            </div>
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="password"><strong>Verify Password</strong></label>
                                    <input type="password" id="verify_password" name="verify_password" placeholder="Verify Password" class="form-control" required />
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
							<button type="submit"  class="btn btn-primary" >Reset My Password</button>
							</div>
							
							
                        </div>
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
  var pw1 = document.getElementById("new_password").value;  
  var pw2 = document.getElementById("verify_password").value;  
  
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
	
	