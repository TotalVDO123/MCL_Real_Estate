	
	  <section class="banner-wrapper contact-us" style="background-image: url(<?php echo base_url(); ?>assets/mcl_assets/images/real-estate-agent_login.jpg);">
        <div class="container">
            <div class="caption">
                <h1 class="title">Contract Revision</h1>
            </div>
        </div>
    </section>
	
	<div>&nbsp;</div>
    <div class="container">
	
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 text-center" style="height: 100px;">
		<div class="caption" style="max-width:100%">
		
		       <h1 class="title"> Admin Contract Revision  </h1>
		</div>	   
        </div>	
	    </div>	
	
	<div class="row">
			
			
			
			<div class="col-xl-12 col-lg-12 col-md-12">
			<div class="row">
			<table class="table">
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
				foreach($contract as $row)
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
				        $file_link.="<a href='".base_url()."assets/document/". $row_file."' target='_blank'  > <img src='".base_url()."assets/mcl_assets/images/icons8-pdf-24.png'   width='30' height='20'> </a>";
				    }


				
				
				
				
				
				
				?>
				<tr>
				  <td><?php echo $row['full_name'] ?></td>
				  <td><?php echo $row['first_name']." ".$row['last_name'] ?></td>
				 
				  <td><?php echo $row['role'] ?></td>
				  <td><?php echo $row['contract_type'] ?></td>
				  <td><?php echo date("m-d-Y", strtotime($row['contract_start_date']))  ?></td>
				  <td>
			        <?php echo date("m-d-Y", strtotime($row['contract_end_date']))  ?>
				  </td>
				 <td><?php echo $file_link; ?></td>
				  
				  <?php /*?>
				 
				   <td><?php
					if($row['status']=='0')
					{
					?>
					<a href="<?php echo base_url() ?>home/contract_status?id=<?php echo $row['id'];?>&status=<?php echo $row['status'];?>" 
					 type="button" class="btn btn-danger" onclick="return confirm('Active');"  > Pending  </a>
					<?php
					}
					if($row['status']=='1')
					{
					?>
					<a href="<?php echo base_url() ?>home/contract_status?id=<?php echo $row['id'];?>&status=<?php echo $row['status'];?>" 
					 type="button" class="btn btn-success" onclick="return confirm('Pending');"> Active</a>
					<?php
					}
					?>
					</td>
				  <?php */?>
				 
				  
				   <td> <strong> <?php echo $tmp_status ?></strong></td>
					<td><?php
					if($row['status']=='0')
					{
					?>
					<a href="<?php echo base_url() ?>user/view_buyercontract/<?php echo $row['id']?>/1" 
					 type="button" class="btn-sm btn-success" onclick="return confirm('do you want to approve the contract');"  > Approve </a>
						
					<a href="<?php echo base_url() ?>home/contract_deny_status?id=<?php echo $row['id'];?>&status=3" 
					 type="button" class="btn-sm btn-danger" onclick="return confirm('do you want to deny the contract');"  > Deny </a>	
						
						
					<?php
					}
					
					?>
					</td>
				  
				 
				</tr>
				<?php
				}
				?>
			
							  </tbody>
			</table>

			
			</div>
			</div>
		
			
			
	</div>
	 </div>

	<div style="height: 200px;">&nbsp;</div>
	
	<script>
	 
	function status_change()
	{
		  
		 alert('----------');
	
	
        $.ajax({
          url: 'buyer_search',
          type: 'post',
          data: {},
          success: function (response) {
           
          }
        });
      
	}
	 
	 
	</script>