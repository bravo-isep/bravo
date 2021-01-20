<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="login.css" />
    <script>
        function send_mail() {
            alert("An E-mail has been sent to your enterprise mailbox. Check it to reset your password.");
        }
    </script>
</head>

<body>
    <div id="reset_password">
        <div id="name">Reset Password</div>
        <form method="post">
            <div>Please enter your enterprise E-mail address:</div>
            <input type="text" required="required" placeholder="E-mail address" name="e">
            <button type="button" onclick="send_mail()" id="resetPassword">Send Email</button>
            <!--Click here send an email to the employee's enterprise mailbox. A link will be in the email, click it to visit change_password.php-->
        </form>
    </div>
    <script>
        if (false) { //if user information verified by server
            window.location.href = '../index.php';
        }
    </script>
</body>

</html>