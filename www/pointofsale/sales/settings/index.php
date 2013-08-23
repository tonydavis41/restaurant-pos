<?php

include ("../settings.php");
include ("../language/$cfg_language");
include ("../classes/db_functions.php");
include ("../classes/security_functions.php");
include ("../classes/display.php");


// Gets current values from settings.php
function getFormFields() 
{
	global $cfg_company;
	global $cfg_address;
	global $cfg_phone;
	global $cfg_email;
	global $cfg_fax;
	global $cfg_website;
	global $cfg_other;
	global $cfg_default_tax_rate;
	global $cfg_currency_symbol;
	global $cfg_theme;
	global $cfg_barcodemode;
	global $cfg_numberForBarcode;
	global $cfg_language;


	$formFields[0]=$cfg_company;
	$formFields[1]=$cfg_address;
	$formFields[2]=$cfg_phone;
	$formFields[3]=$cfg_email;
	$formFields[4]=$cfg_fax;
	$formFields[5]=$cfg_website;
	$formFields[6]=$cfg_other;
	$formFields[7]=$cfg_default_tax_rate;
	$formFields[8]=$cfg_currency_symbol;
	$formFields[9]=$cfg_barcodemode;
	$formFields[10]=$cfg_language;

	return $formFields;
}


function displayUpdatePage($defaultValuesAsArray) 
{

global $hDisplay;
global $cfg_theme;
global $cfg_numberForBarcode;

$themeRowColor1=$hDisplay->rowcolor1;
$themeRowColor2=$hDisplay->rowcolor2;
$lang=new language();

echo "
<html>
<body>

<table border=\"0\" width=\"550\">
  <tr>
    <td>
      <p align=\"left\"><img border=\"0\" src=\"../images/config.gif\" width=\"21\" height=\"28\" valign='top'><font color='#005B7F' size='4'>&nbsp;<b>$lang->config</b></font><br>
      <br>
      <font face=\"Verdana\" size=\"2\">$lang->configurationWelcomeMessage</font></p>
      <div align=\"center\">
        <center>
        <form action=\"index.php\" method=\"post\">
        <div align=\"left\">
        <table border=\"0\" width=\"349\" bgcolor=\"#FFFFFF\">
          <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\"><b>$lang->companyName</b></font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><input type=\"text\" name=\"companyName\" size=\"29\" value=\"".$defaultValuesAsArray[0]."\" style=\"border-style: solid; border-width: 1\"></p>
            </td>
          </tr>
          <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\">$lang->address:</font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><textarea name=\"companyAddress\" rows=\"4\" cols=\"26\" style=\"border-style: solid; border-width: 1\">$defaultValuesAsArray[1]</textarea></p>
            </td>
          </tr>
          <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\"><b>$lang->phoneNumber:</b></font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><input type=\"text\" name=\"companyPhone\" size=\"29\" value=\"".$defaultValuesAsArray[2]."\" style=\"border-style: solid; border-width: 1\"></p>
            </td>
          </tr>
          <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\">$lang->email:</font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><input type=\"text\" name=\"companyEmail\" size=\"29\" value=\"".$defaultValuesAsArray[3]."\" style=\"border-style: solid; border-width: 1\"></p>
            </td>
          </tr>
          <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\">$lang->fax:</font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><input type=\"text\" name=\"companyFax\" size=\"29\" value=\"".$defaultValuesAsArray[4]."\" style=\"border-style: solid; border-width: 1\"></p>
            </td>
          </tr>
          <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\">$lang->website:</font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><input type=\"text\" name=\"companyWebsite\" size=\"29\" value=\"".$defaultValuesAsArray[5]."\" style=\"border-style: solid; border-width: 1\"></p>
            </td>
          </tr>
          <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\">$lang->other:</font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><input type=\"text\" name=\"companyOther\" size=\"29\" value=\"".$defaultValuesAsArray[6]."\" style=\"border-style: solid; border-width: 1\"></p>
            </td>
          </tr>
          <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\"><b>$lang->theme:</b></font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><select size=\"1\" name=\"themeSelected\" style=\"border-style: solid; border-width: 1\">";

			  if($cfg_theme=='serious') 
			  {
				 	echo "
                	<option selected value=\"serious\">$lang->serious</option>
                	<option value=\"big blue\">$lang->bigBlue</option>
					";
			  }
			  elseif($cfg_theme=='big blue')
			  {
			  		echo "
			  		 <option selected value=\"big blue\">$lang->bigBlue</option>
			  		 <option value=\"serious\">$lang->serious</option>


					";
			  }

			echo "
              </select></p>
            </td>
          </tr>
          <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\"><b>$lang->taxRate:</b><br>
              &nbsp;<i>($lang->inPercent)</i></font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><input type=\"text\" name=\"taxRate\" size=\"29\" value=\"".$defaultValuesAsArray[7]."\" style=\"border-style: solid; border-width: 1\"></p>
            </td>
          </tr>
            <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\"><b>$lang->currencySymbol:</b></font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><input type=\"text\" name=\"currencySymbol\" size=\"29\" value=\"".$defaultValuesAsArray[8]."\" style=\"border-style: solid; border-width: 1\"></p>
            </td>
            </tr>
            <tr>
             <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\">$lang->barCodeMode:</font></p>
            <td width=\"214\" bgcolor=\"$themeRowColor1\">
              <p align=\"center\">
              <input type=\"checkbox\" name=\"barcodemode\" $defaultValuesAsArray[9] style=\"border-style: solid; border-width: 1\"></p>
            </td>
          </tr>
        <tr>
            <td width=\"122\" align=\"left\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><font face=\"Verdana\" size=\"2\"><b>$lang->numberToUseForBarcode:</b></font></p>
            </td>
            <td width=\"214\" bgcolor=\"$themeRowColor2\">
              <p align=\"center\"><select size=\"1\" name=\"numberForBarcode\" style=\"border-style: solid; border-width: 1\">";

			  if($cfg_numberForBarcode=='Row ID') 
			  {
				 	echo "
                	<option selected value=\"Row ID\">$lang->rowID</option>
                	<option value=\"Account/Item Number\">$lang->accountNumber/$lang->itemNumber</option>
					";
			  }
			  elseif($cfg_numberForBarcode=='Account/Item Number')
			  {
			  		echo "
                	 <option selected value=\"Account/Item Number\">$lang->accountNumber/$lang->itemNumber</option>
                	 <option value=\"Row ID\">$lang->rowID</option>
					";
			  }

			echo "
              </select></p>
            </td>
          </tr>";
          ?>
           <tr>
        <td width="190" align="left" bgcolor=<?php echo "$themeRowColor1" ?>>
        <p align="center"><font face="Verdana" size="2"><b><?php echo $lang->language ?>:</b></font></td>
        <td width="242" align="center" bgcolor=<?php echo "$themeRowColor1" ?>>&nbsp;<font face="Verdana" size="5">
        <select name="language" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1">
        
        <?php
        $temp_lang=ucfirst(substr($defaultValuesAsArray[10],0,strpos($defaultValuesAsArray[10],'.')));
 		echo "<option selected value='$defaultValuesAsArray[10]'>$temp_lang</option>";
        $handle = opendir('../language');
        	while (false !== ($file = readdir($handle))) 
 			{ 
    			if ($file {0}!='.' && $file!=$defaultValuesAsArray[10]) 
 				{ 
 					$temp_lang=ucfirst(substr($file,0,strpos($file,'.')));
      				echo "<option value='$file'>$temp_lang</option>"; 
    			} 
  			}
   	    	closedir($handle); 
 		
		?>
        
        </select></font></td>
      </tr>
      
       <?php   
        echo "</table>
        </div>
        </center>
        <p align=\"left\">
        <input type=\"submit\" name=\"submitChanges\" style=\"border-style: solid; border-width: 1\"><Br>
        </form>
      </div>
    </td>
  </tr>
</table>
</body>
</html>";

}

function updateSettings($companyname,$companyaddress,$companyphone,$companyemail,$companyfax,$companywebsite,$companyother,$theme,$taxrate,$currencySymbol,$barcodemode,$numberForBarcode,$language) {
 
include("../settings.php");
$lang=new language();
$writeConfigurationFile="<?php
\$cfg_company=\"$companyname\";
\$cfg_address=\"$companyaddress\";
\$cfg_phone=\"$companyphone\";
\$cfg_email=\"$companyemail\";
\$cfg_fax=\"$companyfax\";
\$cfg_website=\"$companywebsite\";
\$cfg_other=\"$companyother\";
\$cfg_server=\"$cfg_server\";
\$cfg_database=\"$cfg_database\";
\$cfg_username=\"$cfg_username\";
\$cfg_password=\"$cfg_password\";
\$cfg_tableprefix=\"$cfg_tableprefix\";
\$cfg_default_tax_rate=\"$taxrate\";
\$cfg_currency_symbol=\"$currencySymbol\";
\$cfg_theme=\"$theme\";
\$cfg_barcodemode=\"$barcodemode\";
\$cfg_numberForBarcode=\"$numberForBarcode\";
\$cfg_language=\"$language\";
?>";	
        
	@unlink("../settings.php");
	$hWriteConfiguration = @fopen("../settings.php", "w+" ) or die ("<br><center><img src='config_updated_failed.gif'><br><br><b>$lang->configUpdatedUnsucessfully</b></center>");
	fputs( $hWriteConfiguration, $writeConfigurationFile);
	fclose( $hWriteConfiguration );
}

// --------------------- Code starts here -----------------------//
session_start();
$lang=new language();
$dbf=new db_functions($cfg_server,$cfg_username,$cfg_password,$cfg_database,$cfg_tableprefix,$cfg_theme,$lang);
$sec=new security_functions($dbf,'Admin',$lang);
$hDisplay=new display($dbf,$cfg_theme,$cfg_currency_symbol,$lang);

if(isset($_POST['submitChanges'])) {
	if($_POST['companyName']!="" && $_POST['companyPhone']!="" && $_POST['taxRate']!="" && $_POST['currencySymbol']!="") 
	{
		if(isset($_POST['barcodemode']))
		{
			$_POST['barcodemode']='checked';
		}
		else
		{
			$_POST['barcodemode']='notchecked';
		}
		updateSettings($_POST['companyName'],$_POST['companyAddress'],$_POST['companyPhone'],
			$_POST['companyEmail'],$_POST['companyFax'],$_POST['companyWebsite'],$_POST['companyOther'],$_POST['themeSelected'],$_POST['taxRate'],$_POST['currencySymbol'],$_POST['barcodemode'],$_POST['numberForBarcode'],$_POST['language']);
		
		echo "<br><center><img src='config_updated_ok.gif'><br><br><b>$lang->configUpdatedSuccessfully</b></center>";
	} 
	else 
	{
		echo "$lang->forgottenFields";
	}
} 
elseif (isset($_POST['cancelChanges'])) 
{
	header("Location: ../home.php");
} 
else 
{
	displayUpdatePage(getFormFields());


}

$dbf->closeDBlink();


?>

