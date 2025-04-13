
	  
	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Cancel Contract</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
    <div class="container">
	
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		       <h1 class="title">User Cancel Contract</h1>
		</div>	   
        </div>	
	    </div>	
	
	<?php
	$active_contract=0;
	$pending_contract=0;
	$closed=0;
	$terminated=0;
	$count=0;
	foreach($loops as $row)
	{
		
		
		if($row->status=='UNDER_CONTRACT')
		{
				$active_contract++;
		}	
		elseif($row->status=='SOLD')
		{
			$closed++;
		}
		elseif($row->status=='TERMINATED')
		{
			$terminated++;
		}
		elseif($row->status=='PRE_LISTING')
	    {
			$pending_contract++;
			
		}		
		
		
		
		$count++;
	}
	
	?>
	
	<div class="row">
			
			<div class="col-xl-2 col-lg-2 col-md-2"></div>
			<div class="col-xl-8 col-lg-8 col-md-8">
			<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<div><strong>Total Contracts: <?php  echo $count ?></strong></div>
			<div>&nbsp;</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>dotloop/user_active_contracts/UNDER_CONTRACT"> Number of contracts Active: <?php echo $active_contract; ?></a></strong>
			</div>
			
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>dotloop/user_active_contracts/PRE_LISTING">Number of contracts Pending: <?php echo $pending_contract; ?></a></strong>
			</div>
			
			
			
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>dotloop/user_active_contracts/SOLD">Number of contracts Closed: <?php echo $closed; ?></a></strong>
			</div>
			
			
			<div class="col-xl-12 col-lg-12 col-md-12" style="height: 40px;">
			<strong><a href="<?php echo base_url() ?>dotloop/user_active_contracts/TERMINATED">Number of contracts Terminated: <?php echo $terminated; ?></a></strong>
			</div>
			
			</div>
			</div>
		
			
			<div class="col-xl-2 col-lg-2 col-md-2"></div>
	</div>
	 </div>

	<div style="height: 200px;">&nbsp;</div>