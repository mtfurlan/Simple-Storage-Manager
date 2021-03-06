<?php
require_once('functions.php');
$user = requireLogin();
$title = "Edit Object Properties";
require_once('head.php');
require_once('nav.php');
require_once('db.php');

if (!isset($_POST['uid'])) {
	echo 'UID.  Now.  Get to it.';
}
else {
	$uid = $_POST['uid'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$dbh = connectDB();

	$stmt = $dbh->prepare("UPDATE objects SET name = :name, description = :description WHERE uid = :uid");
	$success = $stmt->execute(array('name' => $name, 'description' => $description, 'uid' => $uid));
	
	if($success){
		echo "Success";
		echo '<script type="text/javascript"> window.location="http://mhacks.scuzzball.net/profile.php"</script>';
	}else{//Failed
		die("Could not edit object");
	}
}

require_once('foot.php');
?>
