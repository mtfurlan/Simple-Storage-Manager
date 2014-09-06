<?PHP
ini_set('display_errors',1); 
error_reporting(E_ALL);

require_once("db.php");
?>
<html>
	<head>
		<title>TODO: Name this shit</title>
	</head>
	<body>
<?PHP
		$action = isset($_GET['action']) ? $_GET['action'] : null;
		switch($action){
			case 'insert':
				$insertType = isset($_GET['insertType']) ? $_GET['insertType'] : null;
				if($insertType == "container"){
					echo "Inserting container<br>";
					$user = isset($_GET['user']) ? $_GET['user'] : null;
					$name = isset($_GET['name']) ? $_GET['name'] : null;
					$location = isset($_GET['location']) ? $_GET['location'] : null;
					$success = insertContainer($user,$name,$location);
				}elseif($insertType == "object"){
					echo "Inserting object<br>";
					$user = isset($_GET['user']) ? $_GET['user'] : null;
					$container = isset($_GET['container']) ? $_GET['container'] : null;
					$name = isset($_GET['name']) ? $_GET['name'] : null;
					$keywords = isset($_GET['keywords']) ? $_GET['keywords'] : null;
					$success = insertObject($user,$container,$name,$keywords);
				}else{
					die("Bad insert type");
				}
				if($success){
					echo "successfully added";
				}else{
					echo "failure";
				}
				break;
			default:
				echo "no action";	
		}
		
?>
	</body>
</html>
