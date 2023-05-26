<?php

if (isset($_POST['imgname']) && isset($_POST['imgcollection']) && isset($_FILES['imgfile']) && isset($_POST['pass'])) {
    $imagename = ($_POST['imgname']);
    $imagecollection = ($_POST['imgcollection']);
    $imagedesc = ((isset($_POST['imgdesc']))? $_POST['imgdesc'] : '' );
    $audio = '';
    $password = $_POST['pass'];
    if ($password == 'thisIsPasswordforxhr') {
        
        move_uploaded_file($_FILES['imgfile']["tmp_name"],"assests/images/".basename($_FILES['imgfile']['name']));
        if (isset($_POST['audiofile'])) {
            $audio = "assests/audio/".basename($_FILES['imgfile']['name']);
            move_uploaded_file($_FILES['audiofile']["tmp_name"],"assests/audio/".basename($_FILES['audiofile']['name']));
        }
        $connection = new mysqli("localhost","root","","joystick");
        $response= $connection->query("INSERT INTO images VALUES ('','".$imagename."','assests/images/".basename($_FILES['imgfile']['name'])."','".$imagedesc."','".$imagecollection."','".$audio."')");
        $connection->close();
        if ($response) {
            echo 'ok';
        }else{
            echo "error";
        }
        
    }
}?>