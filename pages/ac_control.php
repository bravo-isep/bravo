<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
</head>

<body>
	<!--Got a problem here. After this page loaded, if ac is on, <div id="temperature">'s innerText should directly change into ac_temperature, but I don't know how-->
	<div>
		<?php
		$roomId = $_GET['roomid'];
		?>

		<img src="./image/1.png" />
		<div><?php echo $roomId; ?></div>
		<div><?php echo "AC#$roomId"; ?></div>
	</div>
	<div id="ac_panel">
		<div>Air Conditioner</div>
		<div>Temperature</div>
		<div id="temperature">--</div>
		<button onclick="ac_temperatureUp();ac_showTemperature()">+</button>
		<button onclick="ac_temperatureDown();ac_showTemperature()">-</button>
		<img src="./image/1.png" />
		<button onclick="ac_switch();ac_showTemperature()">on/off</button>
		<button onclick="ac_modeChange(1)">COOL</button>
		<button onclick="ac_modeChange(2)">DRY</button>
		<button onclick="ac_modeChange(3)">HEAT</button>
		<button onclick="ac_windChange(1)">LOW</button>
		<button onclick="ac_windChange(2)">MED</button>
		<button onclick="ac_windChange(3)">HIGH</button>
	</div>
</body>

</html>