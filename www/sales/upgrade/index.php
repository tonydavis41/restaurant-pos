<?php
include ("../settings.php");

if(isset($_GET['process']))
{
	$language=$_GET['language'];
	$numberForBarcode=$_GET['numberForBarcode'];
	include ("../language/$language");
	$lang=new language();
	$conn = mysql_connect("$cfg_server", "$cfg_username", "$cfg_password") or die("Could not connect : " . mysql_error());
	mysql_select_db("$cfg_database",$conn);

	$upgradetable=$cfg_tableprefix.'sales';
	$upgradetable2=$cfg_tableprefix.'sales_items';

    $query="ALTER TABLE $upgradetable ADD comment VARCHAR(100) NOT NULL AFTER sold_by";
    $query2="ALTER TABLE $upgradetable2 DROP brand_id";
    $query3="ALTER TABLE $upgradetable2 DROP category_id"; 
    $query4="ALTER TABLE $upgradetable2 DROP supplier_id"; 

	mysql_query($query,$conn);
	mysql_query($query2,$conn);
	mysql_query($query3,$conn);
	mysql_query($query4,$conn);
	
	$info="<?php 
	\$cfg_language=\"$language\";
	\$cfg_numberForBarcode=\"$numberForBarcode\";

	
	?>";
	$open = fopen( "../settings.php", "a+" ) or die ( "Operation Failed!" );
	fputs( $open, "$info" );
	fclose( $open );


	echo "$lang->upgradeSuccessfullMessage";
	
}
else
{
include ("../language/english.php");
$lang=new language();
echo "$lang->upgradeMessage";
?>
<br> 
<br>
<form action="index.php" method="GET">
<?php echo $lang->language ?>: <select name="language" style="border-style: solid; border-width: 1; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1">
        
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
        
        </select><br>
        
        <?php echo $lang->numberToUseForBarcode ?>: <select size="1" name="numberForBarcode" style="border-style: solid; border-width: 1">
        <option value="Row ID"><?php echo $lang->rowID ?></option>
        <option value="Account/Item Number"><?php echo "$lang->accountNumber/$lang->itemNumber" ?></option>
        </select>

        <br>
<input type=hidden name="process" value="go">
<input type=submit>
</form>


<?php
}
?>

