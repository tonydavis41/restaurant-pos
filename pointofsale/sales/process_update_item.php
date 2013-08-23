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
$tablename="$cfg_tableprefix".'sales_items';
$field_names=null;
$field_data=null;
$id=-1;




	if(isset($_POST['quantity_purchased']) and isset($_POST['item_unit_price']) and isset($_POST['item_tax_percent']) and isset($_POST['item_id']) and isset($_POST['sale_id'])  and isset($_POST['row_id']) and isset($_POST['old_quantity']))
	{
	
		if(!is_numeric($_POST['quantity_purchased']) or !is_numeric($_POST['item_unit_price']) or !is_numeric($_POST['item_tax_percent']))
		{
			echo 'You must enter a numeric value for quantity purchased, Unit Price, and Tax.';
			exit();
		}
		$item_id = $_POST['item_id'];
		$sale_id = $_POST['sale_id'];
		$row_id = $_POST['row_id'];
		$old_quantity= $_POST['old_quantity'];
		
		//gets variables entered by user.
		$quantity_purchased = $_POST['quantity_purchased'];
		$item_unit_price = $_POST['item_unit_price'];
		$item_tax_percent = $_POST['item_tax_percent'];
	    $item_total_tax=($item_unit_price*$quantity_purchased)*($item_tax_percent/100);
		$item_total_cost=($item_unit_price*$quantity_purchased)+$item_total_tax;
		
		$item_unit_price=number_format($item_unit_price,2,'.', '');
		$item_total_tax=number_format($item_total_tax,2,'.', '');
		$item_total_cost=number_format($item_total_cost,2,'.', '');
		
		$changeInQuantity=$old_quantity-$quantity_purchased;
		$currentQuantity=$dbf->idToField($cfg_tableprefix.'items','quantity',$item_id);
		$newQuantity=$currentQuantity+$changeInQuantity;
		
		//insure all fields are filled in.
		if($quantity_purchased=='' or $item_unit_price=='' or $item_tax_percent=='')
		{
			echo "$lang->forgottenFields";
			exit();
		}
		
	}
	else
	{
		//outputs error message because user did not use form to fill out data.
		echo "$lang->mustUseForm";
		exit();
	}
	
	$field_names=array('quantity_purchased','item_unit_price','item_tax_percent','item_total_tax','item_total_cost');
	$field_data=array("$quantity_purchased","$item_unit_price","$item_tax_percent","$item_total_tax","$item_total_cost");
	$dbf->update($field_names,$field_data,$tablename,$row_id,true);
	$dbf->updateItemQuantity($item_id,$newQuantity);
	$dbf->updateSaleTotals($sale_id);

	$dbf->closeDBlink();

?>
<br>
<a href="manage_sales.php"><?php echo $lang->manageSales ?>--></a>
<br>
<a href="sale_ui.php"><?php echo $lang->startSale ?>--></a>
</body>
</html>