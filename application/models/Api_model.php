<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

	public function user_signin($signin_type='email')
	{
		if($signin_type=='email')
		{		
			$email=	trim($this->input->post('email'));
			$password=md5($this->input->post('password'));
			$sql="select * from  user where email='".$email."' and password='".$password."' and status=1" ;
		}	
		$res = $this->db->query($sql);
		if($res->num_rows() > 0) 
		{
			return $result= $res->result_array();
		}
		else
		{
			return '';
			
		}
		///////return $result= $query->result_array();
	}
	
	public function signup($data)
	{
		  $this->db->insert('user',$data);
		  $insert_id = $this->db->insert_id();
		  return $insert_id;
	}

	public function get_all_contracts()
	{
		$sql="select  * from buyer_realtor_contract  where 1 order by created_at desc  " ;	
		$query = $this->db->query($sql);
		return $result= $query->result_array();
	}

	public function get_contracts_buyers($contract_id=0)
	{
		$sql="select  * from  buyers  where 1 and buyer_realtor_contract_id='".$contract_id."'" ;	
		$query = $this->db->query($sql);
		return $result= $query->result_array();

	}


	public function buyer_search()
	{
	
		
	
		$buyer_name 			= $this->input->POST('name');
		$buyer_last_name 			= $this->input->POST('last_name');
		$buyer_email 			= $this->input->POST('email');
		$buyer_phone 			= $this->input->POST('phone');
		
		$secondary_name 			= $this->input->POST('secondary_name');
        $secondary_last_name 			= $this->input->POST('secondary_last_name');
		$secondary_email 			= $this->input->POST('secondary_email');
		$secondary_phone 			= $this->input->POST('secondary_phone');
		
		$search_type 			= $this->input->POST('search_type');
		
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
		
		return $data;
	}



		function contract_status($status='',$contract='')
		{
			
				$tmp_status="";

							  if($status==1)
							  {
								$tmp_status="Active";
							  }
							  elseif($status==0 )
							  {
								  
								  $tmp_status="Pending";
							  }	  
							  elseif($status==2)
							  {
								  $tmp_status="Inactive";
							  }
							   elseif($status==3)
							  {
								  $tmp_status="Closed";
							  }
							   elseif($status==4)
							  {
								  $tmp_status="TERMINATED";
							  }
							  elseif($status==5)
							  {
								  $tmp_status="Cancel";
							  }
							  
							  $sql_expired = "SELECT count(*) as tot FROM  buyer_realtor_contract where  DATE(contract_end_date)< DATE(NOW()) and  id='".$contract."'";
                			  $record_expired = $this->db->query($sql_expired);
                				if($record_expired->num_rows() > 0) 
                				{
                					$record_expired_contract = $record_expired->result_array();
                				    if($record_expired_contract[0]['tot']>0)
                				    {
                				        $tmp_status="Expired";
                				    }
                				}	

			
			return $tmp_status;
			
			
		}


	public function get_state()
	{
		$sql="select  * from  states  where 1 order by state_name" ;	
		$query = $this->db->query($sql);
		return $result= $query->result_array();

	}

	public function get_mls_state($state_id='')
	{
		$sql="select  * from  state_mls where 1 and state_id='".$state_id."' order by mls_name" ;	
		$query = $this->db->query($sql);
		return $result= $query->result_array();

	}

	public function broker_list()
	{
		$sql="select  * from  user where 1 and role='broker_record' and status=1 order by first_name" ;	
		$query = $this->db->query($sql);
		return $result= $query->result_array();

	}
	





	
	
/*

	public function GetAll_MovieOfGenre($genre_id=0)
	{
		$sql="select * from movie where genre_id='".$genre_id."' order by 	movie_id desc" ;
		$query = $this->db->query($sql);
		return $result= $query->result_array();
	}

	public function get_genre_live()
	{
		$sql="select  G.* from  live L  inner join  genre G  on L.genre_id=G.genre_id  group by L.genre_id order by G.sno " ;
		$query = $this->db->query($sql);
		return $result= $query->result_array();
	}


	
	public function GetAll_LiveOfGenre($genre_id=0)
	{
		$sql="select * from live where genre_id='".$genre_id."' order by live_id desc " ;
		$query = $this->db->query($sql);
		return $result= $query->result_array();
	}

	public function GetAll_Series_Genre()
	{
		$sql="select G.* from series S inner join genre G on S.genre_id=G.genre_id group by S.genre_id order by genre_id " ;
		$query = $this->db->query($sql);
		return $result= $query->result_array();
	}
	
	public function GetAll_SeriesOfGenre($genre_id=0)
	{
		$sql="select * from series where genre_id='".$genre_id."' order by 	series_id desc" ;
		$query = $this->db->query($sql);
		return $result= $query->result_array();
	}
	
	
	
	public function GetAll_SeasonOfSeries($series_id=0)
	{
		$sql="select * from  season where series_id='".$series_id."' order by season_id" ;
		$query = $this->db->query($sql);
		return $result= $query->result_array();
	
	}
	
	public function GetAll_episodeOfSeason($season_id=0)
	{
		$sql="select * from  episode where season_id='".$season_id."' order by episode_id" ;
		$query = $this->db->query($sql);
		return $result= $query->result_array();
	
	}
	
	
	
	public function GetAll_watch_later_episode($user_id=0)
	{
		//$sql="select * from  episode  where season_id='".$season_id."' order by episode_id" ;
		//$sql="select E.* from watch_later WL inner join  episode E on WL.episode_id=E.episode_id where WL.user_id='".$user_id."' order by WL.episode_id desc" ;

        $sql="select E.* ,SEA.series_id  from watch_later WL inner join  episode E on WL.episode_id=E.episode_id 
		left join  season SEA on E.season_id=SEA.season_id
		where WL.user_id='".$user_id."' order by WL.episode_id desc" ;



		$query = $this->db->query($sql);
		return $result= $query->result_array();
	
	}
	
	
	
	
	public function signup($data)
	{
		  $this->db->insert('user',$data);
		  $insert_id = $this->db->insert_id();
		  return $insert_id;
	}
	
	
	public function otp_delete($user_id=0)
	{
		$sql="update user set otp='NULL' where user_id='".$user_id."'";
		$res = $this->db->query($sql);
		return $res;
	}
	*/
	
	
}
