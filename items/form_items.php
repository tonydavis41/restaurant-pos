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


$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);

if(!$sec->isLoggedIn())
{
		header ("location: ../login.php");
		exit();
}
$brandtable=$cfg_tableprefix.'brands';
$categorytable=$cfg_tableprefix.'categories';
$suppliertable=$cfg_tableprefix.'suppliers';

$tb1=mysql_query("SELECT id FROM $brandtable",$dbf->conn);
$tb2=mysql_query("SELECT id FROM $categorytable",$dbf->conn);
$tb3=mysql_query("SELECT id FROM $suppliertable",$dbf->conn);

if(mysql_num_rows($tb1)==0 or mysql_num_rows($tb2)==0 or mysql_num_rows($tb3)==0)
{
	echo "$lang->brandsCategoriesSupplierError";
	exit();
}

//set default values, these will change if $action==update.
$item_name_value='';
$description_value='';
$item_number_value='';
$brand_id_value='';
$category_id_value='';
$supplier_id_value='';
$buy_price_value='';
$unit_price_value='';
$takeaway_value='';
$supplier_catalogue_number_value='';
$tax_percent_value="$cfg_default_tax_rate";
$total_cost_value='';
$quantity_value='';
$id='unknown';

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
	$display->displayTitle("$lang->updateItem");
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$tablename = "$cfg_tableprefix".'items';
		$result = mysql_query("SELECT * FROM $tablename WHERE id=\"$id\"",$dbf->conn);
		
		$row = mysql_fetch_assoc($result);
		$item_name_value=$row['item_name'];
		$item_number_value=$row['item_number'];
		$description_value=$row['description'];
		$brand_id_value=$row['brand_id'];
		$category_id_value=$row['category_id'];
		$supplier_id_value=$row['supplier_id'];
		$buy_price_value=$row['buy_price'];
		$unit_price_value=$row['unit_price'];
		$supplier_catalogue_number_value=$row['supplier_catalogue_number'];
		$tax_percent_value=$row['tax_percent'];
		$total_cost_value=$row['total_cost'];
		$quantity_value=$row['quantity'];
		$id=$row['id'];
		
	
	}

}
else
{
	$display->displayTitle("$lang->addItem");

}
//creates a form object
$f1=new form('process_form_items.php','POST','items','400',$cfg_theme,$lang);

//creates form parts.
$f1->createInputField("<b>$lang->itemName:</b> ",'text','item_name',"$item_name_value",'24','160');
$f1->createInputField("$lang->description: ",'text','description',"$description_value",'24','160');
$f1->createInputField("$lang->itemNumber: ",'text','item_number',"$item_number_value",'24','160');

$brandtable = "$cfg_tableprefix".'brands';

$brand_option_titles=$dbf->getAllElements("$brandtable",'brand','brand');
$brand_option_titles[0] = $dbf->idToField("$brandtable",'brand',"$brand_id_value");
$brand_option_values=$dbf->getAllElements("$brandtable",'id','brand');
$brand_option_values[0] = $brand_id_value;

$f1->createSelectField("<b>$lang->brand:</b>",'brand_id',$brand_option_values,$brand_option_titles,'160');


$categorytable = "$cfg_tableprefix".'categories';

$category_option_titles=$dbf->getAllElements("$categorytable",'category','category');
$category_option_titles[0] = $dbf->idToField("$categorytable",'category',"$category_id_value");
$category_option_values=$dbf->getAllElements("$categorytable",'id','category');
$category_option_values[0] = $category_id_value;

$f1->createSelectField("<b>$lang->category:</b>",'category_id',$category_option_values,$category_option_titles,'160');

$suppliertable = "$cfg_tableprefix".'suppliers';

$supplier_option_titles=$dbf->getAllElements("$suppliertable",'supplier','supplier');
$supplier_option_titles[0] = $dbf->idToField("$suppliertable",'supplier',"$supplier_id_value");
$supplier_option_values=$dbf->getAllElements("$suppliertable",'id','supplier');
$supplier_option_values[0] = $supplier_id_value;

$f1->createSelectField("<b>$lang->supplier:</b>",'supplier_id',$supplier_option_values,$supplier_option_titles,'160');

$f1->createInputField("<b>$lang->buyingPrice:</b>",'text','buy_price',"$buy_price_value",'10','160');
$f1->createInputField("<b>$lang->sellingPrice:</b>",'text','total_cost',"$total_cost_value",'10','160');
$f1->createInputField("<b>$lang->takeawayPrice:</b>",'text','takeawayprice',"$takeaway_value",'10','160');
$f1->createInputField("<b>$lang->tax (%):</b> ",'text','tax_percent',"$tax_percent_value",'4','160');
$f1->createInputField("$lang->supplierCatalogue: ",'text','supplier_catalogue_number',"$supplier_catalogue_number_value",'24','160');
$f1->createInputField("<b>$lang->quantityStock:</b> ",'text','quantity',"$quantity_value",'3','160');


//sends 2 hidden varibles needed for process_form_users.php.
echo "		
		<input type='hidden' name='action' value='$action'>
		<input type='hidden' name='id' value='$id'>";
$f1->endForm();

$dbf->closeDBlink();

?>
</body>
</html>
	




