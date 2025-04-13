
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
			<table class="table table-striped">
			<thead>
			<tr>
			   <th scope="col">Name </th>
				  <th scope="col">Email </th>
				  
				  <th scope="col">Phone</th>
				  <th scope="col">State</th>
				  <th scope="col">Role</th>
				  
				  <th scope="col">Status</th>
				  <th scope="col">Action</th>
			</tr>
		   </thead>
			<tbody>
			
			<?php
			
		    $sql_broker = "SELECT S.state_name,U.* FROM  user U left join  states S on U.state_id=S.id  where U.role='broker_record' order by U.user_id ";
			$broker_record = $this->db->query($sql_broker);
			if($broker_record->num_rows() > 0) 
			{
				$brokers = $broker_record->result_array();
			
			foreach($brokers as $broker)
			{
			
    			$role_type="";
    			if($broker['role']=='broker_record')
    			{
    			    $role_type="Broker";
    			    
    			}
			
			?>	
			<tr>
			    <td><b><?php echo $broker['first_name']." ".$broker['last_name'] ?></b></td>
				  <td><b><?php echo $broker['email'] ?></b></td>
				  <td><b><?php echo $broker['phone'] ?></b></td>
				  <td><b><?php echo $broker['state_name'] ?></b></td>
				  <td><b><?php echo $role_type ?></b></td>
				  
				   <td>
				   <?php
					if($broker['status']=='0')
					{
					?>
					<strong> Pending </strong>
					<?php
					}
					if($broker['status']=='1')
					{
					?>
					<strong> Active </strong>
					<?php
					}
					?>
				</td>
			
					 
				      
				<td>
					 <?php /* ?> <a href="<?php echo base_url() ?>admin/edit_user/<?php echo $broker['user_id']  ?>"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-edit.gif"  width="30" height="20"> </a> <?php */ ?>
					  <a href="<?php echo base_url() ?>admin/delete_user/<?php echo $broker['user_id']  ?>" onclick="return confirm('Are you sure you want to delete this item?');"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-delete-30.png"  width="30" height="20"> </a>
				</td>
			 
			</tr>	

			
			<?php
			
			    $user_broker_id=$broker['user_id'];
				$sql_agent = "SELECT S.state_name,U.* FROM  user U left join  states S on U.state_id=S.id  where U.user_broker_id='".$user_broker_id."' order by U.user_id ";
				$coll = $this->db->query($sql_agent);
				$users= $coll->result_array();
				
				foreach($users as $user)
				{
			
			?>
			
			
			<tr>
			  <td><?php echo $user['first_name']." ".$user['last_name'] ?></td>
				  <td><?php echo $user['email'] ?></td>
				  <td><?php echo $user['phone'] ?></td>
				  <td><?php echo $user['state_name'] ?></td>
				  <td><?php echo ucfirst( $user['role'] )?></td>

				   <td><?php
					if($user['status']=='0')
					{
					?>
					<strong> Pending </strong>
					<?php
					}
					if($user['status']=='1')
					{
					?>
					<strong> Active </strong>
					<?php
					}
					?>
					</td>
					
				<td>
					 <?php /* ?> <a href="<?php echo base_url() ?>admin/edit_user/<?php echo $user['user_id']  ?>"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-edit.gif"  width="30" height="20"> </a> <?php */ ?>
					  <a href="<?php echo base_url() ?>admin/delete_user/<?php echo $user['user_id']  ?>" onclick="return confirm('Are you sure you want to delete this item?');"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-delete-30.png"  width="30" height="20"> </a>
					    
				</td>	
				  
				  
			</tr>
			<?php
				}
			}
			}
			?>
			</tbody>		
			
			</table>
			
			</div>
			</div>
		
			
		<!--	<div class="col-xl-2 col-lg-2 col-md-2"></div> -->
	</div>
	 </div>

	<div style="height: 200px;">&nbsp;</div>