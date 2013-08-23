<?php


$quantity=$_GET['quantity'];
$total=$_GET['total'];

echo "Entered PHP script with $quantity and $total";

$quantity_num=intval($quantity);

if ( $total == 

echo "We now have $quantity_num and $total_num";

$newtotal = $total_num * $quantity_num;

echo "blub: The newtotal is $newtotal";

$newdisplay="<td id='total0'><font color='red'><b>The new total is $newtotal</b></font></td>";

echo "$newdisplay";

?>