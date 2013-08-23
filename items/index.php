<?php

session_start();
include ("../settings.php");
include("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);


if(!$sec->isLoggedIn())
{
	header ("location: ../login.php");
	exit();
}

echo "
<html>
<body>
<table border=\"0\" width=\"500\">
  <tr>
    <td><img border=\"0\" src=\"../images/items.gif\" width=\"32\" height=\"33\" valign='top'><font color='#005B7F' size='4'>&nbsp;<b>$lang->items</b></font><br>
      <br>
      <font face=\"Verdana\" size=\"2\">$lang->itemsWelcomeScreen</font>
      <ul>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"form_items.php?action=insert\">$lang->createNewItem</a></font></li>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"manage_items.php\">$lang->manageItems</a></font></li>
         <li><font face=\"Verdana\" size=\"2\"><a href=\"items_barcode.php\">$lang->itemsBarcode</a></font></li>
      </ul>
      
      <ul>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"brands/form_brands.php?action=insert\">$lang->createBrand</a></font></li>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"brands/manage_brands.php\">$lang->manageBrands</a></font></li>
      </ul>
      <ul>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"categories/form_categories.php?action=insert\">$lang->createCategory</a></font></li>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"categories/manage_categories.php\">$lang->manageCategories</a></font></li>
      </ul>
       <ul>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"suppliers/form_suppliers.php?action=insert\">$lang->createSupplier</a></font></li>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"suppliers/manage_suppliers.php\">$lang->manageSuppliers</a></font></li>
      </ul>
      <p>&nbsp;</td>
  </tr>
</table>

</body>

</html>";
$dbf->closeDBlink();

?>
