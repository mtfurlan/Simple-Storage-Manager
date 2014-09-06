<?PHP
require_once("db.php");
require_once("functions.php");


$title = "Label Generator";
include('head.php');
include('nav.php');

echo '<div class="starter-template">';

$id = isset($_GET['id']) ? $_GET['id'] : NULL;
$type = isset($_GET['type']) ? $_GET['type'] : NULL;

if(!$id){
	echo "<h1>Try getting here from the browse menu</h1>";
}
else { //We actually are doing things
	if($type == "Container"){
		$result = getContainer(requireLogin(),$id);
      	} elseif($type == "Object"){
		$result = getObject(requireLogin(),$id);
	}
	echo "<div class='labelOutline'>";
	#echo "<div class='labelBackground'>";
	echo "<img class='qr' src='http://api.qrserver.com/v1/create-qr-code/?size=300x300&data=http://mhacks.scuzzball.net/list.php?cid=".$result['uid']."'>";
	echo "<p class='labelText'>".$result['name']."</p>";
	echo "<p class='labelTextSmall'>Created ".$today = date("F j, Y")."</p>";
	echo "</div>";
	#echo "</div>";
}
?>
      </div>
    </div><!-- /.container -->
<?PHP
include('foot.php');
