<?php session_start();

include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/form.php");
include ("../classes/display.php");
$lang=new language();

?>

<html>
<head>


</head>

<body>

<?php


$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
//$sec=new security_functions($dbf,'Admin',$lang); - original line
$sec=new security_functions($dbf,'Sales Clerk',$lang);
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);

$items_table="$cfg_tableprefix".'items';
$brands_table="$cfg_tableprefix".'brands';
$sales_items="$cfg_tableprefix".'sales_items';
$sales_table="$cfg_tableprefix".'sales';


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
    $_SESSION['items_in_sale']=$_POST['items_in_sale'];

    // We need to delete the old sale entry before adding the newly updated one 
    mysql_query("DELETE FROM $sales_itemtablename WHERE sale_id=\"$id\"",$dbf->conn);
    mysql_query("DELETE FROM $sales_table WHERE sale_id=\"$id\"",$dbf->conn);

	header ("location: ./addsale.php");
	exit();
}

//updating row for an item already in sale.
if(isset($_GET['update_item']))
{
	$k=$_GET['update_item'];
	// $new_price=$_POST["price$k"];
	// $new_tax=$_POST["tax$k"];
	$new_quantity=$_POST["quantity$k"];

	$item_info=explode('-',$_SESSION['items_in_sale'][$k]);
	$item_id=$item_info[0];

      $_SESSION['items_in_sale'][]=$itemname.'-'.$id.'-'.$item_id.'-'.$new_quantity;
	header("location: update_sale.php");

}


//ADDED - if one of the subsection buttons is pressed, just show entries from that subsection
if(isset($_GET['action']))
{
	$action=$_GET['action'];
}

//ADDED - check if takeaway order or restaurant order
//???????????? is this needed as worked out later?
if(isset($_GET['type']))
{
	$_SESSION['saleType']=$_GET['type'];
	$saletype=$_SESSION['saleType'];
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
		$_SESSION['items_in_sale'][]=$items_to_add[$k].'-'.$quantity_to_add;
	}
}


//$display->displayTitle("$lang->newSale");


//echo "<center><form name='additem' method='POST' action='update_sale.php'>


//set default values, these will change if $action==update.
$paid_with_value='';
$comment_value='';
$id=-1;


$display->displayTitle("Update Sale");

// **************** START OF SECTION 1 - PROCESS PASSED SALES ID ****************

if(isset($_GET['id']))
{
	     
     	$id=$_GET['id'];

      $_SESSION['id']=$id;

	if(isset($_GET['custinfo']))
	{
     		$salesinfo=$_GET['custinfo'];

		// ----------------- START OF CUSTOMER SECTION ----------------

	
		$salesdata=explode(":",$salesinfo);
		$order_customer_name=$salesdata[0];
		$paid_with=$salesdata[1];
		$comment=$salesdata[2];

	
		if (preg_match('/Table/',$order_customer_name))
		{
			$saletype='restaurant';
		}
		else
		{
			$saletype='takeaway';
		}
		$_SESSION['saleType']=$saletype;
		$_SESSION['customer']=$order_customer_name;
		$_SESSION['paid_with']=$paid_with;
		$_SESSION['comment']=$comment;

     		 echo "DEBUG 3 CUSTOMER: sale type is $saletype \n";
	}

	// ----------------- END OF CUSTOMER SECTION -----------------

	// ----------------- START OF SALES ITEMS SECTION -----------------

      // get item data from sales_items table
	$sales_itemtablename = "$cfg_tableprefix".'sales_items';
	$itemresult = mysql_query("SELECT * FROM $sales_itemtablename WHERE sale_id=\"$id\"",$dbf->conn);
		
	$_SESSION['items_in_sale']=array();
	while($itemrow=mysql_fetch_assoc($itemresult))
	{
		$item_id=$itemrow['item_id'];
		$item_total_cost=$itemrow['item_total_cost'];
		$quantity_purchased=$itemrow['quantity_purchased'];

		echo "DEBUG 1 SALES ITEMS: quantity purchased is $quantity_purchased \n";

		$itemtablename = "$cfg_tableprefix".'items';
            // sales_items table only has item id so we need to get the item name
		$itemnameresult = mysql_query("SELECT * FROM $itemtablename WHERE id=\"$item_id\"",$dbf->conn);
            $itemnamerow = mysql_fetch_assoc($itemnameresult);
            $itemname=$itemnamerow['item_name'];
			
			

		echo "DEBUG 2 SALES ITEMS: Item name is $itemname $id $item_id $quantity_purchased \n";

            
		$_SESSION['items_in_sale'][]=$itemname.'-'.$item_total_cost.'-'.$quantity_purchased.'-'.$item_id;
            //  echo "DEBUG: Item name is NOW  $_SESSION['items_in_sale']";

	}

	// ----------------- END OF SALES ITEMS SECTION -----------------

}

// **************** END OF SECTION 1 - PROCESS PASSED SALES ID ****************
	

// **************** START OF SECTION 2 - BUILD HTML PAGE AND DETAILS ****************


$table_bg=$display->sale_bg;
$items_table="$cfg_tableprefix".'items';

echo "<center><form name='additem' method='POST' action='update_sale.php'>
	 <table border=1 cellspacing='0' cellpadding='2' bgcolor='$table_bg'><tr>";

if(isset($_SESSION['items_in_sale']))
{
	$num_items=count($_SESSION['items_in_sale']);
	echo "Number of items in this sale is $num_items";
	$temp_item_name='';
	$temp_item_id='';
	$temp_quantity='';
	$temp_price='';
	$finalSubTotal=0;
	$finalTax=0;
	$finalTotal=0;
	$totalItemsPurchased=0;

	$item_info=array();
}

$saletype=$_SESSION['saleType'];
$order_customer_name=$_SESSION['customer'];
if($saletype=='restaurant')
{
	echo "<td colspan=5><center><h3>$lang->restaurantOrder $lang->orderFor: <b>$order_customer_name</b></h3></td>
		<td colspan=2 align='center'><a href=delete.php?action=all>[?Clear Sale]</a></td></tr>";
}
else
{
	echo "<td colspan=5><center><h3>$lang->takeawayOrder $lang->orderFor: <b>$order_customer_name</b></h3></td>
		<td colspan=2 align='center'><a href=delete.php?action=all>[?Clear Sale]</a></td></tr>";
}




echo "
	<tr><td align='left'><font color=white>$lang->findItem:</font>
	<input type='text' size='8' name='item_search'>
	<input type='submit' value='Go' tabindex='3'> <a href='delete.php?action=item_search'><font size='-1' color='white'>[$lang->clearSearch]</font></a>
	</td>";

// ----------------- START OF SEARCH TABLE DATA SECTION -----------------




if(isset($_POST['item_search'])  and $_POST['item_search']!='')
{
	$search=$_POST['item_search'];
	$_SESSION['current_item_search']=$search;
	$item_result=mysql_query("SELECT item_name,total_cost,brand_id,id,takeawayprice FROM $items_table WHERE item_name like \"%$search%\" or item_number= \"$search\" or id =\"$search\" ORDER by item_name",$dbf->conn);
}
elseif(isset($_SESSION['current_item_search']))
{
  	$search=$_SESSION['current_item_search'];
  	$item_result=mysql_query("SELECT item_name,total_cost,brand_id,id,takeawayprice FROM $items_table WHERE item_name like \"%$search%\" or item_number= \"$search\" or id =\"$search\" ORDER by item_name",$dbf->conn);

}
elseif($dbf->getNumRows($items_table) >200)
{
  	$item_result=mysql_query("SELECT item_name,total_cost,brand_id,id,takeawayprice FROM $items_table ORDER by item_name LIMIT 0,200",$dbf->conn);
}
elseif(isset($action))
{
    $item_result=mysql_query("SELECT item_name,total_cost,brand_id,id,takeawayprice FROM $items_table WHERE brand_id like \"$action\" ",$dbf->conn);
}
else
{
 	$item_result=mysql_query("SELECT item_name,total_cost,brand_id,id,takeawayprice FROM $items_table ORDER by item_name",$dbf->conn);
}


$item_title=isset($_SESSION['current_item_search']) ? "<td colspan=2><b><font color=white>$lang->selectItem</font></b>":"<font color=white>$lang->selectItem</font></td>";

// ----------------- END OF SEARCH TABLE DATA SECTION -----------------

// ----------------- START OF BUILD BRANDS TABLE DATA SECTION -----------------

$brand_result=mysql_query("SELECT brand,id FROM $brands_table",$dbf->conn);


echo "<td align='center'>$item_title</td>";


echo "
	<td rowspan=1><font color=CCCCCC><b>$lang->remove</b></font></td>
	<td rowspan=1><font color=CCCCCC><b>$lang->itemName</b></font></td>
	
	<td rowspan=1><font color=CCCCCC><b>$lang->quantity</b></font></td>
	<td rowspan=1><font color=CCCCCC><b>$lang->extendedPrice</b></font></td>
	<td	rowspan=1><font color=CCCCCC><b>$lang->update</b></font></td>
	</tr>";

echo "<!-- Added section to table for menu subsections -->
	<tr>
	<td align='left' rowspan='99'>
	<ul>";

while($row=mysql_fetch_assoc($brand_result))
{
	$bid=$row['id'];
	$brand_name=$dbf->idToField("$brands_table",'brand',"$bid");
	$display_brand="$brand_name";
	echo "<li><a href='update_sale.php?action=$bid'>$display_brand</a></li>\n";

}


echo "</ul></td>";

echo "<td align='center' rowspan='99'>";


echo "<select name='items[]' multiple size='8'>\n";


while($row=mysql_fetch_assoc($item_result))
{
  	$id=$row['id'];
  	$brand_id=$row['brand_id'];
  	$brand_name=$dbf->idToField("$brands_table",'brand',"$brand_id");
  	if($saletype=='restaurant')
	{
		$total_cost=$row['total_cost'];
  		  	}
  	else
  	{
  		$total_cost=$row['takeawayprice'];
  	  	}
  	
      $option_value=$row['item_name'].'-'.$total_cost;

      
      $display_item="$brand_name".'- '.$row['item_name'];
 	echo "<option value='$option_value'>$display_item</option>\n";

}
echo "</select></td></center>";

// ----------------- END OF BUILD BRANDS TABLE DATA SECTION -----------------

// ----------------- START OF POPULATE SALES ITEM TABLE DATA SECTION -----------------

if(isset($_SESSION['items_in_sale']))
{

      $finalTotal=0;

	for($k=0;$k<$num_items;$k++)
	{
            
		$item_info=explode('-',$_SESSION['items_in_sale'][$k]);
	
            $temp_item_name=$item_info[0];
            $temp_item_total_cost=$item_info[1];
		$temp_quantity=$item_info[2];
            $temp_sale_id=$item_info[3];
            
            echo "DEBUG2: temp item id is $temp_item_id yemp sale id is $temp_sale_id";
                
                             
	    
            echo "DEBUG3: temp item cost is $temp_item_total_cost ";

		
		
		$rowTotal=$temp_item_total_cost;
		$rowTotal=number_format($rowTotal,2,'.', '');
		$finalTotal+=$rowTotal;
		$totalItemsPurchased+=$temp_quantity;

            echo "<p> !!!! - $temp_item_name - ";
		echo "<td align='center'><a href=delete.php?action=item&pos=$k><font color=white>[$lang->delete]</font></a></td>";


		echo "<td border=3><font color='white'><b>$temp_item_name</b></font></td>
		 
		<td><input type=text name='quantity$k' value='$temp_quantity' size='3'></td>
		<td><font color='white'><b>$cfg_currency_symbol$rowTotal</b></font></td>
		<td><input type='button' name='updateQuantity$k' value='$lang->update' onclick=\"document.additem.action='update_sale.php?update_item=$k';document.additem.submit();\"></td>
		<input type='hidden' name='item_id$k' value='$temp_item_id'></tr>";
        }
}




echo "<tr>";

if(isset($_SESSION['items_in_sale']))
{
              
	$finalTotal=number_format($finalTotal,2,'.', '');



	echo "<td colspan=5 align='center'><b>$lang->saleTotalCost: $cfg_currency_symbol$finalTotal</b></td></tr>";

	if(isset($_SESSION['paid_with'])) {
		$paid_with=$_SESSION['paid_with'];
	}
	
      	switch ($paid_with) {
		case "Cash":
              	$selected_cash=selected;
			break;
		case "Check":
              	$selected_check=selected;
			break;
		case "Credit":
              	$selected_credit=selected;
			break;
		case "GiftCertificate":
              	$selected_gift=selected;
			break;
		case "Account":
              	$selected_account=selected;
			break;
		case "Other":
              	$selected_other=selected;
			break;
		default:
                 echo "DEBUG 1 PAID WITH: paid with not set \n";	

	}

	echo "<br>
		<tr><td><font color='white'>$lang->paidWith:</font></td>
		<td colspan=4><select name='paid_with'>";
		if (isset($selected_cash)) {
			echo "<option selected value='$lang->cash'>$lang->cash</option>";
		}
		else
		{
			echo "<option value='$lang->cash'>$lang->cash</option>";
		}
		if (isset($selected_check)) {
			echo "<option selected value='$lang->check'>$lang->check</option>";
		}
		else
		{
			echo "<option value='$lang->check'>$lang->check</option>";
		}
		if (isset($selected_credit)) {
			echo "<option selected value='$lang->credit'>$lang->credit</option>";
		}
		else
		{
			echo "<option value='$lang->credit'>$lang->credit</option>";
		}
		if (isset($selected_gift)) {
			echo "<option selected value='$lang->giftCertificate'>$lang->giftCertificate</option>";
		}
		else
		{
			echo "<option value='$lang->giftCertificate'>$lang->giftCertificate</option>";
         	}
		if (isset($selected_account)) {
			echo "<option selected value='$lang->account'>$lang->account</option>";
		}
		else
		{
			echo "<option value='$lang->account'>$lang->account</option>";
 		}
           	if (isset($selected_other)) {
			echo "<option selected value='$lang->other'>$lang->other</option>";
		}
		else
		{
			echo "<option value='$lang->other'>$lang->other</option>";
		}
		echo "</select></td></tr>

		<tr>
     	 	<td><font color='white'>$lang->saleComment:</font>
		</td>
		<td colspan=4>";

		if(isset($_SESSION['comment'])) {
			$comment=$_SESSION['comment'];
		}

		if (isset($comment)) {
			echo "<input type=text name=comment size=25 value=$comment>";
		}
		else
		{
			echo "<input type=text name=comment size=25>";
		}

		echo "</td></tr>

		<tr><td colspan=5 align='center'>
	    	<input type=hidden name='totalItemsPurchased' value='$totalItemsPurchased'>
		<input type=hidden name='totalTax' value='$finalTax'>
		<input type=hidden name='finalTotal' value='$finalTotal'>
		<input type='submit' value='Add Sale' name=addSale></center></td></tr>";

}
else
{
	echo "</tr>";
}


echo "</table>";

echo "<table border=1 cellspacing='0' cellpadding='2' bgcolor='$table_bg' align=center>
	<td align='center' colspan='99'><font color=white>$lang->quantity:</font> <input type='text' size='4' name='quantity' value='1'>
	<input type='submit' value='Add To Cart' name=addToCart tabindex='1'></td></table>
	</form>";



$dbf->closeDBlink();


?>


//##################################### end of sales_ui.php

</body>
</html>



