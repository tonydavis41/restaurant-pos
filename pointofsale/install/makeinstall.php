<?php

//Gets the info that was typed in on the form.
$companyName=$_POST['companyName'];
$companyAddress=$_POST['companyAddress'];
$companyPhone=$_POST['companyPhone'];
$companyEmail=$_POST['companyEmail'];
$companyFax=$_POST['companyFax'];
$companyWebsite=$_POST['companyWebsite'];
$companyOther=$_POST['companyOther'];
$databaseServer=$_POST['databaseServer'];
$databaseName=$_POST['databaseName'];
$databaseUsername=$_POST['databaseUsername'];
$databasePassword=$_POST['databasePassword'];
$settingsDefaultTheme=$_POST['settingsDefaultTheme'];
$settingsCurrencySymbol=$_POST['currencySymbol'];
$settingsTaxPercent=$_POST['settingsTaxRate'];
$tableprefix=$_POST['tableprefix']!='' ? $_POST['tableprefix'].'_' :'';
$barcodemode=isset($_POST['barcodemode']) ? 'checked' :'notchecked';
$numberForBarcode=$_POST['numberForBarcode'];
$language=$_POST['language'];

include ("../language/$language");
$lang=new language();
//Checks to make sure the required fields were filled out.
if($companyName=='' or $companyPhone=='' or $databaseServer=='' or $databaseName=='' or $databaseUsername=='' or $databasePassword=='' or $settingsCurrencySymbol=='' or $settingsTaxPercent=='' or $language=='')
{
	echo "<b>$lang->forgottenFields</b>";
	exit; 

}
else
{	
	if(!(@mysql_connect("$databaseServer", "$databaseUsername", "$databasePassword")))
	{
		echo"<center>
		<table border='0'>
		<tr>
		<td background='message.gif' width='430' height='82'>
		<center><font face='verdana' color='white'>$lang->problemConnectingToDB</center>
		</td>
		</tr>
		</table></center>";
		exit; 

	}
	else
	{
		/*Writes the info to a settings file which the program needs for all database connections
		and displaying info about the company.
		*/
		$info="<?php
\$cfg_company=\"$companyName\";
\$cfg_address=\"$companyAddress\";
\$cfg_phone=\"$companyPhone\";
\$cfg_email=\"$companyEmail\";
\$cfg_fax=\"$companyFax\";
\$cfg_website=\"$companyWebsite\";	
\$cfg_other=\"$companyOther\";
\$cfg_server=\"$databaseServer\";
\$cfg_database=\"$databaseName\";
\$cfg_username=\"$databaseUsername\";
\$cfg_password=\"$databasePassword\";
\$cfg_tableprefix=\"$tableprefix\";
\$cfg_default_tax_rate=\"$settingsTaxPercent\";	
\$cfg_currency_symbol=\"$settingsCurrencySymbol\";
\$cfg_theme=\"$settingsDefaultTheme\";
\$cfg_barcodemode=\"$barcodemode\";
\$cfg_numberForBarcode=\"$numberForBarcode\";	
\$cfg_language=\"$language\";
?>";
		$open = fopen( "../settings.php", "w+" ) or die ( "Operation Failed!" );
		fputs( $open, "$info" );
		fclose( $open );
		
		//Creates the Database the user wants
		include ("../settings.php");
		$db = mysql_connect("$databaseServer", "$databaseUsername", "$databasePassword"); 
		mysql_select_db("$databaseName",$db);
		
	
		
	//Puts the correct table structure in the database, so the user can begin to use the program!
		$brands=$tableprefix.'brands';
		$categories=$tableprefix.'categories';
		$customers=$tableprefix.'customers';
		$items=$tableprefix.'items';
		$sales=$tableprefix.'sales';
		$sales_items=$tableprefix.'sales_items';
		$suppliers=$tableprefix.'suppliers';
		$users=$tableprefix.'users';

		
		
		$MAKETABLES="
			
		# phpMyAdmin SQL Dump
		# version 2.5.6
		# http://www.phpmyadmin.net
		#
		# Host: localhost
		# Generation Time: Aug 17, 2004 at 05:30 PM
		# Server version: 4.0.15
		# PHP Version: 4.3.6
		# 
		# Database : `pos`
		# 
		
		# --------------------------------------------------------
		
		#
		# Table structure for table `brands`
		#
	
		CREATE TABLE $brands (
		  brand varchar(30) NOT NULL default '',
		  id int(8) NOT NULL auto_increment,
		  PRIMARY KEY  (id)
		) TYPE=MyISAM COMMENT='Contains brands that items use to be more descriptive';

		#
		# Dumping data for table `brands`
		#
	
		
		# --------------------------------------------------------
		
		#
		# Table structure for table `categories`
		#
	
		CREATE TABLE $categories (
		  category varchar(30) NOT NULL default '',
  		  id int(8) NOT NULL auto_increment,
		  PRIMARY KEY  (id)
		  ) TYPE=MyISAM COMMENT='Contains categories that items use to be more descriptive';

		#
		# Dumping data for table `categories`
		#
	

		# --------------------------------------------------------
		
		#
		# Table structure for table `customers`
		#
	
		CREATE TABLE $customers (
		  first_name varchar(75) NOT NULL default '',
		  last_name varchar(75) NOT NULL default '',
		  account_number varchar(10) NOT NULL default '',
		  phone_number varchar(25) NOT NULL default '',
		  email varchar(40) NOT NULL default '',
		  street_address varchar(150) NOT NULL default '',
		  comments blob NOT NULL,
		  id int(8) NOT NULL auto_increment,
		  PRIMARY KEY  (id)
		) TYPE=MyISAM COMMENT='Customer Info.';
	
		#
		# Dumping data for table `customers`
		#
	
	
		# --------------------------------------------------------
	
		#
		# Table structure for table `items`
		#
		
		CREATE TABLE $items (
		  item_name varchar(30) NOT NULL default '',
		  item_number varchar(15) NOT NULL default '',
		  description blob NOT NULL,
		  brand_id int(8) NOT NULL default '0',
		  category_id int(8) NOT NULL default '0',
		  supplier_id int(8) NOT NULL default '0',
	  	buy_price varchar(30) NOT NULL default '',
	  	unit_price varchar(30) NOT NULL default '',
	  	supplier_catalogue_number varchar(60) NOT NULL default '',
	  	tax_percent varchar(5) NOT NULL default '',
  		total_cost varchar(40) NOT NULL default '',
  		quantity int(8) NOT NULL default '0',
  		id int(8) NOT NULL auto_increment,
  		PRIMARY KEY  (id)
		) TYPE=MyISAM COMMENT='Item Info.';
	
		#
		# Dumping data for table `items`
		#


		# --------------------------------------------------------

		#
		# Table structure for table `sales`
		#

		CREATE TABLE $sales (
		  date date NOT NULL default '0000-00-00',
		  customer_id int(8) NOT NULL default '0',
  		sale_sub_total varchar(12) NOT NULL default '',
  		sale_total_cost varchar(30) NOT NULL default '',
  		paid_with varchar(25) NOT NULL default '',
  		items_purchased int(8) NOT NULL default '0',
  		sold_by int(8) NOT NULL default '0',
  		comment varchar(100) NOT NULL default '',
  		id int(8) NOT NULL auto_increment,
  		PRIMARY KEY  (id)
		) TYPE=MyISAM COMMENT='Contains overall sale details';

		#
		# Dumping data for table `sales`
		#
	

		# --------------------------------------------------------
	
		#
		# Table structure for table `sales_items`
		#
	
		CREATE TABLE $sales_items (
		  sale_id int(8) NOT NULL default '0',
		  item_id int(8) NOT NULL default '0',
		  quantity_purchased int(8) NOT NULL default '0',
		  item_unit_price varchar(15) NOT NULL default '',
		  item_buy_price varchar(30) NOT NULL default '',
  		item_tax_percent varchar(10) NOT NULL default '',
  		item_total_tax varchar(12) NOT NULL default '',
  		item_total_cost varchar(12) NOT NULL default '',
  		id int(8) NOT NULL auto_increment,
  		PRIMARY KEY  (id)
		) TYPE=MyISAM COMMENT='Table that holds item information for sales';
	
		#
		# Dumping data for table `sales_items`
		#
			

		# --------------------------------------------------------
	
		#
		# Table structure for table `suppliers`
		#
	
		CREATE TABLE $suppliers (
  		supplier varchar(60) NOT NULL default '',
  		address varchar(100) NOT NULL default '',
  		phone_number varchar(40) NOT NULL default '',
  		contact varchar(60) NOT NULL default '',
  		email varchar(50) NOT NULL default '',
  		other varchar(150) NOT NULL default '',
  		id int(8) NOT NULL auto_increment,
  		PRIMARY KEY  (id)
		) TYPE=MyISAM COMMENT='Hold information about suppliers';
	
		#	
		# Dumping data for table `suppliers`
		#
		
		
		# --------------------------------------------------------
		
		#
		# Table structure for table `users`
		#
	
		CREATE TABLE $users (
  		first_name varchar(50) NOT NULL default '',
  		last_name varchar(50) NOT NULL default '',
  		username varchar(20) NOT NULL default '',
  		password varchar(60) NOT NULL default '',
  		type varchar(30) NOT NULL default '',
  		id int(8) NOT NULL auto_increment,
  		PRIMARY KEY  (id)
		) TYPE=MyISAM COMMENT='User info. that the program needs';
	
		#
		# Dumping data for table `users`
		#
	
		INSERT INTO $users VALUES ('John', 'Doe', 'admin', '439a6de57d475c1a0ba9bcb1c39f0af6', 'Admin', 1);
    	
		";
	
		//Does the query to put it in the database.
		$array =explode (';' ,$MAKETABLES ); 
		foreach($array as $single_query )
		{
			$result =mysql_query ($single_query ,$db ); 
		}

		echo"<center>
		<table border='0'>
		<tr>
		<td background='message.gif' width='430' height='82'>
		<center><font face='verdana' color='white' size='2'>$lang->installSuccessfull</center>
		</td>
		</tr>
		</table></center>";
		exit; 

	}
}


?>
