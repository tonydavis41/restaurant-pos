<?php session_start();

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function updatePrice(thetotal,itemnumber){
    
	// Get the new quantity entered
	var quantity = document.getElementById('quantity'+itemnumber).value;
	if( !quantity ) {
	  alert("variable quantity not defined");
	  return false;
	}
	// Get finaltotal value
	var finaltotal = document.getElementById('finaltotal').innerHTML;
	if( !finaltotal ) {
	  alert("variable finaltotal not defined");
	  return false;
	}
	
	// Calculate new total (original total passed to function)
	var newtotal = quantity * thetotal;
	
	//Calculate new final total
	var runningtotal = 0;
	
	
	for (i=0;i<=count;i++) {
	   if (i != itemnumber) {
	     var runningtotal = runningtotal +  parseFloat(document.getElementById('total'+i).innerhtml);
		}
	}
	
	var newfinaltotal = runningtotal + newtotal;
	
	//var newfinaltotal = parseFloat(finaltotal) + ( newtotal - thetotal );
	var totalid = "total"+itemnumber;
	//alert("We have" + newtotal + " " + thetotal + " " + finaltotal + " " + newfinaltotal);
	document.getElementById('total'+itemnumber).innerHTML = "<td id='"+totalid+"'><font color='red'><b>" + newtotal + "</b></font></td>";
	document.getElementById('finaltotal').innerHTML = newfinaltotal ;
	
}

//-->
</script>

</head>
<body>
<?php

$total0=6.75;
$total1=5.50;
$total2=3.75;
$runningtotal=0;
$num=3;


echo "<form name='myForm'>
	<table border=2>
	<tr><td>The item</td><td>Quantity</td><td>Price</td><td>Update Amount</td></tr>";
	
for($k=0;$k<$num;$k++)
{
	if($k == 0) {
		$thetotal=$total0;
	}
	elseif($k == 1) {
		$thetotal=$total1;
	}
	else {
		$thetotal=$total2;
	}
	
	echo "<tr><td><p>Item $k</td><td><input type=text id='quantity$k' value='1' size='3'></td>
	<td id='total$k'><font color='blue'><b>$thetotal</b></font></td>
	<td><input type='button' onclick='updatePrice($thetotal,$k,$num)' value='update' /></td></tr>";
	$runningtotal = $runningtotal + $thetotal;
	
	}

$finaltotal=$runningtotal;

echo "<tr><td colspan=3>&nbsp</td><td id='finaltotal'>$finaltotal</td></tr>";
echo "</table></form>";

?>
			  
 </body>
</html>