<?PHP
require_once("db.php");
require_once("functions.php");


$title = "Search";
include('head.php');
include('nav.php');
?>

      <div class="starter-template">
<?PHP
$cid = isset($_GET['cid']) ? $_GET['cid'] : NULL;
if(!$cid){
	echo <<<FORM
      	<h1>Listing Objects in Container</h1>
	<form role="form" method="get" action="list.php">
		<div class="form-group">
			<label for="cid">Container ID</label>
			<input class="form-control" type="number" id="cid" name="cid" placeholder="ID of Container">
		</div>
		<button type="submit" class="btn btn-success">List</button>
	</form>
FORM;
}else{//We actually are listing things
	$results = listObjects(requireLogin(),$cid);
	/*echo "<pre>";
	print_r($results);
	echo "</pre>";
*/
      	
	echo "<h1>Listing Objects in {$results[0]['contName']}</h1>
	<table class='table table-bordered table-striped'>
	  <tr>
	    <th>Object Name</th>
	    <th>Object Description</th>
	  </tr>";
	foreach($results as $result){
		echo "<tr>
		  <td>{$result['objectName']}</td>
		  <td>{$result['description']}</td>
		</tr>";
	}
	echo "</table>";
}
?>
      </div>
<?PHP
include('foot.php');
