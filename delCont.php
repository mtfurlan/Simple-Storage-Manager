<?php
$title = "Delete Container";
require_once('head.php');
require_once('nav.php');
require_once('functions.php');

$user = requireLogin();

if (!isset($_POST['uid'])) {
	echo "I Need a UID, Dammit.  Go get me one.";
}
else if (!$_POST['conf']) {
	$dbh = connectDB();
	$stmt = $dbh->prepare('Select from containers WHERE user = :user AND uid = :uid');
	$stmt->execute(array('user'=>$user, 'uid'=>$_POST['uid']));
	$cont = $stmt->fetch();

	echo '
    <div class="container">

      <div class="starter-template">
        <h1>Delete Container?</h1>

        <p class="lead">
Are you sure you want to delete ' . $cont['name'] . ' and all its contents?
	<form action="delCont.php" method="POST" id="confirmForm">
	<input type="hidden" name="uid" value="'.$_POST["uid"].'" />
	<input type="hidden" name="conf" value="true" />
	<div class="form-group">
	<input class="btn btn-danger" type="submit" value="Yes" /></form>
	</div>
	<div class="form-group">
	<form action="profile.php" method="post" id="back">
	<input class="btn btn-info" type="submit" value="No" /></form>
	</div>
</p></div></div>';
}
else {
	deleteContainer($_POST['uid']);
	echo '<script type="text/javascript"> window.location="http://mhacks.scuzzball.net/profile.php"</script>';
	die();
}

include('foot.php');
