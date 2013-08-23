<?php session_start(); ?>

<html>
<head>


</head>

<body>
<?php

include ("../../settings.php");
include ("../../language/$cfg_language");
include ("../../classes/db_functions.php");
include ("../../classes/security_functions.php");
include ("../../classes/form.php");
include ("../../classes/display.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);
$display= new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);

if(!$sec->isLoggedIn())
{
		header ("location: ../../login.php");
		exit();
}
//set default values, these will change if $action==update.
$supplier_value='';
$address_value='';
$phone_number_value='';
$contact_value='';
$email_value='';
$other_value='';
$id=-1;

//decides if the form will be used to update or add a user.
if(isset($_GET['action']))
{
	$action=$_GET['action'];
}
else
{
	$action="insert";
}

//if action is update, sets variables to what the current users data is.
if($action=="update")
{
	$display->displayTitle("$lang->updateSupplier");
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$tablename = "$cfg_tableprefix".'suppliers';
		$result = mysql_query("SELECT * FROM $tablename WHERE id=\"$id\"",$dbf->conn);
		
		$row = mysql_fetch_assoc($result);
		$supplier_value=$row['supplier'];
		$address_value=$row['address'];
		$phone_number_value=$row['phone_number'];
		$contact_value=$row['contact'];
		$email_value=$row['email'];
		$other=$row['other'];
	}

}
else
{
	$display->displayTitle("$lang->addSupplier");

}
//creates a form object
$f1=new form('process_form_suppliers.php','POST','suppliers','300',$cfg_theme,$lang);

//creates form parts.
$f1->createInputField("<b>$lang->supplierName:</b>",'text','supplier',"$supplier_value",'24','150');
$f1->createInputField("<b>$lang->address:</b>",'text','address',"$address_value",'24','150');
$f1->createInputField("<b>$lang->phoneNumber:</b>",'text','phone_number',"$phone_number_value",'24','150');
$f1->createInputField("<b>$lang->contact:</b>",'text','contact',"$contact_value",'24','150');
$f1->createInputField("$lang->email: ",'text','email',"$email_value",'24','150');
$f1->createInputField("$lang->other: ",'text','other',"$other_value",'24','150');

//sends 2 hidden varibles needed for process_form_suppliers.php.
echo "		
		<input type='hidden' name='action' value='$action'>
		<input type='hidden' name='id' value='$id'>";
$f1->endForm();

$dbf->closeDBlink();


?>
</body>
</html>	




