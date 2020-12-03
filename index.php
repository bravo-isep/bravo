<!DOCTYPE html>
<html>

<head>
    <!--test by zhongjiquan-->
    <meta charset="utf-8">
    <title>Bravo Smart Office</title>
    <script>
        // maybe I should put these codes into a js file?

        //replace most of these with data from server

        //variables for index
        var employeeName = "Employee"
        var employeeNumber = 331054;
        var authorityLevel = 1; //1:Employee 2:Manager 3:Administrator		
        //variables for ac control.php
        var ac_is_on = 0;
        var ac_temperature = 27;
        var ac_mode = 3;
        var ac_wind = 3;
        //variables for light control.php
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

<body>

    <!--logo-->
    <div id="logo" style="border: 1px solid;float:left;">Bravo</div>

    <!--header-->
    <div id="header" style="border: 1px solid;">
        <div id="name" style="float:left"></div>
        <div id="user" style="text-align:right"></div>
        <button id="signout" style="float:right" onclick="window.location.href='pages/login.php'">Sign out</button>
    </div>

    <!--side menu-->
    <div id="side menu" style="border: 1px solid;float:left">
        <button type="button" onclick="setPage('./pages/main menu.php','Menu')">Menu</button><br>
        <button type="button" onclick="setPage('./pages/room select.php', 'Air Conditioner')">Air
            Conditioner</button><br>
        <button type="button" onclick="setPage('./pages/room select.php','Light')">Light</button><br>
        <button type="button" onclick="setPage('./pages/room select.php','Security')">Security</button><br>
        <button type="button" onclick="setPage('./pages/health.php','Health')">Health</button><br>
        <button type="button" onclick="setPage('./pages/manage.php','Manage')">Manage</button>
        <!--this button won't show if authorityLevel is 1-->
    </div>

    <!--main part-->
    <div id="main part" style="float:left"></div>

    <!--set default page-->
    <script>
        setPage('./pages/main menu.php', 'Menu', employeeName);
    </script>
    <script type="text/javascript" src="./js/ac control.js"></script>
    <script type="text/javascript" src="./js/light control.js"></script>

</body>

</html>