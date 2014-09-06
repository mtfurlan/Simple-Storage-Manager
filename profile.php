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

	<script type="text/javascript">
function signinCallback(authResult) {
var name;
  if (authResult['status']['signed_in']) {

  gapi.client.load('plus','v1', function(){

      var request = gapi.client.plus.people.get( {'userId' : 'me'} );
      request.execute( function(profile) {
        if (profile.error) {
          console.log(profile.error);
          return;
        }
		name = profile.displayName
		if (name == "") {
			name = prompt("Please Enter Your Username");
		}
		var primaryEmail;
		for (var i=0; i < profile.emails.length; i++) {
			if (profile.emails[i].type === 'account') primaryEmail = profile.emails[i].value;
		}
		var url = 'http://mhacks.scuzzball.net/loginCheck.php';
		var form = '<form id="uidForm" action="' + url + '" method="post">'+
			'<input type="text" name="name" value="' + name + '" />'+
			'<input type="text" name="email" value="' + primaryEmail + '" />'+
			'<input type="submit"></form>';
		document.getElementById("formContainer").innerHTML = form;
		document.getElementById('uidForm').submit();
	        })
      });

    // Hide the sign-in button now that the user is authorized, for example:
    document.getElementById('signinButton').setAttribute('style', 'display: none');
 } else {
    // Update the app to reflect a signed out user
    // Possible error values:
    //   "user_signed_out" - User is signed-out
    //   "access_denied" - User denied access to your app
    //   "immediate_failed" - Could not automatically log in the user

  }
}
</script>


	<!-- Place this asynchronous JavaScript just before your </body> tag -->
    <script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
    </script>
<?PHP
include('foot.php');
