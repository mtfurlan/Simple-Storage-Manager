

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
	  <div class="navbar-right" style="color:#fff;">
<?PHP
	if($username){
		echo 'Greetings, ' . $username . '<br> <form action="logout.php" method="post" id="logoutForm"><input type="submit" value="Log out" /></form>';
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
