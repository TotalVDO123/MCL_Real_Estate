	  
	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/shutterstock_2069930228.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Login</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
       
<?php /* ?>
	   <div class="container">
	
	<div class="row">
			<div class="col-xl-2 col-lg-2 col-md-2"></div>
			<div class="col-xl-8 col-lg-8 col-md-8">
				<button type="button" class="btn btn-primary btn-lg btn-block"><a href="<?php echo $dotloop_signin; ?>"> Login With Dotloop</a> </button>

			</div>
			
			<div class="col-xl-2 col-lg-2 col-md-2"></div>
			</div>
	 </div>
	<?php */ ?>
	
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
                    <form method="POST" action="<?php echo base_url(); ?>user/do_login"  >
                         <div class="form-group mb-0">
                            <?php if($this->session->flashdata('login_success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->flashdata('login_success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('login_error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo $this->session->flashdata('login_error'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
						
						
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								 <label for="email"><strong>Email address:</strong></label>
                                    <input type="email" name="email_address" placeholder="Email" class="form-control" value="<?php echo $this->session->flashdata('email_address'); ?>" required />
                                </div>
                            </div>
							
							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="password"><strong>Password:</strong></label>
                                    <input type="password" name="login_password" placeholder="Password" class="form-control" required />
                                </div>
                            </div>
							<?php /* ?>
							<div class="col-lg-12 col-md-12 col-sm-12">
							<input type="checkbox" id="chkterms" />&nbsp;<a href="<?php echo base_url() ?>home/terms_and_conditions"><strong>I accept all terms & conditions </strong></a>
        
							</div>
							<?php */ ?>
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
							<button type="submit"  id="btncheck" class="btn btn-primary" >Submit</button>
							</div>
							
							
							<div class="col-lg-4 col-md-4 col-sm-4">
							<a href="<?php echo base_url(); ?>user/forget_password" class="item"><strong>Forgot Password ?</strong></a>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2">
							<a href="<?php echo base_url(); ?>user/registration" class="item"><strong>Signup</strong></a>
							</div>
	


							
                        </div>
                        
                    
				
					
					<div>&nbsp;</div>
							
							
					
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
	
	
	
  function validate_form() 
  {  
		if (confirm('do you want to link with dotlink?')) 
		{
			window.location.href="https://auth.dotloop.com/login";
			return false;
		} 
		else
		{
			return true;
		}	
	
  }  
	

	
	</script>