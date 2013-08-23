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
