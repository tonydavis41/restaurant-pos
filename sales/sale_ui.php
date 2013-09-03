<?php session_start();

include ("../settings.php");
include ("../language/$cfg_language");
$lang=new language();

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

function customerPopUp() {
alert("DEBUG: You will open a pop up");
cWindow = window.open('customer_search.html','cWindow','status=1,height=300,width=400,resizable=0');
}

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

function buttonClick(id) {
  var form = document.getElementById('additem');

  if(id == "itemtoadd" ) {
     validateForm();
  } else {
     document.getElementById('additem').submit();
	 
	}
	 
 }



// Form validation
function validateForm()
{


var y=document.forms["additem"]["items"].selectedIndex;
if (y==-1)
 {
  alert("You must select an item");
  return false;
  }
else
  {
  //document.forms["additem"].action = "customer_search.html";
  return true;
  }
}


</script>
<link rel="stylesheet" href="../phppos-style.css" type="text/css" />
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
	if(empty($_POST['quantity']))
	{
		echo "<b>You must specify the quantity</b><br>";
		echo "<a href=javascript:history.go()>$lang->refreshAndTryAgain</a>";
		exit();
	}
	
	$items_to_add=array();
	$items_to_add=$_POST['items'];
	$quantity_to_add=$_POST['quantity'];
	for($k=0;$k<count($items_to_add);$k++)
	{
	$_SESSION['items_in_sale'][]=$items_to_add.' '.$quantity_to_add;
	}
}

//Start of table and start of form 
//echo "<center><form name='additem' method='POST' action='sale_ui.php' onsubmit='return validateForm()'>
echo "<center><form name='additem' method='POST' action='sale_ui.php'>
	 <table border=1 cellspacing='0' cellpadding='2' bgcolor='$table_bg'><tr>";

	$customers_table="$cfg_tableprefix".'customers';
	$order_customer_first_name=$dbf->idToField($customers_table,'first_name',$_SESSION['current_sale_customer_id']);
	$order_customer_last_name=$dbf->idToField($customers_table,'last_name',$_SESSION['current_sale_customer_id']);
	$order_customer_name=$order_customer_first_name.' '.$order_customer_last_name;

	$saletype=$_SESSION['saleType'];
	if($saletype=='restaurant')
	{
	// ROW 1 , BOX 1 and BOX 2 - customer(s) description and clear sale option
	echo "<td colspan=2><center><h3>$lang->restaurantOrder $lang->orderFor: <b>$order_customer_name</b> ( $num_of_customers customers )</h3></td>
		<td colspan=1 align='center'><a href=delete.php?action=all>[Clear Sale]</a></td>";
	}
	else
	{
	echo "<td colspan=2><center><h3>$lang->takeawayOrder $lang->orderFor: <b>$order_customer_name</b></h3></td>
		<td colspan=1 align='center'><a href=delete.php?action=all>[Clear Sale]</a></td>";
	}

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


	  for($k=0;$k<$num_items;$k++)
          {
		$item_info=explode(' ',$_SESSION['items_in_sale'][$k]);
		//$temp_item_id=$item_info[0];
		//$temp_item_name=$dbf->idToField($items_table,'item_name',$temp_item_id);
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
            }

	  $finalSubTotal=number_format($finalSubTotal,2,'.', '');
	  $finalTax=number_format($finalTax,2,'.', '');
	  $finalTotal=number_format($finalTotal,2,'.', '');
        
	echo "<td><font color='white'>$lang->paidWith:</font><br>
		<select name='paid_with'>
		<option value='$lang->TBC'>$lang->TBC</option>
		<option value='$lang->cash'>$lang->cash</option>
		<option value='$lang->check'>$lang->check</option>
		<option value='$lang->credit'>$lang->credit</option>
		<option value='$lang->debit'>$lang->debit</option>
		<option value='$lang->account'>$lang->account</option>
		<option value='$lang->other'>$lang->other</option>
		</select></td>
		<td><font color='white'>$lang->discount:<select name=discount>
		<option value='0'>0%</option>
		<option value='0.9'>10%</option>
		<option value='0.8'>20%</option>
		<option value='0.7'>30%</option>
		</select></td>

		<td colspan=2><font color='white'>$lang->saleComment:</font><br>
		<input type=text name=comment size=15>
		</td>

		<td colspan=1 align='center'>
	        <input type=hidden name='totalItemsPurchased' value='$totalItemsPurchased'>
		<input type=hidden name='totalTax' value='$finalTax'>
		<input type=hidden name='finalTotal' value='$finalTotal'>
		<input type='submit' id='addsale' value='Add Sale' name=addSale  onClick='buttonClick(this.id)'> </center></td></tr>";
}

// ROW 2 , BOX 1 - find item
    echo "<tr>
    <td align='left'><font color=white>$lang->findItem:</font>
	<input type='text' size='8' name='item_search' id='item_search'/>
	<input type='button' value='Go' onclick='getItem(document.getElementById(\"item_search\").value)'>
   <a href='delete.php?action=item_search'><font size='-1' color='white'>[$lang->clearSearch]</font></a>
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
echo "<td align='center'><font color=white>$lang->quantity:</font>
      <input type='text' size='4' name='quantity' value='1'>
      <input type='submit' id='itemtoadd' value='Add To Cart' name=addToCart tabindex='1' onClick='buttonClick(this.id)'>
      </td>";

$brand_result=mysql_query("SELECT brand,id FROM $brands_table",$dbf->conn);


//echo "<td align='center'>$item_title</td>";


if(isset($_SESSION['items_in_sale']))
{
	
	echo "
	<td rowspan=1><font color=CCCCCC><b>$lang->remove</b></font></td>
	<td rowspan=1><font color=CCCCCC><b>$lang->itemName</b></font></td>
	<td rowspan=1><font color=CCCCCC><b>$lang->unitPrice</b></font></td>
	<td rowspan=1><font color=CCCCCC><b>$lang->quantity</b></font></td>
	<td rowspan=1><font color=CCCCCC><b>$lang->extendedPrice</b></font></td>
	
	<td	rowspan=1><font color=CCCCCC><b>$lang->update</b></font></td>
	</tr>";
}

// ROW 3, BOX 1 - list of categories
echo "<!-- Added section to table for menu subsections -->
	<tr>
	<td align='left' bgcolor='FFFFFF' rowspan='99'>
        <div class='category'>
	<ul>";

while($row=mysql_fetch_assoc($brand_result))
{
	$bid=$row['id'];
	$brand_name=$dbf->idToField("$brands_table",'brand',"$bid");
	$display_brand="$brand_name";
	
	echo "<li><a href='javascript:getItem($bid)'>$display_brand</a></li>\n";

}

echo "</ul></div></td>";

if(isset($_SESSION['saleType']))
{
	$saletype=$_SESSION['saleType'];
}


// ROW3 , BOX 2 - list of items
echo "<td id='items' rowspan='99' style='text-align:center;vertical-align:top'>";


//echo "<select name='items[]' multiple size='8'>\n";
echo "<p>Select Items</p><p><select name='items' size='8'>\n";


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
echo "</select></td>";

if(isset($_SESSION['items_in_sale']))
{


	for($k=0;$k<$num_items;$k++)
	{
		$item_info=explode(' ',$_SESSION['items_in_sale'][$k]);
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
		//$finalSubTotal+=$subTotal;
		//$finalTax+=$tax;
		//$finalTotal+=$rowTotal;
		$totalItemsPurchased+=$temp_quantity;

		if($first=='yes')
		{
			echo "<td align='center' class='sale_info'><a href=delete.php?action=item&pos=$k>[$lang->delete]</a></td>";

		}
		else
		{
			echo "<td align='center' class='sale_info'><a href=delete.php?action=item&pos=$k>[$lang->delete]</a></td>";
		}
		
		echo "<td class='sale_info'>$temp_item_name </td>
			<td class='sale_info'><input type=text name='price$k' value='$temp_price' size='8'></td>
			<td class='sale_info'><input type=text name='quantity$k' value='$temp_quantity' size='3'></td>
			<td class='sale_info'>$cfg_currency_symbol$rowTotal</td>
			<td class='sale_info'><input type='button' name='updateQuantity$k' value='$lang->update' onclick=\"document.additem.action='update_price.php?update_item=$k';document.additem.submit();\"></td>
			<input type='hidden' name='item_id$k' value='$temp_item_id'></tr>";
	}

}


echo "<tr>";

if(isset($_SESSION['items_in_sale']))
{

	echo "<td class='sale_info' colspan=6 align='center'>$lang->saleSubTotal: $cfg_currency_symbol$finalSubTotal</td></tr>
	<tr><td class='sale_info' colspan=6 align='center'>$lang->tax: $cfg_currency_symbol$finalTax</td></tr>
	<tr><td class='sale_info' colspan=6 align='center'><b>$lang->saleTotalCost: $cfg_currency_symbol$finalTotal</b></td></tr>";

	//Temporary fix for formatting...add row to align with categories column
        echo "<tr><td colspan=6 rowspan=30>&nbsp</td></tr>";
}
else
{
	echo "<td rowspan=5><center><h3>$lang->yourOrderIsEmpty</h3></center></td></tr>";
}

// Table and Form ended
echo "</table></form>";


$dbf->closeDBlink();


?>

</script>
</body>
</html>
