<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="pencil.ico" />

    <title>Note to Myself - Reset Password</title>
    {{HTML::style('css/register2.css')}}

</head>
<body>

    <h1>Reset Your Password</h1>

	<p>
		Type your email address in the text box below. A new password will be sent to your email address.
	</p>

	<form action="/send" method="post">
    <ul>
        <li>
            <h3>Email address<span id="validEmail"></span></h3>
            <p>
                <input type="text" name="email" id="email" tabindex="1"  value=""/>
						
							
				</p>
        </li>

       




        <li class="last">
            <p>
				<!--<a id="signup" href="#"> -->
					<input type="submit" value="Email new password" alt="password-reminder button" style="vertical-align:middle;" tabindex="5" />
				<!--</a>-->
				</p>
		</li>
		</ul>

	</form>
</body>
</html>
