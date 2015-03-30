<?php

class member extends main
{
	 public $member_id;		
	 public $unique_id;
	 public $first_name;
	 public $last_name;
	 public $address;
	 public $city;
	 public $state;
	 public $zip;
	 public $country_id;
	 public $email;
	 public $paypalID;
	 public $user_name;
	 public $password;
	 public $con_pass;
	 public $profile_image_file;
	 
	 public $shipping_fname;
	 public $shipping_lname;
	 public $shipping_address;
	 public $shipping_country;
	 public $shipping_pcode;
	 public $billing_fname;
	 public $billing_lname;
	 public $billing_address;
	 public $billing_country;
	 public $billing_pcode;
	
	 public $about_me;
	 public $old_profile_image_file;
	 public $player_preference_height;
	 public $player_preference_border_style;
	 public $player_preference_is_loop;
	 public $is_banned;
	 public $upload_dir;
	 public $upload_dir_main;
	 public $upload_dir_thumb;
	 public $last_login;
	 public $online_status;
	 public $errmsg="";
	 
	 
	 
	 
 
  public function __construct()
  {
	   $this->member_id=NULL;	  
	   $this->unique_id=random();	  
	   $this->first_name=NULL;
	   $this->last_name=NULL;
	   $this->address=NULL;
	   $this->city=NULL;
	   $this->state=NULL;
	   $this->zip=NULL;
	   $this->country_id=NULL;
	   $this->email=NULL;
	   $this->paypalID=NULL;
	   $this->contact_no=NULL;
	   $this->user_name=random();
	   $this->password=NULL;
	   $this->con_pass=NULL;
	   $this->profile_image_file=NULL;
	   
		 $this->shipping_fname=NULL;
		 $this->shipping_lname=NULL;
		 $this->shipping_address=NULL;
		 $this->shipping_country=NULL;
		 $this->shipping_pcode=NULL;
		 $this->billing_fname=NULL;
		 $this->billing_lname=NULL;
		 $this->billing_address=NULL;
		 $this->billing_country=NULL;
		 $this->billing_pcode=NULL;
	   
	   $this->about_me=NULL;
	   $this->old_profile_image_file=NULL;
	   $this->player_preference_height=NULL;
	   $this->player_preference_width=NULL;
	   $this->player_preference_border_style=NULL;
	   $this->player_preference_is_loop='N';
	   $this->is_banned=NULL;
	   $this->upload_dir=NULL;
	   $this->online_status=NULL;
	   $this->errmsg=NULL;
 }


   public function setMemberValue()
   {
	   $this->member_id				=$_REQUEST['id'];
	   $this->first_name			=$_REQUEST['first_name'];
	   $this->last_name				=$_REQUEST['last_name'];
	   $this->address				=$_REQUEST['address'];
	   $this->city					=$_REQUEST['city'];
	   $this->state					=$_REQUEST['state'];
	   $this->zip					=$_REQUEST['zip']; 
	   $this->country_id			=$_REQUEST['country_id']; 
	   $this->email					=$_REQUEST['email'];
	   $this->paypalID				=$_REQUEST['paypalID']; 
	   $this->contact_no			=$_REQUEST['contact_no'];
	   $this->about_me				=$_REQUEST['about_me'];  
	   $this->user_name				=$_REQUEST['user_name']; 
	   $this->username				=$_REQUEST['username']; 
	   $this->password				=$_REQUEST['password'];
	   $this->con_pass				=$_REQUEST['con_pass']; 
	   $this->is_banned				=$_REQUEST['is_banned'];
	   $this->old_profile_image_file=$_REQUEST['old_profile_image_file'];
		 
	   $this->shipping_fname		=$_REQUEST['ship_fname']; 
	   $this->shipping_lname		=$_REQUEST['ship_lname']; 
	   $this->shipping_address		=$_REQUEST['ship_address']; 
	   $this->shipping_country		=$_REQUEST['ship_country']; 
	   $this->shipping_pcode		=$_REQUEST['ship_pincode']; 
	   $this->billing_fname			=$_REQUEST['bill_fname']; 
	   $this->billing_lname			=$_REQUEST['bill_lname']; 
	   $this->billing_address		=$_REQUEST['bill_address']; 
	   $this->billing_country		=$_REQUEST['bill_country']; 
	   $this->billing_pcode			=$_REQUEST['bill_pincode']; 
	   
	   $this->show_online_status	=$_REQUEST['show_online']; 
	   
	   $this->upload_dir="uploads"; 
	   $this->upload_dir_main=$this->upload_dir."/main/";
	   $this->upload_dir_thumb=$this->upload_dir."/thumb/";
	   
	   
	   if(empty($this->email))
	   {
		 $this->errmsg.=" Email Address cannot left empty <br>";   
	   }
	   if(!empty($this->email))
	   { 
		   if(!checkemail($this->email))
		   {
			   $this->errmsg.= " Email Value is not Valid<br>";
		   }
	   }
    	   
	   if(empty($this->user_name))
	   {
		   $this->errmsg.=" Username field is empty.<br>";
	   }
	   
	   if($this->username_available())
	   {
		  $this->errmsg.=" Username Already taken.<br>"; 
	   }
	   
	   if(empty($this->password))
	   {
		   $this->errmsg.=" Password field is empty.<br>";
	   }
	   if(empty($this->con_pass))
	   {
		   $this->errmsg.=" Confirm Password field is empty.<br>";
	   }
	   if(!empty($this->password) and !empty($this->con_pass))
	   {
		   if(strcmp(trim($this->password),trim($this->con_pass))!=0)
		   {
			   $this->errmsg.=" Password Mismatched";
     	   }
	   }
   echo "Errmsg :". $this->errmsg;
   }


   public function getMemberValue()
   {
	   
	   if(isset($_SESSION['member_id']))
	   {
		   $this->unique_id=$_SESSION['member_id'];
	   }
	   
	   $sql="select * from ".main::$db_member." where unique_id='".$this->unique_id."'";
	   $res=mysql_query($sql) or die("Error ".mysql_error());
	   if(mysql_num_rows($res))
	   {
		   $row=mysql_fetch_object($res);
		   $this->member_id=$row->id;
		   $this->first_name=stripslashes($row->first_name);
		   $this->last_name=stripslashes($row->last_name);
		   $this->address=stripslashes($row->address);
		   $this->city=stripslashes($row->city);
		   $this->state=stripslashes($row->state);
		   $this->zip=stripslashes($row->zip);
		   $this->country_id=$row->country_id;
		   $this->email=$row->email;
		   $this->paypalID=$row->paypalID;
		   $this->contact_no=stripslashes($row->contact_no);
		   $this->about_me=stripslashes($row->about_me);
		   $this->user_name=stripslashes($row->user_name);
		   $this->password=$row->password;
		   $this->profile_image_file=$row->profile_image_file;
		   
			 $this->shipping_fname=stripslashes($row->shipping_fname);
			 $this->shipping_lname=stripslashes($row->shipping_lname);
			 $this->shipping_address=stripslashes($row->shipping_address);
			 $this->shipping_country=stripslashes($row->shipping_country);
			 $this->shipping_pcode=$row->shipping_pcode;
			 $this->billing_fname=stripslashes($row->billing_fname);
			 $this->billing_lname=stripslashes($row->billing_lname);
			 $this->billing_address=stripslashes($row->billing_address);
			 $this->billing_country=stripslashes($row->billing_country);
			 $this->billing_pcode=$row->billing_pcode;
			 $this->online_status=$row->show_me_as_online;
		 //$this->is_banned=$row->is_banned;
	  }
   }
   
   
  function username_available()
  {
	  if(!empty($this->user_name))
	  {
	      $sql="select unique_id from ".main::$db_member." where user_name='".$this->user_name."'";
	      $res=mysql_query($sql) or die("Error ".mysql_error());
	      if(mysql_num_rows($res))
		  {
			  return true;
		  }
		  else
		  {
			  return false;
		  }
	  }
  }
   
  public function  upload_member_image()
  {
	  
	  
	  
	  
  }
  
  public function insert_member()
  {
	//  echo $this->errmsg;
	/*if(empty($this->errmsg))
	{ */
	$sql_insert="insert into ".main::$db_member." 
	             set
				 unique_id='".$this->unique_id."',
				 first_name='".$this->first_name."',
				 last_name='".$this->last_name."',
				 address='".$this->address."',
				 city='".$this->city."',
				 state='".$this->state."',
				 zip='".$this->zip."',
				 country_id='".$this->country_id."',
				 email='".$this->email."',
				 contact_no='".$this->contact_no."',
				 user_name='".$this->user_name."',
				 password='".$this->password."',
				 profile_image_file='".$this->profile_image_file."',
				 is_banned='".$this->is_banned."' ";
				 
				 
	/*			 player_preference_height='".$this->player_preference_height."',
     			 player_preference_width='".$this->	player_preference_width."',
				 player_preference_border_style='".$this->player_preference_border_style."',
				 player_preference_is_loop='".$this->player_preference_is_loop."',
		 
	*/			 
				 
	 
		$res=mysql_query($sql_insert) or die("Error ".mysql_error());
		//$id=mysql_insert_id();
		$id=$this->unique_id;
		return $id;
		
		 /*if(mysql_insert_id()>0)
		 {
			 return $this->unique_id;
			 break;
		 }
		 else
		 {
			 return false;
			 break;
		 }*/
	//}
	 
  }
  
  /***************** Player Updaion *******************/
  function set_user_player()
  {
	   $this->player_preference_height=$_REQUEST['player_preference_height'];  
	   $this->player_preference_width=$_REQUEST['player_preference_width'];  
	   $this->player_preference_border_style=$_REQUEST['player_preference_border_style'];  
	   $this->player_preference_is_loop=$_REQUEST['player_preference_is_loop'];   
  }
  
  function get_user_player()
  {
	  
	   if(isset($_SESSION['member_id']))
	   {
		   $this->unique_id=$_SESSION['member_id'];
	   }
	  
	  $sql="select player_preference_height,player_preference_width,player_preference_border_style,player_preference_is_loop from ".main::$db_member." where unique_id='".$this->unique_id."'";
	    $res=mysql_query($sql) or die("Error ".mysql_error());
		$row=mysql_fetch_object($res);
	    $this->player_preference_height=$row->player_preference_height;
		$this->player_preference_width=$row->player_preference_width;
		$this->player_preference_border_style=$row->player_preference_border_style;	   
		$this->player_preference_is_loop=$row->player_preference_is_loop;
  }
  
  
  function update_user_player()
  {
	   if(isset($_SESSION['member_id']))
	   {
		   $this->unique_id=$_SESSION['member_id'];
	   }
	   $sql_insert="update  ".main::$db_member." 
	                set
				    player_preference_height='".$this->player_preference_height."',
					player_preference_width='".$this->	player_preference_width."',
					player_preference_border_style='".$this->player_preference_border_style."',
					player_preference_is_loop='".$this->player_preference_is_loop."'
					where unique_id='".$this->unique_id."'";
					
	 $res=mysql_query($sql_insert) or die("Error ".mysql_error());
	 if(mysql_num_rows()>0)
	 {
		 return true;
		 break;
	 }
	 else
	 {
		 return false;
		 break;
	 }			
 }
  
  
  
  
  
  
  public function update_member()
  {

	 if(isset($_SESSION['member_id']))
	 {
	    $this->unique_id=$_SESSION['member_id'];
	 } 
	 
  if(!empty($_FILES['profile_image_file']['name']) and file_exists($this->upload_dir_main))
	   {
		$this->profile_image_file=$this->unique_id.$_FILES['profile_image_file']['name']; 
		if(move_uploaded_file($_FILES['profile_image_file']['tmp_name'],$this->upload_dir_main.$this->profile_image_file))
		   {
              /* $this->load($this->upload_dir_main.$this->profile_image_file);
			   $this->resizeToWidth(250);
               $this->save($this->upload_dir_thumb.$this->profile_image_file);*/
			   			   
		   }		   
	   } 
	 else if(empty($_FILES['profile_image_file']['name']))
	 {
		$this->profile_image_file=$this->old_profile_image_file; 
	 }
	 //echo $this->profile_image_file;
   $sql_insert="update  ".main::$db_member." 
	             set
				 first_name='".$this->first_name."',
				 last_name='".$this->last_name."',
				 address='".$this->address."',
				 city='".$this->city."',
				 state='".$this->state."',
				 zip='".$this->zip."',
				 country_id='".$this->country_id."',
				 email='".$this->email."',
				 paypalID='".$this->paypalID."',
				 contact_no='".$this->contact_no."',
				 about_me='".mysql_real_escape_string($this->about_me)."',
				 user_name='".$this->user_name."',				
				 profile_image_file='".$this->profile_image_file."',
				 
				 shipping_fname='".$this->shipping_fname."',
				 shipping_lname='".$this->shipping_lname."',
				 shipping_address='".$this->shipping_address."',
				 shipping_country='".$this->shipping_country."',
				 shipping_pcode='".$this->shipping_pcode."',
				 billing_fname='".$this->billing_fname."',
				 billing_lname='".$this->billing_lname."',
				 billing_address='".$this->billing_address."',
				 billing_country='".$this->billing_country."',
				 billing_pcode='".$this->billing_pcode."',
				 show_me_as_online='".$this->show_online_status."',
				 is_banned='".$this->is_banned."'
				 where unique_id='".$this->unique_id."'";
	
				 
	 $res=mysql_query($sql_insert) or die("Error ".mysql_error());
	 
	 if(trim($this->password)!='')
	 {
     $sql_insert="update  ".main::$db_member." 
	             set
				 password='".md5($this->password)."'
				 where unique_id='".$this->unique_id."'";
	 
	 $res=mysql_query($sql_insert) or die("Error ".mysql_error()); 
	 }
	 if(mysql_num_rows()>0)
	 {
		 return true;
		 break;
	 }
	 else
	 {
		 return false;
		 break;
	 }
	 
  }
  
  

       
   public function process_membership()
   {
       if(!empty($this->unique_id))
        {
			$this->update_member();
		}
		else
		{
			$this->insert_member();
		}
   }

    /*************** Managing User Login ****************/
  public function setMemberLogin()
  {
	  if(empty($_REQUEST['username']))
	  {
		  $this->errmsg.=" Username Field is empty,";
	   }
	  else
	  {
		  $this->user_name=trim($_REQUEST['username']);
	  }
	  
	  if(empty($_REQUEST['password']))
	  {
		  $this->errmsg.=" Password Field is empty";
	   }
	  else
	  {
		  $this->password=trim($_REQUEST['password']);
	  }
   }

   public function checkLogin($username = NULL,$password = NULL)
   {
   
	   /*if(empty($this->errmsg))
	   {*/ 	
/*	    $sql="select TM.unique_id as unique_member_id,TM.is_banned as blocked 
		      from  ".main::$db_member." as TM
			  left join ".main::$db_member_membership_scheme." as SM
			  on
			  (TM.unique_id=SM.member_id)
		      where 
			  TM.user_name='".$this->user_name."' and
			  TM.password='".$this->password."' and
			  SM.is_payment_complete in (0,1) 
			  order by TM.id desc limit 0,1";
*/		
		//$username = $_REQUEST['username'];
		//$password = $_REQUEST['password'];
		//$sql="select unique_id,is_banned from trans_member where user_name='".$this->username."' and password='".md5($this->password)."'";	
		$sql="select unique_id,is_banned from trans_member where user_name='".$username."' and password='".md5($password)."'";	
		//die($sql);  
		 $res=mysql_query($sql) or die("Error ".mysql_error());
		 if(mysql_num_rows($res))
		   { 
				$row=mysql_fetch_object($res);
					if($row->is_banned!='Y')
					{   
						$sql1="select * from trans_member_membership_scheme where member_id='".$row->unique_id."' 
																	  and valid_upto>='".date('Y-m-d H:i:s')."' 
																	  and is_payment_complete=1";
						
						$res1=mysql_query($sql1) ;
						$count=mysql_num_rows($res1);
						if($count>0 || $row->unique_id=='1A')
						{
						$_SESSION['member_id']=$row->unique_id;
						$_SESSION['film_maker']=TRUE;
						}
						else
						{
						$this->errmsg="Membership not valid";
						}
					}
					else
					{
						$this->errmsg="Sign in blocked by Administrator";	
					}
				////////////CHECK MEMBER SHIP VALIDITY///////////////////////
				
					
		   }
		  else
		  {
			$this->errmsg=" Username or password not valid";			  
		  }
	   //}
   }
   
  public function is_login()
  {
	if(isset($_SESSION['member_id']))
	{
	$sql="update trans_member set last_login=".time()." where unique_id='".$_SESSION['member_id']."'";
	  mysql_query($sql);
	    
	  return true;	
	}
	elseif(empty($_SESSION['member_id']))
	{
	  return false;		
	}
  }
}








?>