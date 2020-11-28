<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bravo Smart Office</title>
</head>
<body>
	<?php
    /*
        Buttons. First one links directly into your room; last one is the button for admin to add devices; other buttons specifically control each room
    */
    /*
        All the information on the buttons should be replaced by the data from database.
        index should send "authorityLevel" to server and leve1-1 can only get himself's room button, level-2/level-3 can get all rooms.
        the way to send "authorityLevel" is just like how I sent the "roomDevice", maybe, I guess...
    */
        $roomDevice=0;
        $roomDevice=$_GET['roomdevice'];
        if ($roomDevice == "1") {
            echo('
					<button class="button" onclick="setPage(\'./pages/ac control.php\',\'Air Conditioner\')">
						<img />
						<div class="buttonText1">your room</div>
						<div class="buttonText2">AC#1004</div>
					</button><br>
				');
        } elseif ($roomDevice == "2") {
            echo('
					<button class="button" onclick="setPage(\'./pages/light control.php\',\'Light\')">
						<img />
						<div class="buttonText1">your room</div>
						<div class="buttonText2">L#1001</div>
					</button><br>
				');
        } elseif ($roomDevice == "3") {
            echo('
					<button class="button" onclick="sendAlarm()">
						<img />
						<div class="buttonText1">click here to</div>
						<div class="buttonText2">ALARM!</div>
					</button><br>
				');
        }
        for ($i=0; $i<=10; $i++) {//Change the loop condition into traversing the database of the device
            if ($roomDevice == "1") {
                echo('
						<button class="button" onclick="setPage(\'./pages/ac control.php\',\'Air Conditioner\')">
							<img />
							<div class="buttonText1">room 601</div>
							<div class="buttonText2">AC#1001</div>
						</button>
					');
            } elseif ($roomDevice == "2") {
                echo('
						<button class="button" onclick="setPage(\'./pages/light control.php\',\'Light\')">
							<img />
							<div class="buttonText1">room 601</div>
							<div class="buttonText2">L#1001</div>
						</button>
					');
            } elseif ($roomDevice == "3") {
                echo('
						<button class="button" onclick="setPage(\'./pages/alarm.php\',\'Security\')">
							<img />
							<div class="buttonText1">room 601</div>
							<div class="buttonText2">Smoke Detector</div>
						</button>
					');
            }
        }
        //this button is for adding new devices, has nothing to do with the database.
        echo('
				<br>
				<button class="button" onclick="setPage(\'./pages/device management.php\',\'Manage\')">
					add device
				</button>
			');
    ?>
</body>
</html> 