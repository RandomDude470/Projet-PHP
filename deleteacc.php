<?php 
    if (isset($_GET['oldpass'])) {
        $oldpass = $_GET['oldpass'];
        $email = $_GET['email'];
        $connection = new mysqli("localhost","root","","joystick");
        $result = $connection->query('SELECT `password` FROM `login` WHERE `email` LIKE \''.$email.'\'');
        $arr = $result->fetch_array();
        if ($arr[0] == $oldpass ) {
            $result = $connection->query("DELETE FROM `login` WHERE `email` LIKE '".$email."'");
            if ($result) {
                echo 'done';
            }else{
                echo 'error';
            }
        
        }else{
            echo 'nomatch';
        }

    }