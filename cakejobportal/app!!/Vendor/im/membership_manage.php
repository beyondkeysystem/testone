<?php

class membership_manage extends member
{

 public $scheme_name;
 public $description;
 public $storage_limit;
 public $monthly_playback_bandwidth_limit;
 public $monthly_fee;
 public $validity;
 public $ticket_allowed;
 public $chat_allowed;
 public $bk_img;
 public $edit_id;
 public static $membership_scheme;
 public $msg;
 public $all_scheme=array();
 
 
  public function __construct()
  {
	   $this->scheme_name=NULL;
	   $this->description=NULL;
	   $this->storage_limit=0;
	   $this->monthly_playback_bandwidth_limit=0;
	   $this->monthly_fee=0.0;
	   $this->validity=0;
	   $this->ticket_allowed=NULL;
	   $this->chat_allowed=NULL;
	   $this->bk_img=NULL;
	   $this->edit_id=0; 
	   $this->msg=NULL; 
  }
  
  public function setSchemeValue()
  {
	   $this->scheme_name=$_REQUEST['scheme_name'];
	   $this->description=$_REQUEST['description'];
	   $this->storage_limit=$_REQUEST['storage_limit'];
	   $this->monthly_playback_bandwidth_limit=$_REQUEST['monthly_playback_bandwidth_limit'];
	   $this->monthly_fee=$_REQUEST['monthly_fee'];
	   $this->validity=$_REQUEST['validity'];
	   $this->ticket_allowed=$_REQUEST['is_ticket'];
	   $this->chat_allowed=$_REQUEST['is_chat'];
	   $this->edit_id=$_REQUEST['ed_id'];  
	   
   }
  public function getSchemeValue()
  {
	    $sql="select * from ".main::$db_membership_scheme." where id='".$this->edit_id."' ";
	   	   $res=mysql_query($sql) or die("Error ".mysql_error());
	   if(mysql_num_rows($res))
	   {
		   $row=mysql_fetch_object($res);
		   $this->scheme_name=stripslashes($row->scheme_name);
		   $this->description=stripslashes($row->description);
		   $this->storage_limit=$row->storage_limit;
		   $this->monthly_playback_bandwidth_limit=$row->monthly_playback_bandwidth_limit;
		   $this->monthly_fee=$row->monthly_fee;
		   $this->validity=$row->validity;
		   $this->ticket_allowed=$row->ticket_allowed;
		   $this->chat_allowed=$row->chat_allowed;
		   $this->bk_img=$row->background_image;
	  }
   }
  

 public function insert_membership_scheme()
  {
 	$sql_insert="insert into ".main::$db_membership_scheme." 
	             set
				 scheme_name='".mysql_real_escape_string(trim($this->scheme_name))."',
				 description='".mysql_real_escape_string(trim($this->description))."',
				 storage_limit='".$this->storage_limit."',
				 monthly_playback_bandwidth_limit='".$this->monthly_playback_bandwidth_limit."',
				 monthly_fee='".$this->monthly_fee."',
				 validity='".$this->validity."',
				 ticket_allowed='".$this->ticket_allowed."',
				 chat_allowed='".$this->chat_allowed."'";
				
	 
	 $res=mysql_query($sql_insert) or die("Error ".mysql_error());
	 if(mysql_insert_id()>0)
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
   
  public function edit_membership_scheme()
  {
	$sql_insert="update ".main::$db_membership_scheme." 
	             set
				 scheme_name='".mysql_real_escape_string(trim($this->scheme_name))."',
				 description='".mysql_real_escape_string(trim($this->description))."',
				 storage_limit='".$this->storage_limit."',
				 monthly_playback_bandwidth_limit='".$this->monthly_playback_bandwidth_limit."',
				 monthly_fee='".$this->monthly_fee."',
				 validity='".$this->validity."',
				 ticket_allowed='".$this->ticket_allowed."',
				 chat_allowed='".$this->chat_allowed."'
				 where id='".$this->edit_id."'";
	 $res=mysql_query($sql_insert) or die("Error ".mysql_error());
	 if(mysql_affected_rows())
	 {
		 // Now update user last accessible date if
		 $sql = "UPDATE trans_member_membership_scheme SET valid_upto = DATE_ADD(valid_from, INTERVAL $this->validity MONTH) WHERE membership_scheme_id=$this->edit_id";
		 mysql_query($sql);
		 return true;
		 break;
	 }
	 else
	 {
		 return false;
		 break;
	 }
   } 
   
   public function process_membership_scheme()
   {
       if(!empty($this->edit_id))
        {
			$this->edit_membership_scheme();
		}
		else
		{
			$this->insert_membership_scheme();
		}
   }
   public function remove_scheme()
   {
	   $sql="delete from ".main::$db_membership_scheme." 
	         where id='".$this->edit_id."'";
	   $res=mysql_query($sql) or die("Error ".mysql_error());
	   if(mysql_affected_rows())
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
   

   
   
}


?>
