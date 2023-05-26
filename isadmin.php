<?php 

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $new = new mysqli("localhost","root","","joystick");
    $res = $new->query('SELECT `role` FROM `login` where `email` like \''.$email.'\' ')->fetch_array();
    if ($res[0] == "admin") {
        echo "yes";
    }

}