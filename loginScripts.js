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
	  
	        (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();

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

      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();