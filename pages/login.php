<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <div id="login">
        <form method="post">
            <input type="text" required="required" placeholder="Employee number" name="u">
            <input type="password" required="required" placeholder="Password" name="p">
            <button type="submit">Log in</button>
        </form>
    </div>
    <script>
        if (true) {  //if user information verified by server
            window.location.href = './index.php';
        }
    </script>
</body>
</html>  