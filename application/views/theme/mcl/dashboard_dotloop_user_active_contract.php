	
	 <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Dashboard</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
        <div class="container">
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		
		       <h1 class="title"> Active Contracts </h1>
		</div>	   
        </div>	
	    </div>	
		
	<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12">
	<div>&nbsp;</div>
			<?php
		if(!empty($loop_details))
		{
			
		?>
			
							
			<div class="container">
			<table class="table table-striped">
			
			<thead>
			<tr>
			  <th scope="col">Buyer Name</th>
			  <th scope="col">Buyer email</th>
			  <th scope="col">Buyer phone</th>
			  <th scope="col">Realtor Name</th>
			  <th scope="col">Email</th>
			  <th scope="col">Contract Type</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  
		  <tbody>
		<?php
				
			
			foreach($loop_details  as $row)
			{
			
			$dotloop_profile_id=$this->session->userdata('dotloop_profile_id');	
		$dotloop_token=$this->session->userdata('dotloop_token');	
			
			
		$curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop/'.$row->id.'/participant',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$dotloop_token
		  ),
		));

		$response_loop = curl_exec($curl);
		curl_close($curl);
		$dotloop_loop=json_decode($response_loop);
		$data['participant']=$dotloop_loop->data;
		
		$buyer_full_name="";
		$buyer_email="";
		$buyer_phone="";
		
		if(!empty($data['participant'][0]->fullName))
		{
			$buyer_full_name=$data['participant'][0]->fullName;
		}	
		if(!empty($data['participant'][0]->email))
		{
			$buyer_email=$data['participant'][0]->email;
		}	
		
		if(!empty($data['participant'][0]->Phone))
		{
			$buyer_phone=$data['participant'][0]->Phone;
		}	
		
		
		
		
		//print_r($data['participant'][0]->fullName);	
			
		///exit;		
				
			
			?>	
		<tr>
		  
		  <td><?php echo $buyer_full_name ?></td>
		  <td><?php echo $buyer_email ?></td>
		  <td><?php echo $buyer_phone ?></td>
		  <td><?php echo $this->session->userdata('name') ?></td>
		
		 <td><?php echo $this->session->userdata('email');?></td>
		
		
		  <td><?php echo  'Buyer Agreement'; ?></td>
		  <?php
			if($this->session->userdata('show_cancel_button')==1)
			{	
			?>
		  
		  <td>
		  <button type="button" class="btn">Cancel</button>&nbsp;
				<a href="<?php echo base_url()?>dotloop/view_buyercontract/<?php echo $row->id ?>/<?php echo $trans_status ?>">View Contract</a>
		  </td>
		  <?php
			}
		 	
		else
		{
		?>	
		 <td>
		 <a href="<?php echo base_url()?>dotloop/view_buyercontract/<?php echo $row->id ?>/<?php echo $trans_status ?>">View Contract</a>
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
						
						
	


	
						
	
		<?php
		
		if(empty($loop_details))
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