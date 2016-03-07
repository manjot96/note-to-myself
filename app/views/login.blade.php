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
            <h3>Email Address:</h3>
            <input type="text" name="emailaddress" id="emailaddress" />
        </div>
        <div>
            <h3>Password</h3>
            <input type="text" name="password" id="password" />
        </div>
        <input type="submit" value="Log In!" />
    {{Form::close()}}
</body>
</html>