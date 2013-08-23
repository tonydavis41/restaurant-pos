<?php

class display
{
	
	var $conn;
	var $lang;
	var $title_color,$list_of_color,$table_bgcolor,$cellspacing,$cellpadding,$border_style,$border_width,
	$border_color,$header_rowcolor,$header_text_color,$headerfont_face,$headerfont_size,
	$rowcolor1,$rowcolor2,$rowcolor_text,$rowfont_face,$rowcolor_link,$rowfont_size,$sale_bg;
	
	function display($connection,$theme,$currency_symbol,$language)
	{
		$this->conn=$connection;
		$this->lang=$language;
		$this->currency_symbol=$currency_symbol;
		switch($theme)
		{
			case $theme=='big blue':
				
				$this->title_color='#005B7F';
				$this->list_of_color='#247392';
				
				$this->table_bgcolor='white';
				$this->cellspacing='1';
				$this->cellpadding='0';
				$this->border_style='solid';
				$this->border_width='1';
				$this->border_color='#0A6184';
				
				$this->header_rowcolor='navy';
				$this->header_text_color='white';
				$this->headerfont_face='arial';
				$this->headerfont_size='2';

				
				$this->rowcolor1='#15759B';
				$this->rowcolor2='#0A6184';
				$this->rowcolor_text='white';
				$this->rowfont_face='geneva';
				$this->rowcolor_link='CCCCCC';
				$this->rowfont_size='2';
				$this->sale_bg='#015B7E';
				
			break;
			
			case $theme=='serious':
				
				$this->title_color='black';
				$this->list_of_color='black';
				
				$this->table_bgcolor='white';
				$this->cellspacing='1';
				$this->cellpadding='0';
				$this->border_style='solid';
				$this->border_width='1';
				$this->border_color='black';
				
				$this->header_rowcolor='black';
				$this->header_text_color='white';
				$this->headerfont_face='arial';
				$this->headerfont_size='2';

				
				$this->rowcolor1='#DDDDDD';
				$this->rowcolor2='#CCCCCC';
				$this->rowcolor_text='black';
				$this->rowfont_face='geneva';
				$this->rowcolor_link='black';
				$this->rowfont_size='2';
				$this->sale_bg='#999999';
			break;
			
			
		}
	}
	
	function displayTitle($title)
	{
		//pre: Title must be a string.
		//post: Applys title to page.
		
		echo "<center><h3><font color='$this->title_color'>$title</font></h3></center>";	
	}
	
	function idToField($tablename,$field,$id)
	{
		//pre: $tablename, field, and id all must be valid
		//post: returns a specified field based on the ID from a specified table.
		
		$result = mysql_query("SELECT $field FROM $tablename WHERE id=\"$id\"",$this->conn);
		
		$row = mysql_fetch_assoc($result);
		
		return $row[$field];
	}
	
	function getNumRows($table)
	{
		$query="SELECT id FROM $table";
		$result=mysql_query($query,$this->conn);
		
		return mysql_num_rows($result);
	
	}
	
	function displayManageTable($tableprefix,$tablename,$tableheaders,$tablefields,$wherefield,$wheredata,$orderby)
	{
		//pre:params must be right type
		//post: outputs a nice looking table that is used for manage parts of the program
		
		if($tablename=='brands' or $tablename=='categories')
		{
			$tablewidth='35%';
		}
		else
		{
			$tablewidth='95%';
		}
		
		$table="$tableprefix"."$tablename";
		echo "\n".'<center>';
		
		if($wherefield=='quantity' and $wheredata=='outofstock')
		{
			$result = mysql_query("SELECT * FROM $table WHERE quantity < 1 ORDER BY $orderby",$this->conn);
		}
		elseif($wherefield!='' and $wheredata!='')
		{
			$result = mysql_query("SELECT * FROM $table WHERE $wherefield like \"%$wheredata%\" ORDER BY $orderby",$this->conn);
		}
		elseif($this->getNumRows($table) >200)
		{
			$result = mysql_query("SELECT * FROM $table ORDER BY $orderby LIMIT 0,200",$this->conn);
			echo "{$this->lang->moreThan200} $tableprefix $table".'\'s'."{$this->lang->first200Displayed}";
		}
		else
		{
			$result = mysql_query("SELECT * FROM $table ORDER BY $orderby",$this->conn);
		}
		echo '<hr>';
		if(@mysql_num_rows($result) ==0)
		{
			echo "<div align='center'>{$this->lang->noDataInTable} <b>$table</b> {$this->lang->table}.</div>";
			exit();
		}
		echo "<center><h4><font color='$this->list_of_color'>{$this->lang->listOf} $tablename</font></h4></center>";
		echo "<table cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='$tablewidth' style=\"border: $this->border_style $this->border_color $this->border_width px\">
		
		<tr bgcolor=$this->header_rowcolor>\n\n";
		for($k=0;$k< count($tableheaders);$k++)
		{
			echo "<th align='center'>\n<font color='$this->header_text_color' face='$this->headerfont_face' size='$this->headerfont_size'>$tableheaders[$k]</font>\n</th>\n";
		}
		echo '</tr>'."\n\n";	
		
		$rowCounter=0;
		while($row=mysql_fetch_assoc($result))
		{
			if($rowCounter%2==0)
			{
				echo "\n<tr bgcolor=$this->rowcolor1>\n";
			}
			else
			{
				echo "\n<tr bgcolor=$this->rowcolor2>\n";
			}
			$rowCounter++;
			for($k=0;$k<count($tablefields);$k++)
			{
				$field=$tablefields[$k];
				$data=$this->formatData($field,$row[$field],$tableprefix);

				
				echo "\n<td  align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$data</font>\n</td>\n";
			}
			
			echo "<td align='center'>\n<a href=\"form_$tablename.php?action=update&id=$row[id]\"><font color='$this->rowcolor_link'>{$this->lang->update}</font></a></td>
				 <td align='center'>\n<a href=\"javascript:decision('{$this->lang->confirmDelete} $table {$this->lang->table}?','process_form_$tablename.php?action=delete&id=$row[id]')\"><font color='$this->rowcolor_link'>{$this->lang->delete}</font></a></td>\n</tr>\n\n";
		}
			echo '</table>'."\n";
	}
	
	function displayReportTable($tableprefix,$tablename,$tableheaders,$tablefields,$wherefield,$wheredata,$date1,$date2,$orderby,$subtitle)
	{
		echo "<center><h4><font color='$this->list_of_color'>$subtitle</font></h4></center>";
		$tablewidth='85%';
		
		$table="$tableprefix"."$tablename";
		echo "\n".'<center>';
		if($wherefield!='' and $wheredata!='' and $date1=='' and $date2=='')
		{
			$result = mysql_query("SELECT * FROM $table WHERE $wherefield = \"$wheredata\" ORDER BY $orderby",$this->conn);
		}
		elseif($wherefield!='' and $wheredata!='' and $date1!='' and $date2!='')
		{
			$result = mysql_query("SELECT * FROM $table WHERE $wherefield = \"$wheredata\" and date between \"$date1\" and \"$date2\" ORDER BY $orderby",$this->conn);
		}
		elseif($date1!='' and $date2!='')
		{
			$result = mysql_query("SELECT * FROM $table WHERE date between \"$date1\" and \"$date2\" ORDER BY $orderby",$this->conn);

		}
		else
		{
			$result = mysql_query("SELECT * FROM $table ORDER BY $orderby",$this->conn);
		}
		echo '<hr>';
		if(@mysql_num_rows($result) ==0)
		{
			echo "<div align='center'>{$this->lang->noDataInTable} <b>$table</b> {$this->lang->table}.</div>";
			exit();
		}
		echo "<table cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='$tablewidth' style=\"border: $this->border_style $this->border_color $this->border_width px\">
		
		<tr bgcolor=$this->header_rowcolor>\n\n";
		for($k=0;$k< count($tableheaders);$k++)
		{
			echo "<th align='center'>\n<font color='$this->header_text_color' face='$this->headerfont_face' size='$this->headerfont_size'>$tableheaders[$k]</font>\n</th>\n";
		}
		echo '</tr>'."\n\n";	
		
		
		$rowCounter=0;
		while($row=mysql_fetch_assoc($result))
		{
			if($rowCounter%2==0)
			{
				echo "\n<tr bgcolor=$this->rowcolor1>\n";
			}
			else
			{
				echo "\n<tr bgcolor=$this->rowcolor2>\n";
			}
			$rowCounter++;
			for($k=0;$k<count($tablefields);$k++)
			{
				$field=$tablefields[$k];
				
				if($field=='sale_details')
				{
					$temp_customer_id=$row['customer_id'];
					$temp_date=$row['date'];
					$temp_sale_id=$row['id'];
					$data="<a href=\"javascript:popUp('show_details.php?sale_id=$temp_sale_id&sale_customer_id=$temp_customer_id&sale_date=$temp_date')\"><font color='$this->rowcolor_link'>{$this->lang->showSaleDetails}</font></a>";

				}
				else
				{
					if($field=='brand_id' or $field=='category_id' or $field=='supplier_id')
					{
						$field_data=$this->idToField("$tableprefix".'items',"$field",$row['item_id']);
						$data=$this->formatData($field,$field_data,$tableprefix);
					}
					else
					{
						$data=$this->formatData($field,$row[$field],$tableprefix);
					
					}
				}	
				
				
				echo "\n<td  align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$data</font>\n</td>\n";
			}
			
				
		}	
				echo '</table>'."\n";	
		
	}
	
	function displaySaleManagerTable($tableprefix,$where1,$where2)
	{
		$tablewidth='85%';
		$sales_table="$tableprefix"."sales";
		
		if($where1!='' and $where2!='')
		{

		$sale_query="SELECT * FROM $sales_table WHERE id between \"$where1\" and \"$where2\" ORDER BY id DESC"; 
		$sale_result=mysql_query($sale_query,$this->conn);
			
			
		}
		else
		{
			$sale_query="SELECT * FROM $sales_table ORDER BY id DESC"; 
			$sale_result=mysql_query($sale_query,$this->conn);
			
		}
		
		$sales_tableheaders=array("{$this->lang->date}","{$this->lang->customerName}","{$this->lang->itemsPurchased}","{$this->lang->paidWith}","{$this->lang->soldBy}","{$this->lang->saleSubTotal}","{$this->lang->saleTotalCost}","{$this->lang->saleComment}");
		$sales_tablefields=array('date','customer_id','items_purchased','paid_with','sold_by','sale_sub_total','sale_total_cost','comment');
		
			

		if(@mysql_num_rows($sale_result) < 1)
		{
			echo "<div align='center'>You do not have any data in the <b>sales</b> tables.</div>";
			exit();
		}
		
		$rowCounter1=0;
		echo "<center><table cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='$tablewidth' style=\"border: $this->border_style $this->border_color 3 px\"><tr><td><br>";
		while($row=mysql_fetch_assoc($sale_result))
		{			

                        

			$customername=$this->formatData(customer_id,$row[customer_id],$tableprefix);
			 if (!empty($row[comment])) {
          	        	$salecomment=$row[comment];
 			}
                  else {
				$salecomment="none";
			}
			$customer_info=$customername.':'.$row[paid_with].':'.$salecomment;
			echo "DEBUG 2 DISPLAY: customer info is $customer_info";
                 

			$sale_items_query="SELECT * FROM $sales_items_table WHERE sale_id=\"$row[id]\"";
			$sale_items_result=mysql_query($sale_items_query,$this->conn);
                        
			
 

			echo "<table align='center' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='$tablewidth' style=\"border: $this->border_style $this->border_color $this->border_width px\"><tr><td align='center'colspan=8><br><b>{$this->lang->saleID} $row[id]</b></tr></td>";

echo "<tr><td colspan=4 align='center'>
<a href='update_sale.php?id=$row[id]&custinfo=$customer_info>
<font color='$this->rowcolor_link'><b>{$this->lang->updateSale}</a></b></td>
<td colspan=4 align='center'><a href=\"javascript:decision('{$this->lang->confirmDelete} $sales_table {$this->lang->table}?','delete_sale.php?id=$row[id]')\"><b>{$this->lang->deleteEntireSale}</font></b></a></td></tr>";
			
// echo "<table cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='$tablewidth' style=\"border: $this->border_style $this->border_color $this->border_width px\">";
		
echo "<tr bgcolor=$this->header_rowcolor>\n\n";
			
			for($k=0;$k< count($sales_tableheaders);$k++)
			{
				echo "<th align='center'>\n<font color='$this->header_text_color' face='$this->headerfont_face' size='$this->headerfont_size'>$sales_tableheaders[$k]</font>\n</th>\n";
			}
			
			echo '</tr>'."\n\n";
			if($rowCounter1%2==0)
			{
				echo "\n<tr bgcolor=$this->rowcolor1>\n";
			}
			else
			{
				echo "\n<tr bgcolor=$this->rowcolor2>\n";
			}
			$rowCounter1++;
			for($k=0;$k<count($sales_tablefields);$k++)
			{
				$field=$sales_tablefields[$k];
				$data=$this->formatData($field,$row[$field],$tableprefix);
				
				echo "\n<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$data</font>\n</td>\n";
				
				
			}
			
			echo '</tr></table>';
			
		}		
	}
	function displayTotalsReport($tableprefix,$total_type,$tableheaders,$date1,$date2,$where1,$where2)
	{
		$sales_table="$tableprefix".'sales';
		$sales_items_table="$tableprefix".'sales_items';
		$items_table="$tableprefix".'items';
		$brands_table="$tableprefix".'brands';
		$categories_table="$tableprefix".'categories';
		$suppliers_table="$tableprefix".'suppliers';
		$customer_table="$tableprefix".'customers';
		$users_table="$tableprefix".'users';


		if($total_type=='customers')
		{
			echo "<center><b>{$this->lang->totalsShownBetween} $date1 {$this->lang->and} $date2</b></center>"; 
			echo "<table align='center' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='60%' style=\"border: $this->border_style $this->border_color $this->border_width px\">";
			
			echo "<tr bgcolor=$this->header_rowcolor>\n\n";
			
			for($k=0;$k< count($tableheaders);$k++)
			{
				echo "<th align='center'>\n<font color='$this->header_text_color' face='$this->headerfont_face' size='$this->headerfont_size'>$tableheaders[$k]</font>\n</th>\n";
			}
			
			echo '</tr>'."\n\n";
			
			$query="SELECT * FROM $customer_table ORDER BY last_name";
			$customer_result=mysql_query($query,$this->conn);
			$temp_cust_id=0;
			
			$accum_sub_total=0;
			$accum_total_cost=0;
			$accum_items_purhcased=0;
			$row_counter=0;
			while($row=mysql_fetch_assoc($customer_result))
			{
				$temp_cust_id=$row['id'];
				$customer_name=$this->formatData('customer_id',$temp_cust_id,$tableprefix);
				$query2="SELECT * FROM $sales_table WHERE customer_id=\"$temp_cust_id\" and date between \"$date1\" and \"$date2\"";
				$result2=mysql_query($query2,$this->conn);
				
				$sub_total=0;
				$total_cost=0;
				$items_purchased=0;
				
				while($row2=mysql_fetch_assoc($result2))
				{
					$sub_total+=$row2['sale_sub_total'];
					$accum_sub_total+=$row2['sale_sub_total'];
					
					$total_cost+=$row2['sale_total_cost'];
					$accum_total_cost+=$row2['sale_total_cost'];
					
					$items_purchased+=$row2['items_purchased'];
					$accum_items_purhcased+=$row2['items_purchased'];
				}
				$row_counter++;
				
				$sub_total=number_format($sub_total,2,'.', '');
				$total_cost=number_format($total_cost,2,'.', '');


				if($row_counter%2==0)
				{
					echo "\n<tr bgcolor=$this->rowcolor1>\n";
				}
				else
				{
					echo "\n<tr bgcolor=$this->rowcolor2>\n";
				}
				
				echo "<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$customer_name</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$items_purchased</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$sub_total</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$total_cost</font>\n</td>
					 </tr>";
			}
			echo '</table>';
			$accum_sub_total=number_format($accum_sub_total,2,'.', '');
			$accum_total_cost=number_format($accum_total_cost,2,'.', '');
			
		     echo "<br><table align='right' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='60%' border=0>";
			 echo "<tr><td>{$this->lang->totalItemsPurchased}: <b>$accum_items_purhcased</b></td></tr>
			 	<tr><td>{$this->lang->totalWithOutTax}: <b>$this->currency_symbol$accum_sub_total</b></td></tr>
				 <tr><td>{$this->lang->totalWithTax}: <b>$this->currency_symbol$accum_total_cost</b></td></tr></table>";
		}
		elseif($total_type=='employees')
		{
			echo "<center><b>{$this->lang->totalsShownBetween} $date1 {$this->lang->and} $date2</b></center>"; 
			echo "<table align='center' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='60%' style=\"border: $this->border_style $this->border_color $this->border_width px\">";
			
			echo "<tr bgcolor=$this->header_rowcolor>\n\n";
			
			for($k=0;$k< count($tableheaders);$k++)
			{
				echo "<th align='center'>\n<font color='$this->header_text_color' face='$this->headerfont_face' size='$this->headerfont_size'>$tableheaders[$k]</font>\n</th>\n";
			}
			
			echo '</tr>'."\n\n";
			
			$query="SELECT * FROM $users_table ORDER BY last_name";
			$employee_result=mysql_query($query,$this->conn);
			$temp_cust_id=0;
			
			$accum_sub_total=0;
			$accum_total_cost=0;
			$accum_items_purhcased=0;
			$row_counter=0;
			while($row=mysql_fetch_assoc($employee_result))
			{
				$temp_empl_id=$row['id'];
				$employee_name=$this->formatData('user_id',$temp_empl_id,$tableprefix);
				$query2="SELECT * FROM $sales_table WHERE sold_by=\"$temp_empl_id\" and date between \"$date1\" and \"$date2\"";
				$result2=mysql_query($query2,$this->conn);
				
				$sub_total=0;
				$total_cost=0;
				$items_purchased=0;
				
				while($row2=mysql_fetch_assoc($result2))
				{
					$sub_total+=$row2['sale_sub_total'];
					$accum_sub_total+=$row2['sale_sub_total'];
					
					$total_cost+=$row2['sale_total_cost'];
					$accum_total_cost+=$row2['sale_total_cost'];
					
					$items_purchased+=$row2['items_purchased'];
					$accum_items_purhcased+=$row2['items_purchased'];
				}
				$row_counter++;
				
				$sub_total=number_format($sub_total,2,'.', '');
				$total_cost=number_format($total_cost,2,'.', '');


				if($row_counter%2==0)
				{
					echo "\n<tr bgcolor=$this->rowcolor1>\n";
				}
				else
				{
					echo "\n<tr bgcolor=$this->rowcolor2>\n";
				}
				
				echo "<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$employee_name</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$items_purchased</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$sub_total</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$total_cost</font>\n</td>
					 </tr>";
			}
			echo '</table>';
			$accum_sub_total=number_format($accum_sub_total,2,'.', '');
			$accum_total_cost=number_format($accum_total_cost,2,'.', '');
			
		     echo "<br><table align='right' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='60%' border=0>";
			 echo "<tr><td>{$this->lang->totalItemsPurchased}:<b> $accum_items_purhcased</b></td></tr>
			 	<tr><td>{$this->lang->totalWithOutTax}: <b>$this->currency_symbol$accum_sub_total</b></td></tr>
				 <tr><td>{$this->lang->totalWithTax}: <b> $this->currency_symbol$accum_total_cost</b></td></tr></table>";
		
		
		
		}
		elseif($total_type=='items')
		{
					echo "<center><b>{$this->lang->totalsShownBetween} $date1 {$this->lang->and} $date2</b></center>"; 
			echo "<table align='center' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='70%' style=\"border: $this->border_style $this->border_color $this->border_width px\">";
			
			echo "<tr bgcolor=$this->header_rowcolor>\n\n";
			
			for($k=0;$k< count($tableheaders);$k++)
			{
				echo "<th align='center'>\n<font color='$this->header_text_color' face='$this->headerfont_face' size='$this->headerfont_size'>$tableheaders[$k]</font>\n</th>\n";
			}
			
			echo '</tr>'."\n\n";
			
			
			$query="SELECT * FROM $items_table ORDER BY item_name";
			$item_result=mysql_query($query,$this->conn);
			$temp_item_id=0;
			
			$accum_sub_total=0;
			$accum_total_cost=0;
			$accum_items_purhcased=0;
			$row_counter=0;
			while($row=mysql_fetch_assoc($item_result))
			{
				$temp_item_id=$row['id'];
				$item_name=$this->formatData('item_id',$temp_item_id,$tableprefix);
				$temp_brand=$this->idToField($brands_table,'brand',$this->idToField($items_table,'brand_id',$temp_item_id));
				$temp_category=$this->idToField($categories_table,'category',$this->idToField($items_table,'category_id',$temp_item_id));
				$temp_supplier=$this->idToField($suppliers_table,'supplier',$this->idToField($items_table,'supplier_id',$temp_item_id));
				
				$query2=mysql_query("SELECT * FROM $sales_table WHERE date between \"$date1\" and \"$date2\" ORDER by id ASC",$this->conn);
				$sale_row1=mysql_fetch_assoc($query2);
				$low_sale_id=$sale_row1['id'];
				
				$query3=mysql_query("SELECT * FROM $sales_table WHERE date between \"$date1\" and \"$date2\" ORDER by id DESC",$this->conn);
				$sale_row2=mysql_fetch_assoc($query3);
				$high_sale_id=$sale_row2['id'];
				
				
				$query4="SELECT * FROM $sales_items_table WHERE item_id=\"$temp_item_id\" and sale_id between \"$low_sale_id\" and \"$high_sale_id\"";
				$result4=mysql_query($query4,$this->conn);
				
				$sub_total=0;
				$total_cost=0;
				$items_purchased=0;
				
				while($row2=mysql_fetch_assoc($result4))
				{
					$sub_total+=$row2['item_total_cost']-$row2['item_total_tax'];
					$accum_sub_total+=$row2['item_total_cost']-$row2['item_total_tax'];
					
					$total_cost+=$row2['item_total_cost'];
					$accum_total_cost+=$row2['item_total_cost'];
					
					$items_purchased+=$row2['quantity_purchased'];
					$accum_items_purhcased+=$row2['quantity_purchased'];
				}
				$row_counter++;
				
				$sub_total=number_format($sub_total,2,'.', '');
				$total_cost=number_format($total_cost,2,'.', '');


				if($row_counter%2==0)
				{
					echo "\n<tr bgcolor=$this->rowcolor1>\n";
				}
				else
				{
					echo "\n<tr bgcolor=$this->rowcolor2>\n";
				}
				
				echo "<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$item_name</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$temp_brand</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$temp_category</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$temp_supplier</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$items_purchased</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$sub_total</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$total_cost</font>\n</td>

		
			
					 </tr>";
			}
			echo '</table>';
			$accum_sub_total=number_format($accum_sub_total,2,'.', '');
			$accum_total_cost=number_format($accum_total_cost,2,'.', '');
			
		     echo "<br><table align='right' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='60%' border=0>";
			 echo "<tr><td>{$this->lang->totalItemsPurchased}:<b> $accum_items_purhcased</b></td></tr>
			 	<tr><td>{$this->lang->totalWithOutTax}: <b>$this->currency_symbol$accum_sub_total</b></td></tr>
				 <tr><td>{$this->lang->totalWithTax}: <b> $this->currency_symbol$accum_total_cost</b></td></tr></table>";
		}
		elseif($total_type=='item')
		{
			echo "<center><b>{$this->lang->totalsShownBetween} $date1 {$this->lang->and} $date2</b></center>"; 
			echo "<table align='center' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='60%' style=\"border: $this->border_style $this->border_color $this->border_width px\">";
			
			echo "<tr bgcolor=$this->header_rowcolor>\n\n";
			
			for($k=0;$k< count($tableheaders);$k++)
			{
				echo "<th align='center'>\n<font color='$this->header_text_color' face='$this->headerfont_face' size='$this->headerfont_size'>$tableheaders[$k]</font>\n</th>\n";
			}
			
			echo '</tr>'."\n\n";
				
				$query="SELECT * FROM $items_table WHERE $where1=\"$where2\" ORDER BY item_name";
				$item_result=mysql_query($query,$this->conn);
				$row=mysql_fetch_assoc($item_result);
				$temp_item_id=$row['id'];
				$item_name=$this->formatData('item_id',$temp_item_id,$tableprefix);
				$temp_brand=$this->idToField($brands_table,'brand',$this->idToField($items_table,'brand_id',$temp_item_id));
				$temp_category=$this->idToField($categories_table,'category',$this->idToField($items_table,'category_id',$temp_item_id));
				$temp_supplier=$this->idToField($suppliers_table,'supplier',$this->idToField($items_table,'supplier_id',$temp_item_id));
				
				$item_name=$this->formatData('item_id',$temp_item_id,$tableprefix);
				
				$query2=mysql_query("SELECT * FROM $sales_table WHERE date between \"$date1\" and \"$date2\" ORDER by id ASC",$this->conn);
				$sale_row1=mysql_fetch_assoc($query2);
				$low_sale_id=$sale_row1['id'];
				
				$query3=mysql_query("SELECT * FROM $sales_table WHERE date between \"$date1\" and \"$date2\" ORDER by id DESC",$this->conn);
				$sale_row2=mysql_fetch_assoc($query3);
				$high_sale_id=$sale_row2['id'];
				
				
				$query4="SELECT * FROM $sales_items_table WHERE item_id=\"$temp_item_id\" and sale_id between \"$low_sale_id\" and \"$high_sale_id\"";
				$result4=mysql_query($query4,$this->conn);
				
								
				$sub_total=0;
				$total_cost=0;
				$items_purchased=0;
				
				while($row2=mysql_fetch_assoc($result4))
				{
					$sub_total+=$row2['item_total_cost']-$row2['item_total_tax'];
					$total_cost+=$row2['item_total_cost'];
					$items_purchased+=$row2['quantity_purchased'];
				}
				
				$sub_total=number_format($sub_total,2,'.', '');
				$total_cost=number_format($total_cost,2,'.', '');


				echo "\n<tr bgcolor=$this->rowcolor1>\n";
			
				echo "<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$item_name</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$temp_brand</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$temp_category</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$temp_supplier</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$items_purchased</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$sub_total</font>\n</td>
					<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$total_cost</font>\n</td>
					
					
					</tr>";
			
			echo '</table>';
		
		}
		elseif($total_type=='profit')
		{
		

			echo "<center><b>{$this->lang->totalsShownBetween} $date1 {$this->lang->and} $date2</b></center>"; 
			echo "<table align='center' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='40%' style=\"border: $this->border_style $this->border_color $this->border_width px\">";
			
			echo "<tr bgcolor=$this->header_rowcolor>\n\n";
			
			for($k=0;$k< count($tableheaders);$k++)
			{
				echo "<th align='center'>\n<font color='$this->header_text_color' face='$this->headerfont_face' size='$this->headerfont_size'>$tableheaders[$k]</font>\n</th>\n";
			}
			
			echo '</tr>'."\n\n";
			
			$query="SELECT DISTINCT date FROM $sales_table WHERE date between \"$date1\" and \"$date2\" ORDER by date ASC";
			$result=mysql_query($query);
			
			$amount_sold=0;
			$profit=0;
			$total_amount_sold=0;
			$total_profit=0;
			while($row=mysql_fetch_assoc($result))
			{
			
				$amount_sold=0;
				$profit=0;
				
				$distinct_date=$row['date'];
				$result2=mysql_query("SELECT * FROM $sales_table WHERE date=\"$distinct_date\"",$this->conn);

				echo "\n<tr bgcolor=$this->rowcolor1>\n";
				
				echo "<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$distinct_date</font>\n</td>";
				
				while($row2=mysql_fetch_assoc($result2))
				{
					$amount_sold+=$row2['sale_sub_total'];
					$total_amount_sold+=$row2['sale_sub_total'];
					$profit+=$this->getProfit($row2['id'],$tableprefix);
					$total_profit+=$this->getProfit($row2['id'],$tableprefix);
					
				}
				
				$amount_sold=number_format($amount_sold,2,'.', '');
				$profit=number_format($profit,2,'.', '');

				echo "<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$amount_sold</font>\n</td>";
				echo "<td align='center'>\n<font color='$this->rowcolor_text' face='$this->rowfont_face' size='$this->rowfont_size'>$this->currency_symbol$profit</font>\n</td>";


				echo "</tr>";
			}
			
			echo '</table>';
			
			
			$total_amount_sold=number_format($total_amount_sold,2,'.', '');
			$total_profit=number_format($total_profit,2,'.', '');
				
			 echo "<br><table align='right' cellspacing='$this->cellspacing' cellpadding='$this->cellpadding' bgcolor='$this->table_bgcolor' width='60%' border=0>";
			 echo "<tr><td>{$this->lang->totalAmountSold}: <b>$this->currency_symbol$total_amount_sold</b></td></tr>
			 	<tr><td>{$this->lang->totalProfit}: <b>$this->currency_symbol$total_profit</b></td></tr>
				 </table>";


		}
	}
	
	function getProfit($sale_id,$tableprefix)
	{
		$sales_items_table="$tableprefix".'sales_items';
		$query="SELECT * FROM $sales_items_table WHERE sale_id=\"$sale_id\"";
		$result=mysql_query($query,$this->conn);
		
		$profit=0;
		while($row=mysql_fetch_assoc($result))
		{
			$profit+=($row['item_unit_price']-$row['item_buy_price'])*$row['quantity_purchased'];	
		}
	
		return $profit;
	}
	
	function formatData($field,$data,$tableprefix)
	{
		if($field=='unit_price' or $field=='total_cost' or $field=='buy_price' or $field=='sale_sub_total' or $field=='sale_total_cost' or $field=='item_unit_price' or $field=='item_total_cost' or $field=='item_total_tax' )
		{
			return "$this->currency_symbol"."$data";
		}	
		elseif($field=='tax_percent')
		{
			return "$data".'%';
		}
   		elseif($field=='brand_id')
		{
			return $this->idToField("$tableprefix".'brands','brand',$data);
		}
		elseif($field=='category_id')
		{
			return $this->idToField("$tableprefix".'categories','category',$data);
		}
		elseif($field=='supplier_id')
		{
			return $this->idToField("$tableprefix".'suppliers','supplier',$data);
		}
		elseif($field=='customer_id')
		{
			$field_first_name=$this->idToField("$tableprefix".'customers','first_name',$data);
			$field_last_name=$this->idToField("$tableprefix".'customers','last_name',$data);
			return $field_first_name.' '.$field_last_name;
		}
		elseif($field=='user_id')
		{
			$field_first_name=$this->idToField("$tableprefix".'users','first_name',$data);
			$field_last_name=$this->idToField("$tableprefix".'users','last_name',$data);
			return $field_first_name.' '.$field_last_name;
		}
		elseif($field=='item_id')
		{
			return $this->idToField("$tableprefix".'items','item_name',$data);
		}
		elseif($field=='sold_by')
		{
			$field_first_name=$this->idToField("$tableprefix".'users','first_name',$data);
			$field_last_name=$this->idToField("$tableprefix".'users','last_name',$data);
			return $field_first_name.' '.$field_last_name;				
		}
		elseif($field=='supplier_id')
		{
			return $this->idToField("$tableprefix".'suppliers','supplier',$data);
		}
		elseif($field=='password')
		{
			return '*******';

		}
		else
		{
			return "$data";
		}
			
	}
	
	
		
}





?>
