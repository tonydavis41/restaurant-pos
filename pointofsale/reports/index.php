<?php

session_start();
include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");

$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Report Viewer',$lang);


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

<table border=\"0\" width=\"600\">
  <tr>
    <td><img border=\"0\" src=\"../images/reports.gif\" width=\"30\" height=\"31\" valign='top'><font color='#005B7F' size='4'>&nbsp;<b>$lang->reports</b></font><br>
      <br>
      <font face=\"Verdana\" size=\"2\">$lang->reportsWelcomeMessage</font>
        <ul>
        <li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->allCustomersReport\">$lang->allCustomersReport</a></font></li>
	    <li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->allEmployeesReport\">$lang->allEmployeesReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->allItemsReport\">$lang->allItemsReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->brandReport\">$lang->brandReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->categoryReport\">$lang->categoryReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->customerReport\">$lang->customerReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"daily.php\">$lang->dailyReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->dateRangeReport\">$lang->dateRangeReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->employeeReport\">$lang->employeeReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->itemReport\">$lang->itemReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->profitReport\">$lang->profitReport</a></font></li>
		<li><font face=\"Verdana\" size=\"2\"><a href=\"form.php?report=$lang->taxReport\">$lang->taxReport</a></font></li>

      </ul>

    </td>
  </tr>
</table>
</body>
</html>";

$dbf->closeDBlink();


?>
