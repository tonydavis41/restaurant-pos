<?php session_start(); ?>

<html>
<head>

</head>

<body>
<?php

include ("../settings.php");
include("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/form.php");
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
//set default values, these will change if $action==update.
$first_name_value='';
$last_name_value='';
$account_number_value='';
$phone_number_value='';
$email_value='';
$street_address_value='';
$comments_value='';
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
	$display->displayTitle("$lang->updateCustomer");
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$tablename = "$cfg_tableprefix".'customers';
		$result = mysql_query("SELECT * FROM $tablename WHERE id=\"$id\"",$dbf->conn);
		
		$row = mysql_fetch_assoc($result);
		$first_name_value=$row['first_name'];
		$last_name_value=$row['last_name'];
		$account_number_value=$row['account_number'];
		$phone_number_value=$row['phone_number'];
		$email_value=$row['email'];
		$street_address_value=$row['street_address'];
		$comments_value=$row['comments'];
	
	}

}
else
{
	$display->displayTitle("$lang->addCustomer");
}
//creates a form object
$f1=new form('process_form_customers.php','POST','customers','450',$cfg_theme,$lang);

//creates form parts.
$f1->createInputField("<b>$lang->firstName:</b> ",'text','first_name',"$first_name_value",'24','150');
$f1->createInputField("<b>$lang->lastName:</b> ",'text','last_name',"$last_name_value",'24','150');
$f1->createInputField("$lang->accountNumber: ",'text','account_number',"$account_number_value",'24','150');
$f1->createInputField("<b>$lang->phoneNumber</b> ",'text','phone_number',"$phone_number_value",'24','150');
$f1->createInputField("$lang->email:",'text','email',"$email_value",'24','150');
$f1->createInputField("$lang->streetAddress:",'text','street_address',"$street_address_value",'24','150');
$f1->createInputField("$lang->commentsOrOther:",'text','comments',"$comments_value",'40','150');

//sends 2 hidden varibles needed for process_form_users.php.
echo "		
		<input type='hidden' name='action' value='$action'>
		<input type='hidden' name='id' value='$id'>";
$f1->endForm();
$dbf->closeDBlink();


?>
</body>
</html>




