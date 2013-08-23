<?php session_start();

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxFunction(thetotal){
    alert("Entered AJAX function");
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('total0');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	var quantity = document.getElementById('quantity0').value;
	if( !quantity ) {
	  alert("variable quantity not defined");
	}
	
	var queryString = "?quantity=" + quantity + "&total=" + thetotal;
	ajaxRequest.open("GET", "ajax-example.php" + queryString, true);
	ajaxRequest.send(null); 
}

//-->
</script>

</head>
<body>
<?php

$total=5.00;

echo "<form name='myForm'>
	<table>
	<tr><td><input type=text id='quantity0' value='1' size='3'></td>
	<td id='total0'><font color='blue'><b>$total</b></font></td>
	<td><input type='button' onclick='ajaxFunction($total)' value='update' /></td></tr>
	</table>
	</form>";
?>
			  
 </body>
</html>