<?php
if (isset($_GET['pass']) && $_GET['pass']=='thisIsPasswordforxhr' && isset($_GET['id'])) {
    $con = new mysqli('localhost','root','','joystick');
    $imgadress = $con->query('SELECT link from images where id like \''.$_GET['id'].'\'')->fetch_array()[0] ;
    $con->query('DELETE from images where id like "'.$_GET['id'].'"');
    unlink($imgadress);
    $con->close();
}