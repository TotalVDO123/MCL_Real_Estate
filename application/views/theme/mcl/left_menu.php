<div id="sidebar-menu">
    
                        <ul class="metismenu" id="side-menu">
    
                            <!--<li class="menu-title">Navigation</li>-->
							
							<!--
							<li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span class="badge badge-success badge-pill float-right">2</span>
                                    <span>  Dashboard  </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="index.html">Dashboard 1</a></li>
                                    <li><a href="dashboard_2.html">Dashboard 2</a></li>
                                </ul>
                            </li>
							-->
                            
							<li>
                                    <a href="<?php echo base_url() ?>home/dashboard/<?php echo $this->session->userdata('user_id') ?>" class="waves-effect waves-light">
                                        <i class="fa fa-desktop" aria-hidden="true">
                                        <span> </i>Dashboard </span>
                                    </a>
                            </li>
							
							<li>
                                    <a href="<?php echo base_url() ?>home/add_buyer" class="waves-effect waves-light">
                                        <i class="fa fa-address-book" aria-hidden="true"></i>
                                        <span> Add Buyer </span>
                                    </a>
                            </li>
							
							<li>
                                    <a href="<?php echo base_url() ?>home/search_contracts" class="waves-effect waves-light">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <span> Buyer Search </span>
                                    </a>
                            </li>
							<li>
                                    <a href="<?php echo base_url() ?>home/cancel_contract" class="waves-effect waves-light">
                                        <i class="fa  fa-times" aria-hidden="true"></i>
                                        <span> Termination Request </span>
                                    </a>
                            </li>
							<?php
							if($this->session->userdata('login_type')=='broker_record')
							{
							?>
						  <li>
                                    <a href="<?php echo base_url() ?>home/agent_list" class="waves-effect waves-light">
                                        <i class="fa  fa-list" aria-hidden="true"></i>
                                        <span> Agent List </span>
                                    </a>
                            </li>
						  
						  <?php
						  }
						  ?>
							
							
							
							<li>
                                    <a href="<?php echo base_url() ?>user/manage_profile" class="waves-effect waves-light">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                        <span> Edit Profile </span>
                                    </a>
                            </li>
							
							<li>
                                    <a href="<?php echo base_url() ?>user/reset_password" class="waves-effect waves-light">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                        <span> Reset Password </span>
                                    </a>
                            </li>
							
							<?php
  
  if($this->session->userdata('admin_is_login')==1)
  {
  ?>
					<li>
                     <a href="<?php echo base_url() ?>user/contract_revision" class="waves-effect waves-light">
                     <i class="fa fa-list-ol" aria-hidden="true"></i>
                     <span> Contract Revision </span>
                     </a>
                     </li>
  
					<li>
                     <a href="<?php echo base_url() ?>admin/user_list" class="waves-effect waves-light">
                     <i class="fa fa-list" aria-hidden="true"></i>
                     <span> Edit User </span>
                     </a>
                     </li>
  
					<li>
                     <a href="<?php echo base_url() ?>admin/broker_agent_split" class="waves-effect waves-light">
                     <i class="fa fa-assistive-listening-systems" aria-hidden="true"></i>
                     <span> Edit Broker-Agent </span>
                     </a>
                     </li>
  
					<li>
                     <a href="<?php echo base_url() ?>admin/mls_list" class="waves-effect waves-light">
                     <i class="fa fa-list-ul" aria-hidden="true"></i>
                     <span> MLS List </span>
                     </a>
                     </li>
  
					<li>
                     <a href="<?php echo base_url() ?>admin/newuser_list" class="waves-effect waves-light">
                     <i class="fa fa-user-plus" aria-hidden="true"></i>
                     <span> New User </span>
                     </a>
                     </li>
  
					
  <?php
  }
  ?>
							
							
					<li>
                     <a href="<?php echo base_url() ?>home/user_details" class="waves-effect waves-light">
                     <i class="fa fa-user" aria-hidden="true"></i>
                     <span> User Details</span>
                     </a>
                     </li>		
							
					<li>
                     <a href="<?php echo base_url() ?>home/main_search_contracts" class="waves-effect waves-light">
                     <i class="fa fa-user" aria-hidden="true"></i>
                     <span> Search</span>
                     </a>
                     </li>			
							
							
                        </ul>
    
                    </div>
