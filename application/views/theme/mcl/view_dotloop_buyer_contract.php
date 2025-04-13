     
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
						<?php
						
						
						
						
						
						
						
						
						?>		
							

							
						
						
						
						<input type="hidden" id="user_id" name="user_id" value="">
							
							
							
							<ul class="list-group list-group-flush">
							  <li class="list-group-item"><strong>Realtor Name: </strong><?php echo $user_details[0]['first_name']." ". $user_details[0]['last_name'] ?></li>
							  <li class="list-group-item"><strong>Contact Number: </strong><?php echo $user_details[0]['phone'] ?></li>
							  <li class="list-group-item"><strong>E-mail: </strong><?php echo $user_details[0]['email'] ?></li>
							  <li class="list-group-item"><strong>Contract Type: </strong> <?php echo $loop_details->{'Contract Info'}->Type ?></li>
							  <?php /*?>
							  $phpdate = strtotime( $contract[0]['contract_start_date'] );
							  $from_date = date( 'm-d-Y', $phpdate );
					 
							  <?php */ ?>
							  <li class="list-group-item"><strong>Contract Start Date: </strong> <?php echo $loop_details->{'Contract Dates'}->{'Contract Agreement Date'} ?></li>
							  
							  
							  <?php /*?>
							  $phpdate = strtotime( $contract[0]['contract_end_date'] );
							  $to_date = date( 'm-d-Y', $phpdate );
							  <?php */ ?>
							  
							  <li class="list-group-item"><strong>Contract End Date: </strong><?php echo $loop_details->{'Contract Dates'}->{'Closing Date'} ?></li>
							  <li class="list-group-item"><strong>Document</strong></li>
							  
							  <?php 
							  
							  $cintract_type="";
								if($trans_status=='UNDER_CONTRACT')
								{
									$cintract_type='Active';
								}	
								elseif($trans_status=='SOLD')
								{
									$cintract_type='Closed';
								}
								elseif($trans_status=='TERMINATED')
								{
									$cintract_type='Terminated';
								}
								elseif($trans_status=='PRE_LISTING')
								{
									$cintract_type='Pending';;
									
								}
							  
							  ?>
							  
							  <li class="list-group-item"><strong>Status: </strong><?php echo $cintract_type; ?></li>
							
							<?php 
							if($this->session->userdata('show_approved_button')==1)
							{	
							?>
							<li class="list-group-item" style="text-align:center;">
							<?php
								if($trans_status=='PRE_LISTING')
								{
								?>
								<a href="" 
								 type="button" class="btn btn-danger" onclick="return confirm('Approve');"> Approve</a>
								<?php
								}
										
								?>		
							
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
	
	
	