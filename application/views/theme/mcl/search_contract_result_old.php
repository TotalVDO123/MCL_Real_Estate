	 <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
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
	<div class="col-xl-12 col-lg-12 col-md-12">
	<div>&nbsp;</div>
			<?php
			if(!empty($contracts1))
			{
			
			?>
			<div><strong>Contracts found with all buyer details</strong></div>
							
			<div class="container">
			<table class="table">
			
			<thead>
			<tr>
			  <th scope="col">First Name</th>
			  <th scope="col">Last Name</th>
			  <th scope="col">Email</th>
			  <th scope="col">Phone</th>
			  
		
			  
			  <th scope="col">Company Name</th>
			  <th scope="col">Agent Name</th>
			  
			  <th scope="col">Contract Type</th>
			  <th scope="col">Status</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  
		  <tbody>
		<?php
				
			foreach($contracts1  as $row)
			{
			///////////////status///////////////////////
			
			  
							  $tmp_status="";

							  if($row['status']==1)
							  {
								$tmp_status="Active";
							  }
							  elseif($row['status']==0 )
							  {
								  
								  $tmp_status="Pending";
							  }	  
							  elseif($row['status']==2)
							  {
								  $tmp_status="Inactive";
							  }
							   elseif($row['status']==3)
							  {
								  $tmp_status="Closed";
							  }
							   elseif($row['status']==4)
							  {
								  $tmp_status="TERMINATED";
							  }
							  elseif($row['status']==5)
							  {
								  $tmp_status="Cancel";
							  }
							  
							  $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where  DATE(contract_end_date)< DATE(NOW()) and  id='".$row['id']."'";
                			  $record_expired = $this->db->query($sql_expired);
                				if($record_expired->num_rows() > 0) 
                				{
                					$record_expired_contract = $record_expired->result_array();
                				    if($record_expired_contract[0]['tot']>0)
                				    {
                				        $tmp_status="Expired";
                				    }
                				}	

							
							  
							  
			///////////////////////////////////////////
			 $company = $this->db->get_where('user', array('user_id' => $row['user_broker_id']))->result_array();
			
			 
			
			?>	
		<tr>
		  
		  <?php
		  if($search_type=='primary')
		  {
		  ?>
		  <td><?php echo $row['name']?></td>
		  <td><?php echo $row['last_name']?></td>
		  <td><?php echo $row['email']?></td>
		  <td><?php echo '('.substr($row['phone'], 0, 3).') '.substr($row['phone'], 3, 3).'-'.substr($row['phone'],6);  ?></td>
		  <?php
		  }
		  elseif($search_type=='secondary')
		  {
		  
		  ?>
		  <td><?php echo $row['secondary_buyer_name'] ?></td>
		  
		  <td><?php echo $row['secondary_buyer_last_name'] ?></td>
		  
		  <td><?php echo $row['secondary_buyer_email'] ?></td>
		  
		  <td> <?php echo '('.substr($row['secondary_buyer_phone'], 0, 3).') '.substr($row['secondary_buyer_phone'], 3, 3).'-'.substr($row['secondary_buyer_phone'],6);  ?>  </td>
		  
		  <?php
		  }
		  ?>
		  
		  <td><?php echo $company[0]['broker_company'] ?></td>
		  <td><?php echo $row['first_name']." ".$row['last_name']?></td>
		 
		  
		  <td><?php echo $row['contract_type']?></td>
		  
		   <td> <?php echo $tmp_status;  ?>  </td>
		  <?php
			if($show_cancel_button==1)
			{	
			?>
		  
		  <td>
		  <a href="#" type="button" class="btn" onclick="cancel_contract('<?php echo $row['id'] ?>')" >Cancel</a>&nbsp;
				<a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>">View Contract</a>
		  </td>
		  <?php
			}
		 	
		else
		{
		?>	
		 <td>
		 <a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>">View Contract</a>
		 </td>
		<?php	
		}
		?>
		</td>
		</tbody>	
		<?php
			}
		?>	
			
		</table>
		
		
		</div>
							
						
						
						
								
			<?php
			}
			?>					
						
						
						<!-- second -->
						<div>&nbsp</div>
						
		<?php
		if(!empty($contracts2))
		{
		?>				
		<div><strong>Contracts found with only buyer email</strong></div>

							
		<div class="container">
		<table class="table">
			
			<thead>
			<tr>
			  <th scope="col">First Name</th>
			  <th scope="col">Last Name</th>
			  <th scope="col">Email</th>
			  <th scope="col">Phone</th>
			  
			  <th scope="col">Company Name</th>
			  <th scope="col">Agent Name</th>
			  
			  <th scope="col">Contract Type</th>
			  <th scope="col">Status</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  
		  <tbody>
		<?php
				
			foreach($contracts2  as $row)
			{
			
			               ///////////////status///////////////////////
			
			  
							  $tmp_status="";

							  if($row['status']==1)
							  {
								$tmp_status="Active";
							  }
							  elseif($row['status']==0 )
							  {
								  
								  $tmp_status="Pending";
							  }	  
							  elseif($row['status']==2)
							  {
								  $tmp_status="Inactive";
							  }
							   elseif($row['status']==3)
							  {
								  $tmp_status="Closed";
							  }
							   elseif($row['status']==4)
							  {
								  $tmp_status="TERMINATED";
							  }
							  elseif($row['status']==5)
							  {
								  $tmp_status="Cancel";
							  }
							  
							  $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where  DATE(contract_end_date)< DATE(NOW()) and  id='".$row['id']."'";
                			  $record_expired = $this->db->query($sql_expired);
                				if($record_expired->num_rows() > 0) 
                				{
                					$record_expired_contract = $record_expired->result_array();
                				    if($record_expired_contract[0]['tot']>0)
                				    {
                				        $tmp_status="Expired";
                				    }
                				}	

							
							  
							  
			///////////////////////////////////////////
			 $company = $this->db->get_where('user', array('user_id' => $row['user_broker_id']))->result_array();
			
		 //$this->db->last_query();
			
			?>	
		<tr>
		  
		  <?php
		  if($search_type=='primary')
		  {
		  ?>
		  
		  <td><?php echo $row['name']?></td>
		  <td><?php echo $row['last_name']?></td>
		  <td><?php echo $row['email']?></td>
		  <td><?php  echo '('.substr($row['phone'], 0, 3).') '.substr($row['phone'], 3, 3).'-'.substr($row['phone'],6);  ?> </td>
		  <?php
		  }
		  elseif($search_type=='secondary')
		  {
		  
		  ?>
		  <td><?php echo $row['secondary_buyer_name'] ?></td>
		  <td><?php echo $row['secondary_buyer_last_name'] ?></td>
		  <td><?php echo $row['secondary_buyer_email'] ?></td>
		  <td> <?php echo '('.substr($row['secondary_buyer_phone'], 0, 3).') '.substr($row['secondary_buyer_phone'], 3, 3).'-'.substr($row['secondary_buyer_phone'],6);  ?>  </td>
		  
		  <?php
		  }
		  ?>
		  
		  <td><?php echo $company[0]['broker_company'] ?></td>
		  <td><?php echo $row['first_name']." ".$row['last_name']?></td>
		  
		  <td><?php echo $row['contract_type']?></td>
		  
		  
		  <td><?php echo $tmp_status; ?></td>
		  
		  
		  
		  <?php
			if($show_cancel_button==1)
			{	
			?>
		  
		  <td>
		  <button type="button" class="btn" onclick="cancel_contract('<?php echo $row['id'] ?>')" >Cancel</button>&nbsp;
				<a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>">View Contract</a>
		  </td>
		  <?php
			}
		 	
		else
		{
		?>	
		 <td>
		 <a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>">View Contract</a>
		 </td>
		<?php	
		}
		?>
		</td>
		</tbody>	
		<?php
			}
		?>	
			
		</table>
	
			
		</div>
		
			<?php
			}
			?>			
						
						<!-- second -->
						
						
						
						
						<!-- third -->
						
						<div>&nbsp</div>
		<?php
		if(!empty($contracts3))
		{	
		?>
		<div><strong>Suggested buyer</strong></div>
		<div class="container">
		<table class="table">
			
			<thead>
			<tr>
			  <th scope="col">First Name</th>
			  <th scope="col">Last Name</th>
			  <th scope="col">Email</th>
			  <th scope="col">Phone</th>

			  <th scope="col">Company Name</th>
			  <th scope="col">Agent Name</th>
			  <th scope="col">Contract Type</th>
			  <th scope="col">Status</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  
		  <tbody>
		<?php
				
			foreach($contracts3  as $row)
			{
			    
			    
			      ///////////////status///////////////////////
			
			  
							  $tmp_status="";

							  if($row['status']==1)
							  {
								$tmp_status="Active";
							  }
							  elseif($row['status']==0 )
							  {
								  
								  $tmp_status="Pending";
							  }	  
							  elseif($row['status']==2)
							  {
								  $tmp_status="Inactive";
							  }
							   elseif($row['status']==3)
							  {
								  $tmp_status="Closed";
							  }
							   elseif($row['status']==4)
							  {
								  $tmp_status="TERMINATED";
							  }
							  elseif($row['status']==5)
							  {
								  $tmp_status="Cancel";
							  }
							  
							  $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where  DATE(contract_end_date)< DATE(NOW()) and  id='".$row['id']."'";
                			  $record_expired = $this->db->query($sql_expired);
                				if($record_expired->num_rows() > 0) 
                				{
                					$record_expired_contract = $record_expired->result_array();
                				    if($record_expired_contract[0]['tot']>0)
                				    {
                				        $tmp_status="Expired";
                				    }
                				}	

							
							  
							  
			///////////////////////////////////////////
			    
			    
			    
			    
			    $company = $this->db->get_where('user', array('user_id' => $row['user_broker_id']))->result_array(); 
			    
			?>	
		<tr>
		  
		 <?php
		  if($search_type=='primary')
		  {
		  ?>

		  <td><?php echo $row['name']?></td>
		  <td><?php echo $row['last_name']?></td>
		  <td><?php echo $row['email']?></td>
		  <td><?php  echo '('.substr($row['phone'], 0, 3).') '.substr($row['phone'], 3, 3).'-'.substr($row['phone'],6); ?></td>
		  <?php
		  }
		  elseif($search_type=='secondary')
		  {
		  ?>
		  <td><?php echo $row['secondary_buyer_name'] ?></td>
		  <td><?php echo $row['secondary_buyer_last_name'] ?></td>
		  <td><?php echo $row['secondary_buyer_email'] ?></td>
		  <td> <?php echo '('.substr($row['secondary_buyer_phone'], 0, 3).') '.substr($row['secondary_buyer_phone'], 3, 3).'-'.substr($row['secondary_buyer_phone'],6);  ?>  </td>
          <?php
		  }
          ?>    		  
		  	
		  <td><?php echo $company[0]['broker_company'] ?></td>
		  <td><?php echo $row['first_name']." ".$row['last_name']?></td>
		  
		  <td><?php echo $row['contract_type']?></td>
		  
		  <td><?php echo $tmp_status ?></td>
		  
		  
		  
		  <?php
			if($show_cancel_button==1)
			{	
			?>
		  
		  <td>
		  <button type="button" class="btn" onclick="cancel_contract('<?php echo $row['id'] ?>')" >Cancel</button>&nbsp;
				<a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>">View Contract</a>
		  </td>
		  <?php
			}
		 	
		else
		{
		?>	
		 <td>
		 <a href="<?php echo base_url().'user/view_buyercontract/'.$row['id']?>">View Contract</a>
		 </td>
		<?php	
		}
		?>
		</td>
		</tbody>	
		<?php
			}
		?>	
			
		</table>	
			
	
		</div>

							
						
						
						
						
					
						
	<?php
		}
	?>					
						
						
	<div style="height: 130px;">
		<?php
		
		if(empty($contracts1) and empty($contracts2) and empty($contracts3))
		{
		?>	
			
		<div><strong>Record Not Found</strong></div>	
			
		<?php
		}
		?>	
	</div>		
			</div>
			
		<?php
		
		if(empty($is_search))
		{	
		?>
		<div>	
		<a class="btn btn-primary"  href="<?php echo base_url()?>/home/add_buyer?add=1&name=<?php echo $name ?>&last_name=<?php echo $last_name ?>&email=<?php echo $email ?>&phone=<?php echo $phone ?>&sbuyer_name=<?php echo $secondary_name ?>&secondary_last_name=<?php echo $secondary_last_name ?>&sbuyer_email=<?php echo $secondary_email ?>&sbuyer_phone=<?php echo $secondary_phone ?>" role="button">ADD BUYER</a>	
		</div>	
		<?php
		}
		?>	
			
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
  
  
   <script>
    function cancel_contract(id)
    {
        var result = confirm("Are you sure you want to submit a request for cancellation of this contract?");
        if (result) 
        {
            
           
             $.ajax({
                  url: '<?php echo base_url(); ?>home/cancel_contract_by_realtor',
                  type: 'POST',
                  data: { id:id },
                  success: function (response) {
                    
                    if(response>0)
                    {
                     alert("Cancel contract process has been initiated");    
                        
                    }
                    
                    
                  }
            });


        }
        
    }
      
      
  </script>

  