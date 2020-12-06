<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="login.css" />
</head>

<body>
    <div id="login">
		<div id="name">Log In</div>
        <form method="post">
            <input type="text" required="required" placeholder="Employee number" name="u">
            <input type="password" required="required" placeholder="Password" name="p">
			<input type="checkbox" id="remember_me">Remember me
            <button type="submit">Log in</button>
        </form>
		<button id="forgot_password">Forgot your password?</button>
    </div>
    <script>
        if (true) { //if user information verified by server
            window.location.href = '../index.php';
        }
    </script>
</body>

</html>