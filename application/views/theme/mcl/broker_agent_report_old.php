

 

 
 
 <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/bootstrap5.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
 
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Broker List </h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
    <div class="container">
	
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		
		       <h1 class="title"> Broker List </h1>
		</div>	   
        </div>	
	    </div>	
	
	<div class="row">
			<!--<div class="col-xl-2 col-lg-2 col-md-2"></div> -->
			<div class="col-xl-12 col-lg-12 col-md-12">
			<div class="row">
			<?php /* ?>
			<div><strong>Total Contracts: <?php  echo $tot_contract[0]['tot'] ?></strong></div>
			<?php */ ?>
			<table class="table table-striped" id="example"  >
			<thead>
			<tr>
			   <th scope="col">First Name </th>
			   <th scope="col">Last Name </th>
			   <th scope="col">Email </th>
				<th scope="col">Phone</th>
				  <th scope="col">State</th>
				  <th scope="col">MLS Name</th>
				  
				  <th scope="col">Status</th>
				  <th scope="col">Action</th>
			</tr>
		   </thead>
			<tbody>
			
			<?php
			
		   
			foreach($brokers as $broker)
			{
			    
			   
			    
			    $mls_name='';
			    if(is_null($broker['mls_name']))
			    {
			        $mls_name='Other';
			    }
			    else
			    {
			        
			        $mls_name=    $broker['mls_name'];
			    }
			    
			     
			
			?>	
			<tr>
			    <td><?php echo $broker['first_name'] ?></td>
				<td><?php echo $broker['last_name'] ?></td>  
				  
				  <td><?php echo $broker['email'] ?></td>
				  <td><?php echo $broker['phone'] ?></td>
				  <td><?php echo $broker['state_name'] ?></td>
				  <td><?php echo $mls_name; ?></td>
				  
				   <td>
				   <?php
					if($broker['status']=='0')
					{
					?>
					Pending
					<?php
					}
					if($broker['status']=='1')
					{
					?>
					 Active
					<?php
					}
					?>
				</td>
			
					 
				      
				<td>
					 <a href="<?php echo base_url() ?>home/agent_list/<?php echo $broker['user_id']  ?>"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-list-view-50.png"  width="30" height="20"> </a> 
					  <a href="<?php echo base_url() ?>admin/delete_broker/<?php echo $broker['user_id']  ?>" onclick="return confirm('Are you sure you want to delete this item?');"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-delete-30.png"  width="30" height="20"> </a>
				</td>
			 
			</tr>	

		
			<?php
			
				}
		
			?>
			</tbody>		
			
			
			 <tfoot>
            <tr>
			   <th scope="col">First Name </th>
			   <th scope="col">Last Name </th>
			   <th scope="col">Email </th>
				<th scope="col">Phone</th>
				  <th scope="col">State</th>
				  <th scope="col">MLS Name</th>
				  
				  <th scope="col">Status</th>
				  <th scope="col">Action</th>
			</tr>
        </tfoot>
			
			
			
			</table>
			
			</div>
			</div>
		
			
		<!--	<div class="col-xl-2 col-lg-2 col-md-2"></div> -->
	</div>
	 </div>

	<div style="height: 200px;">&nbsp;</div>
	
	
	<script>
	 
	 $(document).ready(function () {
    $('#example').DataTable();
});   
	    
	    
	</script>