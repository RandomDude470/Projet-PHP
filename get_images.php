<?php
if (isset($_GET['collection'])) {
    
    $collection = $_GET['collection'];
    $connection = new mysqli("localhost","root","","joystick");
    $query = "SELECT `name`,`link`,audio,`description` FROM images WHERE `collection` LIKE '".$collection."' ";
    $result = $connection->query($query);
    $arr = array();
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
    $connection->close();
}
