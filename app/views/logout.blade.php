
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Note to Myself - Log out</title>
</head>
<body>
	<?php 
	if((isset($_SESSION["email"]))) {
		echo "<h1>" . $_SESSION['email'] . " is now logged out. Thank you</h1>";
		echo "<p><a href=\"/login\">Log in</a> again.</p>";
	} else
		echo "<p><a href=\"/login\">Log in</a> or <a href=\"/register\">register</a> before logging out.</p>";
	?>
    
     
</body>
</html>
