<?php
$language=$_POST['language'];

$info="
<?php
	\$cfg_language=\"$language\";	
	
?>";
		$open = fopen( "../settings.php", "w+" ) or die ( "Operation Failed!" );
		fputs( $open, "$info" );
		fclose( $open );


include("../settings.php");
include("../language/$cfg_language");
$lang=new language();
?>
<html>

<head>
<title>PHP Point of Sale <?php echo $lang->installation ?></title>
</head>

<body leftmargin="0">

<p>
<img border="0" src="../images/install_pos.gif" width="202" height="73"></p>
<form method="POST" action="makeinstall.php" name=install>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <font face="Verdana" size="2"><?php echo $lang->installerWelcomeMessage ?></font></p>
  <div align="left">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="432" id="AutoNumber1">
      <tr>
        <td width="190">
        <p align="right"><b><font face="Verdana" size="2"><?php echo $lang->companyName ?>:</font></b></td>
        <td width="242">
        <p align="center"><font face="Verdana" size="2">
        <input type="text" name="companyName" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><font face="Verdana" size="2"><?php echo $lang->address ?>:</font></td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <textarea name="companyAddress" rows="4" cols="27" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></textarea></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><b><font face="Verdana" size="2"><?php echo $lang->phoneNumber ?>:</font></b></td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <input type="text" name="companyPhone" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><font face="Verdana" size="2"><?php echo $lang->email ?>:<i> </i></font>
        </td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <input type="text" name="companyEmail" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><font face="Verdana" size="2"><?php echo $lang->fax ?>:<i> </i></font>
        </td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <input type="text" name="companyFax" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><font face="Verdana" size="2"><?php echo $lang->website ?>:<i> </i></font>
        </td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <input type="text" name="companyWebsite" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
        <td width="190">
        <p align="right"><font face="Verdana" size="2"><?php echo $lang->other ?>:<i> </i></font>
        </td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <input type="text" name="companyOther" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
      <tr>
        <td width="190">&nbsp;</td>
        <td width="242" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><b><font face="Verdana" size="2"><?php echo $lang->databaseServer ?>:</font></b></td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <input type="text" name="databaseServer" onClick="document.install.databaseServer.value=''" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" value="localhost"></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><b><font face="Verdana" size="2"><?php echo $lang->databaseName ?>:</font></b></td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <input type="text" name="databaseName" value="<?php echo $lang->mustExist ?>" onClick="document.install.databaseName.value=''" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><b><font face="Verdana" size="2"><?php echo $lang->databaseUsername ?>:</font></b></td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <input type="text" name="databaseUsername" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><b><font face="Verdana" size="2"><?php echo $lang->databasePassword ?>:</font></b></td>
        <td width="242" align="center"><font face="Verdana" size="2">
        <input type="password" name="databasePassword" size="30" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
	  <tr>
        <td width="190">
        <p align="right"><b><font face="Verdana" size="2"><?php echo $lang->defaultTaxRate ?>:</font></b></td>
        <td width="242" align="left">&nbsp;<font face="Verdana" size="2">
        <input type="text" name="settingsTaxRate" size="15" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"> <i>%</i></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><b><font face="Verdana" size="2"><?php echo $lang->currencySymbol ?>:</font></b></td>
        <td width="242" align="left">&nbsp;<font face="Verdana" size="2">
        <input type="text" name="currencySymbol" size="2" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
	  <tr>
        <td width="190">
        <p align="right"><b><font face="Verdana" size="2"><?php echo $lang->theme ?>:</font></b></td>
        <td width="242" align="left">&nbsp;<font face="Verdana" size="2">
        <select size="1" name="settingsDefaultTheme" style="border-style: solid; border-width: 1">
        <option value="big blue"><?php echo $lang->bigBlue ?></option>
        <option value="serious"><?php echo $lang->serious ?></option>
        </select></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><font face="Verdana" size="2"><?php echo $lang->tablePrefix ?>:</font></td>
        <td width="242" align="left">&nbsp;<font face="Verdana" size="5">
        <input type="text" name="tableprefix" size="5" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1">_</font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><font face="Verdana" size="2"><?php echo $lang->barCodeMode ?>:</font></td>
        <td width="242" align="left">&nbsp;<font face="Verdana" size="5">
        <input type="checkbox" name="barcodemode" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1"></font></td>
      </tr>
      <tr>
        <td width="190">
        <p align="right"><font face="Verdana" size="2"><b><?php echo $lang->numberToUseForBarcode ?>:</b></font></td>
        <td width="242" align="left">&nbsp;<font face="Verdana" size="5">
		<select size="1" name="numberForBarcode" style="border-style: solid; border-width: 1">
        <option value="Row ID"><?php echo $lang->rowID ?></option>
        <option value="Account/Item Number"><?php echo "$lang->accountNumber/$lang->itemNumber" ?></option>
        </select>
      </tr>
       <tr>
        <td width="190">
        <p align="right"><font face="Verdana" size="2"><b><?php echo $lang->language ?>:</b></font></td>
        <td width="242" align="left">&nbsp;<font face="Verdana" size="5">
     <select name="language" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1">
        
        <?php
        $temp_lang=ucfirst(substr($cfg_language,0,strpos($cfg_language,'.')));
 		echo "<option selected value='$cfg_language'>$temp_lang</option>";
        $handle = opendir('../language');
        	while (false !== ($file = readdir($handle))) 
 			{ 
    			if ($file {0}!='.' && $file!=$cfg_language) 
 				{ 
 					$temp_lang=ucfirst(substr($file,0,strpos($file,'.')));
      				echo "<option value='$file'>$temp_lang</option>"; 
    			} 
  			}
   	    	closedir($handle); 
 		
		?>
        
        </select></font></td>
      </tr>
    </table>
    	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<?php echo $lang->whenYouFirstLogIn ?>:<b>admin</b> <?php echo $lang->and ?> <?php echo $lang->yourPasswordIs ?>:<b>pointofsale</b></p>

  </div>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><font face="Verdana" size="2">*<?php echo $lang->itemsInBoldRequired ?></font></b><br>
  <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" value="<?php echo $lang->install ?>"  name="installPOS" style="color: #006699; font-family: Verdana; font-size: 10pt; font-weight: bold; border: 1px solid #006699; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; background-color: #C0C0C0"></p>
</form>
<p><font face="Verdana" size="2"><br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp; </font></p>

</body>

</html>
