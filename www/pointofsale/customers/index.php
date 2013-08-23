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
<head>

</head>

<table border=\"0\" width=\"500\">
  <tr>
    <td><img border=\"0\" src=\"../images/customers.gif\" width=\"41\" height=\"33\" valign='top'><font color='#005B7F' size='4'>&nbsp;<b>$lang->customers</b></font><br>
      <br>
      <font face=\"Verdana\" size=\"2\">$lang->customersWelcomeScreen</font>
      <ul>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"form_customers.php?action=insert\">$lang->createNewCustomer</a></font></li>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"manage_customers.php\">$lang->manageCustomers</a></font></li>
          <li><font face=\"Verdana\" size=\"2\"><a href=\"customers_barcode.php\">$lang->customersBarcode</a></font></li>
      </ul>
    </td>
  </tr>
</table>
</body>
</html>";

$dbf->closeDBlink();


?>
