<?PHP
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once("functions.php");


$title = "Inventory Manager";
include('head.php');
include('nav.php');
?>
    

      <div class="starter-template">
        <h1>Simple Inventory Manager</h1>

        <p class="lead">
		This object storage tracking system was created to aid in the controlled storage of all the random different things one accumulates over time. Where did that cool switch found in the physics department trash go? Where did the wirestrippers go? With this, you can keep a bit closer control over where you put your things.
<br><br>
This helps you maintain a list of containers such as drawers, boxes, shelves, etc, and lists of items in or on those containers. You can print lables for the containers, with both a human readable ID, and a QR code that allow you to quickly get a list of items in that container. You can also search for an item, and a list of possible items will come up, and tell you what containers they are in.
<br>
Accounts are easily created via a google login, and your containers/objecs are kept seperate from other accounts.
<br>
Android app coming soon, the API for such an app to connect to already exists.
		<!--<div class="startButton"><a href='#'>A simple answer to a simple question:</a></div>-->
	</p>
      </div>
	  
	  
	  <!--<div class="buttonBox">
	  <div class="startButton" style="float:left"><a href=''>What's in that box?</a></div>
	  <div class="startButton" style="float:right"><a href=''>Where'd those pictures go?</a></div>
	  <div class="startButton" style="float:left"><a href=''>What ever happened to ...</a></div>
	  <div class="startButton" style="float:right"><a href=''>Where <em>IS</em> my Super Suit?</a></div>
	  <div class="startButton" style="float:left"><a href=''>Test</a></div>
	  <div class="startButton" style="float:right"><a href=''>Test</a></div>
	  </div>-->

<?PHP
include('foot.php');
