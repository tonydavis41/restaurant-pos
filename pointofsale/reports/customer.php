<?php session_start(); ?>

<html>
<head>
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=300,left = 362,top = 234');");
}

</script>
</head>

<body>
<?php

include ("../settings.php");
include("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/display.php");
include ("../classes/form.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Report Viewer',$lang);
if(!$sec->isLoggedIn())
{
    header ("location: ../login.php");
    exit();
}

if(isset($_POST['selected_customer']))
{
	$selected_customer=$_POST['selected_customer'];
	$date_range=$_POST['date_range'];
	$dates=explode(':',$date_range);
	$date1=$dates[0];
	$date2=$dates[1];
}

$first_name=$dbf->idToField($cfg_tableprefix.'customers','first_name',$selected_customer);
$last_name=$dbf->idToField($cfg_tableprefix.'customers','last_name',$selected_customer);
$display_name=$first_name.' '.$last_name;

$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
$display->displayTitle("$cfg_company $lang->customerReport");
$tableheaders=array("$lang->rowID","$lang->date","$lang->itemsPurchased","$lang->paidWith","$lang->soldBy","$lang->saleSubTotal","$lang->saleTotalCost","$lang->showSaleDetails");
$tablefields=array('id','date','items_purchased','paid_with','sold_by','sale_sub_total','sale_total_cost','sale_details');
$display->displayReportTable("$cfg_tableprefix",'sales',$tableheaders,$tablefields,'customer_id',"$selected_customer","$date1","$date2",'date',"$lang->listOfSalesFor $display_name<br>$lang->between $date1 $lang->and $date2");

?>



</body>
</html> 