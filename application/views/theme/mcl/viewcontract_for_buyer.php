     
	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">View Contract</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
        <div class="container">
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		
		       <h1 class="title"> View Contract </h1>
		</div>	   
        </div>	
	    </div>	
		
	<div class="row">
	<div class="col-xl-2 col-lg-2 col-md-2">
	
	</div>
			
								
						<div class="col-xl-8 col-lg-8 col-md-8">
						
												
						
						
						
						<input type="hidden" id="user_id" name="user_id" value="">
							
							<?php /* ?>
							<div class="card">
							
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's name">Buyer's name</label>
                                    <input type="text" id="buyer_name" name="buyer_name" class="form-control" required />
                                </div>
                            </div>
                            
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Email">Buyer's Email</label>
                                 <input type="email" id="buyer_email" name="buyer_email"  class="form-control" required />   
                                </div>
                            </div>
                            
							<div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
								<label for="Buye's Phone">Buyer's Phone</label>
                                    <input type="text" id="buyer_phone" name="buyer_phone"  class="form-control" required />
                                </div>
                            </div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                <button type="button" id="add_new_buyer"  class="btn btn-primary">Add Buyer</button>
								<!--<a id="add_new_buyer" class="btn btn-primary" href="javascript:void(0);" role="button">Add Buyer</a>-->								
								<a id="search_contracts" class="btn btn-primary" href="javascript:void(0);" role="button">Search Contracts</a>
								
								
                            </div>
							
							
							</div>
							<?php */ ?>
							
							<ul class="list-group list-group-flush">
							  <li class="list-group-item"><strong>Realtor Name: </strong><?php echo $contract[0]['first_name']." ". $contract[0]['last_name'] ?></li>
							  <li class="list-group-item"><strong>Contact Number: </strong><?php echo $contract[0]['phone'] ?></li>
							  <li class="list-group-item"><strong>E-mail: </strong><?php echo $contract[0]['user_email'] ?></li>
							  <li class="list-group-item"><strong>Contract Type: </strong> <?php echo $contract[0]['contract_type'] ?></li>
							  <?php
							  $phpdate = strtotime( $contract[0]['contract_start_date'] );
							  $from_date = date( 'm-d-Y', $phpdate );
					 
							  ?>
							  <li class="list-group-item"><strong>Contract Start Date: </strong> <?php echo $from_date ?></li>
							  
							  
							  <?php
							  $phpdate = strtotime( $contract[0]['contract_end_date'] );
							  $to_date = date( 'm-d-Y', $phpdate );
							  ?>
							  
							  <li class="list-group-item"><strong>Contract End Date: </strong><?php echo $to_date ?></li>
							 <!-- <li class="list-group-item"><strong>Document</strong></li>-->
							  
							  <?php 
							  
							  
							  							  
							   $tmp_status="";
							  if($contract[0]['status']==0 )
							  {
								  
								  $tmp_status="Pending";
							  }	  
							  elseif($contract[0]['status']==1)
							  {
								 
								$tmp_status="Active";
								 
								  
							  }
							  elseif($contract[0]['status']==2)
							  {
								  $tmp_status="Inactive";
							  }
							   elseif($contract[0]['status']==3)
							  {
								  $tmp_status="Closed";
							  }
							   elseif($contract[0]['status']==4)
							  {
								  $tmp_status="TERMINATED";
							  }
							  elseif($contract[0]['status']==5)
							  {
								  $tmp_status="Cancel";
							  }
							  
							  
							  $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where DATE(contract_end_date)< DATE(NOW()) and  id='".$contract[0]['id']."'";
				
                			  $record_expired = $this->db->query($sql_expired);
                			  if($record_expired->num_rows() > 0) 
                				{
                					$record_expired_contract = $record_expired->result_array();
                				
                				    if($record_expired_contract[0]['tot']>0)
                				    {
                				        $tmp_status="Expired";
                				    }
                				            
                				}	

							  

							  
							  
							  
							  
							  
							  
							  ?>
							  
							  <li class="list-group-item"><strong>Status: </strong><?php echo $tmp_status; ?></li>
							
						    <?php
						    if($show_button==1 and $contract[0]['contract_process_initiation']==1)
						    {
						    ?>
							<li class="list-group-item" style="text-align:center;">
							
							
							<a href="<?php echo base_url() ?>home/cancel_contract_approved_by_buyer/<?php echo $buyer_realtor_contract_id ?>" 
								 type="button" class="btn btn-danger" > Cancel Approved</a>
							
							</li>
							<?php
						    }
							?>
						
							
							</ul>
							
							
							
							
										
			</div>
			
			<div class="col-xl-3 col-lg-3 col-md-3">
				

			</div>
			
			</div>
	 </div>
	
	
		<!-- Modal -->
		<!-- search Buyer's -->
		
   
  
  
  
  
  
  
  <script>
    function cancel_contract(id)
    {
        var result = confirm("Are you sure you want to cancel the contract?");
        if (result) 
        {
            
           
             $.ajax({
                  url: '<?php echo base_url(); ?>home/cancel_buyer_contract',
                  type: 'POST',
                  data: { id:id },
                  success: function (response) {
                    
                    if(response>0)
                    {
                     alert("Cancel contract process has been initiated");    
                        
                    }
                    
                    
                    //$('.modal-body').html(response);
                    ///$('#custModal').modal('show');
                  }
            });


        }
        
    }
      
      
  </script>
  
  
   <script type="text/javascript">
    
	 $(document).ready(function () {
 
      $('#search_contracts').click(function () {
		  
		  var buyer_name = $('#buyer_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		
        
        $.ajax({
          url: 'buyer_search',
          type: 'post',
          data: { buyer_name:buyer_name,buyer_email:buyer_email,buyer_phone:buyer_phone },
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
      });
 
    });
	
	
  </script>
  
  <script>
  /*
   $(document).ready(function () {
 
      $('#add_new_buyer').click(function () {
		  //$('.modal-body').html("");
		$('#custModal_addbuyer').modal('show');
        
       
      });
 
    });
	*/
  
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
    $( "#end_date,#start_date" ).datepicker();
  } );
  </script>
  
  
  
  