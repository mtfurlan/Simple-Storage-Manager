<?php
$title = "Delete Object";
require_once('head.php');
require_once('nav.php');
require_once('functions.php');

$user = requireLogin();

if (!isset($_POST['uid'])) {
	echo "I Need a UID, Dammit.  Go get me one.";
}
else if (!$_POST['conf']) {
	$dbh = connectDB();
	$stmt = $dbh->prepare('SELECT * from objects WHERE user_id = :user AND uid = :uid');
	$stmt->execute(array('user'=>$user, 'uid'=>$_POST['uid']));
	$obj = $stmt->fetch();

	echo "Are you sure you want to delete " . $obj['name'] . '?
	<form action="delObject.php" method="post" id="confirmForm">
	<input type="hidden" name="uid" value="'.$_POST["uid"].'" />
	<input type="hidden" name="conf" value="true" />
	<input type="submit" value="Yes" /></form>
	<form action="profile.php" method="post" id="back">
	<input type="submit" value="No" /></form>';
}
else {
	deleteObject($_POST['uid']);
	echo '<script type="text/javascript"> window.location="http://mhacks.scuzzball.net/profile.php"</script>';
	die();
}

require_once(foot.php);
?>
