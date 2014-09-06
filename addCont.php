<?php

require_once('db.php');
require_once('functions.php');
	requireLogin();

if ($_POST["name"]) {
	//Process stuff
	$user = getUsername(); 
	$name = isset($_POST['name']) ? $_POST['name'] : null; 
	$location = isset($_POST['location']) ? $_POST['location'] : null; 
	$success = insertContainer($user,$name,$location); 

}

?>

<form id="contForm" action="addCont.php" method="post">
<input type="text" id="name" required="required">Container Name</input>
<input type="text" id="loc" required="required">Container Location</input>
<input type="submit" />
</form>
