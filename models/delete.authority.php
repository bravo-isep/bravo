<?php

$iduser = $_POST['iduser'];


try{
    header('Content-type:text/html;charset=utf-8');
    include_once("connect.php");
    $db = connect();

    $sql = "DELETE FROM user WHERE `user`.`iduser` = $iduser";

    $db->exec($sql);
    
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}


$table='';
$table.="<table border='1'>";
$table.="<tr><td>EMPLOYEE NUMBER</td><td>USERNAME</td>
<td>AUTHORITY</td><td>ROOM</td><td>MANAGEMENT</td></tr>";


	//connecting the database
//read the 'user' table and add the data to table 
try{
	header('Content-type:text/html;charset=utf-8');

	$stmt = $db -> prepare("SELECT * FROM user"); 
	$stmt->execute();
	$stmt_room = $db -> prepare("SELECT * FROM room");
	$stmt_room->execute();

	$res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
	$res_room = $stmt_room->fetchAll(PDO::FETCH_ASSOC);

	
}catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}

if (!empty($res)) {
	foreach ($res as $key => $value) {
		$table.='<tr>';
		$table.="<td>{$value['iduser']}</td>";
		$table.="<td>{$value['username']}</td>";
		$table.="<td>".show_level($value['userlevel'])."</td>";
		$table.="<td>{$value['idroom']}</td>";
		$table.="<td><button onclick='delete_user({$value['iduser']})'>Delete</button><td>";
		$table.="</tr>";
	}
}

function show_level($userlevel){
	if($userlevel == 1){
		return 'Employee';
	}
	if($userlevel == 2){
		return 'Manager';
	}
	return 'Administrator';
}
$table.="<tr><form action='./models/add.authority.php' method='POST'>
<td><input type='text' id='iduser'></td><td><input type='text' id='username'></td>";
$table.="<td><select name='userlevel' id='userlevel'>
<option value ='1'>Empleyee</option>
<option value ='2'>Manager</option>
<option value ='3'>Administrator</option>
</select>
</td>
<td>
<select name='idroom' id='idroom'>"
;

foreach ($res_room as $key=>$room)
{
	$table.=
	"<option value = '{$room['idroom']}' >{$room['idroom']}</option>";
}
$table.="</select>
</td>
<td><button type='button' onclick='add_user()'> Add </button></td>
</form>
</tr>
</table>";

echo $table;
?>