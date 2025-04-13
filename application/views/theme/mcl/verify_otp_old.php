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
	  
	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/contactus.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Verify OTP</h1>
            </div>
        </div>
    </section>
    <section class="section">
        <!--<div class="container">
            <div class="grid gap-5 mb-5">
                <h2 class="title">Get in Touch</h2>
                <p class="m-0">Be Informed. Be Smart. Be Sure.</p>
            </div>
            <div class="row align-items-start justify-content-between">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <form>
                        <div class="row">
                            
							
						
						
						</div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
            </div>
        </div>
		-->
		
		<div class="container">
  <div class="row justify-content-md-center">
      <div class="col-md-4 text-center">
        <div class="row">
          <div class="col-sm-12 mt-5 bgWhite">
		  
		  <?php if($this->session->flashdata('success') !=''):?>
          <div class="alert alert-success">
          <?php echo $this->session->flashdata('success'); ?>
          </div>
          <?php endif; ?>
		  
		  
            <div class="title">
              Verify OTP
            </div>

            <form action="" class="mt-5 otp_form">
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
            <hr class="mt-4">
            <button id="verify_otp" class='btn btn-primary btn-block mt-4 mb-4 customBtn'>Verify</button>
          </div>
        </div>
      </div>
  </div>
</div>
		
		
    </section>
    
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
 