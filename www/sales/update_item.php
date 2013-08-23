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
include ("../classes/form.php");
include ("../classes/display.php");

//creates 3 objects needed for this script.
$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);

//checks if user is logged in.
if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit ();
}

	$display->displayTitle("$lang->updateItem");
	if(isset($_GET['item_id']) and isset($_GET['sale_id']) and isset($_GET['row_id']))
	{
		$item_id=$_GET['item_id'];
		$sale_id=$_GET['sale_id'];
		$row_id=$_GET['row_id'];
		$tablename = "$cfg_tableprefix".'sales_items';
		$result = mysql_query("SELECT * FROM $tablename WHERE id=\"$row_id\"",$dbf->conn);
		
		$row = mysql_fetch_assoc($result);
		$quantity_purchased_value=$row['quantity_purchased'];
		$item_unit_price_value=$row['item_unit_price'];
		$item_tax_percent_value=$row['item_tax_percent'];
	}

//creates a form object
$f1=new form('process_update_item.php','POST','sale item','335',$cfg_theme,$lang);

//creates form parts.
echo "<br><br><center><b>$lang->updateRowID $row_id</b></center>";
$f1->createInputField("<b>$lang->quantityPurchased:</b>",'text','quantity_purchased',"$quantity_purchased_value",'24','160');
$f1->createInputField("<b>$lang->unitPrice:</b> ",'text','item_unit_price',"$item_unit_price_value",'24','160');
$f1->createInputField("<b>$lang->tax %:</b> ",'text','item_tax_percent',"$item_tax_percent_value",'24','160');

echo "		
		<input type='hidden' name='row_id' value='$row_id'>
		<input type='hidden' name='item_id' value='$item_id'>
		<input type='hidden' name='sale_id' value='$sale_id'>
		<input type='hidden' name='old_quantity' value='$quantity_purchased_value'>";
$f1->endForm();

$dbf->closeDBlink();

?>
</body>
</html>