<!DOCTYPE html>
<html>
<?php
$isLogin = false;
session_start();
if ($_SESSION["isLogin"] != true) {
    header('Location: ./pages/login.php');
    exit();
}
?>

<head>
    <!--test by zhongjiquan-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bravo Smart Office</title>
    <link rel="stylesheet" type="text/css" href="./pages/default.css" />
    <link rel="stylesheet" type="text/css" href="./pages/unique.css" />
    <link rel="icon" href="./image/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script src="./js/jquery.cookie.js"></script>
    <script src="./js/getValue.js"></script>
    <script src="./js/ac_control.js"></script>
    <script src="./js/light_control.js"></script>
    <script src="./js/manage.js"></script>
    <script src="./js/index.js"></script>

    <script type="text/javascript" src="./js/page.js"></script>
</head>

<body bgcolor="#2B3331">


    <!--logo-->
    <img id="logo" style="float:left;" src="./image/logo.png" />

    <!--header-->
    <div id="header">
        <img id="header_icon" src="./image/header.png" />
        <div id="name"></div>

        <span id="button-list-group">
            <div id="user"></div>
            <img id="user_icon" src="./image/head.png" />
            <span id="button-list-area">
                <!--This two will show after you put your mouse on the user-->
                <button id="signout" class="side_menu_button" onclick="logout();">Sign out</button>
                <button id="change_password_button" class="side_menu_button" onclick="window.location.href='./pages/change_password.php'">Change password</button>
            </span>
        </span>
    </div>

    <!--side menu-->
    <div id="side_menu" style="float:left">
        <button class="side_menu_button" type="button" onclick="setPage('./pages/main_menu.php','Menu','0')"><img src="./image/menu.png" />Menu</button><br>
        <button class="side_menu_button" type="button" onclick="setPage('./pages/room_select.php', 'Air Conditioner','0')"><img src="./image/ac.png" />Air-Con</button><br>
        <button class="side_menu_button" type="button" onclick="setPage('./pages/room_select.php','Light','0')"><img src="./image/light.png" />Light</button><br>
        <button class="side_menu_button" type="button" onclick="setPage('./pages/room_select.php','Security','0')"><img src="./image/security.png" />Security</button><br>
        <button class="side_menu_button" type="button" onclick="setPage('./pages/health.php','Health','0')"><img src="./image/health.png" />Health</button><br>
        <button class="side_menu_button" type="button" id="side_menu_button" onclick="setPage('./pages/manage.php','Manage','0')"><img src="./image/manage.png" />Manage</button>
        <!--this button won't show if authorityLevel is 1-->
    </div>

    <!--main part-->
    <div id="main_part" style="float:left"></div>

    <!--set default page-->
    <script>

    </script>
    <script type="text/javascript" src="./js/ac_control.js"></script>
    <script type="text/javascript" src="./js/light_control.js"></script>

</body>

</html>