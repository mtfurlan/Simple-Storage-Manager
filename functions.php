<?php
function printContainers() {
	$containers = getContainers($_COOKIE['user']);
	echo "<table><tr><td>Container</td><td>ID</td><td>Location</td></tr>";
	foreach($containers as $container){
		echo "<tr><td>" . $container['name'] . "</td><td>" . $container['uid'] . "</td><td>" . $container['location'] . "</td></tr>";
	}
	echo "</table>";
}

function requireLogin() {
	if (!$_COOKIE["user"]) {
		//Not logged in? Bugger off.  This should eventually check for a real user too...
		header("Location: http://mhacks.scuzzball.net");
		die();
	}
}

?>
