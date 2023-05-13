<?php

$email = $_POST['email'];
$passw = $_POST['password'];
$confirmp = $_POST['confirmp'];
$con = new mysqli("localhost", "root", '', "joystick");
$res =  $con->query('SELECT email FROM `login` WHERE email LIKE \'' . $email . '\'');
$res = $res->fetch_array();
if ($res[0] != null) {
    header("Location: signup.php?invalidemail=1");
    die();
} else if ($passw != $confirmp) {
    header("Location: signup.php?nomatch=1");
    die();
} else {
    if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['fullname'])) {
        header("Location: signup.php?missingfield=1");
        die();
    }
    $insert =  $con->query('INSERT INTO `login` (email,`password`,`role`,`name`) VALUES (\'' . $email . '\',\'' . $passw . '\',\'user\',\'' . $_POST['fullname'] . '\')');
    if ($insert) {
        header('Location: login.php?success=1');
        die();
    } else {
        header("Location: signup.php?databaseerror=1");
        die();
    }
}
$con->close();