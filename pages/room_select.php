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

	include("../models/room.php");
	$roomDevice = 0;
	$roomDevice = $_GET['roomdevice'];

	$rooms = getRooms();
	$idRoom = array_column($rooms, 'idroom');
	$roomName = array_column($rooms, 'room_name');

	$userRoom = getUserRoom();
	$userIdRoom = array_column($userRoom, 'idroom');
	$userRoomName = array_column($userRoom, 'room_name');

	if ($roomDevice == "1") {
		echo ("
					<button class=\"button\" id=\"ac_your_room\" onclick=\"setPage('/pages/ac_control.php','Air_Conditioner',$userIdRoom[0])\">
						<img src=\"./image/1.png\" />
						<div class=\"buttonText1\">Your Room : $userRoomName[0]</div>
						<div class=\"buttonText2\">AC#$userIdRoom[0]</div>
					</button><br>
				");
	} elseif ($roomDevice == "2") {
		echo ("
					<button class=\"button\" id=\"light_your_room\" onclick=\"setPage('/pages/light_control.php','Light',$userIdRoom[0])\">
						<img src=\"./image/1.png\" />
						<div class=\"buttonText1\">Your Room : $userRoomName[0]</div>
						<div class=\"buttonText2\">L#$userIdRoom[0]</div>
					</button><br>
				");
	} elseif ($roomDevice == "3") {
		echo ("
					<button class=\"button\" id=\"send_alarm\" onclick=\"sendAlarm()\">
						<img src=\"./image/1.png\" />
						<div class=\"buttonText1\">click here to ALARM!</div>
						<div class=\"buttonText2\">ALARM#$userIdRoom[0]</div>
					</button><br>
				");
	}

	for ($i = 0; $i < count($rooms); $i++) { //Change the loop condition into traversing the database of the device
		if ($roomDevice == "1") {
			echo ("
						<button class=\"button\" onclick=\"setPage('/pages/ac_control.php','Air_Conditioner',$idRoom[$i])\">
							<img src=\"./image/1.png\" />
							<div class=\"buttonText1\"> $roomName[$i] </div>
							<div class=\"buttonText2\">AC#$idRoom[$i]</div>
						</button>
					");
		} elseif ($roomDevice == "2") {
			echo ("
						<button class=\"button\" onclick=\"setPage('/pages/light_control.php','Light',$idRoom[$i])\">
							<img src=\"./image/1.png\" />
							<div class=\"buttonText1\"> $roomName[$i] </div>
							<div class=\"buttonText2\">L#$idRoom[$i]</div>
						</button>
					");
		} elseif ($roomDevice == "3") {
			echo ("
						<button class=\"button\" onclick=\"setPage('/pages/alarm.php','Security', $idRoom[$i])\">
							<img src=\"./image/1.png\" />
							<div class=\"buttonText1\"> $roomName[$i] </div>
							<div class=\"buttonText2\">ALARM#$idRoom[$i]</div>
						</button>
					");
		}
	}
	//this button is for adding new devices, has nothing to do with the database.
	echo ("
				<br>
				<button class=\"button\" id=\"add_device\" onclick=\"setPage('/pages/device_management.php','Manage')\">
				<img src=\"./image/1.png\" />
				</button>
			");
	?>
</body>

</html>