<?php session_start();

include ("../settings.php");
include ("../language/$cfg_language");
$lang=new language();

//updating row for an item already in sale.
if(isset($_GET['update_item']))
{
	$k=$_GET['update_item'];
	$new_price=$_POST["price$k"];
	$new_tax=$_POST["tax$k"];
	$new_quantity=$_POST["quantity$k"];

	$item_info=explode(' ',$_SESSION['items_in_sale'][$k]);
	$item_id=$item_info[0];

	$_SESSION['items_in_sale'][$k]=$item_id.' '.$new_price.' '.$new_tax.' '.$new_quantity;
	header("location: sale_ui.php");

}



//Start non barcode UI


include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/display.php");

$first='yes';


$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Sales Clerk',$lang);
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);


$table_bg=$display->sale_bg;
$items_table="$cfg_tableprefix".'items';

if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}

if(isset($_POST['addSale']))
{
    $_SESSION['paid_with']=$_POST['paid_with'];
    $_SESSION['discount']=$_POST['discount'];
    $_SESSION['comment']=$_POST['comment'];
    $_SESSION['totalTax']=$_POST['totalTax'];
    $_SESSION['finalTotal']=$_POST['finalTotal'];
	$_SESSION['totalItemsPurchased']=$_POST['totalItemsPurchased'];

	header ("location: ./addsale.php");
	exit();
}

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



//ADDED - if one of the subsection buttons is pressed, just show entries from that subsection
if(isset($_GET['action']))
{
	$action=$_GET['action'];
}

//ADDED - check if takeaway order or restaurant order
if(isset($_GET['type']))
{
	$_SESSION['saleType']=$_GET['type'];
	$saletype=$_SESSION['saleType'];
}

if(isset($_SESSION['num_of_customers']))
{
	$num_of_customers=$_SESSION['num_of_customers'];
}

if(isset($_POST['addToCart']))
{

	if(empty($_POST['items']))
	{
		echo "<b>$lang->youMustSelectAtLeastOneItem</b><br>";
		echo "<a href=javascript:history.go()>$lang->refreshAndTryAgain</a>";
		exit();
	}
	
	$items_to_add=array();
	$items_to_add=$_POST['items'];
	$quantity_to_add=$_POST['quantity'];

	for($k=0;$k<count($items_to_add);$k++)
	{
		$_SESSION['items_in_sale'][]=$items_to_add[$k].' '.$quantity_to_add;
	}
}

//Start of table and start of form 
echo "<center><form name='additem' method='POST' action='sale_ui.php'>
	 <table border=1 cellspacing='0' cellpadding='2' bgcolor='$table_bg'><tr>";

if(isset($_SESSION['items_in_sale']))
{
	
	$num_items=count($_SESSION['items_in_sale']);
	$temp_item_name='';
	$temp_item_id='';
	$temp_quantity='';
	$temp_price='';
	$finalSubTotal=0;
	$finalTax=0;
	$finalTotal=0;
	$totalItemsPurchased=0;

	$item_info=array();

	$customers_table="$cfg_tableprefix".'customers';
	$order_customer_first_name=$dbf->idToField($customers_table,'first_name',$_SESSION['current_sale_customer_id']);
	$order_customer_last_name=$dbf->idToField($customers_table,'last_name',$_SESSION['current_sale_customer_id']);
	$order_customer_name=$order_customer_first_name.' '.$order_customer_last_name;

	$saletype=$_SESSION['saleType'];
	if($saletype=='restaurant')
	{
	// ROW 1 , BOX 1 and BOX 2 - customer(s) description and clear sale option
	echo "<td colspan=5><center><h3>$lang->restaurantOrder $lang->orderFor: <b>$order_customer_name</b> ( $num_of_customers customers )</h3></td>
		<td colspan=2 align='center'><a href=delete.php?action=all>[Clear Sale]</a></td></tr>";
	}
	else
	{
	echo "<td colspan=5><center><h3>$lang->takeawayOrder $lang->orderFor: <b>$order_customer_name</b></h3></td>
		<td colspan=2 align='center'><a href=delete.php?action=all>[Clear Sale]</a></td></tr>";
	}
}

// ROW 2 , BOX 1 - find item
echo "
	<tr><td align='left'><font color=white>$lang->findItem:</font>
	<input type='text' size='8' name='item_search'>
	<input type='submit' value='Go' tabindex='3'> <a href='delete.php?action=item_search'><font size='-1' color='white'>[$lang->clearSearch]</font></a>
	</td>";


$items_table="$cfg_tableprefix".'items';
$brands_table="$cfg_tableprefix".'brands';


if(isset($_POST['item_search'])  and $_POST['item_search']!='')
{
	$search=$_POST['item_search'];
	$_SESSION['current_item_search']=$search;
	$item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE item_name like \"%$search%\" or item_number= \"$search\" or id =\"$search\" ORDER by item_name",$dbf->conn);
}
elseif(isset($_SESSION['current_item_search']))
{
  	$search=$_SESSION['current_item_search'];
  	$item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE item_name like \"%$search%\" or item_number= \"$search\" or id =\"$search\" ORDER by item_name",$dbf->conn);

}
elseif($dbf->getNumRows($items_table) >200)
{
  	$item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table ORDER by brand_id LIMIT 0,200",$dbf->conn);
}
elseif(isset($action))
{
    $item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE brand_id like \"$action\" ",$dbf->conn);
}
else
{
 	$item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table ORDER by brand_id",$dbf->conn);
}

// ROW 2 , BOX 2 & BOX 3 - select item and blank box 
$item_title=isset($_SESSION['current_item_search']) ? "<td colspan=2><b><font color=white>$lang->selectItem</font></b>":"<font color=white>$lang->selectItem</font></td>
</select></td>";

$brand_result=mysql_query("SELECT brand,id FROM $brands_table",$dbf->conn);


echo "<td align='center'>$item_title</td>";


if(isset($_SESSION['items_in_sale']))
{
	
	echo "
	<td rowspan=1><font color=CCCCCC><b>$lang->remove</b></font></td>
	<td rowspan=1><font color=CCCCCC><b>$lang->itemName</b></font></td>
	<td rowspan=1><font color=CCCCCC><b>$lang->extendedPrice</b></font></td>
	<td rowspan=1><font color=CCCCCC><b>$lang->quantity</b></font></td>
	<td	rowspan=1><font color=CCCCCC><b>$lang->update</b></font></td>
	</tr>";
}

// ROW 3, BOX 1 - list of categories
echo "<!-- Added section to table for menu subsections -->
	<tr>
	<td align='left' bgcolor='FFFFFF' rowspan='99'>
	<ul>";

while($row=mysql_fetch_assoc($brand_result))
{
	$bid=$row['id'];
	$brand_name=$dbf->idToField("$brands_table",'brand',"$bid");
	$display_brand="$brand_name";
	
	echo "<li><a href='javascript:getItem($bid)'><font color='0000FF'><b>$display_brand</b></font></a></li>\n";

}


echo "</ul></td>";

if(isset($_SESSION['saleType']))
{
	$saletype=$_SESSION['saleType'];
}


// ROW3 , BOX 2 - list of items
echo "<td id='items' align='center' rowspan='99'>";


echo "<select name='items[]' multiple size='8'>\n";


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
	//List of items of specified category with cost defined as value
 	echo "<option value='$option_value'>$display_item</option>\n";

}
echo "</select></td></center>";

if(isset($_SESSION['items_in_sale']))
{


	for($k=0;$k<$num_items;$k++)
	{
		$item_info=explode(' ',$_SESSION['items_in_sale'][$k]);
		echo "DEBUG: Item Info is 0. $item_info[0] 1. $item_info[1] 2. $item_info[2] 3. $item_info[3] 4. $item_info[4] 5. $item_info[5]";
		$temp_item_id=$item_info[0];
		$temp_item_name=$dbf->idToField($items_table,'item_name',$temp_item_id);
		$temp_price=$item_info[1];
		// Hard set tax - could get from items database
		$temp_tax=1.2;
		$temp_quantity=$item_info[2];
		$subTotal=$temp_price*$temp_quantity;
		$tax=$subTotal-($subTotal/$temp_tax);
		$rowTotal=$subTotal;
		$rowTotal=number_format($rowTotal,2,'.', '');
		$finalSubTotal+=$subTotal;
		$finalTax+=$tax;
		$finalTotal+=$rowTotal;
		$totalItemsPurchased+=$temp_quantity;

		if($first=='yes')
		{
			echo "<td align='center'><a href=delete.php?action=item&pos=$k><font color=white>[$lang->delete]</font></a></td>";

		}
		else
		{
			echo "<td align='center'><a href=delete.php?action=item&pos=$k><font color=white>[$lang->delete]</font></a></td>";
		}
		echo "<td><font color='white'><b>$temp_item_name</b></font></td>
		<td><font color='white'><b>$cfg_currency_symbol$rowTotal</b></font></td>
		<td><input type=text name='quantity$k' value='$temp_quantity' size='3'></td>
		<td><input type='button' name='updateQuantity$k' value='$lang->update' onclick=\"document.additem.action='sale_ui.php?update_item=$k';document.additem.submit();\"></td>
		<input type='hidden' name='item_id$k' value='$temp_item_id'></tr>";
	}

}


echo "<tr>&nbsp</td>";

if(isset($_SESSION['items_in_sale']))
{

	$finalSubTotal=number_format($finalSubTotal,2,'.', '');
	$finalTax=number_format($finalTax,2,'.', '');
	$finalTotal=number_format($finalTotal,2,'.', '');



	echo "<td colspan=5 align='center'>$lang->saleSubTotal: $cfg_currency_symbol$finalSubTotal</td></tr>
		<tr><td colspan=5 align='center'>$lang->tax: $cfg_currency_symbol$finalTax</td></tr>
		<tr><td colspan=5 align='center'><b>$lang->saleTotalCost: $cfg_currency_symbol$finalTotal</b></td></tr>";


	echo "<br>
		<tr><td><font color='white'>$lang->paidWith:</font></td>
		<td colspan=2><select name='paid_with'>
		<option value='$lang->TBC'>$lang->TBC</option>
		<option value='$lang->cash'>$lang->cash</option>
		<option value='$lang->check'>$lang->check</option>
		<option value='$lang->credit'>$lang->credit</option>
		<option value='$lang->debit'>$lang->debit</option>
		<option value='$lang->account'>$lang->account</option>
		<option value='$lang->other'>$lang->other</option>
		</select></td>
		<td colspan=2><font color='white'>$lang->discount:<select name=discount>
		<option value='0'>0%</option>
		<option value='0.9'>10%</option>
		<option value='0.8'>20%</option>
		<option value='0.7'>30%</option>
		</select></td></tr>

		<tr>
		<td><font color='white'>$lang->saleComment:</font>
		</td>
		<td colspan=4>
		<input type=text name=comment size=25>
		</td></tr>

		<tr><td colspan=5 align='center'>
	    <input type=hidden name='totalItemsPurchased' value='$totalItemsPurchased'>
		<input type=hidden name='totalTax' value='$finalTax'>
		<input type=hidden name='finalTotal' value='$finalTotal'>
		<input type='submit' value='Add Sale' name=addSale></center></td></tr>";

}
else
{
	echo "<td rowspan=5><center><h3>$lang->yourOrderIsEmpty</h3></center></td></tr>";
}

echo "</table>";

echo "<table border=1 cellspacing='0' cellpadding='2' bgcolor='$table_bg' align=center>
	<td align='center' colspan='99'><font color=white>$lang->quantity:</font> <input type='text' size='4' name='quantity' value='1'>
	<input type='submit' value='Add To Cart' name=addToCart tabindex='1'></td></table>
	</form>";
// Form ended


$dbf->closeDBlink();


?>
</body>
</html>