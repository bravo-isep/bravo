<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <div id="change_password">
		<div id="name">Change Password</div>
        <form method="post">
            <input type="password" required="required" placeholder="Old Password" name="op" style="display:none"></br> <!--this line will only show-->
            <input type="password" required="required" placeholder="New Password" name="np">
            <input type="password" required="required" placeholder="Confirm New Password" name="cnp">
            <button type="submit">Change Password</button>
        </form>
    </div>
    <script>
        if (false) { //if user information verified by server
            window.location.href = '../index.php';
        }
    </script>
</body>

</html>