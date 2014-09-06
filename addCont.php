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
    <div class="container">

      <div class="starter-template">
        <h1>Add Container</h1>

        <p class="lead">

<form role="form" id="contForm" action="addCont.php" method="post">
<div class="form-group">
<label for="name">Container Name</label>
<input type="text" class="form-control" id="name" name="name" required="required">
</div>
<div class="form-group">
<label for="loc">Container Location</label>
<input type="text" class="form-control" id="loc" name="loc" required="required">
</div>
<button type="submit" class="btn btn-success">Submit</button>
</form>
</p></div></div>
<?php
require_once('foot.php');
?>
