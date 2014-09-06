<?PHP
require_once("db.php");
require_once("functions.php");


$title = "Search";
include('head.php');
include('nav.php');
?>
    <div class="container">

      <div class="starter-template">
      	<h1>Searching for the location of objects</h1>
<?PHP
$search = isset($_GET['search']) ? $_GET['search'] : NULL;
if(!$search){
	echo <<<FORM
	<form role="form" method="get" action="search.php">
		<div class="form-group">
			<label for="search">Object of Interest</label>
			<input class="form-control" type="text" id="search" name="search" placeholder="What object are you looking for?">
		</div>
		<button type="submit" class="btn btn-success">Search</button>
	</form>
FORM;
}else{//We actually are searching for things
	$results = searchObjects(requireLogin(),$search);
	echo "<table class='table table-bordered table-striped'>
	  <tr>
	    <th>Object Name</th>
	    <th>Object Description</th>
	    <th>Container Name</th>
	    <th>Container Location</th>
	    <th>Container ID</th>
	  </tr>";
	foreach($results as $result){
		echo "<tr>
		  <td>{$result['objectName']}</td>
		  <td>{$result['description']}</td>
		  <td>{$result['contName']}</td>
		  <td>{$result['location']}</td>
		  <td>{$result['contID']}</td>
		</tr>";
	}
	echo "</table>";
}
?>
      </div>
    </div><!-- /.container -->

    <script type="text/javascript" src="edit.js"></script>
<?PHP
include('foot.php');
