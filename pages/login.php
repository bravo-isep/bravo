<!DOCTYPE html>
<html>
<?php
$isLogin = false;
session_start();
if (isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] === true) {
    header('Location: ../index.php');
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="login.css" />
    <link rel="icon" href="../image/favicon.ico" type="image/x-icon" />  

    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.cookie.js"></script>
    <script src="../js/crypto.aes.js"></script>
    <script src="../js/crypto.sha1.js"></script>
    <script src="../js/login.js"></script>
    

</head>

<body>
    <div id="login">
        <div id="name">LOG IN</div>
        <form action="" onkeydown="if(event.keyCode==13) return sub();">
            <input type="text" required="required" placeholder="Employee number" name="u" id="user">
            <input type="password" required="required" placeholder="Password" name="p" id="passwd">

            <input type="checkbox" id="remember_me" class="checkbox">Remember me
            <!-- <input type="checkbox" id="auto" class="checkbox" onclick="autoCheck();">Auto Login<br /> -->
            <button type="button" id="loginButton" onclick="sub();">Log in</button>
        </form>
        <span id="output"></span>
        <a href="../pages/reset_password.php">
            <button id="forgot_password">Forgot your password?</button>
        </a>
    </div>
</body>

</html>