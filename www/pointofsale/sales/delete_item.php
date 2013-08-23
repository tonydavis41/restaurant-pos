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

if(isset($_GET['item_id']) and isset($_GET['sale_id']) and isset($_GET['row_id']))
{
	$item_id=$_GET['item_id'];
	$sale_id=$_GET['sale_id'];
	$row_id=$_GET['row_id'];
}

$returned_quantity=$dbf->idToField($cfg_tableprefix.'sales_items','quantity_purchased',$row_id);
$newQuantity=$dbf->idToField($cfg_tableprefix.'items','quantity',$item_id)+$returned_quantity;
$dbf->deleteRow($cfg_tableprefix.'sales_items',$row_id);
$dbf->updateItemQuantity($item_id,$newQuantity);
$dbf->updateSaleTotals($sale_id);

?>
<br>
<a href="manage_sales.php"><?php echo $lang->manageSales ?>--></a>
<br>
<a href="sale_ui.php"><?php echo $lang->startSale?> --></a>
</body>
</html>