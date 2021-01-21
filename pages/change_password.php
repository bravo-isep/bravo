<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="login.css" />
    <script type="text/javascript">
		function checkSame(obj) {
			var new_password = document.getElementById("new_password");
			if (new_password.value != obj.value) {
				obj.style.cssText = "border-color:red; color:red;";
			}
			else if (new_password.value == obj.value) {
				obj.style.cssText = "border-color:green; color:black;";
				document.getElementById("changePassword").style.cssText = "opacity: 1; cursor: pointer;";
			}
		}
    </script>
</head>

<body>
    <div id="change_password">
        <div id="name">Change Password</div>
        <form method="post">
            <input type="password" required="required" placeholder="Old Password" name="op"></br>
            <!--this line will hide if user visit this page from the link in the email for reseting password-->
            <input type="password" required="required" placeholder="New Password" name="np" id="new_password">
            <input type="password" required="required" placeholder="Confirm New Password" onkeyup="checkSame(this)" name="cnp">
            <button type="button" id="changePassword" style="opacity: 0.6; cursor: not-allowed;">Change Password</button>
        </form>
    </div>
    <script>
        if (false) { //if user information verified by server
            window.location.href = '../index.php';
        }
    </script>
</body>

</html>