	 <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Cancellation Request</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
        <div class="container">
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		
		       <h1 class="title">Cancellation Requests List </h1>
		</div>	   
        </div>	
	    </div>	
		
	<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12">
	<div>&nbsp;</div>
			<?php
			if(!empty($buyer_cancellation))
			{
			
			?>
			
							
			<div class="container">
			<table class="table table-striped">
			
			<thead>
			<tr>
			  <th scope="col">Buyer Name</th>
			  <th scope="col">Buyer Email</th>
			  <th scope="col">Buyer Phone</th>
			  <th scope="col">Realtor Name</th>
			  <th scope="col"></th>
			  <th scope="col"></th>
			  <th scope="col"></th>
			</tr>
		  </thead>
		  
		  <tbody>
		<?php
				
			foreach($buyer_cancellation  as $row)
			{
			?>	
		<tr>
		  
		  <td><?php echo $row['full_name']?></td>
		  <td><?php echo $row['email']?></td>
		  <td><?php echo $row['phone']?></td>
		  <td><?php echo $row['first_name']." ".$row['last_name']?></td>
		  <td><a href="<?php echo base_url() ?>user/approved_cancellation?id=<?php echo $row['id'] ?>&cancel_request_user_id=<?php echo $row['cancel_request_user_id'] ?>" onclick="return confirm('Are you sure you want to approve this cancellation request?');" type="button" class="btn btn-danger" data-dismiss="modal">Approve </a></td>
		  <td><a href="<?php echo base_url() ?>user/deny_cancellation?id=<?php echo $row['id'] ?>&cancel_request_user_id=<?php echo $row['cancel_request_user_id'] ?>" onclick="return confirm('Are you sure you want to deny this cancellation request?');" type="button" class="btn btn-danger" data-dismiss="modal">Deny </a></td>
		  <td><a href="mailto:<?php echo $row['email']; ?>" type="button" class="btn btn-danger" data-dismiss="modal">Contact Buyer </a></td>
		 </tr>
	
		</tbody>	
		<?php
			}
		?>	
		</table>
		</div>
			<?php
			}
			?>					
						
						
	


	
						
	
		<?php
		
		if(empty($buyer_cancellation))
		{
		?>	
			
		<div><strong>Record Not Found</strong></div>	
			
		<?php
		}
		?>	
			
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
 
      $('#search_contracts').click(function () {
		  
		  var buyer_name = $('#buyer_name').val();
		var buyer_email = $('#buyer_email').val();
		var buyer_phone = $('#buyer_phone').val();
		
        
        $.ajax({
          url: '<?php echo base_url() ?>home/buyer_search',
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