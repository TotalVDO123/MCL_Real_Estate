<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
        date_default_timezone_set(ovoo_config('timezone'));
        
        
        
        
    }

    function test_mail($email = NULL)
	{	
		//var_dump($email,$token);
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$email_sub		=	"Test Mail";
		$email_to		=	$email;
		$admin_email_from 	=	NULL;
		$test_message ='Email Configuration is Perfect..';
		$send_mail = $this->send_email($test_message , $email_sub , $email_to, $admin_email_from, $admin_email);			
		if($send_mail==TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function send_confirmation_to_subscriber($email = NULL)
	{	
		//var_dump($email,$token);
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$email_sub		=	"Subscription successfuly";
		$email_to		=	$email;
		$admin_email_from 	=	NULL;
		//$test_message ='Subscription successfuly..';
		include(APPPATH.'views/email_templete/send_confirmation_to_subscriber.php');
		$send_mail = $this->send_email($welcome_message , $email_sub , $email_to, $admin_email_from, $admin_email);			
		if($send_mail==TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	function account_opening_email($email = '', $password='')
	{	
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$email_sub		=	"Welcome to ".$site_name;
		$email_to		=	$email;
		$admin_email_from 	=	NULL;
		include(APPPATH.'views/email_templete/account_opening_email.php');
		//message,subject,to,from,replay_to
		$welcome_mail=$this->send_email($welcome_message , $email_sub , $email_to, $admin_email_from, $admin_email);			
		if($welcome_mail==TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	function contact_email($name = '' , $email = '', $message='')
	{
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email_sub 	= 	'Contact Message( '.$email.' )';
		$client_email_sub 	= 	'Contact Message Send';
		$admin_email_from 	=	NULL;
		$client_name 		= 	$name;
		$client_email 		= 	$email;
		$client_message 	= 	$message;
		include(APPPATH.'views/email_templete/contact_message.php');
		//message,subject,to,from,replay_to
		$admin_mail=$this->send_email($admin_message , $admin_email_sub , $admin_email, $admin_email_from, $client_email);
		include(APPPATH.'views/email_templete/contact_response.php');
		//message,subject,to,from,replay_to
		$client_mail=$this->send_email($client_message , $client_email_sub , $client_email, $admin_email_from, $admin_email);			
		if($admin_mail==TRUE && $client_mail==TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	function send_movie_request($name = '' , $email = '', $message='',$movie_name='')
	{
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email_sub 	= 	'Movie Request ( '.$movie_name.' )';
		$client_email_sub 	= 	'Movie Request Sent';
		$movie_request_email=	$this->db->get_where('config' , array('title' => 'movie_request_email'))->row()->value;
		$admin_email 		= 	!empty(trim($movie_request_email)) ? $movie_request_email : $admin_email;
		$admin_email_from 	=	NULL;
		$client_name 		= 	$name;
		$client_email 		= 	$email;
		$client_message 	= 	$message;
		include(APPPATH.'views/email_templete/movie_requiest.php');
		//message,subject,to,from,replay_to
		$admin_mail = $this->send_email($admin_message , $admin_email_sub , $admin_email, $admin_email_from, $client_email);
		// include(APPPATH.'views/email_templete/contact_response.php');
		// //message,subject,to,from,replay_to
		$client_mail  = $this->send_email($client_message , $client_email_sub , $client_email, $admin_email_from, $admin_email);			
		if($admin_mail==TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}

    function contract_email($buyer_id=0,$contract_id=0,$user_id=0)
    {
        $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	"Buyer Agreement ".$site_name;
		
		$admin_email_from 	=	'support@multipleclientlist.com';
		
		$user_details = $this->db->get_where('user', array('user_id' => $user_id))->result_array();
		$relator_cc_email=$user_details[0]['email'];
		$relator_name=	$user_details[0]['first_name']." ".$user_details[0]['last_name'];
		
		//////buyer details////////////
		$buyers_details = $this->db->get_where('buyers', array('id' => $buyer_id))->result_array();
		$buyer_name=	$buyers_details[0]['name'];
		$email_to=	$buyers_details[0]['email'];
		
		$message.=	"Dear ".ucfirst($buyer_name).",<br><br>";
	   $message.="A Buyer Agreement has been created by ".$relator_name." in the MCL System.<br>";
	   $message.="To view the details of the contract please click <a href='".base_url()."user/view_buyercontract/".$contract_id."' >Here</a><br>";
	   
	   $message.="To cancel the contract please click here <a href='".base_url()."user/viewcontract/".$contract_id."'>Here</a><br><br>";

	   $message.="This is a system generated email, please do not reply to this email. Please contact<br>";
	   $message.="<a href='mailto:support@multipleclientlist.com'>support@multipleclientlist.com</a> in case of any issues.<br><br>";
       $message.="Thanks,<br>"; 
       $message.="MCL Team";    
	   $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email,1,$relator_cc_email);					
       
        
    }

    function send_otp_email($user_id=0)
    {
        
        $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	"OTP Verification ".$site_name;
		
		$admin_email_from 	=	'support@multipleclientlist.com';
        
        
        $user_details = $this->db->get_where('user', array('user_id' => $user_id))->result_array();
		
		$user_email=$user_details[0]['email'];
		
		$email_to		=	$user_email;	
		
	    $message.=	"Dear ".ucfirst($user_details[0]['first_name']." ".$user_details[0]['last_name']).",<br><br>";
	   $message.="The OTP for your registration with MCL is ".$user_details[0]['verify_otp']."<br><br>";
	 
	   
	   $message.="This is a system generated email, please do not reply to this email. Please contact<br>";
	   ///$message.="<support@multipleclientlist.com> in case of any issues.<br><br><br><br>";
	   
	   $message.="<a href='mailto:support@multipleclientlist.com'>support@multipleclientlist.com</a> in case of any issues.<br><br>";
       $message.="Thanks,<br>"; 
       $message.="MCL Team";

	$send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);				
        
      
        
    }


    function approved_cancellation_mail($id=0)
    {
        $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	"Approved cancellation requests ".$site_name;
		$admin_email_from 	=	'support@multipleclientlist.com';
	    
	    $sql = "SELECT B.email as buyer_email, B.name as buyer_name, U.first_name,U.last_name,U.email as user_email ,BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.id=B.buyer_realtor_contract_id
		where BC.id='".$id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{	
		
		    $contract_result = $res->result_array(); 
			$email_to=$contract_result[0]['buyer_email'];
		    $relator_cc_email=$contract_result[0]['user_email'];
		     $message.=	"Dear ".ucfirst($contract_result[0]['buyer_name']).",<br><br>";
		     
		     $message.="The cancellation request submitted by you for the contract <a href='".base_url()."user/view_buyercontract/".$id."' >Here</a> has been<br>";
		     $message.="approved by the realtor <strong>". $contract_result[0]['first_name']." ".$contract_result[0]['last_name']. "</strong>, and the contract stands cancelled as of today.<br>";
             $message.="Please contact the realtor if this process was not initiated by you.<br><br>";
             $message.="This is a system generated email, please do not reply to this email. Please contact<br>";
	        
	         $message.="<a href='mailto:support@multipleclientlist.com'>support@multipleclientlist.com</a> in case of any issues.<br><br>";
             $message.="Thanks,<br>"; 
             $message.="MCL Team";
		     
		     
		     
	  
        $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email,1,$relator_cc_email);
			
			
			
			
			
		
		}
        
    }

    
    
    function deny_cancellation_mail($id=0)
    {
        $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	"Deny cancellation requests ".$site_name;
		$admin_email_from 	=	'support@multipleclientlist.com';
	    
	    $sql = "SELECT B.email as buyer_email, B.name as buyer_name, U.first_name,U.last_name,U.email as user_email ,BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.id=B.buyer_realtor_contract_id
		where BC.id='".$id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{	
		
		    $contract_result = $res->result_array(); 
			$email_to=$contract_result[0]['buyer_email'];
		    $relator_cc_email=$contract_result[0]['user_email'];
		     $message.=	"Dear ".ucfirst($contract_result[0]['buyer_name']).",<br><br>";
		     
		     $message.="The cancellation request submitted by you for the contract <a href='".base_url()."user/view_buyercontract/".$id."' >Here</a> has been<br>";
		     $message.="denied by the realtor <strong>". $contract_result[0]['first_name']." ".$contract_result[0]['last_name']. "</strong>, and the contract has been put to pending status.<br>";
             $message.="Please contact the realtor for further discussions.<br><br>";
             
             $message.="This is a system generated email, please do not reply to this email. Please contact<br>";
	         $message.="<a href='mailto:support@multipleclientlist.com'>support@multipleclientlist.com</a> in case of any issues.<br><br>";
             $message.="Thanks,<br>"; 
             $message.="MCL Team";
		     
		     
		     
	  
        $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email,1,$relator_cc_email);
			
			
			
			
			
		
		}
        
    }

    
    
	function password_reset_email($email = NULL,$password="")
	{	
		//var_dump($email,$token);
		
		
		$site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	"Password recovery ".$site_name;
		$email_to		=	$email;
		$admin_email_from 	=	'support@multipleclientlist.com';
		
		//include(APPPATH.'views/email_templete/password_reset_email.php');
		//message,subject,to,from,replay_to
		
		$user_details = $this->db->get_where('user', array('email' => $email))->result_array();
		$full_name=ucfirst($user_details[0]['first_name']." ".$user_details[0]['last_name']);
		
		$new_password = substr(rand(100000000, 20000000000), 0, 7);
        	
			$this->db->update('user', array('password' => md5($new_password)), array('email'=>$email));
		
		
		$message.=	"Dear ".$full_name."<br><br>";
		$message.="You have initiated the password reset process for MCL application<br><br>";
        $message.="Your new password to login to the application is :".$new_password."<br><br>";
        
        $message.="Thanks,<br>"; 
        $message.="MCL Team";
	
		
		
		$send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);
		
		
		
		//$send_mail = $this->sendmail($admin_email , $email_sub , 'test test test test');
		
		if($send_mail==TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}



    public function cancellation_by_realtor_mail($id)
    {
        $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	" Realtor request for cancellation of this contract ".$site_name;
		$admin_email_from 	=	'support@multipleclientlist.com';
	    
	    
	    $fullname="";
	    $sql_1 = "SELECT U.first_name,U.last_name FROM  buyer_realtor_contract BC 
		left join  user U on BC.cancel_request_user_id=U.user_id 
		where BC.id='".$id."'";
	    
	    $res_1 = $this->db->query($sql_1);
		if ($res_1->num_rows() > 0) 
		{	
	        $contractuserresult = $res_1->result_array(); 
	        
	        $fullname=ucfirst($contractuserresult[0]['first_name']." ".$contractuserresult[0]['last_name']);
		}
		
		
		
	    
	    $sql = "SELECT B.email as buyer_email, B.name as buyer_name, U.first_name,U.last_name,U.email as user_email ,BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.id=B.buyer_realtor_contract_id
		where BC.id='".$id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{	
		
		    $contract_result = $res->result_array(); 
			$email_to=$contract_result[0]['buyer_email'];
		    $relator_cc_email=$contract_result[0]['user_email'];
		     $message.=	"Dear ".ucfirst($contract_result[0]['buyer_name']).",<br><br>";
		     
		     $message.="A contract cancellation request has been initiated by <strong>".$fullname."</strong> and is pending for your action.<br><br>";
		     
		     $message.="Please take neccessary action to approve or deny the request.<br><br>";

             $message.="To approve the request, please click <a href='".base_url()."user/viewcontract_for_buyer/".$id."/1' >Here</a><br>";
             $message.="To deny the request, please click <a href='".base_url()."user/viewcontract_for_deny/".$id."/1' >Here</a><br><br>";

             $message.="Thanks,<br>"; 
             $message.="MCL Team";
            $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);
			
			
			$message2.=	"Dear Realtor, <br><br>";
			$message2.="A contract cancellation request has been initiated and is pending for your action.<br><br>";
			$message2.="Please check your cancel contract dashboard for more details.<br><br>";
			$message2.="Thanks,<br>"; 
            $message2.="MCL Team";
			
		    $send_mail = $this->send_email($message2 , $email_sub , $relator_cc_email, $admin_email_from, $admin_email);	
			
        
    }
    }
	
	public function cancellation_approved_by_buyer_mail($id=0)
	{
	    $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	" Cancellation approved by buyer ".$site_name;
		$admin_email_from 	=	'support@multipleclientlist.com';
		
		
		$email1="";
		
		$sql_1 = "SELECT U.first_name,U.last_name,U.email FROM  buyer_realtor_contract BC 
		left join  user U on BC.cancel_request_user_id=U.user_id 
		where BC.id='".$id."'";
	    
	    $res_1 = $this->db->query($sql_1);
		if ($res_1->num_rows() > 0) 
		{	
	        $contractuserresult = $res_1->result_array(); 
	        
	        $email1=$contractuserresult[0]['email'];
		}
	    $email2="";
	     $sql = "SELECT B.email as buyer_email, B.name as buyer_name, U.first_name,U.last_name,U.email as user_email ,BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.id=B.buyer_realtor_contract_id
		where BC.id='".$id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{	
		
		    $result = $res->result_array(); 
			$email2=$result[0]['user_email'];
		}
	    
	    $email_to=$email1.",".$email2;
	    
	    $message.="Dear Realtor,<br><br>";

        $message.="The cancellation request for contract <a href='".base_url()."user/viewcontract_for_buyer/".$id."' >Here</a> has been approved by buyer ".ucfirst( $result[0]['user_email']."<br><br>");
        $message.="Thanks,<br>"; 
        $message.="MCL Team";
        $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);	
 
	    
	    
	}
	
	
	
	public function approved_cancellation_by_realtor_mail($id=0)
	{
	    
	    $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	" Cancellation approve by relator ".$site_name;
		$admin_email_from 	=	'support@multipleclientlist.com';
		
		
		 $sql = "SELECT B.email as buyer_email, B.name as buyer_name, U.first_name,U.last_name,U.email as user_email ,BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.id=B.buyer_realtor_contract_id
		where BC.id='".$id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{	
		
		    $contract_result = $res->result_array(); 
			$email_to=$contract_result[0]['buyer_email'];
			$relator_name=ucfirst($contract_result[0]['first_name']." ".$contract_result[0]['last_name']);
	        
	        $message.="Dear Buyer,<br><br>";
		    $message.="The cancellation request for contract <a href='".base_url()."user/viewcontract_for_buyer/".$id."' >Here</a> has been approved by relator ".$relator_name."<br><br>";
		    $message.="Thanks,<br>"; 
            $message.="MCL Team";
		    $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);	
	    }
	    $this->approve_mail_send_to_third_party_realtor($id);
    }   
	    
	 
	 public function approve_mail_send_to_third_party_realtor($id=0)
	 {
	    $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	    "Cancellation approve raised by relator ".$site_name;
		$admin_email_from 	=	'support@multipleclientlist.com';
	     
	    $sql_1 = "SELECT U.first_name,U.last_name,U.email FROM  buyer_realtor_contract BC 
		left join  user U on BC.cancel_request_user_id=U.user_id 
		where BC.id='".$id."'";
	    
	    $res_1 = $this->db->query($sql_1);
		if ($res_1->num_rows() > 0) 
		{	
	        $contractuserresult = $res_1->result_array(); 
	        
	        $email_to=$contractuserresult[0]['email'];
		 
	     
	     $message.="Dear Realtor,<br><br>";
	     $message.="The cancellation request raised by you has been approved. The contract stands cancelled now.<br><br>";
	     $message.="Thanks,<br>";
	     $message.="MCL Team";
        $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);	
		}
	 }
	
	
	public function cancellation_approved_by_realtor_mail2($id=0)
	{
	     $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	" Cancellation approve by relator ".$site_name;
		$admin_email_from 	=	'support@multipleclientlist.com';
		
		
		 $sql = "SELECT B.email as buyer_email, B.name as buyer_name, U.first_name,U.last_name,U.email as user_email ,BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.id=B.buyer_realtor_contract_id
		where BC.id='".$id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{	
		
		    $contract_result = $res->result_array(); 
			$email_to=$contract_result[0]['buyer_email'];
			$relator_name=ucfirst($contract_result[0]['first_name']." ".$contract_result[0]['last_name']);
	        
	        $message.="Dear Buyer,<br><br>";
		    $message.="The cancellation request for contract <a href='".base_url()."user/viewcontract_for_buyer/".$id."' >Here</a> has been approved by relator ".$relator_name."<br><br>";
		    $message.="Thanks,<br>"; 
            $message.="MCL Team";
		    $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);	
	    }
	    
	    
	    
	}
	
	public function deny_by_buyer_mail($id=0)
	{
	    $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	"  Denied by buyer ".$site_name;
		$admin_email_from 	=	'support@multipleclientlist.com';
		
		
			$sql_1 = "SELECT U.first_name,U.last_name,U.email FROM  buyer_realtor_contract BC 
		left join  user U on BC.cancel_request_user_id=U.user_id 
		where BC.id='".$id."'";
	    
	    $res_1 = $this->db->query($sql_1);
		if ($res_1->num_rows() > 0) 
		{	
	        $contractuserresult = $res_1->result_array(); 
	        
	        $email1=$contractuserresult[0]['email'];
		}
	    $email2="";
	     $sql = "SELECT B.email as buyer_email, B.name as buyer_name, U.first_name,U.last_name,U.email as user_email ,BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.id=B.buyer_realtor_contract_id
		where BC.id='".$id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{	
		
		    $result = $res->result_array(); 
			$email2=$result[0]['user_email'];
		}
	    
	    $email_to=$email1.",".$email2;
	    $message.="Dear Realtor,<br><br>";
	    $message.="The cancellation request for contract <a href='".base_url()."user/viewcontract_for_deny/".$id."' >Here</a> has been denied by buyer.<br><br>";
	    
	    $message.="Thanks,<br>"; 
        $message.="MCL Team";
        $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);	
		
		
		
	}
	
	public function deny_by_agent_mail($id=0)
	{
	    $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	"  Denied by realtor ".$site_name;
		$admin_email_from 	=	'support@multipleclientlist.com';
		
		
		$sql_1 = "SELECT U.first_name,U.last_name,U.email FROM  buyer_realtor_contract BC 
		left join  user U on BC.cancel_request_user_id=U.user_id 
		where BC.id='".$id."'";
	    
	    $res_1 = $this->db->query($sql_1);
		if ($res_1->num_rows() > 0) 
		{	
	        $contractuserresult = $res_1->result_array(); 
	        
	        $email1=$contractuserresult[0]['email'];
		}
	    $email2="";
	     $sql = "SELECT B.email as buyer_email, B.name as buyer_name, U.first_name,U.last_name,U.email as user_email ,BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.id=B.buyer_realtor_contract_id
		where BC.id='".$id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{	
		
		    $result = $res->result_array(); 
			$email2=$result[0]['buyer_email'];
		}
	    
	    $email_to=$email1.",".$email2;
	    $message.="Dear Realtor,<br><br>";
	    $message.="The cancellation request for contract <a href='".base_url()."user/viewcontract_for_deny/".$id."' >Here</a> has been denied by realtor.<br><br>";
	    
	    $message.="Thanks,<br>"; 
        $message.="MCL Team";
        $send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);	

	}
	
	
	function send_user_activation_email($user_id=0)
    {
        
        $site_name			=	'multipleclientlist.com';
		$admin_email		=	'support@multipleclientlist.com';
		$system_name		=	'test';
		$email_sub		=	"User Activation ".$site_name;
		
		$admin_email_from 	=	'support@multipleclientlist.com';
        
        
        $user_details = $this->db->get_where('user', array('user_id' => $user_id))->result_array();
		
		$user_email=$user_details[0]['email'];
		
		$email_to		=	$user_email;	
		
	   $message.=	"Dear ".ucfirst($user_details[0]['first_name']." ".$user_details[0]['last_name']).",<br><br>";
	   $message.="Your account has been activated successfully<br><br>";
	 
	   
	   $message.="This is a system generated email, please do not reply to this email. Please contact<br>";
	   ///$message.="<support@multipleclientlist.com> in case of any issues.<br><br><br><br>";
	   
	   $message.="<a href='mailto:support@multipleclientlist.com'>support@multipleclientlist.com</a> in case of any issues.<br><br>";
       $message.="Thanks,<br>"; 
       $message.="MCL Team";

	$send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);				
        
      
        
    }

	
	
	
	
	
	public function sendmail($to_send_mail='',$subject='',$message='')
	{
		if(!empty($to_send_mail))
		{
			require_once(APPPATH.'libraries/smtp/smtp_ini.php');
		//$mail = new PHPMailer(true);
			$mail = new PHPMailer\PHPMailer\PHPMailer(); 
		
		 //$mail->SMTPDebug = SMTP::DEBUG_SERVER;       
			$mail->IsSMTP(); // enable SMTP

			$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; // or 587
			
			// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
			$mail->IsHTML(true);
			$mail->Username = "ratneshk500@gmail.com";
			$mail->Password = "Ratnesh@123";
			
			$mail->SetFrom("ratneshk500@gmail.com");
			$mail->Subject = $subject;
			$mail->Body = $message;
			$mail->AddAddress($to_send_mail);	
			$mail->Send();	
	
		}
	}
	
	
	
	

	function android_password_reset_email($email = '', $password = '')
	{	
		//var_dump($email,$token);
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$email_sub		=	"[IMPORTANT] Password recovery - ".$site_name;
		$email_to		=	$email;
		$admin_email_from 	=	NULL;
		include(APPPATH.'views/email_templete/android_password_reset_email.php');
		//message,subject,to,from,replay_to
		
		$send_mail = $this->send_email($password_reset_message , $email_sub , $email_to, $admin_email_from, $admin_email);			
		if($send_mail==TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function password_reset_confirmation($email = NULL)
	{	
		//var_dump($email,$token);
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$email_sub		=	"Password has changed..";
		$email_to		=	$email;
		$admin_email_from 	=	NULL;
		include(APPPATH.'views/email_templete/password_reset_confirmation.php');
		//message,subject,to,from,replay_to
		
		$send_mail = $this->send_email($password_reset_confirmation , $email_sub , $email_to, $admin_email_from, $admin_email);			
		if($send_mail==TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function new_movie_notification($video_id = NULL)
	{	
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$video 				= 	$this->db->get_where('videos', array('videos_id' => $video_id))->row();
		$logo				= 	base_url('uploads/system_logo/logo.png');
		$thumb_image		= 	$this->common_model->get_video_thumb_url($video->videos_id);
		$actor 				= 	$this->common_model->convert_star_ids_to_names($video->stars);
		$director			= 	$this->common_model->convert_star_ids_to_names($video->director);
		$watch_url			=	base_url().'watch/'.$video->slug;		
		$email_sub			=	"New Movie [ ".$video->title." ] Waiting for You.";
		$admin_email_from 	=	NULL;
		include(APPPATH.'views/email_templete/new_movie.php');
		
		$subscribers = $this->db->get_where('user', array('role'=>'subscriber'))->result_array();
        foreach ($subscribers as $subscriber){
        	$email_to = $subscriber['email'];
        	$send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);
        }
		return TRUE;
	}

	function create_newslater_cron($video_id = NULL)
	{	
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$video 				= 	$this->db->get_where('videos', array('videos_id' => $video_id))->row();
		$logo				= 	base_url('uploads/system_logo/logo.png');
		$thumb_image		= 	$this->common_model->get_video_thumb_url($video->videos_id);
		$actor 				= 	$this->common_model->convert_star_ids_to_names($video->stars);
		$director			= 	$this->common_model->convert_star_ids_to_names($video->director);
		$watch_url			=	base_url().'watch/'.$video->slug;		
		$email_sub			=	"New Movie [ ".$video->title." ] Waiting for You.";
		$admin_email_from 	=	NULL;
		include(APPPATH.'views/email_templete/new_movie.php');
		
		$subscribers = $this->db->get_where('user', array('role'=>'subscriber'))->result_array();
        foreach ($subscribers as $subscriber){
        	$email_to = $subscriber['email'];
        	$cron_data['type'] 				= "email";
        	$cron_data['action'] 			= "send";
        	$cron_data['admin_email'] 		= $admin_email;
        	$cron_data['admin_email_from'] 	= $admin_email_from;
        	$cron_data['email_to'] 			= $email_to;
        	$cron_data['email_sub'] 		= $email_sub;
        	$cron_data['message'] 			= $message;
        	$this->db->insert('cron',$cron_data);
        }
		return TRUE;
	}

	function send_push_notification($video_id = NULL)
	{	
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$video 				= 	$this->db->get_where('videos', array('videos_id' => $video_id))->row();
		$logo				= 	base_url('uploads/system_logo/logo.png');
		$thumb_image		= 	$this->common_model->get_video_thumb_url($video->videos_id);
		$actor 				= 	$this->common_model->convert_star_ids_to_names($video->stars);
		$director			= 	$this->common_model->convert_star_ids_to_names($video->director);
		$watch_url			=	base_url().'watch/'.$video->slug;		
		$email_sub			=	"New Movie [ ".$video->title." ] Waiting for You.";
		$admin_email_from 	=	NULL;
		include(APPPATH.'views/email_templete/new_movie.php');
		
		$subscribers = $this->db->get_where('user', array('role'=>'subscriber'))->result_array();
        foreach ($subscribers as $subscriber){
        	$email_to = $subscriber['email'];
        	$cron_data['type'] 				= "email";
        	$cron_data['action'] 			= "send";
        	$cron_data['admin_email'] 		= $admin_email;
        	$cron_data['admin_email_from'] 	= $admin_email_from;
        	$cron_data['email_to'] 			= $email_to;
        	$cron_data['email_sub'] 		= $email_sub;
        	$cron_data['message'] 			= $message;
        	$this->db->insert('cron',$cron_data);
        	//$send_mail = $this->send_email($message , $email_sub , $email_to, $admin_email_from, $admin_email);
        }
		return TRUE;
	}



	//send_email($msg='hello', $sub='test', $to='cvcv@hdfd.com', $from=NULL, $replay_to=NULL)
	/***custom email sender****/
	function send_email($msg='', $sub=NULL, $to=NULL, $from=NULL, $replay_to=NULL,$cc=0,$cc_email="")
	{
		
		$config = array();
		$config['useragent']	= "CodeIgniter";
		$protocol		=	$this->db->get_where('config' , array('title' => 'protocol'))->row()->value;
		
		if($protocol=='smtp'){
			$config['protocol']		= "smtp";
			$smtp_crypto			=	$this->db->get_where('config' , array('title' => 'smtp_crypto'))->row()->value;
        	$config['smtp_crypto']	= $smtp_crypto;
        	$smtp_host				=	$this->db->get_where('config' , array('title' => 'smtp_host'))->row()->value;
        	$config['smtp_host']	= $smtp_host;
        	$smtp_user				=	$this->db->get_where('config' , array('title' => 'smtp_user'))->row()->value;
        	$config['smtp_user']	= $smtp_user;
        	$smtp_pass				=	$this->db->get_where('config' , array('title' => 'smtp_pass'))->row()->value;
        	$config['smtp_pass']	= $smtp_pass;
        	$smtp_port				=	$this->db->get_where('config' , array('title' => 'smtp_port'))->row()->value;
        	$config['smtp_port']	= $smtp_port;
        	$config['smtp_timeout']	= "30";
		}else{
			$config['protocol']		= "sendmail";
			$config['mailpath']		= "/usr/sbin/sendmail"; // or "/usr/sbin/sendmail" 
		}       
        $config['mailtype']		= 'html';
        $config['charset']		= 'utf-8';
        $config['newline']		= "\r\n";
        $config['wordwrap']		= TRUE;
        $this->load->library('email');
        $this->email->initialize($config);
        if($sub == NULL || $sub =='')
        	$sub = 'No Subject';
		//if($from == NULL)
		//	$from		=	$this->db->get_where('config' , array('title' => 'system_email'))->row()->value;
		//$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		
		//$from='ratneshk500@gmail.com';
		//echo "==".$from ." ".$system_name;
		$system_name="MCL";
		$this->email->from($from, $system_name);
		$this->email->to($to);
		
		if($cc==1)
		{
		$this->email->cc($cc_email);
		}
		if($replay_to != NULL)
			$this->email->reply_to($replay_to);
		$this->email->subject($sub);		
		$this->email->message($msg);		
		//echo "====".$to;
		///echo "=====". $this->email->send();
		//echo $this->email->print_debugger();
		///exit;
		
		if($this->email->send()){
			return TRUE;
		}else{
			return FALSE;
		}		
	}

	function send_movie_report_to_admin($video_id="", $message=array())
	{
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$admin_email		=	$this->db->get_where('config' , array('title' => 'contact_email'))->row()->value;
		$system_name		=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$video 				= 	$this->db->get_where('videos', array('videos_id' => $video_id))->row();
		$email_sub 			= 	'New Movie Report ( '.$video->title.' )';
		$email_from 		=	NULL;
		$client_name 		= 	"Abdul Mannan";
		$movie_report_email	=	$this->db->get_where('config' , array('title' => 'movie_report_email'))->row()->value;
		$email 				= 	!empty(trim($movie_report_email)) ? $movie_report_email : $admin_email;
		$video_msg 			= 	'Not Specified';
		$audio_msg 			= 	'Not Specified';
		$subtitle_msg 		= 	'Not Specified';
		$client_message		=   'Not Specified';
		$message_msg		=   'Not Specified';
		if(isset($message['video'])){
			$video_msg 			= 	$message['video'];
		}
		if(isset($message['audio'])){
			$audio_msg 			= 	$message['audio'];
		}
		if(isset($message['subtitle'])){
			$subtitle_msg 			= 	$message['subtitle'];
		}
		if(isset($message['message'])){
			$message_msg 			= 	$message['message'];
		}
		include(APPPATH.'views/email_templete/report_message.php');

		$report_mail =	$this->send_email($message , $email_sub , $email, $email_from, $admin_email);
		return true;
	}
}

