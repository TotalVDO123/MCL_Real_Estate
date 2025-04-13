<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">-->

 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> 
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>



	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">MLS List</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
    <div class="container">
	
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		
		       <h1 class="title">MLS List </h1>
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
		<div class="col-xl-2 col-lg-2 col-md-2"></div>
		
		<div class="col-xl-8 col-lg-8 col-md-8">
		
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2">
        <a class="btn btn-primary" href="<?php echo base_url() ?>admin/create_mls" role="button">Add MLS</a>
        </div>
        
        </div>
			
			<div class="row">
			<div>&nbsp;</div>
			<table class="table table-striped" id="example">
			  <thead>
				<tr>
				  
				  <th scope="col">State Name </th>
				  <th scope="col">MLS Name </th>
				  <th scope="col">Status</th>
				  <th scope="col"></th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
				$active_inactive="";
				foreach($mls_lists as $mls_list)
				{
				
				    if($mls_list['is_active']==1)
				    {
				        $active_inactive="Active";
				    }
				    elseif($mls_list['is_active']==0)
				    {
				        $active_inactive="Inactive";
				    }
				?>
				<tr>
				  
				  <td><?php echo $mls_list['state_name'] ?></td>
				  <td><?php echo $mls_list['mls_name'] ?></td>
				  <td id="is_active<?php echo $mls_list['id']  ?>" ><?php echo $active_inactive ?></td>
				  

					<td>
					 
					  
					  <?php /* ?>
					  <a href="<?php echo base_url() ?>admin/set_mls_status/<?php echo $mls_list['id']  ?>" onclick="return confirm('Are you sure you want to delete this item?');"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-delete-30.png"  width="30" height="20"> </a>
					   <?php */ ?> 
					
					<?php
					 if($mls_list['is_active']=='1')
					{ 
					    $buttonActive="block";
					}
					else
					{
					    $buttonActive="none";
					}
					?>    
				        
                   
                    
                    <?php
					 if($mls_list['is_active']=='0')
					{ 
					
					    $buttonInActive="block";
					}
					else
					{
					    $buttonInActive="none";
					}
					?>
                        
                    <a href="javaScript:void(0)" title="Active" style="display: <?php echo $buttonActive ?>;width:20px;" id="activeBtn<?php echo  $mls_list['id'] ?>" onclick="activeInactive(<?php echo $mls_list['id'] ?> ,0);" > <i style="font-size:24px" class="fa fa-thumbs-up"></i></a>
                    
                    <a href="javaScript:void(0)" title="Inactive" style="display: <?php echo $buttonInActive ?>;width:20px;" id="inactiveBtn<?php echo $mls_list['id'] ?>" onclick="activeInactive( <?php echo $mls_list['id'] ?>,1);" > <i style="font-size:24px" class="fa fa-thumbs-down"></i></a> 
                    </td>    
					<td>
					 <a href="<?php echo base_url() ?>admin/edit_mls/<?php echo $mls_list['id']  ?>"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-edit.gif"  width="30" height="20"> </a>
					
					
					</td>
					
					
					
				 
				</tr>
				<?php
				}
				?>
			
							  </tbody>
							  
							  
							  
							  
			 <tfoot>
            	<tr>
				  
				 <th scope="col">MLS Name </th>
				  <th scope="col">State Name </th>
				  
				  <th scope="col">Status</th>
				  <th scope="col"></th>
				  <th scope="col">Action</th>

				</tr>
        </tfoot>				  
			</table>

			
			
			</div>
		
			</div>
		
			
			<!--<div class="col-xl-2 col-lg-2 col-md-2"></div>-->
	</div>
	 </div>

	<div style="height: 200px;">&nbsp;</div>
	
	
		<script>
	function activeInactive(recordId,status) {
    var message = ((status == 0?" Inactive ":" Active "));
    //if (confirm("Are you sure to"+ message+ "the user")){
      
      
      if (confirm("Are you sure want to move the user to"+message+"status?")){
      
      


      
        $.post('<?php echo base_url() ?>admin/mls_status',
        {key:"activeInactive",status:status,recordId:recordId},
        function (response) {
            if (response == "success"){
                if (status == 0){
                    
                    $('#inactiveBtn'+recordId).show();
                    $('#activeBtn'+recordId).hide();
                    $('#is_active'+recordId).html('Inactive');
                    
                }else if (status == 1){
                    
                    $('#activeBtn'+recordId).show();
                    $('#inactiveBtn'+recordId).hide();
                $('#is_active'+recordId).html('Active');
                    
                }
                alert("MLS is "+ message +"now");
            }
        });
    }
}
</script>


	
	<script>

/*
    $('#example').DataTable({
        paging: false,
        ordering: false,
        info: false,
    });
*/

	 
	 $(document).ready(function () {
    $('#example').DataTable({
        ordering: false
    });
});   
	    
	    
	</script>