


	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">New User List</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
    <div class="container">
	
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		
		       <h1 class="title">New User List </h1>
		</div>	   
        </div>	
	    </div>	
	
	<div class="row">
		<!--	<div class="col-xl-2 col-lg-2 col-md-2"></div> -->
			<div class="col-xl-12 col-lg-12 col-md-12">
			
			<div class="row">
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
			  
			  
			    
			<div>&nbsp;</div>
			<table class="table table-striped" id="example">
			  <thead>
				<tr>
				  
				  <th scope="col">First Name </th>
				  <th scope="col">Last Name </th>
				  <th scope="col">Email </th>
				  
				  <th scope="col">Phone</th>
				  
				  
				  	
				  
				  <th scope="col">State</th>
				  <th scope="col">MLS Name</th>
				  <th scope="col">Role</th>
				  
				  <th scope="col">Status</th>
				  <!--<th scope="col">Action</th>-->
				</tr>
			  </thead>
			  <tbody>
				<?php
				foreach($users as $row)
				{
				?>
				<tr>
				  <td><?php echo $row['first_name'] ?></td>
				  <td><?php echo $row['last_name'] ?></td>
				  <td><?php echo $row['email'] ?></td>
				  <td><?php echo $row['phone'] ?></td>
				  
				 
				  <td><?php echo $row['state_name'] ?></td>
				  
				  <td><?php echo ucfirst( $row['mls_name'] )?></td>
				  
				  <td><?php echo ucfirst( $row['role'] )?></td>
				 
				   
				   
				   <td><?php
					if($row['status']=='0')
					{
					?>
					<strong> Pending </strong>
					<?php
					}
					if($row['status']=='1')
					{
					?>
					<strong> Active </strong>
					<?php
					}
					?>
					</td>
				
					
					
					<?php /* ?>
					<td>
					  <a href="<?php echo base_url() ?>admin/edit_user/<?php echo $row['user_id']  ?>"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-edit.gif"  width="30" height="20"> </a>
					  
					  
					  <a href="<?php echo base_url() ?>admin/delete_user/<?php echo $row['user_id']  ?>" onclick="return confirm('Are you sure you want to delete this item?');"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-delete-30.png"  width="30" height="20"> </a>
					    
					</td>
					<?php */ ?>
					
					
				 
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
				  <th scope="col">Role</th>
				  
				  <th scope="col">Status</th>
				  <!--<th scope="col">Action</th>-->
				</tr>
        </tfoot>				  
			</table>

			
			
			</div>
		
			</div>
		
			
			<!--<div class="col-xl-2 col-lg-2 col-md-2"></div>-->
	</div>
	 </div>

	<div style="height: 200px;">&nbsp;</div>
	
	
	