<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h3>{{$title}}</h3>
		<div>
			Someone tried to access your account and failed to login after 3 attempts. <br>
            Your new password is <b>{{$pass}}</b> <br>
            Please click <b>{{URL::to($url)}}</b> to activate your account again!
            <br>
            <Br>
            Regards,<br>
            Note to Myself Team
		</div>
	</body>
</html>
