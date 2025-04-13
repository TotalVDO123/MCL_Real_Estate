	  
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
		
		       <h1 class="title"> User Dashboard</h1>
		</div>	   
        </div>	
	    </div>	
	
	<div class="row">
			
			<?php
			if($duplicate_contract_exist==0)
			{
			?>
			<div class="col-xl-2 col-lg-2 col-md-2"></div>
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
			<strong><a href="<?php echo base_url() ?>user/user_active_contracts"> Number of contracts Active: <?php echo $active_contract[0]['tot'] ?></a></strong>
			</div>
			
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_pending_contracts">Number of contracts Pending: <?php echo $pending_contract[0]['tot'] ?></a></strong>
			</div>
			
		
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_contracts/2">Number of contracts Inactive: <?php echo $inactive_contract[0]['tot'] ?></a></strong>
			</div>
			
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_contracts/3">Number of contracts Closed: <?php echo $closed_contract[0]['tot'] ?></a></strong>
			</div>
						
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>user/user_contracts/4">Number of contracts Terminated : <?php echo $terminated_contract[0]['tot'] ?></a></strong>
			</div>
			
			</div>
			</div>
		
			<?php
			if($duplicate_contract_exist==1)
			{
			?>
			
			<div class="col-xl-8 col-lg-8 col-md-8">
			<strong>same contract retrieved from dotloop which is already there in system</strong>
			<div>&nbsp;</div>
			<table class="table table-striped">
			
			<thead>
			<tr>
			  <th scope="col">Buyer Name</th>
			  <th scope="col">Buyer email</th>
			  <th scope="col">Buyer phone</th>
			  
			
			  
			  
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