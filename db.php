<?PHP
function getUsername(){
	if(isset($_COOKIE['user'])){
		$dbh = connectDB();
		$stmt = $dbh->prepare("SELECT name FROM users WHERE uid = :user");
		$stmt->execute(array("user" => $_COOKIE['user']));
		if($stmt->rowCount() == 0){
			die("User cookie is a lie, get fucked");
		}else{
			return $stmt->fetch(PDO::FETCH_ASSOC)['name'];
		}
	}else{
		return NULL;
	}

}
function connectDB(){
	$host = 'localhost';
	$dbname = 'mhacks';
	$user = 'root';
	$pass = 'password';
	try{
		$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}catch(PDOException $e) {
		die("PDO connection failure: " . $e->getMessage());
	}
	return $dbh;
}

function insertContainer($user,$name,$location){
	$dbh = connectDB();

	$stmt = $dbh->prepare("INSERT INTO containers (user_id,name,location) VALUES (:user_id, :name, :location)");
	return $stmt->execute(array('user_id' => $user, 'name' => $name, 'location' => $location));
	
}

function insertObject($user,$container,$name,$description){
	$dbh = connectDB();

	//Check if given user owns given container
	$stmt = $dbh->prepare("SELECT 1 FROM containers WHERE uid = :container AND user_id = :user");
	$stmt->execute(array("container" => $container, "user" => $user));
	if(!$stmt->rowCount()){
		die("User does not own container object is being added to. Fuck off");
	}

	$stmt = $dbh->prepare("INSERT INTO objects (user_id,container_id,name,description) value (:user_id,:container,:name,:description)");
	return $stmt->execute(array('user_id' => $user, 'container' => $container, 'name' => $name, 'description' => $description));
}

function getContainers($user) {
	$dbh = connectDB();
	
	$stmt = $dbh->prepare("Select * FROM containers WHERE user_id = :user");
	$stmt->execute(array("user"=>$user));
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getObjects($container){
	$dbh = connectDB();
	
	$stmt = $dbh->prepare("Select * FROM objects WHERE container_id = :container");
	$stmt->execute(array("container"=>$container));
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteContainer($container) {
	$dbh = connectDB();
	
	$objects = getObjects($container);
	foreach($objects as $object) {
		$stmt = $dbh->prepare("DELETE FROM objects WHERE uid = :uid");
		$stmt->execute(array("uid"=>$object["uid"]));
	}
	
	$stmt = $dbh->prepare("DELETE FROM containers WHERE uid = :uid");
	$stmt->execute(array("uid"=>$container));
}

function deleteObject($object) {
	$dbh = connectDB();
	$stmt = $dbh->prepare("DELETE FROM objects WHERE uid = :uid");
	$stmt->execute(array("uid"=>$object));
}

function searchObjects($user,$search){
	$dbh = connectDB();
	$stmt = $dbh->prepare("SELECT containers.uid as contID, objects.uid as objectID, containers.name as contName, objects.name as objectName, objects.description, containers.location FROM objects INNER JOIN containers WHERE objects.container_id = containers.uid AND objects.user_id = :user AND ( objects.name LIKE :search OR objects.description LIKE :search)");
	$stmt->execute(array('user' => $user, 'search' => "%$search%"));
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function listObjects($user,$cid){
	$dbh = connectDB();
	$stmt = $dbh->prepare("SELECT containers.uid as contID, objects.uid as objectID, containers.name as contName, objects.name as objectName, objects.description, containers.location FROM objects INNER JOIN containers WHERE objects.container_id = containers.uid AND containers.uid = :cid");
	$stmt->execute(array('cid' => $cid));
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getContainer($user,$id){
	$dbh = connectDB();
	$stmt = $dbh->prepare("SELECT * FROM containers WHERE uid = :id AND user_id = :user");
	$stmt->execute(array('id' => $id, 'user' => $user));
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getObject($user,$id){
	$dbh = connectDB();
	$stmt = $dbh->prepare("SELECT * FROM objects WHERE uid = :id AND user_id = :user");
	$stmt->execute(array('id' => $id, 'user' => $user));
	return $stmt->fetch(PDO::FETCH_ASSOC);
}
