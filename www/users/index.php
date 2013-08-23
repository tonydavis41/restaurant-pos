<?php session_start(); ?>

<html>
<head>


</head>

<body>
<?php

include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/display.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);

if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}

$display->displayTitle("$lang->users");
$dbf->closeDBlink();

?>
		<ul>
		<li><a href="form_users.php?action=insert"><?php echo "$lang->createUser"; ?> </a>			
		<li><a href="manage_users.php"><?php echo "$lang->manageUsers"; ?></a>		
		</ul>
		




</body>
</html>