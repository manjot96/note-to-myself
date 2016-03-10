<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h3>Welcome to {{URL::to('')}}</h3>
		<div>
			To finish signing up for <b>{{$email}}</b>, please click this link: <a href="{{URL::to($url)}}">{{URL::to($url)}}</a>
            <br>
            <Br>
            Thank you.
		</div>
	</body>
</html>
