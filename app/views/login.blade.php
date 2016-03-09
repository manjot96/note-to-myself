<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Note to Myself - Log in</title>
    {{HTML::style('css/register2.css')}}
</head>
<body>
    <h1>Log In</h1>
    {{Form::open(['route'=>'main.store'])}}
    <ul>
        <li>
			<h3>
                {{Form::label('emailaddress', 'Email Address: ')}}
                <span id="validEmail"></span>
            </h3>    
			{{Form::text('emailaddress')}}
		</li>
    	<li>
			<h3 title="6+ Characters!">
                {{Form::label('password', 'Password') }}
                <span id="validPass"></span>
            </h3>
			{{ Form::text('password') }}
		</li>
        <li class ="last">
            {{Form::submit('Log in')}}
        </li>
		<li>
			<p>
                <a href="/register">Register</a> | <a href="/forgot">Forgot password</a>
			</p>
        </li>
        <li>
            <a href="http://twitter.com/#!/notes_myself">Twitter</a>
        </li>
    </ul>
	
    {{Form::close()}}
</body>
</html>

		