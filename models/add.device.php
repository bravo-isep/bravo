<?php
$id_device = $_POST['id_device'];
$type = $_POST['type'];
$idroom = $_POST['idroom'];
$table='';
$table.='<tr>
		<td>DEVICE ID</td>
		<td>DEVICE TYPE</td>
		<td>ROOM</td>
		<td>MANAGEMENT</td>
		</tr>';

if($type == 'AC')
{
    try{
        header('Content-type:text/html;charset=utf-8');
        include_once("connect.php");
        $db = connect();
    
        $sql = "INSERT INTO ac_sys (idac_sys , idroom)
        VALUES ('$id_device', '$idroom')";
    
        $db->exec($sql);
        
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}elseif($type == 'light')
{
    try{
        header('Content-type:text/html;charset=utf-8');
        include_once("connect.php");
        $db = connect();
    
        $sql = "INSERT INTO lighting_sys (idlighting_sys , idroom)
        VALUES ('$id_device', '$idroom')";
    
        $db->exec($sql);
        
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}else
{
    try{
        header('Content-type:text/html;charset=utf-8');
        include_once("connect.php");
        $db = connect();
    
        $sql = "INSERT INTO sensor (idsensor, type, idroom)
        VALUES ('$id_device', '$type', '$idroom')";
    
        $db->exec($sql);
        
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

//read the 'ac_sys' table and add the data to $table 
try{

    $stmt = $db -> prepare("SELECT * FROM ac_sys"); 
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

if (!empty($res)) {
    foreach ($res as $key => $value) {
        $table.='<tr>';
        $table.="<td>AC#{$value['idac_sys']}</td>";
        $table.="<td>AC</td>";
        $table.="<td>{$value['idroom']}</td>";
        $table.="<td><button onclick='delete_device({$value['idac_sys']}, 1)'>Delete</button></td>";
        $table.="</tr>";
    }
}

//read the 'lighting_sys' table and add the data to $table 
try{	
    $stmt = $db -> prepare("SELECT * FROM lighting_sys"); 
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

if (!empty($res)) {
    foreach ($res as $key => $value) {
        $table.='<tr>';
        $table.="<td>Light#{$value['idlighting_sys']}</td>";
        $table.="<td>light</td>";
        $table.="<td>{$value['idroom']}</td>";
        $table.="<td><button onclick='delete_device({$value['idlighting_sys']}, 2)'>Delete</button></td>";
        $table.="</tr>";
    }
}

//read the 'sensor' table and add the data to $table 
try{	
    $stmt = $db -> prepare("SELECT * FROM sensor"); 
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
        $table.="<td>Sensor#{$value['idsensor']}</td>";
        $table.="<td>{$value['type']}</td>";
        $table.="<td>{$value['idroom']}</td>";
        $table.="<td><button onclick='delete_device({$value['idsensor']}, 3)'>Delete</button></td>";
        $table.="</tr>";
    }
}
$table.="<form action='add.device.php' method='POST'>
<tr><td><input type='text' name='id_device' id='id_device'></td>
<td><select name='type' id='type'>
<option value='AC'>AC</option>
<option value='light'>light</option>
<option value='temperature'>temperature</option>
<option value='humidity'>humidity</option>
<option value='brightness'>brightness</option>
<option value='smoke'>smoke</option>
<option value='intrusion'>intrusion</option>
<option value='body temperature'>body temperature</option>
</select></td>
<td><select name='idroom' id='idroom'>";
foreach ($res_room as $key=>$room)
            {
                $table.="<option value='{$room['idroom']}' >{$room['idroom']}</option>";
            }
$table.="</select></td>
<td><button onclick='add_device()'>Add</button></td>
</tr></form>";
echo $table;

?>