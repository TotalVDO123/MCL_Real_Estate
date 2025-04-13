<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class User extends Home_Core_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('google');
        $this->load->library('facebook');
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    // index function
    public function index() {
        if ($this->session->userdata('login_status') == 1)
            redirect(base_url() . 'user/manage_profile', 'refresh');
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
    }

    // login function
    public function login() {
        if ($this->session->userdata('login_status') == 1)
            redirect(base_url() . 'user/manage_profile', 'refresh');
        $data['page_name']      = 'signin';
        $data['title']          = 'Login';
		
        //$data['facebook_login_url'] =  $this->facebook->login_url();        
        $this->load->view('theme/'.$this->active_theme.'/index',$data);
    }

    // signup function
    
	
	public function registration() {

        if ($this->session->userdata('login_status') == 1)
            redirect(base_url() . 'user/manage_profile', 'refresh');
			$data['states']     = $this->db->get('states')->result_array();
			$data['broker_record']        	= $this->db->get_where('user' , array('role'=>'broker_record'))->result_array();
			$data['page_name']      = 'signup';
			$data['title']          = 'Signup';
		
        //$data['facebook_login_url'] =  $this->facebook->login_url();        
        $this->load->view('theme/'.$this->active_theme.'/index',$data);
    }

	
	
	
	
	
	public function registration1() {
        if ($this->session->userdata('login_status') == 1)
            redirect(base_url() . 'user/manage_profile', 'refresh');
        if($this->active_theme == 'flix'):
            $data['page_name']      = 'signup';
        else:
            $data['page_name']      = 'login';
        endif;
        $data['title']          = 'Login | Signup';
        $this->load->library('google');
        $data['facebook_login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('user/facebook_login'), 
                'scope' => array("email") // permissions here
            ));
        $data['login_url']      = $this->google->login_url();
        //$data['facebook_login_url'] =  $this->facebook->login_url();        
        $this->load->view('theme/'.$this->active_theme.'/index',$data);
    }

    // logout function
    function logout() {
		
		
		
        $this->session->unset_userdata('');
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url('user/login') , 'refresh');
    }
	
	

    public function google_login(){       
        if(isset($_GET['code'])){
            //$this->google->authenticate();
            $get_user_info = $this->google->get_user_info($_GET['code']);
            //var_dump($get_user_info);
            $user_info['oauth_provider'] = 'google';
            $user_info['oauth_uid']      = $get_user_info['id'];
            $user_info['first_name']     = $get_user_info['given_name'];
            $user_info['last_name']      = $get_user_info['family_name'];
            $user_info['email']          = $get_user_info['email'];
            $user_info['gender']         = !empty($get_user_info['gender'])?$get_user_info['gender']:'';
            $user_info['locale']         = !empty($get_user_info['locale'])?$get_user_info['locale']:'';
            $user_info['profile_url']    = !empty($get_user_info['link'])?$get_user_info['link']:'';
            $user_info['picture_url']    = !empty($get_user_info['picture'])?$get_user_info['picture']:'';
            $this->varify_social_user_info($user_info);
            redirect('user/profile/');
        }
        redirect('user/login/');        
    }

    public function facebook_login(){       
        if($this->facebook->is_authenticated()){
            $get_user_info = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
            $user_info['oauth_provider'] = 'facebook';
            $user_info['oauth_uid'] = $get_user_info['id'];
            $user_info['first_name'] = $get_user_info['first_name'];
            $user_info['last_name'] = $get_user_info['last_name'];
            $user_info['email'] = $get_user_info['email'];
            $user_info['gender'] = $get_user_info['gender'];
            $user_info['locale'] = $get_user_info['locale'];
            $user_info['profile_url'] = 'https://www.facebook.com/'.$get_user_info['id'];
            $user_info['picture_url'] = $get_user_info['picture']['data']['url'];
            $this->varify_social_user_info($user_info);
            redirect('user/profile/');
        }
        redirect('user/login/');
        
    }

    public function varify_social_user_info($user_info=''){
		
	
        $query  = $this->db->get_where('user' , array('email'=>$user_info['email']));;
        $row  = $query->row();
        $num_rows  = $query->num_rows();
        if ($num_rows > 0) {
            $this->session->set_userdata('login_status', '1');
            $this->session->set_userdata('user_id', $row->user_id);
            $this->session->set_userdata('name', $row->name);                     
            $this->db->where('user_id', $row->user_id);
            $this->db->update('user', array(
                'last_login' => date('Y-m-d H:i:s')
            )); 
            if($row->role=='admin'){
              $this->session->set_userdata('admin_is_login', '1');
              $this->session->set_userdata('login_type', 'admin');
            }
            if($row->role=='subscriber'){
              $this->session->set_userdata('user_is_login', '1');
              $this->session->set_userdata('login_type', 'subscriber');
            }
        }else{
            $name                   = $user_info['first_name'].' '.$user_info['last_name'];
            $data['name']           = $name;
            $data['password']       = md5($user_info['email']);
            $data['email']          = $user_info['email'];
            $data['role']           = 'subscriber';
            $data['join_date']      = date('Y-m-d H:i:s');
            $data['last_login']     = date('Y-m-d H:i:s');             
            $this->db->insert('user', $data);
            $user_id                = $this->db->insert_id();
            $trial_enable               =   $this->db->get_where('config' , array('title'=>'trial_enable'))->row()->value;
            if($trial_enable =='1'):
                $this->subscription_model->create_trial_subscription($user_id);
            endif;
            //save user image
            $source = $user_info['picture_url'];
            $save_to = "uploads/user_image/".$user_id.".jpg";
            $this->common_model->grab_image($source,$save_to);
            //var_dump($source);
            // create session
            $this->session->set_userdata('login_status', '1');
            $this->session->set_userdata('user_id', $user_id);
            $this->session->set_userdata('name', $name);                     
            $this->db->where('user_id', $row->user_id);
            $this->db->update('user', array('last_login' => date('Y-m-d H:i:s')));
            $this->session->set_userdata('user_is_login', '1');
            $this->session->set_userdata('login_type', 'subscriber');
        }
        return TRUE;
    }

    function exception_error_handler($errno, $errstr, $errfile, $errline ) {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline); 
    }

    
    // signup function
    function signup_old($param1='', $param2='')  
	{
    
        if ($param1 == 'do_signup') {
            $registration_enable        =   $this->db->get_where('config' , array('title'=>'registration_enable'))->row()->value;
            if($registration_enable =="1"):
                $name                   = $this->input->post('name');
                $email                  = $this->input->post('email');
                $password               = $this->input->post('password');
                $password2              = $this->input->post('password2');
                $data['name']           = $name;
                $data['username']       = $email;
                $data['email']          = $email;
                $data['password']       = md5($password );
                $data['role']           = 'subscriber';
                $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]');
                $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|valid_email|is_unique[user.email]');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
                $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]|min_length[6]');
                // recaptcha check
                $recaptcha_enable          =   $this->db->get_where('config' , array('title' =>'recaptcha_enable'))->row()->value;
                if($recaptcha_enable == '1'):
                    $this->form_validation->set_rules('captcha', 'Captcha', 'callback_validate_recaptcha');
                endif;

                if ($this->form_validation->run() == FALSE):
                    $this->session->set_flashdata('sign_up_error', validation_errors());
                    redirect(base_url() . 'user/registration', 'refresh');
                else:
                    $email_exist             = $this->common_model->check_email($email);
                    if($email_exist):
                        $this->session->set_flashdata('sign_up_error', 'Signup fail.Email is already exist on system');                        
                    else:
                        $data['join_date']        = date('Y-m-d H:i:s');
                        $data['last_login']       = date('Y-m-d H:i:s');

                        // send mail
                        $this->load->model('email_model');
                        set_error_handler(array($this,"exception_error_handler"));
                        try
                        {
                            $this->email_model->account_opening_email($email, $password);
                        }
                        catch (\Exception $e)
                        {
                           $email_error = 'Failed to send email, Please check your mail setting.';
                        }

                        $this->db->insert('user', $data);

                        $insert_id                  =   $this->db->insert_id();
                        $trial_enable               =   $this->db->get_where('config' , array('title'=>'trial_enable'))->row()->value;
                        if($trial_enable =='1'):
                            $this->subscription_model->create_trial_subscription($insert_id);
                        endif;


                        
                        $this->session->set_flashdata('sign_up_success', 'Signup successfully.now you can login to system. '.$email_error ?? $email_error);                    
                        redirect(base_url() . 'user/registration', 'refresh');
                    endif;
                endif;
            else:
                $this->session->set_flashdata('sign_up_error', 'Registration disabled by administrator.');
                redirect(base_url() . 'user/registration', 'refresh');
            endif;
        }
        redirect(base_url() . 'user/registration', 'refresh');
    }




function signup($param1='', $param2='')  
	{
        if ($param1 == 'do_signup') {
             $this->load->model('email_model');
             

            $registration_enable        =   $this->db->get_where('config' , array('title'=>'registration_enable'))->row()->value;
            if($registration_enable =="1"):
                
                
            $broker_company=trim($this->input->post('broker_company'));     
            
            if(!empty($broker_company))
            {
                $sql = "SELECT * FROM user  where broker_company='".$broker_company."'";
    			$res = $this->db->query($sql);
    			if ($res->num_rows() > 0) 
    			{
    				
    			    $this->session->set_userdata('sign_up_error', 'There is already a broker associated with this company. Please contact 
    			            <a href="mailto:support@multipleclientlist" class="auto-fr gap-10">
                                <p class="m-0">support@multipleclientlist.com</p>
                            </a>
                        if you wish to create an account with this company.');
                    redirect(base_url() . 'user/registration', 'refresh');	
    			}     
            }        
                
                $affiliated_mls_name               = $this->input->post('affiliated_mls_name');
                $affiliated_mls_id=$affiliated_mls_name;
                
               
                $sql_mls = "SELECT * FROM  state_mls  where id='".$affiliated_mls_id."'";
    		    $res_mls = $this->db->query($sql_mls);
    			if ($res_mls->num_rows() > 0) 
    			{
                        $mls_details = $res_mls->result_array();
    			}
               
               
                if(!empty($affiliated_mls_id))
            {
                $sql = "SELECT * FROM user  where 	affiliated_mls_name='".$affiliated_mls_id."' and status=1";
    			$res = $this->db->query($sql);
    			if ($res->num_rows() > $mls_details[0]['license_limit']) 
    			{
    				
    			    $this->session->set_userdata('sign_up_error', 'The limit for the Agent License Keys for this MLS has exceeded. Please contact  
    			            <a href="mailto:support@multipleclientlist" class="auto-fr gap-10">
                                <p class="m-0">support@multipleclientlist.com</p>
                            </a>
                         you wish to be associated with this MLS.');
                    redirect(base_url() . 'user/registration', 'refresh');	
    			}     
            }
                
                
                
                
                
                $first_name                   = $this->input->post('first_name');
				$last_name                   = $this->input->post('last_name');
				$phone_number                   = $this->input->post('phone_number');
                $email                  = $this->input->post('email_address');
                $password               = $this->input->post('user_password');
				$user_broker_id               = $this->input->post('user_broker_id');
				$office_address               = $this->input->post('office_address');
				$office_phone_number               = $this->input->post('office_phone_number');
				
				/////$activation_code               = $this->input->post('activation_code');
				$user_type               = $this->input->post('user_type');
				
				
				
				$state_id               = $this->input->post('state_id');
				
				$state_list        =   $this->db->get_where('states' , array('id'=>$state_id))->row();
				
				//print_r($state_list->stste_postal);
				//exit;
				
				$auto_genrated= $this->common_model->generateRandomString(10);
				$activation_code=$state_list->stste_postal.'_'.$auto_genrated;
				
				$verify_otp= substr(str_shuffle("0123456789"), 0, 5);
		        $license_key= str_pad($affiliated_mls_name, 3, "0", STR_PAD_LEFT).substr(str_shuffle("0123456789"), 0, 7);
				

				$data['first_name']=$first_name;
				$data['last_name']=$last_name;
				$data['email']=$email;
				$data['password']= md5($password );
				$data['user_broker_id']=$user_broker_id;
				$data['office_address']=$office_address;
				$data['office_phone_number']=$office_phone_number;
				$data['affiliated_mls_name']=$affiliated_mls_name; 
				$data['state_id']=$state_id;
				$data['join_date'] = date('Y-m-d H:i:s');
				$data['last_login']     = date('Y-m-d H:i:s');
				$data['phone']=$phone_number;
				$data['role']           = $user_type;
				$data['status']=0;
				$data['verify_otp']=$verify_otp;
				$data['license_key']=$license_key;
				
				
				$data['broker_company']=$broker_company;
				
				
				//activation_code	
               
                    $email_exist             = $this->common_model->check_email($email);
                    if($email_exist):
                        $this->session->set_userdata('sign_up_error', 'Email already exists in the system. Please check');                        
                    else:
                       

                        $this->db->insert('user', $data);

                        $insert_id                  =   $this->db->insert_id();
                        
                        if($user_type=='broker_record')
        				{
        				    $this->db->where('user_id', $insert_id);
                            $this->db->update('user', array('user_broker_id' => $insert_id));
        				}
                        
                        
                        $this->email_model->send_otp_email($insert_id);
                        
						
						 $user_details = $this->db->get_where('user', array('user_id' => $insert_id))->result_array();
						
						if(!empty($insert_id) and $user_details[0]['status']==0)
						{
							
							$this->session->set_flashdata('success', 'OTP sent to your Email.');
							redirect(base_url() . 'home/verify_otp/'.$insert_id, 'refresh');	
						}
						
						
						/*
						$trial_enable               =   $this->db->get_where('config' , array('title'=>'trial_enable'))->row()->value;
                        if($trial_enable =='1'):
                            $this->subscription_model->create_trial_subscription($insert_id);
                        endif;
						*/	

                        
                        $this->session->set_userdata('sign_up_success', 'Signup successfully.now you can login to system. '.$email_error ?? $email_error);                    
                        redirect(base_url() . 'user/registration', 'refresh');
                    endif;
                
            else:
                $this->session->set_userdata('sign_up_error', 'Registration disabled by administrator.');
                redirect(base_url() . 'user/registration', 'refresh');
            endif;
        }
        redirect(base_url() . 'user/registration', 'refresh');
    }


    // forget password function
    function forget_password1111($param1='', $param2='') {
        if ($param1 == 'do_reset') {           
            $email                  = $this->input->post('email_address');            
            $user_exist             = $this->common_model->check_email($email);
            
			
			if($user_exist){ 
                
				/*
				$token = bin2hex(openssl_random_pseudo_bytes(16));               
                $data['token'] = $token;
                $this->db->where('email',$email);
                $this->db->update('user',$data);
                $this->load->model('email_model');


                // send mail
                set_error_handler(array($this,"exception_error_handler"));
                try
                {
                    $this->email_model->password_reset_email($email, $token);
                }
                catch (\Exception $e)
                {
                   $this->session->set_flashdata('reset_error', 'Failed to send email, Please check your mail setting.');
                   redirect(base_url() . 'user/forget_password', 'refresh');
                }

                */

				//$new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);
				//$token=11111111;
				
				//echo "=============".$email;
				//exit;
		
        	
			//$new_password = substr(rand(100000000, 20000000000), 0, 7);	
			$new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);
				$this->email_model->password_reset_email($email, $new_password);		
		
			$data['password']   = md5($new_password);
            $this->db->where('email', $email );
            $this->db->update('user', $data);
			 $this->load->model('email_model');


                $this->session->set_flashdata('success', 'Please Check Your Email to Complete Password Reset.');
                redirect(base_url() . 'user/forget_password', 'refresh');                
            }else{
                echo "================";
            $this->session->set_flashdata('error', 'Email not found on our system');            
            exit;
            redirect(base_url() . 'user/forget_password', 'refresh');
            }
        }
        $data['page_name']      = 'forget_password';
        $data['title']     = 'Password Recovery';        
        $this->load->view('theme/'.$this->active_theme.'/index',$data);
        //redirect(base_url() . 'login', 'refresh');

    }
	
	
	function forget_password($param1='', $param2='') {
        if ($param1 == 'do_reset') {           
            //$email                  = $this->input->post('email');            
             $email                 = $this->input->post('email_address');     
			$user_exist             = $this->common_model->check_email($email);
            
			
			if($user_exist){ 
                //$token = bin2hex(openssl_random_pseudo_bytes(16));               
                ///$data['token'] = $token;
                //$this->db->where('email',$email);
                //$this->db->update('user',$data);
                $this->load->model('email_model');


                // send mail
                ///set_error_handler(array($this,"exception_error_handler"));
                try
                {
                    $this->email_model->password_reset_email($email);
                }
                catch (\Exception $e)
                {
                   $this->session->set_flashdata('reset_error', 'Failed to send email, Please check your mail setting.');
                   redirect(base_url() . 'user/forget_password', 'refresh');
                }

                

                $this->session->set_flashdata('reset_success', 'Please Check Your Email to Complete Password Reset.');
                redirect(base_url() . 'user/forget_password', 'refresh');                
            }else{
            $this->session->set_flashdata('reset_error', 'Email not found on our system');            
            redirect(base_url() . 'user/forget_password', 'refresh');
            }
        }
        
		
		
		$data['page_name']      = 'forget_password';
        $data['title']     = 'Password Recovery';        
        $this->load->view('theme/'.$this->active_theme.'/index',$data);
        //redirect(base_url() . 'login', 'refresh');

    }
	
	
	
	function reset_password($param1='')
	{
		if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
		
		
		   if ($param1 == 'save') 
		   {
			$password                   = $this->input->post('new_password');
            $password2                  = $this->input->post('verify_password');
			$email                      = $this->session->userdata('login_email');
			$user_id                      = $this->session->userdata('user_id');
			
			$data['password']   = md5($password);
            $this->db->where('user_id', $user_id );
            $this->db->update('user', $data);
            $this->session->set_flashdata('success', 'Password Changed');
            redirect(base_url() . 'user/reset_password', 'refresh');    
		  
		   }
	
	
	
	
			$data['page_name']      = 'reset_password';
			$data['title']     = 'Reset Password';        
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
		
	}
	
	
    // complete password reset function
    function complete_reset($param1='', $param2='') {
        if ($param1 == 'save') {

            $token                      = $this->input->post('token');
            $password                   = $this->input->post('new_password');
            $password2                  = $this->input->post('verify_password');
            $email                      = $this->db->get_where('user' , array('token' => $token))->row()->email;
            $this->form_validation->set_rules('token', 'token', 'required|min_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]|min_length[4]');
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('reset_error', validation_errors());
                redirect(base_url() . 'user/complete_reset?token='.$token, 'refresh'); 
            }

            else{
                $data['token']      = '';
                $data['password']   = md5($password);
                $this->db->where('token', $token);
                $this->db->update('user', $data);
                $this->load->model('email_model');
                $this->email_model->password_reset_confirmation($email);
                $this->session->set_flashdata('login_success', 'Password Changed');
                redirect(base_url() . 'user/login', 'refresh');
            }

        }
            $token                  = $this->input->get('token');
            if(isset($token) && $token !=''){
                $token_exist             = $this->common_model->check_token($token);
                if($token_exist){                               
                $data['token'] = $token;
                $data['page_name']      = 'new_password';
                $data['title']     = 'New Password';        
                $this->load->view('theme/'.$this->active_theme.'/index',$data);
                }else{
                $this->session->set_flashdata('reset_error', 'Invalid token..');
                redirect(base_url() . 'user/forget_password', 'refresh');
                }
            }else{
                $this->session->set_flashdata('reset_error', 'Invalid token..');
                redirect(base_url() . 'user/forget_password', 'refresh');
            }            
        }   
    // validate login  function
    function validate_login($email   =   '' , $password   =  ''){
        $credential    =   array(  'email' => $email , 'password' => $password,'status'=>1 );
        $query = $this->db->get_where('user' , $credential);
        $row = $query->row();
        
		//echo $this->db->last_query();
		//exit;
		
		//echo "=========".$query->num_rows();
		//exit;
		
		if ($query->num_rows() > 0):
            
			$this->session->set_userdata('login_email', $row->email);
			$this->session->set_userdata('login_status', '1');
            $this->session->set_userdata('user_id', $row->user_id);
            
			$name = ucfirst( $row->first_name).' '. ucfirst($row->last_name);
			
			$this->session->set_userdata('name', $name);                     
            $this->db->where('user_id', $row->user_id);
            $this->db->update('user', array(
                'last_login' => date('Y-m-d H:i:s')
            )); 
            if($row->role =='admin'):
              $this->session->set_userdata('admin_is_login', '1');
              $this->session->set_userdata('login_type', 'admin');
            endif;
            
              $this->session->set_userdata('user_is_login', '1');
              $this->session->set_userdata('login_type', $row->role);
            
              return 'success';
        endif;        
        return 'invalid';       
    }

    
    // dashboard function
    function dashboard(){
        if ($this->session->userdata('user_is_login') != 1)
            redirect(base_url(), 'refresh');
        	/* start menu active/inactive section*/
        	$this->session->unset_userdata('active_menu');
        	$this->session->set_userdata('active_menu', '1');
        	/* end menu active/inactive section*/
        	$data['page_name']             = 'dashboard';
        	$data['page_title']            = 'User Dashboard';
        	$this->load->view('user/index', $data);
    }
    // manage profile function
    function manage_profile_old(){
    	if ($this->session->userdata('user_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '12');
            /* end menu active/inactive section*/
            $data['page_name']      = 'manage_profile';
            $data['page_title']     = 'Update profile information';
            $data['profile_info']   = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')))->result_array();
            $this->load->view('user/index', $data);
    }


		function manage_profile(){
    	
			if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
		
		
		
            /* start menu active/inactive section*/
            //$this->session->unset_userdata('active_menu');
            //$this->session->set_userdata('active_menu', '12');
            /* end menu active/inactive section*/



           
            $data['page_name']      = 'edit_profile';
            $data['page_title']     = 'Update profile information';
            $data['profile_info']   = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')))->result_array();
			
			$user_broker_id= $data['profile_info'][0]['user_broker_id'];
			
			 $data['broker_record']        	= $this->db->get_where('user' , array('user_id'=>$user_broker_id))->result_array();
			
			$data['states']     = $this->db->get('states')->result_array();
            //$this->load->view('user/index', $data);
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
			
    }


	function update_profile()
	{
		 $user_id                = $this->session->userdata('user_id');
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'login', 'refresh');
       
            
			$broker_company=$this->input->post('broker_company');
			
			if(!empty($broker_company))
			{
        			$sql = "SELECT * FROM user  where broker_company='".$broker_company."' and user_id!='".$user_id."'";
        			$res = $this->db->query($sql);
        			if ($res->num_rows() > 0) 
        			{
        			    $this->session->set_userdata('error', 'There is already a broker associated with this company. Please contact 
        			            <a href="mailto:support@multipleclientlist" class="auto-fr gap-10">
                                    <p class="m-0">support@multipleclientlist.com</p>
                                </a>
                            if you wish to create an account with this company.');
                        redirect(base_url() . 'user/manage_profile', 'refresh');	
        			}     
			}
			    
			
				$first_name                   = $this->input->post('first_name');
				$last_name                   = $this->input->post('last_name');
				$phone_number                   = $this->input->post('phone_number');
              
                
				///$realestate_brokerage               = $this->input->post('realestate_brokerage');
				$office_address               = $this->input->post('office_address');
				$office_phone_number               = $this->input->post('office_phone_number');
				$affiliated_mls_name               = $this->input->post('affiliated_mls_name');
				
				$state_id               = $this->input->post('state_id');
				//$mls_license_number     = $this->input->post('mls_license_number');
				

                $user_broker_id               = $this->input->post('user_broker_id');
				
				
				$data['first_name']=$first_name;
				$data['last_name']=$last_name;
				
				$data['office_address']=$office_address;
				$data['office_phone_number']=$office_phone_number;
				$data['affiliated_mls_name']=$affiliated_mls_name; 
				$data['phone']=$phone_number;
				$data['state_id']=$state_id;
				
				$data['user_broker_id']=$user_broker_id;
                $data['broker_company']=$broker_company;
				
				
			    //$data['mls_license_number']=$mls_license_number;
			
			
			$this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            ///move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/user_image/' .$user_id.'.jpg');            
            $this->session->set_userdata('success', 'Profile information updated.');
            redirect(base_url() . 'user/manage_profile', 'refresh');
       
		
		
		
		
		
	}



    // profile function
    function profile($param1 = '', $param2 = ''){
        $user_id                = $this->session->userdata('user_id');
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'update') {
            $data['name']           = $this->input->post('name');
            $data['gender']         = $this->input->post('gender');             
            $data['phone']          = $this->input->post('phone');             
            $data['dob']            = date("Y-m-d",strtotime($this->input->post('dob')));             
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/user_image/' .$user_id.'.jpg');            
            $this->session->set_flashdata('success', 'Profile information updated.');
            redirect(base_url() . 'user/update_profile/', 'refresh');
        }
            $data['page_name']      = 'profile';
            $data['title']          = 'Manage Profile';
            $data['profile_info']   = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')))->row();
            $this->load->view('theme/'.$this->active_theme.'/index',$data);

    }

    function favorite($param1 = '', $param2 = ''){
            $user_id=$this->session->userdata('user_id');
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'login', 'refresh');
        
            $data['page_name']      = 'favorite';
            $data['profile_info']   = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row();
            $data['title']          = 'My Favorite Movies & Videos';
            $this->db->order_by('wish_list_id', 'desc');
            $data['fav_videos']     = $this->db->get_where('wish_list', array('wish_list_type'=>'fav','user_id' => $this->session->userdata('user_id')))->result_array();
            $this->load->view('theme/'.$this->active_theme.'/index',$data);
    }

    function watch_later($param1 = '', $param2 = ''){
            $user_id=$this->session->userdata('user_id');
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'login', 'refresh');
        
            $data['page_name']      = 'watch_later';
            $data['title']          = 'My Wish List';
            $this->db->order_by('wish_list_id', 'desc');
            $data['wl_videos']      = $this->db->get_where('wish_list', array('wish_list_type'=>'wl','user_id' => $this->session->userdata('user_id')))->result_array();
            $this->load->view('theme/'.$this->active_theme.'/index',$data);
    }

    // update profile function
    function update_profile_old($param1 = '', $param2 = ''){
            $user_id=$this->session->userdata('user_id');
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'login', 'refresh');        
            $data['page_name']      = 'update_profile';
            $data['title']     = 'Update Profile';
            $data['profile_info']   = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')))->row();
            $this->load->view('theme/'.$this->active_theme.'/index',$data);

    }
    // password change function
    function change_password($param1 = '', $param2 = ''){
        $user_id=$this->session->userdata('user_id');
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'update') {
            $password               = md5($this->input->post('password'));
            $new_password           = md5($this->input->post('new_password'));
            $retype_new_password    = md5($this->input->post('retype_new_password'));
            
            $current_password       = $this->db->get_where('user', array(
                'user_id' => $this->session->userdata('user_id')
            ))->row()->password;
            
            if ($current_password == $password && $new_password == $retype_new_password) {
                $this->db->where('user_id', $this->session->userdata('user_id'));
                $this->db->update('user', array(
                    'password' => $new_password
                ));
                $this->session->set_flashdata('success', 'Password changed.');
            }
            elseif ($current_password !=$password ){
                $this->session->set_flashdata('error', 'Old password not correct.');

            } else {
                $this->session->set_flashdata('error', 'Password not match.');
            }
            redirect(base_url() . 'user/change_password/', 'refresh');        
        }

            $data['page_name']      = 'change_password';
            $data['title']     = 'Change Password';
            $data['profile_info']   = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')))->row();
            $this->load->view('theme/'.$this->active_theme.'/index',$data);
    }
    // login function
    function do_login(){
        $email                          = $this->input->post('email_address');
        $password                       = md5($this->input->post('login_password'));
		$this->session->set_flashdata('email_address', $email);
		
		///$this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|valid_email');
        ///$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        // recaptcha check
        /*
		$recaptcha_enable          =   $this->db->get_where('config' , array('title' =>'recaptcha_enable'))->row()->value;
        if($recaptcha_enable == '1'):
            $this->form_validation->set_rules('captcha', 'Captcha', 'callback_validate_recaptcha');
        endif;
		*/
        
		           
            $login_status               = $this->validate_login( $email ,$password);        
           
            
            if ($login_status == 'success'):
                if($this->session->userdata('admin_is_login')==1)
                redirect(base_url() . 'home/user_details', 'refresh');
				redirect(base_url() . 'home/user_details', 'refresh');
				
				//redirect(base_url() . 'user/profile', 'refresh');
				
            else:
                $this->session->set_flashdata('login_error', 'Username and Password do not match.');
                redirect(base_url() . 'user/login', 'refresh');
            endif;
          
    }

    public function validate_recaptcha(){
        $is_valid = $this->recaptcha->is_valid();
        if($is_valid['success']):
            return true;
        else:
            if(array_key_exists("error_message",$is_valid)):
                $this->form_validation->set_message('validate_recaptcha', $is_valid['error_message']);
            else:
                $this->form_validation->set_message('validate_recaptcha', trans("captcha_code_is_wrong"));
            endif;
            return false;
        endif;
   }



    function subscribe(){
        $response                       = array();
        $email                          = $_POST["email"];
        $name                           = $_POST["name"];       
        $response['submitted_data']     = $_POST;
        $subscribe_status               = $this->add_subscriber($name,$email);
        $response['subscribe_status']   = $subscribe_status;
        echo json_encode($response);
    }

    function add_to_wish_list(){
        $response = array();
        $list_type                      = trim($_POST["list_type"]);
        $videos_id                      = trim($_POST["videos_id"]);       
        $response['submitted_data']     = $_POST;
        $status                         = $this->add_to_list($list_type,$videos_id);
        $response['status']             = $status;
        echo json_encode($response);
    }

    function remove_wish_list(){
        $response                       = array();
        $wish_list_id                   = trim($_POST["wish_list_id"]);       
        $response['submitted_data']     = $_POST;
        $status                         = $this->remove_from_list($wish_list_id);
        $response['status']             = $status;
        echo json_encode($response);
    }


    function add_to_list($list_type="", $videos_id=""){
        $user_id                        = $this->session->userdata('user_id');
        $query                          = $this->db->get_where('wish_list' , array('videos_id' => $videos_id, 'user_id'=>$user_id,'wish_list_type'=>$list_type));
        if($user_id =='' || $user_id==NULL):
           return 'login_fail'; 
        elseif ($query->num_rows() > 0):
            return 'exist';
        else:
            $data['user_id']            = $user_id;
            $data['videos_id']          = $videos_id;
            $data['wish_list_type']     = $list_type;
            $data['create_at']          = date('Y-m-d H:i:s');
            $this->db->insert('wish_list', $data);
            return 'success';
        endif;
    }

    function remove_from_list($wish_list_id=""){
        $user_id                        = $this->session->userdata('user_id');
        $query                          = $this->db->get_where('wish_list' , array('wish_list_id' => $wish_list_id, 'user_id'=>$user_id));
        if($user_id =='' || $user_id==NULL){
           return 'login_error'; 
        }else if ($query->num_rows() > 0) {
            $this->db->where('wish_list_id',$wish_list_id);
            $this->db->delete('wish_list');
            return 'success';            
        }else{
           return 'error'; 
        }
    }



    function add_subscriber($name="", $email=""){
    $query                          = $this->db->get_where('user' , array('email' => $email));
        if ($query->num_rows() < 1) {
            $data['name']           = $name;
            $data['password']       = md5($email);
            $data['email']          = $email;
            $data['email']          = $email;
            $data['role']           = 'subscriber';
            $data['join_date']      = date('Y-m-d H:i:s');
            $data['last_login']     = date('Y-m-d H:i:s');             
            $this->db->insert('user', $data);
            $this->load->model('email_model');
            if($this->email_model->send_confirmation_to_subscriber($email)){
            return 'success';
            }else{
               return 'error'; 
            }
        }
        else if ($query->num_rows() > 0) {
            return 'exist';
        }
        else{
            return 'error';
        }
    }

    function report_movie($param1=''){
        $i              =    1;
        $data['issue']  =   '';

        if($this->input->post('video') !="" && $this->input->post('video') !=NULL){
            $data['issue']      .= $i.'- Video ' .$this->input->post('video').'<br>';
            $i++;
        }
        if($this->input->post('audio') !="" && $this->input->post('audio') !=NULL){
            $data['issue']      .= $i.'- Audio ' .$this->input->post('audio').'<br>';
            $i++;
        }
        if($this->input->post('subtitle') !="" && $this->input->post('subtitle') !=NULL){
            $data['issue']   .= $i.'- Subtitle ' .$this->input->post('subtitle').'<br>';
            $i++;
        }

        if($this->input->post('message') !="" && $this->input->post('message') !=NULL){
            $data['message']    = $this->input->post('message');
        }

        $this->form_validation->set_rules('type', 'Type', 'trim|required');
        $this->form_validation->set_rules('id', 'ID', 'trim|required');

        if ($this->form_validation->run() == FALSE):
            //var_dump(validation_errors()); exit;
            $this->session->set_flashdata('error', "Something went wrong!!");
            redirect($this->agent->referrer(), 'refresh');
        else:
            $data['type'] = $this->input->post('type');
            $data['id'] = $this->input->post('id');
            $this->db->insert('report',$data);
            $this->session->set_flashdata('success', 'Report sent successfully.');
            redirect($this->agent->referrer(), 'refresh');
        endif;

    }
    function subscription($param1 = '', $param2 = ''){
        $this->session->unset_userdata('user_active_menu');
        $this->session->set_userdata('user_active_menu', '2');

        $user_id=$this->session->userdata('user_id');
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'update') {
            $data['name']  = $this->input->post('name');
            $data['gender'] = $this->input->post('gender');             
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/user_image/' .$user_id.'.jpg');            
            $this->session->set_flashdata('success', 'Profile information updated.');
            redirect(base_url() . 'user/update_profile/', 'refresh');
        }
        $data['page_name']      = 'subscription';
        $data['title']          = 'My Subscription';
        $data['profile_info']   = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row();
        $this->load->view('theme/'.$this->active_theme.'/index',$data);
    }
	
	
	function link_with_dotloop()
	{
		if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
		
		$code=$_GET['code'];
		
		$client_id='2da9bbf6-ca23-4f0e-8dc0-ba51287b8cc9';
		$secrat_id='a05b2465-7303-4358-8d9d-319c5fdbc593';
		$credentials = base64_encode($client_id . ':' . $secrat_id);
		//print_r($_REQUEST[code]);
		$url="https://auth.dotloop.com/oauth/token?grant_type=authorization_code&code=".$code."&redirect_uri=https://multipleclientslist.com/user/link_with_dotloop&state=state";
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://auth.dotloop.com/oauth/token',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('code' => $code,'redirect_uri' => 'https://multipleclientslist.com/user/link_with_dotloop','grant_type' => 'authorization_code'),
		CURLOPT_HTTPHEADER => array(
		'Authorization: Basic '.$credentials
		
	  ),
	));

	$response_token = curl_exec($curl);
	curl_close($curl);
	
     //   echo $response_token;
	
	$array_token=json_decode($response_token);
	$dotloop_token= $array_token->access_token;

	//echo "==============".$dotloop_token;
	//exit;
	$this->session->set_userdata('dotloop_token', $dotloop_token);
	
	if(!empty($dotloop_token))
	{
		 $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile',
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

		$response_profile = curl_exec($curl);
		curl_close($curl);
		$dotloop_profile=json_decode($response_profile);
		
		$dotloop_profile_id=$dotloop_profile->data[0]->id;
		
		$this->session->set_userdata('dotloop_profile_id', $dotloop_profile_id);

	}
	
	
	
	
	
	
	////exit;
	
	if(!empty($dotloop_token))
	{	
	
		  $curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/account',
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


		$response_account = curl_exec($curl);
		curl_close($curl);
		$array_response_account=json_decode($response_account);
		//print_r($array_response_account);
		$dotloop_id= $array_response_account->data->id;
		//email    firstName   lastName  defaultProfileId
		
		
	}
	
	//////Get all Loop		
		$curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop?batch_size=100&include_details=true',
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
	
	 $response_loop;
	
	curl_close($curl);
	$dotloop_loop=json_decode($response_loop);
	
	$dotloop_loopdata=$dotloop_loop->data;
	
	//echo "<pre>";
	//print_r($dotloop_loopdata);
	//exit;
	foreach($dotloop_loopdata as $row)
	{
		//echo "<pre>";
		//print_r($row);
		
		$loop_id=0;
		$profileId=0;
		$loop_name="";
		$transaction_type="";
		$transaction_status="";
		$contract_type="";
		$contract_start_date="";
		$contract_end_date="";
		$from_date="";
		$to_date="";
		$data=array();
		$data_buyer=array();
		
		if(!empty($row->id))
		{	
		$loop_id=$row->id;
		}
		
		if(!empty($row->profileId))
		{
		$profileId=$row->profileId;
		}
		
		if(!empty($row->name))
		{
		$loop_name=$row->name;
		}
		
		if(!empty($row->transactionType))
		{
		$transaction_type=$row->transactionType;
		}
		
		if(!empty($row->status))
		{
		$transaction_status=$row->status;
		}
		
		if(!empty($row->details->{'Contract Info'}->Type))
		{
			$contract_type=	$row->details->{'Contract Info'}->Type;
		}
		
		if(!empty($row->details->{'Contract Dates'}->{'Contract Agreement Date'}))
		{
		$contract_start_date=$row->details->{'Contract Dates'}->{'Contract Agreement Date'};
		
			$phpdate = strtotime( $contract_start_date );
			$from_date = date( 'Y-m-d', $phpdate );
		
		
		
		
		}

		if(!empty($row->details->{'Contract Dates'}->{'Closing Date'}))
		{
		
		$contract_end_date=	$row->details->{'Contract Dates'}->{'Closing Date'};
		
		//echo "===".$contract_end_date;
		//echo "<br>";
		
			$phpdate_end = strtotime( $contract_end_date );
			$to_date = date( 'Y-m-d', $phpdate_end );
		//echo "**".$to_date;
		//echo "<br>";	
			
			
		}
		else
		{
			
		}	
		
		
		
			if($transaction_status=='UNDER_CONTRACT')
			{
				//$cintract_type='Active';
				$manual_status=1;
			}	
			elseif($transaction_status=='SOLD')
			{
				//$cintract_type='Closed';
				$manual_status=3;
			}
			elseif($transaction_status=='TERMINATED')
			{
				//$cintract_type='Terminated';
				$manual_status=4;
			}
			elseif($transaction_status=='PRE_LISTING')
			{
				//$cintract_type='Pending';;
				$manual_status=0;
				
			}
			else
			{
				$manual_status=9;
			}	
		
		
		$data=array(
			'loop_id'=>$loop_id,
			'profileId'=>$profileId,
			'transaction_type'=>$transaction_type,
			'transaction_status'=>$transaction_status,
			'loop_name'=>$loop_name,
			'user_id'=>$this->session->userdata('user_id'),
			'contract_type'=>$contract_type,
			'contract_start_date'=>$from_date,
			'contract_end_date'=>$to_date,
			'dotloop_id'=>$dotloop_id,
			'status'=>$manual_status,
			'created_at'=> date('Y-m-d')
		);
		
		
		//print_r($data);
		//echo "<br>";
		
		$this->db->insert('buyer_realtor_contract', $data);
        $contract_id = $this->db->insert_id();
		
		// buyer details-
		if(!empty($loop_id))
		{	
			$curl = curl_init();
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://api-gateway.dotloop.com/public/v2/profile/'.$dotloop_profile_id.'/loop/'.$loop_id.'/participant',
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
			$participant=$dotloop_loop->data;
			
			$buyer_full_name="";
			$buyer_email="";
			$buyer_phone="";
			
			if(!empty($participant[0]->fullName))
			{
				$buyer_full_name=$participant[0]->fullName;
			}	
			if(!empty($participant[0]->email))
			{
				$buyer_email=$participant[0]->email;
			}	
			
			if(!empty($participant[0]->Phone))
			{
				$buyer_phone=$participant[0]->Phone;
			}	
			
			
		//check duplicate buyers///////////////	
		$sql12 = "SELECT *  FROM  buyers where name='".$buyer_full_name."' and  email='".$buyer_email."' and phone='".$buyer_phone."'";
		
		$record22 = $this->db->query($sql12);
		if($record22->num_rows() > 0) 
		{
			$data_repeat=array(
			'duplicate_contract'=>1
			);
			//$data['active_contract'] = $record->result_array();
			$this->db->where('id', $contract_id);
			$this->db->update('buyer_realtor_contract', $data_repeat);
			
		}	

		//check duplicate buyers///////////////		
			
			
			
			
			$data_buyer=array(
			'name'=>$buyer_full_name,
			'email'=>$buyer_email,
			'phone'=>$buyer_phone,
			'user_id'=>$this->session->userdata('user_id'),
			'buyer_realtor_contract_id'=>$contract_id,
			'created_at'=> date('Y-m-d')
			);
			$this->db->insert('buyers', $data_buyer);
		}
		///////////////////////////////////////////
		
		
		
		
		
	}	
		
		
			$data2=array(
			'link_with_dotloop'=>1,
			'link_with_room'=>2
			);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('user', $data2);
			///$this->session->set_flashdata('success', 'Link with dotloop data extract successfully');
			
			$this->session->set_flashdata('success', 'Linked with dotloop successfully');
			
			
			redirect(base_url() . 'home/user_details', 'refresh');
		
		
		
		//https://localhost/realestate/user/signin_signup_dotloop?code=pc7rDp
		
		///https://auth.dotloop.com/oauth/authorize?response_type=code&client_id=2da9bbf6-ca23-4f0e-8dc0-ba51287b8cc9&redirect_uri=https://localhost/realestate/user/signin_signup_dotloop&redirect_on_deny=true',
	}
	
	
	
	function add_buyer_contract()
	{
		
		$this->load->model('email_model');
		$primary_buyer_name=$this->input->post('primary_buyer_name');
		$primary_buyer_last_name=$this->input->post('primary_buyer_last_name');
		
		
		$secondary_buyer_name=$this->input->post('secondary_buyer_name');
		$secondary_buyer_last_name=$this->input->post('secondary_buyer_last_name');
		
		$buyer_email=$this->input->post('buyer_email');
		
		$secondary_buyer_email=$this->input->post('secondary_buyer_email');
		
		
		$buyer_phone=$this->input->post('buyer_phone');	
		
		$secondary_buyer_phone=$this->input->post('secondary_buyer_phone');	
		
		
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
		
		$str_document= implode(",",$array_document);
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
		
		if(!empty($buyer_id))
		{
			$this->session->set_flashdata('success', 'Buyer has been saved successfully.');
		}	
		else
		{
			$this->session->set_flashdata('error', "Something went wrong!!");
		}	
		
		//redirect(base_url() . 'home/add_buyer', 'refresh');
		//redirect(base_url() . 'user/user_active_contracts', 'refresh');
	
	    redirect(base_url() . 'user/buyerdetail/'.$buyer_id, 'refresh');
	    
	    
	}
	

	function ajax_add_buyer()
	{
		
		$buyer_name=$this->input->post('buyer_name');
		$buyer_email=$this->input->post('buyer_email');
		$buyer_phone=$this->input->post('buyer_phone');	
		$user_id=$this->input->post('user_id');
		
		$sql = "SELECT *  FROM buyers where name='".$buyer_name."' and email='".$buyer_email."' and phone='".$buyer_phone."' and user_id='".$user_id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			echo 'available';
			die();
		}
		
		
		
		
		//"buyer_realtor_contract_id"=>$contract_id
		$data1=array(
		"name"=>$buyer_name,
		"email"=>$buyer_email,
		"phone"=>$buyer_phone,
		"user_id"=>$user_id
		);
		
		
		
		$this->db->insert('buyers', $data1);
        echo $buyer_id = $this->db->insert_id();

	}



	function buyer_cancelled()
	{
	
			$buyer_email=$this->input->post('buyer_email');
			$buyer_email=$this->input->post('buyer_email');
			$this->db->where('id', $broadcast_id);
			$this->db->update('broadcast_details', $data2);

		
	}


	function view_buyercontract($buyer_realtor_contract_id="",$show_button=0)
	{
		
		if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
			
		$sql = "SELECT U.first_name as user_first_name,U.last_name as user_last_name,U.email as user_email ,U.phone, BC.*,
		B.name,B.last_name,
		B.secondary_buyer_name,
		B.secondary_buyer_last_name,
		B.secondary_buyer_email,
		B.secondary_buyer_phone,
		B.phone as primery_phone,
		B.email as primery_email
		FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join  buyers B on BC.id= B.buyer_realtor_contract_id
		
		where BC.id='".$buyer_realtor_contract_id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$rowcoll = $res->result_array();
		}	
			
			
			$data['contract']=$rowcoll;
			$data['show_button']=$show_button;
			$data['page_name']             = 'view_buyer_contract';
        	$data['page_title']            = 'View buyer contract';
        	///$this->load->view('user/index', $data);
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
	}

    function viewcontract($buyer_realtor_contract_id="",$show_button=0)
	{
			
		$sql = "SELECT U.first_name,U.last_name,U.email as user_email ,U.phone, BC.* FROM  buyer_realtor_contract BC left join  user U on BC.user_id=U.user_id where BC.id='".$buyer_realtor_contract_id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$rowcoll = $res->result_array();
		}	
			
			
			$data['contract']=$rowcoll;
			$data['show_button']=$show_button;
			$data['page_name']             = 'view_contract';
        	$data['page_title']            = 'View buyer contract';
        	///$this->load->view('user/index', $data);
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
	}



     function viewcontract_for_buyer($buyer_realtor_contract_id="",$show_button=0)
	{
			
		$sql = "SELECT U.first_name,U.last_name,U.email as user_email ,U.phone, BC.* FROM  buyer_realtor_contract BC left join  user U on BC.user_id=U.user_id where BC.id='".$buyer_realtor_contract_id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$rowcoll = $res->result_array();
		}	
			
			
			$data['contract']=$rowcoll;
			$data['buyer_realtor_contract_id']=$buyer_realtor_contract_id;
			
			$data['show_button']=$show_button;
			$data['page_name']             = 'viewcontract_for_buyer';
        	$data['page_title']            = 'View contract';
        	///$this->load->view('user/index', $data);
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
	}

    function viewcontract_for_deny($buyer_realtor_contract_id="",$show_button=0)
	{
			
		$sql = "SELECT U.first_name,U.last_name,U.email as user_email ,U.phone, BC.* FROM  buyer_realtor_contract BC left join  user U on BC.user_id=U.user_id where BC.id='".$buyer_realtor_contract_id."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$rowcoll = $res->result_array();
		}	
			
			
			$data['contract']=$rowcoll;
			$data['show_button']=$show_button;
			
			$data['buyer_realtor_contract_id']=$buyer_realtor_contract_id;
			
			
			
			$data['page_name']             = 'viewcontract_for_deny';
        	$data['page_title']            = 'View contract';
        	///$this->load->view('user/index', $data);
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
	}

	function contract_revision()
	{
		/*
		$sql = "SELECT B.name as full_name, U.role, U.first_name,U.last_name,U.email as user_email ,U.phone, BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.user_id=B.user_id
		";
		*/
		
		$sql = "SELECT B.name as full_name, U.role, U.first_name,U.last_name,U.email as user_email ,U.phone, BC.* FROM  buyer_realtor_contract BC 
		left join  user U on BC.user_id=U.user_id 
		left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.status=0 
		";
		
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$rowcoll = $res->result_array();
		}	
			
			
			$data['contract']=$rowcoll;
			$data['page_name']             = 'contract_revision';
        	$data['page_title']            = 'Contract Revision';
        	///$this->load->view('user/index', $data);
			$this->load->view('theme/'.$this->active_theme.'/index',$data);

    }



	function save_brokerage_amount()
	{
		$amount=$this->input->post('amount');
		
			$user_id=$this->session->userdata('user_id');
            //$data['brokerage_amount']=$amount;
			$data['realestate_brokerage']=$amount;
			
			$this->db->where('user_id',$user_id);
            $this->db->update('user', $data ); 
			echo $this->db->affected_rows();
	}
	
	function get_mls($state_id=0)
	{
		$sql = "SELECT * FROM   state_mls where is_active=1 and state_id='".$state_id."'";
		$res = $this->db->query($sql);
		$ajax_str='';
		if ($res->num_rows() > 0) 
		{
			
			$rowcoll = $res->result_array();
			$ajax_str.='<option value="">Select MLS Name</option>';
			foreach($rowcoll as $row)
			{
				//print_r($row);
			$ajax_str.='<option value="'.$row['id'].'">'.$row['mls_name'].'</option>';
				
			}
			$ajax_str.='<option value="569">Other</option>';
			///echo $ajax_str;
		}	
			echo $ajax_str;
		
	}
	
	
function get_broker($mls_id=0)
	{
		
		///$data['broker_record']        	= $this->db->get_where('user' , array('affiliated_mls_name'=>'broker_record'))->result_array();
		
		$sql = "SELECT * FROM   user where affiliated_mls_name='".$mls_id."' and role='broker_record'";
		$res = $this->db->query($sql);
		$ajax_str='';
		//if ($res->num_rows() > 0) 
		//{
			
			$rowcoll = $res->result_array();
			$ajax_str.='<option value="0">Select Company</option>';
			foreach($rowcoll as $row)
			{
				//print_r($row);
			$ajax_str.='<option value="'.$row['user_id'].'">'.$row['broker_company'].'</option>';
			
			
				
			}
			
		//}	
			echo $ajax_str;
		
	}
	
	
	
	
	
	function user_active_contracts($is_expired=0)
	{
			if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
			
			$where_as="";
			if($this->session->userdata('login_type')=='broker_record')
			{
			    $where_as=" and  U.user_broker_id='".$this->session->userdata('user_id')."'";
			    
			}
			else
			{
			    $where_as="and  BC.user_id='".$this->session->userdata('user_id')."'";
			}
			/*
			$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.status='1' and  BC.user_id='".$this->session->userdata('user_id')."'";
			*/
			
			
			if(empty($is_expired))
			{
			$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where   DATE(BC.contract_end_date) > DATE(NOW()) and BC.status='1' ".$where_as;
			}
			elseif(!empty($is_expired))
			{
			    
			 $sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where  DATE(BC.contract_end_date) < DATE(NOW())  ".$where_as;
			    
			}
			
			
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
				$data['active_contract'] = $record->result_array();
			}	
		
			$data['page_name']             = 'dashboard_user_active_contract';
        	$data['page_title']            = 'Active Contract List';
			$data['show_cancel_button']            = 0;
			
			$data['is_expired']            = $is_expired;
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
		
		
	}
	
	
	function buyer_cancellation_requests()
	{
			if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
			
				$where_as="";
			if($this->session->userdata('login_type')=='broker_record')
			{
			    $where_as=" and  U.user_broker_id='".$this->session->userdata('user_id')."'";
			    
			}
			else
			{
			    
			    $where_as="and  BC.user_id='".$this->session->userdata('user_id')."'";
			    
			}
			
			/*
			$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.contract_process_initiation=1 and  BC.user_id='".$this->session->userdata('user_id')."'";
			*/
			
			$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.contract_process_initiation=1 ".$where_as;
			
			
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
				$data['buyer_cancellation'] = $record->result_array();
			}	
		
			$data['page_name']             = 'buyer_cancellation_requests';
        	$data['page_title']            = 'Cancellation Requests List';
			$data['show_cancel_button']            = 0;
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
		
		
	}
	
	
	

	function user_pending_contracts()
	{
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
			
			$where_as="";
			if($this->session->userdata('login_type')=='broker_record')
			{
			    $where_as=" and  U.user_broker_id='".$this->session->userdata('user_id')."'";
			    
			}
			else
			{
			    
			    $where_as="and  BC.user_id='".$this->session->userdata('user_id')."'";
			    
			}
			

			
			$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.status='0' and DATE(BC.contract_end_date)> DATE(NOW()) ".$where_as;
			
			
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
				$data['pending_contract'] = $record->result_array();
			}	
		
			$data['page_name']             = 'dashboard_user_pending_contract';
        	$data['page_title']            = 'Pending Contract List';
			$data['show_cancel_button']            = 0;
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
		
		
	}



    function buyerdetail($buyer_id=0)
	{
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
			

			$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where B.id='".$buyer_id."'";
			
			
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
				$data['pending_contract'] = $record->result_array();
			}	
		
			$data['page_name']             = 'buyer_realtor.php';
        	$data['page_title']            = 'Contract List';
			$data['ststus']            = $data['pending_contract'][0]['status'];
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
		
		
	}





	function user_contracts($ststus=0)
	{
			$where_as="";
			if($this->session->userdata('login_type')=='broker_record')
			{
			    $where_as=" and  U.user_broker_id='".$this->session->userdata('user_id')."'";
			    
			}
			else
			{
			    
			    $where_as="and  BC.user_id='".$this->session->userdata('user_id')."'";
			    
			}

			
			
			/*
			$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.status='".$ststus."' and  BC.user_id='".$this->session->userdata('user_id')."'";
			*/
			
			
			$sql = "SELECT B.name as full_name,B.email,B.phone, U.role, U.first_name,U.last_name,U.email as user_email , BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.status='".$ststus."' and DATE(BC.contract_end_date)> DATE(NOW()) ".$where_as;

			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
				$data['pending_contract'] = $record->result_array();
			}	
		
			$data['page_name']             = 'dashboard_user_pending_contract';
        	$data['page_title']            = 'Pending Contract List';
			$data['show_cancel_button']            = 0;
			$data['ststus']            = $ststus;

			
			$this->load->view('theme/'.$this->active_theme.'/index',$data);

	}
	
	
	function approved_cancellation()
	{
	     
	     $id=$amount=$this->input->get('id');
	     
	     $cancel_request_user_id=$amount=$this->input->get('cancel_request_user_id');
	     
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
	         
	         
	         
	     }
	     
     redirect(base_url() . 'user/buyer_cancellation_requests', 'refresh');        
	}


    function deny_cancellation()
    {
        $id=$amount=$this->input->get('id');
        $cancel_request_user_id=$amount=$this->input->get('cancel_request_user_id');
	    
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
            echo '<script>alert("Deny successfully")</script>';
            
            

	        
	        
	    }     
     redirect(base_url() . 'user/buyer_cancellation_requests', 'refresh');   
    }
    
    
    
    
    
    function link_with_docusign()
	{
		if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
            
        $code=$_GET['code'];
		
		
		
		//5f6633c0-9e1f-4041-a17f-ea9dcc2129b9:98471a37-9de7-4af0-a7bc-218872f787e7
		
		$integration_key='5f6633c0-9e1f-4041-a17f-ea9dcc2129b9';
		$secrat_id='98471a37-9de7-4af0-a7bc-218872f787e7';
		$credentials = base64_encode($integration_key . ':' . $secrat_id);
		
		
		//print_r($_REQUEST[code]);
		///$url="https://account-d.docusign.com/oauth/token?grant_type=authorization_code&code=".$code;
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://account-d.docusign.com/oauth/token',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('code' => $code,'redirect_uri' => 'https://multipleclientslist.com/user/link_with_docusign','grant_type' => 'authorization_code'),
		CURLOPT_HTTPHEADER => array(
		'Authorization: Basic '.$credentials
		
	  ),
	));

	$response_token = curl_exec($curl);
	curl_close($curl);
	$array_token=json_decode($response_token);
	$docusign_token= $array_token->access_token;
    
	echo $docusign_token;
	
	
	if(!empty($docusign_token))
	{	
	
		  $curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://account-d.docusign.com/oauth/userinfo',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$docusign_token
		  ),
		));


		$response_account = curl_exec($curl);
		curl_close($curl);
		$array_response_account=json_decode($response_account);
		$account_id=$array_response_account->accounts[0]->account_id;

        ////////////////////////number of rooms ////////////////////////////////////////
    
          $curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://demo.rooms.docusign.com/restapi/v2/accounts/'.$account_id.'/rooms/',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$docusign_token
		  ),
		));
        $response_rooms = curl_exec($curl);
		curl_close($curl);
		$array_response_rooms=json_decode($response_rooms);

        $rooms_details=$array_response_rooms->rooms;
    
        exit;
    
        foreach($rooms_details as $row)
        {
            
            $room_id=empty($row->roomId) ? 0 : $row->roomId;
            
            $room_name=empty($row->name) ? '' : $row->name;
            /////////////////////rooms details///////////////////////////////////
            $curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://demo.rooms.docusign.com/restapi/v2/accounts/'.$account_id.'/rooms/'.$room_id.'/field_data',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$docusign_token
		  ),
		));
        $response_room_detail = curl_exec($curl);
		curl_close($curl);
		$array_room_detail=json_decode($response_room_detail);

        $room_details=  $array_room_detail->data;    
            
        //print_r($room_details);
        ///echo "<br>";
            /////////////////////rooms details//////////////////////////////////
            
           
            
            $contract_start_date=empty($room_details->contractDate) ? '' : $room_details->contractDate;
            
            $phpdate = strtotime( $contract_start_date );
			$from_date = date( 'Y-m-d', $phpdate );
            

            $contract_end_date=empty($room_details->actualCloseDate) ? '' : $room_details->actualCloseDate;
            $phpdate_end = strtotime( $contract_end_date );
			$to_date = date( 'Y-m-d', $phpdate_end );
            
            $RoomStatus=0;
            if(!empty($room_details->companyRoomStatus))
            {
                
            $RoomStatus=$room_details->companyRoomStatus;    
            }
            
            
            
            if($RoomStatus==4)
            {
               //$cintract_type='Pending';
               $manual_status=0; 
            }
            elseif($RoomStatus==5)
            {
                //$cintract_type='Pending';
                $manual_status=0;
            }
            elseif($RoomStatus==6)
            {
                //$cintract_type='Closed';
				$manual_status=3;
            }
            elseif($RoomStatus==7)
            {
                //$cintract_type='Active';
				$manual_status=1;
            }
            elseif($RoomStatus==8)
            {
                //$cintract_type='Terminated';
				$manual_status=4;
            }
            else
            {
                $manual_status=9;
            }
            

            
            
            
            $data=array(
			'room_account_id'=>$account_id,
			'room_id'=>$room_id,
			'room_name'=>$room_name,
			'transaction_status'=>$RoomStatus,
			'user_id'=>$this->session->userdata('user_id'),
			'contract_type'=>'Buyer Agreement',
			'contract_start_date'=>$from_date,
			'contract_end_date'=>$to_date,
			'status'=>$manual_status,
			'created_at'=> date('Y-m-d')
		);
            
            //print_r($data);
            
           $this->db->insert('buyer_realtor_contract', $data);
            $contract_id = $this->db->insert_id(); 
        $buyer1=$room_details->buyer1;
         $buyer_full_name=empty($buyer1->name) ? '' : $buyer1->name;
         $buyer_email=empty($buyer1->email) ? '' : $buyer1->email;
         $buyer_phone=empty($buyer1->cellPhone) ? '' : $buyer1->cellPhone;
         
        $buyer2=$room_details->buyer2;
        $buyer2_full_name=empty($buyer2->name) ? '' : $buyer2->name;
         $buyer2_email=empty($buyer2->email) ? '' : $buyer2->email;
         $buyer2_phone=empty($buyer2->cellPhone) ? '' : $buyer2->cellPhone;
        
         
        $data_buyer1=array(
			'name'=>$buyer_full_name,
			'email'=>$buyer_email,
			'phone'=>$buyer_phone,
			'secondary_buyer_name'=>$buyer2_full_name,
			'secondary_buyer_email'=>$buyer2_email,
			'secondary_buyer_phone'=>$buyer2_phone,
			'user_id'=>$this->session->userdata('user_id'),
			'buyer_realtor_contract_id'=>$contract_id,
			'created_at'=> date('Y-m-d')
			);
		               
            $this->db->insert('buyers',$data_buyer1);

            	//check duplicate buyers///////////////	
		$sql12 = "SELECT *  FROM  buyers where name='".$buyer_full_name."' and  email='".$buyer_email."' and phone='".$buyer_phone."'";
		
		$record22 = $this->db->query($sql12);
		if($record22->num_rows() > 0) 
		{
			$data_repeat=array(
			'duplicate_contract'=>1
			);
			//$data['active_contract'] = $record->result_array();
			$this->db->where('id', $contract_id);
			$this->db->update('buyer_realtor_contract', $data_repeat);
			
		}	

		//check duplicate buyers///////////////		
			
	
            
            
            
            
        }
    
    
		
		/////////////////////////////number of rooms///////////////////////////////////
	}

	
	
		$data2=array(
			'link_with_room'=>1,
			'link_with_dotloop'=>2
			);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('user', $data2);
			///$this->session->set_flashdata('success', 'Link with dotloop data extract successfully');
			
			$this->session->set_flashdata('success', 'Linked with docusign successfully');
			
			
			redirect(base_url() . 'home/user_details', 'refresh');
	
		
    
    
	}
    
    
    function delink_with_dotloop()
	{
		if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
	
	    $user_id=$this->input->post('user_id');
	    $sql = "SELECT *  FROM  buyer_realtor_contract where user_id='".$user_id."' and loop_id>0 and dotloop_id>0";
		$record = $this->db->query($sql);
		if($record->num_rows() > 0) 
		{
			$contracts=$record->result_array();
			foreach($contracts as $contract)
			{
			    $this->db->where(array('buyer_realtor_contract_id'=>$contract['id'],'user_id'=>$user_id));
                $this->db->delete('buyers');
			    $this->db->last_query(); 
			}
		
    		$sql="delete from  buyer_realtor_contract where user_id='".$user_id."' and loop_id>0 and dotloop_id>0 ";
    		$res = $this->db->query($sql);
    		
    	    
			
		}	
	    	$data2=array(
			'link_with_dotloop'=>0,
			'link_with_room'=>0
			);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('user', $data2);
    		echo 1;
	    
	}
	
	
	function delink_with_docusign()
	{
	    if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
	
	    $user_id=$this->input->post('user_id');
	    $sql = "SELECT *  FROM  buyer_realtor_contract where user_id='".$user_id."' and room_id>0 and room_account_id!='' ";
		$record = $this->db->query($sql);
		if($record->num_rows() > 0) 
		{
			$contracts=$record->result_array();
			foreach($contracts as $contract)
			{
			    $this->db->where(array('buyer_realtor_contract_id'=>$contract['id'],'user_id'=>$user_id));
                $this->db->delete('buyers');
			    $this->db->last_query(); 
			}
		
    		$sql="delete from  buyer_realtor_contract where user_id='".$user_id."' and room_id>0 and room_account_id!='' ";
    		$res = $this->db->query($sql);
    		
    		
    	}	
    	
            $data2=array(
			'link_with_dotloop'=>0,
			'link_with_room'=>0
			);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('user', $data2);
    		echo 1;
	}

    public function check_contract_expired($id=0)
    {
         $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where status='1' and DATE(contract_end_date)< DATE(NOW()) and  id='".$id."'";
         $record_expired = $this->db->query($sql_expired);
		 if($record_expired->num_rows() > 0) 
		 {
			$record_expired_contract = $record_expired->result_array();
		
		    if($record_expired_contract[0]['tot']>0)
		    {
		        return 1;
		    }
		        return 0;          
		 }	
                return 0;
    }
	
	public function add_new_agent()
	{
		if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
		
		//print_r($_REQUEST);
		
		if(!empty($_REQUEST['submit']))
		{
			
			   $first_name                   = $this->input->post('first_name');
				$last_name                   = $this->input->post('last_name');
				$phone_number                   = $this->input->post('phone_number');
                $email                  = $this->input->post('email_address');
                $password               = $this->input->post('user_password');
				$user_broker_id               = $this->session->userdata('user_id');
				$office_address               = $this->input->post('office_address');
				$office_phone_number               = $this->input->post('office_phone_number');
				
				$affiliated_mls_name               = $this->input->post('affiliated_mls_name');
				
				
				/////$activation_code               = $this->input->post('activation_code');
				$user_type               = 'agent';
				
				
				
				$state_id               = $this->input->post('state_id');
				
				$state_list        =   $this->db->get_where('states' , array('id'=>$state_id))->row();
				
				//print_r($state_list->stste_postal);
				//exit;
				
				$auto_genrated= $this->common_model->generateRandomString(10);
				$activation_code=$state_list->stste_postal.'_'.$auto_genrated;
				
				$verify_otp= substr(str_shuffle("0123456789"), 0, 5);
		        $license_key= str_pad($affiliated_mls_name, 3, "0", STR_PAD_LEFT).substr(str_shuffle("0123456789"), 0, 7);
				

				$data['first_name']=$first_name;
				$data['last_name']=$last_name;
				$data['email']=$email;
				$data['password']= md5($password );
				$data['user_broker_id']=$user_broker_id;
				$data['office_address']=$office_address;
				$data['office_phone_number']=$office_phone_number;
				$data['affiliated_mls_name']=$affiliated_mls_name; 
				$data['state_id']=$state_id;
				$data['join_date'] = date('Y-m-d H:i:s');
				$data['last_login']     = date('Y-m-d H:i:s');
				$data['phone']=$phone_number;
				$data['role']           = $user_type;
				$data['status']=1;
				$data['verify_otp']=$verify_otp;
				$data['license_key']=$license_key;
				
				
				//activation_code	
               
                    $email_exist             = $this->common_model->check_email($email);
                    if($email_exist):
                        $this->session->set_userdata('error', 'Email already exists in the system. Please check');
					
					redirect(base_url() . 'user/add_new_agent', 'refresh');			
                    else:
                       

                        $this->db->insert('user', $data);
						//echo $this->db->last_query();
						
                        $insert_id                  =   $this->db->insert_id();
                        
                       
                        
                        //$this->email_model->send_otp_email($insert_id);
                        
						
						// $user_details = $this->db->get_where('user', array('user_id' => $insert_id))->result_array();
						
						//if(!empty($insert_id) and $user_details[0]['status']==0)
						//{
							
						//	$this->session->set_flashdata('success', 'OTP sent to your Email.');
						//	redirect(base_url() . 'home/verify_otp/'.$insert_id, 'refresh');	
						//}
						
						
						/*
						$trial_enable               =   $this->db->get_where('config' , array('title'=>'trial_enable'))->row()->value;
                        if($trial_enable =='1'):
                            $this->subscription_model->create_trial_subscription($insert_id);
                        endif;
						*/	

                        
                        $this->session->set_userdata('success', 'Signup successfully.now you can login to system. '.$email_error ?? $email_error);                    
                        redirect(base_url() . 'user/add_new_agent', 'refresh');
                    endif;

			
			
			
			
			
			
			
			
			
		}
		
			$data['page_name']      = 'add_agent';
            $data['page_title']     = 'Add Agent';
			$data['states']     = $this->db->get('states')->result_array();
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
	}
		
		public function purchase_plan()
		{
		?>	
			
			<script async src="https://js.stripe.com/v3/pricing-table.js"></script>
			<stripe-pricing-table pricing-table-id="prctbl_1NkSv9COCphm4NQSdEeXTqJ4"
publishable-key="pk_test_51NjTJzCOCphm4NQSH3xBAy5PHnzk891va1LC1Sdgp5pudHjxP0dOZuHZzKKpvaRYhPyzJHp1d1l8AaytU93BTeXE002gSzFFec">
			</stripe-pricing-table>
			
			
			<!--
			<script async src="https://js.stripe.com/v3/pricing-table.js"></script>
<stripe-pricing-table pricing-table-id="prctbl_1NmwxSINdZLjeWmiR3YHCcJ3"
publishable-key="pk_test_e4Y9ex1diC1dGDwVl9so5HKV">
</stripe-pricing-table>
	-->
			
			<?php
			
		}
		
		function billinghistory()
	{
		$data['page_name']		=	'billinghistory';
		$data['title']	=	'Billing History';
		//$this->load->view('frontend/index', $page_data);
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
    
}
    
