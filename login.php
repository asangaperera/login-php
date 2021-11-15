<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Screen</title>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script>
$('#btnClose').click(function(e) {
    $('#loginDiv').hide(0);
});

</script>

</head>

<body>

<form id="ajaxform" method="post" action="processlogin.php">
<div id="login_center_main" style="text-align:center">

	<div id="inputDivLogin">
   
    	<div id="LoginLabel"><b>Username</b></div>
        <div id="LoginInput"><input type="text" name="txtusername" class="Logintextboxes"/></div>
        <a href=""></a>
    </div>
	<br />
    <div id="inputDivLogin">
    	<div id="LoginLabel"><b>Password</b></div>
		<div id="LoginInput"><input type="password" name="txtpassword" class="Logintextboxes"/></div>
    </div>
	<br />
    <div id="inputDivLoginControl">
    	<div>
        	<input id="btnSignin" class="LoginButton" type="submit" value="Sign in" />
            <input class="LoginButton" id="btnClear" type="reset" value="Clear" />
            <a href="register.html">Register</a>
		</div>
	</div>
</div>

</form>

</body>
</html>