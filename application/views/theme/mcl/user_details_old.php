<?php

//$dotloop_signin="https://auth.dotloop.com/oauth/authorize?response_type=code&client_id=2da9bbf6-ca23-4f0e-8dc0-ba51287b8cc9&client_secret=a05b2465-7303-4358-8d9d-319c5fdbc593&redirect_uri=https://localhost/realestate/user/link_with_dotloop&redirect_on_deny=true";


$dotloop_signin="https://auth.dotloop.com/oauth/authorize?response_type=code&client_id=2da9bbf6-ca23-4f0e-8dc0-ba51287b8cc9&client_secret=a05b2465-7303-4358-8d9d-319c5fdbc593&redirect_uri=https://multipleclientslist.com/user/link_with_dotloop&redirect_on_deny=true";


//https://multipleclientslist.com/user/link_with_dotloop


///$docusign_signin="https://account-d.docusign.com/oauth/auth?response_type=code&scope=signature%20%20%20&client_id=5f6633c0-9e1f-4041-a17f-ea9dcc2129b9&redirect_uri=https://classichollywoodfilms.com/mcl/user/link_with_docusign";


$docusign_signin="https://account-d.docusign.com/oauth/auth?prompt=login&response_type=code
&scope=signature+impersonation+dtr.rooms.read+dtr.rooms.write+dtr.documents.read+dtr.documents.write+dtr.profile.read+dtr.profile.write+dtr.company.read+dtr.company.write
&client_id=5f6633c0-9e1f-4041-a17f-ea9dcc2129b9
&redirect_uri=https://multipleclientslist.com/user/link_with_docusign"

/*
$docusign_signin="https://account.docusign.com/oauth/auth?prompt=login&response_type=code
&scope=signature+impersonation+dtr.rooms.read+dtr.rooms.write+dtr.documents.read+dtr.documents.write+dtr.profile.read+dtr.profile.write+dtr.company.read+dtr.company.write
&client_id=5f6633c0-9e1f-4041-a17f-ea9dcc2129b9
&redirect_uri=https://multipleclientslist.com/user/link_with_docusign"
*/

//5f6633c0-9e1f-4041-a17f-ea9dcc2129b9:98471a37-9de7-4af0-a7bc-218872f787e7

?>   

<!--
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
--> 
 <!-- Script -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' type='text/javascript'></script>
-->
	  
	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">User Details</h1>
								
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
        <div class="container">
		
		
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center">
		<div class="caption" style="max-width:100%">
		    <!--   <h1 class="title"> MCL User's Details </h1>-->
		<h1 class="title"> <?php echo ucfirst($users->first_name)." ".ucfirst($users->last_name) ?>'s Detail </h1>
		</div>	   
        </div>	   
	    </div>	    
		
		<?php
		if($duplicate_contract==1)
		{	
		?>
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height:20px;color:red;">
		You have some pending actions, please check dashboard
		</div>
		</div>
		<?php
		}
		?>
		
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		</div>
		</div>
		
		
		
				<div class="col-xl-12 col-lg-12 col-md-12 text-center">
						<div class="form-group mb-0">
                            <?php if($this->session->flashdata('success') !=''):?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('error') !=''):?>
                                <div class="alert alert-danger">
                                  <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
				</div>		
						
		
		
		
		
	<div class="row">
	
	
	<div class="col-xl-3 col-lg-3 col-md-3">
	<ul class="list-group">
  

 <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/dashboard/<?php echo $this->session->userdata('user_id') ?>"><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp;My Dashboard</a></li>
 <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/add_buyer"><i class="fa fa-address-book" aria-hidden="true"></i>&nbsp;Add Buyer</a></li>
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/search_contracts"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Buyer Search</a></li>
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/cancel_contract"><i class="fa  fa-times" aria-hidden="true"></i>&nbsp;Termination Request</a></li>
  <?php
  if($this->session->userdata('login_type')=='broker_record')
  {
  ?>
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>home/agent_list"><strong>Agent List </strong></a></li>  
  <?php
  }
  ?>
  
  
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>user/manage_profile"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;Edit Profile</a></li>
  
  <li class="list-group-item list-group-item-dark"><a href="<?php echo base_url() ?>user/reset_password"><i class="fa fa-key" aria-hidden="true"></i>&nbsp;Reset Password</a></li> 
  
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
    $user_type="";
    if($this->session->userdata('login_type')=='broker_record')
    $user_type="Broker";
    elseif($this->session->userdata('login_type')=='admin')
    $user_type="Admin";
    elseif($this->session->userdata('login_type')=='agent')
    $user_type="Agent";
?>
			
			           <!-- <div class=" box-shadow">-->
						<div class="col-xl-4 col-lg-4 col-md-4">
						<div class="card box-shadow">
						<div class="row card-body">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
						<div style="height: 50px;"><strong><?php echo ucfirst( $user_type) ?> Info</strong></div>
						</div>
                            
							<div class="col-lg-12 col-md-12 col-sm-12" style="height: 40px;">
                               
								First Name: <?php echo ucfirst( $users->first_name) ?>
                                <!--    <input type="text" name="first_name" placeholder="First Name" class="form-control" required />-->
                               
                            </div>
                            
							<div class="col-lg-12 col-md-12 col-sm-12" style="height: 40px;">
                                
								Last Name: <?php echo ucfirst( $users->last_name) ?>
                                 <!--   <input type="text" name="last_name" placeholder="Last Name" class="form-control" />-->
                                
                            </div>
                            
							<div class="col-lg-12 col-md-12 col-sm-12" style="height: 40px;">
                                
								Email: <?php echo  $users->email ?>
                                  <!--  <input type="email" name="email_address" placeholder="Email" class="form-control" required />-->
                                
                            </div>
							<!--
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="phone_number" placeholder="Phone Number" class="form-control" required />
                                </div>
                            </div>
							
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="password" id="user_password" name="user_password" placeholder="Password" class="form-control" required />
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="password" id="confirm_user_password" name="confirm_user_password" placeholder="Confirm Password" class="form-control" required />
                                </div>
                            </div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="realestate_brokerage" placeholder="Affiliated Real Estate Brokerage" class="form-control" required />
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="office_address" placeholder="Office Address" class="form-control" required />
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="office_phone_number" placeholder="Office Phone Number" class="form-control" required />
                                </div>
                            </div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                   
									<input type="text" name="affiliated_mls_name" placeholder="Affiliated MLS Name" class="form-control" required />
                                </div>
                            </div>
						-->
                       
						</div>
						</div>
						
						<div >&nbsp;</div>
						<div class="card box-shadow">
						<div class="row card-body">
						<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="text-center" style="height: 50px;"><strong>Broker Info</strong></div>
						<div style="height: 100px;"  >
						
						<?php
						if($users->role=='agent')
						{
						?>
						
						<div>
						<b> Broker Name: </b> <?php echo ucfirst( $broker_details->first_name." ".$broker_details->last_name) ?>
						 </div>
						 <div>
						 <b>Email:</b> <?php echo ucfirst( $broker_details->email) ?>  
						 </div>    
						<?php
						}
						elseif($users->role=='admin')
						{
                        ?>						    
						<b>As you are admin, no broker assigned</b>    
						    
						<?php    
						}
						else
						{
						?>
						<b>As you are broker of record, no broker assigned</b>
						<?php
						}
						?>
						
						
						<!--
						<span id="show_hide">
						Affiliated Real Estate Brokerage 
						</span>
						-->
						
						<!--<input type="text"  name="amount" id="amount_id" class="form-control float-number" style="display:none;"  value=""  />-->
						
						</div>
						<!--<div class="text-right"><a href="javascript:void(0);" id="edit_save_text" ><strong>EDIT</strong></a> </div> -->
						</div>
						</div>
						</div>
						
						
			</div>
			
		    <div class="col-xl-4 col-lg-4 col-md-4 box-shadow" >	
			
			<!-- --------------  -->
			
			<div class="row card-body">
		    
		
		<?php
	
		if($users->link_with_dotloop==0)
		{	
		?>
		
		
		<div class="caption" style="height: 100px;width:100%">
		       <h1 class="title"> <button type="button" class="btn btn-primary btn-lg btn-block"><a href="<?php echo $dotloop_signin; ?>">Link with dotloop</a> </button> </h1>
		</div>	   
        	
		<?php
		}
		elseif($users->link_with_dotloop==1)
		{
		?>
		
		
		
		<div class="caption" style="max-width:100%">
		       <div>The MCL account has been linked with Dotloop <button onclick="delink_dotloop(<?php echo $users->user_id ?>);" ><i class="fa fa-unlink" style="font-size:20px"></i> Delink with Dotloop </button></div>
		</div>	   
        	
		
		
		
		<?php
		}
		
			elseif($users->link_with_room==1)
		{
		
		?>
		
		<div class="caption" style="max-width:100%">
		       <div>The MCL account has been linked with docusign
		       
		       <button onclick="delink_docusign(<?php echo $users->user_id ?>);" ><i class="fa fa-unlink" style="font-size:20px"></i> Delink with Docusign </button>
		       </div>
		</div>	   
        	
		<?php
		}
		?>

		</div>
		
		
		
		<div class="row">
		
		<?php
	
		if($users->link_with_room==0)
		{	
		?>
		
		<div class="caption" style="height: 100px;width:100%">
		       <h1 class="title"> <button type="button" class="btn btn-primary btn-lg btn-block"><a href="<?php echo $docusign_signin; ?>">Link with docusign</a> </button> </h1>
		</div>	   
        	
		<?php
		}
		?>
		</div>

			
			
			
			
			<!-- ---------------  -->
			</div>
			
			
			</div>
	 </div>
	
    <div style="height: 100px;">&nbsp;</div>
	
	<script>
	
	$("#edit_save_text").click(function() {
    //$('#amount').css('display', 'block');
	
	if($('#edit_save_text').text()=='EDIT')
	{	
	
	$('#amount').show();
	$('#amount_id').css('display', 'block');
	$('#edit_save_text').html('<strong>SAVE</strong>');
	}
	else if($('#edit_save_text').text()=='SAVE')
	{
		
		var amount = $('#amount_id').val();
	
        $.ajax({
          url: '<?php echo base_url()?>user/save_brokerage_amount',
          type: 'post',
          data: { amount:amount},
          success: function (response) {
            
			if(response>=1)
			{
				alert('Brokerage amount has been saved successfully');
				
			}	
			
            
          }
        });
     
	
		$('#show_hide').text('Affiliated Real Estate Brokerage: '+amount);
		//$('#amount').hide();
		$('#amount_id').css('display', 'none');
		$('#edit_save_text').html('<strong>EDIT</strong>');
		
	}	
	
	
	
	
	});
	</script>
	
	<script>

	jQuery(document).ready(function() {
		$('.float-number').keypress(function(event) {
			if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
				event.preventDefault();
			}
		});
	});


	</script>
	
	<script>
	function delink_dotloop( user_id )
	{
        
        var result = confirm("You are about to reset your account.Are you sure?");
        if (result) 
        {


    
        
            $.ajax({
              url: '<?php echo base_url()?>user/delink_with_dotloop',
              type: 'post',
              data: { user_id:user_id},
              success: function (response) {
    			if(response>=1)
    			{
    				alert('Dotloop  has been delink successfully');
    				window.location = "<?php echo base_url()?>home/user_details";
    			}	
              }
            });
            
        }    
	}
	</script>
	
	<script>
	  function delink_docusign(user_id)
	  {
	    var result = confirm("You are about to reset your account.Are you sure?");
        if (result) 
        {
 
    	      $.ajax({
              url: '<?php echo base_url()?>user/delink_with_docusign',
              type: 'post',
              data: { user_id:user_id},
              success: function (response) {
    			if(response>=1)
    			{
    				alert('Docusign  has been delink successfully');
    				window.location = "<?php echo base_url()?>home/user_details";
    			}	
              }
            });
	      
        }
	      
	      
	  }
	    
	</script>