<?php session_start();

include ("../settings.php");
include ("../language/$cfg_language");
$lang=new language();
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/display.php");


$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Sales Clerk',$lang);
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);

$items_table="$cfg_tableprefix".'items';
$brands_table="$cfg_tableprefix".'brands';

?>
<head>
</head>
<body>

<?php

if(isset($_GET['update_item']))
{
	$k=$_GET['update_item'];
	
	$new_price=$_POST["price$k"];
	//$new_tax=$_POST["tax$k"];
	$new_quantity=$_POST["quantity$k"];

	$item_info=explode(' ',$_SESSION['items_in_sale'][$k]);
	$item_id=$item_info[0];
	//echo "DEBUG: quantity is $new_quantity for $item_id";
	//$_SESSION['items_in_sale'][$k]=$item_id.' '.$new_price.' '.$new_tax.' '.$new_quantity;
	$_SESSION['items_in_sale'][$k]=$item_id.' '.$new_price.' '.$new_quantity;
	header("location: sale_ui.php");
	
	//$item_to_update=$_GET['update_item'];
	//echo "update_item is $item_to_update";
}
else
{
	//set for debug purposes
	echo "update_item is not set";
}

//if(isset($_GET['thetotal']))
//{
//	$thetotal=$_GET['thetotal'];
//}
//else
//	//set for debug purposes
//	$thetotal=2;
//}

//sleep(10);
//$thenewprice=$newquantity * $thetotal;
// "<p>$thenewprice</p>@;
?>

</body></html>