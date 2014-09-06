<?PHP
require_once("db.php");
require_once("functions.php");


$title = "Profile";
include('head.php');
$username = getUsername();
include('nav.php');
?>
    <div class="container">

      <div class="starter-template">
      	<h1>Containers of <?PHP echo $username; ?></h1>
<div class="panel-group" id="accordion">
<?PHP
$containers = getContainers(requireLogin());
foreach($containers as $container){
	echo <<<CONTAINER
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseContainerID{$container['uid']}">
          {$container['name']}
        </a>
      </h4>
    </div>
    <div id="collapseContainerID{$container['uid']}" class="panel-collapse collapse">
      <div class="panel-body">
	<table>
	  <tr>
	    <th>Item name</th>
	    <th>Edit</th>
	    <th>Delete</th>
	  </tr>
CONTAINER;
	$objects = getObjects($container['uid']);
	foreach($objects as $object){
		echo "<tr><td>" . $object['name'] . "</td><td><a href=\"editObject.php?uid=" . $object['uid'] . "\">Edit</a></td><td><a href=\"deleteObject.php?uid=" . $object['uid'] . "\">Delete</a></td></tr>";
	}
echo <<<CONTAINER
	</table>
      </div>
    </div>
  </div>
CONTAINER;
}
?>
</div>
      </div>
    </div><!-- /.container -->

    <script type="text/javascript" src="loginScripts.js" async="async"></script>
<?PHP
include('foot.php');
