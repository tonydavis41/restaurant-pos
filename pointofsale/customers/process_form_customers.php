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

//creates 3 objects needed for this script.
$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);

//checks if user is logged in.
if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit ();
}

//variables needed globably in this file.
$tablename="$cfg_tableprefix".'customers';
$field_names=null;
$field_data=null;
$id=-1;



	//checks to see if action is delete and an ID is specified. (only delete uses $_GET.)
	if(isset($_GET['action']) and isset($_GET['id']))
	{
		$action=$_GET['action'];
		$id=$_GET['id'];
		
	}
	//checks to make sure data is comming from form ($action is either delete or update)
	elseif(isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST['account_number']) 
	and isset($_POST['phone_number']) and isset($_POST['email']) and isset($_POST['street_address']) and isset($_POST['comments']) and isset($_POST['id']) and isset($_POST['action']) )
	{
		
		$action=$_POST['action'];
		$id = $_POST['id'];
		
		//gets variables entered by user.
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$account_number = $_POST['account_number'];
		$phone_number = $_POST['phone_number'];
		$email = $_POST['email'];
		$street_address = $_POST['street_address'];
		$comments = $_POST['comments'];
		
		
		//insure all fields are filled in.
		if($first_name=='' or $last_name=='' or $phone_number=='')
		{
			echo "$lang->forgottenFields";
			exit();
		}
		else
		{
			$field_names=array('first_name','last_name','account_number','phone_number','email','street_address','comments');
			$field_data=array("$first_name","$last_name","$account_number","$phone_number","$email","$street_address","$comments");	
	
		}
		
	}
	else
	{
		//outputs error message because user did not use form to fill out data.
		echo "$lang->mustUseForm";
		exit();
	}
	


switch ($action)
{
	//finds out what action needs to be taken and preforms it by calling methods from dbf class.
	case $action=="insert":
		$dbf->insert($field_names,$field_data,$tablename,true);
	break;
		
	case $action=="update":
		$dbf->update($field_names,$field_data,$tablename,$id,true);
				
	break;
	
	case $action=="delete":
		$dbf->deleteRow($tablename,$id);
	
	break;
	
	default:
		echo "$lang->noActionSpecified";
	break;
}
$dbf->closeDBlink();

?>
<br>
<a href="manage_customers.php"><?php echo $lang->manageCustomers ?>--></a>
<br>
<a href="form_customers.php?action=insert"><?php echo $lang->createNewCustomer ?>--></a>
</body>
</html>