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

include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/display.php");
include ("../classes/form.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);

if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}

$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
$display->displayTitle("$lang->manageCustomers");

$f1=new form('manage_customers.php','POST','customers','450',$cfg_theme,$lang);
$f1->createInputField("<b>$lang->searchForCustomer</b>",'text','search','','24','350');
$f1->endForm();


$tableheaders=array("$lang->rowID","$lang->lastName","$lang->firstName","$lang->accountNumber","$lang->phoneNumber","$lang->email","$lang->streetAddress","$lang->commentsOrOther","$lang->updateCustomer","$lang->deleteCustomer");
$tablefields=array('id','last_name','first_name','account_number','phone_number','email','street_address','comments');

if(isset($_POST['search']))
{
	$search=$_POST['search'];
	echo "<center>$lang->searchedForCustomer: <b>$search</b></center>";
	$display->displayManageTable("$cfg_tableprefix",'customers',$tableheaders,$tablefields,'last_name',"$search",'last_name');
}
else
{
	$display->displayManageTable("$cfg_tableprefix",'customers',$tableheaders,$tablefields,'','','last_name');
}


$dbf->closeDBlink();


?>
</body>
</html>