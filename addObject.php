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

<form id="contForm" action="addObject.php" method="post">
<select name="cont" required="required">
<?PHP
foreach($containers as $container) {
	echo '<option value="' . $container["uid"] . '">' . $container['name'] . '</option>';
}
?>
</select>
<input type="text" name="name" required="required">Item Name</input>
<input type="text" name="keywords" required="required">Keywords</input>
<input type="submit" />
</form>

<?php
require_once('foot.php');
?>
