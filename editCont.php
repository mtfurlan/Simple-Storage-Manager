<?php
$title = "Update Container Information";
require_once('head.php');
require_once('nav.php');
require_once('functions.php');

$user = requireLogin();

if (!isset($_POST['uid'])) {
	echo "I need a UID, dammit.  Don't come back without one.";
	die();
}
$uid = $_POST['uid'];

$dbh = connectDB();
$stmt = $dbh->prepare("SELECT * FROM containers WHERE uid = :uid");
$stmt->execute(array("uid"=>$uid));

$cont = $stmt->fetch();
echo "
<form id='contUpdate' action='editCont.php' method='post'>
<input type='hidden' name='update' value='true' />
<input type='hidden' name='uid' value='".$uid."' />
<input type='text' name='name' value='".$cont['name']."' />
<input type='text' name='loc' value='".$cont['location']."' />
<input type='submit' /></form>";

if ($_POST['update']) {
	$name = $_POST['name'];
	$loc = $_POST['loc'];
	echo "name: $name<br>loc: $loc<br>uid: $uid<br>";

	$dbh = connectDB();
	$stmt = $dbh->prepare('UPDATE containers SET name=:name,location=:loc WHERE uid = :uid');
	$success = $stmt->execute(array('name'=>$name,'loc'=>$loc,'uid'=>$uid));
	if($success){
		print "Updated uscccessfully";
	}else{
		print "Failure to update";
	}
}

require_once('foot.php');
?>
