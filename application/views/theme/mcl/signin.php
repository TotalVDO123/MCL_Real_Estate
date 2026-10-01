
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>MCL-Login</title>
<!-- Stylesheets -->
<link href="<?php echo base_url(); ?>assets/home_assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/home_assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/home_assets/css/responsive.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/home_assets/images/favicon.png" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>assets/home_assets/images/favicon.png" type="image/x-icon">

<!-- Color Themes -->
<link id="theme-color-file" href="<?php echo base_url(); ?>assets/home_assets/css/color-themes/default-theme.css" rel="stylesheet">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body class="hidden-bar-wrapper">
<div class="page-wrapper"> 
  
 <!-- Main Header -->
  <header class="main-header"> 
    
    <!-- Header Lower -->
    <div class="header-lower">
      <div class="auto-container">
        <div class="inner-container d-flex justify-content-between align-items-center">
          <div class="logo-box">
            <div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/home_assets/images/logo.png" alt="" title=""></a></div>
          </div>
  
          
          <!-- Outer Box -->
          <div class="outer-box d-flex align-items-center flex-wrap"> 
 
         <div class="nav-outer d-flex align-items-center flex-wrap"> 
            
            <!-- Main Menu -->
            <nav class="main-menu show navbar-expand-md">
              <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                <ul class="navigation clearfix">
                  <li> <a href="<?php echo base_url(); ?>/#keyfeatures_section">Discover MCL</a></li>
                  <li><a href="<?php echo base_url(); ?>/#pricing">14-Days Free Trial</a></li>
                  <li><a href="<?php echo base_url(); ?>/#contact"> Contact</a></li>
                  <li><div class="button-box"> <a href="<?php echo base_url(); ?>user/login" class="theme-btn btn-style-one"><span class="txt">Login</span></a> </div></li>
                </ul>
              </div>
            </nav>
            <!-- Main Menu End--> 
            
          </div>

            <!-- Button Box -->
            
            
            <!-- Mobile Navigation Toggler -->
            <div class="mobile-nav-toggler"><span class="icon flaticon-140-menu-3"></span></div>
          </div>
          <!-- End Outer Box --> 
          
        </div>
      </div>
    </div>
    <!-- End Header Lower --> 
    
    <!-- Sticky Header  -->
    <div class="sticky-header">
      <div class="auto-container d-flex justify-content-between align-items-center flex-wrap"> 
        <!-- Logo -->
        <div class="logo"> <a href="index.php" title=""><img src="<?php echo base_url(); ?>assets/home_assets/images/logo.png" alt="" title=""></a> </div>
        
        <!-- Main Menu -->
        <nav class="main-menu"> 
          <!--Keep This Empty / Menu will come through Javascript--> 
        </nav>
        <!-- Main Menu End--> 
        
        <!-- Mobile Navigation Toggler -->
        <div class="mobile-nav-toggler"><span class="icon flaticon-140-menu-3"></span></div>
      </div>
    </div>
    <!-- End Sticky Menu --> 
    
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
      <div class="menu-backdrop"></div>
      <div class="close-btn"><span class="icon flaticon-103-cancel-1"></span></div>
      <nav class="menu-box">
        <div class="nav-logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/home_assets/images/logo.png" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
      </nav>
    </div>
    <!-- End Mobile Menu --> 
    
  </header>
  <!-- End Main Header --> 
  

  <div class="inner_page">
<div class="inner_bg">
  <div class="auto-container">
<div class="page_title"><h1 class="text-center">Login</h1></div>
<div class="content">
<section>


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

 <form method="POST" action="<?php echo base_url(); ?>user/do_login">
 <div class="login-container">
        <div class="input-field">
            <!-- <label for="username">Username</label> -->
            <input type="email" name="email_address" id="email_address" value="<?php echo $this->session->flashdata('email_address'); ?>" required="Email" placeholder="Username">
        </div>
        <div class="input-field">
            <!-- <label for="password">Password</label> -->
            <input type="password" required="" id="password" placeholder="Password" name="login_password" >
        </div>
        <div class="remember-me">
        <label class="checkbox-container" for="remember">
        <input type="checkbox" id="remember">
        <span class="checkmark"></span>
        Remember me
    </label>
</div>
        <div class="forgot-password">
            <a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Forgot your password?</a>
        </div>
        <button class="login-button theme-btn btn-style-two"><span class="txt">Log In</span></button>
        <div class="signup-link">
            Don't have an account? <a href="<?php echo base_url(); ?>user/registration" style="color: #4caf50;">Sign Up</a>
        </div>
    </div>
	
	</form>
	
	
</section>

</div>
  </div>
</div>
  </div>
 

 <?php include 'footer_home.php';?>

</body>

<!-- Mirrored from tecnovision.net/dummy/mcl/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:57:47 GMT -->
</html>