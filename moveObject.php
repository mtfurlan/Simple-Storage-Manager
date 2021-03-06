<?php
require_once('functions.php');
$user = requireLogin();
$title = "Change Object Location";
require_once('head.php');
require_once('nav.php');
require_once('db.php');

if (!isset($_POST['uid'])) {
	echo 'UID.  Now.  Get to it.';
}
else {
	$uid = $_POST['uid'];
	$cont = $_POST['cont'];//Old container, we don't want to move it back here
	$dbh = connectDB();
	$stmt = $dbh->prepare("SELECT * FROM objects WHERE uid = :uid");
	$stmt->execute(array('uid'=>$uid));
	$obj = $stmt->fetch();
	
	echo "
    <div class=\"container\">

      <div class=\"starter-template\">
        <h1>Moving " . $obj['name'] . "</h1>

        <p class=\"lead\">

	<form id='moveForm' action='moveObject.php' method='post'>
	<input type='hidden' name='uid' value='".$uid."'>
	<input type='hidden' name='move' value='true'>
	<select class='form-control' name='cont'>";
	$containers = getContainers($_COOKIE['user']);
	$hasContainers = false;//Ensure they have options
	foreach($containers as $container) {
		if($container['uid'] != $cont){
			$hasContainers = true;
			echo '<option value="' . $container["uid"] . '">' . $container['name'] . '</option>';
		}
	}
	echo '</select>';
	if($hasContainers){
		echo '<input class="btn btn-success" type="submit">';
	}else{
		echo '<a href="/" class="btn btn-danger">You only have one container, you can\'t move things out of it.</a>';
	}
	echo '</form></p></div></div>';

	if ($_POST['move']) {
		$stmt = $dbh->prepare("UPDATE objects SET container_id = :cont WHERE uid = :uid");
		$stmt->execute(array('cont'=>$_POST['cont'],'uid'=>$uid));
	}
}



if (isset($_POST["move"])) {
	echo '<script type="text/javascript"> window.location="http://mhacks.scuzzball.net/profile.php"</script>';
	die();
}
require_once('foot.php');
?>
