<!DOCTYPE html>
<html>

<head>
    <!--test by zhongjiquan-->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bravo Smart Office</title>
	<link rel="stylesheet" type="text/css" href="./pages/default.css" />
	<link rel="stylesheet" type="text/css" href="./pages/unique.css" />
    <script>
        // maybe I should put these codes into a js file?

        //replace most of these with data from server

        //variables for index
        var employeeName = "Employee"
        var employeeNumber = 0;
        var authorityLevel = 1; //1:Employee 2:Manager 3:Administrator		
        //variables for ac_control.php
        var ac_is_on = 0;
        var ac_temperature = 27;
        var ac_mode = 3;
        var ac_wind = 3;
        //variables for light_control.php
        var light_is_on = 0;
        var light_intensity = 50; //0~100 or same as database
        var curtain_position = 50; //too

        function sendAlarm() {
            alert("Alarm"); //change this into sending an alarm to server 
        }

        function reportIllness() {
            alert("report illness"); //same as above
        }

        function findDevice() {
            alert(
                "New device found"
            ); //maybe automatically fill the device table's last<tr> with the information of the new device...whatever
        }

        function clickBtn(
            event
        ) //When a small button on a big button, I click the small one but the "onclick" of the big one will also react, this function is to stop it.
        {
            event = event ? event : window.event;
            event.stopPropagation();
        }
    </script>
    <script type="text/javascript" src="./js/page.js"></script>
</head>

<body bgcolor="#2B3331">

    <!--logo-->
    <img id="logo" style="float:left;" src="./image/logo.png"/>

    <!--header-->
    <div id="header" style="float:left">
		<img id="header_icon" src="./image/1.png" />
        <div id="name" style="float:left"></div>
		
        <button id="signout" onclick="window.location.href='./pages/login.php'">Sign out</button>
        <div id="user"></div>
		<img id="user_icon" src="./image/1.png" />
    </div>

    <!--side menu-->
    <div id="side_menu" style="float:left">
        <button class="side_menu_button" type="button" onclick="setPage('/pages/main_menu.php','Menu','0')"><img src="./image/1.png" />Menu</button><br>
        <button class="side_menu_button" type="button" onclick="setPage('/pages/room_select.php', 'Air_Conditioner','0')"><img src="./image/1.png" />Air
            Conditioner</button><br>
        <button class="side_menu_button" type="button" onclick="setPage('/pages/room_select.php','Light','0')"><img src="./image/1.png" />Light</button><br>
        <button class="side_menu_button" type="button" onclick="setPage('/pages/room_select.php','Security','0')"><img src="./image/1.png" />Security</button><br>
        <button class="side_menu_button" type="button" onclick="setPage('/pages/health.php','Health','0')"><img src="./image/1.png" />Health</button><br>
        <button class="side_menu_button" type="button" onclick="setPage('/pages/manage.php','Manage','0')"><img src="./image/1.png" />Manage</button>
        <!--this button won't show if authorityLevel is 1-->
    </div>

    <!--main part-->
    <div id="main_part" style="float:left"></div>

    <!--set default page-->
    <script>
        setPage('/pages/main_menu.php', 'Menu','0', employeeName);
    </script>
    <script type="text/javascript" src="./js/ac_control.js"></script>
    <script type="text/javascript" src="./js/light_control.js"></script>

</body>

</html>