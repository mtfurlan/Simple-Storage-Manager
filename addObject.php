<?php
$title = "Add Object";
require_once("head.php");
require_once("nav.php");
require_once("functions.php");
	requireLogin();

if ($_POST["name"]) {
	$user = $_COOKIE['user'];
	$container = isset($_POST['cont']) ? $_POST['cont'] : die("Need to specify container");;
	$name = isset($_POST['name']) ? $_POST['name'] : die("Name needs to be specified");
	$keywords = isset($_POST['keywords']) ? $_POST['keywords'] : '';
	$success = insertObject($user,$container,$name,$keywords);
	if ($success) {
		echo "Successfully added object.";
	}
	else {
		die('Failed to add object.');
	}
	
	if (isset($_POST["profile"])) {
		header("Location: http://mhacks.scuzzball.net/profile.php");
		die();
	}
}

$containers = getContainers($_COOKIE['user'])

?>
    <div class="container">

      <div class="starter-template">
        <h1>Add Object</h1>

        <p class="lead">

<form role="form" id="contForm" action="addObject.php" method="post">
<div class="form-group">
<label for="cont">Container</label>
<select id="cont" class="form-control" name="cont" required="required">
<?PHP
foreach($containers as $container) {
	echo '<option value="' . $container["uid"] . '">' . $container['name'] . '</option>';
}
?>
</select>
</div>
<div class="form-group">
<label for="name">Iten Name</label>
<input class="form-control" type="text" name="name" required="required">
</div>
<div class="form-group">
<label for="description">Item Description</label>
<input class="form-control" type="text" id="description" name="keywords" required="required">
</div>
<input type="submit" class="btn btn-success">
</form>
</p></div></div>
<?php
require_once('foot.php');
?>
