<?PHP
ini_set('display_errors',1); 
error_reporting(E_ALL);

require_once("db.php");


$title = "TODO: Title shit";
include('head.php');
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
    <div class="container">

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    </div><!-- /.container -->

<?PHP
include('foot.php');
