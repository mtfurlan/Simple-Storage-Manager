<?PHP
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once("db.php");


$title = "TODO: Title shit";
include('head.php');
$username = getUsername();
include('nav.php');
?>
    <div class="container">

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
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
		echo "no action";}
echo "<br>username: " . getUsername() . "<br>";
?>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
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
		var form = '<form id="uidForm" action="' + url + '" method="post">'		'<input type="text" name="name" value="' + name + '" />'		'<input type="text" name="email" value="' + primaryEmail + '" />'			'<input type="submit"></form>';
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

	//document.getElementById("textThingy").innerHTML = 'Sign-in state: ' + authResult['error'];
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
