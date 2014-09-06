<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<?PHP

include('db.php');

$dbh = connectDB();

$name = $_POST["name"];
echo $name;
echo '<br />';
$email = $_POST["email"];
echo $email;


$stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email AND name = :name");
$stmt->execute(array('email' => $email, 'name' => $name));

echo "<pre>";
print_r($stmt->rowCount());
echo "</pre>";



?>
