<?php
require_once('head.php');
require_once('nav.php');
require_once('db.php');
require_once('functions.php');

$user = requireLogin();

if (!isset($_GET['uid'])) {
	echo "I Need a UID, Dammit.  Go get me one.";
}
else if (!$_GET['conf']) {
	$dbh = connectDB();
	$stmt = $dbh->prepare('Select from containers WHERE user = :user AND uid = :uid');
	$stmt->execute(array('user'->$user, 'uid'->$_GET['uid']));
	$cont = $stmt->fetch();

	echo "Are you sure you want to delete " . $cont['name'] . ' and all its contents?
	<form action="delCont.php" method="get" id="confirmForm">
	<input type="hidden" name="uid" value="'$_GET["uid"]'" />
	<input type="hidden" name="conf" value="true" />
	<input type="submit" value="Yes" /></form>
	<form action="profile.php" method="get" id="back">
	<input type="submit" value="No" /></form>';
}
else {
	deleteContainer($uid);
	header("Location: http://mhacks.scuzzball.net/profile.php");
	die();
}

require_once(foot.php);
?>