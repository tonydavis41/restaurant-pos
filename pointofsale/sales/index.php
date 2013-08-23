<?php

session_start();
include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Sales Clerk',$lang);
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
    <td><img border=\"0\" src=\"../images/sales.gif\" width=\"30\" height=\"31\" valign='top'><font color='#005B7F' size='4'>&nbsp;<b>$lang->sales</b></font><br>
      <br>
      <font face=\"Verdana\" size=\"2\">$lang->salesWelcomeMessage</font>
      <ul>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"sale_ui.php?type=restaurant\">$lang->processSale</a></font></li>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"sale_ui.php?type=takeaway\">$lang->processTakeawaySale</a></font></li>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"manage_sales.php\">$lang->manageSales</a></font></li>
      </ul>
    </td>
  </tr>
</table>
</body>
</html>";

$dbf->closeDBlink();


?>
