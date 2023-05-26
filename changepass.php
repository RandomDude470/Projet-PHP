<?php 
    if (isset($_GET['oldpass']) && isset($_GET['newpass'])) {
        $oldpass = $_GET['oldpass'];
        $newpass = $_GET['newpass'];
        $email = $_GET['email'];
        $connection = new mysqli("localhost","root","","joystick");
        $result = $connection->query('SELECT `password` FROM `login` WHERE `email` LIKE \''.$email.'\'');
        $arr = $result->fetch_array();
        if ($arr[0] == $oldpass && $newpass != '') {
            $result = $connection->query("UPDATE `login` SET `password`='".$newpass."' WHERE `email` LIKE '".$email."'");
            if ($result) {
                echo 'done';
            }else{
                echo 'error';
            }
        }else if($newpass == ''){
            echo 'empty';
        }else{
            echo 'nomatch';
        }
        $connection->close();
    }