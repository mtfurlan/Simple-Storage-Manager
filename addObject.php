<?php
require_once("head.php");
require_once("nav.php");
require_once("db.php");
require_once("functions.php");
	requireLogin();

if ($_POST["name"]) {
	$user = $_COOKIE['user'];
	$container = isset($_POST['cont']) ? $_POST['cont'] : null;
	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$keywords = isset($_POST['keywords']) ? $_POST['keywords'] : null;
	$success = insertObject($user,$container,$name,$keywords);
}

$containers = getContainers($_COOKIE['user'])

?>

<form id="contForm" action="addObject.php" method="post">
<input type="text" id="name" required="required">Item Name</input>
<select id="cont" required="required">
<?PHP
foreach($containers as $container) {
	echo '<option value="' . $container["uid"] . '">' . $container['name'] . '</option>';
}
?>
</select>
<input type="text" id="tags" required="required">Keywords</input>
<input type="submit" />
</form>

<?php
require_once('foot.php');
?>
