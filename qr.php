<?PHP
require_once("db.php");
require_once("functions.php");


$title = "Search";
include('head.php');
include('nav.php');
?>
      <div class="starter-template">
<?PHP
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
$type = isset($_GET['type']) ? $_GET['type'] : NULL;
if(!$id){
	echo "<h1>Try getting here from the browse menu</h1>";
}else{//We actually are doing things
	if($type == "Container"){
		$result = getContainer(requireLogin(),$id);
      	}elseif($type == "Object"){
		$result = getObject(requireLogin(),$id);
	}
	echo "<h1>Making QR sticker for the thing $type</h1>";
	echo "<pre>";
	print_r($result);
	echo "<img src=\"http://api.qrserver.com/v1/create-qr-code/?size=300x300&data=$type{$result['uid']}\">";
}
?>
      </div>
<?PHP
include('foot.php');
