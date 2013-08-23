<?php
session_start();

include ("settings.php");
include("language/$cfg_language");
include ("classes/db_functions.php");
include ("classes/security_functions.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Public',$lang);


if(!$sec->isLoggedIn())
{
header ("location: login.php");
exit();
}
$tablename = $cfg_tableprefix.'users';
$auth = $dbf->idToField($tablename,'type',$_SESSION['session_user_id']);
$first_name = $dbf->idToField($tablename,'first_name',$_SESSION['session_user_id']);
$last_name= $dbf->idToField($tablename,'last_name',$_SESSION['session_user_id']);

$name=$first_name.' '.$last_name;
$dbf->optimizeTables();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Restaurant Sale</title>
<link rel="stylesheet" href="phppos-style.css" type="text/css" />
</head>

<body>
<?php
if($auth=="Admin")
{
?>
<div id="main">
	<div class="sub_main">

		<div class="box">
			<p><a href="sales/sale_first_screen.php?table=table1">Table 1</a>
		</div>
		<div class="box">
			<p><a href="sales/sale_first_screen.php?table=table2">Table 2</a>
		</div>
		<div class="box">
			<p>Table 3
		</div>
		<div class="box">
			<p>Table 4
		</div>
		<div class="box">
			<p>Table 5
		</div>
		
		<div class="box">
			<p>Table 6
		</div>
		<div class="box">
			<p>Table 7
		</div>
		<div class="box">
			<p>Table 8
		</div>
		<div class="box">
			<p>Table 9
		</div>
		<div class="box">
			<p>Table 10
		</div>
		
		<div class="box">
			<p>Table 11
		</div>
		<div class="box">
			<p>Table 12
		</div>
		<div class="box">
			<p>Table 13
		</div>
		
		<div class="box">
			<p>Table 14
		</div>
		<div class="box">
			<p>Table 15
		</div>
		
		<div class="box">
			<p>Table 16
		</div>
		<div class="box">
			<p>Table 17
		</div>
		<div class="box">
			<p>Table 18
		</div>
		<div class="box">
			<p>Table 19
		</div>
		<div class="box">
			<p>Table 20
		</div>
		
		<div class="box">
			<p>Takeaway
		</div>
		<div class="box">
			<p>Manage<br>Users
		</div>
		<div class="box">
			<p>Manage<br>Customers
		</div>
		<div class="box">
			<p>Manage<br>Items
		</div>
		<div class="box">
			<p>View<br>Reports
		</div>
      <div class="box">
			<p>Configure<br>Settings
		</div>
      <div class="box">
			<p>View<br>Help
		</div>

    </div>
</div>

<?php } elseif($auth=="Sales Clerk") { ?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse"

bordercolor="#111111" width="550" id="AutoNumber1">
  <tr>
    <td width="37">
    <img border="0" src="images/home_print.gif" width="33" height="29"></td>
    <td width="513"><font face="Verdana" size="4" color="#336699"><?php echo "$name
    $lang->home" ?></font></td>
  </tr>
</table>
<p><font face="Verdana" size="2"><?php echo "$lang->welcomeTo $cfg_company $lang->salesClerkHomeWelcomeMessage"; ?>
<?php
}
else
{
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse"

bordercolor="#111111" width="550" id="AutoNumber1">
  <tr>
    <td width="37">
    <img border="0" src="images/home_print.gif" width="33" height="29"></td>
    <td width="513"><font face="Verdana" size="4" color="#336699"><?php echo "$name
    $lang->home"?></font></td>
  </tr>
</table>
<p><font face="Verdana" size="2"><?php echo "$lang->welcomeTo $cfg_company $lang->reportViewerHomeWelcomeMessage"; ?>


<?php
}
$dbf->closeDBlink();

?>
