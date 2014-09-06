<?php
$title = "Add Container";
require_once("head.php");
require_once("nav.php");
require_once('functions.php');
	requireLogin();
if ($_POST["name"]) {
	//Process stuff
	$user = $_COOKIE['user']; 
	$name = isset($_POST['name']) ? $_POST['name'] : ''; 
	$location = isset($_POST['loc']) ? $_POST['loc'] : ''; 
	$success = insertContainer($user,$name,$location); 
	if($success) {
		echo "Succesfully added container";
	}
	else {
		die('Failed to add container.');
	}
	
	if (isset($_POST["profile"])) {
		header("Location: http://mhacks.scuzzball.net/profile.php");
		die();
	}
}

?>

<form id="contForm" action="addCont.php" method="post">
<input type="text" name="name" required="required">Container Name</input>
<input type="text" name="loc" required="required">Container Location</input>
<input type="submit" />
</form>

<?php
require_once('foot.php');
?>
