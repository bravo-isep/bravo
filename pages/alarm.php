﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bravo Smart Office</title>
</head>
<body>
	<div>
		<img src="./image/1.png" />
		<div>Room 601</div>
		<div>Smoke Detector</div>
	</div>
	<button class="button" onclick="sendAlarm()">
		<img src="./image/1.png" />
		<div class="buttonText1">click here to</div>
		<div class="buttonText2">ALARM!</div>
	</button>
	<table border="1">
		<tr>
			<td>DATE(DD/MM/YYYY)</td>
			<td>MONITOR DATA</td>
			<td>STATE</td><!--auto generated by monitor data-->
			<td>ROOM</td>
		</tr>
		<?php
            for ($i=0; $i<=3; $i++) {
                echo('
					<tr>
						<td>15/09/2020</td>
						<td>273,444/cc</td>
						<td>Abnormal</td>
						<td>Room 601</td>
					</tr>
				');
            }
        ?>
	</table>
</body>
</html> 