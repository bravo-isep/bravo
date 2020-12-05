<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bravo Smart Office</title>
</head>
<body>
	<div>
		<img src="./image/1.png" />
		<div>Your body temperature</div>
		<div>36.8°C</div>
	</div>
	<button class="button" onclick="reportIllness()">
		<img src="./image/1.png" />
		<div class="buttonText1">report</div>
		<div class="buttonText2">illness</div>
	</button>
	<table border="1"><!--Don't let those Level-1 see this table-->
		<tr>
			<td>DATE(DD/MM/YYYY)</td>
			<td>TEMPERATURE</td>
			<td>EMPLOYEE NUMBER</td>
			<td>NAME</td>
		</tr>
		<?php
            for ($i=0; $i<=6; $i++) {
                echo('
					<tr>
						<td>15/09/2020</td>
						<td>36.8°C</td>
						<td>331234</td>
						<td>Jack</td>
					</tr>
				');
            }
        ?>
	</table>
</body>
</html> 