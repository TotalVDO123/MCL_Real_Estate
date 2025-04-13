
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
		
		       <h1 class="title"> Total number of users split by state: </h1>
		</div>	   
        </div>	
	    </div>	
	
	<div class="row">
			<div class="col-xl-2 col-lg-2 col-md-2"></div>
			<div class="col-xl-8 col-lg-8 col-md-8">
			<div class="row">
			<?php /* ?>
			<div><strong>Total Contracts: <?php  echo $tot_contract[0]['tot'] ?></strong></div>
			<?php */ ?>
			<table class="table table-striped">
			<thead>
			<tr>
			  <th scope="col">Name</th>
			  <th scope="col">Email</th>
			  <th scope="col">Phone</th>
			  <th scope="col">User Type</th>
			  <th scope="col">MLS Name</th>
			  <th scope="col">Companye</th>
			  <th scope="col">License Key</th>
			</tr>
		   </thead>
			<tbody>
			
			<?php
			
			$sql = "SELECT U.state_id,S.state_name FROM user U left join states S on U.state_id=S.id  group by state_id  order by state_id";
			$res = $this->db->query($sql);
			if ($res->num_rows() > 0) 
			{
				$user_states= $res->result_array(); //contracts found with all buyer details
			
			foreach($user_states as $user_state)
			{
			?>	
			<tr>
			  <td colspan="7" ><strong><?php echo $user_state['state_name']; ?></strong></td>
			 
			</tr>	

			
			<?php	
				$sql = "SELECT state_mls.mls_name, user.* FROM user left join state_mls on user.affiliated_mls_name=state_mls.id
				
				where   user.state_id='".$user_state['state_id']."' order by user.user_id ";
				$coll = $this->db->query($sql);
				$users= $coll->result_array();
				
				foreach($users as $user)
				{
			
			$company_name="";
			$sql_comp = "SELECT broker_company FROM user where user_id='".$user['user_broker_id']."'";
			$res_comp = $this->db->query($sql_comp);
			if ($res_comp->num_rows() > 0) 
			{
				$user_states= $res_comp->result_array(); //contracts found with all buyer details
			$company_name=$user_states[0]['broker_company'];
			   
			    
			}
		
			
			
			?>
			<tr>
			  <td ><?php echo $user['first_name']." ".$user['last_name'] ?></td>
			  <td><?php echo $user['email'] ?></td>
			  <td><?php echo $user['phone'] ?></td>
			  <td><?php echo $user['role'] ?></td>
			  <td><?php echo $user['mls_name'] ?></td>
			  <td><?php echo $company_name  ?></td>
			  <td><?php echo $user['verify_otp'] ?></td>
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
		
			
			<div class="col-xl-2 col-lg-2 col-md-2"></div>
	</div>
	 </div>

	<div style="height: 200px;">&nbsp;</div>