
	<?php
	
	$page_name=$this->uri->segment(1);
	
	$page_name2=$this->uri->segment(2);
	//echo "================".$page_name;
	$ourstory="";
	$ourplatform="";
	$contact="";
	$home="";
	$user_details="";
	if($page_name=='ourstory')
	{
		$ourstory="active";
	}
	elseif($page_name=='ourplatform')
	{
		$ourplatform="active";
	}
	elseif($page_name=='contact')
	{
	
		$contact="active";
	}
	elseif($page_name2=='user_details')
	{
	
		$user_details="active";
	}
	else
	{
		$home="active";	
	}
	
	?>
	
	<body>
		<header>
			<div class="container">
				<div class="header">
					<a href="<?php echo base_url();  ?>" class="logo">
						<img src="<?php echo base_url(); ?>assets/mcl_assets/images/logo.svg" alt="logo" />
					</a>
					<div class="flex gap-80">
						<ul class="flex gap-10 nav-bar">
							<li class="show-on-mobile close-menu">
								<i class="las la-times"></i>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>" class="item <?php echo $home?>">Home</a>
							</li>
						
						<?php /* ?>
						
						<?php
						if($this->session->userdata('login_status')==1)
						{
						?>	
							<li>
								<a href="<?php echo base_url()?>home/user_details" class="item <?php echo $user_details?>">User Details</a>
							</li>
							
						<?php
						}
						
						?>	
						
						<?php */ ?>
							
							<li>
								<a href="<?php echo base_url(); ?>ourstory" class="item <?php echo $ourstory?>">Our Story</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>ourplatform" class="item <?php echo $ourplatform?>">Our Platform</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>contact" class="item <?php echo $contact?>">Contact</a>
							</li>
						</ul>
						
						<?php
						
						if($this->session->userdata('login_status')==1)
						{
						?>	
						<div class="flex gap-30 align-items-center">
						
						<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php
	echo ucfirst( $this->session->userdata('name')); 
	?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?php echo base_url() ?>home/dashboard/<?php echo $this->session->userdata('user_id') ?>">My Dashboard</a>
    <a class="dropdown-item" href="<?php echo base_url() ?>home/add_buyer">Add Buyer</a>
    <a class="dropdown-item" href="<?php echo base_url() ?>home/search_contracts">Buyer Search</a>
    
    <a class="dropdown-item" href="<?php echo base_url() ?>home/cancel_contract">Termination Request</a>
  <?php 
  if($this->session->userdata('login_type')=='broker_record')
  {
  ?>
        <a class="dropdown-item" href="<?php echo base_url() ?>home/agent_list">Agent List</a>
        
  <?php
  }
  ?>      
     
    
    
    <a class="dropdown-item" href="<?php echo base_url() ?>user/manage_profile">Edit Profile</a>
    <a class="dropdown-item" href="<?php echo base_url() ?>user/reset_password">Reset Password</a>
    <?php
  
  if($this->session->userdata('admin_is_login')==1)
  {
  ?>
  <a class="dropdown-item" href="<?php echo base_url() ?>user/contract_revision">Contract Revision</a>
  <a class="dropdown-item" href="<?php echo base_url() ?>admin/user_list">Edit User</a>
  <a class="dropdown-item" href="<?php echo base_url() ?>admin/broker_agent_split">Edit Broker-Agent</a>
<a class="dropdown-item" href="<?php echo base_url() ?>admin/newuser_list">New User</a>
   <?php
  }
  ?>
  <a class="dropdown-item" href="<?php echo base_url()?>home/user_details">User Details</a>
    
    
    
  </div>
</div>
						
						
						
						
						
							<a href="<?php echo base_url(); ?>user/logout" class="btn btn-primary">Logout</a>
							<div class="menu-icon show-on-mobile">
								<i class="las la-bars"></i>
							</div>
						</div>


						<?php		
						}
						else
						{	
						?>
						
						<div class="flex gap-30 align-items-center">
							<a href="<?php echo base_url(); ?>user/login" class="btn btn-primary">Login</a>
							<div class="menu-icon show-on-mobile">
								<i class="las la-bars"></i>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</header>
