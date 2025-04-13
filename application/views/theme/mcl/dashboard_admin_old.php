    
    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
 
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
-->


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
		
		       <h1 class="title"> Admin Dashboard</h1>
		</div>	   
        </div>	
	    </div>	
	
	<div class="row">
			<!--<div class="col-xl-2 col-lg-2 col-md-2"></div>-->
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
			  
			  
			    
			    
			<div><strong>Total Contracts: <?php  echo $tot_contract[0]['tot'] ?></strong></div>
			<div>&nbsp;</div>
			<table class="table table-striped">
			  <thead>
				<tr>
				  
				  <th scope="col">Buyer Name </th>
				  <th scope="col">Realtor </th>
				  
				  <th scope="col">User Type</th>
				  <th scope="col">Contract Type</th>
				  <th scope="col">Contract Start Date</th>
				  <th scope="col">Contract End Date</th>
				 <th scope="col">Document</th>
				  <th scope="col">Status</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
				foreach($row_contract as $row)
				{
				  $tmp_status="";
				  if($row['status']==0 )
				  {
					  $tmp_status="Pending";
				  }	  
				  elseif($row['status']==1)
				  {
					$tmp_status="Active";
				  }
				  elseif($row['status']==2)
				  {
					  $tmp_status="Inactive";
				  }
				   elseif($row['status']==3)
				  {
					  $tmp_status="Closed";
				  }
				   elseif($row['status']==4)
				  {
					  $tmp_status="TERMINATED";
				  }
				  elseif($row['status']==5)
				  {
					  $tmp_status="Cancel";
				  }

				  $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where DATE(contract_end_date)< DATE(NOW()) and  id='".$row['id']."'";
    			  $record_expired = $this->db->query($sql_expired);
    			  if($record_expired->num_rows() > 0) 
    				{
    					$record_expired_contract = $record_expired->result_array();
    				
    				    if($record_expired_contract[0]['tot']>0)
    				    {
    				        $tmp_status="Expired";
    				    }
    				            
    				}	

				    
				    
				    
				    $array_filename=explode(",",$row['file_name']);
				    
				    //print_r($array_filename);
				    $file_link="";
				    foreach($array_filename as $row_file)
				    {
				        $file_link.="<a target='_blank' href='".base_url()."assets/document/". $row_file."'  > <img src='".base_url()."assets/mcl_assets/images/icons8-pdf-24.png'  width='30' height='20'> </a>";
				    }
				?>
				<tr>
				  <td><?php echo $row['full_name'] ?></td>
				  <td><?php echo $row['first_name']." ".$row['last_name'] ?></td>
				 
				  <td><?php echo $row['role'] ?></td>
				  <td><?php echo $row['contract_type'] ?></td>
				  
				  <td><?php echo   date("m-d-Y", strtotime($row['contract_start_date']))  ?></td>
				  <td><?php echo  date("m-d-Y", strtotime($row['contract_end_date']))  ?></td>
				  
				  <td><?php echo $file_link; ?></td>
				  
				 
				  
				   <td><strong><?php echo $tmp_status;  ?></strong></td>
					<td>
					  <a href="<?php echo base_url() ?>admin/update_contract/<?php echo $row['id']  ?>"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-edit.gif"  width="30" height="20"> </a>
					  <a href="<?php echo base_url() ?>admin/delete_contract/<?php echo $row['id']  ?>" onclick="return confirm('Are you sure you want to delete this item?');"  > <img src="<?php echo base_url()?>assets/mcl_assets/images/icons8-delete-30.png"  width="30" height="20"> </a>
					    
					</td>
					
					
					
				 
				</tr>
				<?php
				}
				?>
			
							  </tbody>
			</table>

			
			
			</div>
			<div>&nbsp;</div>
			
			<div class="row">
			<a href="<?php echo base_url()?>home/users_split"><strong>Total number of users split by state</strong> </a>
			</div>
			</div>
		
			
		<!--	<div class="col-xl-2 col-lg-2 col-md-2"></div> -->
	</div>
	 </div>

	<div style="height: 200px;">&nbsp;</div>
	
	
	
