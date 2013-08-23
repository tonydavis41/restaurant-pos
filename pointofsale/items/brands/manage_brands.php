<?php session_start(); ?>

<html>
<head>
<SCRIPT LANGUAGE="Javascript">
<!---
function decision(message, url)
{
  if(confirm(message) )
  {
    location.href = url;
  }
}
// --->
</SCRIPT> 

</head>

<body>
<?php

include ("../../settings.php");
include ("../../language/$cfg_language");
include ("../../classes/db_functions.php");
include ("../../classes/security_functions.php");
include ("../../classes/display.php");
include ("../../classes/form.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);


if(!$sec->isLoggedIn())
{
	header ("location: ../../login.php");
	exit();
}

$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
$display->displayTitle("$lang->manageBrands");

$f1=new form('manage_brands.php','POST','brands','425',$cfg_theme,$lang);
$f1->createInputField("<b>$lang->searchForBrand</b>",'text','search','','24','350');
$f1->endForm();

$tableheaders=array("$lang->rowID","$lang->brandName","$lang->updateBrand","$lang->deleteBrand");
$tablefields=array('id','brand');

if(isset($_POST['search']))
{
	$search=$_POST['search'];
	echo "<center>$lang->searchedForBrand: <b>$search</b></center>";
	$display->displayManageTable("$cfg_tableprefix",'brands',$tableheaders,$tablefields,'brand',"$search",'brand');
}
else
{
	$display->displayManageTable("$cfg_tableprefix",'brands',$tableheaders,$tablefields,'','','brand');
}


$dbf->closeDBlink();



?>
</body>
</html>