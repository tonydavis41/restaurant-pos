<?php session_start(); ?>

<html>
<head>
<SCRIPT LANGUAGE="Javascript">
<!---
function decision(message, url)
{
  if(confirm(message) )
  {
    location.href = url;
  }
}
// --->
</SCRIPT> 

</head>

<body>
<?php

include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/display.php");
include ("../classes/form.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);
if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}
$display=new display($dbf->conn,$cfg_theme,$cfg_currency_symbol,$lang);
$display->displayTitle("$lang->manageSales");

$f1=new form('manage_sales.php','POST','sales','450',$cfg_theme,$lang);
$f1->createInputField("<b>$lang->searchForSale</b>",'text','search',"$lang->highID".'-'."$lang->lowID",'24','350');
$f1->endForm();


if(isset($_POST['search']))
{
	$search=$_POST['search'];
	$temp_search=explode('-',$search);
	
	if(!(ereg('-',$search)))
	{
		echo '<center><b></b></center>';
		exit();
	}
	$id1=$temp_search[0];
	$id2=$temp_search[1];
	
	if($id1 < $id2)
	{
		echo "<center><b>$lang->incorrectSearchFormat(ex: $id2-$id1)</b></center>";
		exit();
	
	}
	
	echo "<center>$lang->searchedForSales id's <b>$id1 $lang->and $id2:</b></center>";
	$display->displaySaleManagerTable("$cfg_tableprefix",$id2,$id1,'id');

}
else
{
	$display->displaySaleManagerTable("$cfg_tableprefix",'','','id');
}


$dbf->closeDBlink();


?>
</body>
</html>