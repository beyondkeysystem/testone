<?php 

class member_scheme extends membership_manage
{
 public $regid;
 public $member_id;
 public $membership_scheme_id;
 public $order_no;
 public $order_date_time;
 public $valid_from;
 public $valid_upto;
 public $fee_amount;
 public $is_auto_renew;
 public $is_payment_complete;
 public $msg;
 public $bk_img;
 
 
 
  public function __construct()
  {
	   $this->regid=NULL;
	   $this->member_id=NULL;
	   $this->membership_scheme_id=NULL;
	   $this->order_no=random();
	   $this->order_date_time=date("Y-m-d H:i:s");
	   $this->valid_from=date("Y-m-d");
	   $this->valid_upto=date("Y-m-d");
	   $this->fee_amount=0.0;
	   $this->is_auto_renew=0;
	   $this->is_payment_complete=0; 
	   $this->bk_img=NULL; 
	   $this->msg=NULL; 
  }
  
  public function setMemberScheme()
  {
	 $this->member_id=$_REQUEST['member_id'];
	 $this->membership_scheme_id=$_REQUEST['membership_scheme_id'];
	 $this->getSchemeValue();
	   
   }
  public function getSchemeValue()
  {
	 $sql="select * from ".main::$db_membership_scheme." where id='".$this->membership_scheme_id."'";
	   $res=mysql_query($sql) or die("Error ".mysql_error());
	   if(mysql_num_rows($res))
	   {
		   $row=mysql_fetch_object($res);
		   $this->fee_amount=$row->monthly_fee*$_REQUEST['m_month'];
		   $this->validity=$row->validity*$_REQUEST['m_month'];
	  }
   }
  

 public function register_member_scheme()
  {
  	$validity=$this->validity;
  	$sql_date="select valid_upto from trans_member_membership_scheme where member_id='".mysql_real_escape_string(trim($this->member_id))."' order by valid_upto desc limit 1";
	$rs_date=mysql_query($sql_date);
	$rsitem_date=mysql_fetch_object($rs_date);
	if(($rsitem_date->valid_upto)>date("Y-m-d"))
	{
	  $cd1 = strtotime($rsitem_date->valid_upto);
	  $valid_from = date('Y-m-d', mktime(0,0,0,date('m',$cd1),date('d',$cd1)+1,date('Y',$cd1)));
	  $cd2 = strtotime($valid_from);
  	  $valid_upto = date('Y-m-d', mktime(0,0,0,date('m',$cd2)+$validity,date('d',$cd2),date('Y',$cd2)));
	}
	else
	{	  
	  $valid_from = date('Y-m-d');
	  $cd2 = strtotime($valid_from);
  	  $valid_upto = date('Y-m-d', mktime(0,0,0,date('m',$cd2)+$validity,date('d',$cd2),date('Y',$cd2)));
	}
  	$sql_insert="insert into ".main::$db_member_membership_scheme." 
	             set
				 member_id='".mysql_real_escape_string(trim($this->member_id))."',
				 membership_scheme_id='".trim($this->membership_scheme_id)."',
				 order_no='".$this->order_no."',
				 order_date_time='".$this->order_date_time."',
				 valid_from='".$valid_from."',
				 valid_upto='".$valid_upto."',
				 fee_amount='".$this->fee_amount."',
				 is_auto_renew='Y'";
				 $_SESSION[amount]=$this->fee_amount;
	 $res=mysql_query($sql_insert) or die("Error ".mysql_error());
	 //die($sql_insert);
	 if(mysql_insert_id()>0)
	 {
		$id=mysql_insert_id();
		if($_SESSION[amount]==0)
		{
		$sql_update="update trans_member_membership_scheme set is_payment_complete=1 where id=".$id;
		mysql_query($sql_update);
		}
		 return $id;
		 break;
	 }
	 else
	 {
		 return 0;
		 break;
	 }
   }
   


   
  public function get_all_scheme()
   {
	   $sql="select * from ".main::$db_membership_scheme." order by monthly_fee";
	   $res=mysql_query($sql) or die("Error ".mysql_error());
	   if(mysql_num_rows($res))
	   {
		   $i=0;
		   while($row=mysql_fetch_object($res))
		   {
			   $tmp=array(
			               'id'=>$row->id,
						   'scheme_name'=>stripslashes($row->scheme_name),
						   'description'=>stripslashes($row->description),
						   'storage_limit'=>$row->storage_limit,
						   'monthly_playback_bandwidth_limit'=>$row->monthly_playback_bandwidth_limit,
						   'monthly_fee'=>$row->monthly_fee,
						   'validity'=>$row->validity,
			             );
				$this->all_scheme[$i++]=$tmp;		 
		    }	   
        }
   }
  
  public function get_all_scheme_renew()
   {
	   $sql="select * from ".main::$db_membership_scheme." where monthly_fee!=0 order by monthly_fee";
	   $res=mysql_query($sql) or die("Error ".mysql_error());
	   if(mysql_num_rows($res))
	   {
		   $i=0;
		   while($row=mysql_fetch_object($res))
		   {
			   $tmp=array(
			               'id'=>$row->id,
						   'scheme_name'=>stripslashes($row->scheme_name),
						   'description'=>stripslashes($row->description),
						   'storage_limit'=>$row->storage_limit,
						   'monthly_playback_bandwidth_limit'=>$row->monthly_playback_bandwidth_limit,
						   'monthly_fee'=>$row->monthly_fee,
						   'validity'=>$row->validity,
						   'bk_img'=>$row->background_img
			             );
				$this->all_scheme[$i++]=$tmp;
						 
		    }	   
        }
   }
   
}


?>
