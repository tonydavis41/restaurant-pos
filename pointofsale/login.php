<?php

session_start();

include ("settings.php");
include ("language/$cfg_language");
include ("classes/db_functions.php");
include ("classes/security_functions.php");

//create two objects that are needed in this script.
$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Public',$lang);

if(isset($_POST['username']) and isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = md5 ($_POST['password']);
	 
		if($sec->checkLogin($username,$password))
		{
		 	$_SESSION['session_user_id'] = $dbf->getUserID($username,$password);
			header ("location: index.php");
		}
	    else
	    {
	  	 	echo "<center><b>$lang->usernameOrPasswordIncorrect</b></center>";
		}
}

if($sec->isLoggedIn())
{
	header ("Location: index.php");	
}

$dbf->closeDBlink();

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>PHP Point of Sale Login</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">

</HEAD>
<BODY BGCOLOR="#FFFFFF">
<form action="login.php" method="post" name="Login"><center>
<br><br>
<TABLE WIDTH=250 BORDER=0 CELLPADDING=0 CELLSPACING=0 style="border-collapse: collapse" bordercolor="#111111">
	<TR>
		<TD COLSPAN=4 width="358" height="27" background="images/login_01.gif" valign="bottom">
			<center><font color="white" face="Verdana"><?php echo $lang->login ?></font></center>
			</TD>
	</TR>
	<TR>
		<TD COLSPAN=4 width="366">
			<IMG SRC="images/login_02.gif" WIDTH=358 HEIGHT=14 ALT=""></TD>
	</TR>
	<TR>
		<TD COLSPAN=4 background="images/login_03.gif" width="358" HEIGHT="74">
		<center><font color="white" face="verdana" size="2"><?php echo $lang->loginWelcomeMessage ?></font></center>
		</TD>
	</TR>
	<TR>
		<TD width="129" background="images/login_04.gif" height="35">
			<div align="center"><font color="white" face="Verdana" size="2"><?php echo $lang->username ?>:</font></div>
			
			</TD>
		<TD id="loginbg" background="images/login_05.gif" COLSPAN=3 width="235">&nbsp;
        <input type="text" name="username" size="15" style="font-family: Verdana; font-size: 10pt; border: 1px solid #336699"></TD>
	</TR>
	<TR>
		<TD width="129" height="28" background="images/login_06.gif">
		<div align="center"><font color="white" face="Verdana" size="2"><?php echo $lang->password ?>:</font></div>

		</TD>
		<TD COLSPAN=3 id="loginbg2" background="images/login_05.gif" width="235">&nbsp;
        <input type="password" name="password" size="15" style="font-family: Verdana; font-size: 10pt; border: 1px solid #336699"></TD>
	</TR>
	<TR>
		<TD COLSPAN=2 ROWSPAN=2 width="255" height="104" background="images/login_07.gif" align="right">
			<input type="submit" value="<?php echo $lang->go ?>">			
			</TD>
		
    <TD width="54" height="45" background="images/login_08.gif">
    
    </TD>
		<TD ROWSPAN=2 width="53">
			<IMG SRC="images/login_09.gif" WIDTH=51 HEIGHT=104 ALT=""></TD>
	</TR>
	<TR>
		<TD width="54">
			<IMG SRC="images/login_10.gif" WIDTH=52 HEIGHT=59 ALT=""></TD>
	</TR>
	<TR>
		<TD width="131">
			<IMG SRC="images/spacer.gif" WIDTH=129 HEIGHT=1 ALT=""></TD>
		<TD width="128">
			<IMG SRC="images/spacer.gif" WIDTH=126 HEIGHT=1 ALT=""></TD>
		<TD width="54">
			<IMG SRC="images/spacer.gif" WIDTH=52 HEIGHT=1 ALT=""></TD>
		<TD width="53">
			<IMG SRC="images/spacer.gif" WIDTH=51 HEIGHT=1 ALT=""></TD>
	</TR>
</TABLE></center>
</form>
</BODY>
</HTML>