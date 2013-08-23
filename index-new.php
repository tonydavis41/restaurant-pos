<?php
session_start();
include ("settings.php");
include ("language/$cfg_language");
include ("classes/db_functions.php");
include ("classes/security_functions.php");

//create 3 objects that are needed in this script.
$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Public',$lang);

	if(!$sec->isLoggedIn())
	{
		header ("location: login.php");
		exit();
	}
	
$dbf->optimizeTables();
$dbf->closeDBlink();

?>


<HTML>
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="phppos-style.css" type="text/css" />

<title><?php echo $cfg_company ?>-- <?php echo $lang->poweredBy?> PHP Point Of Sale</title>
</head>
<frameset border="0" frameborder="no" framespacing="0" rows="100,*">
<frame name="TopFrame" noresize scrolling="no" src="menubar.php">
<frame name="MainFrame" noresize src="home.php">
</frameset>
<noframes>
  <body bgcolor="#FFFFFF" text="#000000">
    
  </body>
</noframes>
</HTML>
