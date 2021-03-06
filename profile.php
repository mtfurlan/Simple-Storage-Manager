<?PHP
require_once("functions.php");
requireLogin();
require_once("db.php");



$title = "Profile";
include('head.php');
include('nav.php');
?>
      <div class="starter-template">
      	<h1><?PHP echo $username; ?>'s Containers</h1>
<div class="panel-group" id="accordion">
<?PHP
$containers = getContainers(requireLogin());
foreach($containers as $container){
	echo <<<CONTAINER
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="btn btn-primary containerAccordian" style="color:#fff;" title="expand" data-toggle="collapse" data-parent="#accordion" href="#collapseContainerID{$container['uid']}">
CONTAINER;
		echo $container['name'] . (!empty($container['location']) ? "(" . $container['location'] . ")" : '');
	echo <<<CONTAINER
        </a>
      </h4>
      <form method="post" action="editCont.php"><input type="hidden" name="uid" value="{$container['uid']}"><input type="submit" class="btn btn-info containerEdit" value="Edit"></form>
      <form method="post" action="delCont.php"><input type="hidden" name="uid" value="{$container['uid']}"><input type="submit" class="btn btn-danger containerDelete" value="Delete"></form>
      <a href="qr.php?type=Container&amp;id={$container['uid']}"class="btn btn-warning containerQR">Print QR</a>
    </div>
    <div id="collapseContainerID{$container['uid']}" class="panel-collapse collapse">
      <div class="panel-body table-responsive">
	<table class="table table-bordered">
	  <tr>
	    <th>Item name</th>
	    <th>Description</th>
	    <th>Edit</th>
	    <th>Move</th>
	    <th>Delete</th>
	  </tr>
CONTAINER;
	$objects = getObjects($container['uid']);
	foreach($objects as $object){
		echo "<tr><td>" . $object['name'] . "</td><td>" . $object['description'] . "</td><td><button class=\"btn btn-info\" onclick=\"editObject(this,'" . $object['uid'] . "')\">Edit</button></td><td><form action=\"moveObject.php\" method=\"post\"><input type=\"hidden\" name=\"uid\" value=\"" . $object['uid'] . "\"><input type=\"hidden\" name=\"cont\" value=\"" . $container['uid'] . "\"><input class=\"btn btn-info\" type=\"submit\" value=\"Move\"></form></td><td><form action=\"delObject.php\" method=\"post\"><input type=\"hidden\" name=\"uid\" value=\"" . $object['uid'] . "\"><input class=\"btn btn-danger\" type=\"submit\" value=\"Delete\"></form></td></tr>";
	}
echo <<<CONTAINER
	</table>
	<form action="addObject.php" method="post"><input type="hidden" name="profile"><input type="hidden" name="cont" value="{$container['uid']}"><input class="btn btn-success" type="submit" value="Add Object"></form>
      </div>
    </div>
  </div>
CONTAINER;
}
?>
<a class="btn btn-success" href="addCont.php">Add Container</a>
</div>
      </div>

    <script type="text/javascript" src="edit.js"></script>
<?PHP
include('foot.php');
