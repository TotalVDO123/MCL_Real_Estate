<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:40:15 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Verify OTP | MCL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo base_url()?>admin_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?php echo base_url()?>admin_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin_assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
<style>
	  
	  body{
  background:#eee;
}

.bgWhite{
  background:white;
  box-shadow:0px 3px 6px 0px #cacaca;
}

.title{
  font-weight:600;
  margin-top:20px;
  font-size:24px
}

.customBtn{
  border-radius:0px;
  padding:10px;
}

form input{
  display:inline-block;
  width:50px;
  height:50px;
  text-align:center;
}
	  
	  
	  </style>

</head>

<body>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="text-center account-logo-box">
                            <div class="mt-2 mb-2">
                               <h4 class="page-title" style="color:#fff" >Verify OTP</h4>  
								<?php /* ?>
								<a href="index.html" class="text-success">
                                    <span><img src="<?php echo base_url() ?>assets/mcl_assets/images/logo.svg" alt="" height="36"></span>
                                </a>
								<?php */ ?>
                            </div>
                        </div>

                        <div class="card-body">

			<div style="height:80px;"></div>				

			<form action="" class="mt-7 otp_form" style="margin-left:50px;">
              <span class="po-row">
			  <input class="otp" type="text" value="<?php echo $otp_no[0]; ?>" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 >
              </span>
			  <span class="po-row">
			  <input class="otp" type="text" value="<?php echo $otp_no[1]; ?>" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 >
              </span>
			  <span class="po-row">
			  <input class="otp" type="text" value="<?php echo $otp_no[2]; ?>" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 >
              </span>
			  <span class="po-row">
			  <input class="otp" type="text" value="<?php echo $otp_no[3]; ?>" oninput='digitValidate(this)'onkeyup='tabChange(4)' maxlength=1 >
			  </span>
			  
			  <span class="po-row">
			  <input class="otp" type="text" value="<?php echo $otp_no[4]; ?>" oninput='digitValidate(this)'onkeyup='tabChange(5)' maxlength=1 >
			  </span>
			  
			</form>
            <div style="height:80px;"></div>				                    
			<div class="form-group account-btn text-center mt-2">
				<div class="col-12">
					<button id="verify_otp" class="btn btn-success btn-rounded width-md waves-effect waves-light" type="submit">Verify</button>
				</div>
			</div>
                            

                        </div>
						
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                   

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


<!-- Mirrored from coderthemes.com/zircos/layouts/vertical/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Nov 2022 06:40:15 GMT -->
</html>

<script>

let digitValidate = function(ele){
  console.log(ele.value);
  ele.value = ele.value.replace(/[^0-9]/g,'');
}

let tabChange = function(val){
    let ele = document.querySelectorAll('input');
    if(ele[val-1].value != ''){
      ele[val].focus()
    }else if(ele[val-1].value == ''){
      ele[val-2].focus()
    }   
 }

</script>


 <script>
  
  $(function() {
    //hang on event of form with id=myform
   //$("#myform").submit(function(e) {
	
	$('#verify_otp').click(function () {
		
		var user_id=<?php echo $user_id ?>;
		 var total_otp='';	
		$(".po-row").each(function() {
        var otp_val = $(this).find(".otp").val();;
		//if(otp_val.length == 0)
		///{
		//	alert('OTP is required');
		//	return false;
		///}	
		
		
		//alert(otp_val);
        total_otp += otp_val;
    });
		
		//falert(total_otp);
		
		
        $.ajax({
          url: '<?php echo base_url(); ?>home/check_otp',
          type: 'post',
          data: { user_id:user_id,otp:total_otp},
          success: function (response) {
           if(response==1)
		   {
			  window.location.href='<?php echo base_url() ?>user/login';  
		   }
		   else
		   {
				alert('Please enter valid OTP');
				
		   }		
						
          }
        });	
			
			

        //get the action-url of the form
       

    });

});
  
  </script>
