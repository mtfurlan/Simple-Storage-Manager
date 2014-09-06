<?PHP
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once("db.php");
require_once("functions.php");


$title = "MHacks IV";
include('head.php');
$username = getUsername();
include('nav.php');
?>
    <div class="container">

      <div class="starter-template">
        <h1>Mark's Marvelous Inventory Manager</h1>

        <p class="lead">
		Use this to track stuff, or don't.  <br />
		Whatever works for you, I guess.  <br />
		We don't really care anymore.</p>
      </div>

    </div><!-- /.container -->

	<!-- Place this asynchronous JavaScript just before your </body> tag -->
    <script type="text/javascript" src="loginScripts.js" async="async"></script>
<?PHP
include('foot.php');
