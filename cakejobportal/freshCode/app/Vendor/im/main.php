<?php

class main extends SimpleImage

{

  public static $site_title="William Video hosting";

  public static $db_member="trans_member";

  public static $db_membership_scheme="mast_membership_scheme";

  public static $db_resource_category="mast_filmmaker_resource_category";

  public static $db_resource="trans_filmmaker_resource";

  public static $db_pricetable="mast_country";

  public static $db_member_membership_scheme="trans_member_membership_scheme";

  public static $db_news_public="trans_newsfeed_public";

  public static $db_news_filmmaker="trans_newsfeed_filmmaker";
  public static $db_tutorials_intro_text="mast_tutorials_intro_text";
  public static $db_tutorials="mast_tutorials";

  

  public $admin_username;

  public $admin_userpass;

  public $admin_role;

  public $login_status;

  public $admin_table;



  function __construct()

  {

	  $admin_username=NULL;

	  $admin_userpass=NULL;

	  $admin_role=NULL;

	  $login_status=false;

	  $admin_table="admin_user";	  

  }

 

  

  

}





