<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Note to Myself - Log in</title>
</head>
<body>
    <h1>Log In</h1>
    {{Form::open(['route'=>'main.store'])}}
        <div>
			{{Form::label('emailaddress', 'Email Address: ')}}
			{{Form::text('emailaddress')}}
		</div>
    	<div>
			{{ Form::label('password', 'Password') }}
			{{ Form::text('password') }}
		</div>
        <div>
            {{Form::submit('Log in')}}
        </div>
		<li>
			<p><a href="/register">Register</a> | <a href="/forgot">Forgot password</a>
			</p>
        </li>
		
	
    {{Form::close()}}
</body>
</html>

		