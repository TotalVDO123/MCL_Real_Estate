      <style>
  .center {
 text-align: center;
 
}


      </style>
	  
	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/shutterstock_283593971.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Search Contracts</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
        <div class="container">
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		
		       <h1 class="title"> MCL Search Contracts </h1>
		</div>	   
        </div>	
	    </div>	
		
	<div class="row">
	<div class="col-xl-2 col-lg-2 col-md-2">
	
	</div>

						<div class="col-xl-8 col-lg-8 col-md-8 box-shadow">
						
					     <div class="row card-body">	
						
						
						
						<div class="col-lg-12 col-md-12 col-sm-12">
                               
                        
                             
                        <div class="form-group center">
                          <input class="form-check-input" type="radio" name="buyersearch" id="primary_buyer" checked />
                          <label class="form-check-label" for="Primary Buyer"> Primary Buyer </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                          <input class="form-check-input" type="radio" name="buyersearch" id="secondary_buyer" />
                          <label class="form-check-label" for="Secondary Buyer">Secondary Buyer</label>
                        </div>
                       
                        </div>                                
                        </div>
                            
						
						
						<!--	<div class="card" >-->
						    <div class="col-xl-12 col-lg-12 col-md-12">
						  <div class="row">      
						        	
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">First Name</label>
                                    <input type="text" id="buyer_name" name="buyer_name" class="form-control" />
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
								<label for="Buye's name">Last Name</label>
                                    <input type="text" id="buyer_last_name" name="buyer_last_name" class="form-control" required />
                                </div>
                            </div>
                            </div>
                            </div>
                            
                            
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Email">Email</label>
                                 <input type="email" id="buyer_email" name="buyer_email"  class="form-control" required />   
                                </div>
                            </div>
                            
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Phone</label>
                                   <input type="text" id="buyer_phone" name="buyer_phone" maxlength="10"  class="form-control float-number" required />
                                </div>
                            </div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12 text-right">
                               <!-- <button type="submit"  class="btn btn-primary">Search Contracts for the buyer</button>-->
								
								<a id="search_contracts" class="btn btn-primary" href="javascript:void(0);" role="button">Search Contracts for the Buyer</a>
								
                            </div>
							
							
						
							<!--</div>-->
							
						
			
			</div>
			
			<div class="col-xl-3 col-lg-3 col-md-3">
				

			</div>
			
			
			
			
			
			</div>
	 </div>
	
    <div style="height: 200px;">&nbsp;</div>
	
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
 
      $('#search_contracts111').click(function () {
		  
		  var buyer_name = $('#buyer_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		
        
        $.ajax({
          url: '<?php echo base_url() ?>home/buyer_search',
          type: 'post',
          data: { buyer_name:buyer_name,buyer_email:buyer_email,buyer_phone:buyer_phone},
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
      });
 
    });
	
	
  </script>
  
  <script>
   $(document).ready(function () {
 
      $('#search_contracts').click(function () {
		  
		var buyer_name = $('#buyer_name').val();
		var buyer_last_name = $('#buyer_last_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		

		    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(buyer_email))
            {
               
            }
            else
            {
                alert("You have entered an invalid email address!")
                return false;
            }

		
		
		
		
	//document.location.href = '<?php echo base_url(); ?>home/search_contracts_list?s=1&name='+buyer_name+'&email='+buyer_email+'&phone='+buyer_phone;
	
	if ($("#primary_buyer").prop("checked")) {
        document.location.href = '<?php echo base_url(); ?>home/search_contracts_list?s=1&name='+buyer_name+'&last_name='+buyer_last_name+'&email='+buyer_email+'&phone='+buyer_phone+'&search_type=primary';
    
	    //alert('primary');
	    
	}
	
	if ($("#secondary_buyer").prop("checked")) {
       document.location.href = '<?php echo base_url(); ?>home/search_contracts_list?s=1&secondary_name='+buyer_name+'&secondary_last_name='+buyer_last_name+'&secondary_email='+buyer_email+'&secondary_phone='+buyer_phone+'&search_type=secondary';
       // alert('secondary');
       
    }
	
	
	
	
	/*
        $.ajax({
          url: 'home/search_contracts_list?name='+buyer_name+'&email='+buyer_email+'&phone='+buyer_phone,
          type: 'get',
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
	*/	
		
		
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
