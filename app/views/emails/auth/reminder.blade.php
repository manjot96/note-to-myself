<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Welcome to {{URL::to('google.ca')}}</h2>
		<div>
			To finish signing up for {{$email}}, please click this link: {{URL::to($url)}}
            <br>
            <Br>
            Thank you.
		</div>
	</body>
</html>
