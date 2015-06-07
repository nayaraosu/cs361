<?php
session_start();
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
include 'dbinfo.php';
    




function test($mysqli,$min_actv)
{
	
    
    $stmnt = $mysqli->prepare("SELECT name, description, img_path FROM badges WHERE min_actv <= ?");
    $stmnt->bind_param("i", $min_actv);
    $stmnt->execute();
    $stmnt->bind_result($name,$desc,$img_path);
    $total_array = array();
    while ($stmnt->fetch())
    {
        $j_array = array();
        $j_array['name'] = $name;
        $j_array['description'] = $desc;
        $j_array['imgpath'] = $img_path;
        array_push($total_array, $j_array);
    }        
    echo json_encode($total_array);
}

$mysqli = new mysqli($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);
test($mysqli, 5);
echo "<br>=======================<br>";
test($mysqli, 10);
echo "<br>=======================<br>";
test($mysqli, 15);
echo "<br>=======================<br>";
test($mysqli, 20);
echo "<br>=======================<br>";
test($mysqli, 25);
echo "<br>=======================<br>";

?>