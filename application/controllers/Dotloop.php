<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


 
class Dotloop extends Home_Core_Controller{
    
    
    function __construct(){
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }
	
    //Default function, redirects to logged in user area
   public function index() 
   {
        if ($this->session->userdata('login_status') == 1)
            redirect(base_url() . 'user/profile', 'refresh');
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
    }
    
	public function add_buyer_dotloop() 
   {
	
	$dotloop_token=$this->session->userdata('dotloop_token');
	
	$dotloop_profile_id=$this->session->userdata('dotloop_profile_id');
	
	
		$buyer_name=$this->input->post('primary_buyer_name');
		$buyer_email=$this->input->post('buyer_email');
		$buyer_phone=$this->input->post('buyer_phone');
		///$loop_name=$buyer_name."_".$buyer_phone."_".$buyer_email;

		$loop_name=$buyer_name;

	/* create loop from curl with help of profile id  */

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		  "name": "'.$loop_name.'",
		  "status": "UNDER_CONTRACT",
		  "transactionType": "PURCHASE_OFFER"
		}',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$dotloop_token,
			'Content-Type: application/json'
		  ),
		));

		$loop_response = curl_exec($curl);
		
		curl_close($curl);
		
		$loop=json_decode($loop_response);
		
		//print_r($loop);
		//exit;
		
		$dotloop_id= $loop->data->id;
		///echo "===============".$dotloop_id;

///****************Contract Info type*************************************

$contract_type=$this->input->post('contract_type');

$ch = curl_init();
curl_setopt_array($ch, array(
  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop/'.$dotloop_id.'/detail',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PATCH',
  CURLOPT_POSTFIELDS =>'{
     "Contract Info": {
     "Type":"'.$contract_type.'"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$dotloop_token,
    'Content-Type: application/json'
  ),
));

curl_exec($ch);
curl_close($ch);




//*********************************************************


///****************Contract Info type*************************************

$start_date=$this->input->post('start_date');

$end_date=$this->input->post('end_date');



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop/'.$dotloop_id.'/detail',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PATCH',
  CURLOPT_POSTFIELDS =>'{
     "Contract Dates": {
		"Contract Agreement Date": "'.$start_date.'",   
		"Closing Date": "'.$end_date.'"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$dotloop_token,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);




//*********************************************************






		/* add buyer ( participant) 	*/
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop/'.$dotloop_id.'/participant',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  
		  CURLOPT_POSTFIELDS =>'{
		  "fullName": "'.$buyer_name.'",
		  "email": "'.$buyer_email.'",
		  "role": "BUYER",
		  "Phone": "'.$buyer_phone.'"
		}',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$dotloop_token,
			'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		
		
		
		
		if(!empty($dotloop_id))
		{
			$this->session->set_flashdata('success', 'Buyer has been saved successfully.');
		}	
		else
		{
			$this->session->set_flashdata('error', "Something went wrong!!");
		}	
		
		redirect(base_url() . 'home/add_buyer', 'refresh');
		
		


   }



	function dashboard()
	{

	$dotloop_profile_id=$this->session->userdata('dotloop_profile_id');	
	 echo $dotloop_token=$this->session->userdata('dotloop_token');	
	$this->session->set_userdata('show_cancel_button',0);
	$this->session->set_userdata('show_approved_button',1);

	
		
	$curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	  CURLOPT_HTTPHEADER => array(
		'Authorization: Bearer '.$dotloop_token
	  ),
	));

	$response_loop = curl_exec($curl);
	curl_close($curl);
	$dotloop_loop=json_decode($response_loop);
	
	$data['loops']=$dotloop_loop->data;
		
		 //print_r($data['loops']);
        ///exit; 	

        	$data['page_name']             = 'dotloop_dashboard';
        	$data['page_title']            = 'User Dashboard';
        	//$this->load->view('user/index', $data);
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
	}
	
	
	function user_active_contracts($trans_status="")
	{
		
		$dotloop_profile_id=$this->session->userdata('dotloop_profile_id');	
	$dotloop_token=$this->session->userdata('dotloop_token');	
			
		
	$curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop?batch_size=100&batch_number=1&sort=default&filter=transaction_status='.$trans_status.'&include_details=true',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	  CURLOPT_HTTPHEADER => array(
		'Authorization: Bearer '.$dotloop_token
	  ),
	));

	$response_loop = curl_exec($curl);
	curl_close($curl);
	$dotloop_loop=json_decode($response_loop);
	
	$data['loop_details']="";
	if(!empty($dotloop_loop->data))
	{	
	$data['loop_details']=$dotloop_loop->data;
	}
		
		
		$data['trans_status']=$trans_status;
		$data['page_name']             = 'dashboard_dotloop_user_active_contract';
        $data['page_title']            = 'Active Contract List';
		$data['show_cancel_button']            = 0;
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	
	}
    
	function view_buyercontract($loop_id=0,$trans_status="")
	{
			
		$sql = " select * from user where  user_id ='".$this->session->userdata('user_id')."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$data['user_details'] = $res->result_array();
		}	
		
		
			$dotloop_profile_id=$this->session->userdata('dotloop_profile_id');	
			$dotloop_token=$this->session->userdata('dotloop_token');	
			  $curl = curl_init();
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop/'.$loop_id.'/detail',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET',
			  CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$dotloop_token
			  ),
			));

			$response_loop = curl_exec($curl);
			curl_close($curl);
			$dotloop_loop=json_decode($response_loop);
			
			$data['loop_details']="";
			if(!empty($dotloop_loop->data))
			{	
			$data['loop_details']=$dotloop_loop->data;
			}
			$data['trans_status']=$trans_status;
			$data['show_button']=1;
			$data['page_name']             = 'view_dotloop_buyer_contract';
        	$data['page_title']            = 'View buyer contract';
        	///$this->load->view('user/index', $data);
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
	}
	
	
	
	function cancel_contract()
	{
	 $dotloop_profile_id=$this->session->userdata('dotloop_profile_id');	
	 $dotloop_token=$this->session->userdata('dotloop_token');	
	
	  $this->session->set_userdata('show_cancel_button',1);
	  $this->session->set_userdata('show_approved_button',0);	
	
		
		
		$curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$dotloop_token
		  ),
		));

		$response_loop = curl_exec($curl);
		curl_close($curl);
		$dotloop_loop=json_decode($response_loop);
	
		$data['loops']=$dotloop_loop->data;
		
		 //print_r($data['loops']);
        ///exit; 	
		
		$data['title'] = 'Cancel Contract';
		$data['page_name']='dotloop_cancel_contract';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	
	}

	
	function link_with_dotloop()
	{
		
		
		
		
		
	}
	
	
	
}
