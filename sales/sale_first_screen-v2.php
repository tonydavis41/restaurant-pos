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


if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}

// If add to cart button pressed, save as $_SESSION['items_in_sale']
// and call sale_ui.php
if(isset($_POST['addToCart']))
{
	
	
	if(isset($_POST['customer']))
	{
	  $_SESSION['current_sale_customer_id']=$_POST['customer'];
	}
	elseif(empty($_SESSION['current_sale_customer_id']))
	{
		echo "<b>$lang->mustSelectCustomer</b><br>";
		echo "<a href=javascript:history.go()>$lang->refreshAndTryAgain</a>";
		exit();
	}
	
	if(isset($_POST['num_of_customers']) and $_POST['num_of_customers']!='0')
	{
	  $_SESSION['num_of_customers']=$_POST['num_of_customers'];
	}
	else
	{
		$thevalue = $_POST['num_of_customers'];
		echo "<b>$lang->mustSelectNumberOfCustomers</b><br>";
		echo "<a href=javascript:history.go()>$lang->refreshAndTryAgain</a>";
		exit();
	}
	
	if(empty($_POST['items']))
	{
		echo "<b>$lang->youMustSelectAtLeastOneItem</b><br>";
		echo "<a href=javascript:history.go()>$lang->refreshAndTryAgain</a>";
		exit();
	}
	else
	{
		$items_to_add=array();
		$items_to_add=$_POST['items'];
		$quantity_to_add=$_POST['quantity'];
		//$_SESSION['quantity']=$quantity_to_add;
		//$_SESSION['items']=$items_to_add;

		for($k=0;$k<count($items_to_add);$k++)
		{
		$_SESSION['items_in_sale'][]=$items_to_add.' '.$quantity_to_add;
		}
	}
	header ("location: sale_ui.php");
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

// Customer search pop up (not currently implemented)
function customerPopUp() {
cWindow = window.open('customer_search.html','cWindow','status=1,height=300,width=400,resizable=0');
}

// Form validation
function validateForm()
{
var guests=document.forms["additem"]["num_of_customers"].value;
if (guests==0)
  {
  alert("You must enter the number of customers not " + guests);
  return false;
  }
var y=document.forms["additem"]["items"].selectedIndex;
if (y==-1 && id != "item_search")
 {
  alert("You must select an item");
  return false;
 } else {
  document.getElementById('item_search').submit();
 } 
}
function buttonClick(id) {
  var form = document.getElementById('item_search');

  if(id == "item_search" ) {
     return true;
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
	// If first time get saletype from previous screen
	$_SESSION['saleType']=$_GET['type'];
	$saletype=$_SESSION['saleType'];
}
else
    echo "Went into set saletype when session already saved";
    // saletype already known
	{$saletype=$_SESSION['saleType'];
}

if(isset($_POST['customer']))
{
		$_SESSION['current_sale_customer_id']=$_POST['customer'];
}
	
//$display->displayTitle("$lang->newSale");

//Start of table and start of form
echo "<center><form name='additem' onsubmit='return validateForm()' method='POST' action='sale_first_screen.php'>
	 <table border=1 cellspacing='0' cellpadding='2' bgcolor='$table_bg'><tr>";


// TABLE: ROW 1 , BOX 1 ( display sale type - restaurant or takeaway )
//   $saletype=$_SESSION['saleType'];

echo "<td><font color='FFFFFF'>TYPE:<b> $saletype</b></font></td>";

$customers_table="$cfg_tableprefix".'customers';

if(empty($_SESSION['current_sale_customer_id']))
{
	// this section sets $customer_result variable based on criteria below
	
	 

	 // If customer search entered and it's not blank 
	 if(isset($_POST['customer_search']) and $_POST['customer_search']!='')
	 {
		$search=$_POST['customer_search'];
		$_SESSION['current_customer_search']=$search;
	 	$customer_result=mysql_query("SELECT first_name,last_name,id FROM $customers_table WHERE last_name like \"%$search%\" or first_name like \"%$search%\" or id =\"$search\" ORDER by last_name",$dbf->conn);
     }
	 // use customer search already entered (if screen is refreshed)
	 elseif(isset($_SESSION['current_customer_search']))
	 {
		$search=$_SESSION['current_customer_search'];
	 	$customer_result=mysql_query("SELECT first_name,last_name,id FROM $customers_table WHERE last_name like \"%$search%\" or first_name like \"%$search%\" or id =\"$search\" ORDER by last_name",$dbf->conn);

	 }
	 // If it's a restaurant order, just get tables
	 elseif($saletype=='restaurant')
	 {
		$customer_result=mysql_query("SELECT first_name,last_name,id FROM $customers_table WHERE first_name like \"%Table%\" ORDER by last_name",$dbf->conn);
	 }
	 // If there's more than 200 customers, get first 200
	 elseif($dbf->getNumRows($customers_table) >200)
	 {
		$customer_result=mysql_query("SELECT first_name,last_name,id FROM $customers_table ORDER by last_name LIMIT 0,200",$dbf->conn);
	 }
	 // list all customers in alaphabetical order (last name)
	 else
	 {
		 $customer_result=mysql_query("SELECT first_name,last_name,id FROM $customers_table ORDER by last_name",$dbf->conn);
	 }

	 // Change wording depending on sale type (restaurant or takeaway)
	if ($saletype=='restaurant')
	{
	  $customer_title=isset($_SESSION['current_customer_search']) ? "<b><font color=white>$lang->selectTable:</font></b>":"<font color=white>$lang->selectTable:</font>";
	}
	else
	{
	  $customer_title=isset($_SESSION['current_customer_search']) ? "<b><font color=white>$lang->selectCustomer:</font></b>":"<font color=white>$lang->selectCustomer:</font>";
	} 
	
	// TABLE: ROW 1 , BOX 2 (select customer - $_POST['customer'])
	echo "<td>$customer_title <select name='customer'>";
	
	
	// For takeaways set default customer to takeaway
	if($saletype=='takeaway')
	{
	   echo "<option value=23 selected>Takeaway</option>";
	}
	else
	{
	   while($row=mysql_fetch_assoc($customer_result))
	   {
	 	  $id=$row['id'];
	 	  $display_name=$row['last_name'].', '.$row['first_name'];

		  echo "<option value=$id>$display_name</option>";
	   }
	}   
	 // End of customer select drop down
	 //echo "<input type='submit' value='Select'></select></td>";
	 echo "</select></td>";

}
else
{
	//If a customer is already selected
	
	$current_customer_id=$_SESSION['current_sale_customer_id'];
	$customer_name=mysql_query("SELECT first_name,last_name FROM $customers_table WHERE id = \"$current_customer_id\"",$dbf->conn);
	while($row=mysql_fetch_assoc($customer_name))
	{
		$current_customer=$row['last_name'].', '.$row['first_name'];
	}
	// TABLE: ALTERNATIVE ROW 1 , BOX 2 - list customer with option to clear
	echo "<td><center><font color=white><b>$current_customer</b></font>
	<a href='delete.php?action=customer'><font size='-1' color='white'>[$lang->clearCustomer]</font></a>
	</center></td>";
}
	
	
	

// TABLE: ROW 1 , BOX 3 (find customer - $_POST['customer_search'])
// If go is pressed, the form is re-entered with customer_search set
// If clear is pressed, details are cleared via delete.php
if(isset($_SESSION['current_sale_customer_id']))
{
	// If a customer is already selected - no need for search
	echo "<td>&nbsp</td>";
}
else
{
	// If no customer selected. offer search
	echo "<td align='center'>
	<input type='button' onClick='customerPopUp()' value='Click for Customer Search'></td></tr>";
}

// TABLE: ROW 2 , BOX 1 ( find item - $_POST['item_search'])
echo "<tr>
    <td align='left'><font color=white>$lang->findItem:</font>
	<input type='text' size='8' name='item_search' id='item_search'/>
	<input type='button' value='Go' onclick='getItem(document.getElementById(\"item_search\").value)'>
   <a href='delete.php?action=item_search'><font size='-1' color='white'>[$lang->clearSearch]</font></a>
	</td>";
   //<input type='submit' value='Go' tabindex='3'> - old line

//TABLE: ROW 2, BOX 2 ( text - select item )
echo "<td align='center'><b><font color=white>$lang->selectItem</font></b></td>";

//TABLE: ROW 2 , BOX 3 ( select number of customers - $_POST['num_of_customers'])
if(isset($_SESSION['num_of_customers']))
{
  $num_of_customers=$_SESSION['num_of_customers'];
  echo "<td><b><font color=white>$lang->numberOfCustomers  $num_of_customers</b></font></td>";
}
else
{
	if ( $saletype =='restaurant') 
	{
		echo "<td><b><font color=white>$lang->numberOfCustomers </font></b><select name='num_of_customers'>";
		$counter=0;
		while ( $counter <= 40 ) {
		    
			echo "<option value='$counter'>$counter</option>";
			$counter=$counter + 1;
		}
		echo "</select></td></tr>";
		//echo "<input type='submit' value='Go'></select></td></tr>";
	}
	else
	{
  echo "<td>&nbsp</td></tr>";
	}
}


$items_table="$cfg_tableprefix".'items';
$brands_table="$cfg_tableprefix".'brands';

$brand_result=mysql_query("SELECT brand,id FROM $brands_table",$dbf->conn);

// TABLE: ROW 3 , BOX 1 ( select categories )
echo "<tr>
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
	$item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE item_name like \"%$search%\" or item_number= \"$search\" or id =\"$search\" ORDER by item_name",$dbf->conn);
}
// use item search already entered (if screen is refreshed)
elseif(isset($_SESSION['current_item_search']))
{
	$search=$_SESSION['current_item_search'];
  	$item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE item_name like \"%$search%\" or item_number= \"$search\" or id =\"$search\" ORDER by item_name",$dbf->conn);

}
// If a category is selected, just select those categories
elseif(isset($action))
{
	$item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table WHERE brand_id like \"$action\" ",$dbf->conn);
}
// If nothing specified, select starters
else
{
	$item_result=mysql_query("SELECT item_name,total_cost,tax_percent,brand_id,id,takeawayprice FROM $items_table ORDER by brand_id LIMIT 0,50",$dbf->conn);
}


// TABLE: ROW 3 , BOX 2 ( select items - $_POST['items'])
echo "<td id='items' align='center' rowspan='99'>";

//echo "<select name='items[]' multiple size='8'>\n";
echo "<select name='items' size='8'>\n";

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



// TABLE: ROW 3 , BOX 3 ( text )

echo "<td rowspan=5><center><h3>$lang->yourOrderIsEmpty</h3></center></td></tr>";


if(isset($_SESSION['saleType']))
{
	$saletype=$_SESSION['saleType'];
}

// END OF MAIN TABLE
echo "</table>";

// ADD TO CART BUTTON
echo "<table border=1 cellspacing='0' cellpadding='2' bgcolor='$table_bg' align=center>
	<td align='center' colspan='99'><font color=white>$lang->quantity:</font> <input type='text' size='4' name='quantity' value='1'>
	<input type='submit' value='Add To Cart' name=addToCart tabindex='1'></td></table>
	</form>";
// Form ended


$dbf->closeDBlink();


?>

</body>
</html>
