    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Mark's Marvelous Inventory Manager</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="addCont.php">Add a Container</a></li>
            <li><a href="addObject.php">Store an Object</a></li>
			<li><a href="moveCont.php">Move a Container</a></li>
			<li><a href="moveObject.php">Move an Object</a></li>
          </ul>
	  <div class="navbar-right" style="color:#fff;">
<?PHP
	if($username){
		echo 'Greetings, <a href="/profile.php">' . $username . '</a><br> <form action="logout.php" method="post" id="logoutForm"><input type="submit" value="Log out" /></form>';
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
	 </div>
        </div><!--/.nav-collapse -->
      </div>
    </div>
