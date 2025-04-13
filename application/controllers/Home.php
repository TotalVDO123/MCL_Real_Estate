<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends Home_Core_Controller {
	
	public $active_theme;
	public function __construct(){
		parent::__construct();
		/* cache control */
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}


  public function index() {
  	    /*
		$landing_page_enable        	= $this->db->get_where('config' , array('title'=>'landing_page_enable'))->row()->value;
		$data['all_published_slider']	= $this->common_model->all_published_slider();
		$data['new_videos']				= $this->common_model->new_published_videos();
		$data['latest_videos']			= $this->common_model->latest_published_videos();
		$data['new_tv_series']			= $this->common_model->new_published_tv_series();
		$data['latest_tv_series']		= $this->common_model->latest_published_tv_series();		
		$data['title'] 					= $this->db->get_where('config' , array('title' =>'home_page_seo_title'))->row()->value;
		// seo
		$data['title']					= $this->db->get_where('config' , array('title' =>'home_page_seo_title'))->row()->value;
		$data['meta_description']		= $this->db->get_where('config' , array('title' =>'meta_description'))->row()->value;
		$data['focus_keyword']			= $this->db->get_where('config' , array('title' =>'focus_keyword'))->row()->value;


		$this->db->order_by("order", "asc");
		$data['homepage_sections'] = $this->db->get('homepage_sections')->result_array(); 

		$data['canonical']				= base_url();
		// end seo
		$data['page_name']				= 'home';

		// Homepage section

		$data['all_live_tvs']	        = $this->live_tv_model->get_all_live_tv();
		$data['popular_actors']	        = $this->common_model->get_popular_stars();
		$data['latest_episodes']	    = $this->common_model->get_latest_episodes();

		if(ovoo_config('active_theme') == 'flix'):
			$data['latest_videos']	        = $this->common_model->latest_published_videos(10, 1);
			$data['latest_tvseries']	    = $this->common_model->latest_published_tv_series(10, 1);
		endif;
		
		$data['features_genres']	    = $this->common_model->get_features_genres_homepage(6);
		$this->db->order_by('order', 'asc');
		$data['homepage_sections']      = $this->db->get('homepage_sections')->result_array();

		// end homepage section

		if($landing_page_enable == "1" && $this->active_theme == 'default'):
			echo 'adf';
			$this->load->view('theme/'.$this->active_theme.'/landing',$data);
		else:
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		endif;
		*/
		$data['title'] = 'Home';
		$data['page_name']='home';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
	
	public function ourstory() 
	{
	
	
		$data['title'] = 'Our Story';
		$data['page_name']='ourstory';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
		
	}
	
	public function ourplatform() 
	{
		$data['title'] = 'Our Platform';
		$data['page_name']='ourplatform';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
	
	
	public function signupform() 
	{
		$data['title'] = 'Signup';
		$data['page_name']='signup';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
	
	
	public function home2() {

		$data['all_published_slider']	= $this->common_model->all_published_slider();
		$data['new_videos']				= $this->common_model->new_published_videos();
		$data['latest_videos']			= $this->common_model->latest_published_videos();
		$data['new_tv_series']			= $this->common_model->new_published_tv_series();
		$data['latest_tv_series']		= $this->common_model->latest_published_tv_series();		
		// seo
		$data['title']					= $this->db->get_where('config' , array('title' =>'home_page_seo_title'))->row()->value;
		$data['meta_description']		= $this->db->get_where('config' , array('title' =>'meta_description'))->row()->value;
		$data['focus_keyword']			= $this->db->get_where('config' , array('title' =>'focus_keyword'))->row()->value;
		$data['canonical']				= base_url('all-movies.html');
		$this->db->order_by("order", "asc");
		$data['homepage_sections'] = $this->db->get('homepage_sections')->result_array(); 

		$data['canonical']				= base_url();
		// end seo
		$data['page_name']				= 'home';

		// Homepage section

		$data['all_live_tvs']	        = $this->live_tv_model->get_all_live_tv();
		$data['popular_actors']	        = $this->common_model->get_popular_stars();
		$data['latest_episodes']	    = $this->common_model->get_latest_episodes();

		if(ovoo_config('active_theme') == 'flix'):
			$data['latest_videos']	        = $this->common_model->latest_published_videos(10, 1);
			$data['latest_tvseries']	    = $this->common_model->latest_published_tv_series(10, 1);
		endif;
		
		$data['features_genres']	    = $this->common_model->get_features_genres_homepage(6);
		$this->db->order_by('order', 'asc');
		$data['homepage_sections']      = $this->db->get('homepage_sections')->result_array();

		// end homepage section
		$data['page_name']				= 'home';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
  
	public function search(){
		$filter 			= array();
		$search_string		= '';
		$filter['title'] 	= '';
		if(isset($_GET['q'])){
			$title 				= trim($this->input->get('q',true));
			$filter['title'] 	= $title;
			$search_string	   .= 'q='.$title;
		}
		$total_rows = $this->common_model->get_videos_num_rows($filter);
		$this->load->library("pagination");
		$config 					= array();
		$config["base_url"] 		= base_url() . "search?".$search_string;
		$config["total_rows"] 		= $total_rows;
		$config["per_page"] 		= 24;
		$config["uri_segment"] 		= 3;
		$config['full_tag_open'] 	= '<div class="pagination-container text-center"><ul class ="pagination">';
		$config['full_tag_close'] 	= '</ul></div><!--pagination-->';

		$config['first_link'] 		= '«';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link'] 		= '»';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';

		$config['next_link'] 		= '&rarr;';
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';

		$config['prev_link'] 		= '&larr;';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';

		$config['cur_tag_open'] 	= '<li class="active"><a href="#">';
		$config['cur_tag_close'] 	= '</a><div class="pagination-hvr"></div></li>';

		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '<div class="pagination-hvr"></div></li>';
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);
		$page 						= $this->input->get('per_page');   
        $data["all_published_videos"] = $this->common_model->get_videos($filter,$config["per_page"], $page);
		$data["links"] 				= $this->pagination->create_links();
		$data['total_rows']			= $config["total_rows"];
		$data['search_keyword']		= $filter['title'];
		$data['title'] 				= $filter['title'].'-search results';
		$data['page_name']			= 'search_results.php';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
	public function autoCompleteAjax()
    {
    	$tearm = $this->input->get('term');
    	$this->db->order_by('title',"ASC");
        $this->db->limit(5);
        $this->db->like('title',$tearm);
        $videos =  $this->db->get('videos')->result_array();
            foreach($videos as $video)
            {                
                $new_row['title']= $video['title'];
                $new_row['type']= "Movie";
                if($video['is_tvseries']=="1"){
                	$new_row['type']= "TV-Series";
                }
	            $new_row['image'] 	= $this->common_model->get_video_thumb_url($video['videos_id']);
                $new_row['url']		= base_url().'watch/'.$video['slug'].'.html';              
             	$row_set[] 			= $new_row;
            }        
        echo json_encode($row_set); 
    }
  
    public function movies(){
    	$movie_per_page              =   $this->db->get_where('config' , array('title'=>'movie_per_page'))->row()->value;
		$this->load->library("pagination");
		$total_movie 				= $this->common_model->movies_record_count();  
		$config 					= array();
		$config["base_url"] 		= base_url() . "home/movies";
		$config["total_rows"] 		= $total_movie;
		$config["per_page"] 		= $movie_per_page;
		$config["uri_segment"] 		= 3;
	    $config['full_tag_open'] 	= '<div class="pagination-container text-center"><ul class ="pagination">';
		$config['full_tag_close'] 	= '</ul></div><!--pagination-->';
		$config['first_link'] 		= '«';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= '»';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['next_link'] 		= '&rarr;';
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&larr;';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a href="#">';
		$config['cur_tag_close'] 	= '</a><div class="pagination-hvr"></div></li>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '<div class="pagination-hvr"></div></li>';
		$config['suffix']			= '.html'; 
		$config['use_page_numbers'] = TRUE;	

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["all_published_videos"] = $this->common_model->all_published_videos($movie_per_page, $page);
		$data["links"] = $this->pagination->create_links();
	    $data['total_rows']=$total_movie;
		// seo
		$data['title']				= $this->db->get_where('config' , array('title' =>'movie_page_seo_title'))->row()->value;
		$data['meta_description']	= $this->db->get_where('config' , array('title' =>'movie_page_meta_description'))->row()->value;
		$data['focus_keyword']		= $this->db->get_where('config' , array('title' =>'movie_page_focus_keyword'))->row()->value;
		$data['canonical']			= base_url('movies.html');
		// end seo

		$data['page_name']='movies';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}


	public function actor_movies($id){

		echo $id;
		exit();
    	$movie_per_page              =   $this->db->get_where('config' , array('title'=>'movie_per_page'))->row()->value;
		$this->load->library("pagination");
		$total_movie 				= $this->common_model->movies_record_count();  
		$config 					= array();
		$config["base_url"] 		= base_url() . "home/movies";
		$config["total_rows"] 		= $total_movie;
		$config["per_page"] 		= $movie_per_page;
		$config["uri_segment"] 		= 3;
	    $config['full_tag_open'] 	= '<div class="pagination-container text-center"><ul class ="pagination">';
		$config['full_tag_close'] 	= '</ul></div><!--pagination-->';
		$config['first_link'] 		= '«';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= '»';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['next_link'] 		= '&rarr;';
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&larr;';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a href="#">';
		$config['cur_tag_close'] 	= '</a><div class="pagination-hvr"></div></li>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '<div class="pagination-hvr"></div></li>';
		$config['suffix']			= '.html'; 
		$config['use_page_numbers'] = TRUE;	

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["all_published_videos"] = $this->common_model->all_published_videos($movie_per_page, $page);
		$data["links"] = $this->pagination->create_links();
	    $data['total_rows']=$total_movie;
		// seo
		$data['title']				= $this->db->get_where('config' , array('title' =>'movie_page_seo_title'))->row()->value;
		$data['meta_description']	= $this->db->get_where('config' , array('title' =>'movie_page_meta_description'))->row()->value;
		$data['focus_keyword']		= $this->db->get_where('config' , array('title' =>'movie_page_focus_keyword'))->row()->value;
		$data['canonical']			= base_url('movies.html');
		// end seo

		$data['page_name']  ='movies';
		$data['title']      ='movies of ';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}



	public function trailers(){
		$this->load->library("pagination");
    
		$config = array();
		$config["base_url"] = base_url() . "home/trailers";
		$config["total_rows"] = $this->common_model->trailers_record_count();
		$config["per_page"] = 24;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div class="pagination-container text-center"><ul class ="pagination">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';

		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a><div class="pagination-hvr"></div></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '<div class="pagination-hvr"></div></li>';
		$config['suffix']=  '.html'; 
  

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["all_published_videos"] = $this->common_model->fetch_trailers($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['total_rows']=$config["total_rows"];
		$data['title'] = 'Free Movies Online';
		$data['page_name']='movies';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}  

	public function request_movies(){

		$this->load->library("pagination");    
		$config = array();
		$config["base_url"] = base_url() . "home/request_movies";
		$config["total_rows"] = $this->common_model->requested_movie_record_count();
		$config["per_page"] = 24;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div class="pagination-container text-center"><ul class ="pagination">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';

		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a><div class="pagination-hvr"></div></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '<div class="pagination-hvr"></div></li>';
		$config['suffix']=  '.html'; 
  

		$this->pagination->initialize($config);
		$page 							= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["all_published_videos"] 	= $this->common_model->fetch_request_movies($config["per_page"], $page);
		$data["links"] 					= $this->pagination->create_links();
		$data['total_rows']				= $config["total_rows"];
		$data['title'] 					= 'Free Movies  Request Online';
		$data['page_name']				= 'request_movies';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
    }

    public function request_for_movies(){
		$data['title'] = 'Send Us Movie Request';
		$data['page_name']='requiest_for_movie';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}

	public function dmca(){
		$data['title'] = 'DMCA';
		$data['page_name']='dmca';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}


  
	public function faq(){
		$data['title'] = 'FAQ';
		$data['page_name']='faq';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
  
  
    public function privacy_policy(){
		$data['title'] = 'Privacy Policy';
		$data['page_name']='privacy_policy';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
  
  
    public function terms_and_conditions(){
		$data['title'] = 'Terms & Condition';
		$data['page_name']='terms_and_conditions';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
  
  public function web_accessibility(){
		$data['title'] = 'Web Accessibility';
		$data['page_name']='web_accessibility';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
  
  
  public function user_details(){
	  
	   if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
		
		
		$data['duplicate_contract']=0;
		$sql = "SELECT B.*, U.first_name,U.last_name,BC.id as contract_id FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.duplicate_contract=1 and  BC.user_id='".$this->session->userdata('user_id')."'";
			$record11 = $this->db->query($sql);
			if($record11->num_rows() > 0) 
			{
				$data['duplicate_contract']=1;
			}
		
		
		
		//ratnesh kumar
		$user_id=$this->session->userdata('user_id');
		$data['users']=$this->db->get_where('user' , array('user_id'=>$user_id))->row();
		$user_broker_id=$data['users']->user_broker_id;
		
		///////////get broker_details//////////////////////////
		$data['broker_details']=$this->db->get_where('user' , array('user_id'=>$user_broker_id))->row();
		
	
		$data['title'] = 'User Details';
		$data['page_name']='user_details';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
  
  public function dashboard($user_id=0){
		
		if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
		
        $data['total_agents']='';
		
		$data['full_name']="";
		$data['login_type'] = "";
		$sql_user = "SELECT * FROM  user where user_id='".$user_id."'";
		$record_user = $this->db->query($sql_user);
			if($record_user->num_rows() > 0) 
			{
				$user_details = $record_user->result_array();
				 $login_type= $user_details[0]['role'];
				$data['login_type'] = $login_type; 
			    $data['full_name']=ucfirst($user_details[0]['first_name'])." ".ucfirst($user_details[0]['last_name']);	 
			}
			
			
	    if($login_type=='broker_record')
		{
		  
		     $sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where C.status='1' and DATE(C.contract_end_date)> DATE(NOW()) and  U.user_broker_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['active_contract'] = $record->result_array();
				}	
				
				
			//$sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where  DATE(contract_end_date)< DATE(NOW()) and  user_id='".$this->session->userdata('user_id')."'";
			$sql_expired = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where  DATE(C.contract_end_date)< DATE(NOW()) and  U.user_broker_id='".$user_id."'";	
				$record_expired = $this->db->query($sql_expired);
				if($record_expired->num_rows() > 0) 
				{
					$data['record_expired_contract'] = $record_expired->result_array();
				}	
					
				
				
				
				$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where C.status='0' and DATE(C.contract_end_date)> DATE(NOW()) and U.user_broker_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['pending_contract'] = $record->result_array();
				}
				
				$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where C.status='2' and DATE(C.contract_end_date)> DATE(NOW()) and  U.user_broker_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['inactive_contract'] = $record->result_array();
				}
				
				
				$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where C.status='3' and DATE(C.contract_end_date)> DATE(NOW()) and  U.user_broker_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['closed_contract'] = $record->result_array();
				}
				
			
				
				$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where C.status='4' and DATE(C.contract_end_date)> DATE(NOW()) and  U.user_broker_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['terminated_contract'] = $record->result_array();
				}
				
					
				$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where  U.user_broker_id='".$user_id."'";
				$res = $this->db->query($sql);
				if ($res->num_rows() > 0) 
				{
					$tot_contract = $res->result_array(); //contracts found with all buyer details
					$data['tot_contract']=$tot_contract;
					
				}
				
                
                //SELECT *, DATE(`Date`) < DATE(NOW()) AS is_old ...

                
                //$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where C.status='1' and DATE(C.contract_end_date)> DATE(NOW()) and	    user_broker_id='".$this->session->userdata('user_id')."'";
                
                
                
                
                $sql = "SELECT count(*) as tot FROM user  where  user_broker_id='".$user_id."'";
				$res = $this->db->query($sql);
				if ($res->num_rows() > 0) 
				{
					$tot_contract = $res->result_array(); //contracts found with all buyer details
					$data['tot_agent']=$tot_contract;
					
				}
				$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where U.user_broker_id='".$user_id."' and C.contract_process_initiation=1 ";
        		
        		$res = $this->db->query($sql);
        		if ($res->num_rows() > 0) 
        		{
        			$tot_contract_process = $res->result_array(); //contracts found with all buyer details
        			$data['tot_contract_process']=$tot_contract_process;
        			
        		}

                
                
                $data['title'] = 'Dashboard';
				$data['page_name']='dashboard';
		    
	            $sql = "SELECT U.*,S.state_name FROM user U left join states S on U.state_id=S.id  where  U.user_broker_id='".$user_id."'";
	       
				$res11 = $this->db->query($sql);
				if ($res11->num_rows() > 0) 
				{
					$tot_agents = $res11->result_array(); 
					$data['total_agents']=$tot_agents;
				
				}     
		    
		    
		}
		else if($login_type=='admin')
		{
			
			$sql = "SELECT B.name as full_name, U.role, U.first_name,U.last_name,U.email as user_email ,U.phone , U.user_id as userid, BC.* FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id
			";
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
				$data['row_contract'] = $record->result_array();
			}	
			
				
			$sql = "SELECT count(*) as tot FROM buyer_realtor_contract ";
			$res = $this->db->query($sql);
			if ($res->num_rows() > 0) 
			{
				$tot_contract = $res->result_array(); //contracts found with all buyer details
				$data['tot_contract']=$tot_contract;
				
			}

				
				$data['title'] = 'Admin Dashboard';
				$data['page_name']='dashboard_admin';	
			}
			

			else
			{	
				/*
				$sql = "SELECT B.name as full_name, U.role, U.first_name,U.last_name,U.email as user_email ,U.phone, BC.* FROM  buyer_realtor_contract BC 
				left join  user U on BC.user_id=U.user_id 
				left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.user_id='1' and  BC.user_id='".$this->session->userdata('user_id')."'";
				*/

				$sql = "SELECT count(*) as tot FROM  buyer_realtor_contract where status='1' and DATE(contract_end_date)> DATE(NOW()) and  user_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['active_contract'] = $record->result_array();
				}	
				
				
				//$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where C.status='1' and DATE(C.contract_end_date)> DATE(NOW()) and	    user_broker_id='".$this->session->userdata('user_id')."'";
				
				
				$sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where  DATE(contract_end_date)< DATE(NOW()) and  user_id='".$user_id."'";
				
				$record_expired = $this->db->query($sql_expired);
				if($record_expired->num_rows() > 0) 
				{
					$data['record_expired_contract'] = $record_expired->result_array();
				}	
				
				
				
				
				$sql = "SELECT count(*) as tot FROM  buyer_realtor_contract where status='0' and  DATE(contract_end_date)> DATE(NOW()) and  user_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['pending_contract'] = $record->result_array();
				}
				
				$sql = "SELECT count(*) as tot FROM  buyer_realtor_contract where status='2' and DATE(contract_end_date)> DATE(NOW()) and  user_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['inactive_contract'] = $record->result_array();
				}
				
				
				$sql = "SELECT count(*) as tot FROM  buyer_realtor_contract where status='3' and DATE(contract_end_date)> DATE(NOW()) and  user_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['closed_contract'] = $record->result_array();
				}
				
				$sql = "SELECT count(*) as tot FROM  buyer_realtor_contract where status='3' and DATE(contract_end_date)> DATE(NOW()) and  user_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['closed_contract'] = $record->result_array();
				}
				
				$sql = "SELECT count(*) as tot FROM  buyer_realtor_contract where status='4' and DATE(contract_end_date)> DATE(NOW()) and  user_id='".$user_id."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['terminated_contract'] = $record->result_array();
				}
				
					
				$sql = "SELECT count(*) as tot FROM buyer_realtor_contract where user_id='".$user_id."'";
				$res = $this->db->query($sql);
				if ($res->num_rows() > 0) 
				{
					$tot_contract = $res->result_array(); //contracts found with all buyer details
					$data['tot_contract']=$tot_contract;
					
				}
				
				
			///same contract retrieved from dotloop which is already there in system



			$data['duplicate_contract_exist']=0;
			$data['duplicate_contract']="";
			$sql = "SELECT B.*, U.first_name,U.last_name,BC.id as contract_id FROM  buyer_realtor_contract BC 
			left join  user U on BC.user_id=U.user_id 
			left join buyers B on BC.id=B.buyer_realtor_contract_id where BC.duplicate_contract=1 and  BC.user_id='".$user_id."'";
			$record11 = $this->db->query($sql);
			if($record11->num_rows() > 0) 
			{
				$data['duplicate_contract_exist']=1;
				$data['duplicate_contract'] = $record11->result_array();
			}	
				
				
				
				$data['title'] = 'Dashboard';
				$data['page_name']='dashboard';
			
			}
			
			
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}




	public function users_split(){
		
		/*	
		$sql = "SELECT count(*) as tot FROM buyer_realtor_contract ";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$tot_contract = $res->result_array(); //contracts found with all buyer details
			$data['tot_contract']=$tot_contract;
			
		}
		*/
			
			$data['title'] = 'Total number of users split';
			$data['page_name']='dashboard_users_split';	
			
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}

  
  
  public function add_buyer(){
	  
	  if ($this->session->userdata('login_status') != 1)
      redirect(base_url() . 'user/login', 'refresh');
 		
		$user_id=$this->session->userdata('user_id');
		$data['users']=$this->db->get_where('user' , array('user_id'=>$user_id))->row();
		
		$data['name'] 			= $this->input->GET('name');
		
		$data['last_name'] 			= $this->input->GET('last_name');
		
		$data['email'] 			= $this->input->GET('email');
		$data['phone'] 			= $this->input->GET('phone');
		
		
		
		
		$data['sbuyer_name'] 			= $this->input->GET('sbuyer_name');
		
		$data['sbuyer_last_name'] 			= $this->input->GET('secondary_last_name');
		
		
		$data['sbuyer_email'] 			= $this->input->GET('sbuyer_email');
		$data['sbuyer_phone'] 			= $this->input->GET('sbuyer_phone');
		
		
		
		
		$data['is_add_buyer'] 			= $this->input->GET('add');
		
		
		
		$data['title'] = 'Add Buyer';
		$data['page_name']='add_buyer';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
  
  public function search_contracts(){
	  
	  if ($this->session->userdata('login_status') != 1)
      redirect(base_url() . 'user/login', 'refresh');
	  
		$data['title'] = 'Search Contracts';
		$data['page_name']='search_buyer';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
  
  
    public function contact()
    {
		
		
		if($_REQUEST['fullname'])
		{
		    
		    
		    echo "==============";
		    exit;
		}
		else
		{
		$data['title'] = 'Contact Us';
		$data['page_name']='contactus';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
		}
		    
	}

	function send_message(){
        $response = array();        
        //Ajax database name,username and password request
        $name                   	= $_POST["name"];
        $email                   	= $_POST["email"]; 
        $message                   	= $_POST["message"];
        //$this->email_model->contact_email($name , $email, $message);
        $response['status'] = 'success';        
        //Replying ajax request with validation response
        echo json_encode($response);
    }

    function contact_process(){
    	$name 			= $this->input->post('name');
    	$email 			= $this->input->post('email');
    	$message		= $this->input->post('message');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[8]');
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[8]');
		if ($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata('error', validation_errors());
            redirect(base_url() . 'contact-us.html', 'refresh');
        }
        else
        {
        	$this->load->model('email_model');
        	if($this->email_model->contact_email($name , $email, $message)){
        		//$insert_id = '1043';
        		//$this->email_model->new_movie_notification($insert_id);
        		$this->session->set_flashdata('success', 'Message send successfully.');
    		}else{
    			$this->session->set_flashdata('error', 'Oops! Something went wrong.');	
    	    	rediret(base_url() . 'contact-us.html', 'refresh');
    		}
    	}
    	redirect(base_url() . 'contact-us.html', 'refresh');
    }

    function send_movie_request(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('movie_name', 'Movie Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|min_length[4]');
        $this->form_validation->set_rules('message', 'Message', 'trim');
        if ($this->form_validation->run() == FALSE):
            $this->session->set_flashdata('error', json_encode(validation_errors()));
            redirect($this->agent->referrer());
        else:
            $data['name']           =   trim($this->input->post('name'));
            $data['email']          =   trim($this->input->post('email'));
            $data['movie_name']     =   trim($this->input->post('movie_name'));
            $data['message']        =   trim($this->input->post('message'));
            $this->db->insert('request',$data);
            $this->session->set_flashdata('success', 'Request sent successfully.');
        	redirect($this->agent->referrer());
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

    function view_modal($page_name = '' , $param2 = '' , $param3 = ''){
            $account_type       =   $this->session->userdata('login_type');
            $data['param2']     =   $param2;
            $data['param3']     =   $param3;
            //$this->load->view('front_end/'.$page_name.'.php' ,$data);
            $this->load->view('theme/'.$this->active_theme.'/'.$page_name.'.php',$data);       
        
	}


	function continue_watching(){
		$data['watch'] = $this->input->post('watch');

		echo json_encode( array(
		    'view_html' => $this->load->view('theme/'.$this->active_theme.'/'.'continue_watching_view'.'.php',$data,TRUE),
		    'data'      => $data['watch']
		));
	}
	
	
	function cancel_contract()
	{
		if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
		
		
		if($this->session->userdata('login_type')=='broker_record')
		{
		  
		     $sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where C.status='1' and  U.user_broker_id='".$this->session->userdata('user_id')."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['active_contract'] = $record->result_array();
				}	
				
				$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where C.status='0' and  U.user_broker_id='".$this->session->userdata('user_id')."'";
				$record = $this->db->query($sql);
				if($record->num_rows() > 0) 
				{
					$data['pending_contract'] = $record->result_array();
				}
				
				$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where U.user_broker_id='".$this->session->userdata('user_id')."'";
        		$res = $this->db->query($sql);
        		if ($res->num_rows() > 0) 
        		{
        			$tot_contract = $res->result_array(); //contracts found with all buyer details
        			$data['tot_contract']=$tot_contract;
        			
        		}
				
		        //$sql = "SELECT count(*) as tot FROM buyer_realtor_contract where user_id='".$this->session->userdata('user_id')."' and contract_process_initiation=1 ";
        		
        		$sql = "SELECT count(*) as tot FROM user U inner join buyer_realtor_contract C on U.user_id=C.user_id  where U.user_broker_id='".$this->session->userdata('user_id')."' and C.contract_process_initiation=1 ";
        		
        		$res = $this->db->query($sql);
        		if ($res->num_rows() > 0) 
        		{
        			$tot_contract_process = $res->result_array(); //contracts found with all buyer details
        			$data['tot_contract_process']=$tot_contract_process;
        			
        		}
	
		}
		else
		{
		
		
		
    		$sql = "SELECT count(*) as tot FROM  buyer_realtor_contract where status='1' and  user_id='".$this->session->userdata('user_id')."'";
    		$record = $this->db->query($sql);
    		if($record->num_rows() > 0) 
    		{
    			$data['active_contract'] = $record->result_array();
    		}	
    		
    		$sql = "SELECT count(*) as tot FROM  buyer_realtor_contract where status='0' and  user_id='".$this->session->userdata('user_id')."'";
    		$record = $this->db->query($sql);
    		if($record->num_rows() > 0) 
    		{
    			$data['pending_contract'] = $record->result_array();
    		}
    		
    		
    			
    		$sql = "SELECT count(*) as tot FROM buyer_realtor_contract where user_id='".$this->session->userdata('user_id')."'";
    		$res = $this->db->query($sql);
    		if ($res->num_rows() > 0) 
    		{
    			$tot_contract = $res->result_array(); //contracts found with all buyer details
    			$data['tot_contract']=$tot_contract;
    			
    		}
    
    		
           $sql = "SELECT count(*) as tot FROM buyer_realtor_contract where user_id='".$this->session->userdata('user_id')."' and contract_process_initiation=1 ";
    		$res = $this->db->query($sql);
    		if ($res->num_rows() > 0) 
    		{
    			$tot_contract_process = $res->result_array(); //contracts found with all buyer details
    			$data['tot_contract_process']=$tot_contract_process;
    			
    		}
		
		}		
		
		$data['title'] = 'Cancel Contract';
		$data['page_name']='cancel_contract';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	
	}
	
	
	
	function buyer_search()
	{
		$buyer_name 			= $this->input->post('buyer_name');
		$buyer_email 			= $this->input->post('buyer_email');
		$buyer_phone 			= $this->input->post('buyer_phone');
		
		$show_cancel_button 			= $this->input->post('show_cancel_button');

		$body_string="";
		$body_string.='<ul class="list-group">';
		$body_string.='<li class="list-group-item">Buyer Name: '. $buyer_name .'</li>';
		$body_string.='<li class="list-group-item">Buyer Email: '. $buyer_email .'</li>';
		$body_string.='<li class="list-group-item">Buyer Phone: '. $buyer_phone  .'</li>';
					
		$body_string.='</ul>';

		
		$sql = "SELECT B.*,U.first_name,U.last_name,U.email as user_email ,BC.* FROM buyers B left join buyer_realtor_contract BC on  B.user_id=BC.user_id
		
		
		left join  user U on B.user_id=U.user_id where B.name='".$buyer_name."' and B.email='".$buyer_email."' and B.phone ='".$buyer_phone."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$rowcoll = $res->result_array();
			
			$body_string.='<div class="container">';
			$body_string.='<div class="row">';
			$body_string.='<div class="col-3 col-sm-3"><strong>Realtor Name</strong></div>';	
			$body_string.='<div class="col-3 col-sm-3"><strong>Email</strong></div>';
			$body_string.='<div class="col-2 col-sm-3"><strong>Contract Type</strong></div>';		
			$body_string.='<div class="col-3 col-sm-3"><strong>Action</strong></div>';
			$body_string.='</div>';
			
			$body_string.='<div class="row">';
			foreach($rowcoll  as $row)
			{
				//print_r($row);
				
				$body_string.='<div class="col-3 col-sm-3">'.$row['first_name']." ".$row['last_name'].'</div>';	
				$body_string.='<div class="col-3 col-sm-3">'.$row['user_email'].'</div>';			
				$body_string.='<div class="col-3 col-sm-2">'.$row['contract_type'].'</div>';			
				
				if($show_cancel_button==1)
				{	
				
				$body_string.='<div class="col-3 col-sm-4">
				<button type="button" class="btn">Cancel</button>&nbsp;
				<a href="'. base_url().'user/view_buyercontract/'.$row['id'].'">View Contract</a></div>';	
				}
				else
				{
				$body_string.='<div class="col-3 col-sm-4">
				<a href="'. base_url().'user/view_buyercontract/'.$row['id'].'">View Contract</a></div>';	
					
				}		
					
			}
			$body_string.='</div>';
			$body_string.='</div>';
				//$body_string.='<button type="button" class="btn btn-primary">Cancel</button>';
				echo $body_string;
			
		}
		else
		{
			echo "Buyer not found";
		}	
	}
	
	function contract_status()
	{
		
		$id=$this->input->GET('id');
		$status=$this->input->GET('status');
		
		$savestatus=($status==1) ? 0 : 1;
		
		$data=array(
		
		"status"=>$savestatus
		);
		
		$this->db->where('id', $id);
		$this->db->update('buyer_realtor_contract', $data);
		
		redirect(base_url() . 'user/contract_revision', 'refresh');
	}
	
	function contract_deny_status()
	{
		$id=$this->input->GET('id');
		$status=$this->input->GET('status');
		$data=array(
		"status"=>$status
		);
		
		$this->db->where('id', $id);
		$this->db->update('buyer_realtor_contract', $data);
		
		redirect(base_url() . 'user/contract_revision', 'refresh');
				
		
	}
	
	
	function verify_otp($user_id=0)
	{
		
			$sql = "SELECT verify_otp from user where user_id='".$user_id."'";
			$res = $this->db->query($sql);
			if ($res->num_rows() > 0) 
			{
				$result = $res->result_array(); 
				$data['otp_no']=$result[0]['verify_otp'];
			}	
		$data['user_id']=$user_id;
		$data['title'] = 'Verify OTP';
		$data['page_name']='verify_otp';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
		
	}
	
	function check_otp()
	{
		$user_id=$this->input->POST('user_id');
		$otp=$this->input->POST('otp');
		
		$sql = "SELECT * FROM user where user_id='".$user_id."'  and  verify_otp='".$otp."'";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
		  
		  $data=array(
		  "verify_otp"=>0,
		  "status"=>1
		  );
		$this->db->where('user_id', $user_id);
		$this->db->update('user', $data);
		  
		  
		  echo 1;	
		}
		else
		{
		  echo 0;	
		}	
		
	}
	
	
	function search_contracts_list()
	{
		
		if ($this->session->userdata('login_status') != 1)
            redirect(base_url() . 'user/login', 'refresh');
		
		$buyer_name 			= $this->input->GET('name');
		$buyer_last_name 			= $this->input->GET('last_name');
		$buyer_email 			= $this->input->GET('email');
		$buyer_phone 			= $this->input->GET('phone');
		
		
		$secondary_name 			= $this->input->GET('secondary_name');
        $secondary_last_name 			= $this->input->GET('secondary_last_name');
		$secondary_email 			= $this->input->GET('secondary_email');
		$secondary_phone 			= $this->input->GET('secondary_phone');
		
		$search_type 			= $this->input->GET('search_type');
		
		$this->session->set_userdata('search_type',$search_type);
		
		$is_search 				= $this->input->GET('s');
		$show_cancel_button 			= abs($this->input->GET('search'));
		
		$where_as="";
		if(!empty($secondary_name) and !empty($secondary_phone) and !empty($secondary_email) )
		{
			$where_as.=" OR (( B.secondary_buyer_name='".$secondary_name."' OR B.secondary_buyer_last_name='".$secondary_last_name."' ) and B.secondary_buyer_email='".$secondary_email."' and B.secondary_buyer_phone='".$secondary_phone."' ) ";
		}	
		
		$where_as_name_phone="";
		if(!empty($secondary_name) and !empty($secondary_phone) )
		{	
			$where_as_name_phone.=" OR( ( B.secondary_buyer_name='".$secondary_name."' OR B.secondary_buyer_last_name='".$secondary_last_name."' ) and B.secondary_buyer_phone='".$secondary_phone."' ) ";
		}
		$where_as_email="";
		if(!empty($secondary_email) )
		{
			$where_as_email.=" OR B.secondary_buyer_email='".$secondary_email."'";
		}
		
		
		
		//$show_cancel_button=1;
		

		$sql = "SELECT B.*, U.user_broker_id,U.first_name,U.last_name,U.email as user_email ,BC.* FROM buyers B left join buyer_realtor_contract BC on  B.buyer_realtor_contract_id=BC.id
		left join  user U on B.user_id=U.user_id where  ( B.name='".$buyer_name."' or B.last_name='".$buyer_last_name."') and B.email='".$buyer_email."' and B.phone ='".$buyer_phone."'".$where_as;

		/*
		 $sql = "SELECT B.*, U.user_broker_id,U.first_name,U.last_name,U.email as user_email ,BC.* FROM buyers B left join buyer_realtor_contract BC on  B.buyer_realtor_contract_id=BC.id
		left join  user U on B.user_id=U.user_id where BC.status!=4 and (B.name='".$buyer_name."' OR B.secondary_buyer_name='".$buyer_name."')  and ( B.email='".$buyer_email."' OR 	B.secondary_buyer_email='".$buyer_email."') and ( B.phone ='".$buyer_phone."' OR B.secondary_buyer_phone='".$buyer_phone."')";
	
		*/
		
		
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$contract_result = $res->result_array(); //contracts found with all buyer details
			$data['contracts1']=$contract_result;
		
		}
	
	
	$sql = "SELECT B.*, U.user_broker_id,U.first_name,U.last_name,U.email as user_email ,BC.* FROM buyers B left join buyer_realtor_contract BC on  B.buyer_realtor_contract_id=BC.id
		left join  user U on B.user_id=U.user_id where   B.email='".$buyer_email."'".$where_as_email;
		

        /*
        $sql = "SELECT B.*, U.user_broker_id,U.first_name,U.last_name,U.email as user_email ,BC.* FROM buyers B left join buyer_realtor_contract BC on  B.buyer_realtor_contract_id=BC.id
		left join  user U on B.user_id=U.user_id where BC.status!=4 and ( B.email='".$buyer_email."' OR B.secondary_buyer_email='".$buyer_email."')";

	    */	
		
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) 
		{
			$contract_result2 = $res->result_array(); //contracts found with only buyer email
			$data['contracts2']=$contract_result2;
		
		}
		
		$data['contracts3']=array();
		if(!empty($buyer_phone) or !empty($secondary_phone))
		{
		
    		$sql = "SELECT B.*, U.user_broker_id, U.first_name,U.last_name,U.email as user_email ,BC.* FROM buyers B left join buyer_realtor_contract BC on  B.buyer_realtor_contract_id=BC.id
    		left join  user U on B.user_id=U.user_id where  ( B.name='".$buyer_name."' or B.last_name='".$buyer_last_name."') and B.phone ='".$buyer_phone."'".$where_as_name_phone ;
    		
    		
    		/*
    		 $sql = "SELECT B.*, U.user_broker_id, U.first_name,U.last_name,U.email as user_email ,BC.* FROM buyers B left join buyer_realtor_contract BC on  B.buyer_realtor_contract_id=BC.id
    		left join  user U on B.user_id=U.user_id where BC.status!=4 and ( B.name='".$buyer_name."' OR B.secondary_buyer_name='".$buyer_name."') and ( B.phone ='".$buyer_phone."' OR B.secondary_buyer_phone='".$buyer_phone."')";
    		*/
    		
    		$res = $this->db->query($sql);
    		if ($res->num_rows() > 0) 
    		{
    			$contract_result3 = $res->result_array(); //Suggested buyer- phone and name
    
    			$data['contracts3']=$contract_result3;
    		
    		}
		}
		
		$data['name']=$this->input->GET('name');
		$data['last_name']= $this->input->GET('last_name');
		
		$data['email']=$this->input->GET('email');
		$data['phone']=$this->input->GET('phone');
		
		
		
		
		$data['secondary_name']=$secondary_name;
		
		$data['sbuyer_last_name']=$secondary_last_name;
		
		
		$data['secondary_email']=$secondary_email;
		$data['secondary_phone']=$secondary_phone;
		
		
		
		$data['is_search']=$is_search;

        $data['search_type']=$search_type;
        

		$data['show_cancel_button']=$show_cancel_button;
		$data['title'] = 'Search Contracts Result';
		$data['page_name']='search_contract_result';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	
	}	
		
		function keep_both_contract($buyer_realtor_contract_id=0)
		{
			if(!empty($buyer_realtor_contract_id))
			{
			$data=array(
				"duplicate_contract"=>2
			);
			$this->db->where('id', $buyer_realtor_contract_id);
			$this->db->update('buyer_realtor_contract', $data);
				
				
			}
		redirect(base_url() . 'home/dashboard', 'refresh');				
			
		}
		
		
		function replace_contract($buyer_realtor_contract_id=0)
		{
			
			
			/*
			$del_condation=array(
				 'name'=>'deepak kumat',
				 'email'=>'deepak@gmail.com',
				 'phone'=>'4874784578'
				 );	
				 $this->db->where($del_condation);
				 $this->db->delete('buyers');
			
			
			exit;
	*/		
			
			if(!empty($buyer_realtor_contract_id))
			{
			$sql = "SELECT B.* from buyer_realtor_contract BC left join  buyers B on BC.id=B.buyer_realtor_contract_id  where BC.id='".$buyer_realtor_contract_id."'";
			$res = $this->db->query($sql);
			if ($res->num_rows() > 0) 
			{
				$result = $res->result_array(); //Suggested buyer- phone and name
				
				$buyer_name=$result[0]['name'];	
				$buyer_email=$result[0]['email'];
				$buyer_phone=$result[0]['phone'];
				 
				//$sql_buyer = "SELECT * from buyers where name='".$buyer_name."' and email='".$buyer_email."' and phone='".$buyer_phone."' and buyer_realtor_contract_id!='".$buyer_realtor_contract_id."'";		
				
				$sql_buyer = "SELECT * from buyers where name='".$buyer_name."' and email='".$buyer_email."' and phone='".$buyer_phone."' order by id asc ";
				
				$res1 = $this->db->query($sql_buyer);
				if($res1->num_rows() > 0) 
				{
				  $result1 = $res1->result_array(); 
				  $contract_id=$result1[0]['buyer_realtor_contract_id'];
				   
				  
				   
				   $this->db->where('id',$contract_id);
				   $this->db->delete('buyer_realtor_contract');
				   
				   $del_condation=array(
				 'name'=>$buyer_name,
				 'email'=>$buyer_email,
				 'phone'=>$buyer_phone,
				 'buyer_realtor_contract_id'=>$contract_id
				 );	
				 $this->db->where($del_condation);
				 $this->db->delete('buyers');
				 
				 
				 
				 $data=array(
				"duplicate_contract"=>0
			);
			$this->db->where('id', $buyer_realtor_contract_id);
			$this->db->update('buyer_realtor_contract', $data);
				
				} 
				 
				 
				
				
			}
				
			}
		redirect(base_url() . 'home/dashboard', 'refresh');				
			
		}
		
	
		function docusign_login()
		{
			$code=$this->input->get('code');
			$integration_key='aab5ec6c-0182-4320-9e87-d676e33fe1a9';
		$secrat_id='8b3ad5a6-d2d3-4fd8-b877-57166bd5d7c8';
		$credentials = base64_encode($integration_key . ':' . $secrat_id);
			
		//$url="https://account-d.docusign.com/oauth/token";
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
		CURLOPT_POSTFIELDS => array('code' => $code,'grant_type' => 'authorization_code','redirect_uri' => 'http://urbansuvidha.com/mcl/home/docusign_login'),
		CURLOPT_HTTPHEADER => array(
		'Authorization: Basic '.$credentials
		
	  ),
	));
	$response_token = curl_exec($curl);
	curl_close($curl);
	$array_token=json_decode($response_token);
	$docusign_access_token= $array_token->access_token;		
	
			echo 'token'.$docusign_access_token;
			
	//// get userinfo of docusign
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
			'Authorization: Bearer '.$docusign_access_token
		  ),
		));


		$response_account = curl_exec($curl);
		curl_close($curl);
		$userinfo=json_decode($response_account);
		
		echo "<pre>";
		print_r($userinfo);
			
			
		}
		
	    function cancel_buyer_contract()
	    {
	       
	       	$id=$this->input->POST('id');
    		$data=array(
    		"contract_process_initiation"=>1
    		);
    		
    		$this->db->where('id', $id);
    		$this->db->update('buyer_realtor_contract', $data);
    		echo $afftectedRows = $this->db->affected_rows();

	    }
	
	
	    function cancel_contract_by_realtor()
	    {
	       $id=$this->input->POST('id');
	       
	       
    		$data=array(
    		"contract_process_initiation"=>1,
    		"cancel_request_user_id"=>$this->session->userdata('user_id')
    		);
    		
    		$this->db->where('id', $id);
    		$this->db->update('buyer_realtor_contract', $data);
    		$afftectedRows = $this->db->affected_rows();
	      if($afftectedRows>0)
	      {
	      $this->load->model('email_model');
          $this->email_model->cancellation_by_realtor_mail($id);
	      
	        echo 1;
	      }
	      else
	      {
	        echo 0;  
	      }
	       
	       	/*
	       	$id=$this->input->POST('id');
    		$data=array(
    		"contract_process_initiation"=>1
    		);
    		
    		$this->db->where('id', $id);
    		$this->db->update('buyer_realtor_contract', $data);
    		echo $afftectedRows = $this->db->affected_rows();
            */
	    }
	
	
	
	    function cancel_contract_approved_by_buyer($id=0)
	    {
    		
    		$sql = "SELECT * FROM  buyer_realtor_contract where id='".$id."' and 	cancel_by_agent=1 ";
			$record = $this->db->query($sql);
			if($record->num_rows() > 0) 
			{
			$data=array(
			    'contract_process_initiation' => 0,
                'status'=>4,
                "cancel_by_buyer"=>1
			    );
			    
			}
    		else
    		{
        		$data=array(
        		"status"=>0,
        		"cancel_by_buyer"=>1
        		);
    		}
    		$this->db->where('id', $id);
    		$this->db->update('buyer_realtor_contract', $data);
    		$afftectedRows = $this->db->affected_rows();
    		 $this->load->model('email_model');
            $this->email_model->cancellation_approved_by_buyer_mail($id);
            echo '<script>alert("Cancellation approved successfully")</script>';
            
            redirect(base_url() . 'user/viewcontract_for_buyer/'.$id, 'refresh');

	    }
	
	 function deny_contract_approved_by_buyer($id=0)
	    {
    		$data=array(
    		"deny_by_buyer"=>1,
    		"contract_process_initiation"=>0
    		);
    		
    		$this->db->where('id', $id);
    		$this->db->update('buyer_realtor_contract', $data);
    		$afftectedRows = $this->db->affected_rows();
    		 $this->load->model('email_model');
            $this->email_model->deny_by_buyer_mail($id);
            echo '<script>alert("Deny successfully")</script>';
            
            redirect(base_url() . 'user/viewcontract_for_buyer/'.$id, 'refresh');

	    }
	    
	    
	    public function user_status()
	    {
	        $key=$this->input->POST('key');
	        
	        if ($key == "activeInactive")
	        {
                $status = $this->input->POST('status'); 
                $recordId = $this->input->POST('recordId'); 
                
            $data=array(
               'status'=> $status
                );
                
            $this->db->where('user_id', $recordId);
    		$this->db->update('user', $data);
    		$afftectedRows = $this->db->affected_rows();
    		
    		//ratnesh
    		
    		
                if ($afftectedRows)
                {
                    if($status==1)
                    {
                        $this->load->model('email_model');
                        $this->email_model->send_user_activation_email($recordId);
                    }
                    echo "success";
                }
	        }        
	   }
	    
	    public function agent_list($broker_id=0)
	    {
	        
	        
	        if(!empty($broker_id))
	        {
	            
	            $sql = "SELECT U.*,S.state_name FROM user U left join states S on U.state_id=S.id  where  U.user_broker_id='".$broker_id."'";
	        }
	        else
	        {
   	        $sql = "SELECT U.*,S.state_name FROM user U left join states S on U.state_id=S.id  where  U.user_broker_id='".$this->session->userdata('user_id')."'";
			
	        }
			$res = $this->db->query($sql);
			if ($res->num_rows() > 0) 
			{
				$tot_agents = $res->result_array(); 
				$data['agents']=$tot_agents;
				
			}     
        
	    $data['title'] = 'Agents';
		$data['page_name']='agent_list';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	        
	        
	        
	        
	    }
		
		
		public function agent_calculater()
		{
			$data['title'] = 'Agents Calculator';
			$data['page_name']='agent_calculater';
			$this->load->view('theme/'.$this->active_theme.'/index',$data);
		}
		
		
		public function main_search_contracts(){
	  
		
		$data['state_id']  = 0 ;
		$data['mls_id']    = 0;
		if(!empty($this->input->post('search_contracts')))
		{
			$mls_id=$this->input->post('mls_id');
			$state_id=$this->input->post('state_id');
			$data['state_id']     = $state_id ;
			$data['mls_id']     = $mls_id;
			
			$data['contracts1']     = "";
			$where_as="";
			if(!empty($mls_id))
			{
			 $where_as=" and U.affiliated_mls_name='".$mls_id."' and U.state_id='".$state_id."'";	
			}	
			
			$sql = "SELECT B.*, U.user_broker_id,U.first_name,U.last_name,U.email as user_email ,BC.* FROM user U inner join buyer_realtor_contract BC on U.user_id=BC.user_id
		left join buyers B on BC.id= B.buyer_realtor_contract_id where 1 ".$where_as;
		
			$res = $this->db->query($sql);
			if ($res->num_rows() > 0) 
			{
				$contract_result = $res->result_array(); //contracts found with all buyer details
				$data['contracts1']=$contract_result;
			}
	
			
			
		}

			//print_r($data['contracts1']);
		
		$data['states']     = $this->db->get('states')->result_array();
		$data['mls_lists']=array();
		$sql = "SELECT * FROM   state_mls where is_active=1 and state_id='".$data['state_id']."'";
		$res = $this->db->query($sql);
		$ajax_str='';
		if ($res->num_rows() > 0) 
		{
			
				$data['mls_lists']= $res->result_array();
		}
		
		
		$data['title'] = 'Search Contracts';
		$data['page_name']='main_search_buyer';
		$this->load->view('theme/'.$this->active_theme.'/index',$data);
	}
		
	
} ////end of class