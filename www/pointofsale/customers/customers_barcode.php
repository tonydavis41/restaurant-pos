<?php

session_start();
include ("../settings.php");
include("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/display.php");
include ("../classes/security_functions.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
if(isset($_GET['generateWith']))
{
	$generateWith=$_GET['generateWith'];
}
else
{
	$generateWith='id';
}

$display->displayTitle("$lang->customersBarcode"." ($generateWith)");
echo "<a href='customers_barcode.php?generateWith=account_number'>$lang->accountNumber</a> / <a href='customers_barcode.php?generateWith=id'>id</a>";

if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}


$customers_table=$cfg_tableprefix.'customers';
$result=mysql_query("SELECT * FROM $customers_table ORDER by last_name",$dbf->conn);

echo '<table border=0 width=85% align=center cellspacing=5 cellpadding=12>

<tr>';

$counter=0;
while($row=mysql_fetch_assoc($result))
{
	if($counter%2==0)
	{
		echo '</tr><tr>';
	}
	echo "<td align='center'><img src='../classes/barcode.php?barcode=$row[$generateWith]&width=227&text=*$row[last_name], $row[first_name]*'></td>";
	
	$counter++;
	
}

echo '</tr></table>';





$dbf->closeDBlink();

?>
