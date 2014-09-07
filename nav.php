    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Storage Manager</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="addCont.php">Add Containers</a></li>
            <li><a href="addObject.php">Store Objects</a></li>
            <li><a href="profile.php">Object List</a></li>
			<li><a href="list.php">List by ID</a></li>
            <li><a href="search.php">Search</a></li>
          </ul>
<?PHP
require_once('db.php');
$username = getUsername();
	if($username){
		echo '<div id="username"><form action="logout.php" method="post" id="logoutForm"><input class="btn btn-danger" type="submit" value="Log out" /></form><p id="greeting">Greetings, <a href="/profile.php">' . $username . '</a></p></div>';
	}else{
		echo '<span id="signinButton">
			<span
				class="g-signin"
				data-callback="signinCallback"
				data-clientid="295775757742-mqq9md42quucng0nma57hsa9bg9inv2h.apps.googleusercontent.com"
				data-cookiepolicy="single_host_origin"
				data-requestvisibleactions="http://schema.org/AddAction"
				data-scope="https://www.googleapis.com/auth/plus.profile.emails.read">
			</span>
		</span>
		<div id="formContainer" style="display:none;"></div>';
	}
?>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<div class="container" style="height:100%;background:#fff;">
