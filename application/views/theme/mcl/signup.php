<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>MCL-Register</title>
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
        <div class="logo"> <a href="<?php echo base_url(); ?>" title=""><img src="<?php echo base_url(); ?>assets/home_assets/images/logo.png" alt="" title=""></a> </div>
        
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
  

  <div class="inner_page register">
<div class="inner_bg">
  <div class="auto-container">
<div class="page_title"><h1 class="text-center">Register</h1></div>
<div class="content">
<section>
 <form method="POST" action="<?php echo base_url(); ?>user/signup/do_signup" onsubmit="return matchPassword()">
<div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="#" onsubmit="return matchPassword()">
              
              <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
              
              <select name="user_type"  class="form-control" id="usertype" on="" required="">
              <option value="">Select user type</option>
						  <option value="agent">Agent</option>
						  <option value="broker_record">Broker of Record</option>
              </select>
                                
                        </div>
                        </div>
                        
                      <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group" style="display:none" id="company_show_hide">
                                <input type="text" name="broker_company" placeholder="Company name" class="form-control">
                            </div>
                        </div>
              
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" required="">
                                </div>
                            </div>
                            
              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                                </div>
                            </div>
                            
              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="phone_number" maxlength="10" placeholder="Phone Number" class="form-control float-number" required="">
                                </div>
                            </div>
              
              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" name="email_address" placeholder="Email" class="form-control" required="">
                                </div>
                            </div>
              
              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="password" id="user_password" name="user_password" placeholder="Password" class="form-control" required="">
                                </div>
                            </div>
              
              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="password" id="confirm_user_password" name="confirm_user_password" placeholder="Confirm Password" class="form-control" required="">
                                </div>
                            </div>
              
              
                <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
              
                <select name="state_id" id="state_id" class="form-control" onchange="getmls(this.value);" required="">
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
                                 <select name="affiliated_mls_name" id="affiliated_mls_name" class="form-control" onchange="getbroker(this.value);" required="">
                  <option value="">Select MLS Name</option>
                
                </select>  
                  
                
                                </div>
                            </div>

              
              
              
              
              
              
              <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                <!--<select name="user_broker_id" class="form-control" id="user_broker_id" onchange="getoffice_address(this.value);">
                </select>   -->
				
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
                                    <input type="text" name="office_address" id="office_address" placeholder="Office Address" class="form-control" required="">
                                </div>
                            </div>
              
              
                          
                
              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="office_phone_number" maxlength="10" placeholder="Office Phone Number" class="form-control float-number" required="">
                                </div>
                            </div>
              
              
              
              
              
              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    
                                </div>
                            </div>
              
              
              
            
              
              
              
              <div class="col-lg-6 col-md-6 col-sm-12">
              <input type="checkbox"  id="chkterms">&nbsp;<a target="_blank" href="terms-and-condition.php"><strong>I accept all terms &amp; conditions </strong> </a>
        
              </div>
            
                        </div>
            
                                <div class="form-group account-btn text-center mt-2">
                                    <div class="col-12">
                                        <!-- <button id="btncheck" class="btn btn-success btn-rounded width-md waves-effect waves-light" type="submit">Register</button> -->

                                        <button  type="submit" id="btncheck" class="theme-btn btn-style-two" disabled><span class="txt">Register</span></button>

                                    </div>
                                </div>

                                   
                        <div class="text-center alrady_have">
                            <p class="text-muted">Already have account? <a href="<?php echo base_url(); ?>user/login" class="text-primary ml-1"> <b>Sign In</b> </a> </p>
                        </div>
               


                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                
                </div>
                <!-- end col -->
            </div>
</form>			
</section>

</div>
  </div>
</div>
  </div>
 

 <?php include 'footer_home.php';?>
 
 
 
 
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

</body>

<!-- Mirrored from tecnovision.net/dummy/mcl/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 14:57:47 GMT -->
</html>