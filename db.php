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
	echo "user: $user<br>name: $name<br>location: $location<br>";


	$stmt = $dbh->prepare("INSERT INTO containers (user_id,name,location) value (:user_id, :name, :location)");
	return $stmt->execute(array('user_id' => $user, 'name' => $name, 'location' => $location));
}

function insertObject($user,$container,$name,$keywords){
	$dbh = connectDB();
	echo "user: $user<br>name: $name<br>container: $container<br>keywords: $keywords<br>";

	//Check if given user owns given container
	$stmt = $dbh->prepare("SELECT 1 FROM containers WHERE uid = :container AND user_id = :user");
	$stmt->execute(array("container" => $container, "user" => $user));
	if(!$stmt->rowCount()){
		die("User does not own container object is being added to. Fuck off");
	}

	$stmt = $dbh->prepare("INSERT INTO objects (user_id,container_id,name,keywords) value (:user_id,:container,:name,:keywords)");
	return $stmt->execute(array('user_id' => $user, 'container' => $container, 'name' => $name, 'keywords' => $keywords));
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
