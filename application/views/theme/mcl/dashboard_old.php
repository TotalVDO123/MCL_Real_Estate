	  
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
		
		       <h1 class="title"> <?php echo $full_name ?> Dashboard</h1>
		</div>	   
        </div>	
	    </div>	
	
	<div class="row">
			
			<?php
			if($duplicate_contract_exist==0)
			{
			?>
			<div class="col-xl-3 col-lg-3 col-md-3">
			    <ul class="list-group">
  

 <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/dashboard/<?php echo $this->session->userdata('user_id') ?>"><strong>My Dashboard</strong></a></li>
 <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/add_buyer"><strong>Add Buyer</strong></a></li>
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/search_contracts"><strong>Buyer Search</strong></a></li>
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/cancel_contract"><strong>Termination Request</strong></a></li>
  <?php
  if($this->session->userdata('login_type')=='broker_record')
  {
  ?>
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/agent_list"><strong>Agent List </strong></a></li>  
  <?php
  }
  ?>
  
  
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>user/manage_profile"><strong>Edit Profile</strong></a></li>
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>user/reset_password"><strong>Reset Password</strong></a></li> 
  
  <?php
  
  if($this->session->userdata('admin_is_login')==1)
  {
  ?>
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>user/contract_revision"><strong>Contract Revision</strong></a></li>  
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>admin/user_list"><strong>Edit User</strong></a></li>  
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>admin/broker_agent_split"><strong>Edit Broker-Agent </strong></a></li>  
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>admin/mls_list"><strong>MLS List </strong></a></li>  
 <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>admin/newuser_list"><strong>New User </strong></a></li> 

  <?php
  }
  ?>
  
</ul>
	
			    
			</div>
			<?php
			}
			?>
			<div class="col-xl-4 col-lg-4 col-md-4">
			<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<div><strong>Total Contracts: <?php  echo $tot_contract[0]['tot'] ?></strong></div>
			<div>&nbsp;</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_active_contracts/0">Active: <?php echo $active_contract[0]['tot'] ?></a></strong>
			</div>
			
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_pending_contracts">Pending: <?php echo $pending_contract[0]['tot'] ?></a></strong>
			</div>
			
		
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_contracts/2">Inactive: <?php echo $inactive_contract[0]['tot'] ?></a></strong>
			</div>
			
						
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_contracts/4">Terminated : <?php echo $terminated_contract[0]['tot'] ?></a></strong>
			</div>
			
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_active_contracts/1">Expired : <?php echo $record_expired_contract[0]['tot'] ?></a></strong>
			</div>
			
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_contracts/3">Closed: <?php echo $closed_contract[0]['tot'] ?></a></strong>
			</div>
			
			
			</div>
			</div>
		
			
			  
			 <?php
			 if($login_type=='broker_record')
		     {
			 ?> 
    			<div class="col-xl-4 col-lg-4 col-md-4">
    			<div class="row">
    			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
    			<div class="row">
    			<strong><a href="<?php echo base_url() ?>home/agent_list">No of agents : <?php echo $tot_agent[0]['tot'] ?></a></strong>
    			</div>
    			
    			
    			<div class="row">
    			<a href="<?php echo base_url() ?>user/buyer_cancellation_requests"><strong>Termination Requests: <?php echo $tot_contract_process[0]['tot'] ?> </strong></a>
    			</div>
    			</div>  
    			</div>
    			</div>
    		<?php
		     }
    		
    		?>	    
			
			
			    
			<?php
			if($duplicate_contract_exist==1)
			{
			?>
			<div class="col-xl-8 col-lg-8 col-md-8">
			<strong>Duplicate Contract Found is already there in system</strong>
			
			 
			
			<div>&nbsp;</div>
			<table class="table table-striped">
			
			<thead>
			<tr>
			  <th scope="col">Buyer Name</th>
			  <th scope="col">Buyer Email</th>
			  <th scope="col">Buyer Phone</th>
			  
			
			  
			  
			  <th scope="col">Realtor Name</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  
		  <tbody>
		  
		  <?php
		  foreach($duplicate_contract as $row_con)
		  {
		  
		  //print_r($row_con);
		  ?>
		  <tr>
		  <td><?php echo $row_con['name'] ?></td>
		  <td><?php echo $row_con['email'] ?></td>
		  <td><?php echo $row_con['phone'] ?></td>
		  
		 
		  
		  <td><?php echo $row_con['first_name']." ".$row_con['last_name'] ?></td>
		  <td>
		  
		<a class="btn btn-primary" onclick="return confirm('Are you sure you want to keep both?')" href="<?php echo base_url()?>home/keep_both_contract/<?php echo $row_con['contract_id'] ?>" role="button">Keep both</a>
		<a class="btn btn-primary" onclick="return confirm('Are you sure you want to replace?')" href="<?php echo base_url()?>home/replace_contract/<?php echo $row_con['contract_id'] ?>" role="button">Replace</a>		
		  
		  </tr>
		  <?php
		  }
		  ?>
		  </tbody>
		  </table>
			
			
			</div>
			
		<?php	
		}	
		?>	
			
			
	</div>
	 </div>

	<div style="height: 200px;">&nbsp;</div>