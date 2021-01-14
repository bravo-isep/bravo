<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <div id="Reset_password">
		<div id="name">Reset Password</div>
        <form method="post">
			<div>Please enter your enterprise E-mail address:</div>
            <input type="text" required="required" placeholder="E-mail address" name="e">
            <button type="submit" onclick="send_mail()">Submit</button><!--Click here send an email to the employee's enterprise mailbox. A link will be in the email, click it to visit change_password.php-->
        </form>
    </div>
    <script>
        if (false) { //if user information verified by server
            window.location.href = '../index.php';
        }
    </script>
</body>

</html>