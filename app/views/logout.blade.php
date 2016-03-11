
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Note to Myself - Log out</title>
</head>
<body>
	@if ((isset($_SESSION["email"])) || isset($email))
		<h1> {{(isset($email)) ? $email : $_SESSION['email']}} is now logged out. Thank you</h1>
		<p><a href="/login">Log in</a> again.</p>
	@else
		<p><a href="/login">Log in</a> or <a href="/register">register</a> before logging out.</p>
	@endif
</body>
</html>
