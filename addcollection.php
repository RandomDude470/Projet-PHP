<?php
if (isset($_GET['name']) && isset($_GET['desc']) && isset($_GET['verification'])) {
    $name = $_GET['name'];
    $desc = $_GET['desc'];
    $pass = $_GET['verification'];
    if ($pass == "thisIsPasswordforxhr") {
        $new = new mysqli('localhost', 'root', '', 'joystick');
        $query = 'INSERT INTO collections (`name`,`description`) VALUES (\'' . $name . '\',\'' . $desc . '\' )';
        $res = $new->query($query);
        if ($res) {
            echo 'done';
        } else {
            echo 'error';
        }
        $new->close();
    }
}
