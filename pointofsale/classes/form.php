<?php

class form
{
	var $row_color,$text_color;
	var $lang;
	
	function form($form_action,$form_method,$form_name,$table_width,$theme,$language)
	{
		//pre: all parameters are strings.
		//post: sets up the form header along with the table to display form
		
		$this->lang=$language;
		$getType=explode('_',$form_action);
		$type=$getType[0];
		
		if($type=='manage')
		{
			$url=$_SERVER['PHP_SELF'];
			
			if(isset($_POST['search']) or isset($_GET['outofstock']))
			{
				echo "<center><a href=$url>[{$this->lang->clearSearch}]</a></center>";
			}
			
			echo "<form action='$form_action' method='$form_method' name='$form_name'> 
			<center>\n<table border='0' width='$table_width' cellspacing='2' cellpadding='0'>";
		}
	 	else
	 	{
	 		echo "<form action='$form_action' method='$form_method' name='$form_name'> 
			<center><b>*{$this->lang->itemsInBoldRequired}</b>\n<table border='0' width='$table_width' cellspacing='2' cellpadding='0'>";
		}
		
		switch($theme)
		{
			//add more themes
			case $theme=='serious':
				$this->row_color='#DDDDDD';
				$this->text_color='black';
				
			break;
			
			case $theme=='big blue':
				$this->row_color='#15759B';
				$this->text_color='white';
				
			break;
		}
	}
	
	function createInputField($field_title,$input_type,$input_name,$input_value,$input_size,$td_width)
	{
		//pre: all parameters are strings.
		//post: creates in inputField based on parameters.
		
		echo"
		<tr bgcolor=$this->row_color>
		<td width='$td_width'><font color='$this->text_color'>$field_title</font></td>
		<td><input type='$input_type' name='$input_name' value='$input_value' size='$input_size'></td>
		</tr>\n";
			
	}
	
	
	function createSelectField($field_title,$select_name,$option_values,$option_titles,$td_width)
	{
		//pre: all parameters are strings option selected value is at pos 0.
		//post: creates in selectField based on parameters.
		
		echo "
		<tr bgcolor=$this->row_color>
		<td width='$td_width'><font color='$this->text_color'>$field_title</font></td>
		<td><select name='$select_name'>";
		
		if($option_values[0]!='')
		{
			echo"<option selected value=\"$option_values[0]\">$option_titles[0]</option>";
		}
		for($k=1;$k< count($option_values); $k++)
		{
			if($option_values[$k]!=$option_values[0] )
			{
				echo "
				<option value='$option_values[$k]'>$option_titles[$k]</option>"; 
			}			
		}
		
		echo '</select>
		</td>
		</tr>'."\n";
			
	}
	
	
	function createDateSelectField()
	{
		?>
			<tr bgcolor=<?php echo $this->row_color ?> ><td><b><font color=<?php echo $this->text_color ?>><?php echo" {$this->lang->fromMonth}"; ?>:</font></b> <select name=month1>
		<?php
		for($k=1;$k<=12;$k++)
			if($k==date("n"))
				echo "<option selected value=\"".$k."\">".date("M",mktime(0,0,0,$k,1,0))."</option>";	
			else
				echo "<option value=\"".$k."\">".date("M",mktime(0,0,0,$k,1,0))."</option>";
		?>
			</select></td>
		    <td><b><font color=<?php echo $this->text_color ?>><?php echo" {$this->lang->day}"; ?>:</font></b> <select name=day1>
		<?php
		for($k=1;$k<=31;$k++)
			if($k==date("j"))
				echo "<option selected value=\"".$k."\">".$k."</option>";
			else
				echo "<option value=\"".$k."\">".$k."</option>";
		?>
			</select></td>
		    <td><b><font color=<?php echo $this->text_color ?>><?php echo" {$this->lang->year}"; ?>:</font></b> <select name=year1>
		<?php
		for($k=2003;$k<=date("Y");$k++)
			if($k==date("Y"))
				echo "<option selected value=\"".$k."\">".$k."</option>";
			else
				echo "<option value=\"".$k."\">".$k."</option>";
		?>
			</select></td>
		    <td><b><font color=<?php echo $this->text_color ?>><?php echo" {$this->lang->toMonth}"; ?>:</font> <select name=month2>
		<?php
		for($k=1;$k<=12;$k++)
			if($k==date("n"))
				echo "<option selected value=\"".$k."\">".date("M",mktime(0,0,0,$k,1,0))."</option>";	
			else
				echo "<option value=\"".$k."\">".date("M",mktime(0,0,0,$k,1,0))."</option>";
		?>	
			</select></td>
    		<td><b><font color=<?php echo $this->text_color ?>><?php echo" {$this->lang->day}"; ?>:</font></b> <select name=day2>
		<?php
		for($k=1;$k<=31;$k++)
			if($k==date("j"))
				echo "<option selected value=\"".$k."\">".$k."</option>";
			else
				echo "<option value=\"".$k."\">".$k."</option>";
		?>	
		</select></td>
    	<td><b><font color=<?php echo $this->text_color ?>><?php echo" {$this->lang->year}"; ?>:</font></b> <select name=year2>
	<?php
		for($k=2003;$k<=date("Y");$k++)
		if($k==date("Y"))
			echo "<option selected value=\"".$k."\">".$k."</option>";
		else
			echo "<option value=\"".$k."\">".$k."</option>";
		?>
		</select></td></tr>
		<?php
	}
	
	function createTextareaField($field_title,$textarea_name,$textarea_rows,$textarea_cols,$textarea_value,$td_width)
	{
		//pre: all parameters are strings.
		//post: creates a textarea field.
				
		echo "
		<tr bgcolor=$this->row_color>
		<td width='$td_width' valign='top'><font color='$this->text_color'>$field_title</font></td>
		<td><textarea name='$textarea_name' rows='$textarea_rows' cols='$textarea_cols'>$textarea_value</textarea>"; 		
	}
	
	function endForm()
	{
		//adds submit button and ends remainings tags.
		echo '
		<tr>
		<td colspan=2 align=center><input type=submit value=Submit></td>
		</tr>
	</table>
  </center>
</form>';
	}



}
?>