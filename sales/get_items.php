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

if(isset($_GET['brand']))
{
	$brand=$_GET['brand'];
}
else
{
	$brand="not set";
}

$saletype=$_SESSION['saleType'];

$item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE brand_id like \"$brand\" ",$dbf->conn);

# new lines here

if(mysql_num_rows($item_result)==0)
{
  # didn't find anything in as a brand, try as an item 
  $item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE item_name like \"%$brand%\" ",$dbf->conn);
  if (!$item_result) die ("Database access failed:" .mysql_error());
}

echo "<p>Select Items <select name='items[]' multiple='multiple' size='8'>\n";

while($row=mysql_fetch_assoc($item_result))
{
  	$id=$row['id'];
  	$brand_id=$row['brand_id'];
  	$brand_name=$dbf->idToField("$brands_table",'brand',"$brand_id");
  	if($saletype=='restaurant')
	{
		$unit_price=$row['total_cost'];
  	}
  	else
  	{
  		$unit_price=$row['takeawayprice'];
  	}
  	$option_value=$id.' '.$unit_price;
    $display_item="$brand_name".'- '.$row['item_name'];
 	echo "<option value='$option_value'>$display_item</option>\n";

}

echo "</select>";
?>

</body>
