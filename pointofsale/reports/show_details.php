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
$sec=new security_functions($dbf,'Report Viewer',$lang);
if(!$sec->isLoggedIn())
{
    header ("location: ../login.php");
    exit();
}

if(isset($_GET['sale_id']))
{
	$sale_id=$_GET['sale_id'];
	$customer_id=$_GET['sale_customer_id'];
	$sale_date=$_GET['sale_date'];
	
	$temp_first_name=$dbf->idToField("$cfg_tableprefix".'customers','first_name',$customer_id);
	$temp_last_name=$dbf->idToField("$cfg_tableprefix".'customers','last_name',$customer_id);
	$sale_customer_name=$temp_first_name.' '.$temp_last_name;
	
}	
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
$display->displayTitle("$lang->saleDetails");
$tableheaders=array("$lang->rowID","$lang->itemName","$lang->brand","$lang->category","$lang->supplier","$lang->quantityPurchased","$lang->unitPrice","$lang->totalItemCost");
$tablefields=array('id','item_id','brand_id','category_id','supplier_id','quantity_purchased','item_unit_price','item_total_cost');
$display->displayReportTable("$cfg_tableprefix",'sales_items',$tableheaders,$tablefields,'sale_id',"$sale_id",'','','id',"$sale_customer_name<br>$sale_date<br><br>Items in sale<br>");

?>



</body>
</html> 