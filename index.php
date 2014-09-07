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
                
        <p class="lead">
		Simple Storage Manager allows you to easily track and find object in a myriad of different locations and storage units, and makes it simple to search your collection and add new items, whether from a mobile phone or a desktop.  QR code labels generated by the app can be affixed to boxes, allowing for instant retrieval of an itemized inventory.
	</p>
      </div>
      <div class="buttonBox">
	  <div class="startButton" style="margin-left:0"><a href=''>Add Container</a></div>
	  <div class="startButton" style="margin-right:0;margin-top:-95px"><a href=''>Add Item</a></div>
	  <div class="startButton"><a href=''>List Items</a></div>
       </div>

<?PHP
include('foot.php');
