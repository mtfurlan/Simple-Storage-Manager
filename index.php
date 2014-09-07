<?PHP
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once("functions.php");


$title = "Storage Manager";
include('head.php');
include('nav.php');
?>
    

      <div class="starter-template">
        <h1>Simple Storage Manager</h1>
		<br /><br />
        <p class="lead">
		This object storage tracking system was created to aid in the controlled storage of all the random different things one accumulates over time. Where did that cool switch found in the physics department trash go? Where did the wirestrippers go? With SIM, you can keep a bit closer control over where your things go.
<br><br>
This helps you maintain a list of containers such as drawers, boxes, closets, etc, and lists of all the important items in or on those containers. You can print labels for the containers, with a human readable ID, a timestamp, and a QR code that will allow you to quickly pull up a list of the contents with your smartphone. You can also search for items or boxes and the built in tracking system will help you quickly locate them.
<br><br>
Accounts are easily created using your existing gmail account, allowing for easy one-click sign-in.
<br><br>
API and Android app coming soon.
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
