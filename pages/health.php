<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Bravo Smart Office</title>
</head>

<body>
	<button class="button" id="report_illness" onclick="reportIllness()">
		<img src="./image/1.png" />
		<div class="buttonText1">report</div>
		<div class="buttonText2">illness</div>
	</button>
	<div class="button" id="Covid19_Notice" style="text-align:center;">COVID-19 epidemic period<br>Please follow the
		company's epidemic prevention measures<br>and take care of yourself<br>
	</div>
	<button class="button" id="epidemic_prevention">
		<img src="./image/1.png" />
		<div class="buttonText1">epidemic<br>prevention<br>measures</div>
	</button>
	<button class="button" id="your_temperature" onclick="setPage('./pages/body_temperature.php','Health')">
		<img src="./image/1.png" />
		<div class="buttonText1">your temperature</div>
		<div class="buttonText2">36.8°C</div>
	</button>
	<button class="button" id="remote_control">
		<img src="./image/1.png" />
		<div class="buttonText1">Remote Control</div>
		<div class="buttonText2">Elevator</div>
	</button>
</body>

</html>