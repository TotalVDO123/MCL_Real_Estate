<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Home_Core_Controller {   
    public $active_theme;
    function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        //$this->load->model('email_model');
        $this->load->database();
        //cache controlling
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");        
    }
    
    public function update_contract($cid = 0,$param2 = '') 
    {
            
           if ($this->session->userdata('login_type') !='admin' )
            redirect(base_url() . 'user/login', 'refresh');
 		    
 		    if ($param2 == 'update') 
 		    {
 		    
 		        $user_id=$this->input->post('user_id');
        		$start_date=$this->input->post('start_date');
        		$end_date=$this->input->post('end_date');
        		$contract_type=$this->input->post('contract_type');
        		$status=$this->input->post('status');
        		
		
		
		        for($ii=0; $ii<count($_FILES['document_file']['name']); $ii++) 
                {
		            if($_FILES['document_file']['name'][$ii]!="")
			        {
				
        				$random_file_name = md5(date('Y-m-d H:i:s:u'));
        				$filename1=$_FILES['document_file']['name'][$ii];
        				$extension = pathinfo($filename1, PATHINFO_EXTENSION);
        				
        				$document_name=$random_file_name.'_'.$user_id .'_'.($ii+1).'.'.$extension;  
        				
        				$array_document[]=$document_name;
        				move_uploaded_file($_FILES['document_file']['tmp_name'][$ii], 'assets/document/'.$document_name);
			        }
		        }                    
		
		
        		$array_start_date = explode('-', $start_date);
        		$phpdate = strtotime( $array_start_date[2].'-'.$array_start_date[0].'-'.$array_start_date[1] );
        		$from_date = date( 'Y-m-d', $phpdate );

        		$array_end_date = explode('-', $end_date);
        		$phpdate1 = strtotime( $array_end_date[2].'-'.$array_end_date[0].'-'.$array_end_date[1] );
        		$to_date = date( 'Y-m-d', $phpdate1 );
		
		    $str_document= implode(",",$array_document);
		    $data=array(
    			"contract_type"=>$contract_type,
    			"contract_start_date"=>$from_date,
    			"contract_end_date"=>$to_date,
    			"file_name"=>$str_document
    			
		        );
		
		
            	$this->db->where('id',$cid);
        		$this->db->update('buyer_realtor_contract', $data);
        		$afftectedRows = $this->db->affected_rows();
        		
            	if(!empty($afftectedRows))
        		{
        			$this->session->set_flashdata('success', 'Contract has been update successfully.');
        		}	
        		else
        		{
        			//$this->session->set_flashdata('error', "Something went wrong!!");
        		}	
    		
    		    redirect(base_url() . 'admin/update_contract/'.$cid, 'refresh');
    	
 		    
 		    
 		    }
		    
		    
		    $user_id=$this->session->userdata('user_id');
		    $data['users']=$this->db->get_where('user' , array('user_id'=>$user_id))->row();
            $data['contract']  = $this->db->get_where('buyer_realtor_contract' , array('id'=>$cid))->row();
			$data['page_name']      = 'contract_update';
			$data['title']          = 'Edit Contract';
		    $data['contract_id']=$cid;
        $this->load->view('theme/'.$this->active_theme.'/index',$data);
       
    }


    function delete_contract($id=0,$user_id=0){
        
        
        $this->db->where('id' , $id);
        $query=$this->db->delete('buyer_realtor_contract');
        if($query==true):
            $this->session->set_flashdata('success', 'Deleted successfully.');
        else:
            $this->session->set_flashdata('error', "Delete fail");
            
        endif;
        redirect(base_url() . 'home/dashboard/'.$user_id, 'refresh');
                
    }

     public function user_list() 
    {
             
            if ($this->session->userdata('login_type') !='admin' )
            redirect(base_url() . 'user/login', 'refresh');
			
			$data['users']="";
			$sql = "SELECT S.state_name,U.* FROM  user U 
			left join  states S on U.state_id=S.id order by U.user_id";
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
				$data['users'] = $record->result_array();
			}	
			$data['page_name']      = 'user_list';
			$data['title']          = 'User List';
		   
       
        $this->load->view('theme/'.$this->active_theme.'/index',$data);  
        
    }

     public function newuser_list() 
    {
             
            if ($this->session->userdata('login_type') !='admin' )
            redirect(base_url() . 'user/login', 'refresh');
			
			$data['users']="";
			$sql = "SELECT S.state_name,U.*,MLS.mls_name FROM  user U 
			left join  states S on U.state_id=S.id
			left join state_mls MLS on U.affiliated_mls_name=MLS.id
			where U.join_date >= now() - INTERVAL 1 DAY  order by U.user_id";
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
				$data['users'] = $record->result_array();
			}	
			$data['page_name']      = 'new_user_list';
			$data['title']          = 'New User List';
		   
       
        $this->load->view('theme/'.$this->active_theme.'/index',$data);  
        
    }



    
    public function edit_user($user_id=0) 
    {
            if ($this->session->userdata('login_type') !='admin' )
            redirect(base_url() . 'user/login', 'refresh');
            
            
            
            
            
		    
		    $data['profile_info']   = $this->db->get_where('user', array(
            'user_id' => $user_id))->result_array();
			$data['states']     = $this->db->get('states')->result_array();
			

			$data['page_name']      = 'edit_user';
			$data['title']          = 'Edit User';
		    $data['user_id']=$user_id;
            $this->load->view('theme/'.$this->active_theme.'/index',$data);
    
    }
    
    
    
    	function update_user($user_id=0)
	    {
		
        if ($this->session->userdata('login_type') !='admin' )
            redirect(base_url() . 'user/login', 'refresh');
       
            
			
			
				$first_name                   = $this->input->post('first_name');
				$last_name                   = $this->input->post('last_name');
				$phone_number                   = $this->input->post('phone_number');
              
                
				$user_broker_id               = $this->input->post('user_broker_id');
				$office_address               = $this->input->post('office_address');
				$office_phone_number               = $this->input->post('office_phone_number');
				$affiliated_mls_name               = $this->input->post('affiliated_mls_name');
				
				$broker_company               = $this->input->post('broker_company');
				
				
				
				$state_id               = $this->input->post('state_id');
				///$mls_license_number     = $this->input->post('mls_license_number');
				
				
				$data['first_name']=$first_name;
				$data['last_name']=$last_name;
				$data['user_broker_id']=$user_broker_id;
				$data['office_address']=$office_address;
				$data['office_phone_number']=$office_phone_number;
				$data['affiliated_mls_name']=$affiliated_mls_name; 
				$data['phone']=$phone_number;
				$data['broker_company']=$broker_company;
				
				
				$data['state_id']=$state_id;
			    
			
			
			$this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            
            $this->session->set_flashdata('success', 'user has been updated successfully.');
            redirect(base_url() . 'admin/user_list', 'refresh');

	}


    function delete_user($id=0)
    {
        $this->db->where('user_id' , $id);
        $query=$this->db->delete('user');
        if($query==true):
            $this->session->set_flashdata('success', 'Deleted successfully.');
        else:
            $this->session->set_flashdata('error', "Delete fail");
            
        endif;
        redirect(base_url() . 'admin/user_list', 'refresh');
    }    
    


    function delete_broker($id=0)
    {
        $this->db->where('user_id' , $id);
        $query=$this->db->delete('user');
        if($query==true):
            $this->session->set_flashdata('success', 'Deleted successfully.');
        else:
            $this->session->set_flashdata('error', "Delete fail");
            
        endif;
        redirect(base_url() . 'admin/broker_agent_split', 'refresh');
    }    


    
    public function broker_agent_split()
    {       
            $sql_broker = "SELECT S.state_name,U.*,MLS.mls_name FROM  user U left join states S on U.state_id=S.id  
            left join state_mls MLS on S.id=MLS.state_id and U.affiliated_mls_name=MLS.id
            where U.role='broker_record' and U.status=1 order by U.user_id ";
			$broker_record = $this->db->query($sql_broker);
			if($broker_record->num_rows() > 0) 
			{
				$data['brokers']= $broker_record->result_array();
			}
			
			$data['title'] = 'Edit Broker-Agent';
			$data['page_name']='broker_agent_report';	
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}

    public function mls_list() 
    {
            if ($this->session->userdata('login_type') !='admin' )
            redirect(base_url() . 'user/login', 'refresh');
			$sql = "select S.*, MLS.* from state_mls MLS left join states S on MLS.state_id=S.id order by S.id";
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
				$data['mls_lists'] = $record->result_array();
			}	
			$data['page_name']      = 'mls_list';
			$data['title']          = 'MLS List';
		   
       
        $this->load->view('theme/'.$this->active_theme.'/index',$data);  
        
    }

    
    public function edit_mls($mls_id=0) 
    {
            if ($this->session->userdata('login_type') !='admin' )
            redirect(base_url() . 'user/login', 'refresh');
    	    
    	    if (isset($_POST) && !empty($_POST))
		    {
    	        $state_id=$this->input->post('state_id');
        	    $mls_name=$this->input->post('mls_name');
        	    $license_limit=$this->input->post('license_limit');
        	    $data=array(
        	       'state_id'=>$state_id,
        	       'mls_name'=>$mls_name,
        	       'license_limit'=>$license_limit
        	        );

            $this->db->update('state_mls', $data, array('id'=>$mls_id));    
            $affected_row=$this->db->affected_rows();
			    if(!empty($affected_row))
			    {
			        $this->session->set_userdata('success', 'MLS has been updated successfully.');
			    }
			    else
			    {
			        //$this->session->set_userdata('error', "Something went wrong!!");
			    }
			    //redirect(base_url().'admin/edit_mls/'.$mls_id , 'refresh');
				redirect(base_url().'admin/mls_list/' , 'refresh');	
		    }
    	    
    	    
    	    
		    $data['mls_info']   = $this->db->get_where('state_mls', array(
            'id' => $mls_id))->result_array();
			$data['states']     = $this->db->get('states')->result_array();
			

			$data['mls_id']     = $mls_id;
			$data['page_name']      = 'edit_mls';
			$data['title']          = 'Edit MLS';
		    $data['user_id']=$user_id;
            $this->load->view('theme/'.$this->active_theme.'/index',$data);
    
    }
    
    
    public function create_mls() 
    {
            if ($this->session->userdata('login_type') !='admin' )
            redirect(base_url() . 'user/login', 'refresh');
    	    
    	    if (isset($_POST) && !empty($_POST))
		    {
    	        $state_id=$this->input->post('state_id');
        	    $mls_name=$this->input->post('mls_name');
        	    $data=array(
        	       'state_id'=>$state_id,
        	       'mls_name'=>$mls_name
        	        );

                $this->db->insert('state_mls', $data);
			    $mls_id = $this->db->insert_id();
			    
			    
			    	
			    
			    if(!empty($mls_id))
			    {
			        $this->session->set_flashdata('success', 'MlS has been created successfully.');
			    }
			    else
			    {
			        $this->session->set_flashdata('error', "Something went wrong!!");
			    }
			    redirect(base_url().'admin/mls_list' , 'refresh');

		    }
			$data['states']     = $this->db->get('states')->result_array();
			$data['page_name']      = 'create_mls';
			$data['title']          = 'Create MLS';
            $this->load->view('theme/'.$this->active_theme.'/index',$data);
    
    }
    
     public function mls_status()
	    {
	        $key=$this->input->POST('key');
	        
	        if ($key == "activeInactive")
	        {
                $status = $this->input->POST('status'); 
                $recordId = $this->input->POST('recordId'); 
                
            $data=array(
               'is_active'=> $status
                );
                
            $this->db->where('id', $recordId);
    		$this->db->update('state_mls', $data);
    		$afftectedRows = $this->db->affected_rows();
                if ($afftectedRows){
                    echo "success";
                }
	        }        
	   }
	   
    
	
}