


   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
   
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <!--<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' type='text/javascript'></script>-->
  
  <!--<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>-->
  <!-- Script -->
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' type='text/javascript'></script>-->

  
  
  
  
	  
	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Contract</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
        <div class="container">
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		
		       <h1 class="title"> Edit Contract</h1>
		</div>	   
        </div>	
	    </div>	
		
	<div class="row">
	<div class="col-xl-2 col-lg-2 col-md-2">
	
	</div>
			
								
						<div class="col-xl-8 col-lg-8 col-md-8">
						
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
						
						
						<?php
					$array_start_date = explode('-', $contract->contract_start_date);
		            $phpdate = strtotime( $array_start_date[2].'-'.$array_start_date[1].'-'.$array_start_date[0] );
		            $from_date = date( 'm-d-Y', $phpdate );
		
		
		
		
		
		            $array_end_date = explode('-', $contract->contract_end_date);
		            $phpdate1 = strtotime( $array_end_date[2].'-'.$array_end_date[1].'-'.$array_end_date[0] );
		            $to_date = date( 'm-d-Y', $phpdate1 );
						
						
						?>
						
						
						
						<form id="frm" method="POST" enctype="multipart/form-data" onsubmit="return validate_date()" action="<?php echo base_url() ?>admin/update_contract/<?php echo $contract_id ?>/update" >
						
						<input type="hidden" id="user_id" name="user_id" value="<?php echo $users->user_id ?>">
							

							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Realtor Name">Realtor Name</label>
                                    <input type="text"  name="full_name" class="form-control" value="<?php echo $users->first_name." ".$users->last_name ?>" required />
                                </div>
                            </div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Contact Number">Contact Number </label>
                                    <input type="text" name="contact_number float-number"  maxlength="10"  class="form-control float-number" value="<?php echo $users->phone ?>" />
                                </div>
                            </div>
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="E-mail">E-mail</label>
                                    <input type="email" name="email"  class="form-control" value="<?php echo $users->email ?>" required />
                                </div>
                            </div>
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group"> 
								<label for="Contract Type">Contract Type</label>
								
								 <select name="contract_type" class="form-control" required>
							  	<option value="Buyer Agreement">Buyer Agreement</option>
							  </select>
								
								
								
								
								
								</div>
                            </div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                 <label for="Contract Start Date">Contract Start Date</label>  
									<input type="text" id="start_date" name="start_date" value="<?php echo $from_date; ?>"  class="form-control" required />
                                </div>
                            </div>
						
                        <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                 <label for="Contract End Date">Contract End Date</label>  
									<input type="text"  id="end_date" name="end_date" value="<?php echo $to_date; ?>"  class="form-control" required />
                                </div>
                            </div>
						
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                 
								 <label for="Upload Contract (only .pdf format)" class="form-label">Upload Contract (only .pdf format) </label>
							<input class="form-control" name="document_file[]" type="file" id="formFileDisabled" onchange="fileValidation()" multiple  />
                                </div>
                            </div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group"> 
								<label for="Contract Type">Status</label>
								
								 <select name="status" class="form-control" required>
							  	<option value="0" <?php if($contract->status==0){ echo 'selected'; } ?>  >Pending</option>
							  	<option value="1" <?php if($contract->status==1){ echo 'selected'; } ?>  >Active</option>
							  	
							  	
								<option value="2" <?php if($contract->status==2){ echo 'selected'; } ?> >Inactive</option>
								<option value="3" <?php if($contract->status==3){ echo 'selected'; } ?> >Closed</option>
								<option value="4" <?php if($contract->status==4){ echo 'selected'; } ?> >Terminated</option>
								<option value="5" <?php if($contract->status==5){ echo 'selected'; } ?> >Cancel</option>
								
							  </select>
								
								
								
								
								
								</div>
                            </div>
							
							
							
							<div class="col-lg-12 col-md-12 col-sm-12">
                             <button type="submit" class="btn btn-primary">Upload</button>   
                            </div>
							
				
							
					</form>	
			    </div>
			</div>
			
			<div class="col-xl-3 col-lg-3 col-md-3">
				

			</div>
			
			</div>
	 </div>
	
	
		<!-- Modal -->
		<!-- search Buyer's -->
		
    <div class="modal fade" id="custModal" role="dialog">
      <div class="modal-dialog" style="max-width: 60%;">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Customer Details</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <div class="modal-body">
 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
 
  
  
  
  
  <!-- add  Buyer's  -->
		
    <div class="modal fade" id="custModal_addbuyer" role="dialog">
      <div class="modal-dialog">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Buyer</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <div class="modal-body1">
 
		<form id="myform">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Buyer's name:</label>
            <input type="text" class="form-control" id="popup_buyer_name" name="buyer_name" required >
          </div>
          
		  
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Buyer's Email:</label>
            <input type="email" class="form-control" id="popup_buyer_email" name="buyer_email" required >
          </div>
          
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Buyer's Phone:</label>
            <input type="text" class="form-control float-number" id="popup_buyer_phone" name="buyer_phone" required >
          </div>
		
			<div class="form-group">
            <button type="submit" class="btn btn-primary">Add Buyer </button>
			</div>
		
        </form>
 
 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
 
  
  
   <script type="text/javascript">
    
	/*
	$(document).ready(function () {
 
      $('#search_contracts').click(function () {
		  
		  alert('----------');
		  
		var buyer_name = $('#buyer_name');
		var buyer_email = $('#buyer_email');
		var buyer_phone = $('#buyer_phone');
        $.ajax({
          url: 'home/buyer_search',
          type: 'POST',
          data: { buyer_name:buyer_name,buyer_email:buyer_email,buyer_phone:buyer_phone },
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
      });
 
    });
	
	*/
	
	
	 $(document).ready(function () {
 
      $('#search_contracts').click(function () {
		  
		var buyer_name = $('#primary_buyer_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		
		var sbuyer_name=$('#secondary_buyer_name').val();
		var sbuyer_email=$('#secondary_buyer_email').val();
		var sbuyer_phone=$('#secondary_buyer_phone').val();
		
		
	document.location.href = '<?php echo base_url(); ?>home/search_contracts_list?name='+buyer_name+'&email='+buyer_email+'&phone='+buyer_phone+'&search=1&secondary_name='+sbuyer_name+'&secondary_email='+sbuyer_email+'&secondary_phone='+sbuyer_phone ;
	
	
		
		
      });
 
    });
	
	
  </script>
  
 
  
  <script>
  
  $(function() {
    //hang on event of form with id=myform
   //$("#myform").submit(function(e) {
	$('#add_new_buyer').click(function () {
        //prevent Default functionality
        //e.preventDefault();

		 
		var buyer_name = $('#buyer_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		
		var user_id = $('#user_id').val();		
		 var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		  if(buyer_name=='')
		  {
			  alert('Name is required');
			  return false;
			  
		  }
		  else if(buyer_email=='')
		  {
			  alert('Email is required');
			  return false;
			  
		  }
		  else if(!testEmail.test(buyer_email))
		  {
			  alert('Valid email is required');
			return false;
		  }	
		  else if(buyer_phone=='')
		  {
			  alert('Phone is required');
			  return false;
			  
		  }	  

        $.ajax({
          url: '<?php echo base_url(); ?>user/ajax_add_buyer',
          type: 'post',
          data: { buyer_name:buyer_name,buyer_email:buyer_email,buyer_phone:buyer_phone,user_id:user_id },
          success: function (response) {
            
			
			if(response=='available')
			{	
				alert('This buyer already exists.');
			}
			
			else if(response>0)
			{
				alert('Buyer has been saved successfully.');
				
			}
			else if(!response)
			{
				alert('problems in data saving.');
				
			}		
          }
        });	
			
			

        //get the action-url of the form
       

    });

});
  
  </script>
  
	
	
	
	
	
    <script>
  $( function() {
    $( "#end_date,#start_date" ).datepicker({
                dateFormat:'mm-dd-yy'
            });
  } );
  </script>
  
 
  
  <script>
  function isVideo(film) 
  {
	const ext = ['.pdf', '.PDF'];
	return ext.some(el => film.endsWith(el));
  }

function fileValidation() {
  let files = document.getElementById('formFileDisabled');
  for (let i = 0; i < files.files.length; ++i) {
    let fname = files.files.item(i).name;
	
	if (!isVideo(fname)) {
      
	$('#formFileDisabled').val('');	
	  alert("File extension not supported!");
      return false;
    }
  }
}
  
  
  </script>
 
<script>
$(document).ready(
    function(){
        $("#secondary_buyer").click(function () {
            $("#secondary_buyer_card").show("slow");
			$("#secondary_buyer_name").val('');
			$("#secondary_buyer_email").val('');
			$("#secondary_buyer_phone").val('');
			$("#secondary_buyer").hide();
			$("#hide_secondary_buyer").show();
			
			
			
        });

    });



$(document).ready(
    function(){
        $("#hide_secondary_buyer").click(function () {
            $("#secondary_buyer_card").hide("slow");
			$("#secondary_buyer_name").val('');
			$("#secondary_buyer_email").val('');
			$("#secondary_buyer_phone").val('');
			
			$("#secondary_buyer").show();
			$("#hide_secondary_buyer").hide();
			
        });

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

<script>
function validate_date() {

		var from = $("#start_date").val();
		var to = $("#end_date").val();

		if(Date.parse(from) >= Date.parse(to))
		{
		alert("Invalid Date Range");
		return false
		}
		else{

		}


}
</script>



