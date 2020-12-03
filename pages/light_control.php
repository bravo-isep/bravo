<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
</head>

<body>
	<div>
		<img />
		<div>Your Room</div>
		<div>L#1001</div>
	</div>
	<div id="light_panel">
		<img />
		<button onclick="light_switch()">on/off</button>
		<br>
		<input id="intensity" type="range" value="50" onchange="change_intensity()">Light intensity</input>
		<br>
		<input id="curtain" type="range" value="50" onchange="control_curtain()">Curtain</input>
		<br>
	</div>
</body>

</html>