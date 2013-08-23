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


$table_bg=$display->sale_bg;
$items_table="$cfg_tableprefix".'items';
$saletype="restaurant";

?>

<html>
<head>
<script language="JavaScript" type="text/javascript">

// Function to check browser and select appropriate XmlHttpRequest object
function getXmlHttpRequestObject() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest(); //Not IE
	} else if(window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP"); //IE
	} else {
	//Browser too old to work with AJAX
		alert("Your browser doesn't support the XmlHttpRequest object.");
	}
}

//Get our browser specific XmlHttpRequest object.
var receiveReq = getXmlHttpRequestObject();					

//Initiate the asyncronous request - activated when hyperlink in box 1 clicked
function getItem(str) {
	//If our XmlHttpRequest object is not in the middle of a request, start the new asyncronous call.
	if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
		//Setup the connection as a GET call to test.html.
		//True explicity sets the request to asyncronous (default).
		receiveReq.open("GET", 'get_items.php?brand='+str, true);
		//Set the function that will be called when the XmlHttpRequest objects state changes.
		receiveReq.onreadystatechange = setItems; 
		//Make the actual request.
		receiveReq.send(null);
	}			
}

//Called every time our XmlHttpRequest objects state changes.
function setItems() {
	//Check to see if the XmlHttpRequests state is finished.
	if (receiveReq.readyState == 4) {
		//Set the contents of box 2 (id='items') to test.html.
		document.getElementById('items').innerHTML = receiveReq.responseText;
	}
}

</script>
</head>
<body>

<?php

$items_table="$cfg_tableprefix".'items';
$brands_table="$cfg_tableprefix".'brands';

$brand_result=mysql_query("SELECT brand,id FROM $brands_table",$dbf->conn);

// TABLE: ROW 1 , BOX 1 ( select categories )
echo "<table><tr>
	<td align='left' bgcolor='FFFFFF' rowspan='99'>
	<ul>";

while($row=mysql_fetch_assoc($brand_result))
{
	$bid=$row['id'];
	$brand_name=$dbf->idToField("$brands_table",'brand',"$bid");
	$display_brand="$brand_name";
	//echo "<li><a href='sale_first_screen.php?action=$bid'><font color='0000FF'><b>$display_brand</b></font></a></li>\n";
	echo "<li><a href='javascript:getItem($bid)'><font color='0000FF'><b>$display_brand</b></font></a></li>\n";
}

echo "</ul></td>";

// If item search entered and item search not blank
if(isset($_POST['item_search'])  and $_POST['item_search']!='')
{
	$search=$_POST['item_search'];
	$_SESSION['current_item_search']=$search;
	$item_result=mysql_query("SELECT item_name,unit_price,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE item_name like \"%$search%\" or item_number= \"$search\" or id =\"$search\" ORDER by item_name",$dbf->conn);
}
// use item search already entered (if screen is refreshed)
elseif(isset($_SESSION['current_item_search']))
{
  	$search=$_SESSION['current_item_search'];
  	$item_result=mysql_query("SELECT item_name,unit_price,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE item_name like \"%$search%\" or item_number= \"$search\" or id =\"$search\" ORDER by item_name",$dbf->conn);

}
// If a category is selected, just select those categories
elseif(isset($action))
{
    $item_result=mysql_query("SELECT item_name,unit_price,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE brand_id like \"$action\" ",$dbf->conn);
}
// If nothing specified, select starters
else
{
	$item_result=mysql_query("SELECT item_name,unit_price,tax_percent,brand_id,id,takeawayprice FROM $items_table ORDER by brand_id LIMIT 0,50",$dbf->conn);
}


// TABLE: ROW 1 , BOX 2 ( select items - $_POST['items[]'])
echo "<td id='items' align='center' rowspan='99'>";

echo "<select name='items[]' multiple size='8'>\n";

while($row=mysql_fetch_assoc($item_result))
{
  	$id=$row['id'];
  	$brand_id=$row['brand_id'];
  	$brand_name=$dbf->idToField("$brands_table",'brand',"$brand_id");
  	if($saletype=='restaurant')
	{
		$unit_price=$row['unit_price'];
  		$tax_percent=$row['tax_percent'];
  	}
  	else
  	{
  		$unit_price=$row['takeawayprice'];
  		$tax_percent=$row['tax_percent'];
  	}
  	$option_value=$id.' '.$unit_price.' '.$tax_percent;
    $display_item="$brand_name".'- '.$row['item_name'];
 	echo "<option value='$option_value'>$display_item</option>\n";

}
echo "</select></td></center>";


?>

</body>
</html>

