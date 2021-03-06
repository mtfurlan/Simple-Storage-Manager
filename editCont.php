<?php
require_once('functions.php');
$user = requireLogin();
$title = "Update Container Information";
require_once('head.php');
require_once('nav.php');

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
<div class='container'><div class='starter-template'>
<h1>Edit Container</h1>
<p class=lead'><form id='contUpdate' action='editCont.php' method='post'>
<input type='hidden' name='update' value='true' />
<input type='hidden' name='uid' value='".$uid."' />
<div class='form-group'>
<label for='name'>Name</label>
<input class='form-control' id='name' type='text' name='name' value='".$cont['name']."'>
</div>
<div class='form-group'>
<label for='loc'>Location</label>
<input type='text' class='form-control' id='loc' name='loc' value='".$cont['location']."'>
</div>
<input class='btn btn-success' type='submit'></form>
</p></div></div>";

if ($_POST['update']) {
	$name = $_POST['name'];
	$loc = $_POST['loc'];

	$dbh = connectDB();
	$stmt = $dbh->prepare('UPDATE containers SET name=:name,location=:loc WHERE uid = :uid');
	$success = $stmt->execute(array('name'=>$name,'loc'=>$loc,'uid'=>$uid));
	if($success){
		print "Updated successfully";
		echo '<script type="text/javascript"> window.location="http://mhacks.scuzzball.net/profile.php"</script>';
	}else{
		print "Failure to update";
	}
}

require_once('foot.php');
?>
