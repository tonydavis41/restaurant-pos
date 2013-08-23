<?php
if(isset($_GET['table']))
{
    $table = $_GET['table'];
	$thename = session_name("$table");
	
	
	
	echo "<p>The table is $table the old session name is $thename </p> ";
	
}
session_start();
$messages = "";
function show( $str ) {  global $messages;  $messages .= $str; }

$newname=session_name();
echo "<p> the session name is $newname ";










?>