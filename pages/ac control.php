<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
</head>

<body>
	<!--Got a problem here. After this page loaded, if ac is on, <div id="temperature">'s innerText should directly change into ac_temperature, but I don't know how-->
	<div>
		<img />
		<div>Your Room</div>
		<div>AC#1004</div>
	</div>
	<div id="ac_panel">
		<div>Air Conditioner</div>
		<div>Temperature</div>
		<div id="temperature">--</div>
		<button onclick="ac_temperatureUp();ac_showTemperature()">+</button>
		<button onclick="ac_temperatureDown();ac_showTemperature()">-</button>
		<img />
		<button onclick="ac_switch();ac_showTemperature()">on/off</button>
		<button onclick="ac_modeChange(1)">mode1</button>
		<button onclick="ac_modeChange(2)">mode2</button>
		<button onclick="ac_modeChange(3)">mode3</button>
		<button onclick="ac_windChange(1)">wind1</button>
		<button onclick="ac_windChange(2)">wind2</button>
		<button onclick="ac_windChange(3)">wind3</button>
	</div>
</body>

</html>