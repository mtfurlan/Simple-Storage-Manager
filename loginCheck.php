<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include('db.php');

$dbh = connectDB();

//These should be validated, for real.

$name = $_POST["name"];
//echo $name;
//echo '<br />';
$email = $_POST["email"];
//echo $email;


$stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(array('email' => $email));

//echo "<br />";
//echo $stmt->rowCount();

if ($stmt->rowCount() == 0) {
	$stmt = $dbh->prepare("INSERT INTO users (email,name) value (:email, :name)");
	$stmt->execute(array('email' => $email, 'name' => $name));
	//echo "<br />Not dead yet";
	$stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
	$stmt->execute(array('email' => $email));
	//echo "<br />Reselected";
}

$row = $stmt->fetch();
//print_r( $row );
setcookie("user",$row[0],time()+60*60*24);

	header("Location: http://mhacks.scuzzball.net");
	die();

?>
