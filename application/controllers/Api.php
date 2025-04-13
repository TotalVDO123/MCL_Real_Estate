<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
	function __construct() {
		parent::__construct();
	
		$this->load->database();
		
		$this->load->library('session');
		$this->load->model('Api_model');
        //$this->nexmo->set_format('json');
		
	

    }
    
		public function signin()	
	{		
			
			$email=	$this->input->post('email');
			$password=$this->input->post('password');
			
			
			if(empty($email))
			{	
			 $JSON_ARR= array(
    			'response'=>"Email is required",
    			'success'=>0
    			);
    			print json_encode($JSON_ARR);
                die();
			}
			
			if(empty($password))
			{	
			 $JSON_ARR= array(
    			'response'=>"Password is required",
    			'success'=>0
    			);
    			print json_encode($JSON_ARR);
                die();
			}
			
			if(	isset($email) )
			{	
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
				{
				 $JSON_ARR = array(
				 'response'=>"Not valid email",
				 'success'=>0
				 );
				print json_encode($JSON_ARR);
				die();
							
				}
			}	
			$result_signin= $this->Api_model->user_signin();
			if(!empty($result_signin))
				{

					$JSON_ARR=array(
							
							'user_id'=>intval($result_signin[0]['user_id']),
							'first_name'=>$result_signin[0]['first_name'],
							'last_name'=>$result_signin[0]['last_name'],
							'office_phone_number'=>$result_signin[0]['phone'],
							'email'=>$result_signin[0]['email'],
							'success'=>1,
							);		
					print json_encode($JSON_ARR);
				}
				else
				{
						$JSON_ARR=array(
							'response'=>"Username and Password do not match.",
							'success'=>0		
							);		
					print json_encode($JSON_ARR);	
				}
	}
	
	public function signup()	
	{	
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$first_name=trim($this->input->post('first_name'));
			$last_name=trim($this->input->post('last_name'));
			$phone=trim($this->input->post('phone'));
			$role=$this->input->post('role');
			
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
			 $JSON_ARR = array(
			 'response'=>"Not valid email",
			 'success'=>0
			 
			 );

				print json_encode($JSON_ARR);
				die();
						
			}

            if( empty($password))
            {
                
                $JSON_ARR= array(
    					'response'=>"Password is required",
    					'success'=>0
    					);
    				print json_encode($JSON_ARR);
                    die();
                
            }
            
			
			if( empty($first_name))
            {
                
                $JSON_ARR = array(
    					'response'=>"First name is required",
    					'success'=>0
    					);
    				print json_encode($JSON_ARR);
                    die();
                
            }
            
          
            if( empty($phone))
            {
                $JSON_ARR= array(
    					'response'=>"Phone no is required"
    					);
    				print json_encode($JSON_ARR);
                    die();
            }
           
			if( empty($role))
            {
                
				$JSON_ARR= array(
						'response'=>"Role is required"
						);
				print json_encode($JSON_ARR);
				die();
                
            }
		  
		  
		  

			
			if(	isset($email) &&  isset($password)  )
			{
					
					
					$data=array(
					"email"=>$email,
					"password"=>md5($password),
					"first_name"=>$first_name,
					"last_name"=>$last_name,
					"role"=>$role,
					"join_date"=>date("Y-m-d H:i:s")
					
					);
			
					$signup_id= $this->Api_model->signup($data);
			if($signup_id>0)
			{		

				$JSON_ARR = array(
							'response'=>"Your account is register successfully",
							'user_id'=>$signup_id,
							"email"=>$email,
							"first_name"=>$first_name,
							"last_name"=>$last_name,
							'success'=>1
							);

					print json_encode($JSON_ARR);
						
			}		
				else
			{
					$JSON_ARR = array(
									'response'=>"Wrong data",
									'success'=>0
									);
							print json_encode($JSON_ARR);
				
			}

			}
			
		
	}
	
	public function buyer_search()	
	{
		/*
		$this->input->GET('name');
		$this->input->GET('last_name');
		$this->input->GET('email');
		$this->input->GET('phone');
		
		
		$this->input->GET('secondary_name');
        $this->input->GET('secondary_last_name');
		$this->input->GET('secondary_email');
		$this->input->GET('secondary_phone');
		*/
		$data= $this->Api_model->buyer_search();
		
		
		//print_r($data);
		
		//print_r($data['contracts1']);
		//print_r($data['contracts2']);
		//print_r($data['contracts3']);
		
		
		$contracts1=[];
			foreach($data['contracts1'] as $contr )
			{
				$phone='('.substr($contr['phone'], 0, 3).') '.substr($contr['phone'], 3, 3).'-'.substr($contr['phone'],6);
				
				$company = $this->db->get_where('user', array('user_id' => $contr['user_broker_id']))->result_array();
				
				//echo $this->db->last_query();
				
				$contracts1[] = array(
					'first_name'=>$contr['name'],
					'last_name'=>$contr['last_name'],
					'email'=>$contr['email'],
					'phone'=>$phone,
					'company_name'=>$company[0]['broker_company'],
					'agent_name'=>$contr['first_name']." ".$contr['last_name'],
					
					'contract_type'=>$contr['contract_type'],
					'status'=>$this->Api_model->contract_status($contr['status'],$contr['id']),
					
				);
			}
			
			
			
		
		
			$contracts2=[];
			foreach($data['contracts2'] as $contr )
			{
				$phone='('.substr($contr['phone'], 0, 3).') '.substr($contr['phone'], 3, 3).'-'.substr($contr['phone'],6);
				
				$company = $this->db->get_where('user', array('user_id' => $contr['user_broker_id']))->result_array();
				
				//echo $this->db->last_query();
				
				$contracts2[] = array(
					'first_name'=>$contr['name'],
					'last_name'=>$contr['last_name'],
					'email'=>$contr['email'],
					'phone'=>$phone,
					'company_name'=>$company[0]['broker_company'],
					'agent_name'=>$contr['first_name']." ".$contr['last_name'],
					
					'contract_type'=>$contr['contract_type'],
					'status'=>$this->Api_model->contract_status($contr['status'],$contr['id']),
					
				);
			}
			
			$contracts3=[];
			foreach($data['contracts3'] as $contr )
			{
				$phone='('.substr($contr['phone'], 0, 3).') '.substr($contr['phone'], 3, 3).'-'.substr($contr['phone'],6);
				
				$company = $this->db->get_where('user', array('user_id' => $contr['user_broker_id']))->result_array();
				
				//echo $this->db->last_query();
				
				$contracts3[] = array(
					'first_name'=>$contr['name'],
					'last_name'=>$contr['last_name'],
					'email'=>$contr['email'],
					'phone'=>$phone,
					'company_name'=>$company[0]['broker_company'],
					'agent_name'=>$contr['first_name']." ".$contr['last_name'],
					
					'contract_type'=>$contr['contract_type'],
					'status'=>$this->Api_model->contract_status($contr['status'],$contr['id']),
					
				);
			}
			
		
		
		
		$JSON_ARR = array(
			'message'=>"buyer search",
			'success'=>1,
			'all_buyer_details'=>$contracts1,
			'only_buyer_email'=>$contracts2,
			'phone and name'=>$contracts3
			
			);
			print json_encode($JSON_ARR);
		
		
	}
	
	
	
	public function user_details($user_id=0)
    {
		$users=$this->db->get_where('user' , array('user_id'=>$user_id))->row();
		
		
		
		if($users->role=='agent')
		{	
				
				$user_broker_id=$users->user_broker_id;
				$broker_details=$this->db->get_where('user' , array('user_id'=>$user_broker_id))->row();
		}
		
		$broker_info=array(
		'broker_name'=>ucfirst( $broker_details->first_name." ".$broker_details->last_name),
		'email'=>$broker_details->email,
		);
		
		$JSON_ARR = array(
			'message'=>"user details",
			'success'=>1,
			'user_type'=>$users->role,
			'user_id'=>$users->user_id,
			'first_name'=>$users->first_name,
			'last_name'=>$users->last_name,
			'email'=>$users->email,
			'phone'=>$users->phone,
			'broker_info'=>$broker_info
			
			);
			print json_encode($JSON_ARR);
		
		
	
	}
	
	
	
	function add_buyer_contract()
	{
		
		$this->load->model('email_model');
		$primary_buyer_name=$this->input->post('primary_buyer_name');
		$primary_buyer_last_name=$this->input->post('primary_buyer_last_name');
			
		
		
		
		
		$secondary_buyer_name=$this->input->post('secondary_buyer_name');
			
		
		$secondary_buyer_last_name="";
		if(!empty($this->input->post('secondary_buyer_last_name')))
		{
		$secondary_buyer_last_name=$this->input->post('secondary_buyer_last_name');
		}
			
		$buyer_email=$this->input->post('buyer_email');
		
		$secondary_buyer_email=$this->input->post('secondary_buyer_email');
		
		
		$buyer_phone=$this->input->post('buyer_phone');	
		
		$secondary_buyer_phone=$this->input->post('secondary_buyer_phone');	
		
		
		
		
		$user_id=$this->input->post('user_id');
		$start_date=$this->input->post('start_date');
		$end_date=$this->input->post('end_date');
		$contract_type='Buyer Agreement';
		$status=$this->input->post('status');
		
		
		 if( empty($primary_buyer_name))
            {
                
                $JSON_ARR= array(
    					'response'=>"Primary buyer first name is required",
    					'success'=>0
    					);
    				print json_encode($JSON_ARR);
                    die();
                
            }
			
		if( empty($primary_buyer_last_name))
            {
                
                $JSON_ARR= array(
    					'response'=>"Primary buyer last name is required",
    					'success'=>0
    					);
    				print json_encode($JSON_ARR);
                    die();
                
            }	
		
			if(empty($buyer_email))
			{	
			 $JSON_ARR= array(
    			'response'=>"Primary buyer email is required",
    			'success'=>0
    			);
    			print json_encode($JSON_ARR);
                die();
			}
			
			
		if(	isset($buyer_email)   )
			{	
				if(!filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) 
				{
				 $JSON_ARR = array(
				 'response'=>"Primary buyer email should be valid email",
				 'success'=>0
				 );
				print json_encode($JSON_ARR);
				die();
							
				}
			}		
		
		
		if( empty($buyer_phone))
            {
                
                $JSON_ARR= array(
    					'response'=>"Primary buyer phone is required",
    					'success'=>0
    					);
    				print json_encode($JSON_ARR);
                    die();
                
            }

		if( empty($user_id))
            {
                
                $JSON_ARR= array(
    					'response'=>"User id is required",
    					'success'=>0
    					);
    				print json_encode($JSON_ARR);
                    die();
            }		
		
		
		
		$str_document='';
		 for($ii=0; $ii<count($_FILES['document_file']['name']); $ii++) 
            {
		if($_FILES['document_file']['name'][$ii]!="")
			{
				
				$random_file_name = md5(date('Y-m-d H:i:s:u'));
				$filename1=$_FILES['document_file']['name'][$ii];
				$extension = pathinfo($filename1, PATHINFO_EXTENSION);
				
				///$array_document[]=$random_file_name.'_'.$user_id .'_'.($ii+1).'.'.$extension;
				///move_uploaded_file($_FILES['document_file']['tmp_name'][$ii], 'assets/document/'.'document_'.$user_id .'_'.($ii+1).'.'.$extension);
				
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
		if(!empty($array_document))
		{	
		$str_document= implode(",",$array_document);
		}
		$data=array(
			"contract_type"=>$contract_type,
			"contract_start_date"=>$from_date,
			"contract_end_date"=>$to_date,
			"file_name"=>$str_document,
			"user_id"=>$user_id,
			'created_at'=> date('Y-m-d'),
			"status"=>$status
		);
		
		$this->db->insert('buyer_realtor_contract', $data);
        $contract_id = $this->db->insert_id();
		
		//
		$data2=array(
		"name"=>$primary_buyer_name,
		"last_name"=>$primary_buyer_last_name,
		"secondary_buyer_name"=>$secondary_buyer_name,
		"secondary_buyer_last_name"=>$secondary_buyer_last_name,
		"email"=>$buyer_email,
		"secondary_buyer_email"=>$secondary_buyer_email,
		"phone"=>$buyer_phone,
		"secondary_buyer_phone"=>$secondary_buyer_phone,
		"user_id"=>$user_id,
		"buyer_realtor_contract_id"=>$contract_id,
		'created_at'=> date('Y-m-d')
		);
		
		
		$this->db->insert('buyers', $data2);
        $buyer_id = $this->db->insert_id();
		$this->email_model->contract_email($buyer_id,$contract_id,$user_id);
		
		/*
		if(!empty($buyer_id))
		{
			$this->session->set_flashdata('success', 'Buyer has been saved successfully.');
		}	
		else
		{
			$this->session->set_flashdata('error', "Something went wrong!!");
		}	
		*/
		
		
		$contract_content= array(
					
					'response'=>"Buyer has been saved successfully.",
    				'success'=>1,
					"contract_id"=>$contract_id,
					"contract_type"=>$contract_type,
					"contract_start_date"=>$start_date,
					"contract_end_date"=>$end_date
				      );	
			print json_encode($contract_content);
	    
	}
	
	
	public function get_stste()
    {
		
		
		$states= $this->Api_model->get_state();
		$content=[];
		foreach($states as $state)
			{	
				$content[]= array(
					"state_id" =>$state['id'],
					"state_name"=>$state['state_name'],
					"state_postal"=>$state['stste_postal']
				);
			}
		$JSON_ARR = array(
				"List"=>'state',
				'contents'=>$content
				);
	
		print json_encode($JSON_ARR);
	}
	
	public function mls_name($state_id='')
    {
			$mls_states= $this->Api_model->get_mls_state($state_id);
		$content=[];
		foreach($mls_states as $mls_state)
			{	
				$content[]= array(
					'mls_id'=>$mls_state['id'],
					'state_id'=>$mls_state['state_id'],
					'mls_name'=>$mls_state['mls_name']

				);
			}
		$JSON_ARR = array(
				"List"=>'mls',
				'contents'=>$content
				);
	
		print json_encode($JSON_ARR);
	}
	
	
	public function get_contracts_data_old()
    {
		
		
		$contracts= $this->Api_model->get_all_contracts();
		$contract_content=[];
		foreach($contracts as $contract)
		{
				
			$buyers= $this->Api_model->get_contracts_buyers($contract['id']);
			$buyers_content=[];
			foreach($buyers as $buyer)
			{	
				$buyers_content[]= array(
					"buyer_id" =>$buyer['id'],
					"name"=>$buyer['name'],
					"last_name"=>$buyer['last_name'],
					"email"=>$buyer['email'],
					"phone"=>$buyer['phone'],
					"secondary_buyer_name"=>$buyer['secondary_buyer_name'],
					"secondary_buyer_last_name"=>$buyer['secondary_buyer_last_name'],
					"secondary_buyer_email"=>$buyer['secondary_buyer_email'],
					"secondary_buyer_phone"=>$buyer['secondary_buyer_phone'],
					"user_id"=>$buyer['user_id'],
					"created_at"=>$buyer['created_at'],
				);
				
				
				
				
				
				$contract_content[]= array(
					"contract_id"=>$contract['id'],
					"user_id"=>$contract['user_id'],
					"contract_type"=>$contract['contract_type'],
					"contract_start_date"=>$contract['contract_start_date'],
					"contract_end_date"=>$contract['contract_end_date']	,
					"created_at"=>$contract['created_at'],
					"buyers"=>$buyers_content	
				      );	
			
			}
			
			print json_encode($JSON_ARR);
				
		}	
		
	}	
	
	public function broker_list()
	{
		$beoker_list= $this->Api_model->broker_list();
		$content=[];
		foreach($beoker_list as $row)
			{	
				$content[]= array(
				
				'user_id'=>$row['user_id'],
				'first_name'=>$row['first_name'],
				'last_name'=>$row['last_name'],
				'email'=>$row['email'],
				'phone'=>$row['phone'],
				);
			}
		$JSON_ARR = array(
				"List"=>'broker',
				'contents'=>$content
				);
	
		print json_encode($JSON_ARR);
		
		
		
	}
	
	
	public function edit_profile()
    {
			$user_id                = $this->input->post('user_id');
			//$email=$this->input->post('email');
			$password=$this->input->post('password');
			$first_name=trim($this->input->post('first_name'));
			$last_name=trim($this->input->post('last_name'));
			$phone=trim($this->input->post('phone'));
			$office_address=$this->input->post('office_address');
			$office_phone_number=trim($this->input->post('office_phone_number'));
			
			
			
			$data['office_phone_number']=$office_phone_number;
			$user_broker_id               = $this->input->post('user_broker_id');
			$state_id               = $this->input->post('state_id');
			$affiliated_mls_name               = $this->input->post('affiliated_mls_name');
			
			/*
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
			 $JSON_ARR = array(
			 'response'=>"Not valid email",
			 'success'=>0
			 
			 );

				print json_encode($JSON_ARR);
				die();
						
			}
	*/
            
			
			if( empty($user_id))
            {
                
                $JSON_ARR = array(
    					'response'=>"User id is required",
    					'success'=>0
    					);
    				print json_encode($JSON_ARR);
                    die();
                
            }
			
			if( empty($first_name))
            {
                
                $JSON_ARR = array(
    					'response'=>"First name is required",
    					'success'=>0
    					);
    				print json_encode($JSON_ARR);
                    die();
                
            }
            
			
			 if( empty($phone))
            {
                $JSON_ARR= array(
    					'response'=>"Phone no is required",
						'success'=>0
    					);
    				print json_encode($JSON_ARR);
                    die();
            }
			
			
          
           
           
		
		
				
				
				
				$data['first_name']=$first_name;
				$data['last_name']=$last_name;
				
				$data['office_address']=$office_address;
				$data['office_phone_number']=$office_phone_number;
				$data['affiliated_mls_name']=$affiliated_mls_name; 
				$data['phone']=$phone_number;
				$data['state_id']=$state_id;
				
				
			
				
				
				
				$data['user_broker_id']=$user_broker_id;
				
				if(!empty($password))
				{	
					$data['password']       = md5($password);
                }
				//$data['broker_company']=$broker_company;
			    //$data['mls_license_number']=$mls_license_number;
			
				$this->db->where('user_id', $user_id);
				$this->db->update('user', $data);
	
			$JSON_ARR = array(
				'response'=>"Profile updated successfully",
				'user_id'=>$user_id,
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'success'=>1
				
				);
	
		print json_encode($JSON_ARR);
	
	
	}
	
	function active_contracts()
	{
		$role=$this->input->post('role');
		$user_id=$this->input->post('user_id');
		
		if( empty($user_id))
		{
			$JSON_ARR= array(
					'response'=>"User id is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
		
		if( empty($role))
		{
			$JSON_ARR= array(
					'response'=>"Role is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
			
		
		
		
			
			if($role=='broker_record')
			{
			    $where_as=" and  U.user_broker_id='".$user_id."'";
			    
			}
			elseif($role=='agent')
			{
			    $where_as="and  BC.user_id='".$user_id."'";
			}
		
		
		$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where   DATE(BC.contract_end_date) > DATE(NOW()) and BC.status='1' ".$where_as;
		
		$record = $this->db->query($sql);
		$active_contract = $record->result_array();
		
		$content=[];
		foreach($active_contract as $row)
		{
			$content[]= array(
				'buyer_full_name'=>$row['full_name'],
				'buyer_email'=>$row['email'],
				'buyer_phone'=>$row['phone'],
				'realtor_name'=>$row['first_name']." ".$row['last_name'],
				'user_email'=>$row['user_email'],
				'contract_type'=>$row['contract_type']
				);
			
			
		}

		$JSON_ARR = array(
				"launch"=>'active contracts',
				'contents'=>$content
				);
	
		print json_encode($JSON_ARR);
		
	}
    
	
	
	
	function pending_contracts()
	{
		$role=$this->input->post('role');
		$user_id=$this->input->post('user_id');
		
		if( empty($user_id))
		{
			$JSON_ARR= array(
					'response'=>"User id is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
		
		if( empty($role))
		{
			$JSON_ARR= array(
					'response'=>"Role is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}

		
		$where_as="";
			if($role=='broker_record')
			{
			    $where_as=" and  U.user_broker_id='".$user_id."'";
			}
			elseif($role=='agent')
			{
			    $where_as="and  BC.user_id='".$user_id."'";
			}
			

			
			$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.status='0' and DATE(BC.contract_end_date)> DATE(NOW()) ".$where_as;
			$record = $this->db->query($sql);
			$active_contract = $record->result_array();
		
			$content=[];
		foreach($active_contract as $row)
		{
			$content[]= array(
				'buyer_full_name'=>$row['full_name'],
				'buyer_email'=>$row['email'],
				'buyer_phone'=>$row['phone'],
				'realtor_name'=>$row['first_name']." ".$row['last_name'],
				'user_email'=>$row['user_email'],
				'contract_type'=>$row['contract_type']
				);
			
			
		}

		$JSON_ARR = array(
				"launch"=>'active contracts',
				'contents'=>$content
				);
	
		print json_encode($JSON_ARR);
	}
	
	
	function expired_contracts()
	{
		$role=$this->input->post('role');
		$user_id=$this->input->post('user_id');
		
		if( empty($user_id))
		{
			$JSON_ARR= array(
					'response'=>"User id is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
		
		if( empty($role))
		{
			$JSON_ARR= array(
					'response'=>"Role is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
			
		
		
		
			
			if($role=='broker_record')
			{
			    $where_as=" and  U.user_broker_id='".$user_id."'";
			    
			}
			elseif($role=='agent')
			{
			    $where_as="and  BC.user_id='".$user_id."'";
			}
		
		 $sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where  DATE(BC.contract_end_date) < DATE(NOW())  ".$where_as;
		
		$record = $this->db->query($sql);
		$active_contract = $record->result_array();
		
		$content=[];
		foreach($active_contract as $row)
		{
			$content[]= array(
				'buyer_full_name'=>$row['full_name'],
				'buyer_email'=>$row['email'],
				'buyer_phone'=>$row['phone'],
				'realtor_name'=>$row['first_name']." ".$row['last_name'],
				'user_email'=>$row['user_email'],
				'contract_type'=>$row['contract_type']
				);
			
			
		}

		$JSON_ARR = array(
				"launch"=>'active contracts',
				'contents'=>$content
				);
	
		print json_encode($JSON_ARR);
		
		
		
		
	}
	function terminated_contracts()
	{
		$role=$this->input->post('role');
		$user_id=$this->input->post('user_id');
		
		if( empty($user_id))
		{
			$JSON_ARR= array(
					'response'=>"User id is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
		
		if( empty($role))
		{
			$JSON_ARR= array(
					'response'=>"Role is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
		
			if($role=='broker_record')
			{
			    $where_as=" and  U.user_broker_id='".$user_id."'";
			}
			elseif($role=='agent')
			{
			    $where_as="and  BC.user_id='".$user_id."'";
			}
			
		
		$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.status=4 and DATE(BC.contract_end_date)> DATE(NOW()) ".$where_as;
			
			
		$record = $this->db->query($sql);
		$terminated_contract = $record->result_array();
		
		$content=[];
		foreach($terminated_contract as $row)
		{
			$content[]= array(
				'buyer_full_name'=>$row['full_name'],
				'buyer_email'=>$row['email'],
				'buyer_phone'=>$row['phone'],
				'realtor_name'=>$row['first_name']." ".$row['last_name'],
				'user_email'=>$row['user_email'],
				'contract_type'=>$row['contract_type']
				);
			
			
		}

		 		
		$JSON_ARR = array(
				"launch"=>'terminated_contracts',
				'contents'=>$content
				);
	
		print json_encode($JSON_ARR);	
	
	}
	
	
	function buyer_cancellation_requests()
	{
		$role=$this->input->post('role');
		$user_id=$this->input->post('user_id');
		
		if( empty($user_id))
		{
			$JSON_ARR= array(
					'response'=>"User id is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
		
		if( empty($role))
		{
			$JSON_ARR= array(
					'response'=>"Role is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
		
			if($role=='broker_record')
			{
			    $where_as=" and  U.user_broker_id='".$user_id."'";
			}
			elseif($role=='agent')
			{
			    $where_as="and  BC.user_id='".$user_id."'";
			}
			
		$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.contract_process_initiation=1 ".$where_as;
			
			$record = $this->db->query($sql);
			$buyer_cancellation = $record->result_array();
			
			
			$content=[];
		foreach($buyer_cancellation as $row)
		{
			$content[]= array(
				'buyer_full_name'=>$row['full_name'],
				'buyer_email'=>$row['email'],
				'buyer_phone'=>$row['phone'],
				'realtor_name'=>$row['first_name']." ".$row['last_name'],
				'user_email'=>$row['user_email'],
				'contract_type'=>$row['contract_type']
				);
			
			
		}
			
		$JSON_ARR = array(
				"launch"=>'buyer_cancellation_requests',
				'contents'=>$content
				);
	
		print json_encode($JSON_ARR);	
			
		
		
	}
	
	
	//////Broker cancellation related api
	
	function approved_cancellation()
	{
			$id=$this->input->post('buyer_realtor_contract_id');
			$cancel_request_user_id=$this->input->get('cancel_request_user_id');
			
		if( empty($id))
		{
			$JSON_ARR= array(
					'response'=>"buyer realtor contract ID is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
		
		if( empty($cancel_request_user_id))
		{
			$JSON_ARR= array(
					'response'=>"Cancel request user id is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}	
			
			
		if($cancel_request_user_id==0)
	     {
	     
	       $this->db->where('id', $id);
            $this->db->update('buyer_realtor_contract', array(
                'contract_process_initiation' => 0,
                'status'=>4
            ));
           $affected_row= $this->db->affected_rows(); 
           if(!empty($affected_row))
           {
                $this->load->model('email_model');
                $this->email_model->approved_cancellation_mail($id);
                echo '<script>alert("Cancellation approved successfully")</script>';
           }
           
           
	     }
	     elseif($cancel_request_user_id > 0)
	     {
	        
	        $sql = "SELECT * FROM  buyer_realtor_contract where id='".$id."' and 	cancel_by_buyer=1 ";
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
        			$this->db->where('id', $id);
                    $this->db->update('buyer_realtor_contract', array(
                        'contract_process_initiation' => 0,
                        'status'=>4,
                        "cancel_by_agent"=>1
                    ));
                   $affected_row= $this->db->affected_rows();
                   if(!empty($affected_row))
                   {
                        $this->load->model('email_model');
                        $this->email_model->approved_cancellation_by_realtor_mail($id);
                        echo '<script>alert("Cancellation approved successfully")</script>';
                   }
           
			
			}
			
			else
			{
			    
			    $data=array(
    		"status"=>0,
    		"cancel_by_agent"=>1
    		);
    		
    		$this->db->where('id', $id);
    		$this->db->update('buyer_realtor_contract', $data);
    		$afftectedRows = $this->db->affected_rows();
    		 $this->load->model('email_model');
            $this->email_model->cancellation_approved_by_realtor_mail2($id);
            
            echo '<script>alert("Cancellation approved successfully")</script>';
			    
			    
			}
	        
	        
	        
	        
	        $this->db->where('id', $id);
            $this->db->update('buyer_realtor_contract', array(
               "status"=>0,
    		    "cancel_by_buyer"=>1
            ));
           $affected_row= $this->db->affected_rows(); 
	         
			
		   $JSON_ARR = array(
				'response'=>'Cancellation approved successfully',
				'success'=>1
				);
	
		print json_encode($JSON_ARR);	
			
			
			
	}
	
	
	
	public function deny_cancellation()
    {
		$id=$this->input->get('buyer_realtor_contract_id');
        $cancel_request_user_id=$this->input->get('cancel_request_user_id');
		
		if( empty($id))
		{
			$JSON_ARR= array(
					'response'=>"buyer realtor contract ID is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}
		
		if( empty($cancel_request_user_id))
		{
			$JSON_ARR= array(
					'response'=>"Cancel request user id is required",
					'success'=>0
					);
				print json_encode($JSON_ARR);
				die();
		}	
		
	    
	    if($cancel_request_user_id==0)
	    {
	    
	    
    	     $this->db->where('id', $id);
                $this->db->update('buyer_realtor_contract', array(
                    'contract_process_initiation' => 0,
                    'status'=>0
                ));
                
               $affected_row= $this->db->affected_rows(); 
               if(!empty($affected_row))
               {
                    $this->load->model('email_model');
                    $this->email_model->deny_cancellation_mail($id);
               }    
	    }
	    elseif($cancel_request_user_id > 0)
	    {
	        $data=array(
    		"deny_by_agent"=>1,
    		"contract_process_initiation"=>0
    		);
    		
			
    		$this->db->where('id', $id);
    		$this->db->update('buyer_realtor_contract', $data);
    		$afftectedRows = $this->db->affected_rows();
    		 $this->load->model('email_model');
            $this->email_model->deny_by_agent_mail($id);
            
	    }
		
		$JSON_ARR = array(
				'response'=>'Deny successfully',
				'success'=>1
				);
	
		print json_encode($JSON_ARR);	
			
	
	}
    
	
	/*
	public function get_single_broadcast_data()
        {
            $broad_id=$this->input->post('broad_id');
        	
        	if( empty($broad_id))
            {
                    
                $JSON_ARR= array(
    				'response'=>"Broad ID is required",
    				'success'=>0
    				);
    			print json_encode($JSON_ARR);
                die();
            }
    	    $q="select broadcast_details.id as id,user.name as name, category.name as cat_name, broadcast_details.created_date as c_date,broadcast_details.content_description as cont_description, broadcast_details.broadcast_img as broad_image, broadcast_details.broadcast_video as broadcast_vdo from broadcast_details join user on broadcast_details.user_id=user.user_id join category on broadcast_details.cat_id=category.cat_id";
			$bdata = $this->db->query($q)->result_array();
			$ind_data=array();
    		foreach($bdata as $row){
				if($row['id']==$broad_id){
					$ind_data=$row;
				break;
				}
			}
			//$JSON_ARR[]=$ind_data;
    		$JSON_ARR[]=array(
							'id'=>$ind_data['id'],
							'user_name'=>$ind_data['name'],
							'cat_name'=>$ind_data['cat_name'],
				            'created_data'=>  $ind_data['c_date'],
				            'content_description'=>$ind_data['cont_description'],
				            'broad_image'=>$ind_data['broad_image'],
				            'broad_vdo'=>$ind_data['broad_vdo']	
							);		
				
							
					print json_encode($JSON_ARR);
    		
        }

	public function getmovie($user_id=0)
    {
	  $result_genre= $this->Api_model->get_genre_movie();
	  foreach($result_genre as $row_cat)
	  {
		$result_movie= $this->Api_model->GetAll_MovieOfGenre($row_cat['genre_id']);
		
		$movie_content=[];
		foreach($result_movie as $row_movie)
		{
				$result_ad_time= $this->Api_model->Get_Advertisement_Time($row_movie['movie_id']);
				$adtime_content=[];
				if(!empty($result_ad_time))
				{
    				foreach($result_ad_time as $row_ad_time )
    				{
    				  $adtime_content[]= array(
					 "ad_time_id" => $row_ad_time['id'],
					 "videos_id"=>$row_ad_time['videos_id'],
					 "add_time"=>$row_ad_time['add_time']
				      );	
    				    
    				}
				}
				
				
                    $subtitle_contents=[];				
				  if(!empty($row_movie['subtitle_id'] ))
			       {
    			            $array_subtitles = explode(",", $row_movie['subtitle_id']);
                            foreach($array_subtitles as $array_subtitle )    
    			            {
    			                $subtitle_contents[]=$this->Api_model->get_subtitle($array_subtitle);
    			            }
			       }            
			     
				
				
				
				
				
				$ext = pathinfo($row_movie['url'], PATHINFO_EXTENSION);
				// print_r($adtime_content);
				$movie_content[]= array(
					 "id" => $row_movie['movie_id'],
					 "title"=>$row_movie['title'],
					 "subtitle"=>$subtitle_contents,
					 
					 "audio_track"=>$row_movie['audio_track'],
					 
					 
					 
					 
					 
					 "description_short"=>$row_movie['description_short'],
					 
					 "description_long"=>$row_movie['description_long'],
					 "streamFormat"=>$ext,
					 "movie_url"=>$row_movie['url'],
					 "movie_poster"=>base_url().'assets/global/movie_poster/'.$row_movie['movie_id'].".jpg",
					 "movie_thumb"=>base_url().'assets/global/movie_thumb/'.$row_movie['movie_id'].".jpg",
					 "rating"=>$row_movie['rating'],
					 "advertisement_time"=> $adtime_content 
				   );	
		}
			
			//print_r($row_cat);
			
			$JSON_ARR[] = array(
				"genre_id"=>$row_cat['genre_id'],
				"channel_id"=>1,
				'genre_name'=>$row_cat['name'],
				'contents'=>$movie_content
				);
		
	  }
		$continue_watching=$this->get_watch_later_video($user_id);
		
		//$new_released=$this->Api_model->new_released();
		
		$new_released=$this->get_new_released_video();
		
		$ALL_JSON_ARR = array(
				'launch'=>'Movie',
				'continue_watching'=>$continue_watching,
				'new_released'=>$new_released,
				'contents'=>$JSON_ARR
				);
		print json_encode($ALL_JSON_ARR);
		//print json_encode($JSON_ARR);

	 
	}  
	
	*/
	
	
}
